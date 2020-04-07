<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" type="image/png" href="https://freeiconshop.com/wp-content/uploads/edd/music-quavers-flat.png" />
</head>
<body style="background-color: #F4A44A; padding-top: 15%; font-family: 'Raleway'; text-align: center; font-size: 24px;">

<?php

$em=$_POST["email"];
$pass=$_POST["password"];
$usn=$_POST["username"];

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
$sql_test = "
        SELECT id FROM users
        WHERE email='$em';
        ";

$sql = "
        INSERT INTO users(email,password,username)
        SELECT '$em', '$pass', '$usn'
        WHERE '$em' NOT IN (SELECT email FROM users)
        ";

$result=mysqli_query($link,$sql_test) or die("Bad Query: $sql");

if(mysqli_query($link, $sql)){
    if (mysqli_num_rows($result)==0) {
        echo "Records added successfully.";
    } else {
        die('<div>
             <h3>This mail exist <a href="signup.html"">retry</a>, or go <a href="home.html">back</a>...</h3>
            </div>');
    }
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
<br><br>
<p style="font-style: italic;">
	Click <a href="login.html" style="text-decoration: none;">here</a> to log in.
</p>
</body>
</html>
