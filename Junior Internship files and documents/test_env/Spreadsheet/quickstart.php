<?php
require_once __DIR__ . '/vendor/autoload.php';
include '../config/functions.php';


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

