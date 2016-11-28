<?php
/**
 * Created by IntelliJ IDEA.
 * User: ClOwNzInZiSkYzZz
 * Date: 8/4/2016
 * Time: 12:54 PM
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

    <div id="page-wrapper">
        <div class="panel">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Input client information </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">First Name: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="text"  value="First Name">
                                    </div>

                                </br>
                                </br>

                                <label class="col-sm-4 control-label">Last Name: </label>
                                <div class ='col-sm-6'>
                                    <input class="form-control" type="text"  value="Last Name">
                                </div>

                                </br>
                                </br>

                                <label class="col-sm-4 control-label">Address: </label>
                                <div class ='col-sm-6'>
                                    <input class="form-control" type="text"  value="Address">
                                </div>


                                </br>
                                </br>

                                <label class="col-sm-4 control-label">Phone #: </label>
                                <div class ='col-sm-6'>
                                    <input class="form-control" type="tel"  value="Phone #">
                                </div>

                                </br>
                                </br>

                                <label class="col-sm-4" for="creditcard">Select Credit card type:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="creditcard">
                                        <option>ABNA</option>
                                        <option>ING</option>
                                        <option>Rabobank</option>
                                        <option>ANWB</option>
                                        <option>Visa</option>
                                        <option>American Express</option>
                                    </select>
                                </div>

                                </br>
                                </br>

                                <hr>

                                    <strong><label>Banking Information:</label></strong>
                                <div class="col-sm-6">
                                </br>
                                    <label>Insurance infomation</label>
                                    </br>
                                    <label class="col-sm-4 control-label">Insured Item: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="text"  value="Item">
                                    </div>

                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    <label>Loan information</label>
                                    </br>

                                    <label class="col-sm-4 control-label">Amount: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="number" >
                                    </div>
                                    </br>
                                    </br>

                                    <label class="col-sm-4 control-label">Outstanding: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="Number"  value="Item">
                                    </div>
                                    </br>
                                    </br>

                                    <label class="col-sm-4 control-label">rate: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="number" value="Item">
                                    </div>
                                    </br>
                                    </br>

                                    <label class="col-sm-4 control-label">Start date: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="date" value="Item">
                                    </div>
                                    </br>
                                    </br>

                                    <label class="col-sm-4 control-label">End date: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="date" value="Item">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Credit Information</label>
                                    </br>
                                    <label class="col-sm-4 control-label">Amount: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="number" value="Item">
                                    </div>
                                    </br>
                                    </br>
                                    </br>
                                    </br>

                                    <label>Payment Information</label>
                                    </br>
                                    <label class="col-sm-4 control-label">Payment type: </label>
                                    <div class ='col-sm-6'>
                                        <select class="form-control" id="creditcard">
                                            <option>Cash</option>
                                            <option>Debit</option>
                                            <option>Credit</option>
                                        </select>
                                    </div>
                                        </br>
                                        </br>

                                        <label class="col-sm-4 control-label">Product: </label>
                                        <div class ='col-sm-6'>
                                            <input class="form-control" type="text" valu="Product">
                                        </div>
                                        </br>
                                        </br>

                                    <label>Lease Information</label>
                                    </br>
                                    <label class="col-sm-4 control-label">Items: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="text" value="Item">
                                    </div>
                                    </br>
                                    </br>


                                    <label class="col-sm-4 control-label">Years Leased: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="number" value="Item">
                                    </div>
                                    </br>
                                    </br>

                                    <div>
                                        </br>
                                        </br>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Investment infomation</label>
                                    </br>
                                    <label class="col-sm-4 control-label">Investment Item: </label>
                                    <div class ='col-sm-6'>
                                        <select class="form-control" id="creditcard">
                                            <option>ABNA</option>
                                            <option>ING</option>
                                            <option>Rabobank</option>
                                            <option>ANWB</option>
                                            <option>Visa</option>
                                            <option>American Express</option>
                                        </select>
                                    </div>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    <label>Vest_termijn_sparen</label>
                                    </br>

                                    <label class="col-sm-4 control-label">Amount: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="number" >
                                    </div>
                                    </br>
                                    </br>

                                    <label class="col-sm-4 control-label">From: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="date" value="Item">
                                    </div>
                                    </br>
                                    </br>

                                    <label class="col-sm-4 control-label">TO: </label>
                                    <div class ='col-sm-6'>
                                        <input class="form-control" type="date" value="Item">
                                    </div>

                                </div>

                            </div>

                           <center> <button type="submit" class="btn btn-default">Submit</button></center>

                        </form>




                    </div>
                    <div class="panel-footer">
                        <p> this is the footer</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</div>


</body>
</html>