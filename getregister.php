<?php
session_start(); 
include("db.php"); 
//create a variable called $pagename which contains the actual name of the page
$pagename="Registration Confirmation";

echo "<link rel='shortcut icon' type='image/png' href='favicon.png' >";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$postcode = $_POST["postcode"];
$telno = $_POST["telno"];
$email = $_POST["email"];
$password = $_POST["password"];
$confpassword = $_POST["confpassword"];

$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

//call in the style sheet called mystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

if($fname=="" || $lname=="" || $address=="" || $postcode=="" || $telno=="" || $email=="" || $password=="" || $confpassword==""){
    echo "<p>All fields are compulsory<br>Go back to <a href=register.php>Register</a>";
}else if(preg_match($reg,$email)==false){
    echo "<p>Email not valid <br>Go back to <a href=register.php>Register</a>";
}else if($password!=$confpassword){
    
    echo "<p>The two passwords you entered do not match<br>Please make sure you enter them correctly<br>Go back to <a href=register.php>Register</a>";
    
}else{
    
    $SQL = "INSERT INTO users (userFName, userSName, userAddress, userPostcode, userTelNo, userEmail, userPassword) VALUES ('$fname', '$lname', '$address', '$postcode', '$telno', '$email', '$password')";

    mysql_query($SQL); 
    
    if(mysql_errno()==0){
        echo "<p>You have successfully registered.<br>To continue, please <a href=login.php>Login</a>";
    }else if(mysql_errno()==1062){
        echo "<p>There is an error with your registration<br>The email you entered already exists<br>Go back to <a href=register.php>Register</a>";
    }
}




//include head layout
include("footfile.html");
?>
