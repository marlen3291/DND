<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Edit Character';
include ('includes/header.html');
include ('includes/top.html');

?>

<div id="content">

<?php

if (isset($_SESSION['user_id'])){

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Handle the form.

// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	
	
	$character_id = $_GET['character_id'];
	
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
	
	$public_character	= $row["public_character"];
	
	mysqli_close($dbc);
		
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

		// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	$character_id = $_POST['character_id'];
	echo $character_id;
// Assume invalid values:
	
	$first_name = $last_name = $class = $level = $background = FALSE;
	$player_name = $race = $alignment = $exp = $armor_class = FALSE;
	$initiative = $speed = $max_hp = $current_hp = $hit_dice = FALSE;
	$successes = $failures = $death_saves = $strength = $dexterity = FALSE;
	$constitution = $intelligence = $wisdom = $charisma = $inspiration = FALSE;
	$proficiency_bonus = $saving_throws = $skills = $passive_wisdom = $languages = FALSE;
	$proficiencies = $personality_traits = $ideals = $bonds = $flaws = FALSE;
	$cp = $sp = $ep = $gp = $pp = FALSE;
	$features = $appearance = $organization = $rank = $age = FALSE;
	$height = $weight = $eyes = $skin = $hair = FALSE;
	$backstory = $spell_slots = $spell_casting_ability = $spell_save_dc = $spell_attack_bonus = FALSE;
	
//Setting up image uploads:


$appearance = addslashes(file_get_contents($_FILES['appearance']['tmp_name']));
//you keep your column name setting for insertion. I keep image type Blob.



	
//Setting up variables
	
	$first_name = mysqli_real_escape_string ($dbc, $trimmed['first_name']);
	$last_name = mysqli_real_escape_string ($dbc, $trimmed['last_name']);
	$class = mysqli_real_escape_string ($dbc, $trimmed['class']);
	$level = mysqli_real_escape_string ($dbc, $trimmed['level']);
	$background = mysqli_real_escape_string ($dbc, $trimmed['background']);
	$player_name = mysqli_real_escape_string ($dbc, $trimmed['player_name']);
	$race = mysqli_real_escape_string ($dbc, $trimmed['race']);
	$alignment = mysqli_real_escape_string ($dbc, $trimmed['alignment']);
	$exp = mysqli_real_escape_string ($dbc, $trimmed['exp']);
	$armor_class = mysqli_real_escape_string ($dbc, $trimmed['armor_class']);
	
	$initiative = mysqli_real_escape_string ($dbc, $trimmed['initiative']);
	$speed = mysqli_real_escape_string ($dbc, $trimmed['speed']);
	$max_hp = mysqli_real_escape_string ($dbc, $trimmed['max_hp']);
	$current_hp = mysqli_real_escape_string ($dbc, $trimmed['current_hp']);
	$hit_dice = mysqli_real_escape_string ($dbc, $trimmed['hit_dice']);
	$successes = mysqli_real_escape_string ($dbc, $trimmed['successes']);
	$failures = mysqli_real_escape_string ($dbc, $trimmed['failures']);
	$death_saves = mysqli_real_escape_string ($dbc, $trimmed['death_saves']);
	$strength = mysqli_real_escape_string ($dbc, $trimmed['strength']);
	$dexterity = mysqli_real_escape_string ($dbc, $trimmed['dexterity']);
	
	$constitution = mysqli_real_escape_string ($dbc, $trimmed['constitution']);
	$intelligence = mysqli_real_escape_string ($dbc, $trimmed['intelligence']);
	$wisdom = mysqli_real_escape_string ($dbc, $trimmed['wisdom']);
	$charisma = mysqli_real_escape_string ($dbc, $trimmed['charisma']);
	$inspiration = mysqli_real_escape_string ($dbc, $trimmed['inspiration']);
	$proficiency_bonus = mysqli_real_escape_string ($dbc, $trimmed['proficiency_bonus']);
	$saving_throws = mysqli_real_escape_string ($dbc, $trimmed['saving_throws']);
	$skills = mysqli_real_escape_string ($dbc, $trimmed['skills']);
	$passive_wisdom = mysqli_real_escape_string ($dbc, $trimmed['passive_wisdom']);
	$languages = mysqli_real_escape_string ($dbc, $trimmed['languages']);
	
	$proficiencies = mysqli_real_escape_string ($dbc, $trimmed['proficiencies']);
	$personality_traits = mysqli_real_escape_string ($dbc, $trimmed['personality_traits']);
	$ideals = mysqli_real_escape_string ($dbc, $trimmed['ideals']);
	$bonds = mysqli_real_escape_string ($dbc, $trimmed['bonds']);
	$flaws = mysqli_real_escape_string ($dbc, $trimmed['flaws']);
	$cp = mysqli_real_escape_string ($dbc, $trimmed['cp']);
	$sp = mysqli_real_escape_string ($dbc, $trimmed['sp']);
	$ep = mysqli_real_escape_string ($dbc, $trimmed['ep']);
	$gp = mysqli_real_escape_string ($dbc, $trimmed['gp']);
	$pp = mysqli_real_escape_string ($dbc, $trimmed['pp']);
	
	$features = mysqli_real_escape_string ($dbc, $trimmed['features']);
	$appearance = $appearance;
	
	
	$organization = mysqli_real_escape_string ($dbc, $trimmed['organization']);
	$rank = mysqli_real_escape_string ($dbc, $trimmed['rank']);
	$age = mysqli_real_escape_string ($dbc, $trimmed['age']);
	$height = mysqli_real_escape_string ($dbc, $trimmed['height']);
	$weight = mysqli_real_escape_string ($dbc, $trimmed['weight']);
	$eyes = mysqli_real_escape_string ($dbc, $trimmed['eyes']);
	$skin = mysqli_real_escape_string ($dbc, $trimmed['skin']);
	$hair = mysqli_real_escape_string ($dbc, $trimmed['hair']);
	
	
	$backstory = mysqli_real_escape_string ($dbc, $trimmed['backstory']);
	$spell_slots = mysqli_real_escape_string ($dbc, $trimmed['spell_slots']);
	$spell_casting_ability = mysqli_real_escape_string ($dbc, $trimmed['spell_casting_ability']);
	$spell_save_dc = mysqli_real_escape_string ($dbc, $trimmed['spell_save_dc']);
	$spell_attack_bonus = mysqli_real_escape_string ($dbc, $trimmed['spell_attack_bonus']);
	
	$public_character = mysqli_real_escape_string ($dbc, $trimmed['public_character']);
	 
	 // Update Character to Database
	$s = "UPDATE characters SET
	
	first_name ='$first_name', 
	last_name ='$last_name', 
	class ='$class', 
	level='$level', 
	background='$background', 
	player_name='$player_name', 
	race='$race', 
	alignment='$alignment', 
	exp='$exp', 
	armor_class='$armor_class', 
	initiative='$initiative', 
	speed='$speed', 
	max_hp='$max_hp', 
	current_hp='$current_hp', 
	hit_dice='$hit_dice', 
	successes='$successes', 
	failures='$failures', 
	death_saves='$death_saves', 
	strength='$strength', 
	dexterity='$dexterity', 
	constitution='$constitution', 
	intelligence='$intelligence', 
	wisdom='$wisdom', 
	charisma='$charisma', 
	inspiration='$inspiration', 
	proficiency_bonus='$proficiency_bonus', 
	saving_throws='$saving_throws', 
	skills='$skills', 
	passive_wisdom='$passive_wisdom', 
	languages='$languages', 
	proficiencies='$proficiencies', 
	personality_traits='$personality_traits', 
	ideals='$ideals', 
	bonds='$bonds',
	flaws='$flaws', 
	cp='$cp', 
	sp='$sp', 
	ep='$ep',
	gp='$gp', 
	pp='$pp', 
	features='$features', 
	organization='$organization', 
	rank='$rank', 
	age='$age', 
	height='$height', 
	weight='$weight', 
	eyes='$eyes', 
	skin='$skin', 
	hair='$hair',
	backstory='$backstory', 
	spell_slots='$spell_slots', 
	spell_casting_ability='$spell_casting_ability', 
	spell_save_dc='$spell_save_dc', 
	spell_attack_bonus='$spell_attack_bonus',
	public_character='$public_character'
	
	WHERE character_id = $character_id";
	 
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
			
				
			} else { // If it did not run OK.
				echo '<p class="error">Character could not be updated</p>';
			}
			
	if (empty($appearance)) {
		
    echo '$appearance is either 0, empty, or not set at all' ;
	
	}
	
	else {
	
		$a = "UPDATE characters SET appearance ='$appearance' WHERE character_id = $character_id"; 
		
		$b = mysqli_query ($dbc, $a) or trigger_error("Query: $a\n<br />MySQL Error: " . mysqli_error($dbc));

		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
		
				// Finish the page:
				echo '<h3>It worked!</h3>';
				$url = BASE_URL . 'character_view.php?character_id='. $character_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
		}
		 
		else { // If it did not run OK.
				echo '<p class="error">Character image could not be updated</p>';
			}
			
	
	}
	
	
	mysqli_close($dbc);
	
	$url = BASE_URL . 'character_view.php?character_id='. $character_id;
	
	ob_end_clean();
	header("Location: $url");
	exit();
	
	
}

} // End of the main Submit conditional.

