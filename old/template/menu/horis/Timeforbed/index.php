<?php 
	if ($i == 0)
				{
				echo '<div id="time4bed-nav">
				<ul>';
				}				
				else if ($i == $max )
				{
				echo '</ul>
				</div>'; 
				}
				else
				{
				echo '<li><a href="pages/'.$link.'" title="'.$title.'"><span>'.$input.'</span></a></li>';
				}
	
?>