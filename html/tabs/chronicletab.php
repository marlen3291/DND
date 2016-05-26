<?php

//Page 5 Start
  	echo '
  	<div id="tabs-5">
   ';
   
   //Page 5
	//Select everything from chronicles
	echo '<h1><b>Chronicle Timeline</b></h1>';
	
	if (isset($_SESSION['user_id']) && $public_viewing != "Yes"){
		
		
		$c = "SELECT * FROM chronicles WHERE character_id=$character_id ORDER BY cdate";
	
	
		$d = mysqli_query ($dbc, $c) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
		if(mysqli_num_rows($d) !=0){
			
			echo '
			<div id="timeline" class="timeline-container">
				<button class="timeline-toggle">+ expand all</button>
		';
	
			while($row = mysqli_fetch_array($d))
			{
				$chronicle_id = $row["chronicle_id"];
				$chronicle_name = $row["chronicle_name"];
				$cdate = $row["cdate"];
				$newdate = date("M d, Y", strtotime($cdate));
				$description = $row["description"];
	
					echo '
	
        			<div class="timeline-wrapper">
        			
                <h2 class="timeline-time">'.$chronicle_name.'</h2>

                <dl class="timeline-series">

                        <dt class="timeline-event" start-open id="'.$newdate.'"><a>Date: '.$newdate.'</a></dt>
                        <dd class="timeline-event-content" id="'.$chronicle_name.'EX">
                                <p>'.$description.'</p>
 										  <p><a href="chronicle_view.php?chronicle_id='.$chronicle_id.'">View Chronicle Entry</a></p>                                
                        </dd>
                </dl>
                
                </div>
        
        ';
			
		
			}
				echo '
    			<br class="clear">
				</div>
				';
			}
			
			else{echo '<p>No Chronicle Written Yet</p>';}
			

			echo ' 
	
			<form action="create_chronicle.php" method="get">

				<input type="hidden" name="character_id" value='	.	$character_id . '>
		
				<input type="submit" name="submit" value="Create A Chronicle" />
		
			</form>
			';
		}
	
	else{
	
			$c = "SELECT * FROM chronicles WHERE character_id=$character_id";
	
	
		$d = mysqli_query ($dbc, $c) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
		if(mysqli_num_rows($d) !=0){
			
			echo '
			<div id="timeline" class="timeline-container">
			<button class="timeline-toggle">+ expand all</button>
		';
	
			while($row = mysqli_fetch_array($d))
			{
				$chronicle_id = $row["chronicle_id"];
				$chronicle_name = $row["chronicle_name"];
				$cdate = $row["cdate"];
				$newdate = date("M d, Y", strtotime($cdate));
				$description = $row["description"];
	
					echo '
	
        <div class="timeline-wrapper">
                <h2 class="timeline-time">'.$chronicle_name.'</h2>

                <dl class="timeline-series">

                        <dt class="timeline-event" start-open id="'.$newdate.'"><a>Date: '.$newdate.'</a></dt>
                        <dd class="timeline-event-content" id="'.$chronicle_name.'EX">
                                <p>'.$description.'</p>
                        </dd>
                </dl>
        </div>
        
        ';
			
		
			}
				echo '
        
    			<br class="clear">
				</div>
				';
			}
			
			else{echo '<p>No Available Chronicles Yet</p>';}

		}
	
	
	echo '<br>';
	

	
   //Page 5 End
   echo '
  	</div>
  	';

?>