<?php 
session_start(); 
//include a db.php file to connect to database 
include ("db.php"); 
//create a variable called $pagename which contains the actual name of the page 
$pagename="Index"; 
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet 
echo "<link rel='stylesheet' type='text/css' href=mystylesheet.css>"; 
 
//display window title 
echo "<title>".$pagename."</title>";
//display favicon icon
echo "<link rel='shortcut icon' type='image/png' href='favicon.png' >";
//include head layout 
include ("headfile.html"); 
 
include ("detectlogin.php"); 
//display name of the page and some text
echo "<h2>".$pagename."</h2>"; 
echo "<p> Amazing products for your home, for your work, for you! <br><br><hr>"; 
 
//create a new variable containing a SQL statement retrieving names of products from the product table 
$SQL="select prodId, prodName, prodPicName, prodPrice from product"; 
//Create a new variable containing the execution of the SQL query i.e. select the records or get out 
$exeSQL=mysql_query($SQL) or die (mysql_error()); 
 
//create an array of records (2 dimensional variable) called $prodArray.
//populate it with the records retrieved by the SQL query previously executed.
//loop through the array i.e while the end of the array has not been reached go through it
while ($arrayprod=mysql_fetch_array($exeSQL)) { 
    echo "<br>";  
    //make each product a link to the next page and pass the product id to the next page by URL 
    //concatenate a string of characters u_prodid which carries the value of the actual id
    echo "<p><a href=prodinfo.php?u_prodid=".$arrayprod['prodId'].">"; 
    //Display name of the product  
    echo $arrayprod['prodName']."<br>";  echo "</a>"; 
    echo "<hr>";
    echo "<img style='width:200px' src=images/".$arrayprod['prodPicName'].">"; 
    echo "<br>";
    echo "$".$arrayprod['prodPrice']; 
    echo "<br><br>";  
    echo "<hr>";
} 
 
//include head layout
include ("footfile.html"); 
?>
