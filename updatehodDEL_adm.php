


<?php
require_once('connection.php');

$hod_no = $_GET['hod_no'];

$qu = mysqli_query($connection,"SELECT * FROM head_of_department WHERE hod_no=$hod_no");
$result = mysqli_fetch_assoc($qu);


$deleteSQL = "DELETE FROM head_of_department WHERE hod_no=$hod_no";
$resultDelete = mysqli_query($connection, $deleteSQL);

if($resultDelete)

	echo("<script>alert('Successfully delete data!');
			window.location.href='updatehod_adm.php';</script>");
else
echo "Failed to delete";
?>