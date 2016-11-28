<?php
/**
 * Created by IntelliJ IDEA.
 * User: ClOwNzInZiSkYzZz
 * Date: 7/19/2016
 * Time: 8:27 AM
 */
require_once __DIR__ . '/vendor/autoload.php';




//connects to the database
function connect()
{
    $config = parse_ini_file("config.ini",true);
    $db = $config['database'];

  $conn = new mysqli($db['dbhost'],$db['dbuser'],$db['dbpw'],$db['dbname']);

  if ($conn->connect_error)
  {
      die('Couldn\'t connect (' . $conn->connect_errno . '): ' . $conn->connect_error);
  }

  return $conn;
}

//close connections to the database
function closeConnection($conn){
    return $conn->connect_error;
};

//retrieves list of tables in the database
function getTables()
{
    $conn = connect();

    $sql    = 'SHOW TABLES';
    $retval = $conn->query($sql);
    $rows   = $retval->fetch_all(MYSQLI_ASSOC);

    $retval->free();

    closeConnection($conn);

    return $rows;
}

//retrieve each table and info in the database
function getTableColumns($table)
{
    $conn = connect();

    //if(preg_match('/^[a-z]+$/i',$table) !== 1)
    //{
    //    die("Invalid table name");
    //}

    $sql = "SELECT * FROM  $table";
    $retval = $conn->query($sql);
    $rows   = $retval->fetch_all(MYSQLI_ASSOC);

    $retval->free();

    closeConnection($conn);

    return $rows;
}

//print out the info to the tables page.
function printResultTable($rows, $id)
{
    $firstRow       = array_shift($rows);
    $columns        = array_keys($firstRow);
    $firstRowValues = array_values($firstRow);

    echo "<table id=\"$id\" class='table table-striped table-bordered table-hover'>\n";

    echo "  <thead>\n";
    echo "    <tr>\n";
    foreach($columns as $field)
    {
        echo "      <th>$field</th>\n";
    }
    echo "    </tr>\n";
    echo "  </thead>\n";

    echo "  <tbody>\n";

    echo "    <tr>\n";
    foreach($firstRowValues as $firstRowValue)
    {
        echo "      <td>$firstRowValue</td>\n";
    }
    echo "    </tr>\n";

    foreach($rows as $row)
    {
        echo "    <tr>\n";
        foreach($row as $value)
        {
            echo "      <td>$value</td>\n";
        }
        echo "    </tr>\n";
    }

    echo "  </tbody>\n";

    echo "</table>\n";
}



/** this is the info for the spreadsheet update */

define('APPLICATION_NAME', 'Google Sheets API PHP Quickstart');
define('CREDENTIALS_PATH', '~/.credentials/sheets.googleapis.com-php-quickstart.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/sheets.googleapis.com-php-quickstart.json
define('SCOPES', implode(' ', array(
        Google_Service_Sheets::SPREADSHEETS)
));

/*if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}*/

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);

    //var_dump($credentialsPath);exit;
    if (file_exists($credentialsPath)) {
        $accessToken = json_decode(file_get_contents($credentialsPath), true);
    } else {
        // Request authorization from the user.
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n%s\n", $authUrl);
        print 'Enter verification code: ';
        $authCode = trim(fgets(STDIN));

        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Store the credentials to disk.
        if(!file_exists(dirname($credentialsPath))) {
            mkdir(dirname($credentialsPath), 0700, true);
        }
        file_put_contents($credentialsPath, json_encode($accessToken));
        printf("Credentials saved to %s\n", $credentialsPath);
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
    }
    return $client;
}

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
    $homeDirectory = getenv('HOME');
    if (empty($homeDirectory)) {
        $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
    }
    return str_replace('~', realpath($homeDirectory), $path);
}

/**
 * Set up spreadsheet
 */
function sheetSetUp(){
// Get the API client and construct the service object.
    $client = getClient();

    //running a check to see if the file exist on google drive or not
    if (!file_exists('info')){
        $service = new Google_Service_Sheets($client);
    } else{
        echo' Already exist! Please contact your Admin';
    }

    $spreadsheet = new Google_Service_Sheets_Spreadsheet();
    $name = new Google_Service_Sheets_SpreadsheetProperties();

    $title = 'Info';
    $name->setTitle($title);
    $spreadsheet->setProperties($name);

    $sheet = new Google_Service_Sheets_Sheet();
    $grid_data = new Google_Service_Sheets_GridData();

    $cells = [];
    //this is where the values are coming from
    $info_arr = getTables();

    //this works now from our database
    foreach($info_arr as $key => $datatables){
        foreach($datatables as $dt) {
            $row_data = new Google_Service_Sheets_RowData();
            $cell_data = new Google_Service_Sheets_CellData();
            $extend_value = new Google_Service_Sheets_ExtendedValue();


            $extend_value->setStringValue($dt);
            $cell_data->setUserEnteredValue($extend_value);
            array_push($cells, $cell_data);
            $row_data->setValues($cells);
            $grid_data->setRowData([$row_data]);
            $sheet->setData($grid_data);
        };
    };

    //sets the sheet with the info
    $spreadsheet->setSheets([$sheet]);
    //creates the spreadsheet with the info in it
    $service->spreadsheets->create($spreadsheet);
}

/**
 * Updates the google spreadSheet
 */

function updateSheet(){
    $client = getClient();
    $info = getTables();
    $service = new Google_Service_Sheets($client);
    $sheetId= '16tb_sP6jdk5ZiB7M0e-GgiTijDFzRJciQsF8OZsU-I8';
    $range='Filter!A2:K11';
    $values = array();

    for($i=0;$i<count($info);$i++) {
        foreach ($info as $key => $tables) {
            foreach ($tables as $dt) {
                ++$i;
                $val = array($dt, '=today()', '=countif(\'-RT @Rabobank\'!F:F,"*"&C'.$i.'&"*")', '=countif(' . $dt . '!F:F, "*"&D1&"*")', '=countif(' . $dt . '!F:F, "*"&E1&"*")', '=countif(' . $dt . '!F:F, "*"&F1&"*")', '=countif(' . $dt . '!F:F, "*"&G1&"*")', '=COUNTIFS(' . $dt . '!$A:$A,"<="&B' . $i . ',' . $dt . '!$D:$D,"*"&A' . $i . '&"*")', '=Countif(' . $dt . '!$M:$M,"="&"*"&I1&"*")', '=Countif(' . $dt . '!$M:$M,"="&"*"&J1&"*")', '=Countif(' . $dt . '!$M:$M,"="&"*"&K1&"*")');
                array_push($values, $val);
            }
        }
    }
    $body = new Google_Service_Sheets_ValueRange(array(
        'values' => $values

    ));
    $params = array('valueInputOption'=> 'USER_ENTERED');

    //check to see if the file exist on google drive
    if (file_exists('info')){
        $service;
    } else{
        $updated = $service->spreadsheets_values->update($sheetId,$range,$body ,$params );
    }
}