else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}
?>

<h1>Edit A Character</h1>
<form action="edit_character.php" method="post" enctype="multipart/form-data">

	<fieldset>
	
	<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Character Main Stats</a></li>
    <li><a href="#tabs-2">Features and Backstory</a></li>
    <li><a href="#tabs-3">Spellcasting</a></li>
  </ul>
  <div id="tabs-1">
		
		<p><b>Character First Name:</b> <input type="text" name="first_name" size="20" maxlength="20" value="<?php echo $first_name; ?>" /></p>
	
	<p><b>Character Last Name:</b> <input type="text" name="last_name" size="20" maxlength="40" value="<?php echo $last_name; ?>" /></p>

	<p><b>Class:</b> <input type="text" name="class" size="20" maxlength="20" value="<?php echo $class; ?>" /></p>
	
	<p><b>Level:</b> <input type="text" name="level" size="20" maxlength="40" value="<?php echo $level; ?>" /></p>
	
	<p><b>Background:</b> <input type="text" name="background" size="20" maxlength="20" value="<?php if (isset($trimmed['background'])) echo $trimmed['background']; ?>" /></p>

	<!--
	<p><b>Background:</b></p><textarea rows="10" cols="100" name="background" />
	<?php echo $background; ?>
	</textarea>	
	-->
	
	<p><b>Player Name</b> <input type="text" name="player_name" size="20" maxlength="40" value="<?php echo $player_name; ?>" /></p>
	
	<p><b>Race</b> <input type="text" name="race" size="20" maxlength="20" value="<?php echo $race; ?>" /></p>
	
	<p><b>Alignment</b> <input type="text" name="alignment" size="20" maxlength="40" value="<?php echo $alignment; ?>" /></p>

	<p><b>Experience Points:</b> <input type="text" name="exp" size="20" maxlength="40" value="<?php echo $exp; ?>" /></p>
		
	<p><b>Armor Class:</b> <input type="text" name="armor_class" size="20" maxlength="40" value="<?php echo $armor_class; ?>" /></p>
	
	<p><b>Initiative:</b> <input type="text" name="initiative" size="20" maxlength="40" value="<?php echo $initiative; ?>" /></p>		

	<p><b>Speed:</b> <input type="text" name="speed" size="20" maxlength="40" value="<?php echo $speed; ?>" /></p>
	
	<p><b>Max HP:</b> <input type="text" name="max_hp" size="20" maxlength="40" value="<?php echo $max_hp; ?>" /></p>
	
	<p><b>Current HP:</b> <input type="text" name="current_hp" size="20" maxlength="40" value="<?php echo $current_hp; ?>" /></p>
	
	<p><b>Hit_Dice:</b> <input type="text" name="hit_dice" size="20" maxlength="40" value="<?php echo $hit_dice; ?>" /></p>

	<p><b>Successes:</b> <input type="text" name="successes" size="20" maxlength="40" value="<?php echo $successes; ?>" /></p>

	<p><b>Failures:</b> <input type="text" name="failures" size="20" maxlength="40" value="<?php echo $failures; ?>" /></p>

	<p><b>Death Saves:</b> <input type="text" name="death_saves" size="20" maxlength="40" value="<?php echo $death_saves; ?>" /></p>

	<p><b>Strength:</b> <input type="text" name="strength" size="20" maxlength="40" value="<?php echo $strength; ?>" /></p>

	<p><b>Dexterity:</b> <input type="text" name="dexterity" size="20" maxlength="40" value="<?php echo $dexterity; ?>" /></p>

	<p><b>Constitution:</b> <input type="text" name="constitution" size="20" maxlength="40" value="<?php echo $constitution; ?>" /></p>

	<p><b>Intelligence:</b> <input type="text" name="intelligence" size="20" maxlength="40" value="<?php echo $intelligence; ?>" /></p>

	<p><b>Wisdom:</b> <input type="text" name="wisdom" size="20" maxlength="40" value="<?php echo $wisdom; ?>" /></p>

	<p><b>Charisma:</b> <input type="text" name="charisma" size="20" maxlength="40" value="<?php echo $charisma; ?>" /></p>

	<p><b>Inspiration:</b> <input type="text" name="inspiration" size="20" maxlength="40" value="<?php echo $inspiration; ?>" /></p>

	<p><b>Proficiency Bonus:</b> <input type="text" name="proficiency_bonus" size="20" maxlength="40" value="<?php echo $proficiency_bonus; ?>" /></p>

	<p><b>Saving Throws:</b> <input type="text" name="saving_throws" size="20" maxlength="40" value="<?php echo $saving_throws; ?>" /></p>

	<p><b>Skills:</b></p><textarea rows="10" cols="100" name="skills" />
	<?php echo $skills; ?>
	</textarea>	

	<p><b>Passive Wisdom:</b> <input type="text" name="passive_wisdom" size="20" maxlength="40" value="<?php echo $passive_wisdom; ?>" /></p>

