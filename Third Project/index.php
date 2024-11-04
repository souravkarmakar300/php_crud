<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname    = $_POST["fname"];
    $email    = $_POST["email"];
    $password = $_POST["pass"];
    $image = $_FILES["image"]["name"];
    $gender   = $_POST["gender"];


    $select=mysqli_query($conn,"select * from mamber where email='".$email."'");
    $total  = mysqli_num_rows($select);

    if (empty($fname)) {
        echo "<script>alert('name is empty');</script>"; //JavaScript Redirection Method
    } elseif (empty($email)) {
        echo "<script>alert('email is empty');</script>"; //JavaScript Redirection Method
    } elseif (empty($password)) {
        echo "<script>alert('password is empty');</script>"; //JavaScript Redirection Method
    } elseif (empty($gender)) {
        echo "<script>alert('gender is empty');</script>"; //JavaScript Redirection Method
    } 
    elseif($total!=0){
        echo "<script>alert('Email already exits');</script>";
    }
    elseif (!empty($fname) && !empty($email) && !empty($password) && !empty($gender)) {

        $sql = "insert into mamber(username,email,password,image,gender) value('" . ucwords($fname) . "','$email','" . md5($password) . "', '$image','$gender')";

        // mysqli_query($conn, $sql);

        if ($conn->query($sql) === TRUE) {
            move_uploaded_file($_FILES["image"]['tmp_name'],'./uploads/' .$image);
            echo "<script>alert('Data Inserted');window.location.href='read.php';</script>"; //JavaScript Redirection Method
        } else {
            echo "Error inserted: " . $sql . "<br>" . $conn->error;
        }
    }

}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CURD OPEARATION</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header text-center fs-4 text-danger">Enquery From</div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Full Name:</td>
                                    <td><input type="text" name="fname" class="form-control mb-3" required></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="text" name="email" class="form-control  mb-3" required></td>
                                </tr>
                                <tr>
                                    <td>Password:</td>
                                    <td><input type="password" name="pass" class="form-control  mb-3" required></td>
                                </tr>
                                <tr>
                                    <td>Image:</td>
                                    <td><input type="file" name="image" class="form-control  mb-3" required></td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td>Male<input type="radio" name="gender" value="male" required>
                                        Female<input type="radio" name="gender" value="female" required></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="btn btn-primary submit_btn" name="submit"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        
</body>

</html>