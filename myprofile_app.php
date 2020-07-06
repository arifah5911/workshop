

<?php
require_once('connection.php');
require_once('sidebar_app.php');
require_once('header.php');


?>





<html>
	<head>
	
		<link rel="stylesheet" href="../css/c.css" type="text/css">
	</head>
<body>
	<div class="sidenav">
 <?php /*?> <c> <img src="applicant_picture/<?php $row['app_picture']; ?>">  </c>	<?php */?>
		<br>
  <c><?php echo $row['app_name']; ?>  </c>
  <c><?php echo $row['app_empid']; ?>  </c>	
  <a class="active" href="myprofile_app.php">MY PROFILE </a>
  <a href="applyleave_app.php">APPLY LEAVE </a>
  <a href="historyleave_app.php">HISTORY</a>
  
</div>

<form class="" method="" action="">
    <div class="" >
      <h1 align="center">MY PROFILE</h1>
      <p>&nbsp;</p>
      <hr>
		<br>
		<br>
         <table id="tbl" width="404" border="1" align="center">
           <tbody>
             <tr>
               <td width="144"><b>Employee ID</b></td>
               <td width="244"><?php echo $row['app_empid']; ?> </td>
             </tr>
             <tr>
               <td><b>Name</b></td>
               <td><?php echo $row['app_name']; ?> </td>
             </tr>
             <tr>
               <td><b>Department</b></td>
               <td><?php echo $row['app_department']; ?></td>
             </tr>
             <tr>
               <td><b>Designation</b></td>
               <td><?php echo $row['app_designation']; ?></td>
             </tr>
             <tr>
               <td><b>Email</b></td>
               <td><?php echo $row['app_email']; ?></td>
             </tr>
			 <tr>
               <td><b>Annual Leave</b></td>
               <td style="color: #027605"><b><?php echo $row['app_balance']; ?> /14</b></td>
             </tr>
           </tbody>
         </table>

        <!--
      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      -->
      

     

      <div >
        
         
      </div>
  </div>
</form>

</body>
</html>