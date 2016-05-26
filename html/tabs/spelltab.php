<?php

//Page 4 Start
  	echo '
  	<div id="tabs-4">
	';
	echo '<h1><b>Spellcasting</b></h1>';
	//Page 4
	echo '<div id="spell_info">';
		echo "<p><b><u>Spell Slots</u></b>: $spell_slots</p>";
		echo "<p><b><u>Spellcasting Ability</u></b>: $spell_casting_ability</p>";
		echo "<p><b><u>Spell Save DC</u></b>: $spell_save_dc</p>";
		echo "<p><b><u>Spell Attack Bonus</u></b>: $spell_attack_bonus</p>";
	echo'</div>';
	
	echo'</br>';
	
	//Select character spells
	echo '<h2><b><u>List of Spells</u></b></h2><br>';
	$s0 = "SELECT * FROM spells WHERE character_id=$character_id";
	
	
	$a0 = mysqli_query ($dbc, $s0) or trigger_error("Query: $s0\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if(mysqli_num_rows($a0) !=0){
   echo '<table id="myTablespell" class="display">';
   echo "<thead>";
		echo "<tr>";
			echo "<th>Spell Name</th>";
			echo "<th>Level</th>";
			echo "<th>Description</th>";
			echo "<th>Casting Time</th>";
			echo "<th>Range</th>";
			echo "<th>Components</th>";
			echo "<th>Duration</th>";
			
			if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
			echo "<th>Spell Link</th>";
			}
		
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	
	while($row = mysqli_fetch_array($a0))
	{
		
	$spell_name = $row["spell_name"];
	$spell_description = $row["spell_description"];
	$spell_level = $row["spell_level"];
	$casting_time = $row["casting_time"];
	$spell_range = $row["spell_range"];
	$components = $row["components"];
	$duration = $row["duration"];
	$character_id = $row["character_id"];
	$spell_id = $row["spell_id"];
	
			
	echo "<tr>";

		echo "<td>" .	$spell_name	.	"</td>"	;
		echo "<td>". $spell_level . "</td>";
		echo "<td>". nl2br($spell_description) . "</td>";
		echo "<td>". $casting_time . "</td>";
		echo "<td>". $spell_range . "</td>";
		echo "<td>". $components . "</td>";
		echo "<td>". $duration . "</td>";
		
		if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
		
			echo 
		
			"<td>
		
			<a href='spell_view.php?spell_id=$spell_id'>View Spell</a> 
			</td>";
					
			echo "</tr>";
	
		}
	
	}
	echo "</tbody>";
	echo "</table>";
}
else{echo '<p>No Spells Acquired Yet</p>';}
	//Spell End
	
	if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
	//Create spell form
	echo '<form action="create_spell.php" method="get">

			<input type="hidden" name="character_id" value="' . $character_id . '">
		
			<input type="submit" name="submit" value="Acquire A Spell" />
		
			</form><br>';
	}
	
	echo '<br>';
	
	
	
	//Page 4 End	
	echo '
  	</div>
  	';
  	


?>