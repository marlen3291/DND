<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Welcome to this Site!';
include ('includes/header.html');
include ('includes/top.html');

?>
<div id="content">

	<div id="character">
		<ul> 
			<li><a href="view_character.php" >View Characters </a></li>
			<li><a href="create_character.php" >Forge A Character</a></li>
			<li><a href="edit_character.php" >Edit A Character</a></li>
		</ul>
	</div>

</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>


