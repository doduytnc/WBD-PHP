<?php
$errName = null;
$errEmail = null;
$errPsw = null;
$errRePsw = null;
$errDiffPsw = null;
$err = false;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = md5($_POST["psw"]);
$repassword = md5($_POST["psw-repeat"]);

    if(empty($name)) {
        $err = true;
        $errName = "Please input your name";
    }

    if (empty($email)) {
        $err = true;
        $errEmail = "Please input your email";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email is not valid, please input your email as xxx@xxx.xxx.xxx)!";
            $err = true;
        }
    }

    if (empty($password)) {
        $err = true;
        $errPsw = "Please input your password";
    }

    if (empty($repassword)) {
        $err = true;
        $errRePsw = "Please input your password again";
    }

    if ($password !== $repassword) {
        $err = true;
        $errDiffPsw = "Password is not similar, please input again";
    }

    if ($err === false) {
        saveDataJSON("dataUser.json", $name, $email, $phone,$password);
        $name = null;
        $email = null;
        $phone = null;
        $password = null;
    }
}

function loadRegistrations($filename){                   //tai du lieu, file dau vao la JSON
    $jsondata = file_get_contents($filename);           //tra ve du lieu tin tu file
    $arr_data = json_decode($jsondata, true);    //tra du lieu file json ve dang mang
    return $arr_data;
}

function saveDataJSON($filename, $name, $email, $phone,$password) {
    try {
        $contact = array(           //tao mang chua du lieu dang ky
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password
        );
        // converts json data into array
        $arr_data = loadRegistrations($filename);  //dung function de tra du lieu ve dang mang
        array_push($arr_data, $contact);        // Push user data to array
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);  //Convert updated array to JSON
        file_put_contents($filename, $jsondata); //write json data into data.json file
        echo "Save complete!";
    } catch (Exception $e) {
        echo 'Error: ', $e->getMessage(), "\n";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
<div class="regForm">
<form method="post">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="name"><b>User name</b></label>
        <input type="text" placeholder="Enter name" name="name" required >
        <span class="error">* <?php echo $errName; ?></span>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="phone"><b>Phone</b></label>
        <input type="text" placeholder="Enter Email" name="phone" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
        <hr>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>
</div>

<?php
$registrations = loadRegistrations('dataUser.json');
?>
<h2 style="text-align: center">Registration list</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
    </tr>
    <?php foreach ($registrations as $registration): ?>
        <tr>
            <td><?= $registration['name']; ?></td>
            <td><?= $registration['email']; ?></td>
            <td><?= $registration['phone']; ?></td>
            <td><?= $registration['password']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</body>
</html>
