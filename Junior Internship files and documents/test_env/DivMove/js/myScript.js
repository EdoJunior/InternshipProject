 $( function() {
    $( ".ui-widget-content" ).draggable();
  
  } );

function checkForLocalStorage(){

$('#btn').text('clicked');

    if( typeof(Storage) !== 'undefine'){
        localStorage.setItem('Name','Jerry');
        document.getElementById('results').innerHTML = localStorage.getItem('Name');
    }else{
        document.getElementById('results').innerHTML = 'sorry your browser doesn\'t support local storage technology';
    }


};

 localStorage