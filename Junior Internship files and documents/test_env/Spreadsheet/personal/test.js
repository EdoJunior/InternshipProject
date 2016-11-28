/**
 * Created by ClOwNzInZiSkYzZz on 8/17/2016.
 */
/*
var CLIENT_ID = '772014422929-unu2mnuk3kfkmascg1ejagaeqsd0q5tk.apps.googleusercontent.com';
var apikey = '';
var SCOPES = 'https://www.googleapis.com/auth/spreadsheets';



//Method built for checkinf of authorization.
function checkAuth(){
    gapi.auth.authorize({
        'client_id': CLIENT_ID,
        'scope': SCOPES,
        'immediate': true
    },handAuthResult);
};

function handAuthResult(authResult){

    createSheet();

     alert('is this being runn');

};


function handleAuth(event){

    checkAuth();
}

function loadSheetApi(){
    var discoverUrl = 'https://sheets.googleapis.com/$discovery/rest?version=v4';

    gapi.client.load(discoverUrl);*/
//}
// the commented part below is a function to create a spreadsheet
/*
function createSheet(){
    //line to create spreadsheet
    gapi.client.sheets.spreadsheets.create({
        properties:{
            title: 'test sheet'
        }
    }).then(function(newSpreadSheet){
         var id = newSpreadSheet.result.spreadsheetId;

        //publish spreadsheet to drive
        gapi.client.drive.revisions.update({
            fileId: id,
            revisionId: 1
        },{
            published: true,
            publishAuto: true;
        }).then(function(){

        });
    })
};*/

/*
function createSheet() {
    //line to create spreadsheet
    gapi.client.sheets.spreadsheets.create({
        properties: {
            title: 'test sheet'
        }
    })

}*/

// Cache the api's into variables.
var sheets = gapi.client.sheets;
var drive = gapi.client.drive;

// 1. CREATE NEW SPREADSHEET
sheets.spreadsheets.create({
    properties: {
        title: 'new-sheet'
    }
}).then(function(newSpreadSheet) {
    var id = newSpreadSheet.result.spreadsheetId;

    // 2. PUBLISH SPREADSHEAT VIA DRIVE API
    drive.revisions.update({
        fileId: id,
        revisionId: 1
    }, {
        published: true, // <-- This is where the magic happens!
        publishAuto: true
    }).then(function() {

        // 3. DISPLAY SPREADSHEET ON PAGE VIA IFRAME
        var iframe = [
            '<iframe ',
            'src="https://docs.google.com/spreadsheets/d/',
            id,
            '/pubhtml?widget=true&headers=false&embedded=true"></iframe>'
        ].join('');

        // We're using jQuery on the page, but you get the idea.
        $('#container').html($(iframe));
    });
});