<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    </head>
    <body>
    <body>
    <?php 
        require("connect.php");
        $sql = "select * from theloai";
        $result=mysqli_query($conn , $sql);
        // $row= mysqli_fetch_assoc($result);
    ?>
    <table align="center" border="1" width="600">

        <tr align="center">
            <th>Ten The Loai</th>
            <th>Thu Tu</th>
            <th>An Hien</th>
            <th colspan="2"><a href="add.php">Them</a></th>
        </tr>
        <?php 
            while($row = mysqli_fetch_assoc($result))
            {
        ?>
        <tr>
            <td><?php   echo $row["TenTL"]?></td>
            <td><?php   echo $row["ThuTu"]?></td>
            <td>
                <?php   
                if($row["AnHien"]==1){
                    echo "hiện";
                }
                else{
                    echo "ẩn";
                }
                ?>
            </td>
            <td><a href="update.php?key=<?php echo $row['idTL'];?>">Sửa</a></td>
            <td><a href="delete.php?key=<?php echo $row['idTL'];?>" onclick = "alert('Bạn sẽ xoá dòng này')">Xoá</a> </td>
        </tr>
        <?php
           }
           mysqli_close($conn);
        ?>
    </table>
        </body>
</html>