<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Dungeons and Dragons Fan Site';
include ('includes/header.html');
include ('includes/top.html');
?>




<?php

echo "<h1>Login Logs</h1>";


if ($_SESSION['user_level'] == 1 && isset($_SESSION['user_id'])){

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	// Assume invalid values:
	$ht = $mt = $st= FALSE;
	
	// Check for hours
	if (preg_match ('/^\d{1,4}$/i', $trimmed['hours'])) {
		$h = mysqli_real_escape_string ($dbc, $trimmed['hours']);
		$ht = TRUE;
	} else {
		echo '<p class="error">Please enter the amount of hours within 1 to 4 digits!</p>';
	}
	
	// Check for minutes
	if (preg_match ('/^[0-5]?[0-9]$/i', $trimmed['minutes'])) {
		$m= mysqli_real_escape_string ($dbc, $trimmed['minutes']);
		$mt = TRUE;
	} else {
		echo '<p class="error">Please enter the amount of minutes within 0-59 minutes!</p>';
	}
	
	// Check for seconds
	if (preg_match ('/^[0-5]?[0-9]$/i', $trimmed['seconds'])) {
		$s = mysqli_real_escape_string ($dbc, $trimmed['seconds']);
		$st = TRUE;
	} else {
		echo '<p class="error">Please enter the amount of seconds within 0-59 seconds!</p>';
	}
	
	if ($ht && $mt && $st) { // If everything's OK.

	//Convert input hours into seconds
	$hc =$h*3600;
	
	//Convert input minutes into seconds
	$mc =$m*60;
	
	//Add total number of seconds
	$st = $hc + $mc + $s;
	

	
	
	
	//Selects users within inputted time
	$q = "SELECT * FROM users WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(`last_logged_in`) < $st";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
   echo '<table id="myTable" class="tablesorter">';
	echo "<thead>";
		echo "<tr>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Email</th>";
			echo "<th>Login Date</th>";
			echo "<th>Time Elapsed Since Last Login</th>";
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while($row = mysqli_fetch_array($r))
	{
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	$email = $row["email"];
	$last_logged_in = $row["last_logged_in"];
	
	$time_last = time() - strtotime($last_logged_in);
	
	$htime_last = floor($time_last/3600);
	$break_time_last = $time_last%3600;
	$mtime_last = floor($break_time_last/60);
	$stime_last = $break_time_last%60;
	
	echo "<tr>";

		echo "<td>" .	$first_name	.	"</td>"	;
		echo "<td>" .	$last_name	.	"</td>"	;
		echo "<td>" .	$email.	"</td>"	;
		echo "<td>" .	$last_logged_in	.	"</td>"	;
		echo "<td>" .   $htime_last . " hours " . $mtime_last . " minutes " . $stime_last . " seconds";
		//echo "<td>" .   $unix	.	"</td>";
		
		echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	
	
	
	}
	
	
	
	
	else{
	
	//Output time error messages
	
	}
	
mysqli_close($dbc);


} // End of the main Submit conditional.

}

else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}
?>

<form action="who_logged_in.php" method="post">
	<fieldset>
	
	<!--
	<p><b>Email Address:</b> <input type="text" name="email" size="20" maxlength="60" /></p>
	<p><b>Password:</b> <input type="password" name="pass" size="20" maxlength="20" /></p>
	-->
	
	<p><b>Hours:</b> <input type="text" name="hours" size="20" maxlength="60" value="<?php if (isset($trimmed['hours'])) echo $trimmed['hours'];else {echo 1;} ?>"/></p>
	<p><b>Minutes:</b> <input type="text" name="minutes" size="20" maxlength="60" value="<?php if (isset($trimmed['minutes'])) echo $trimmed['minutes'];else {echo 0;}  ?>" /></p>
	<p><b>Seconds:</b> <input type="text" name="seconds" size="20" maxlength="60" value="<?php if (isset($trimmed['seconds'])) echo $trimmed['seconds'];else {echo 0;}  ?>" /></p>

	
	<div align="center"><input type="submit" name="submit" value="Submit" /></div>
	</fieldset>
</form>



<?php include ('includes/footer.html'); ?>
