<?php

    $con=mysqli_connect("localhost","root","","test");
    if(!$con){
        die("NOT CONNECTED".mysqli_error_connect());
    }

    if(isset($_POST['login'])){
        $n1 = $_POST['admin'];
        $p1 = $_POST['pass'];

        if($n1 && $p1){
            $query = "select * from users where username='$n1' and password='$p1'";
            $result = mysqli_query($con,$query);
            $rows = mysqli_num_rows($result);

            if($rows>0){
                $row = mysqli_fetch_assoc($result);
                echo "welcome  : ".$row['username'];
                exit;
            }

            $query = "select * from users where username='$n1'";
            $result = mysqli_query($con,$query);
            $rows = mysqli_num_rows($result);

            if($rows>0){
                echo '<script>alert("Ooopssss.....INCORRECT PASSWORD...!!!")</script>';
                //header("Location: http://localhost/Login.php/");
            }
            else{
                echo '<script>alert("USER DETAILS NOT FOUND...PLEASE REGISTER")</script>';
                echo '<form method="POST">
                        USER NAME: <input type="text" name="rn1">
                        <br><br>
                        PASSWORD : <input type="password" name="rp1">
                        <br><br>
                        <input type="submit" name="register" value="REGISTER">
                </form>';
                exit;
            }
        }
    }

    if(isset($_POST['register'])){
        $u1 = $_POST['rn1'];
        $pwd = $_POST['rp1'];

        if( $u1 && $pwd){
            $query = "insert into users values('$u1','$pwd')";
            $result = mysqli_query($con,$query);
            echo '<script>alert("INSERTED SUCCESSFULLY")</script>';
        }
    }
?>
<form method="POST">
  <center>
    <input type="text" name="admin" placeholder="ENTER USERNAME">
    <br><br>
    <input type="password" name="pass" placeholder="ENTER PASSWORD">
    <br><br>
    <input type="submit" value="LOGIN" name="login">
    <br><br>
  </center>
</form>
