<?php # Script 18.5 - index.php


// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Dungeons and Dragons Fan Site';
include ('includes/header.html');
include ('includes/top.html');
?>

<?php


	
echo "<h1>Profile</h1>";

//if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	if (isset($_SESSION['user_id'])){
		
	$sessionid = $_SESSION['user_id'];
	
	//Select everything from characters
	$q = "SELECT first_name, last_name, email FROM users WHERE user_id=$sessionid";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
   
	
	
	while($row = mysqli_fetch_array($r))
	{
		

	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	$email = $row["email"];

	
	}
	
	echo "<p>First Name: " . $first_name . "</p><br>";
	echo "<p>Last Name: " . $last_name . "</p><br>";
	echo "<p>Email Address: " . $email . "</p><br>";	
	
	}
	
	else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}
	
mysqli_close($dbc);

 // End of the main Submit conditional.

?>

<?php include ('includes/footer.html'); ?>
