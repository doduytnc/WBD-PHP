<?php
//lay data tu form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_description = $_POST["product_description"];
    $list_price = $_POST["list_price"];
    $discount_percent =& $_POST["discount_percent"];
}
//tinh discount
$discount = $list_price*$discount_percent*0.01; //tinh muc discount
$discount_price = $list_price - $discount;     //tinh gia sau khi discount
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product discount calculator</title>
    <style type="text/css">
        body {
            font-family: Arial,sans-serif;
        }
        #content {
            width: 450px;
            margin: 0 auto;
            padding: 0px 20px 20px;
            background: papayawhip;
            border: 1px dimgray solid;
        }
        h1 {
            color: darkblue;
        }

        #submit_button input{
            float: left;
            margin-bottom: .5em;
        }

        #data input {
            float: left;
            width: 15em;
            margin-bottom: .5em;
        }

        label {
            width: 10em;
            padding-right: 1em;
            float: left;
        }

        br {
            clear: left;
        }

    </style>
</head>
<body>
<div id="content">
    <h2>Product discount calculator</h2>
    <label>Product description:</label>
    <span><?php echo ($product_description);?></span> <br>
    <label>List price: </label>
    <span><?php echo ($list_price);?> $</span> <br>
    <label>Discount percent: </label>
    <span><?php echo ($discount_percent);?> %</span> <br>
    <label>Discount: </label>
    <span><?php echo ($discount);?> $</span> <br>
    <label>Discount price: </label>
    <span><?php echo ($discount_price);?> $</span> <br>
</div>
</body>

</html>
