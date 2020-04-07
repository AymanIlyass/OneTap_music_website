<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Log In</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" type="image/png" href="https://freeiconshop.com/wp-content/uploads/edd/music-quavers-flat.png" />
</head>
<body style="background-color: #F4A44A; padding-top: 15%; font-family: 'Raleway'; text-align: center; font-size: 24px;">

<?php

$em=$_POST["email"];
$pass=$_POST["password"];

$servername='localhost';
$user='root';
$password='';
$db='pn';

$link = mysqli_connect($servername, $user, $password, $db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "
        SELECT id from users where email='$em' and password='$pass';
";


$result=mysqli_query($link,$sql) or die("Bad Query: $sql");

if(mysqli_query($link, $sql)){
    if (mysqli_num_rows ($result)==0) {
        die('<div>
             <h3>The email address or password is incorrect. Please <a href="login.html"">retry</a>, or go <a href="home.html">back</a>...</h3>
            </div>');
    } else {
        echo "Welcome,<br><br>Hope you'll enjoy our website &nbsp;^^ ";
    }
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
<br><br>
<p style="font-style: italic;">
	Click <a href="index.html" style="text-decoration: none;">here</a> to continue.
</p>
</body>
</html>
