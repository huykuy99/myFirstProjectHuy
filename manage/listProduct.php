<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiện thị tất cả sản phẩm</title>
    <style>
        table, th, td {
        border: 1px solid black;
        
    
}
td, th {
    padding: 8px;
}
        table {
        border-spacing: 0px;
        margin-left: 2rem;
}
a {
    text-decoration: none;
    color: #808000;
}
a:hover {
    color: #e62e00; 
}
    </style>
</head>
<body>
<?php
        if(!isset($_SESSION["admin_info"]["admin_phone"])) {
            header('location:http://localhost/baitapthunhat/manage/index.php');
        }
        include("headerAdmin.php");
?>
    
<table>
    <caption style="color: red;">Tất cả loại sản phẩm</caption>
    <tr>
        <th>Mã loại sản phẩm</th>
        <th>Tên loại sản phẩm</th>
        <th>Trạng thái</th>
        <th colspan="4" style="background: #808000"></th>
    </tr>
<?php
        include("connect2.php");
        $sql1 = "SELECT * from product_type";
        $res1 = mysqli_query($conn, $sql1);
        while($row1 = mysqli_fetch_array($res1)) {
    ?>
        <tr>
            <td><?php echo $row1["type_id"]; ?></td>
            <td><?php echo $row1["type_name"]; ?></td>
            <td style="text-align: center;"><?php if($row1["status"] == 0) {echo "ON";} else {echo "OFF";} ?></td>
            <td><a href="listProduct.php?type_id=<?php echo $row1["type_id"]; ?>">Xem chi tiết</a></td>
            <td><a href="updateTypeProduct.php?type_id=<?php echo $row1["type_id"]; ?>">Sửa</a></td>
            <td><a onclick="return confirm('Bạn có chắc muốn chặn loại sản phẩm này?')" href="deleteTypeProduct.php?type_id=<?php echo $row1["type_id"]; ?>">Chặn</a></td>
            <td><a onclick="return confirm('Bạn có chắc muốn bỏ chặn loại sản phẩm này?')" href="deleteTypeProduct.php?type_id2=<?php echo $row1["type_id"]; ?>">Bỏ chặn</a></td>
        </tr>
    <?php        
        }
    ?>

</table>
<hr> 

<?php   
    if (isset($_REQUEST["type_id"])) {
        $type_id = $_REQUEST["type_id"];
?>
<table>
<caption><h2>Các sản phẩm có mã loại = <?php echo $type_id; ?></h2></caption>
<tr>
    <th>Mã sản phẩm</th>
    <th>Tên sản phâm</th>
    <th>Giá</th>
    <th>Ảnh sản phẩm</th>
    <th>Trạng thái</th>
    <th colspan="3" style="background: #808000"></th>
</tr>
<?php
        $sql2 = "SELECT * from products where id_type_product = '$type_id'";
        $res2 = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_array($res2)) {
?>
        <tr>
            <td><?php echo $row2["id_product"]; ?></td>
            <td><?php echo $row2["name_product"]; ?></td>
            <td><?php echo number_format($row2["price"]); ?> VNĐ</td>
            <td><img src="<?php echo $row2["product_image"]; ?>" alt="" width="100px"></td>
            <td style="text-align: center;"><?php if($row2["status"] == 0) {echo "ON";} else {echo "OFF";} ?></td>
            <th><a href="updateProduct.php?product_id=<?php echo $row2["id_product"]; ?>">Sửa</a></th>
            <th><a onclick="return confirm('Bạn có chắc muốn chặn sản phẩm này?')" href="deleteProduct.php?product_id=<?php echo $row2["id_product"]; ?>">Chặn</a></th>
            <th><a onclick="return confirm('Bạn có chắc muốn bỏ chặn sản phẩm này?')" href="deleteProduct.php?product_id2=<?php echo $row2["id_product"]; ?>">Bỏ chặn</a></th>
        </tr>
    <?php
        }
    }
    ?>
</table>
</body>
</html>