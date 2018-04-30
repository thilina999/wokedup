<?php
if (isset($_SESSION['c_userid'])){
    echo "<div style=float:right;>Name : ". $_SESSION['c_fname']." ".$_SESSION['c_sname'] . " / Customer ID : ".$_SESSION['c_userid'] ."</div><br><hr>";
}
?>
