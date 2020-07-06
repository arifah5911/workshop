
<?php
require_once('connection.php');

$app_empid = $_GET['app_empid'];

$qu = mysqli_query($connection,"SELECT * FROM applicant INNER JOIN day_off WHERE applicant.app_empid = day_off.app_empid AND applicant.app_empid='$app_empid'");
$result = mysqli_fetch_assoc($qu);

$dayID = $result['lv_id'];

if($dayID == NULL){
	$deleteSQL = "DELETE FROM applicant WHERE app_empid = '$app_empid'";
}
else if ($dayID != NULL) {
	$deleteSQL = "DELETE applicant,day_off FROM applicant INNER JOIN day_off WHERE applicant.app_empid = day_off.app_empid AND applicant.app_empid='$app_empid'";
}

$resultDelete = mysqli_query($connection, $deleteSQL);

if ($resultDelete){
	echo("<script>alert('Successfully delete data!'); window.location.href='updateapp_adm.php';</script>");
}
else
{
	$failed = "Failed to delete";
}
?>



