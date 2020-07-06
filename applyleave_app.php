<?php
require_once('connection.php');
require_once('sidebar_app.php');
require_once('header.php');


?>
<?php 
	if (isset($_POST['apply'])) 
	{
	$app_empid = mysqli_real_escape_string($connection, $_POST['app_empid']);
	$date_apply = date('Y-m-d');
	$leave_type = mysqli_real_escape_string($connection, $_POST['leave_type']);
	$start_date = mysqli_real_escape_string($connection, $_POST['start_date']);
	$start_end = mysqli_real_escape_string($connection, $_POST['start_end']);
	$comment = mysqli_real_escape_string($connection, $_POST['comment']);
	$lv_status = mysqli_real_escape_string($connection, $_POST['lv_status']);
		
		
            $d1 = strtotime($_POST['start_date']);
            $d2 = strtotime($_POST['start_end']);
	
	$startDate = date('Y-m-d', $d1);
	$endDate = date('Y-m-d', $d2);

	
/*$start = new DateTime('date1');
$end = new DateTime('date2');
	
$start = new DateTime($d1);
$end = new DateTime($d1);
 otherwise the  end date is excluded (bug?)*/
	
$start = new DateTime($startDate);
$end = new DateTime($endDate);
	
$end->modify('+1 day');

$interval = $end->diff($start);

// total days
$days = $interval->days;

// create an iterateable period of date (P1D equates to 1 day)
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

// best stored as array, so you can add more than one


foreach($period as $dt) {
    $curr = $dt->format('D');

    // substract if Saturday or Sunday
    if ($curr == 'Sat' || $curr == 'Sun') {
        $days--;
    }

    // (optional) for the updated question
 
}
		
		if($leave_type == 'Emergency'){
			
			$sqlInsert = "INSERT INTO day_off (app_empid,lv_date,lv_type,lv_startdate,lv_enddate,lv_comment,lv_status,lv_bill) VALUES('$app_empid', '$date_apply', '$leave_type','$start_date','$start_end','$comment','$lv_status','$days')";
		
		$resultInsert = mysqli_query($connection, $sqlInsert) or die(mysqli_error($connection));
			
		}
		else{
			
			
			
$sqlInsert = "INSERT INTO day_off (app_empid,lv_date,lv_type,lv_startdate,lv_enddate,lv_comment,lv_status,lv_bill) VALUES('$app_empid','$date_apply','$leave_type','$start_date','$start_end','$comment','$lv_status','$days')";
		
		$resultInsert = mysqli_query($connection, $sqlInsert) or die(mysqli_error($connection));


}
if($resultInsert === TRUE)
		{
			$success = "Successfully inserted data.";
			echo("<script>alert('Successfully apply!');
			window.location.href='applyleave_app.php';</script>");
		}
		else
		{
			
			$failed = "Failed inserted data.";
		}
	}
	
?>

	




<html>
	<head>
	
	<link rel="stylesheet" href="c.css" type="text/css">
	</head>
<body>
	<div class="sidenav">
 <!-- <c> <img src="applicant_picture/<?php $row['app_picture']; ?>">  </c> -->
		<br>
  <c><?php echo $row['app_name']; ?>  </c>
  <c><?php echo $row['app_empid']; ?>  </c>	
  <a href="myprofile_app.php">MY PROFILE </a>
  <a class="active" href="applyleave_app.php">APPLY LEAVE </a>
  <a href="historyleave_app.php">HISTORY</a>
  
</div>

<form class="" method="POST" action="">
   
      <h1 align="center">APPLY LEAVE</h1>
	
      <p>&nbsp;</p>
      <hr>
		<br>
		<br>
       	
<table width="500"align="center">
 
    <tr>
      <td >Leave Type
		  <input type="hidden" placeholder="" name="app_empid" value="<?php echo $row['app_empid']; ?>">
		</td>
      <td><select  name="leave_type" class="form-control" id="">
        <option disabled selected value="">-</option>
        <option value="Annual">Annual Leave</option>
        <option value="Medical">Medical Leave</option>
        <option value="Emergency">Emergency Leave</option>
      </select></td>
    </tr>
    <tr>
      <td>Start Date</td>
      <td><input type="date" id="txtDate1" placeholder="" name="start_date" required></td>
    </tr>
    <tr>
      <td>End Date</td>
      <td><input type="date" id="txtDate2" placeholder="" name="start_end" required></td>
	  <td><input type="hidden" placeholder="" value="In Progress" name="lv_status" required></td>
    </tr>
    <tr>
      <td>Comment</td>
      <td><textarea class="form-control" rows="5" name="comment" id=""> </textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"> <button name="apply" class="apply" type="submit" class="button" >Apply</button>
		 
		  </td>
		  </td>
    </tr>
 
</table>
        

     

 
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#txtDate1').attr('min', minDate);
});

$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#txtDate2').attr('min', minDate);
});
</script>
<style>
	.apply {
  background-color: #000000;
  border: none;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
  margin: 2px 1px;
  cursor: pointer;
}
</style>
</body>
</html>