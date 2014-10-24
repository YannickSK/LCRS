<html><head><title></title></head>
<body>
<?
include '../utils/db_connect.php';
require '../utils/common.php';

$PID = $_POST['PID'];
$MainCharName = $_POST['MainCharName'];
$AltOrMain = $_POST['AltOrMain'];
$AltNameAndClass = $_POST['AltNameAndClass'];
$Instance = $_POST['Instance'];
$ItemName = (stripslashes($_POST['ItemName']));
$Date = $_POST['Date'];

$PID = mysqli_real_escape_string($con, $PID);
$MainCharName = mysqli_real_escape_string($con, $MainCharName);
$AltOrMain = mysqli_real_escape_string($con, $AltOrMain);
$AltNameAndClass = mysqli_real_escape_string($con, $AltNameAndClass);
$Instance = mysqli_real_escape_string($con, $Instance);
$ItemName = mysqli_real_escape_string($con, $ItemName);
$Date = mysqli_real_escape_string($con, $Date);


$query="UPDATE LC SET MainCharName='$MainCharName', AltOrMain='$AltOrMain', AltNameAndClass='$AltNameAndClass', Instance='$Instance', ItemName='$ItemName', Date='$Date' WHERE PID='$PID'";
//$query="UPDATE LC SET PID = '$PID', MainCharName='$MainCharName', AltOrMain='$AltOrMain', AltNameAndClass='$AltNameAndClass', Instance='$Instance', ItemName='$ItemName', Date='$Date' WHERE PID='$PID'";

if (!mysqli_query($con,$query)) {
	die('Error: ' . mysqli_error($con));
	echo "Record updated!";
	
mysqli_close($con);
}

header('Location: ../reports.php');
exit;

?>
</body>
</html>