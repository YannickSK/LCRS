<html><head><title></title></head>
<body>
<?
include '../utils/db_connect.php';
require '../utils/common.php';

$query = "SET @count = 0;";
$query.= "UPDATE `LC` SET `PID` = @count:= @count + 1";

if (!mysqli_multi_query($con,$query)) {
	die('Error: ' . mysqli_error($con));
mysqli_close($con);
}

header('Location: ../index.php');
exit;

?>
</body>
</html>