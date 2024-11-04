<?php
session_start();
include('connection.php');
//print_r($_SESSION['id']);

if ($_SESSION['id'] == '') {
    header('Location:login.php');
} else {
    $select = "select * from mamber where id='" . $_SESSION['id'] . "'";
    $query  = mysqli_query($conn, $select);
    $row    = mysqli_fetch_assoc($query);
}
?>




<img src="./uploads/<?php echo $row['image']; ?>" alt="" height="200" width="200">
<h1>Welcome To
    <?php echo $row['username']; ?>
</h1>

<h4><a href="logout.php">Logout</a></h4>

<a href="profile.php">Home</a>

<a href="profile.php?page=change_pwd">change password</a>

<?php


if (isset($_GET['page'])) {

    $page = $_GET['page'];

    include($page . '.php');

}
?>