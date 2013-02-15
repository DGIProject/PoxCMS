<?php 
	if ($i == 0)
				{
				echo '<div id="demo-container">
<ul id="simple-menu">';
				}				
				else if ($i == $max )
				{
				echo '</ul>
				</div>'; 
				}
				else
				{
				echo '<li><a href="pages/'.$link.'" title="'.$title.'">'.$input.'</a></li>';
				}
	
?>