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

<p>
Updates:
</p>

<p>Commits on Nov 14, 2015</p>
	<p>I fixed a lot of issues including public characters and chronicles and separating their public boolean values. I also allowed radio buttons to be checked based on the input value in the database for several create and edit pages</p>
	
<p>Commits on Nov 13, 2015</p>
	<p>I fixed the public chronicle list page with an error with sorting tables</p>
	<p>I bolded some of the p elements and changed the font and look a little bit [issue17]</p>
	<p>I added proficiency bonus or stat modifiers for strength, dexterity,constitution, intelligence, wisdom, and charisma</p>
	<p>I added the Jquery table sorter plugin and changed all the site tables</p>
	
<p>Commits on Nov 12, 2015</p>
	<p>I improved the look of the spell view page and ended up fixing the look of similar pages [issue4]</p>
	<p>I moved the character photo to the main stats tab and reordered the look for the character view tabs</p>
	<p>I changed the div stats placement</p>
	<p>Fixed the placement of the stats divs on the the main character tabs[issue7]</p>
	<p>I changed the background area and content area and fixed the position of some elements including tables, p, and h1</p>
	
<p>Commits on Nov 1, 2015</p>

	<p>I made a quick fix and added the character name for the character's chronicle pages to 
	let users know which character is for each chronicle.</p>

	<p>I edited out echo checking statements that checked for variable existences. 
	I also added proper titles and headers to some of the pages and forms. 
	I also took out the social links and overflow scroll since they weren't working or did not look well. 
	I also started adding my Github changes to the index page as updates.</p>
	
<p>Commits on Oct 28, 2015:</p>

	<p>I fixed the menu dropdown links by implementing a simple jquery menu 
	sample found online. The dropdown links look a little better now.</p>

	<p>I added public options to character chronicles and a php to view public character chronicles. 
	I also changed website font-size to 12 px for everything</p>

<p>Commits on Oct 27, 2015:</p>

	<p>Added delete functions for characters, spells, items, and chronicles.
	Small issue with character delete with multi query delete</p>

	<p>I added inventory view for the character view page and a means to acquire 
	new equipment and to edit existing equipment</p>

	<p>I fixed the character view page a little bit by adding an inventory tab and chronicle tab. 
	The chronicles can now be viewed in the character_view page. 
	The create and edit pages have also been fixed with correct redirects and php variables passed in the url</p>

<p>Commits on Oct 26, 2015</p>

	<p>Added spell inventory and means to acquire spells in character view page. 
	Fixed other parts of website like tabling</p>

<p>Commits on Oct 23, 2015</p>

	<p>Fixed image edits and layout of character view information</p>

<p>Commits on Oct 22, 2015</p>
	<p>I updated the image slider using jssor full width slider and added jquery tabs to the character view page 
	to make different pages for character information. The slider and images still need work and the character 
	content still needs to be formatted properly.
	</p>
	
<p>Commits on Oct 15, 2015</p>
	<p>Finished up chronicle creation. Also updated or added character and chronicle views and edit pages. 
	I also change site look a little bit</p>

<p>Commits on Oct 13, 2015</p>
	<p>I finished create, view, and character view pages. 
	I manage to extract uploaded image from database.</p>

<p>Commits on Oct 9, 2015</p>

	<p>Started making a D&D personal hobby website. I used existing user and 
	administration code from njit projects and worked from there. I made a new top html file, 
	css basic layout file, and slider javascript.I'm now working on character pages</p>
<br>
<br>


<?php include ('includes/footer.html'); ?>
