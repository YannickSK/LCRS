<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" type="text/css" href="style/navigationbar.css" media="all">

<?
include 'utils/db_connect.php';
require_once('utils/common.php');

function allow_user(){
	if ($_SESSION["validUser"] == true){
		return true;
	}
}

if(isset($_POST['submit'])){
if(isset($_GET['search'])){
	
$searchterm = $_POST['name'];
$searchquery = "SELECT PID,
				MainCharName,
				AltOrMain,
				AltNameAndClass,
				Instance,
				ItemName,
				Date
				FROM LC 	 
				WHERE MainCharName LIKE '%" . $searchterm . "%' OR
				AltOrMain LIKE '%" . $searchterm ."%' OR
				AltNameAndClass LIKE '%" . $searchterm ."%' OR
				ItemName LIKE '%" . $searchterm ."%' OR
				Instance LIKE '%" . $searchterm ."%' OR
				Date LIKE '%" . $searchterm ."%'";
	$searchresult = mysqli_query($con, $searchquery);
	$searchrows = mysqli_num_rows($searchresult);
	
	echo '<mark> There are '. $searchrows .' reports containing the search term "'. $searchterm .'".</mark>';
	echo '<li><a href="http://aurora-rag.comuv.com/"> Back to the reports page</a></li>';
	Features();
	
	if(mysqli_num_rows($searchresult) > 0){
	
	echo '<table width="800" cellpadding="10" cellspacing="0" border="2" bgcolor="#64b1ff">';
		
	echo "<th>PID</th>
	<th>MAIN NAME</th>
	<th>MAIN/ALT</th>
	<th>ALT NAME + CLASS</th>
	<th>INSTANCE</th>
	<th>ITEM</th>
	<th>DATE</th>";

	while ($get_info = mysqli_fetch_row($searchresult)){
		echo "<tr>\n";
		foreach ($get_info as $field)
		echo "\t<td>$field</td>\n";
		echo "</tr>\n";
	}
	}else{
	AllReports($con);
	die;
	}
	echo "</table>\n";

	die;
}
}

function Features(){

if (allow_user()){
echo '<ul id="navmenu1" class="topmenu">
<input type="checkbox" id="navmenu1-switcher" class="switchbox"><label onclick="" class="switch" for="navmenu1-switcher"></label>	<li class="toproot"><a href="#" style="height:16px;line-height:16px;"><span>Navigation</span></a>
<ul>
<li><a href="http://aurora-rag.comuv.com/itemlist" target="_blank" title="Itemlist: Look up item abbreviations here.">Itemlist</a></li>
<li><a href="http://aurora-rag.comuv.com/LCRS" target="_blank" title="LCRS reporting form, used for Loot Council reporting.">LCRS Form</a></li>
<li><a href="http://aurora-rag.comuv.com/" target="_blank" title="Contains all loot council reports thus far.">Reports</a></li>
<li><a href="http://aurora-rag.shivtr.com/forum_threads/1892867" target="_blank" title="A tutorial on how to properly use the LCRS.">Tutorial</a></li>
<li><a href="http://aurora-rag.comuv.com/auth/logout.php" title="Logout">Logout</a></li>
</ul>
</ul>';

echo'<form method="post" action="LCRS-edit.php">
<pre>
 Enter PID to edit the report: <input type="text" name="PID" size="5">  <input type="submit" value="Submit">
</pre>
</form>';
}
echo '<form method="post" action="index.php?search" id="searchform">
<pre>
 Enter term to search for reports: <input type="text" name="name" size="20">  <input type="submit" name="submit" value="Search">
</pre>
</form>';
}



echo '<h1> Loot Council Logs</h1>';

Features();
AllReports($con);

function AllReports(mysqli $con){
$query ="SELECT * 
		FROM LC 
		ORDER BY PID ASC;"; 

$result = mysqli_query($con, $query);

if (!mysqli_query($con,$query)) {
		die('Error: ' . mysqli_error($con));
}

echo '<table width="800" cellpadding="10" cellspacing="0" border="2" bgcolor="#64b1ff">';

echo "<th>PID</th>
<th>MAIN NAME</th>
<th>MAIN/ALT</th>
<th>ALT NAME + CLASS</th>
<th>INSTANCE</th>
<th>ITEM</th>
<th>DATE</th>";

while ($get_info = mysqli_fetch_row($result)){
	echo "<tr>\n";
	foreach ($get_info as $field)
	echo "\t<td>$field</td>\n";
	echo "</tr>\n";
}
echo "</table>\n";
mysqli_close($con);
}
?>
</body>
</html>