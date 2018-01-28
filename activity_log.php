<?php 
$title = "Activity Log";
require_once "inc/memberHeader.php";
if($member == null)
	header('location:index.php');
?> 

<div id="activity">
<form action="" method="post">
	<table style="width: 100%">
		<tr>
			<td><select name="SearchDate" id="filterBtn">
			<option>Select Date</option>
			</select>
			</td>
			
			<td><select name="SearchType" id="filterBtn">
			<option>Select Type of Activity</option>
			</select>
			</td>
			
			
            </form>
            </td>		
       </tr>
	</table>
	
	<div>
	
		<table style="width: 100%">
			<tr>
				<td>Date</td>
				<td>Type</td>
				<td>Activity Description</td>
			</tr>
			
		</table>
	
	</div>
</form>
</div> 


</body>

</html> 

<?php
include_once("inc/memberFooter.php");
?>