<!--	<p><b>Languages:</b> <input type="text" name="languages" size="20" maxlength="40" value="<?php if (isset($trimmed['languages'])) echo $trimmed['languages']; ?>" /></p>
-->
	<p><b>Languages:</b></p><textarea rows="10" cols="100" name="languages" />
	
	<?php echo $languages; ?>
	</textarea>
		
<!--	<p><b>Proficiencies:</b> <input type="text" name="proficiencies" size="20" maxlength="40" value="<?php if (isset($trimmed['proficiencies'])) echo $trimmed['proficiencies']; ?>" /></p>
-->

	<p><b>Proficiencies:</b></p><textarea rows="10" cols="100" name="proficiencies" />
	<?php echo $proficiencies; ?>
	</textarea>	
	
<!--	<p><b>Personality Traits:</b> <input type="text" name="personality_traits" size="20" maxlength="40" value="<?php if (isset($trimmed['personality_traits'])) echo $trimmed['personality_traits']; ?>" /></p>
-->
	<p><b>Personality Traits:</b></p><textarea rows="10" cols="100" name="personality_traits" />
	<?php echo $personality_traits; ?>	
	</textarea>	
<!--	<p><b>Ideals:</b> <input type="text" name="ideals" size="20" maxlength="40" value="<?php if (isset($trimmed['ideals'])) echo $trimmed['ideals']; ?>" /></p>
-->
		<p><b>Ideals:</b></p><textarea rows="10" cols="100" name="ideals"  />
		<?php echo $ideals; ?>
	</textarea>	
