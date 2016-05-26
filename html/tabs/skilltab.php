<?php

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
	echo '<table id="myTableskill" class="display">';
	echo "<thead>";
		echo "<tr>";
	
	
		echo "<th>Name</th>";
		echo "<th>Description Name</th>";
		
		if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
			echo "<th>Skill Link</th>";
		}		
	
		echo "</tr>";
	echo "</head>";	
	echo "<tbody>";
	
	while($row = mysqli_fetch_array($ski))
	{
	$skill_id = $row["skill_id"];
	$skill_name = $row["skill_name"];
	$skill_description = $row["skill_description"];
	
		
	echo "<tr>";

		echo "<td>" .	$skill_name	.	"</td>"	;
		echo "<td>" .	nl2br($skill_description)	.	"</td>"	;
		
		if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
		
		echo 
		
		"<td>
		
			<a href='skill_view.php?skill_id=$skill_id'>View Skill</a> 
		</td>";
		}
	}
	echo "</tbody>";
	echo "</table>";
	}
	else{echo '<p>No Skill Written Yet</p>';}
	
	if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
		
		echo ' 
	
		<form action="create_skill.php" method="get">

				<input type="hidden" name="character_id" value='	.	$character_id . '>
		
				<input type="submit" name="submit" value="Acquire A Skill" />
		
		</form>
	';
	}
	echo '<br>';
	
	//Select everything from features
	echo '<p><b><u>List of Features</u></b></p>';
	
	$fk = "SELECT * FROM features WHERE character_id=$character_id";
	
	
	$fki = mysqli_query ($dbc, $fk) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if(mysqli_num_rows($fki) !=0){
	echo '<table id="myTablefeature" class="display">';
	echo "<thead>";
		echo "<tr>";
	
	
		echo "<th>Name</th>";
		echo "<th>Description</th>";
		if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
		echo "<th>Feature Link</th>";
		}
			
		echo "</tr>";
	echo "</head>";	
	echo "<tbody>";
	
	while($row = mysqli_fetch_array($fki))
	{
	$feature_id = $row["feature_id"];
	$feature_name = $row["feature_name"];
	$feature_description = $row["feature_description"];
	
		
	echo "<tr>";

		echo "<td>" .	$feature_name	.	"</td>"	;
		echo "<td>" .	nl2br($feature_description)	.	"</td>"	;
	
		if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
			
		echo 
		
		"<td>
		
			<a href='feature_view.php?feature_id=$feature_id'>View Feature</a> 
		</td>";
		}
	}
	echo "</tbody>";
	echo "</table>";
	}
	else{echo '<p>No Feature Written Yet</p>';}
	
	if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
		
	echo ' 
	
		<form action="create_feature.php" method="get">

				<input type="hidden" name="character_id" value='	.	$character_id . '>
		
				<input type="submit" name="submit" value="Acquire A Feature" />
		
		</form>
	';
		
	}
	echo '<br>';

   //Page 6 End
   echo '
  	</div>
  	';
  	


?>