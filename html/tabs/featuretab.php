<?php

//Page 7 Start
  	echo '
  	<div id="tabs-7">
   ';
   
   //Select everything from features
	echo '<h1><b>Features</b></h1>';
	
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
	//Feature End
	
	
   //Page 7 End
   echo '
  	</div>
  	';


?>