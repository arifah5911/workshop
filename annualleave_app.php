<?php
require_once('connection.php');
require_once('sidebar.php');
require_once('header.php');

	
			

				

?>



<html>
	<head>
	</head>
<body>

<div>
<p><b>Annual Leave</b></p>
<hr>
<table width="385" border="1" align="center">
  <tbody>
    <tr>
      <td width="110">Total Leave</td>
      <td width="259"><input type="text" placeholder="Enter number" name="name" required></td>
    </tr>
    <tr>
      <td>Date Start</td>
      <td><input type="date" placeholder="" name="start_date" required></td>
    </tr>
    <tr>
      <td>Date End</td>
      <td><input type="date" placeholder="" name="start_end" required></td>
    </tr>
    <tr>
      <td>Reasons</td>
      <td><textarea class="form-control" rows="5" name="" id=""> </textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"> <button type="submit" name="apply" class="">Apply</button></td>
    </tr>
  </tbody>
</table>
	</div>
	<div>
		<table>
  <tr>
    <td>100</td>
    <td>200</td>
    <td>300</td>
  </tr>
  <tr>
    <td>400</td>
    <td>500</td>
    <td>600</td>
  </tr>
</table>
		</div>
	</body>

</html>