<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Welcome to this Site!';
include ('includes/header.html');
include (
'includes/top.html'
);

?>

<?php

if (isset($_SESSION['user_id'])){
	

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

// Assume invalid values:
	$c0 = FALSE;
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

	$c0 = $_SESSION['user_id'];	
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
	$s = "INSERT INTO characters (
	
	user_id, first_name, last_name, class, level, background, player_name, race, alignment, exp, armor_class, 
	initiative, speed, max_hp, current_hp, hit_dice, successes, failures, death_saves, strength, dexterity, 
	constitution, intelligence, wisdom, charisma, inspiration, proficiency_bonus, saving_throws, skills, passive_wisdom, languages, 
	proficiencies, personality_traits, ideals, bonds,flaws, cp, sp, ep, gp, pp, 
	features, appearance, organization, rank, age, height, weight, eyes, skin, hair,
	backstory, spell_slots, spell_casting_ability, spell_save_dc, spell_attack_bonus
	
	
	) 
	
	VALUES (
	'$c0','$c1', '$c2', '$c3', '$c4', '$c5','$c6', '$c7', '$c8', '$c9', '$c10',
	'$c11', '$c12', '$c13', '$c14', '$c15','$c16', '$c17', '$c18', '$c19', '$c20',
	'$c21', '$c22', '$c23', '$c24', '$c25','$c26', '$c27', '$c28', '$c29', '$c30',
	'$c31', '$c32', '$c33', '$c34', '$c35','$c36', '$c37', '$c38', '$c39', '$c40',
	'$c41', '$c42','$c43', '$c44', '$c45','$c46', '$c47', '$c48', '$c49', '$c50',
	'$c51', '$c52', '$c53', '$c54', '$c55'
	)";
	 
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
			
				
			} else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
	}
	
mysqli_close($dbc);

} // End of the main Submit conditional.

else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}

?>

