<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <title>update</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
<?php
    include 'config.php';
    
    $id = $_GET["key"];
    require("config.php");
    $sql = "select * from music where id =" .$id ;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST["songUpdate"])){
        $namesong = $_POST["namesong"];
        $singer = $_POST["singer"];
        $anh = $_POST["anh"];
        $nhac = $_POST["nhac"];
        $sql = "update music set namesong = '$namesong', singer = '$singer' , anh = '$anh' , nhac = '$nhac'
            where id = $id" ;
        $result=mysqli_query( $conn, $sql);
        if($result){
            mysqli_close($conn);
            header("location: index.php");
        }
        else{
            echo "Update Thất bại!!! "  . mysqli_error($conn);
        }
    }
    if(isset($_POST['songDelete'])){
        $sql="delete from music where id= $id";

        if(mysqli_query($conn, $sql))
        {
            echo "<script language='javascript'>alert('Xoá thành công');";
            echo "location.href='index.php';</script>";
        }
        else{
            echo "<script language='javascript'>alert('Xoá thành không công');";
            echo "location.href='#';</script>";
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