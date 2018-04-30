<?php
session_start(); 
include("db.php"); 
//create a variable called $pagename which contains the actual name of the page
$pagename="Login Confirmation";

echo "<link rel='shortcut icon' type='image/png' href='favicon.png' >";

$email = $_POST["email"];
$password = $_POST["password"];

$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

//call in the style sheet called mystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

include ("detectlogin.php"); 

//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

if($email=="" || $password==""){
    echo "<p>All fields are compulsory<br>Go back to <a href=login.php>Login</a>";
}else if(preg_match($reg,$email)==false){
    echo "<p>Email not valid <br>Go back to <a href=login.php>Login</a>";
}else{
    
    $SQL = "SELECT * FROM users WHERE userEmail = '$email'";
    $result = mysql_query($SQL);
    if(!$result){
        echo "<p>Email you entered was not recognized.<br>Go back to <a href=login.php>Login</a>";
    }else{
        $row=mysql_fetch_array($result); 
        if($row["userPassword"]!=$password){
            echo "<p>Incorrect Password.<br>Go back to <a href=login.php>Login</a>";
        }else{
            $_SESSION['c_userid'] = $row["userId"];
            $_SESSION['c_fname'] = $row["userFName"];
            $_SESSION['c_sname'] = $row["userSName"];
                        
            echo "<p><b>Hello, ". $_SESSION['c_fname']." ".$_SESSION['c_sname'] . "</b></a>";
            echo "<p>You  have successfully logged into the system!<br>The email you entered is $email <br>The password you entered is $password<br><br>To continue shopping <a href=index.php>Product Index</a><br>To view basket <a href=basket.php>My Basket</a>";
        }
    }
}




//include head layout
include("footfile.html");
?>
