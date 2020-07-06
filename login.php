
<?php
session_start();
$error=''; 

include "connection.php";
if(isset($_POST['login']))
{	
	$usertype = $_POST['usertype'];			
	$empid	= $_POST['empid'];
	$password	= $_POST['password'];
	
	
	if($usertype == "Admin"){
	//admin
	$query1 = mysqli_query($connection, "SELECT * FROM admin WHERE adm_empid='$empid' AND adm_pss='$password'");
	if(mysqli_num_rows($query1) == 0)
	{
		echo "<script>window.alert('Username or Password is invalid!')</script>";
		
	}
	else
	{
		$row1 = mysqli_fetch_assoc($query1);
		$_SESSION['admin'] = $row1['level'];
		
		if($_SESSION['admin'] == $row1['level'])
		{	 
		 	$_SESSION["admid"]=$empid;
			header("Location: myprofile_adm.php");
		}
		else
		{
			$error = "Failed Login";
		}
	}
	}
	//head department
	elseif($usertype == "Head Department"){
	$query2 = mysqli_query($connection, "SELECT * FROM head_of_department WHERE hod_empid='$empid' AND hod_pss='$password'");
	if(mysqli_num_rows($query2) == 0)
	{
		echo "<script>window.alert('Username or Password is invalid!')</script>";
	}
	else
	{
		$row2 = mysqli_fetch_assoc($query2);
		$_SESSION['head department'] = $row2['level'];
		
		if($_SESSION['head department'] == $row2['level'])
		{	 
		 	$_SESSION["hodid"]=$empid;
			header("Location: graph_hod.php");
		}
		else
		{
			$error = "Failed Login";
		}
	}
	}
	elseif($usertype == "Applicant"){
	//student
	$query3 = mysqli_query($connection, "SELECT * FROM applicant WHERE app_empid='$empid' AND app_password='$password'");
	if(mysqli_num_rows($query3) == 0)
	{
		echo "<script>window.alert('Username or Password is invalid!')</script>";
	}
	else
	{
		$row3 = mysqli_fetch_assoc($query3);
		$_SESSION['applicant'] = $row3['level'];
		
		if($_SESSION['applicant'] == $row3['level'])
		{	 
		 	$_SESSION["appid"]=$empid;
			header("Location: myprofile_app.php");
		}
		else
		{
			$error = "Failed Login";
		}
	}
	}
}

			
?>


<html>
	<head>
		<link rel="stylesheet" href="c.css">
	</head>
<body>


<div style="margin-left:80px;margin-right:80px" align="center">
	<div style="margin-top:150px;" id="system">
            <h1 ><b>E-Leave Management System</b></h1>
           
			
           	
           <div>
            <hr style="margin:top:inherit;width:40%">
            
            <form method="POST" action="">
            <table border="0" style="width:inherit">
            	<tr>
					<p>
						
                <input  type="radio" name="usertype" value="Admin" checked >
                <label>Admin</label>
                
                <input  type="radio" name="usertype"  value="Head Department">
                <label>Head Department</label>
                
                <input type="radio" name="usertype"  value="Applicant">
                <label>Applicant</label> 
                      	
            </p>
				</tr>
            	 
            	<tr>
                	<td width="201" height="50">Employee ID </td>
                	<td width="259"><input  type="text" name="empid" placeholder="ID" required /></td>
              	</tr>
                <tr>
                    <td height="65">Password</td>
                    <td><input type="password" name="password" placeholder="password" /></td>
                </tr>
              	<tr>
                    <td height="49">&nbsp;</td>
                    <td><input type="submit"  name="login" value="Login"></td>
				</tr>
              	   	
            </table>
            </form>
            <p>&nbsp;</p>
    </div>
		



</div>
</div>

<div class="footer" >
	<p><b><i>&copy;copyright arifahahmad</i></b></p>
	</div>
<style>
	body {
  font-family: "Lato", sans-serif;
	background-color: #95C5C3;
	
 
}
.footer{
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	background-color: #AAAC8B;
	color: black;
	text-align: center;
	}
	input[type=submit] {
  background-color: #000000;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
	input[type=text],input[type=password] {
    width: 80%;
    padding: 5px 22px;
    margin: 10px 5px;
    box-sizing: border-box;  
}

</style>
</body>
</html>