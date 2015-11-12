<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Character View';
include ('includes/header.html');
include ('includes/top.html');
?>



<?php

	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_GET);
	
	
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
	
	
		
	}
	
	echo '
	
<div id="tabs">
  	<ul>
    	<li><a href="#tabs-1">Character Main Stats </a></li>
    	<li><a href="#tabs-2">Inventory </a></li>
    	<li><a href="#tabs-3">Background and Features</a></li>
    	<li><a href="#tabs-4">Spellcasting</a></li>
    	<li><a href="#tabs-5">Chronicles</a></li>
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
		echo "<p><u>Name</u>: $first_name $last_name</p>";
		echo "<p><u>Class</u>: $class</p>";
		echo "<p><u>Level</u>: $level</p>";
		echo "<p><u>Background</u>: $background</p><br>";
		echo "<p><u>Player Name</u>: $player_name</p>";
		echo "<p><u>Race</u>: $race</p>";
		echo "<p><u>Alignment</u>: $alignment</p>";
		echo "<p><u>Experience</u>: $exp</p>";
	echo '</div>';
	
	//Stats 1
	echo '<div id="stats1">';
		echo "<p><u>Strength</u>: $strength</p>";
		echo "<p><u>Dexterity</u>: $dexterity</p>";
		echo "<p><u>Constitution</u>: $constitution</p>";
		echo "<p><u>Intelligence</u>: $intelligence</p>";
		echo "<p><u>Wisdom</u>: $wisdom</p>";
		echo "<p><u>Charisma</u>: $charisma</p>";
	echo '</div>';
	
	
	//Stats 2

	echo '<div id="stats2">';
		echo "<p><u>Inspiration</u>: $inspiration</p>";
		echo "<p><u>Proficiency Bonus</u>: $proficiency_bonus</p>";
		echo "<p><u>Saving Throws</u>: $saving_throws</p>";
		echo "<p><u>Skills</u>: $skills</p>";
		echo "<p><u>Passive Wisdom</u>: $passive_wisdom</p>";
		echo "<p><u>Languages</u>: $languages</p>";
		echo "<p><u>Proficiencies</u>: $proficiencies</p>";
	echo '</div>';
	
	//Stats 3
	echo '<div id="stats3">';
		echo "<p><u>Armor Class</u>: $armor_class</p>";
		echo "<p><u>Initiative</u>: $initiative</p>";
		echo "<p><u>Speed</u>: $speed</p>";
		echo "<p><u>Max HP</u>: $max_hp</p>";
		echo "<p><u>Current HP</u>: $current_hp</p>";
		echo "<p><u>Hit Dice</u>: $hit_dice</p>";
		echo "<p><u>Successes</u>: $successes</p>";
		echo "<p><u>Failures</u>: $failures</p>";
	echo '</div><br>';
	
	//Stats 4	
	echo '<div id="stats4">';
		echo "<p><u>Personality Traits</u>: $personality_traits</p>";
		echo "<p><u>Ideals</u>: $ideals</p>";
		echo "<p><u>Bonds</u>: $bonds</p>";
		echo "<p><u>Flaws</u>: $flaws</p>";
	echo '</div>';
	
	echo '<br>';
	
	//Page 1 End
  	echo'
  	</div>
  	';
  	
  	//Page 2 Start
  	echo '
  	<div id="tabs-2">
   ';
   
   //Page 2
	echo '<div id="moneyinfo">';
		echo "<p><b><u>Currency</u></b></p><br>";
		echo "<p><u>CP</u>: $cp</p>";
		echo "<p><u>SP</u>: $sp</p>";
		echo "<p><u>EP</u>: $ep</p>";
		echo "<p><u>GP</u>: $gp</p>";
		echo "<p><u>PP</u>: $pp</p>";
	echo '</div><br><br>';
	
	//Select items
	//Select inventory type items
	$i1 = "SELECT item_name, item_id FROM items WHERE character_id=$character_id AND item_type='inventory'";
	
	
	$i1f = mysqli_query ($dbc, $i1) or trigger_error("Query: $i1\n<br />MySQL Error: " . mysqli_error($dbc));
	
   echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Inventory Items</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($i1f))
	{
		
	$item_name = $row["item_name"];
	$item_id = $row["item_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_item_view.php?item_id=$item_id'>" .	$item_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Item Inventory End
	
	//Select weapon type items
	$i1 = "SELECT item_name, item_id FROM items WHERE character_id=$character_id AND item_type='weapon'";
	
	
	$i1f = mysqli_query ($dbc, $i1) or trigger_error("Query: $i1\n<br />MySQL Error: " . mysqli_error($dbc));
	
   echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Weapon Items</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($i1f))
	{
		
	$item_name = $row["item_name"];
	$item_id = $row["item_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_item_view.php?item_id=$item_id'>" .	$item_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Item Weapon End
	
	//Select armor type items
	$i1 = "SELECT item_name, item_id FROM items WHERE character_id=$character_id AND item_type='armor'";
	
	
	$i1f = mysqli_query ($dbc, $i1) or trigger_error("Query: $i1\n<br />MySQL Error: " . mysqli_error($dbc));
	
   echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Armor Items</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($i1f))
	{
		
	$item_name = $row["item_name"];
	$item_id = $row["item_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_item_view.php?item_id=$item_id'>" .	$item_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Item Armor End
	
	
   //Page 2 End
   echo '
  	</div>
  	';
  	
  	//Page 3 Start
  	echo '
  	<div id="tabs-3">
   ';
   
   //Page 3
	echo '<div id="background1">';
		echo "<p><u>Appearance</u>:</p>";
		echo '<img src="data:image/jpeg;base64,'.base64_encode($appearance).'" height="300" width="300"/>';
	echo '</div>';
	
	echo '<div id="background2">';
		echo "<p><u>Age</u>: $age</p>";
		echo "<p><u>Height</u>: $height</p>";
		echo "<p><u>Weight</u>: $weight</p><br>";
		echo "<p><u>Eyes</u>: $eyes</p>";
		echo "<p><u>Skin</u>: $skin</p>";
		echo "<p><u>Hair</u>: $hair</p>";
	
		echo "<p><u>Organization</u>: $organization</p>";
		echo "<p><u>Rank</u>: $rank</p><br>";
	
		echo "<p><u>Backstory</u>: $backstory</p><br>";
	
		echo "<p><u>Features</u>: $features</p><br>";
   echo '</div><br>';
   //Page 3 End
   echo '
  	</div>
  	';
  	
  	//Page 4 Start
  	echo '
  	<div id="tabs-4">
	';
	
	//Page 4
	echo '<div id="spell_info">';
		echo "<p><u>Spell Slots</u>: $spell_slots</p>";
		echo "<p><u>Spellcasting Ability</u>: $spell_casting_ability</p>";
		echo "<p><u>Spell Save DC</u>: $spell_save_dc</p>";
		echo "<p><u>Spell Attack Bonus</u>: $spell_attack_bonus</p>";
	echo'</div>';
	
	echo'</br>';
	
	//Select character spells
	//Select 0 level spells
	$s0 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=0";
	
	
	$a0 = mysqli_query ($dbc, $s0) or trigger_error("Query: $s0\n<br />MySQL Error: " . mysqli_error($dbc));
	
   echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Cantrips</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a0))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 0 Spell End
	
	//Level 1 Spell Start
	//Select level 1 spells
	$s1 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=1";
	
	
	$a1 = mysqli_query ($dbc, $s1) or trigger_error("Query: $s1\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 1</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a1))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 1 Spell End
	
	//Level 2 Spell Start
	//Select level 2 spells
	$s2 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=2";
	
	
	$a2 = mysqli_query ($dbc, $s2) or trigger_error("Query: $s2\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 2</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a2))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 2 Spell End
	
	//Level 3 Spell Start
	//Select level 3 spells
	$s3 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=3";
	
	
	$a3 = mysqli_query ($dbc, $s3) or trigger_error("Query: $s3\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 3</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a3))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 3 Spell End
	
	//Level 4 Spell Start
	//Select level 4 spells
	$s4 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=4";
	
	
	$a4 = mysqli_query ($dbc, $s4) or trigger_error("Query: $s4\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 4</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a4))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 4 Spell End
	
	//Level 5 Spell Start
	//Select level 5 spells
	$s5 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=5";
	
	
	$a5 = mysqli_query ($dbc, $s5) or trigger_error("Query: $s5\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 5</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a5))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 5 Spell End
		
	//Level 6 Spell Start
	//Select level 6 spells
	$s6 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=6";
	
	
	$a6 = mysqli_query ($dbc, $s6) or trigger_error("Query: $s6\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 6</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a6))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 6 Spell End
		
	//Level 7 Spell Start
	//Select level 7 spells
	$s7 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=7";
	
	
	$a7 = mysqli_query ($dbc, $s7) or trigger_error("Query: $s7\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 7</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a7))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 7 Spell End
	
	//Level 8 Spell Start
	//Select level 8 spells
	$s8 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=8";
	
	
	$a8 = mysqli_query ($dbc, $s8) or trigger_error("Query: $s8\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 8</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a8))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 8 Spell End
	
	//Level 9 Spell Start
	//Select level 9 spells
	$s9 = "SELECT spell_name, spell_id FROM spells WHERE character_id=$character_id AND spell_level=9";
	
	
	$a9 = mysqli_query ($dbc, $s9) or trigger_error("Query: $s9\n<br />MySQL Error: " . mysqli_error($dbc));
	
  	echo "<table class='spell_table'>";
	echo "<tbody class='spell_table'>";
	echo "<tr class='spell_table'>";
	
	
	echo "<th class='spell_table'>Level 9</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($a9))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
			
	echo "<tr class='spell_table'>";

		echo "<td class='spell_table'> <a href='public_public_spell_view.php?spell_id=$spell_id'>" .	$spell_name	.	"</a></td>"	;
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Level 9 Spell End	
	
	echo '<br>';
	
	
	
	//Page 4 End	
	echo '
  	</div>
  	';
  	
  	//Page 5 Start
  	echo '
  	<div id="tabs-5">
   ';
   
   //Page 5
	//Select everything from chronicles
	$c = "SELECT * FROM chronicles WHERE character_id=$character_id";
	
	
	$d = mysqli_query ($dbc, $c) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
	echo "<table>";
	echo "<tbody>";
	echo "<tr>";
	
	
	echo "<th>Chronicle Name</th>";
	echo "<th>Date</th>";
	echo "<th></th>";
	
	echo "</tr>";
	
	while($row = mysqli_fetch_array($d))
	{
	$chronicle_id = $row["chronicle_id"];
	$chronicle_name = $row["chronicle_name"];
	$date = $row["date"];
	
	
		
	echo "<tr>";

		echo "<td>" .	$chronicle_name	.	"</td>"	;
		echo "<td>" .	$date	.	"</td>"	;
		
		echo
		"<td>
				<form action=\"public_chronicle_view.php\" method=\"get\">
					<input type=\"hidden\" name=\"chronicle_id\" value=\"$chronicle_id\">
		
					<input type=\"submit\" name=\"submit\" value=\"View Chronicle\" />
		
				</form>
		</td>";
		
	}
	echo "</tbody>";
	echo "</table>";
	
	
	echo '<br>';
	echo '<p>Public Character(Allow Character Profile and Chronicles To Be Viewable By Public): ' . $public_character	. '</p>';
   //Page 5 End
   echo '
  	</div>
  	';
//Tab End  	
echo '
</div>
';

	mysqli_close($dbc);
	
	
}


?>


<?php include ('includes/footer.html'); ?>