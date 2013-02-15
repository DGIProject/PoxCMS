<?php

function ScanDirectory($Directory){

$MyDirectory = opendir($Directory) or die('Erreur');
while($Entry = @readdir($MyDirectory)) {

echo '<li>'.$Entry.'</li>';


}
    closedir($MyDirectory);
}

ScanDirectory('horis/');
?>
