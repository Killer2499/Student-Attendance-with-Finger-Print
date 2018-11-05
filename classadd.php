<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
	 integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
	integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
	integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
</head>
<body>
<?php
if(isset($_POST['submit'])){
$class_id=$_POST['class_id'];
$class_name=$_POST['class_name'];
$instructor_name=$_POST['instructor_name'];
$class_date=$_POST['class_date'];

$class_id=stripcslashes($class_id);
$class_name=stripcslashes($class_name);
$instructor_name=stripcslashes($instructor_name);
$class_date=stripcslashes($class_date);

$class_id=trim($class_id);
$class_name=trim($class_name);
$instructor_name=trim($instructor_name);
$class_date=trim($class_date);


$dbc=mysqli_connect('localhost','root','','Studentatt');
$query="INSERT INTO class_info (class_id,class_name,class_instructor,class_date) VALUES ('$class_id','$class_name','$instructor_name','$class_date')";
$result= mysqli_query($dbc,$query);
mysqli_close($dbc);
echo '<div class="sucess row">
			<div class="col-md-12" style="text-align:center;"> 
			<h1>Sucessfully Added to the database</h1>		
			</div>
		</div>';
}
?>
<body>

</html>