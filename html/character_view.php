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

if (isset($_SESSION['user_id'])){
	
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
	
	echo '
	
<div id="tabs">
  	<ul>
    	<li><a href="#tabs-1">Character Main Stats </a></li>
    	<li><a href="#tabs-2">Inventory </a></li>
    	<li><a href="#tabs-3">Background</a></li>
    	<li><a href="#tabs-4">Spellcasting</a></li>
    	<li><a href="#tabs-5">Chronicles</a></li>
    	<li><a href="#tabs-6">Skills & Features</a></li>
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
	echo '<p>Public Character(Allow Character Profile To Be Viewable By Public): ' . $public_character	. '</p>';
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
		echo "<p><b><u>CP</u></b>: $cp</p>";
		echo "<p><b><u>SP</u></b>: $sp</p>";
		echo "<p><b><u>EP</u></b>: $ep</p>";
		echo "<p><b><u>GP</u></b>: $gp</p>";
		echo "<p><b><u>PP</u></b>: $pp</p>";
	echo '</div><br><br>';
	
	//Select items
	//Select inventory type items
	echo '<p><b><u>List of Items</u></b></p>';
	
	$i1 = "SELECT item_name, item_id, item_type FROM items WHERE character_id=$character_id";
	
	
	$i1f = mysqli_query ($dbc, $i1) or trigger_error("Query: $i1\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if(mysqli_num_rows($i1f) != 0){
		
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
		
			<a href='item_view.php?item_id=$item_id'>View Item</a> 
		</td>";
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	
}
else{echo '<p>No Items Acquired Yet</p>';}
	//Item Inventory End
	
	//Create item form
	echo '<form action="create_item.php" method="get">

			<input type="hidden" name="character_id" value="' . $character_id . '">
		
			<input type="submit" name="submit" value="Acquire A New Item" />
		
			</form><br>';
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
		echo "<p><b><u>Age</u></b>: $age</p>";
		echo "<p><b><u>Height</u></b>: $height</p>";
		echo "<p><b><u>Weight</u></b>: $weight</p><br>";
		echo "<p><b><u>Eyes</u></b>: $eyes</p>";
		echo "<p><b><u>Skin</u></b>: $skin</p>";
		echo "<p><b><u>Hair</u></b>: $hair</p>";
	
		echo "<p><b><u>Organization</u></b>: $organization</p>";
		echo "<p><b><u>Rank</u></b>: $rank</p><br>";
	
		echo "<p><b><u>Backstory</u></b>:". nl2br($backstory)	.	"</p><br>";
	
		
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
		echo "<p><b><u>Spell Slots</u></b>: $spell_slots</p>";
		echo "<p><b><u>Spellcasting Ability</u></b>: $spell_casting_ability</p>";
		echo "<p><b><u>Spell Save DC</u></b>: $spell_save_dc</p>";
		echo "<p><b><u>Spell Attack Bonus</u></b>: $spell_attack_bonus</p>";
	echo'</div>';
	
	echo'</br>';
	
	//Select character spells
	echo '<p><b><u>List of Spells</u></b></p>';
	$s0 = "SELECT spell_name, spell_id, spell_level FROM spells WHERE character_id=$character_id";
	
	
	$a0 = mysqli_query ($dbc, $s0) or trigger_error("Query: $s0\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if(mysqli_num_rows($a0) != 0){
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
		
			<a href='spell_view.php?spell_id=$spell_id'>View Spell</a> 
		</td>";
					
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	
}
	else{echo '<p>No Spells Acquired Yet</p>';}
	//Spell End
	
	echo '<br>';
	
	//Create spell form
	echo '<form action="create_spell.php" method="get">

			<input type="hidden" name="character_id" value="' . $character_id . '">
		
			<input type="submit" name="submit" value="Acquire New Spells" />
		
			</form><br>';
	
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
	echo '<p><b><u>List of Chronicles</u></b></p>';
	$c = "SELECT * FROM chronicles WHERE character_id=$character_id";
	
	
	$d = mysqli_query ($dbc, $c) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if(mysqli_num_rows($d) != 0){
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
		
			<a href='chronicle_view.php?chronicle_id=$chronicle_id'>View Chronicle</a> 
		</td>";
		
	}
	echo "</tbody>";
	echo "</table>";
	
	}
	
	else{echo '<p>No Chronicles Written Yet</p>';}
	
	echo ' 
	
		<form action="create_chronicle.php" method="get">

				<input type="hidden" name="character_id" value='	.	$character_id . '>
		
				<input type="submit" name="submit" value="Create A Chronicle" />
		
		</form>
	';
	
	echo '<br>';
	
   //Page 5 End
   echo '
  	</div>
  	';
  	
  	  	//Page 6 Start
  	echo '
  	<div id="tabs-6">
   ';
   
   //Page 6
	//Select everything from skills
	echo '<p><b><u>List of Skills</u></b></p>';
	
	$sk = "SELECT * FROM skills WHERE character_id=$character_id";
	
	
	$ski = mysqli_query ($dbc, $sk) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if(mysqli_num_rows($ski) !=0){
	echo '<table id="myTableskill" class="tablesorter">';
	echo "<thead>";
		echo "<tr>";
	
	
		echo "<th>Skill Name</th>";
		echo "<th>Skill Link</th>";
	
		echo "</tr>";
	echo "</head>";	
	echo "<tbody>";
	
	while($row = mysqli_fetch_array($ski))
	{
	$skill_id = $row["skill_id"];
	$skill_name = $row["skill_name"];
	
	
		
	echo "<tr>";

		echo "<td>" .	$skill_name	.	"</td>"	;	
		echo 
		
		"<td>
		
			<a href='skill_view.php?skill_id=$skill_id'>View Skill</a> 
		</td>";
		
	}
	echo "</tbody>";
	echo "</table>";
	}
	else{echo '<p>No Skill Written Yet</p>';}
	
	echo ' 
	
		<form action="create_skill.php" method="get">

				<input type="hidden" name="character_id" value='	.	$character_id . '>
		
				<input type="submit" name="submit" value="Acquire A Skill" />
		
		</form>
	';
	
	echo '<br>';
	
	//Select everything from features
	echo '<p><b><u>List of Features</u></b></p>';
	
	$fk = "SELECT * FROM features WHERE character_id=$character_id";
	
	
	$fki = mysqli_query ($dbc, $fk) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if(mysqli_num_rows($fki) !=0){
	echo '<table id="myTablefeature" class="tablesorter">';
	echo "<thead>";
		echo "<tr>";
	
	
		echo "<th>Feature Name</th>";
		echo "<th>Feature Link</th>";
	
		echo "</tr>";
	echo "</head>";	
	echo "<tbody>";
	
	while($row = mysqli_fetch_array($fki))
	{
	$feature_id = $row["feature_id"];
	$feature_name = $row["feature_name"];
	
	
		
	echo "<tr>";

		echo "<td>" .	$feature_name	.	"</td>"	;
		echo 
		
		"<td>
		
			<a href='feature_view.php?feature_id=$feature_id'>View Feature</a> 
		</td>";
		
	}
	echo "</tbody>";
	echo "</table>";
	}
	else{echo '<p>No Feature Written Yet</p>';}
	
		echo ' 
	
		<form action="create_feature.php" method="get">

				<input type="hidden" name="character_id" value='	.	$character_id . '>
		
				<input type="submit" name="submit" value="Acquire A Feature" />
		
		</form>
	';
	
	echo '<br>';

   //Page 6 End
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
		
			<input type="submit" name="submit" value="Edit Character Main Stats" />
		
</form>

<form action="delete_character.php" method="get">

			<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
		
			<input type="submit" name="submit" value="Delete Character" />
		
</form>

<?php include ('includes/footer.html'); ?>
