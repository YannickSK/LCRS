<html><head><title></title></head>
<body>
<?
include '../utils/db_connect.php';
require '../utils/common.php';

$PID = $_POST['PID'];
$confirm = $_POST['DELETECONFIRM'];

if($confirm != DELETE){
	echo "Wrong confirmation code.<br>";
	header("Refresh: 3;url=http://aurora-rag.comuv.com/reports.php");
	die();  //Stop executing code beyond this point
}

$query ="DELETE FROM LC WHERE PID='$PID';";
$query.="SET @count = 0;
UPDATE `LC` SET `PID` = @count:= @count + 1;";


if (!mysqli_multi_query($con,$query)) {
	die('Error: ' . mysqli_error($con));
mysqli_close($con);
}

header('Location: ../reports.php');
exit;

?>
</body>
</html>