<h1>Forge A Character</h1>
<form action="create_character.php" method="post" enctype="multipart/form-data">

	<fieldset>
	
	<p><b>Character First Name:</b> <input type="text" name="first_name" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p>
	
	<p><b>Character Last Name:</b> <input type="text" name="last_name" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>

	<p><b>Class:</b> <input type="text" name="class" size="20" maxlength="20" value="<?php if (isset($trimmed['class'])) echo $trimmed['class']; ?>" /></p>
	
	<p><b>Level:</b> <input type="text" name="level" size="20" maxlength="40" value="<?php if (isset($trimmed['level'])) echo $trimmed['level']; ?>" /></p>
	
	<p><b>Background:</b> <input type="text" name="background" size="20" maxlength="20" value="<?php if (isset($trimmed['background'])) echo $trimmed['background']; ?>" /></p>
	
	<p><b>Player Name</b> <input type="text" name="player_name" size="20" maxlength="40" value="<?php if (isset($trimmed['player_name'])) echo $trimmed['player_name']; ?>" /></p>
	
	<p><b>Race</b> <input type="text" name="race" size="20" maxlength="20" value="<?php if (isset($trimmed['race'])) echo $trimmed['race']; ?>" /></p>
	
	<p><b>Alignment</b> <input type="text" name="alignment" size="20" maxlength="40" value="<?php if (isset($trimmed['alignment'])) echo $trimmed['alignment']; ?>" /></p>

	<p><b>Experience Points:</b> <input type="text" name="exp" size="20" maxlength="40" value="<?php if (isset($trimmed['exp'])) echo $trimmed['exp']; ?>" /></p>
		
	<p><b>Armor Class:</b> <input type="text" name="armor_class" size="20" maxlength="40" value="<?php if (isset($trimmed['armor_class'])) echo $trimmed['armor_class']; ?>" /></p>
	
	<p><b>Initiative:</b> <input type="text" name="initiative" size="20" maxlength="40" value="<?php if (isset($trimmed['initiative'])) echo $trimmed['initiative']; ?>" /></p>		

	<p><b>Speed:</b> <input type="text" name="speed" size="20" maxlength="40" value="<?php if (isset($trimmed['speed'])) echo $trimmed['speed']; ?>" /></p>
	
	<p><b>Max HP:</b> <input type="text" name="max_hp" size="20" maxlength="40" value="<?php if (isset($trimmed['max_hp'])) echo $trimmed['max_hp']; ?>" /></p>
	
	<p><b>Current HP:</b> <input type="text" name="current_hp" size="20" maxlength="40" value="<?php if (isset($trimmed['current_hp'])) echo $trimmed['current_hp']; ?>" /></p>
	
	<p><b>Hit_Dice:</b> <input type="text" name="hit_dice" size="20" maxlength="40" value="<?php if (isset($trimmed['hit_dice'])) echo $trimmed['hit_dice']; ?>" /></p>

	<p><b>Successes:</b> <input type="text" name="successes" size="20" maxlength="40" value="<?php if (isset($trimmed['successes'])) echo $trimmed['successes']; ?>" /></p>

	<p><b>Failures:</b> <input type="text" name="failures" size="20" maxlength="40" value="<?php if (isset($trimmed['failures'])) echo $trimmed['failures']; ?>" /></p>

	<p><b>Death Saves:</b> <input type="text" name="death_saves" size="20" maxlength="40" value="<?php if (isset($trimmed['death_saves'])) echo $trimmed['death_saves']; ?>" /></p>

	<p><b>Strength:</b> <input type="text" name="strength" size="20" maxlength="40" value="<?php if (isset($trimmed['strength'])) echo $trimmed['strength']; ?>" /></p>

	<p><b>Dexterity:</b> <input type="text" name="dexterity" size="20" maxlength="40" value="<?php if (isset($trimmed['dexterity'])) echo $trimmed['dexterity']; ?>" /></p>

	<p><b>Constitution:</b> <input type="text" name="constitution" size="20" maxlength="40" value="<?php if (isset($trimmed['constitution'])) echo $trimmed['constitution']; ?>" /></p>

	<p><b>Intelligence:</b> <input type="text" name="intelligence" size="20" maxlength="40" value="<?php if (isset($trimmed['intelligence'])) echo $trimmed['intelligence']; ?>" /></p>

	<p><b>Wisdom:</b> <input type="text" name="wisdom" size="20" maxlength="40" value="<?php if (isset($trimmed['wisdom'])) echo $trimmed['wisdom']; ?>" /></p>

	<p><b>Charisma:</b> <input type="text" name="charisma" size="20" maxlength="40" value="<?php if (isset($trimmed['charisma'])) echo $trimmed['charisma']; ?>" /></p>

	<p><b>Inspiration:</b> <input type="text" name="inspiration" size="20" maxlength="40" value="<?php if (isset($trimmed['inspiration'])) echo $trimmed['inspiration']; ?>" /></p>

	<p><b>Proficiency Bonus:</b> <input type="text" name="proficiency_bonus" size="20" maxlength="40" value="<?php if (isset($trimmed['proficiency_bonus'])) echo $trimmed['proficiency_bonus']; ?>" /></p>

	<p><b>Saving Throws:</b> <input type="text" name="saving_throws" size="20" maxlength="40" value="<?php if (isset($trimmed['saving_throws'])) echo $trimmed['saving_throws']; ?>" /></p>

	<p><b>Skills</b> <input type="text" name="skills" size="20" maxlength="40" value="<?php if (isset($trimmed['skills'])) echo $trimmed['skills']; ?>" /></p>

	<p><b>Passive Wisdom:</b> <input type="text" name="passive_wisdom" size="20" maxlength="40" value="<?php if (isset($trimmed['passive_wisdom'])) echo $trimmed['passive_wisdom']; ?>" /></p>

	<p><b>Languages:</b> <input type="text" name="languages" size="20" maxlength="40" value="<?php if (isset($trimmed['languages'])) echo $trimmed['languages']; ?>" /></p>

	<p><b>Proficiencies:</b> <input type="text" name="proficiencies" size="20" maxlength="40" value="<?php if (isset($trimmed['proficiencies'])) echo $trimmed['proficiencies']; ?>" /></p>

	<p><b>Personality Traits:</b> <input type="text" name="personality_traits" size="20" maxlength="40" value="<?php if (isset($trimmed['personality_traits'])) echo $trimmed['personality_traits']; ?>" /></p>

	<p><b>Ideals:</b> <input type="text" name="ideals" size="20" maxlength="40" value="<?php if (isset($trimmed['ideals'])) echo $trimmed['ideals']; ?>" /></p>
	
	<p><b>Bonds:</b> <input type="text" name="bonds" size="20" maxlength="40" value="<?php if (isset($trimmed['bonds'])) echo $trimmed['bonds']; ?>" /></p>
	
	<p><b>Flaws:</b> <input type="text" name="flaws" size="20" maxlength="40" value="<?php if (isset($trimmed['flaws'])) echo $trimmed['flaws']; ?>" /></p>
	
	<p><b>CP:</b> <input type="text" name="cp" size="20" maxlength="40" value="<?php if (isset($trimmed['cp'])) echo $trimmed['cp']; ?>" /></p>
	
	<p><b>SP:</b> <input type="text" name="sp" size="20" maxlength="40" value="<?php if (isset($trimmed['sp'])) echo $trimmed['sp']; ?>" /></p>
	
	<p><b>EP:</b> <input type="text" name="ep" size="20" maxlength="40" value="<?php if (isset($trimmed['ep'])) echo $trimmed['ep']; ?>" /></p>
	
	<p><b>GP:</b> <input type="text" name="gp" size="20" maxlength="40" value="<?php if (isset($trimmed['gp'])) echo $trimmed['gp']; ?>" /></p>
	
	<p><b>PP:</b> <input type="text" name="pp" size="20" maxlength="40" value="<?php if (isset($trimmed['pp'])) echo $trimmed['pp']; ?>" /></p>
	
	<p><b>Features:</b> <input type="text" name="features" size="20" maxlength="40" value="<?php if (isset($trimmed['features'])) echo $trimmed['features']; ?>" /></p>
	
   <p><b>Appearance:</b><input type="file" name="appearance" id="appearance"></p>
	
	<p><b>Organization:</b> <input type="text" name="organization" size="20" maxlength="40" value="<?php if (isset($trimmed['organization'])) echo $trimmed['organization']; ?>" /></p>
	
	<p><b>Rank:</b> <input type="text" name="rank" size="20" maxlength="40" value="<?php if (isset($trimmed['rank'])) echo $trimmed['rank']; ?>" /></p>
	
	<p><b>Age:</b> <input type="text" name="age" size="20" maxlength="40" value="<?php if (isset($trimmed['age'])) echo $trimmed['age']; ?>" /></p>
	
	<p><b>Height:</b> <input type="text" name="height" size="20" maxlength="40" value="<?php if (isset($trimmed['height'])) echo $trimmed['height']; ?>" /></p>
	
	<p><b>Weight:</b> <input type="text" name="weight" size="20" maxlength="40" value="<?php if (isset($trimmed['weight'])) echo $trimmed['weight']; ?>" /></p>
	
	<p><b>Eyes:</b> <input type="text" name="eyes" size="20" maxlength="40" value="<?php if (isset($trimmed['eyes'])) echo $trimmed['eyes']; ?>" /></p>
	
	<p><b>Skin:</b> <input type="text" name="skin" size="20" maxlength="40" value="<?php if (isset($trimmed['skin'])) echo $trimmed['skin']; ?>" /></p>
	
	<p><b>Hair:</b> <input type="text" name="hair" size="20" maxlength="40" value="<?php if (isset($trimmed['hair'])) echo $trimmed['hair']; ?>" /></p>
	
	<p><b>Backstory:</b> <input type="text" name="backstory" size="20" maxlength="40" value="<?php if (isset($trimmed['backstory'])) echo $trimmed['backstory']; ?>" /></p>
	
	<p><b>Spell Slots:</b> <input type="text" name="spell_slots" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_slots'])) echo $trimmed['spell_slots']; ?>" /></p>
	
	<p><b>Spellcasting Ability:</b> <input type="text" name="spell_casting_ability" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_casting_ability'])) echo $trimmed['spell_casting_ability']; ?>" /></p>
	
	<p><b>Spell Save DC:</b> <input type="text" name="spell_save_dc" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_save_dc'])) echo $trimmed['spell_save_dc']; ?>" /></p>
	
	<p><b>Spell Attack Bonus:</b> <input type="text" name="spell_attack_bonus" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_attack_bonus'])) echo $trimmed['spell_attack_bonus']; ?>" /></p>
	
	</fieldset>
	<input type="submit" name="submit" value="Forge Character" />
</form>
<br>

<?php include ('includes/footer.html'); ?>
