<?php

define('_REFERURL',              'http://aurora-rag.comuv.com/LCRS.php'); //Defines header to check if the page is visited directly.
include '../utils/db_connect.php';
require '../utils/common.php';
checkUser();

function allow_user(){
	if ($_SERVER['HTTP_REFERER'] == _REFERURL)
	{
	return true;
	}
	else
	{
	return false;
	}
}

if (allow_user()){

//Checks if the string is shorter THAN 2000. *Not needed anymore.
$form_date_MM = $_POST['element_1_1'];
$form_date_DD = $_POST['element_1_2'];
$form_date_YY = $_POST['element_1_3'];
$form_maincharname = $_POST['form_maincharname'];
$form_altormain = $_POST['form_altormain'];
$form_altnameclass = $_POST['form_altnameclass'];
$form_instance = $_POST['form_instance'];
$form_itemname = (stripslashes($_POST['form_itemname']));

if(empty($form_date_MM) || empty($form_date_DD) || empty($form_date_YY) || empty($form_maincharname) || empty($form_altormain) || empty($form_altnameclass) || empty($form_instance) || empty($form_itemname))
{
	echo "You did not fill out the required fields. <br>";
	echo "Please fill the forms out properly. <br>";
	echo "You'll be redicted back to the LCRS page in 5 seconds.<br>";
	header("Refresh: 5;url=http://aurora-rag.comuv.com/LCRS.php");
	die();  //Stop executing code beyond this point.
}

$Date = mysqli_real_escape_string($con, $form_date_YY."/".$form_date_MM."/".$form_date_DD);
$MainCharName = mysqli_real_escape_string($con, $form_maincharname);
$AltOrMain = mysqli_real_escape_string($con, $form_altormain);
$AltNameAndClass = mysqli_real_escape_string($con, $form_altnameclass);
$Instance = mysqli_real_escape_string($con, $form_instance);
$ItemName = mysqli_real_escape_string($con, $form_itemname);
	
//Insert data into MySQL table 'LC'.
$query="INSERT IGNORE INTO LC (Date, MainCharName, AltOrMain, AltNameAndClass, Instance, ItemName)
VALUES ('$Date', '$MainCharName', '$AltOrMain', '$AltNameAndClass', '$Instance', '$ItemName');";
$query.="SET @count = 0;";
$query.="UPDATE `LC` SET `PID` = @count:= @count + 1;";

if (!mysqli_multi_query($con,$query)) {
	die('Error: ' . mysqli_error($con));
	mysqli_close($con);
}

header('Location: ../index.php');

exit;
}
	else
{
	header("Refresh: 3;url=http://aurora-rag.comuv.com/LCRS.php");
}
?>

<html>
    <head>
        <title>Error: 410</title>
        <script type="text/javascript">
			window.setTimeout(function() {
			location.href = 'http://aurora-rag.comuv.com/LCRS.php';}, 3000);
        </script>
    </head>
    <body>
        Please don't acces this page directly, use it properly from the LCRS page.<br>
        Click here if you are not redirected automatically in 5 seconds<br>
        <a href="http://aurora-rag.comuv.com/LCRS.php">LCRS</a><br>
        <a href="http://aurora-rag.comuv.com/reports.php">Reports</a><br>
        <img src="http://now-here-this.timeout.com/wp-content/uploads/2013/03/url-20.gif"> 
    </body>
</html>