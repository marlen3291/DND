<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Dungeons and Dragons Fan Site';
include ('includes/header.html');
include (
'includes/top.html'
);

?>

<div id="content">

<?php

if (isset($_SESSION['user_id'])){
	

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

// Assume invalid values:
	$user_id = FALSE;
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

	$user_id = $_SESSION['user_id'];	
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
	'$user_id','$first_name', '$last_name', '$class', '$level', '$background','$player_name', '$race', '$alignment', '$exp', '$armor_class',
	'$initiative', '$speed', '$max_hp', '$current_hp', '$hit_dice','$successes', '$failures', '$death_saves', '$strength', '$dexterity',
	'$constitution', '$intelligence', '$wisdom', '$charisma', '$inspiration','$proficiency_bonus', '$saving_throws', '$skills', '$passive_wisdom', '$languages',
	'$proficiencies', '$personality_traits', '$ideals', '$bonds', '$flaws','$cp', '$sp', '$ep', '$gp', '$pp',
	'$features', '$appearance','$organization', '$rank', '$age','$height', '$weight', '$eyes', '$skin', '$hair',
	'$backstory', '$spell_slots', '$spell_casting_ability', '$spell_save_dc', '$spell_attack_bonus'
	)";
	 
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
				$url = BASE_URL . 'view_character.php';
	
				ob_end_clean();
				header("Location: $url");
				exit();
			
				
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
	<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Character Main Stats</a></li>
    <li><a href="#tabs-2">Features and Backstory</a></li>
    <li><a href="#tabs-3">Spellcasting</a></li>
  </ul>
  <div id="tabs-1">


		<p><b>Character First Name:</b> <input type="text" name="first_name" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p>
	
	<p><b>Character Last Name:</b> <input type="text" name="last_name" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>

	<p><b>Class:</b> <input type="text" name="class" size="20" maxlength="20" value="<?php if (isset($trimmed['class'])) echo $trimmed['class']; ?>" /></p>
	
	<p><b>Level:</b> <input type="text" name="level" size="20" maxlength="40" value="<?php if (isset($trimmed['level'])) echo $trimmed['level']; ?>" /></p>
	
	<p><b>Background:</b> <input type="text" name="background" size="20" maxlength="20" value="<?php if (isset($trimmed['background'])) echo $trimmed['background']; ?>" /></p>


<!--	<p><b>Background:</b></p><textarea rows="10" cols="100" name="background" value="<?php if (isset($trimmed['background'])) echo $trimmed['background']; ?>" />
	</textarea>	
-->
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

<!--	<p><b>Skills</b> <input type="text" name="skills" size="20" maxlength="40" value="<?php if (isset($trimmed['skills'])) echo $trimmed['skills']; ?>" /></p>
-->

	<p><b>Skills:</b></p><textarea rows="10" cols="100" name="skills" value="<?php if (isset($trimmed['background'])) echo $trimmed['background']; ?>" />
	</textarea>	
	
	<p><b>Passive Wisdom:</b> <input type="text" name="passive_wisdom" size="20" maxlength="40" value="<?php if (isset($trimmed['passive_wisdom'])) echo $trimmed['passive_wisdom']; ?>" /></p>

<!--	<p><b>Languages:</b> <input type="text" name="languages" size="20" maxlength="40" value="<?php if (isset($trimmed['languages'])) echo $trimmed['languages']; ?>" /></p>
-->
	<p><b>Languages:</b></p><textarea rows="10" cols="100" name="languages" value="<?php if (isset($trimmed['languages'])) echo $trimmed['languages']; ?>" />
	</textarea>
		
<!--	<p><b>Proficiencies:</b> <input type="text" name="proficiencies" size="20" maxlength="40" value="<?php if (isset($trimmed['proficiencies'])) echo $trimmed['proficiencies']; ?>" /></p>
-->

	<p><b>Proficiencies:</b></p><textarea rows="10" cols="100" name="proficiencies" value="<?php if (isset($trimmed['proficiencies'])) echo $trimmed['proficiencies']; ?>" />
	</textarea>	
	
<!--	<p><b>Personality Traits:</b> <input type="text" name="personality_traits" size="20" maxlength="40" value="<?php if (isset($trimmed['personality_traits'])) echo $trimmed['personality_traits']; ?>" /></p>
-->
	<p><b>Personality Traits:</b></p><textarea rows="10" cols="100" name="personality_traits" value="<?php if (isset($trimmed['personality_traits'])) echo $trimmed['personality_traits']; ?>" />
	</textarea>	
<!--	<p><b>Ideals:</b> <input type="text" name="ideals" size="20" maxlength="40" value="<?php if (isset($trimmed['ideals'])) echo $trimmed['ideals']; ?>" /></p>
-->
		<p><b>Ideals:</b></p><textarea rows="10" cols="100" name="ideals" value="<?php if (isset($trimmed['ideals'])) echo $trimmed['ideals']; ?>" />
	</textarea>	
