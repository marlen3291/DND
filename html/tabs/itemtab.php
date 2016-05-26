<?php

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
	
	$i1 = "SELECT * FROM items WHERE character_id=$character_id";
	
	
	$i1f = mysqli_query ($dbc, $i1) or trigger_error("Query: $i1\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if(mysqli_num_rows($i1f) != 0){
		
   echo '<table id="myTableitem" class="display">';
	echo "<thead>";
		echo "<tr>";
			echo "<th>Item Name</th>";
			echo "<th>Item Type</th>";
			echo "<th>Item Description</th>";
			echo "<th>Attack Bonus</th>";
			echo "<th>Damage</th>";
			echo "<th>Armor</th>";
			
			if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
			echo "<th>Item Link</th>";
			}
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	
	while($row = mysqli_fetch_array($i1f))
	{
		
	$item_name = $row["item_name"];
	$item_description = $row["item_description"];
	$item_type = $row["item_type"];
	$attack_bonus = $row["attack_bonus"];
	$damage = $row["damage"];
	$armor = $row["armor"];
	$item_id = $row["item_id"];
			
	echo "<tr>";

		echo "<td>" .	$item_name	.	"</td>"	;
		echo "<td>". $item_type . "</td>"	;
		
		echo "<td>" .	nl2br($item_description)	.	"</td>"	;
		echo "<td>". $attack_bonus . "</td>"	;
		
		echo "<td>" .	$damage	.	"</td>"	;
		echo "<td>". $armor . "</td>"	;
		
		if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
			
			echo 
		
			"<td>
		
			<a href='item_view.php?item_id=$item_id'>View Item</a> 
			</td>";
					
			echo "</tr>";
		}
	
	
	}
	echo "</tbody>";
	echo "</table>";
	
}
else{echo '<p>No Items Acquired Yet</p>';}

if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
//Create item form
	echo '<form action="create_item.php" method="get">

			<input type="hidden" name="character_id" value="' . $character_id . '">
		
			<input type="submit" name="submit" value="Acquire A New Item" />
		
			</form><br>';
	}
			
	echo '<br>';
	//Item Inventory End
	
	
   //Page 2 End
   echo '
  	</div>
  	';


?>