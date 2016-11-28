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

if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}
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
 * Updates the google spreadSheet
 *
 *
 *
 */


function updateSheet(){
    $client = getClient();

    $info = getTables();

    $service = new Google_Service_Sheets($client);

    $sheetId= '16tb_sP6jdk5ZiB7M0e-GgiTijDFzRJciQsF8OZsU-I8';

    $range='Sheet5!A2:K11';

    $values = array();

    for($i=1;$i<count($info);$i++) {
        foreach ($info as $key => $tables) {
            foreach ($tables as $dt) {
                ++$i;
                $val = array($dt, '=today()', '=countif(' . $dt . '!F:F,"*"&C1&"*")', '=countif(' . $dt . '!F:F, "*"&D1&"*")', '=countif(' . $dt . '!F:F, "*"&E1&"*")', '=countif(' . $dt . '!F:F, "*"&F1&"*")', '=countif(' . $dt . '!F:F, "*"&G1&"*")', '=COUNTIFS(' . $dt . '!$A:$A,"<="&B2,' . $dt . '!$D:$D,"*"&A' . $i . '&"*")', '=Countif(' . $dt . '!$M:$M,"="&"*"&I1&"*")', '=Countif(' . $dt . '!$M:$M,"="&"*"&J1&"*")', '=Countif(' . $dt . '!$M:$M,"="&"*"&K1&"*")');
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

        echo 'testing something '; exit;
        $service;


    } else{

        echo' Already exist! Please contact your Admin';
        $updated = $service->spreadsheets_values->update($sheetId,$range,$body ,$params );
    }


}

updateSheet();