<!--	<p><b>Bonds:</b> <input type="text" name="bonds" size="20" maxlength="40" value="<?php if (isset($trimmed['bonds'])) echo $trimmed['bonds']; ?>" /></p>
-->
		<p><b>Bonds:</b></p><textarea rows="10" cols="100" name="bonds" value="<?php if (isset($trimmed['bonds'])) echo $trimmed['bonds']; ?>" />
	</textarea>	
<!--	<p><b>Flaws:</b> <input type="text" name="flaws" size="20" maxlength="40" value="<?php if (isset($trimmed['flaws'])) echo $trimmed['flaws']; ?>" /></p>
-->	
	<p><b>Flaws:</b></p><textarea rows="10" cols="100" name="flaws" value="<?php if (isset($trimmed['flaws'])) echo $trimmed['flaws']; ?>" />
	</textarea>
		
	<p><b>CP:</b> <input type="text" name="cp" size="20" maxlength="40" value="<?php if (isset($trimmed['cp'])) echo $trimmed['cp']; ?>" /></p>
	
	<p><b>SP:</b> <input type="text" name="sp" size="20" maxlength="40" value="<?php if (isset($trimmed['sp'])) echo $trimmed['sp']; ?>" /></p>
	
	<p><b>EP:</b> <input type="text" name="ep" size="20" maxlength="40" value="<?php if (isset($trimmed['ep'])) echo $trimmed['ep']; ?>" /></p>
	
	<p><b>GP:</b> <input type="text" name="gp" size="20" maxlength="40" value="<?php if (isset($trimmed['gp'])) echo $trimmed['gp']; ?>" /></p>
	
	<p><b>PP:</b> <input type="text" name="pp" size="20" maxlength="40" value="<?php if (isset($trimmed['pp'])) echo $trimmed['pp']; ?>" /></p>
	
  </div>
  <div id="tabs-2">
	
	<!--	<p><b>Features:</b> <input type="text" name="features" size="20" maxlength="40" value="<?php if (isset($trimmed['features'])) echo $trimmed['features']; ?>" /></p>
-->	
	<p><b>Features:</b></p><textarea rows="10" cols="100" name="features" value="<?php if (isset($trimmed['features'])) echo $trimmed['features']; ?>" />
	</textarea>
	
   <p><b>Appearance:</b><input type="file" name="appearance" id="appearance"></p>
	
	<p><b>Organization:</b> <input type="text" name="organization" size="20" maxlength="40" value="<?php if (isset($trimmed['organization'])) echo $trimmed['organization']; ?>" /></p>
	
	<p><b>Rank:</b> <input type="text" name="rank" size="20" maxlength="40" value="<?php if (isset($trimmed['rank'])) echo $trimmed['rank']; ?>" /></p>
	
	<p><b>Age:</b> <input type="text" name="age" size="20" maxlength="40" value="<?php if (isset($trimmed['age'])) echo $trimmed['age']; ?>" /></p>
	
	<p><b>Height:</b> <input type="text" name="height" size="20" maxlength="40" value="<?php if (isset($trimmed['height'])) echo $trimmed['height']; ?>" /></p>
	
	<p><b>Weight:</b> <input type="text" name="weight" size="20" maxlength="40" value="<?php if (isset($trimmed['weight'])) echo $trimmed['weight']; ?>" /></p>
	
	<p><b>Eyes:</b> <input type="text" name="eyes" size="20" maxlength="40" value="<?php if (isset($trimmed['eyes'])) echo $trimmed['eyes']; ?>" /></p>
	
	<p><b>Skin:</b> <input type="text" name="skin" size="20" maxlength="40" value="<?php if (isset($trimmed['skin'])) echo $trimmed['skin']; ?>" /></p>
	
	<p><b>Hair:</b> <input type="text" name="hair" size="20" maxlength="40" value="<?php if (isset($trimmed['hair'])) echo $trimmed['hair']; ?>" /></p>
	
<!--	<p><b>Backstory:</b> <input type="text" name="backstory" size="20" maxlength="40" value="<?php if (isset($trimmed['backstory'])) echo $trimmed['backstory']; ?>" /></p>
-->	
	<p><b>Backstory:</b></p><textarea rows="10" cols="100" name="backstory" value="<?php if (isset($trimmed['backstory'])) echo $trimmed['backstory']; ?>" />
	</textarea>
	
  </div>
  
  <div id="tabs-3">

	<p><b>Spell Slots:</b> <input type="text" name="spell_slots" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_slots'])) echo $trimmed['spell_slots']; ?>" /></p>
	
	<p><b>Spellcasting Ability:</b> <input type="text" name="spell_casting_ability" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_casting_ability'])) echo $trimmed['spell_casting_ability']; ?>" /></p>
	
	<p><b>Spell Save DC:</b> <input type="text" name="spell_save_dc" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_save_dc'])) echo $trimmed['spell_save_dc']; ?>" /></p>
	
	<p><b>Spell Attack Bonus:</b> <input type="text" name="spell_attack_bonus" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_attack_bonus'])) echo $trimmed['spell_attack_bonus']; ?>" /></p>
	

  </div>
</div>
	
	</fieldset>
	<input type="submit" name="submit" value="Forge Character" />
</form>
<br>

</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
