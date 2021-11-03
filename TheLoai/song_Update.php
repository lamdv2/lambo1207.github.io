<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <title>update</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <style>
        body{
            background: linear-gradient(90deg, rgba(184,23,105,0.3368697820925245) 0%, rgba(123,53,173,0.6646008745294993) 100%);
        }
    </style>
</head>
<body>
<?php
    include 'config.php';
    include 'login_submit.php';

    $id = $_GET['key'];
    $usernamee = $_SESSION["username"];
    $usernamee = preg_replace('/\s+/', '', $usernamee);
    
    require("config.php");
    $sql = "select * from $usernamee where id =" .$id ;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST["songUpdate"])){
        $namesong = $_POST["namesong"];
        $singer = $_POST["singer"];
        $anh = $_POST["anh"];
        $nhac = $_POST["nhac"];
        $sql = "update $usernamee set namesong = '$namesong', singer = '$singer' , anh = '$anh' , nhac = '$nhac'
            where id = $id" ;
        $result=mysqli_query( $conn, $sql);
        if($result){
            mysqli_close($conn);
            if($_SESSION["level"]==1){
                echo "<script language='javascript'>alert('Update bài hát thành công!');location.href='admin.php';";
                echo "</script>";
            }
            if($_SESSION["level"]==0){
                echo "<script language='javascript'>alert('Update bài hát thành công!');location.href='user.php';";
                echo "</script>";
            }
        }
        else{
            echo "Update Thất bại!!! "  . mysqli_error($conn);
        }
    }
    if(isset($_POST['songDelete'])){
        $sql="delete from $usernamee where id= $id";

        if(mysqli_query($conn, $sql))
        {
            if($_SESSION["level"]==1){
                echo "<script language='javascript'>alert('Xoá thành công!');location.href='admin.php';";
                echo "</script>";
            }
            if($_SESSION["level"]==0){
                echo "<script language='javascript'>alert('Xoá thành công!');location.href='user.php';";
                echo "</script>";
            }
        }
        else{
            if($_SESSION["level"]==1){
                echo "<script language='javascript'>alert('Xoá không thành công!');location.href='admin.php';";
                echo "</script>";
            }
            if($_SESSION["level"]==0){
                echo "<script language='javascript'>alert('Xoá không thành công!');location.href='user.php';";
                echo "</script>";
            }
        }
    }
?>
    <form method="post">
        <div class="songmain song-update">
            <div class="songcontent">
                <h2 class="songheading center">Update Playlist Zing Mp3</h2>
                <p class="songheading-sub center">Cùng nhau tận hưởng âm nhạc
                    <i class="fa fa-heartbeat"></i>
                </p>
                <form action="song_Update.php" method="POST" class="input">
                    <div class="songrow">
                        <p>Tên bài hát</p>
                        <input type="text" name="namesong" value="<?php echo $row['namesong'] ;?>">
                    </div>
                    <div class="songrow">
                        <p>Ca sĩ</p>
                        <input type="text" name="singer" value="<?php echo $row['singer'] ;?>">
                    </div>
                    <div class="songrow">
                        <p>Ảnh</p>
                        <input type="text" name="anh" value="<?php echo $row['anh'] ;?>">
                    </div>
                    <div class="songrow">
                        <p>Link nhạc</p>
                        <input type="file" name="nhac" value="<?php echo $row['nhac'] ;?>">
                    </div>
                    <div class="songrow songsubmit">
                        <input type="submit" name="songUpdate" value="Update" class="songbton">
                    </div>
                    <div class="songrow songsubmit">
                        <input type="submit" name="songDelete" value="Delete" class="songbton">
                    </div>
                </form>
            </div>
        </div>
    </form>
</body>
</html>