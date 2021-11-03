<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <title>update</title>
</head>
<body>

<?php 
    $idTL = $_GET["key"];
    require("connect.php");
    $sql = "select * from theloai where idTL = $idTL";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if (isset($_POST["btnUpdate"])){
        $name = $_POST["txtName"];
        $order = $_POST["txtOrder"];
        $hide = $_POST["sltHide"];
        $sql = "update theloai set TenTL = '$name', Thutu = $order , AnHien = $hide
            where idTL = $idTL" ;
        $result=mysqli_query( $conn, $sql);
        if($result){
            mysqli_close($conn);
            header("location: list.php");
        }
        else{
            echo "Them du lieu that bai "  . mysqli_error($conn);
        }
    }

?>
<form method="post">
        <TABLE>
            <TR>
                <TD><label for="name">Tên thể loại</label></TD>
                <td><input type="text" name="txtName" id="name"
                    value="<?php echo $row['TenTL'] ;?>"
>                    
            </td>
            </TR>
            <TR>
                <td><label for="order">Thứ tự</label></td>
                <td><input type="number" name="txtOrder" id="order"
                              value="<?php echo $row['ThuTu'] ;?>"
                ></td>
            </TR>
            <tr>
                <td><label>Ẩn hiện</label></td>
                <td>
                    <select name="sltHide">
                        <option value="1"
                                <?php
                                     if($row["AnHien"] ==1){
                                         echo "selected";
                                     }
                                ?>
                        >Hiện</option>
                        <option value="0"
                                 <?php
                                     if($row["AnHien"] ==0){
                                         echo "selected";
                                     }
                                ?>
                        >Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="btnUpdate" value="Update"></td>
                <td><input type="reset" name="btnCancel" value="Hủy"></td>
            </tr>
        </TABLE>
    </form>
</body>
</html>