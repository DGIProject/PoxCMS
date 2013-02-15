<?php 
				if ($i == 0)
				{
				echo '<ul id="saturday">';
				}				
				else if ($i== $max )
				{
				echo '</ul>'; 
				}
				else
				{
				echo '<li><a href="pages/'.$link.'" title="'.$title.'">'.$input.'</a></li>';
				}
	
?>