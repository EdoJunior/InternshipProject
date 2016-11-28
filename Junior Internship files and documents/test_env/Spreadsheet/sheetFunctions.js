/**
 * Created by ClOwNzInZiSkYzZz on 9/30/2016.
 */
var CLIENT_ID  = '772014422929-6h917fsc8avijpfp4k24b55v3p5dh37p.apps.googleusercontent.com';
var SCOPES = ['https://www.googleapis.com/auth/spreadsheets'];
var params = {
    range:'A2',
    majorDimension: 'ROW',
    values: ['mitch']
};
function checkAuth(){
    gapi.aut.authorize({
        'client_id': CLIENT_ID,
        'scope': SCOPES.join(''),
        'immediate': true
    })
};

function handleAuthResult(authResult){
    if(authResult && !authResult.error){
        loadSheetApi();
    } else {
        
        console.log('working on to the next step!!');
    }
};

function loadSheetApi(){
    var discoveryUrl = 'https://sheets.googleapis.com/$discovery/rest?version=v4';
    
    gapi.client.load(discoveryUrl).then(postValue);
};

function postValue(){
    console.log('checking call: ', gapi.client.sheets.spreadsheets.values.update);
    gapi.client.sheets.spreadsheets.values.update({
        spreadsheetId: '1zTz8bhWB4PA8z9juh7qDybx125P9brTIsICOCCLWMQg',
        range: 'Sheet1!A2',
        valueInputOption:"USER_ENTERED",

    })
}

function handleAuthClick(event) {
    gapi.auth.authorize(
        {client_id: CLIENT_ID, scope: SCOPES, immediate: false},
        handleAuthResult);
    return false;
}

function request(){
    gapi.client.request({
        'path': 'https://docs.google.com/spreadsheets/d/1zTz8bhWB4PA8z9juh7qDybx125P9brTIsICOCCLWMQg',
        'method': 'PUT',
        'body': {
            range: 'Sheet1!A2',
            majorDimension: 'ROWS',
            values: [['banana']],
        }
    })
}