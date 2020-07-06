

<?php
require_once('connection.php');
require_once('sidebar_hod.php');
require_once('header.php');


?>





<html>
	<head>
	
		<link rel="stylesheet" href="../workshop1/css/c.css" type="text/css">
	</head>

<body>
	   <div class="sidenav">
  <!--<c> <img src="applicant_picture/<?php /*?><?php $row['app_picture']; ?><?php */?>">  </c>	-->
		<br>
  <c><?php echo $row['hod_name']; ?>  </c>
  <c><?php echo $row['hod_empid']; ?>  </c>	
   <a class="active" href="graph_hod.php">GRAPH ANALYSIS</a>
  <a href="myprofile_hod.php">MY PROFILE </a>
  <a href="applicantlist_hod.php">APPLICANT LIST </a>
  <a href="leaverequest_hod.php">LEAVE REQUEST </a>
  <a href="historyleaveapp_hod.php">APPLICANT LEAVE</a>
  
</div>
      <h1 align="center">Monthly Approval Leave Graph </h1>
      <p>&nbsp;</p>
      <hr>
		<br>
		
	<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">    
		<tr bgColor="#000000" style="font-family: sans-serif; color: white " >
			
				<table><br>
					<?php
						
						
						if($stmt = $connection->query("SELECT lv_type, COUNT(app_empid) as People FROM day_off WHERE lv_status='APPROVE' AND MONTH(lv_startdate) = MONTH(CURRENT_DATE()) GROUP BY lv_type"))
							
						{
							echo "<center>Total of leave type : ".$stmt->num_rows."<br><center>";
							
							 $php_data_array = Array(); // create PHP array
							// echo "<table><tr><th>Blood Type</th><th>Amount</th></tr>";
						
							while ($row = $stmt->fetch_row()) {
								//echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
								$php_data_array[] = $row; // Adding to array
							}
							echo "</table>";
						}else{
							echo $connection->error;
					}
						//print_r( $php_data_array);
						// You can display the json_encode output here. 
						//echo json_encode($php_data_array); 

						// Transfor PHP array to JavaScript two dimensional array 
						echo "<script>var my_2d = ".json_encode($php_data_array)."
						</script>";
					?>
					<br><br>
						<div id="chart_div"  width="200" height="80" style=" margin-left: 250px; display: block; width: 600px; height: 200px;"></div>
							<br><br>
								<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
								<script type="text/javascript">

								  // Load the Visualization API and the corechart package.
								  google.charts.load('current', {packages: ['corechart', 'bar']});
								  google.charts.setOnLoadCallback(drawChart);
								  
								  function drawChart() {
									$l = "ml";
									// Create the data table.
									var data = new google.visualization.DataTable();
									data.addColumn('string', 'Leave Type');
									data.addColumn('number', 'applicant leave');
									//data.addColumn('number', 'Profit');
									
									for(i = 0; i < my_2d.length; i++)
										data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
											var options = {
												  title: 'Leave Type Graph',
												  hAxis: {title: 'lv_type',  titleTextStyle: {color: '#000'}},
												  vAxis: {minValue: 0}
												};

										var chart = new google.charts.Bar(document.getElementById('chart_div'));
										chart.draw(data, options);
									}
								</script> 
									<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">    
										<td width=1%></td>
											 <tr bgColor="#000000">
											<td width="100%">&nbsp;</td>
										  </tr>
										<tr>
											<td style="float:right;" align="right" width="100%" >
												<br>
												<input style=" margin-right: 50px; "name="" type="button" class="print" value="Print" onclick="javascript:window.print()" />
											</td>
										</tr>
									</body>
      
<style>
	.print {
  background-color: #29A5E1;
  border: none;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
  margin: 2px 1px;
  cursor: pointer;
}
</style>     
					</html>

