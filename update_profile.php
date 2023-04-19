<?php
require 'config.php';

$id = $_GET['img_id'];

if(isset($_POST['submit'])){
    if(isset($_FILES['image'])){
        $errors = array();
        $filename = rand(1,10).$_FILES['image']['name'];
        $tmpname = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
        $filetype = $_FILES['image']['type'];
        $extension = array('jpg','jpeg','webp','png','jfif','psd');
        $file =  explode('.',$filename);
        // echo "<pre>";
        // print_r($file);
        // echo "</pre>";
        $file_ext = end($file);
        // echo $filename;
        // echo $file_ext;
        if(in_array($file_ext,$extension)===false){
            $errors[] = "";
        }
        if($size > 3145728){
            $errors[] = "";
        }
        if(empty($errors)==true){
            move_uploaded_file($tmpname,'media/'.$filename);
        }
        else if(empty($errors)==false){
            echo "<script>alert('Please chk the file size or format');</script>";
            // echo "<script>window.location.href='http://localhost:82/file_global/img_crud.php';</script>";
            die();
        }
        $profile = $_FILES['image']
    $update_sql = "UPDATE admin SET img ='{$filename}' WHERE a_id = '{$id}'";
    $res = mysqli_query($con,$update_sql);
    if($res){}
    echo "<script>window.location.href='http://localhost:82/file_global/view.php';</script>";
}
    }
    $fetch_sql = "SELECT * FROM admin WHERE a_id = '{$id}'";
    $res_fetch = mysqli_query($con,$fetch_sql);
    $total_rows = mysqli_num_rows($res_fetch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
         <div class="mt-5 row justify-content-center">
            <div class="col-5">
                <h2 class="text-center" style="color:blue;">Update Profile</h2>
                <?php
                if($total_rows!=0){
                    while($data=mysqli_fetch_assoc($res_fetch)){
                  
                ?>
                <form enctype="multipart/form-data" method="POST">
                    <label class="form-label">Profile</label>
                    <input type="file" name="image" class="form-control" value="">
                    <input type="submit" name="submit" value="Register" class="mt-2 btn btn-primary btn-outline-light">
                </form>
                <?php
                    }
                }
                ?>

            </div>
         </div>
    </div>
    <?php
    
    ?>
</body>
</html>

