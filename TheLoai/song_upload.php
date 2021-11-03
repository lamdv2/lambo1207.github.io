<?php
    session_start();
    include 'config.php';

    if(isset($_POST['songsubmit'])){
        $namesong = $_POST['namesong'];
        $singer = $_POST['singer'];
        $anh = $_POST['anh'];
        $nhac = $_POST['nhac'];

        
        $username = $_SESSION["username"];
        $username = preg_replace('/\s+/', '', $username);
        
        $sql = "insert into $username (namesong, singer, anh, nhac) values('$namesong', '$singer', '$anh', '$nhac') ";
        $user = mysqli_query($conn, $sql);

        if($user){
            mysqli_close($conn);
            echo "<script language='javascript'>alert('Đã Upload nhạc thành công!');";
            echo " location.href='user.php';</script>";
        }
        else{
            echo "Upload nhạc thất bại" . mysqli_error($conn);
        }
    }

?>