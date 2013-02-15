<?php 
	if ($i == 0)
				{
				echo '<div class="blue">
	<div id="waxcontainer">
	<div id="waxnav">
	<ul>';
				}				
				else if ($i == $max )
				{
				echo '</ul>
				</div>	
				</div>
</div>'; 
				}
				else
				{
				echo '<li><a href="pages/'.$link.'" title="'.$title.'"><span>'.$input.'</span></a></li>';
				}
	
?>