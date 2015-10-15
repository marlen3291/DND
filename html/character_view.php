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

<?php

if (isset($_SESSION['user_id'])){
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	
	
	$character_id = $_POST['character_id'];
	
	//Select everything from characters
	$q = "SELECT * FROM characters WHERE character_id=$character_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
   
	
	while($row = mysqli_fetch_array($r))
	{
		
	$character_id = $row["character_id"];
	
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	$class = $row["class"];
	$level = $row["level"];
	$background = $row["background"];
	$player_name = $row["player_name"];
	$race = $row["race"];
	$alignment = $row["alignment"];
	$exp = $row["exp"];
	$armor_class = $row["armor_class"];
	
	$initiative = $row["initiative"];
	$speed = $row["speed"];	
	$max_hp = $row["max_hp"];
	$current_hp = $row["current_hp"];
	$hit_dice = $row["hit_dice"];
	$successes = $row["successes"];
	$failures = $row["failures"];
	$death_saves = $row["death_saves"];
	$strength = $row["strength"];
	$dexterity = $row["dexterity"];
	
	$constitution = $row["constitution"];
	$intelligence = $row["intelligence"];
	$wisdom = $row["wisdom"];
	$charisma = $row["charisma"];
	$inspiration = $row["inspiration"];
	$proficiency_bonus = $row["proficiency_bonus"];
	$saving_throws = $row["saving_throws"];
	$skills = $row["skills"];
	$passive_wisdom = $row["passive_wisdom"];
	$languages = $row["languages"];
	
	$proficiencies = $row["proficiencies"];
	$personality_traits = $row["personality_traits"];
	$ideals = $row["ideals"];
	$bonds = $row["bonds"];
	$flaws = $row["flaws"];
	$cp = $row["cp"];
	$sp = $row["sp"];
	$ep = $row["ep"];
	$gp = $row["gp"];
	$pp = $row["pp"];
	
	$features = $row["features"];
	$appearance = $row["appearance"];
	$organization = $row["organization"];
	$rank = $row["rank"];
	$age = $row["age"];
	$height = $row["height"];
	$weight = $row["weight"];
	$eyes = $row["eyes"];
	$skin = $row["skin"];
	$hair = $row["hair"];
	
	$backstory = $row["backstory"];
	$spell_slots = $row["spell_slots"];
	$spell_casting_ability = $row["spell_casting_ability"];
	$spell_save_dc = $row["spell_save_dc"];
	$spell_attack_bonus = $row["spell_attack_bonus"];
	
	
		
	}
	
	echo "<p>First Name: $first_name</p><br>";
	echo "<p>Last Name: $last_name</p><br>";
	echo "<p>Class: $class</p><br>";
	echo "<p>Level: $level</p><br>";
	echo "<p>Background: $background</p><br>";
	echo "<p>Player Name: $player_name</p><br>";
	echo "<p>Race: $race</p><br>";
	echo "<p>Alignment: $alignment</p><br>";
	echo "<p>Experience: $exp</p><br>";
	echo "<p>Armor Class: $armor_class</p><br>";
	
	echo "<p>Initiative: $initiative</p><br>";
	echo "<p>Speed: $speed</p><br>";
	echo "<p>Max HP: $max_hp</p><br>";
	echo "<p>Current HP: $current_hp</p><br>";
	echo "<p>Hit Dice: $hit_dice</p><br>";
	echo "<p>Successes: $successes</p><br>";
	echo "<p>Failures: $failures</p><br>";
	echo "<p>Strength: $strength</p><br>";
	echo "<p>Dexterity: $dexterity</p><br>";
	
	echo "<p>Constitution: $constitution</p><br>";
	echo "<p>Intelligence: $intelligence</p><br>";
	echo "<p>Wisdom: $wisdom</p><br>";
	echo "<p>Charisma: $charisma</p><br>";
	echo "<p>Inspiration: $inspiration</p><br>";
	echo "<p>Proficiency Bonus: $proficiency_bonus</p><br>";
	echo "<p>Saving Throws: $saving_throws</p><br>";
	echo "<p>Skills: $skills</p><br>";
	echo "<p>Passive Wisdom: $passive_wisdom</p><br>";
	echo "<p>Languages: $languages</p><br>";
	
	echo "<p>Proficiencies: $proficiencies</p><br>";
	echo "<p>Personality Traits: $personality_traits</p><br>";
	echo "<p>Ideals: $ideals</p><br>";
	echo "<p>Bonds: $bonds</p><br>";
	echo "<p>Flaws: $flaws</p><br>";
	echo "<p>CP: $cp</p><br>";
	echo "<p>SP: $sp</p><br>";
	echo "<p>EP: $ep</p><br>";
	echo "<p>GP: $gp</p><br>";
	echo "<p>PP: $pp</p><br>";
	
	echo "<p>Features: $features</p><br>";
	echo "<p>Appearance:</p>";
	echo '<img src="data:image/jpeg;base64,'.base64_encode($appearance).'" height="300" width="300"/><br>';
	echo "<p>Organization: $organization</p><br>";
	echo "<p>Rank: $rank</p><br>";
	echo "<p>Age: $age</p><br>";
	echo "<p>Height: $height</p><br>";
	echo "<p>Weight: $weight</p><br>";
	echo "<p>Eyes: $eyes</p><br>";
	echo "<p>Skin: $skin</p><br>";
	echo "<p>Hair: $hair</p><br>";
	
	echo "<p>Backstory: $backstory</p><br>";
	echo "<p>Spell Slots: $spell_slots</p><br>";
	echo "<p>Spellcasting Ability: $spell_casting_ability</p><br>";
	echo "<p>Spell Save DC: $spell_save_dc</p><br>";
	echo "<p>Spell Attack Bonus: $spell_attack_bonus</p><br>";
	mysqli_close($dbc);
	
	
}
}

else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}

?>
<form action="edit_character.php" method="get">

			<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
		
			<input type="submit" name="submit" value="Edit Character" />
		
</form>
</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
