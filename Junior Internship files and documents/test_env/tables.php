<?php
/**
 * Created by IntelliJ IDEA.
 * User: ClOwNzInZiSkYzZz
 * Date: 8/4/2016
 * Time: 9:01 AM
 */
include './includes/head.php';

?>
<body>
<div class="wrapper">

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
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>

                    <a href="inputInfo.php"><i class="fa fa-bar-chart-o fa-fw"></i> Form </span></a>

                </li>
                <li class="active">
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

    <div id="page-wrapper">


        <div class='row'>
            <div class="col-sm-4">
                <?php
                $tables = getTables();
                printResultTable($tables,'tables')
                ?>
            </div>

            <br/>

            <?php foreach($tables as $table)
            {
                ?>
                <div>
                    <?php
                    $columns = getTableColumns($table['Tables_in_bankclient']);
                    printResultTable($columns,$table['Tables_in_bankclient']);
                    ?>
                </div>
                <br/>
                <?php
            }
            ?>
        </div>

    </div>

</div>


</body>
</html>