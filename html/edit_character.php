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
	
	$c1 = $c2 = $c3 = $c4 = $c5 = FALSE;
	$c6 = $c7 = $c8 = $c9 = $c10 = FALSE;
	$c11 = $c12 = $c13 = $c14 = $c15 = FALSE;
	$c16 = $c17 = $c18 = $c19 = $c20 = FALSE;
	$c21 = $c22 = $c23 = $c24 = $c25 = FALSE;
	$c26 = $c27 = $c28 = $c29 = $c30 = FALSE;
	$c31 = $c32 = $c33 = $c34 = $c35 = FALSE;
	$c36 = $c37 = $c38 = $c39 = $c40 = FALSE;
	$c41 = $c42 = $c43 = $c44 = $c45 = FALSE;
	$c46 = $c47 = $c48 = $c49 = $c50 = FALSE;
	$c51 = $c52 = $c53 = $c54 = $c55 = FALSE;
	
//Setting up image uploads:


$appearance = addslashes(file_get_contents($_FILES['appearance']['tmp_name']));
//you keep your column name setting for insertion. I keep image type Blob.



	
//Setting up variables

		
	$c1 = mysqli_real_escape_string ($dbc, $trimmed['first_name']);
	$c2 = mysqli_real_escape_string ($dbc, $trimmed['last_name']);
	$c3 = mysqli_real_escape_string ($dbc, $trimmed['class']);
	$c4 = mysqli_real_escape_string ($dbc, $trimmed['level']);
	$c5 = mysqli_real_escape_string ($dbc, $trimmed['background']);
	$c6 = mysqli_real_escape_string ($dbc, $trimmed['player_name']);
	$c7 = mysqli_real_escape_string ($dbc, $trimmed['race']);
	$c8 = mysqli_real_escape_string ($dbc, $trimmed['alignment']);
	$c9 = mysqli_real_escape_string ($dbc, $trimmed['exp']);
	$c10 = mysqli_real_escape_string ($dbc, $trimmed['armor_class']);
	
	$c11 = mysqli_real_escape_string ($dbc, $trimmed['initiative']);
	$c12 = mysqli_real_escape_string ($dbc, $trimmed['speed']);
	$c13 = mysqli_real_escape_string ($dbc, $trimmed['max_hp']);
	$c14 = mysqli_real_escape_string ($dbc, $trimmed['current_hp']);
	$c15 = mysqli_real_escape_string ($dbc, $trimmed['hit_dice']);
	$c16 = mysqli_real_escape_string ($dbc, $trimmed['successes']);
	$c17 = mysqli_real_escape_string ($dbc, $trimmed['failures']);
	$c18 = mysqli_real_escape_string ($dbc, $trimmed['death_saves']);
	$c19 = mysqli_real_escape_string ($dbc, $trimmed['strength']);
	$c20 = mysqli_real_escape_string ($dbc, $trimmed['dexterity']);
	
	$c21 = mysqli_real_escape_string ($dbc, $trimmed['constitution']);
	$c22 = mysqli_real_escape_string ($dbc, $trimmed['intelligence']);
	$c23 = mysqli_real_escape_string ($dbc, $trimmed['wisdom']);
	$c24 = mysqli_real_escape_string ($dbc, $trimmed['charisma']);
	$c25 = mysqli_real_escape_string ($dbc, $trimmed['inspiration']);
	$c26 = mysqli_real_escape_string ($dbc, $trimmed['proficiency_bonus']);
	$c27 = mysqli_real_escape_string ($dbc, $trimmed['saving_throws']);
	$c28 = mysqli_real_escape_string ($dbc, $trimmed['skills']);
	$c29 = mysqli_real_escape_string ($dbc, $trimmed['passive_wisdom']);
	$c30 = mysqli_real_escape_string ($dbc, $trimmed['languages']);
	
	$c31 = mysqli_real_escape_string ($dbc, $trimmed['proficiencies']);
	$c32 = mysqli_real_escape_string ($dbc, $trimmed['personality_traits']);
	$c33 = mysqli_real_escape_string ($dbc, $trimmed['ideals']);
	$c34 = mysqli_real_escape_string ($dbc, $trimmed['bonds']);
	$c35 = mysqli_real_escape_string ($dbc, $trimmed['flaws']);
	$c36 = mysqli_real_escape_string ($dbc, $trimmed['cp']);
	$c37 = mysqli_real_escape_string ($dbc, $trimmed['sp']);
	$c38 = mysqli_real_escape_string ($dbc, $trimmed['ep']);
	$c39 = mysqli_real_escape_string ($dbc, $trimmed['gp']);
	$c40 = mysqli_real_escape_string ($dbc, $trimmed['pp']);
	
	$c41 = mysqli_real_escape_string ($dbc, $trimmed['features']);
	$c42 = $appearance;
	
	
	$c43 = mysqli_real_escape_string ($dbc, $trimmed['organization']);
	$c44 = mysqli_real_escape_string ($dbc, $trimmed['rank']);
	$c45 = mysqli_real_escape_string ($dbc, $trimmed['age']);
	$c46 = mysqli_real_escape_string ($dbc, $trimmed['height']);
	$c47 = mysqli_real_escape_string ($dbc, $trimmed['weight']);
	$c48 = mysqli_real_escape_string ($dbc, $trimmed['eyes']);
	$c49 = mysqli_real_escape_string ($dbc, $trimmed['skin']);
	$c50 = mysqli_real_escape_string ($dbc, $trimmed['hair']);
	
	
	$c51 = mysqli_real_escape_string ($dbc, $trimmed['backstory']);
	$c52 = mysqli_real_escape_string ($dbc, $trimmed['spell_slots']);
	$c53 = mysqli_real_escape_string ($dbc, $trimmed['spell_casting_ability']);
	$c54 = mysqli_real_escape_string ($dbc, $trimmed['spell_save_dc']);
	$c55 = mysqli_real_escape_string ($dbc, $trimmed['spell_attack_bonus']);
	
	 
	 // Add a new character to the database
	$s = "UPDATE characters SET
	
	first_name ='$c1', 
	last_name ='$c2', 
	class ='$c3', 
	level='$c4', 
	background='$c5', 
	player_name='$c6', 
	race='$c7', 
	alignment='$c8', 
	exp='$c9', 
	armor_class='$c10', 
	initiative='$c11', 
	speed='$c12', 
	max_hp='$c13', 
	current_hp='$c14', 
	hit_dice='$c15', 
	successes='$c16', 
	failures='$c17', 
	death_saves='$c18', 
	strength='$c19', 
	dexterity='$c20', 
	constitution='$c21', 
	intelligence='$c22', 
	wisdom='$c23', 
	charisma='$c24', 
	inspiration='$c25', 
	proficiency_bonus='$c26', 
	saving_throws='$c27', 
	skills='$c28', 
	passive_wisdom='$c29', 
	languages='$c30', 
	proficiencies='$c31', 
	personality_traits='$c32', 
	ideals='$c33', 
	bonds='$c34',
	flaws='$c35', 
	cp='$c36', 
	sp='$c37', 
	ep='$c38',
	gp='$c39', 
	pp='$c40', 
	features='$c41', 
	appearance='$c42', 
	organization='$c43', 
	rank='$c44', 
	age='$c45', 
	height='$c46', 
	weight='$c47', 
	eyes='$c48', 
	skin='$c49', 
	hair='$c50',
	backstory='$c51', 
	spell_slots='$c52', 
	spell_casting_ability='$c53', 
	spell_save_dc='$c54', 
	spell_attack_bonus='$c55'
	
	WHERE character_id = $character_id";
	 
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
			
				
			} else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
	mysqli_close($dbc);
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
	
	<p><b>Character First Name:</b> <input type="text" name="first_name" size="20" maxlength="20" value="<?php echo $first_name; ?>" /></p>
	
	<p><b>Character Last Name:</b> <input type="text" name="last_name" size="20" maxlength="40" value="<?php echo $last_name; ?>" /></p>

	<p><b>Class:</b> <input type="text" name="class" size="20" maxlength="20" value="<?php echo $class; ?>" /></p>
	
	<p><b>Level:</b> <input type="text" name="level" size="20" maxlength="40" value="<?php echo $level; ?>" /></p>
	
<!--	<p><b>Background:</b> <input type="text" name="background" size="20" maxlength="20" value="<?php if (isset($trimmed['background'])) echo $trimmed['background']; ?>" /></p>
-->

	<p><b>Background:</b></p><textarea rows="10" cols="100" name="background" />
	<?php echo $background; ?>
	</textarea>	

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
	
	<p><b>Spell Slots:</b> <input type="text" name="spell_slots" size="20" maxlength="40" value="<?php echo $spell_slots; ?>" /></p>
	
	<p><b>Spellcasting Ability:</b> <input type="text" name="spell_casting_ability" size="20" maxlength="40" value="<?php echo $spell_casting_ability; ?>" /></p>
	
	<p><b>Spell Save DC:</b> <input type="text" name="spell_save_dc" size="20" maxlength="40" value="<?php echo $spell_save_dc; ?>" /></p>
	
	<p><b>Spell Attack Bonus:</b> <input type="text" name="spell_attack_bonus" size="20" maxlength="40" value="<?php echo $spell_attack_bonus; ?>" /></p>
	<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
	</fieldset>
	<input type="submit" name="submit" value="Edit Character" />
</form>
<br>

</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
