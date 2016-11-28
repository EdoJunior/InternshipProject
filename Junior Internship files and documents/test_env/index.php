<?php
/**
 * Created by IntelliJ IDEA.
 * User: ClOwNzInZiSkYzZz
 * Date: 8/4/2016
 * Time: 9:01 AM
 */
include './includes/head.php';

$widgets = array(
    array('id' => 'first', 'title' => 'Title widget 1', 'description' => 'description widget 1'),
    array('id' => 'second', 'title' => 'Title widget 2', 'description' => 'description widget 2'),
    array('id' => 'third', 'title' => 'Title widget 3', 'description' => 'description widget 3'),
//    array('id' => 'fourth', 'title' => 'Title widget 4', 'description' => 'description widget 4'),
);

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


    <!-- charting panels-->
    <div id="page-wrapper">

                <div id="widgets-container" class="row">

                    <?php
                    foreach($widgets as $widget)
                    {
                        echo '<div id="'.$widget['id'].'" class="col-sm-3">';
                        echo '<div class="panel">';
                        echo '<div class="panel-heading"><h3><small>'.$widget['title'].'</small></h3></div>';
                        echo '<div class="panel-body">';
                        echo '<h1>chart going here</h1>';
                        echo '</div>';
                        echo '<div class="panel-footer">'.$widget['description'].'</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>

                </div>

        <hr/>
        <hr/>
        <!-- this marks the end of the chart panel-->

        <!--Extra content will go here i guess-->
<!--            <div class="col-sm-3">
                <div class="col-md-08" style="background: green">
                    <button type="button"   id="button" name="btn"> Click me</button>
                    <p id="answer1"></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="col-md-04" style="background: yellow">
                    <button type="button"   id="btn" name="btn"> Click me</button>
                    <p id="answer1"></p>
                </div>
            </div>

        <p id="answer1"></p>



        -->
    </div>



</div>


<script>

    var storage = localStorage;
    var clicks = initClicks(storage);

    $(document).ready(function() {
        installWidgets();

        rearrangeWidgets(clicks);
    });

    function installWidgets()
    {
        $('#page-wrapper').click(registerWidgetClick);
    }

    function registerWidgetClick(event)
    {
        var widgetId = $(event.target).parentsUntil('.col-sm-3').parent().attr('id');
        addClick(clicks,widgetId);
        storage.setItem('widgets',JSON.stringify(clicks));
        //rearrangeWidgets(clicks);
    }

    function addClick(container,elementId)
    {
        if(typeof elementId == 'undefined') return;

        if(!$('#'+elementId).hasClass('col-sm-3')) return;

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

        $('.col-sm-3').each(function(){
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
</script>

</body>
</html>