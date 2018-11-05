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

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<p> Please Specify the date in the form of 1_NOV,2_NOV....</p>
Reg Number:<Input name="regnumber"/><br>
Date:<Input name="date"/><br>
<Input type="submit" value="Add Attendance" name="submit"/>

</form>
</html>
<?php
if(isset($_POST['submit'])){
    $regnumber=$_POST['regnumber'];
    $date=$_POST['date'];

    $dbc=mysqli_connect('localhost','root','','studentatt');
    $query=" UPDATE attendance set $date='Yes' where ID='$regnumber'";
    $result=mysqli_query($dbc,$query);
    mysqli_close($dbc);
    echo 'Added Sucessfully';
}
?>