<!--	<p><b>Bonds:</b> <input type="text" name="bonds" size="20" maxlength="40" value="<?php if (isset($trimmed['bonds'])) echo $trimmed['bonds']; ?>" /></p>
-->
		<p><b>Bonds:</b></p><textarea rows="10" cols="100" name="bonds"  />
		<?php echo $bonds; ?>
	</textarea>	
<!--	<p><b>Flaws:</b> <input type="text" name="flaws" size="20" maxlength="40" value="<?php if (isset($trimmed['flaws'])) echo $trimmed['flaws']; ?>" /></p>
-->	
	<p><b>Flaws:</b></p><textarea rows="10" cols="100" name="flaws"  />
	<?php echo $flaws; ?>
	</textarea>
		
	<p><b>CP:</b> <input type="text" name="cp" size="20" maxlength="40" value="<?php echo $cp; ?>" /></p>
	
	<p><b>SP:</b> <input type="text" name="sp" size="20" maxlength="40" value="<?php echo $sp; ?>" /></p>
	
	<p><b>EP:</b> <input type="text" name="ep" size="20" maxlength="40" value="<?php echo $ep; ?>" /></p>
	
	<p><b>GP:</b> <input type="text" name="gp" size="20" maxlength="40" value="<?php echo $gp; ?>" /></p>
	
	<p><b>PP:</b> <input type="text" name="pp" size="20" maxlength="40" value="<?php echo $pp; ?>" /></p>
	
	
	<p><b>Public(Allow Character Profile and Chronicles To Be Public:</b>
		<input type="radio" name="public_character" value="Yes" required>Yes
		<input type="radio" name="public_character" value="No">No
	</p>
	
  </div>
  
  <div id="tabs-2">
  
  <!--	<p><b>Features:</b> <input type="text" name="features" size="20" maxlength="40" value="<?php if (isset($trimmed['features'])) echo $trimmed['features']; ?>" /></p>
-->	
	<p><b>Features:</b></p><textarea rows="10" cols="100" name="features" />
	<?php echo $features; ?>
	</textarea>
	
   <p><b>Appearance:</b><input type="file" name="appearance" id="appearance" ></p>
   <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($appearance).'" height="300" width="300"/><br>'; ?>
	
	<p><b>Organization:</b> <input type="text" name="organization" size="20" maxlength="40" value="<?php echo $organization; ?>" /></p>
	
	<p><b>Rank:</b> <input type="text" name="rank" size="20" maxlength="40" value="<?php echo $rank; ?>" /></p>
	
	<p><b>Age:</b> <input type="text" name="age" size="20" maxlength="40" value="<?php echo $age; ?>" /></p>
	
	<p><b>Height:</b> <input type="text" name="height" size="20" maxlength="40" value="<?php echo $height; ?>" /></p>
	
	<p><b>Weight:</b> <input type="text" name="weight" size="20" maxlength="40" value="<?php echo $weight; ?>" /></p>
	
	<p><b>Eyes:</b> <input type="text" name="eyes" size="20" maxlength="40" value="<?php echo $eyes; ?>" /></p>
	
	<p><b>Skin:</b> <input type="text" name="skin" size="20" maxlength="40" value="<?php echo $skin; ?>" /></p>
	
	<p><b>Hair:</b> <input type="text" name="hair" size="20" maxlength="40" value="<?php echo $hair; ?>" /></p>
	
<!--	<p><b>Backstory:</b> <input type="text" name="backstory" size="20" maxlength="40" value="<?php if (isset($trimmed['backstory'])) echo $trimmed['backstory']; ?>" /></p>
-->	
	<p><b>Backstory:</b></p><textarea rows="10" cols="100" name="backstory" />
	<?php echo $backstory; ?>
	</textarea>

  </div>
  
  <div id="tabs-3">

	<p><b>Spell Slots:</b> <input type="text" name="spell_slots" size="20" maxlength="40" value="<?php echo $spell_slots; ?>" /></p>
	
	<p><b>Spellcasting Ability:</b> <input type="text" name="spell_casting_ability" size="20" maxlength="40" value="<?php echo $spell_casting_ability; ?>" /></p>
	
	<p><b>Spell Save DC:</b> <input type="text" name="spell_save_dc" size="20" maxlength="40" value="<?php echo $spell_save_dc; ?>" /></p>
	
	<p><b>Spell Attack Bonus:</b> <input type="text" name="spell_attack_bonus" size="20" maxlength="40" value="<?php echo $spell_attack_bonus; ?>" /></p>
	
  </div>
  
</div>
	
	<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
	</fieldset>
	<input type="submit" name="submit" value="Edit Character" />
</form>
<br>

</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
