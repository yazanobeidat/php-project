<?php


session_start();
// include "header2.php";

$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "ecommerce";
$conn= new mysqli($hostName,$userName,$password,$dbName);

if(isset($_SESSION['user_name'])){
    $name=$_SESSION['user_name'];
    
$sql = "SELECT * FROM users WHERE first_name= '$name'";
$result = $conn->query($sql);
}



if (isset($_POST['update_image'])) {


    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE first_name= '$name'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'image updated succssfully!';
        }
    }
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>User page</title>
</head>

<body>


    <div class="container-xl px-4 mt-4">

        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="submit" value="update profile" name="update_image" class="btn btn-primary col-xl-12">
                        <input class="btn " type="file" name="update_image" accept="image/jpg, image/jpeg, image/png">
                        <div class="card-body text-center">
                            <!-- <img class="img-account-profile rounded-circle mb-2" src="./images/IMG_20181003_230936_111.jpg" alt=""> -->

                    </form>

                    <?php

                    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE first_name= '$name'") or die('query failed');
                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    if ($fetch['image'] == '') {
                        echo ' <img class="img-account-profile rounded-circle mb-2" style="height:150px; width:150px;" src="img/default-avatar.png" alt="Avatar image ">';
                    } else {
                        echo '<img class="img-account-profile rounded-circle mb-2" style="height:150px; width:150px;" src="img/' . $fetch['image'] . '">';
                    } ?>

                    <div class="info">
                        <h3><?php echo $fetch['first_name'] . ' ' . $fetch['last_name']; ?></h3> <br>
                        <h3><?php echo $fetch['email']; ?></h3> <br>
                        <h3><?php echo $fetch['phone'] . ' <br> ' . $fetch['birthday']; ?></h3> <br>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">

                    <!-- let's try to change names  -->


                    <?php if (isset($_POST['update_profile'])) {



                        $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
                        $update_last = mysqli_real_escape_string($conn, $_POST['update_last']);
                        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
                        $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
                        $update_date = mysqli_real_escape_string($conn, $_POST['update_date']);

                        mysqli_query($conn, "UPDATE `users` SET first_name = '$update_name', last_name = '$update_last', email = '$update_email', phone = '$update_phone', birthday = '$update_date' WHERE id = '$user_id'") or die('query failed');
                    }
                    ?>


                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" name="update_name" type="text" placeholder="Enter your first name" value="<?php echo $fetch['first_name']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" name="update_last" type="text" placeholder="Enter your last name" value="<?php echo $fetch['last_name']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" name="update_email" type="email" placeholder="Enter your email address" value="<?php echo $fetch['email']; ?>">
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" name="update_phone" type="tel" placeholder="Enter your phone number" value="<?php echo $fetch['phone']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" name="update_date" type="date" placeholder="Enter your birthday" value="<?php echo $fetch['birthday']; ?>">
                            </div>
                        </div>
                        <input type="submit" value="update profile" name="update_profile" class="btn btn-primary">
                        <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                    </form>

                    <hr class="mt-0 mb-4">

                </div>

               

                <!-- Delete account card-->
                <div class="card mb-4">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                        <button class="btn btn-danger-soft text-danger" type="button">I understand, delete my account</button>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>