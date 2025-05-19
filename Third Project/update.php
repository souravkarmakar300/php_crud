<?php
include("connection.php");

$id = $_GET['id'];

if ($id == '') {
    header("location:read.php"); //Php Redirection Method
}

$sql    = "SELECT * FROM mamber WHERE id='" . $id . "'";
$result = $conn->query($sql);
$row    = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $update = "UPDATE mamber SET username='{$_POST["fname"]}',email='{$_POST["email"]}',password='{$_POST["pass"]}',gender='{$_POST["gender"]}' WHERE id ='{$id}'";

    if ($conn->query($update) === TRUE) {
        echo "<script>alert('Data Inserted');window.location.href='read.php';</script>"; //JavaScript Redirection Method
    } else {
        echo "Error inserted: " . $sql . "<br>" . $conn->error;
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
                    <div class="card-header text-center fs-4 text-primary">Update Enquery Form</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Full Name:</td>
                                    <td><input type="text" name="fname" class="form-control mb-3" value="<?php if (isset($row["username"])) {
                                        echo $row["username"];
                                    } ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="text" name="email" value="<?php echo $row['email']?>" class="form-control  mb-3"></td>
                                </tr>
                                <tr>
                                    <td>Password:</td>
                                    <td><input type="text" name="pass" class="form-control  mb-3"></td>
                                </tr>
                                <tr>
                                    <td>Image:</td>
                                    <td><input type="file" name="image" class="form-control  mb-3">
                                        <img style="width: 50px; height: 50px;object-fit:cover;" src="./uploads/<?php
                                            echo $row['image'] ?>" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td>Male<input type="radio" name="gender" value="male">Female<input type="radio"
                                            name="gender" value="female"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-primary submit_btn" name="submit"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>
