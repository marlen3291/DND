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
	
	
//Background Photo
	echo '<div id="backgroundphoto">';
		echo "<p><u>Name</u>:$first_name $last_name</p>";
		echo '<img src="data:image/jpeg;base64,'.base64_encode($appearance).'" height="300" width="300"/>';
	echo '</div>';
	
	//Some Background Info
	echo '<div id="playerinfo">';
		echo "<p><u>Class</u>: $class</p>";
		echo "<p><u>Level</u>: $level</p>";
		echo "<p><u>Background</u>: $background</p>";
		echo "<p><u>Player Name</u>: $player_name</p>";
		echo "<p><u>Race</u>: $race</p>";
		echo "<p><u>Alignment</u>: $alignment</p>";
		echo "<p><u>Experience</u>: $exp</p>";
	echo '</div>';
	
	echo '<br>';
	
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
	$i1 = "SELECT item_name, item_id, item_type FROM items WHERE character_id=$character_id";
	
	
	$i1f = mysqli_query ($dbc, $i1) or trigger_error("Query: $i1\n<br />MySQL Error: " . mysqli_error($dbc));
	
   echo '<table id="myTableitem" class="tablesorter">';
	echo "<thead>";
		echo "<tr>";
			echo "<th>Item Name</th>";
			echo "<th>Item Type</th>";
			echo "<th>Item Link</th>";
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	
	while($row = mysqli_fetch_array($i1f))
	{
		
	$item_name = $row["item_name"];
	$item_id = $row["item_id"];
	$item_type = $row["item_type"];
			
	echo "<tr>";

		echo "<td>" .	$item_name	.	"</td>"	;
		echo "<td>". $item_type . "</td>"	;
		echo 
		
		"<td>
		
			<button><a href='public_item_view.php?item_id=$item_id'>View Item</a> </button>
		</td>";
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Item Inventory End
	
	
   //Page 2 End
   echo '
  	</div>
  	';
  	
  	//Page 3 Start
  	echo '
  	<div id="tabs-3">
   ';
   
   //Page 3

	
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
	$s0 = "SELECT spell_name, spell_id, spell_level FROM spells WHERE character_id=$character_id";
	
	
	$a0 = mysqli_query ($dbc, $s0) or trigger_error("Query: $s0\n<br />MySQL Error: " . mysqli_error($dbc));
	
   echo '<table id="myTablespell" class="tablesorter">';
   echo "<thead>";
		echo "<tr>";
			echo "<th>Spell Name</th>";
			echo "<th>Spell Level</th>";
			echo "<th>Spell Link</th>";
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	
	while($row = mysqli_fetch_array($a0))
	{
		
	$spell_name = $row["spell_name"];
	$spell_id = $row["spell_id"];
	$spell_level = $row["spell_level"];
			
	echo "<tr>";

		echo "<td>" .	$spell_name	.	"</td>"	;
		echo "<td>". $spell_level . "</td>";
		
		echo 
		
		"<td>
		
			<button><a href='public_spell_view.php?spell_id=$spell_id'>View Spell</a> </button>
		</td>";
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	//Spell End
	
	
	
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
	
	echo '<table id="myTablechronicle" class="tablesorter">';
	echo "<thead>";
		echo "<tr>";
	
	
		echo "<th>Chronicle Name</th>";
		echo "<th>Date</th>";
		echo "<th>Chronicle Link</th>";
	
		echo "</tr>";
	echo "</head>";	
	echo "<tbody>";
	
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
		
			<button><a href='public_chronicle_view.php?chronicle_id=$chronicle_id'>View Chronicle</a> </button>
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
