/**
 * Created by ClOwNzInZiSkYzZz on 7/22/2016.
 *  These function work with the index page for the graph
 * these functions take care of building the widget
 * Sorting them
 */

var storage = localStorage;
var clicks = initClicks(storage);

$(document).ready(function() {

    installWidgets();
    init()
    rearrangeWidgets(clicks);
    $('[data-toggle="tooltip"]').tooltip();
});

function installWidgets()
{
    $('#page-wrapper').click(registerWidgetClick);
}

function registerWidgetClick(event)
{
    var widgetId = $(event.target).parentsUntil('.col-sm-6').parent().attr('id');
    addClick(clicks,widgetId);
    storage.setItem('widgets',JSON.stringify(clicks));
    //rearrangeWidgets(clicks);
}

function addClick(container,elementId)
{
    if(typeof elementId == 'undefined') return;

    if(!$('#'+elementId).hasClass('col-sm-6')) return;

    if(typeof container[elementId] == 'undefined')
    {
        container[elementId] = 1;
    }
    else
    {
        container[elementId] += 1;
    }
}

function sortWidgets(widgets)
{
    var sortable = [];
    var sorted = {};

    for (var widgetId in widgets) sortable.push([widgetId, widgets[widgetId]]);

    sortable.sort(function(a, b) {
        return b[1] - a[1];
    });

    for (var i in sortable) sorted[sortable[i][0]] = sortable[i][1];

    return sorted;
}

function initClicks(storage)
{
    var oldClicks = (typeof storage.widgets == 'undefined')? {} : JSON.parse(storage.widgets);
    var newClicks = {};

    $('.col-sm-6').each(function(){
        widgetId = $(this).attr('id');
        newClicks[widgetId] = (typeof oldClicks[widgetId] == 'undefined')? 0 : oldClicks[widgetId];
    });

    storage.setItem('widgets',JSON.stringify(newClicks));

    return newClicks;
}

function rearrangeWidgets(widgets)
{
    var sorted = sortWidgets(widgets);
    var elems = [];

    for (var widgetId in sorted) elems.push($('#'+widgetId));

    $('#widgets-container').html('');

    for (var i in elems) $('#widgets-container').append(elems[i]);
}


//not in use at the moment
function graphInfo(){
    window.location.href = 'morris.php';
    document.getElementById('morris-donut-chart');

}

//button functionality for dragging functionality 
function toggle(button) {
    if (button.value == "OFF") {
        button.value = "ON";
        $('#widgets-container').sortable({
            revert: false
        });

    }else{
        button.value = "OFF";
        $('#widgets-container').sortable({
            disabled: true
        })

    }
}

