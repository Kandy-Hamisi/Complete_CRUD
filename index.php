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

    
<div class="container">
    <?php
        $mysqli = new mysqli('localhost', 'root', 'password', 'crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>
        <!-- // pre_r($result);
        // pre_r($result->fetch_assoc()); -->

    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
    <?php
        while ($row = $result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['location'];?></td>
                <td>
                    <a href="change.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
    </div>

    <?php
        function pre_r($array) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>
   
</div>


<script src="Jquery/jquery-3.4.1.slim.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>