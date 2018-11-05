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

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
Reg Number:<Input name="regnumber"/><br>
<Input type="submit" value="Add Attendance" name="submit"/>
</form>
<?php
$regnumber=$_POST['regnumber'];
if (isset($_POST['submit'])){
$dbc=mysqli_connect('localhost','root','','studentatt');
$query="SELECT * from attendance where ID='$regnumber'";
$result=mysqli_query($dbc,$query);
mysqli_close($dbc);
echo '<table class="table">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Name</th>
    <th scope="col">4_NOV</th>
    <th scope="col">5_NOV</th>
    <th scope="col">6_NOV</th>
    <th scope="col">7_NOV</th>
  </tr>
</thead>';

while($row=mysqli_fetch_array($result)){
    echo '
            <tbody>
            <tr>
                <th scope="row">'.$row['ID'].'</th>
                <td>'.$row['Name'].'</td>
                <td>'.$row['4_NOV'].'</td>
                <td>'.$row['5_NOV'].'</td>
                <td>'.$row['6_NOV'].'</td>
                <td>'.$row['7_NOV'].'</td>
            </tr>
            </tbody>
            </table>';
}
}
?>
</html>