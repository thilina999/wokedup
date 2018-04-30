<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Template";

echo "<link rel='shortcut icon' type='image/png' href='favicon.png' >";

//call in the style sheet called mystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
echo "<p> Text Here";

//include head layout
include("footfile.html");
?>
