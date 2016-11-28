/**
 * Created by ClOwNzInZiSkYzZz on 9/27/2016.
 */

/** retrieving data from sheet and displaying it in a graph
 * in the morris and index page is where these functions are used
 **/

var spreadsheet_url = 'https://docs.google.com/spreadsheets/d/16tb_sP6jdk5ZiB7M0e-GgiTijDFzRJciQsF8OZsU-I8/pubhtml?gid=1961267003&single=true';

function init(){
    Tabletop.init({
        key: spreadsheet_url,
        callback: showInfo,
        simpleSheet: true})
};

function showInfo(data){

    console.log(data);

    var  radarData = {
        labels: radarLabels(data),

        datasets: [{
            label: 'Android',
            data: firstValue(data),
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(255,99,132,1)'],
            pointBackgroundColor: "rgba(179,181,198,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(255,99,132,1)"
        },{
            label: 'iPhone',
            data: secondValue(data),
            backgroundColor: "rgba(179,181,198,0.2)",
            borderColor: "rgba(179,181,198,1)",
            pointBackgroundColor: "rgba(179,181,198,1)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(179,181,198,1)"
        }]
    };
    var ctx = document.getElementById("myfirst");
    var myBarChart = new Chart(ctx, {
        type: 'radar',
        data: radarData,
        options: {
            title: {
                display: true,
                text: 'The daily difference between iPhone and Android'
            },
            responsive:true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });


    var pieData = {
        labels: xValue(data),
        datasets:[{
            data: yValue(data),
            backgroundColor:  ['rgba(255, 99, 132, 0.2)',
            'rgba(0, 204, 0, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(127, 0, 255, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(0, 0, 0, 0.2)',
            'rgba(0, 51, 0, 0.2)',
            'rgba(154, 204, 255, 0.2)',
            'rgba(0, 0, 102, 0.2)',
            'rgba(255, 0, 0, 0.2)'],

            hoverBackgroundColor: ['rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(138,0,0,1)'],
        }]
    };
    var ctx1 = document.getElementById("mysecond");
    var myPieChart = new Chart(ctx1, {
        type: 'pie',
        data: pieData,
        options:{
            title: {
                display: true,
                text: "Total amount of mentions per topic"},
            animateRotate: true,
        }
    });

    var douData = {
        labels: duoLabel(data),
        datasets:[{
            data: duoValue(data),
            backgroundColor:['rgba(204,0,0,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(51, 0, 51, 1)',
                'rgba(0, 206, 0, 1)',
                'rgba(0, 51, 0, 0.2)',
                'rgba(154, 204, 255, 0.2)',
                'rgba(0, 0, 102, 0.2)',
                'rgba(138,0,0,1)'],

            hoverBackgroundColor:['rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 0, 0, 0.2)'],

        }],
    }
    var ctx2 = document.getElementById("mythird");
    var myDouChart = new Chart(ctx2, {
        type: 'doughnut',
        data:douData,
        options:{
            title: {
                display: true,
                text: "Number of Windows users tweeting about the products"},
            animateScale: true,
        }
    })
    
    var lineData = {
        labels: lineLabels(data),
        datasets:[{
            label: 'Asmterdam',
            data: adamValue(data), //[6,91,5,10,0,0]
            fill: false,
            borderDash: [5,5],
            backgroundColor: "rgba(75,192,192,0.4)"
        },{
            label: 'Utrecht',
            data: utValue(data),
            fill: false,
            borderDash: [5,5],
            backgroundColor: "rgba(250,0,0,0.4)"
        },{
            label: 'Rotterdam',
            data: rotValue(data),
            fill: false,
            borderDash: [5,5],
            backgroundColor: "rgba(102,204,0,0.4)"
        }]
    };
    var ctx3 = document.getElementById("myfourth");
    var lineChart = new Chart(ctx3, {
        type: 'line',
        data: lineData,
        options:{
            title: {
                display: true,
                text: 'Line Graph displaying the difference amongst the Service in each city over time   '
            },
            responsive: true,
            legend:{
                position: 'bottom'
            },
            hover:{
                model: 'label'
            },
            scales:{
                xAxes:[{
                    display: true,
                    scaleLabel:{
                        display: true,
                        labelString: 'Services'
                    }
                }],
                yAxes:[{
                    display: true,
                    scaleLabel:{
                        display: true,
                        labelString: '# of Tweets'
                    }
                }]
            }
        }
    })

};


//functions for radar to pass the values
function radarLabels(arg){

    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Product);
    }
    return temp;
};

function firstValue(arg){
    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Android);
    }
    return temp;
};

function secondValue(arg){
    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].iPhone);
    }
    return temp;
};

//function for the pie to pass the values
function xValue(arg){

    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Product);
    }
    return temp;
};

function yValue(arg){
    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Facebook);
    }
    return temp;
};

//function for the douData to pass the values

function duoLabel(arg){

    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Product);
    }
    return temp;

};

function duoValue(arg){
    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Windows);
    }
    return temp;
};

//function for the lineData to pass the values
function lineLabels(arg){

    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Product);
    }
    return temp;
};

function adamValue(arg){
    var temp = [];
    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Amsterdam);
    }
    console.log(typeof temp);
    return temp;
};

function utValue(arg){
    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Utrecht);
    }
    return temp;
};

function rotValue(arg){
    var temp = [];

    for(var i = 0; i < arg.length; i++){
        temp.push(arg[i].Rotterdam);
    }
    console.log(typeof temp);
    return temp;
};