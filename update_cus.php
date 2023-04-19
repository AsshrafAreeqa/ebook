<?php
require 'config.php';
$id = $_GET['cus_id'];
$fetch_sql = "SELECT * FROM customer WHERE c_id = '{$id}'";
$res = mysqli_query($con,$fetch_sql);
$total_rows = mysqli_num_rows($res);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
<div class="container">
       <div class="mt-5 justify-content-center">
        <div class="col-8">
            <h2 class="text-center">Registration Form</h2>
            <?php
            if($total_rows!=0){
              while($data=mysqli_fetch_assoc($res)){
            ?>
            <form method="POST">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
                <label class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control">
                <input type="submit" name="register" value="Update Record" class="btn btn-primary btn-outline-light">
            </form>
            <?php
              }
            }
            ?>
        </div>
       </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
$update_sql = "UPDATE customer SET c_name = '{$username}',c_email = '{$email}', contact = '{$contact}' where c_id = '{$id}'";
$result = mysqli_query($con,$update_sql);
if($result){
    echo "<script>window.location.href='http://localhost:82/project/admin/dashboard.php'</script>";
}

}
?>