<?php

if($_POST){
    $dbpwd= $row['password'];

    $new = $_POST['new'];

    $old = md5($_POST['old']);

    $confirm = $_POST['confirm'];

    if($dbpwd<>$old){

        echo "Old Password Wrong";

    } elseif ($new <> $confirm) {
        echo "Confirm Password wrong";
    }
    else{

        $upd="update mamber set password='".md5($new)."' where id='".$_SESSION['id']."'";
        mysqli_query($conn,$upd);
        session_unset();
        header('Location:login.php');

    }

}

?>


<div class="container">
    <form action="" method="post">
        <table>
            <tr>
                <td>Old Password</td>
                <td><input type="password" name="old" id=""></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="new" id=""></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="confirm" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" id=""></td>
            </tr>
        </table>
    </form>
</div>