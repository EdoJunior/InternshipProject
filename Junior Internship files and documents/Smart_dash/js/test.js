/**
 * Created by ClOwNzInZiSkYzZz on 8/8/2016.
 */


 var clicked = 0

$(document).ready(function() {

   // alert('document ready');

    document.getElementById('page-wrapper').addEventListener('click', function(e){

       // alert('pressed a button in this area');

        elementClicked( e.target.id );

        clicked += 1;

        document.getElementById('answer1').innerHTML= clicked;
    });


});

//this is the one to check
// this function is to return the element that has been clicked
function elementClicked( element ) {

    //alert('function called');
var jim = [];

if (  element != jim ){
jim.push(element);
}
    console.log(element);

  /* var elemented = document.getSelection().toString();

    console.log('you clicked on: ' + elemented );

   return this.id;*/
}
