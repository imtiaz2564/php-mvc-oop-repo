<?php session_start();//session_unset();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="~/../libs/fontawesome/css/font-awesome.css" rel="stylesheet" />    
    <link rel="stylesheet" href="~/../libs/bootstrap.css"> 
    <script src="~/../libs/jquery.min.js"></script>
    <script src="~/../libs/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <ul class="pagination pagination-sm">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Home</a>
                </li>
<!--                <li class="page-item"><a class="page-link" href="../app/index.php?act=insertView">New Entry</a></li>-->
                <li class="page-item"><a class="page-link" href="../app/index.php?act=loginView">Login</a></li>
                <? if(isset($_SESSION["username"])) { ?>
                <li class="page-item"><a class="page-link" href="../app/index.php?act=logout">Logout</a></li>
                <? } ?>
            </ul>
        </div>
    </nav>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">

<!--                        <h2 class="pull-left">Details</h2>-->
<!--                        <a href="index.php" class="btn btn-success pull-right">Logout</a>-->
<!--                        <a href="view/insert.php" class="btn btn-success pull-right">Add New Sports</a>-->
                    </div>
                    <?php
                        if($result->num_rows > 0){
                            echo "<table id='dtBasicExample' class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";                                        
                                        echo "<th>Category</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";                                        
                                        echo "<td>" . $row['category'] . "</td>";
//                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td><a href='index.php?act=viewdetail&id=". $row['id'] ."'>"
                                         .$row['name'].
                                    "</a></td>";
                                        echo "<td>";
                                        echo "<a href='index.php?act=update&id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>";
                                        echo "<a href='index.php?act=delete&id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
