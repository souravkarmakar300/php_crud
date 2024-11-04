<?php
session_start();
include('connection.php');
error_reporting(1);

if($_SESSION['id']!=''){
    header('Location:profile.php');
}


if(isset($_POST['Login'])){

$select="select * from mamber where email='".$_POST['email']."' and password='".md5($_POST['pwd'])."'";
$query=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($query);
if(mysqli_num_rows($query)>0){

$_SESSION['id']=$row['id'];
header('location:profile.php');
}
else{
    echo "email or password incorrect";
}

}

?>


<div class="container">
    <form action="" method="post">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pwd" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Login" id=""></td>
            </tr>
        </table>
    </form>
</div>