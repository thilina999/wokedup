<?php
session_start(); 
include ("db.php"); 
//create a variable called $pagename which contains the actual name of the page
$pagename="Login";

echo "<link rel='shortcut icon' type='image/png' href='favicon.png' >";

//call in the style sheet called mystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
?>

<table>
        <form action=getlogin.php method=post>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login"></td>
                <td><input type="reset" value="Clear"></td>
            </tr>
        </form>
    </table>

<?php
//include head layout
include("footfile.html");
?>
