<?php
/**
 * Created by IntelliJ IDEA.
 * User: ClOwNzInZiSkYzZz
 * Date: 7/19/2016
 * Time: 8:32 AM
 */

include'./includes/functions.php';

//connect($conn);

//retrieveData($retval);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>TestDataTable</title>
    <!--Javascript links-->
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.myTables').DataTable({
                responsive: true
            });
        } );
    </script>

    <!--CSS links-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <!--Any other links goes here-->


</head>
<body>
<div >
    <div>
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
</body>
</html>