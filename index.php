<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit();
}
?>
<?php
include('db.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
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
                   
                   <header>Create account</header>
                   <?php if ($message != '') echo '<p class="message">' . $message . '</p>'; ?>
                   <form method="post" action="" class="reg">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Register">
    </form>
                    <span>Already have an account? <a href="login.php">Log in here</a></span>
                   </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</body>
</html>

