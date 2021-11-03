<?php session_start();
// Nếu click vào nút Lưu Session
if (isset($_POST['save-session']))
{
    // Lưu Session
    $_SESSION['name'] = $_POST['username'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div class="songrow">
            <p>Nhập a : </p>
            <input type="text" name="a" class="a" >
        </div>
        <div class="songrow">
            <p>Nhập b :</p>
            <input type="text" name="a" class="b">
        </div>
        <div class="songrow">
            <p>Tổng = </p>
            <input type="text" name="tong" class="tong">
        </div>
        <button type="button" onclick="TinhTong()">Tính tổng</button> <br>
        <script>
            function TinhTong(){
                var a = document.querySelector('.a').value
                var b = document.querySelector('.b').value
                
                a = parseFloat(a); 
                b = parseFloat(b);
                var tong = a+b;

                document.querySelector('.tong').value = tong;
            }
            
        </script>
    </body>
</html>