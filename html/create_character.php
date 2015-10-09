<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Welcome to this Site!';
include ('includes/header.html');
include ('includes/top.html');

?>

<h1>Forge A Character</h1>
<form action="register.php" method="post">
	<fieldset>
	
	<p><b>Character First Name:</b> <input type="text" name="first_name" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p>
	
	<p><b>Character Last Name:</b> <input type="text" name="last_name" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>

	<p><b>Class:</b> <input type="text" name="class" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p>
	
	<p><b>Level:</b> <input type="text" name="level" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	
	<p><b>Background:</b> <input type="text" name="background" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p>
	
	<p><b>Player Name</b> <input type="text" name="player_name" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	
	<p><b>Race</b> <input type="text" name="race" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p>
	
	<p><b>Alignment</b> <input type="text" name="alignment" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>

	<p><b>Experience Points:</b> <input type="text" name="exp" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
		
	<p><b>Armor Class:</b> <input type="text" name="armor_class" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	
	<p><b>Initiative:</b> <input type="text" name="initiative" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>		

	<p><b>Speed:</b> <input type="text" name="speed" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	
	<p><b>Max HP:</b> <input type="text" name="max_hp" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Current HP:</b> <input type="text" name="current_hp" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Hit_Dice:</b> <input type="text" name="hit_dice" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="successes" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="failures" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="death_saves" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="strength" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="dexterity" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="constitution" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="dexterity" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="constitution" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="intelligence" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="wisdom" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="charisma" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="inspiration" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="proficiency_bonus" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="saving_throws" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="skills" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="passive_wisdom" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="languages" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="proficiencies" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="personality_traits" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	<p><b>Speed:</b> <input type="text" name="ideals" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
	
</form>
<br>

<?php include ('includes/footer.html'); ?>
