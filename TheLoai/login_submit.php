<?php
    
    session_start();
    include 'config.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $password = md5($password);

        $sql = "select * from signin where username='$username' and password = '$password'";
        $user = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($user);

        $sqll = "select id from signin where username='$username' and password = '$password'";
        $userr = mysqli_query($conn, $sqll);

        if(mysqli_num_rows($userr) > 0){
            $roww = mysqli_fetch_assoc($userr);
            $_SESSION["id"] = $roww["id"];
        }

        if(mysqli_num_rows($user) > 0){
            $_SESSION["username"] = $username;
            $_SESSION["level"] = $row["level"];
            echo "<script language='javascript'>alert('Đăng nhập thành công!  Hãy tạo Playlist riêng cho mình');";
            echo "</script>";
            
            if($_SESSION["level"]==1){
                echo "<script language='javascript'>location.href='admin.php';";
                echo "</script>";
            }
            if($_SESSION["level"]==0){
                echo "<script language='javascript'>location.href='user.php';";
                echo "</script>";
            }
        }
        else{
            echo "<script language='javascript'>alert('Bạn đã nhập sai username or password');";
            echo " location.href='index.php';</script>"; 
        }
    }

    if(isset($_POST['btnDangKy'])){
        echo "<script language='javascript'>alert('Đăng nhập không thành công!');";
        echo "alert('Bạn đã bấm nhầm vào Đăng Ký');";
        echo " location.href='index.php';</script>";
    }
?>