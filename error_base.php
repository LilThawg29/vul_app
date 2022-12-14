<?php
include "config.php";
session_start();

if(isset($_GET["type"])){
  $type = $_GET["type"];
  $query = "SELECT * FROM PRODUCTS WHERE TYPE='$type'" ;
  try {
    if(stripos($type, "union") !== false || stripos($type, "if") !== false){
      die("No injection!!");
    }
    $result = mysqli_query($conn,$query); 
  } catch (mysqli_sql_exception $e) {
    echo $e;
  }  
} else {
  $query = "SELECT * FROM PRODUCTS" ;
  $result = mysqli_query($conn,$query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>GFG User Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">

	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="navb" class="navbar-collapse collapse hide">
		<ul class="navbar-nav">
		<li class="nav-item active">
			<a class="nav-link" href="#">Home</a>
		</li>
		</ul>

		<ul class="nav navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" href="#"><span class="fas fa-sign-in-alt"></span> Log Out</a>
		</li>
		</ul>
	</div>
	</nav>

	

	<section>
		<h1>Products</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Type</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['price'];?></td>
				<td><?php echo $rows['type'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>


