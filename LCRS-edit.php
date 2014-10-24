<?
//Include/Required files to be loaded for this page.
include 'utils/db_connect.php';
require_once('utils/common.php');
checkUser(); // Check if the user is logged in or not via Common.php
	
session_start(); // Start session to see if someone is reaching the 5 second submit threshold.

if (isset($_SESSION['last_submit']) && time()-$_SESSION['last_submit'] < 5)
    die('Form submitting limit reached. Please wait 5 seconds before trying again.');
else
    $_SESSION['last_submit'] = time();

$PID=$_POST['PID'];

if(empty($PID)){
	echo "Please don't acces this page directly without entering a PID.. <br>";
	echo "You'll be redicted back to the reports page in 3 seconds.<br>";
	header("Refresh: 5;url=http://aurora-rag.comuv.com/reports");
	die();  //Stop executing code beyond this point.
}

$query=" SELECT * FROM LC WHERE PID='$PID'";
$result = mysqli_query($con, $query);

if (! $con)
die("Couldn't connect to MySQL");

if (!mysqli_query($con,$query)) {
	die('Error: ' . mysqli_error($con));
}

while($row = mysqli_fetch_assoc($result)) {
   //$PID = $row['PID'];
   $MainCharName = $row['MainCharName'];
   $AltOrMain = $row['AltOrMain'];
   $AltNameAndClass = $row['AltNameAndClass']; 
   $Instance = $row['Instance']; 
   $ItemName = $row['ItemName']; 
   $Date = $row['Date']; 
}
?>

<html><head><title>LCRS - Editor</title></head>
<link rel="stylesheet" type="text/css" href="../style/view.css" media="all">
<body>
	<script>
		function clicked() {
		return confirm('Are you sure you want to DELETE this entry?');
		}
	</script>
<table width="600" cellpadding="10" cellspacing="0" border="2">
	<tr align="left" valign="top">
	<td align="left" colspan="1" rowspan="1" bgcolor="#64b1ff">
	<h3>LCRS: Edit Entry</h3>
	<form action="scripts/update-report.php" method="post">
		<input type="hidden" name="PID" value="<? echo "$PID" ?>">
		Main character name:<input type="text" name="MainCharName" value="<? echo "$MainCharName"?>"><br>
		ALT/MAIN: <input type="text" name="AltOrMain" value="<? echo "$AltOrMain"?>"><br>
		Alt name AND class: <input type="text" name="AltNameAndClass" value="<? echo "$AltNameAndClass"?>"><br>
		Instance (ICC25HC, RS25HC): <input type="text" name="Instance" value="<? echo "$Instance"?>"><br>
		Item Name (USE ABBREVIATIONS): <input type="text" name="ItemName" value="<? echo "$ItemName"?>"><br>
		Date: <input type="text" name="Date" value="<? echo "$Date"?>"><br>
		<input type="Submit" value="Update">
	</form>
</table>
<table width="600" cellpadding="10" cellspacing="0" border="2">
	<tr align="left" valign="top">
	<td align="left" colspan="1" rowspan="1" bgcolor="#64b1ff">
	<form action="scripts/delete-report.php" method="post">
		<b>Type DELETE (With CAPS) to delete this entry.</b>
		<input type="hidden" name="PID" value="<? echo "$PID" ?>">
		<input type="text" name="DELETECONFIRM" value="">  <input type="Submit" onclick="return clicked();" value="DELETE">
	</form>
</table>
</body>
</html>