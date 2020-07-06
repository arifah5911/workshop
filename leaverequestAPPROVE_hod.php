<?php

require_once('sidebar_hod.php');
require_once('header.php');
require_once('connection.php');

?>
<?php




	$empid=$_SESSION["hodid"];
	//$resultRead = mysqli_query($connection, "SELECT * FROM site INNER JOIN project ON site.WoNo=project.WoNo AND site.id='$ID'"); 
	$resultRead = mysqli_query($connection, "SELECT * FROM head_of_department WHERE hod_empid= '$empid' ");
	$rowi = mysqli_fetch_assoc($resultRead);
?>
<?php 


if(isset($_POST['confirm']))
	{
		$lv_status = mysqli_real_escape_string($connection, $_POST['lv_status']);
		$lv_id = mysqli_real_escape_string($connection, $_POST['lv_id']);
		$lv_type =mysqli_real_escape_string($connection, $_POST['lv_type']);
		$lv_bill =mysqli_real_escape_string($connection, $_POST['lv_bill']);
		$app_balance =mysqli_real_escape_string($connection, $_POST['app_balance']);
		
			//die($lv_status."".$lv_id);
	
	$selectSQL = "SELECT * FROM day_off INNER JOIN applicant on applicant.app_empid = day_off.app_empid WHERE lv_id = '$lv_id'";
		$resultSelect = mysqli_query($connection, $selectSQL);
		$row = mysqli_fetch_assoc($resultSelect);
	
		if($lv_status == 'APPROVE' && $lv_type == 'Emergency'){
		
			
			
		$updateSQL = "UPDATE day_off SET lv_status = '$lv_status' WHERE lv_id = '$lv_id'";
		$resultUpdate = mysqli_query($connection, $updateSQL);
		}
		
		elseif($lv_status == 'REJECTED'){
			$updateSQL = "UPDATE day_off SET lv_status = '$lv_status' WHERE lv_id = '$lv_id'";
		$resultUpdate = mysqli_query($connection, $updateSQL);
		}
		
		else{
			
				$ans = $app_balance - $lv_bill;
				$app_balance = $ans;
			
			echo $app_balance;
			
			//query update tak betul, kena declare day_off and applicant
			//$updateSQL = "UPDATE day_off, applicant SET dayoff.lv_status = '$lv_status', applicant.app_balance = '$app_balance' WHERE day_off.app_empid = applicant.app_empid AND day_off.lv_id = '$lv_id'";
			
			$updateSQL = "UPDATE day_off, applicant SET day_off.lv_status = '$lv_status', applicant.app_balance = '$app_balance' WHERE day_off.app_empid = applicant.app_empid AND day_off.lv_id = '$lv_id'";
			
		$resultUpdate = mysqli_query($connection, $updateSQL);
			
	
			}
			
	
		
		
		
		if ($resultUpdate){
		
			echo("<script>alert('confirmation Successfully!');
			window.location.href='leaverequest_hod.php';</script>");
		}
		else
		{
			
			$failed = "Failed to update record";
		}
	

}

?>






<?php
				
				$lv_id = $_GET['lv_id'];
				
				
					
				 $resultRead = mysqli_query($connection, "SELECT * FROM day_off INNER JOIN applicant ON day_off.app_empid=applicant.app_empid WHERE lv_id='$lv_id'");
				
				 
				$row = mysqli_fetch_assoc($resultRead);
					
			   	?>

<html>
	<head>
	
	<?php /*?>	<link rel="stylesheet" href="../css/c.css" type="text/css"><?php */?>
	</head>
<body>
<div class="sidenav">
  <!--<c> <img src="applicant_picture/<?php /*?><?php $row['app_picture']; ?><?php */?>">  </c>	-->
		<br>
  <c><?php echo $rowi['hod_name']; ?>  </c>
  <c><?php echo $rowi['hod_empid']; ?>  </c>	
   <a href="graph_hod.php">GRAPH ANALYSIS</a>
  <a href="myprofile_hod.php">MY PROFILE </a>
  <a  href="applicantlist_hod.php">APPLICANT LIST </a>
  <a class="active" href="leaverequest_hod.php">LEAVE REQUEST </a>
  <a href="historyleaveapp_hod.php">APPLICANT LEAVE</a>
  
</div>

	
    <div class="" >
      <h1 align="center">LEAVE DETAILS</h1>
      <p>&nbsp;</p>
      <hr>
		<br>
		<br>
         <table id="customers" width="904" border="1" align="center">
           <tbody>
             <tr>
               <td width="144"><b>Employee ID</b></td>
               <td width="244"><?php echo $row['app_empid']; ?></td>
               <td width="244"><b>Designation</b></td>
               <td width="244"><?php echo $row['app_designation']; ?></td>
             </tr>
             <tr>
               <td><b>Name</b></td>
               <td><?php echo $row['app_name']; ?></td>
               <td><b>Email</b></td>
               <td><?php echo $row['app_email']; ?></td>
             </tr>
           </tbody>
         </table>

        <p>
           <!--
      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      -->
           
           
           
           
      </p>
        <table id="customers" width="523" border="1" align="center">
      <tbody>
		  	 <tr>
              <td><b>Date Apply</b></td>
              <td><?php echo $row['lv_date']; ?></td>
            </tr>
		     <tr>
              <td><b>Total Days</b></td>
              <td><?php echo $row['lv_bill']; ?></td>
            </tr>
            <tr>
              <td><b>Leave Type</b></td>
              <td><?php echo $row['lv_type']; ?></td>
            </tr>
            <tr>
              <td><b>Start Date</b></td>
              <td><?php echo $row['lv_startdate']; ?></td>
            </tr>
            <tr>
              <td width="197"><b>End Date</b></td>
              <td width="310"><?php echo $row['lv_enddate']; ?></td>
            </tr>
            <tr>
              <td><b>Comment</b></td>
              <td><?php echo $row['lv_comment']; ?></td>
            </tr>
          </tbody>
        </table>
      <p>&nbsp;</p>
		<form class="" method="post" action="" enctype="">
      <table width="504" border="10" align="center" id="">
          <tbody>
            <tr>
              <td width="244" align="center"><select  name="lv_status" class="form-control" >
                <option disabled selected value="In Progress">-</option>
                <option value="APPROVE" <?php if($row['lv_status']=="APPROVE"){ echo "selected"; } ?>>APPROVE</option>
                <option value="REJECTED"<?php if($row['lv_status']=="REJECTED"){ echo "selected"; } ?>>REJECTED</option>
                
              </select></td>
				
				
              <td width="244" align="center"><button type="submit" name="confirm" class="confirm">confirm</button> 
					   <input type="hidden" class="" name="lv_id" value="<?php echo $row['lv_id']; ?>"/>
				  		<input type="hidden" class="" name="lv_bill" value="<?php echo $row['lv_bill']; ?>"/>
				  		<input type="hidden" class="" name="lv_type" value="<?php echo $row['lv_type']; ?>"/>
				  		<input type="hidden" class="" name="app_balance" value="<?php echo $row['app_balance']; ?>"/>
				</td>
            </tr>
        </tbody>
      </table>
		</form>
      <p>&nbsp;</p>
      <div >
        
        
      </div>
  </div>
</form>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

.confirm {
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








