<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            height: 60px;
            width: 100px;
            overflow: hidden;
        }
        .thumbnail img{
            width:100%;
        }
    </style>
</head>
<body>
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
    $customerlist = array(
        "1" => array("ten" => "Mai Văn Hoàn", "ngaysinh" => "1983-08-20", "diachi" => "Hà Nội", "anh" => "images/customer_1.jpg"),
        "2" =>array("ten" => "Nguyễn Văn Nam", "ngaysinh" => "1983-08-21", "diachi" => "Bắc Giang", "anh" => "images/customer_2.jpg"),
        "3" =>array("ten" => "Nguyễn Thái Hòa", "ngaysinh" => "1983-08-22", "diachi" => "Nam Định", "anh" => "images/customer_3.jpg"),
        "4" =>array("ten" => "Trần Nam Khoa", "ngaysinh" => "1983-08-17", "diachi" => "Hà Tây", "anh" => "images/customer_4.jpg"),
        "5" =>array("ten" => "Nguyễn Đình Thi", "ngaysinh" => "1983-08-19", "diachi" => "Hà Nội", "anh" => "images/customer_5.jpg")
    );

    if ($_SERVER(["REQUEST_METHOD"] == "GET")) {
        $nameSearch = $_GET["search"];
    }

    for ($i=0; $i<count($customerlist);$i++) {
        $splitName = explode(" ", $customerlist[i]);

        for ($j = 0; $j < count(explode(" ",$splitName)); $j++) {
            if ($nameSearch == $splitName[j]) {
                echo "<tr>";
                echo "<td>".$customerlist[i]."</td>";

            }
        }


    }


    ?>
</table>
</body>
</html>