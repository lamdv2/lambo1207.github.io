<?php session_start();
// Nếu click vào nút Lưu Session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="user-name"><?php   echo $_SESSION["username"]?></h2>
    <?php
        include 'config.php';
        $username = $_SESSION["username"];
    
        $username = preg_replace('/\s+/', '', $username);
        
        echo  $username;
    
        $sql = "select * from $username";
        $result=mysqli_query($conn , $sql);
        
    ?>
    <?php 
        while($row = mysqli_fetch_assoc($result))
        {
    ?>
        <div class="song is-flex" 
            ondblclick = "
                alert('Bạn không thể mở được bài này. Vì bạn chưa nạp lần đầu!!!');
                
        ">
            <!-- <div class="thongbao">
                <h3 class="thongbao_content">Chưa thể mở bài này!</h3>
            </div> -->
            <div class="song-left is-flex">
                <div class="thumb" style="background-image: url('<?php   echo $row["anh"]?>')">
                    <i class="ri-play-fill icon-song-play"></i>
                    <img src="./assets/img/home/icon-playing.gif" alt="" class="gif-playing">
                </div>
                <div class="song-body">
                    <h3 class="song-name"><?php   echo $row["namesong"]?></h3>
                    <p class="song-singer"><?php   echo $row["singer"]?></p>
                </div>
            </div>
            <div class="time-total">
                <span>00:00</span>
            </div>
            <div class="song-option" >
                <i class="ri-heart-3-fill icon-heart" id="onclickBacham"></i>
                <a href="song_Update.php?key=<?php echo $row['id'];?>" >
                    <i class="ri-more-fill " ></i>
                </a>
                
                
            </div>
        </div>
    <?php
    }
        mysqli_close($conn);
    ?>
</body>
</html>