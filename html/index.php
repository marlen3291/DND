<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Dungeons and Dragons Fan Site';
include ('includes/header.html');
include ('includes/top.html');
?>


<div id="content">

<?php
// Welcome the user (by name if they are logged in):
echo '<h1>Welcome';
if (isset($_SESSION['first_name'])) {
	echo ", {$_SESSION['first_name']}";
}
echo '!</h1>';
?>

<p>This is my Dungeons and Dragons fan website.
This website is for non-profit and is a hobby side project.
Users can register, log in, and create their personal D&D character 
profiles to keep online. Users can also create journal log entries of 
their character.
</p>



</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
