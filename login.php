<?php
session_start();
include('db.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            setcookie("username", $username, time() + (86400 * 30), "/");
            header("Location: profile.php");
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No user found.";
    }
}
?>


    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="STYLESS.CSS">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                       
                <!-------------      image     ------------->
                
                
                <div class="text">
                <p>Relax and unwind at Our Staycation House<i>- La Casita - Azul</i></p>
                </div>
                
            </div>

            <div class="col-md-6 right">
                
                <div class="input-box">
                   
                   <header>Log In</header>
                   <?php if ($message != '') echo '<p class="message">' . $message . '</p>'; ?>
                   <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Login">
    </form>
    <span>Don't you have an account yet? <a href="index.php">Register</a></span>
                   </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</body>
</html>

