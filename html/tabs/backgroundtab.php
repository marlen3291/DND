<?php

//Page 3 Start
  	echo '
  	<div id="tabs-3">
   ';
   
   //Page 3
	echo '<h1><b>Background</b></h1>';
	
	echo '<div id="background2">';
		echo "<p><b><u>Age</u></b>: $age</p>";
		echo "<p><b><u>Height</u></b>: $height</p>";
		echo "<p><b><u>Weight</u></b>: $weight</p><br>";
		echo "<p><b><u>Eyes</u></b>: $eyes</p>";
		echo "<p><b><u>Skin</u></b>: $skin</p>";
		echo "<p><b><u>Hair</u></b>: $hair</p>";
	
		echo "<p><b><u>Organization</u></b>: $organization</p>";
		echo "<p><b><u>Rank</u></b>: $rank</p><br>";
	
		echo "<p><b><u>Backstory</u></b>:"	.	nl2br($backstory)	.	"</p><br>";
	
		
   echo '</div><br>';
   //Page 3 End
   echo '
  	</div>
  	';
  	
?>