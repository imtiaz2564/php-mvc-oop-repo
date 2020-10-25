<?php
// while($row = mysqli_fetch_array($result)){
// print_r($row);

//       }
//       die();      // require '../model/sports.php'; 
        // session_start();             
        // $sporttb=isset($_SESSION['sporttbl0'])?unserialize($_SESSION['sporttbl0']):new sports();            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="~/../libs/fontawesome/css/font-awesome.css" rel="stylesheet" />    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="~/../libs/bootstrap.css"> -->
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Sports</h2>
                    </div>
                    <p>Please fill this form and submit to add sports record in the database.</p>
                    <form action="../app/index.php?act=updateinfo" method="post" >
                    <? while($row = mysqli_fetch_array($result)){ ?>

                        <div class="form-group <?php //echo (!empty($sporttb->category_msg)) ? 'has-error' : ''; ?>">
                            <label>Sport Category</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $row['category']; ?>">
                            <span class="help-block"><?php //echo $sporttb->category_msg;?></span>
                        </div>
                        <div class="form-group <?php //echo (!empty($sporttb->name_msg)) ? 'has-error' : ''; ?>">
                            <label>Sports Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?> ">
                            <span class="help-block"><?php //echo $sporttb->name_msg;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                        <?}?>
                        <input type="submit" name="updatebtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>