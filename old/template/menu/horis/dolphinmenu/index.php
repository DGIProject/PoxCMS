<?php 
				if ($i == 0)
				{
					echo $i;
				echo '<div id="dolphincontainer">
				<div id="dolphinnav">
				<ul>';
				}				
				else if ($i == $max )
				{
					echo $i;
				echo '</ul>
				</div>	
				</div>'; 
				}
				else
				{
				echo '<li><a href="pages/'.$link.'" title="'.$title.'"><span>'.$input.'</span></a></li>';
				}
	
?>