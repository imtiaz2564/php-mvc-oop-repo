<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="~/../libs/fontawesome/css/font-awesome.css" rel="stylesheet" />    
    <link rel="stylesheet" href="~/../libs/bootstrap.css">
    <!-- <link rel="stylesheet" href="../libs/bootstrap.css"> -->
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
                        <h2>Add New Entry</h2>
                    </div>
                    <p>Please fill this form and submit to add sports record in the database.</p>
                    <form action="../app/index.php?act=insert" method="post" >
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control" value="">
                             <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" class="form-control" value="">
                            <span class="help-block"></span>
                        </div>
                        <input type="submit" name="addbtn" class="btn btn-primary" value="Submit">
                        <a href="../app/index.php?act=list" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>