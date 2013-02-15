<?php 
// NAV GREEN !
	if ($i == 0)
				{
				echo '<div class="green">
				<div id="slatenav">
				<ul>';
				}				
				else if ($i == $max )
				{
				echo '</ul>
				</div>	
				</div>'; 
				}
				else
				{
				echo '<li><a href="pages/'.$link.'" title="'.$title.'">'.$input.'</a></li>';
				}
	
?>