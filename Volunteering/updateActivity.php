	<link rel="stylesheet" href="../scripts/jquery-ui.css">
	<script src="../scripts/jquery-1.8.3.js"></script>
	<script src="../scripts/jquery.ui.core.js"></script>
	<script src="../scripts/jquery.ui.widget.js"></script>
	<script src="../scripts/datepicker.js"></script>
 	<script type="text/javascript">
		$(function() {
		$( "#fromDate" ).datepicker();
		$( "#toDate" ).datepicker();
		$( "#volID" ).append("<tr><td><input type=\"text\" name=\"fromDate\" id=\"fromDate\" /></td><td><input name=\"toDate\" type=\"text\" id=\"toDate\" /></td><td><input type=\"text\" name=\"fromTime\" id=\"fromTime\" /></td><td><input type=\"text\" name=\"toTime\" id=\"toTime\" /></td><td><input type=\"text\" name=\"hours\" id=\"hours\" /></td><td><input type=\"text\" name=\"area\" id=\"area\" /></td>      <td><input type=\"text\" name=\"activity\" id=\"activity\" /></td><td><select name=\"on_off\" id=\"on_off\"><option value=\"onsite\">Onsite</option> <option value=\"offsite\">Offsite</option></select></td><td><input type=\"text\" name=\"location\" id=\"location\" /></td><td><input type=\"text\" name=\"organisation\" id=\"organisation\" /></td><td><select name=\"project\" id=\"project\">" <?php while($row = mysql_fetch_array($projectResult)){  $projectid=$row['project_id'];$projectname=$row['project_title'];?>" <option value=/""<?php echo .$projectid; ?>/">"<?php echo "".$projectname; ?></option> 
      <?php } ?> </select></td>  </tr>\"");
	});
	</script>
	
<?php
//if (isset($_POST['submit']))
//{

 //connect to database
 include_once("../prod_conn.php");

 mysql_connect("$dbhost","$dbuser","$dbpass");
 mysql_select_db("$dbdatabase");
 
 $result = "SELECT project_id,project_title FROM projects";
 $projectResult=mysql_query($result);
 ?>

<form action="" method="post" name="activity">
  <p>&nbsp;</p>
  <table id="volID" width="484" height="221" border="1">
    <tr>
      <th scope="col"><label for="fromDate">From Date</label></th>
      <th scope="col"><label for="toDate">To Date</label></th>
      <th scope="col"><label for="fromTime">From Time</label></th>
      <th scope="col"><label for="toTime">To Time</label></th>
      <th scope="col"><label for="hours">Conservative Hours</label></th>
      <th scope="col"><label for="area">Area</label></th>
      <th scope="col"><label for="activity">Activity</label></th>
      <th scope="col"><label for="on_off">Onsite/Offsite</label></th>
      <th scope="col"><label for="location">Location</label></th>
      <th scope="col"><label for="organisation">Organisation Supported</label></th>
      <th scope="col"><label for="project">Project</label></th>
    </tr>
	<?php  insertFields(); ?>
	
	<?php function insertFields()
	{ 
		global $projectResult;
	?>
    <tr id="newField">
      <td><input type="text" name="fromDate" id="fromDate" /></td>
      <td><input name="toDate" type="text" id="toDate" /></td>
      <td><input type="text" name="fromTime" id="fromTime" /></td>
      <td><input type="text" name="toTime" id="toTime" /></td>
      <td><input type="text" name="hours" id="hours" /></td>
      <td><input type="text" name="area" id="area" /></td>
      <td><input type="text" name="activity" id="activity" /></td>
      <td><select name="on_off" id="on_off">
        <option value="onsite">Onsite</option>
        <option value="offsite">Offsite</option>
      </select></td>
      <td><input type="text" name="location" id="location" /></td>
      <td><input type="text" name="organisation" id="organisation" /></td>
      <td><select name="project" id="project">
        <?php 
		while($row = mysql_fetch_array($projectResult))
  		{
	  $projectid=$row['project_id'];
	  $projectname=$row['project_title'];
	  ?><option value="<?php echo "".$projectid; ?>"><?php echo "".$projectname; ?></option> 
      <?php } ?>
      </select></td>
    </tr>
	</table>
	<?php } ?>
	
    <input name="submit" type="submit" value="Submit" />
</form>

<?php
 if(isset($_POST['submit'])) 
	{
			insertQuery();
	}
	
function insertQuery()
{
		$projectid=$_POST['project'];
		//echo $projectid;
		$donorid=234;
		$type="Shram Dhaan";
		$volunteerInsertAtts= "donor_id,from_date,to_date,from_time,to_time,hours,donation_type,area,activity_done,onsite_offsite,location,organisation,notes,project_id,approval_status";
		$volunteerValues="$donorid,'".$_POST['fromDate']."','".$_POST['toDate']."','".$_POST['fromTime']."','".$_POST['toTime']."','".$_POST['hours']."','$type','".$_POST['area']."','".$_POST['activity']."','".$_POST['on_off']."','".$_POST['location']."','".$_POST['organisation']."','notesss','".$projectid."','P'";
		
		
		$insertUserQuery="INSERT INTO volunteering($volunteerInsertAtts) VALUES($volunteerValues)";
	//echo $insertUserQuery;
	if (!mysql_query($insertUserQuery))
  	{
  		die('Error: ' . mysql_error());
		showError();
		exit();
  	}
			
}

?>
