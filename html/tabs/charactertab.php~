<?php
//Page 1 Start


  	echo '
  	<div id="tabs-1">
    ';	
  	
  	//Page 1
	
	//Intro
	
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
	
	
		
	}
//Background Photo
	echo '<div id="backgroundphoto">';
		echo "<h2><b><u>Name</u></b>:$first_name $last_name</h2>";
		echo '<img src="data:image/jpeg;base64,'.base64_encode($appearance).'" height="300" width="300"/>';
	echo '</div>';
	
	//Some Background Info
	echo '<div id="playerinfo">';
		echo "<p><b><u>Class</u></b>: $class</p>";
		echo "<p><b><u>Level</u></b>: $level</p>";
		echo "<p><b><u>Background</u></b>: $background</p>";
		echo "<p><b><u>Player Name</u></b>: $player_name</p>";
		echo "<p><b><u>Race</u></b>: $race</p>";
		echo "<p><b><u>Alignment</u></b>: $alignment</p>";
		echo "<p><b><u>Experience</u></b>: $exp</p>";
	echo '</div>';
	
	echo '<br>';
	
	//Stats 1
	echo '<div id="stats1">';
		echo "<p><b><u>Strength</u></b>: $strength <p id='strbonus'></p></p>";		
		echo "<p><b><u>Dexterity</u></b>: $dexterity<p id='dexbonus'></p></p>";
		echo "<p><b><u>Constitution</u></b>: $constitution<p id='conbonus'></p></p>";
		echo "<p><b><u>Intelligence</u></b>: $intelligence<p id='intbonus'></p></p>";
		echo "<p><b><u>Wisdom</u></b>: $wisdom<p id='wisbonus'></p></p>";
		echo "<p><b><u>Charisma</u></b>: $charisma<p id='chabonus'></p></p>";
		
		
		echo'<script type="text/javascript"> 
  			$(document).ready(function() 
    			{ 
       			document.getElementById("strbonus").innerHTML = modifierbonus('.$strength.'); 
       			document.getElementById("dexbonus").innerHTML = modifierbonus('.$dexterity.');
       			document.getElementById("conbonus").innerHTML = modifierbonus('.$constitution.');
       			document.getElementById("intbonus").innerHTML = modifierbonus('.$intelligence.');
       			document.getElementById("wisbonus").innerHTML = modifierbonus('.$wisdom.');
       			document.getElementById("chabonus").innerHTML = modifierbonus('.$charisma.');
    			} 
			);
			</script>';	
	
	echo '</div>';
	
	
	//Stats 2

	echo '<div id="stats2">';
		echo "<p><b><u>Inspiration</u></b>: $inspiration</p>";
		echo "<p><b><u>Proficiency Bonus</u></b>: $proficiency_bonus</p>";
		echo "<p><b><u>Saving Throws</u></b>: $saving_throws</p>";
		echo "<p><b><u>Passive Wisdom</u></b>: $passive_wisdom</p>";
		echo "<p><b><u>Languages</u></b>: $languages</p>";
		echo "<p><b><u>Proficiencies</u></b>: $proficiencies</p>";
	echo '</div>';
	
	//Stats 3
	echo '<div id="stats3">';
		echo "<p><b><u>Armor Class</u></b>: $armor_class</p>";
		echo "<p><b><u>Initiative</u></b>: $initiative</p>";
		echo "<p><b><u>Speed</u></b>: $speed</p>";
		echo "<p><b><u>Max HP</u></b>: $max_hp</p>";
		echo "<p><b><u>Current HP</u></b>: $current_hp</p>";
		echo "<p><b><u>Hit Dice</u></b>: $hit_dice</p>";
		echo "<p><b><u>Successes</u></b>: $successes</p>";
		echo "<p><b><u>Failures</u></b>: $failures</p>";
	echo '</div><br>';
	
	//Stats 4	
	echo '<div id="stats4">';
		echo "<p><b><u>Personality Traits</u></b>: $personality_traits</p>";
		echo "<p><b><u>Ideals</u></b>: $ideals</p>";
		echo "<p><b><u>Bonds</u></b>: $bonds</p>";
		echo "<p><b><u>Flaws</u></b>: $flaws</p>";
	echo '</div>';
	
	echo '<br>';
	
	//Page 1 End
  	echo'
  	</div>
  	';
  	?>