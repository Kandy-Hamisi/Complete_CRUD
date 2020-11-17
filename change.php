<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php require_once 'process.php'; ?>
<?php
        if (isset($_SESSION['message'])):?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
            
        </div>
    <?php endif ?>
<?php
$mysqli = new mysqli('localhost', 'root', 'password', 'crud') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);

?>

<div class="row justify-content-center">
        <form action="process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <input type="text" class="form-control" name="location" value="<?php echo $location; ?>" placeholder="Enter your lcoation">
            </div>
            <div class="form-group">
                <?php
                    if($update == true):
                ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                    <?php else: ?>    
                <button type="submit" class="btn btn-primary" name="save">Save</button>
                    <?php endif; ?>
            </div>
        </form>
    </div>
<script src="Jquery/jquery-3.4.1.slim.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>