<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];


?>
   <!DOCTYPE html>
<html>
<head>
	<title>LA CASITA - AZUL</title>
<style type="text/css">
	*{padding: 0; margin:0; box-sizing: border-box;}
	header{
		font-family: sans-serif;
		width: 100%;
		height: 100vh;
		
			}
	nav{
		width: 100%;
		height: 100px;
		display: flex;
		justify-content: space-around;
		align-items: center;
		
	}
	.logo{
		font-size:2em; 
		letter-spacing: 2px;
	}
	.menu a{
		text-decoration: none;
		color:black;
		padding: 10px 20px;
		font-size: 20px;
		position:relative;

	}
	.menu a:before{
		content: '';
		position: absolute;
		top:0;
		left:0;
		width:0%;
		height: 100%;
		border-top: 2px solid black;
		z-index: 1;
		transition: 0.4s linear;
	}
	.menu a:hover:before{
		width:90%;
	}

	.login a{
		text-decoration: none;
		color: white;
		background:black;
		padding: 10px 20px;
		border-radius: 8px;
		transition: 0.4s;
	}
	.login a:hover{
			background: transparent;
			border:1px solid black;
			color: black;
		
	}
	#h-text{
			width: 100%;
			height: 70%;
			display: flex;
			justify-content: space-around;
			align-items: center;
		}
		#h-text h1{
			font-size: 3em;
			
		}
		#h-text span{
			color:skyblue;
		}
		#h-text a{
			text-decoration: none;
			background: black;
			color: white;
			letter-spacing: 5px;
			padding:10px 20px;
			position: relative;
			z-index: 1;
		}

	
	#h-text a:before{
		content: '';
		position: absolute;
		top:10px;
		left:10px;
		width:100%;
		height: 100%;
		border:1px solid black;
		background: skyblue;
		z-index: -1;

	}


		#h-text p{
			margin-bottom: 10px;
		}
		#man{
			position: absolute;
			bottom: 0;
			left: 350px;
		}
</style>

</head>
<body>
<header>
	<nav>
		<div class="logo">
			LA CASITA - <span style="color: skyblue;">AZUL</span>
		</div>
		<div class="menu">
			<a href="#">Home</a>
			<a href="#">Room</a>
			<a href="#">Gallery</a>
			<a href="#">Services</a>
			<a href="#">Contact</a>
		</div>
		<div class="login">
			<a href="logout.php">Log Out</a>
		</div>
	</nav>

	<section id="h-text">
		<div class="left">
			<p>Welcome</p>
			<h1><?php echo htmlspecialchars($username); ?><span> ! </span></h1>
			
				<br>			<br>
			<a href="#">Reserve Now</a>
		</div>
		<div class="right">
			<img src="img/azul1.jpg" width="500" id="himg">
		</div>	

	</section>

</header>
</body>
</html>


