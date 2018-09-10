<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset="UTF-8" />
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .thumbnail{
            height: 128px;
            width: 128px;
            overflow: hidden;
        }
        .thumbnail img{
            width:100%;
        }
    </style>
</head>
<body>
<table border="0">
    <caption><h2>Danh sách khách hàng</h2></caption>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
    </tr>
    <?php
    $customerlist = array(
        "1" => array("ten" => "Mai Văn Hoàn", "ngaysinh" => "1983-08-20", "diachi" => "Hà Nội", "anh" => "images/customer_1.jpg"),
        "2" =>array("ten" => "Nguyen Văn Nam", "ngaysinh" => "1983-08-21", "diachi" => "Bắc Giang", "anh" => "images/customer_2.jpg"),
        "3" =>array("ten" => "Nguyen Thái Hòa", "ngaysinh" => "1983-08-22", "diachi" => "Nam Định", "anh" => "images/customer_3.jpg"),
        "4" =>array("ten" => "Trần Nam Khoa", "ngaysinh" => "1983-08-17", "diachi" => "Hà Tây", "anh" => "images/customer_4.jpg"),
        "5" =>array("ten" => "Nguyen Văn Thi", "ngaysinh" => "1983-08-19", "diachi" => "Hà Nội", "anh" => "images/customer_5.jpg")
    );
    foreach($customerlist as $key => $values){
        echo "<tr>";
        echo "<td>".$key."</td>";
        echo "<td>".$values['ten']."</td>";
        echo "<td>".$values['ngaysinh']."</td>";
        echo "<td>".$values['diachi']."</td>";
        echo "<td><div class='thumbnail'><image src = '".$values['anh']."'/></div></td>";
        echo "</tr>";
    }
    ?>

</table>
<br>
<form method="get">
    <label> Tìm kiếm </label>
<input type="text" name="search" placeholder="input name">
    <input type="submit" name="submit">
</form>

<table border="0">
    <caption><h2>Kết quả tìm kiếm</h2></caption>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
    </tr>


<?php

$nameSearch = $_GET["search"];
foreach ($customerlist as $key => $customer) {
    $splitName = explode(" ", $customer["ten"]);
    $flag = 0;
    for ($i=0; $i < count($splitName); $i++) {
        if ($nameSearch == $splitName[$i]) {
            $flag = $flag + 1;
            echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td>".$customer["ten"]."</td>";
            echo "<td>".$customer['ngaysinh']."</td>";
            echo "<td>".$customer['diachi']."</td>";
            echo "<td><div class='thumbnail'><image src = '".$customer['anh']."'/></div></td>";
            echo "</tr>";
        }
    }
}
?>
</body>
</html>
