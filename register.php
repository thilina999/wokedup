<?php
 session_start(); 
//create a variable called $pagename which contains the actual name of the page
$pagename="Customer Registration";

echo "<link rel='shortcut icon' type='image/png' href='favicon.png' >";



//call in the style sheet called mystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>Register and create a workedUp account</h2>";
?>

    <table>
        <form action=getregister.php method=post>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><input type="text" name="postcode"></td>
            </tr>
            <tr>
                <td>Tel No</td>
                <td><input type="text" name="telno"></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="confpassword"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Register"></td>
                <td><input type="reset" value="Clear"></td>
            </tr>
        </form>
    </table>


    <?php
//include head layout
include("footfile.html");
?>
