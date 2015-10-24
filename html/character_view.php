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
	
	echo '
	
<div id="tabs">
  	<ul>
    	<li><a href="#tabs-1">Character Main Stats </a></li>
    	<li><a href="#tabs-2">Background and Features</a></li>
    	<li><a href="#tabs-3">Spellcasting</a></li>
  	</ul>
  	
  	';
  	
  	//Page 1 Start
  	echo '
  	<div id="tabs-1">
    ';	
  	
  	//Page 1
	
	//Intro
	
	
	//Some Background Info
	echo '<div id="playerinfo">';
		echo "<p>Name: $first_name $last_name</p>";
		echo "<p>Class: $class</p>";
		echo "<p>Level: $level</p>";
		echo "<p>Background: $background</p><br>";
		echo "<p>Player Name: $player_name</p>";
		echo "<p>Race: $race</p>";
		echo "<p>Alignment: $alignment</p>";
		echo "<p>Experience: $exp</p>";
	echo '</div>';
	
	//Stats 1
	echo '<div id="stats1">';
		echo "<p>Strength: $strength</p>";
		echo "<p>Dexterity: $dexterity</p>";
		echo "<p>Constitution: $constitution</p>";
		echo "<p>Intelligence: $intelligence</p>";
		echo "<p>Wisdom: $wisdom</p>";
		echo "<p>Charisma: $charisma</p>";
	echo '</div>';
	
	
	//Stats 2

	echo '<div id="stats2">';
		echo "<p>Inspiration: $inspiration</p>";
		echo "<p>Proficiency Bonus: $proficiency_bonus</p>";
		echo "<p>Saving Throws: $saving_throws</p>";
		echo "<p>Skills: $skills</p>";
		echo "<p>Passive Wisdom: $passive_wisdom</p>";
		echo "<p>Languages: $languages</p>";
		echo "<p>Proficiencies: $proficiencies</p>";
	echo '</div>';
	
	//Stats 3
	echo '<div id="stats3">';
		echo "<p>Armor Class: $armor_class</p>";
		echo "<p>Initiative: $initiative</p>";
		echo "<p>Speed: $speed</p>";
		echo "<p>Max HP: $max_hp</p>";
		echo "<p>Current HP: $current_hp</p>";
		echo "<p>Hit Dice: $hit_dice</p>";
		echo "<p>Successes: $successes</p>";
		echo "<p>Failures: $failures</p>";
	echo '</div><br>';
	
	//Stats 4	
	echo '<div id="stats4">';
		echo "<p>Personality Traits: $personality_traits</p>";
		echo "<p>Ideals: $ideals</p>";
		echo "<p>Bonds: $bonds</p>";
		echo "<p>Flaws: $flaws</p>";
	echo '</div>';
	
	echo '<div id="stats5">';
		echo "<p>CP: $cp</p>";
		echo "<p>SP: $sp</p>";
		echo "<p>EP: $ep</p>";
		echo "<p>GP: $gp</p>";
		echo "<p>PP: $pp</p>";
	echo '</div><br><br>';
	//Page 1 End
  	echo'
  	</div>
  	';
  	
  	//Page 2 Start
  	echo '
  	<div id="tabs-2">
   ';
   
   //Page 2
	echo '<div id="background1">';
		echo "<p>Appearance:</p>";
		echo '<img src="data:image/jpeg;base64,'.base64_encode($appearance).'" height="300" width="300"/>';
	echo '</div>';
	
	echo '<div id="background2">';
		echo "<p>Age: $age</p>";
		echo "<p>Height: $height</p>";
		echo "<p>Weight: $weight</p><br>";
		echo "<p>Eyes: $eyes</p>";
		echo "<p>Skin: $skin</p>";
		echo "<p>Hair: $hair</p>";
	
		echo "<p>Organization: $organization</p>";
		echo "<p>Rank: $rank</p><br>";
	
		echo "<p>Backstory: $backstory</p><br>";
	
		echo "<p>Features: $features</p><br>";
   echo '</div><br>';
   //Page 2 End
   echo '
  	</div>
  	';
  	
  	//Page 3 Start
  	echo '
  	<div id="tabs-3">
	';
	
	//Page 3
	echo "<p>Spell Slots: $spell_slots</p>";
	echo "<p>Spellcasting Ability: $spell_casting_ability</p>";
	echo "<p>Spell Save DC: $spell_save_dc</p>";
	echo "<p>Spell Attack Bonus: $spell_attack_bonus</p>";
	
	//Page 3 End	
	echo '
  	</div>
  	';
  	
//Tab End  	
echo '
</div>
';

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
