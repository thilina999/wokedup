<?php
session_start(); 
include ("db.php"); 
//create a variable called $pagename which contains the actual name of the page
$pagename="Product Information";
//display favicon icon
echo "<link rel='shortcut icon' type='image/png' href='favicon.png' >";

//call in the style sheet called mystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

//retrieve the product id passed from the previous page using the $_GET superglobal variable 
//store the value in a variable called $prodid 
$prodid=$_GET['u_prodid']; 
//echo "<p>Selected product Id: ".$prodid; 
 
//query the product table to retrieve the record for which the value of the product id 
//matches the product id of the product that was selected by the user 
$prodSQL="select prodId, prodName, prodPicName,  prodDescrip , prodPrice, prodQuantity from product where prodId=".$prodid; 
//execute SQL query
$exeprodSQL=mysql_query($prodSQL) or die(mysql_error()); 
//create array of records & populate it with result of the execution of the SQL query
$thearrayprod=mysql_fetch_array($exeprodSQL); 
 
include ("detectlogin.php");
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
//display product name in capital letters
echo "<p><center><b>".strtoupper($thearrayprod['prodName'])."</b></center><p>"; 
echo "<img src=images/".$thearrayprod['prodPicName'].">"; 
echo "<p>".$thearrayprod['prodDescrip']."</p>"; 
echo "<p>Price $".$thearrayprod['prodPrice']."</p>"; 
echo "<p>Number in Stock ".$thearrayprod['prodQuantity']."</p>"; 
//display form made of one text box and one button for user to enter quantity 
//pass the product id to the next page basket.php as a hidden value 
echo "<form action=basket.php method=post>";
echo "<p><center>Enter Required Quantity: "; 
echo "<select name=p_quantity>"; 
for($i=1;$i<=$thearrayprod['prodQuantity'];$i++){
    echo "<option value=".$i.">".$i."</option>";       
}
echo "</select> "; 
echo "<input href='basket.php' type=submit value='Add to Basket'>"; 
echo "<input type=hidden name=h_prodid value=".$prodid.">"; 
echo "</center></p>"; 
echo "</form>"; 

//include head layout
include("footfile.html");
?>
