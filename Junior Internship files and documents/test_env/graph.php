<?php
/**
 * Created by IntelliJ IDEA.
 * User: ClOwNzInZiSkYzZz
 * Date: 8/4/2016
 * Time: 3:36 PM
 */

include './includes/head.php';


?>

<body>
<div class="wrapper">
    <!--nav area-->

    <div class="nav navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li class="active">
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>

                    <a href="inputInfo.php"><i class="fa fa-bar-chart-o fa-fw"></i> Form </span></a>

                </li>
                <li>
                    <a href="tables.php"><i class="fa fa-table fa-fw"></i> Tables</a>
                </li>
                <li>
                    <a href="graph.php"><i class="fa fa-edit fa-fw"></i> Graph </a>
                </li>

                <li>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="login.php">Login Page</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>

    <p><a href="https://docs.google.com/spreadsheets/d/13gSIxia5Gau6NDIJ3wzBgr3wV0DurmjertnNrL-hQ98/pubhtml">this is the source: https://docs.google.com/spreadsheets/d/13gSIxia5Gau6NDIJ3wzBgr3wV0DurmjertnNrL-hQ98/pubhtml</a></p>
    <!-- charting panels-->
    <div id="page-wrapper">

        <div  class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class =" panel-heading">Graph</div>
                <div id="1" class="panel-body">
                    <canvas id="myCanvas" height="400" width="400"></canvas>
                </div>
                </div>
            </div>

            <div  class="col-sm-6">
                <div id="2" class="panel">
                    <center>
                        <div class="panel-heading"><h3><small>Second graph</small></h3></div>
                        <div class="panel-body">
                            <h1>chart going here</h1>
                        </div>
                        <div class="panel-footer">Description of chart</div>
                    </center>
                </div>
            </div>


        </div>

        <hr/>
        <hr/>
        <!-- this marks the end of the chart panel-->

    </div>



</div>

<!--Chartjs plugin Javascript-->

<script src="js/chartjs/Chart.js"></script>

<!--this is for the tableTop content-->
<script src="tabletop-master/src/tabletop.js"></script>

<script>
    $(document).ready(function(){
        init();
    });
    var spreadsheet_url = 'https://docs.google.com/spreadsheets/d/13gSIxia5Gau6NDIJ3wzBgr3wV0DurmjertnNrL-hQ98/pubhtml';

    function init(){
        Tabletop.init({
            key: spreadsheet_url,
            callback: showInfo,
            simpleSheet: true})
    };

    function showInfo(data){

        var ctx = document.getElementById("myCanvas");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nameValue(data),

                datasets: [{
                    label: '# of Votes',
                    data: ageValue(data),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 0, 0, 0.2)',
                        'rgba(0,255,0,0.2)',
                        'rgba(0,0,255,0.2)',
                        'rgba(0,0,251,0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(138,0,0,1)',
                        'rgba(0,138,0,1)',
                        'rgba(0,0,138,1)',
                        'rgba(198,0,0,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
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

        console.log(data[0].facebook);
    };

    function nameValue(arg){

        var temp = [];

        for(var i = 0; i < arg.length; i++){
            temp.push(arg[i].Product);
        }
        return temp;
    };

    function ageValue(arg){
        var temp = [];

        for(var i = 0; i < arg.length; i++){
            temp.push(arg[i].facebook);
        }
        return temp;
    };

</script>

<script>

    $(document).ready(function(){
        elems = new elements();

        function elements(){
            this.elements = [];
            this.elementClicks = [];
            this.addElem = function(element, clicks){
                var eCount = this.elementClicks.indexOf(element);


                if( eCount < 0){
                    var newElement = new this.element(element,clicks);

                    this.elements.push(newElement);
                    this.elementClicks.push(element);
                }else{
                    //testing the change by removing the zero and adding var eCount
                    this.elements[eCount].clicks += 1;
                }
            },

                this.element = function(element,clicks){
                    this.elem = element;
                    this.clicks = 1;

                    if(typeof(clicks) != 'undefined'){
                        this.clicks = parseInt(clicks);
                    }

                }
        }

        $('#page-wrapper').click(function(e){
            elems.addElem(e.target);
            console.log(elems);
        })

    });

</script>


</body>