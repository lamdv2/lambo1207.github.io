<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
</head>
<body>
    <?php
        require("connect.php");
        if(isset($_POST["btnAdd"])){
            $name = $_POST["txtName"];
            $order = $_POST["txtOrder"];
            $hide = $_POST["sltHide"];
            $sql = "insert into theloai (TenTL, ThuTu, AnHien)
            values ('$name', $order, $hide)";

            $result = mysqli_query($conn, $sql);
            if($result){
                mysqli_close($conn);
                header("location: list.php");
            }
            else{
                echo "Thêm dữ liệu thất bại" . mysqli_error($conn);
            }
        }

    ?>

    <form action="" method = "post">
        <table>
            <tr>
                <td><label for="name">Tên thể loại</label></td></tr>
                <td><input type="text" name = "txtName" id = "name"></td>
            </tr>
            
            <tr>
                <td> <label for="order">Thứ tự</label></td>
                <td><input type="text" name="txtOrder" id="order"></td>
            </tr>

            <tr>
                <td><label>Ẩn hiện</label></td>
                <td>
                    <select name="sltHide" id="">
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name = "btnAdd" value = "Thêm"></td>
                <td><input type="reset" name = "btnCancel" value = "Huỷ"></td>
            </tr>
        </table>
    </form>
</body>
</html>