 <?php
 
include "configs/sql/comp_save.php";


function get_menu()
{
	$bdd = bdd_conect("1");
	$req = $bdd->prepare("SELECT title,id,template FROM menu WHERE location=1");
	$req->execute();	
	$retour_bbd = $req->fetch();	
	
	$id = $retour_bbd['id'];
	$template = $retour_bbd['template'];	
	
	$req = $bdd->prepare("SELECT COUNT(*) as max FROM menu WHERE parrent=:id OR id=:id");
	$req->execute(array('id' => $id));	
	$retour_bbd = $req->fetch();	
	
	$max = $retour_bbd['max'];
	
	$req = $bdd->prepare("SELECT id,input,link FROM menu WHERE parrent=:id ");
	$req->execute(array('id' => $id));
	$rep = $req->fetchAll();	
	$i =0;
	get_line_for_menu($link, $input,$template,$i,$max);	
	foreach($rep as $done)
	{
		$i++;
		$link = $done['link'] ;
		
		$input = $done['input'];
		get_line_for_menu($link, $input,$template,$i,$max);	
		
		
	}
	$i++;
get_line_for_menu($link, $input,$template,$i,$max);
Get_Homepage($id);	
	
}
function get_line_for_menu($link,$input,$template,$i,$max)
{
		if ($template == "0")
            {
				include 'template/menu/horis/dolphinmenu/index.php';				
				
            }
            else if ($template == "1")
            {
                include 'template/menu/horis/horizontalderoulant1/index.php';

            }
            else if ($template == "2")
            {
                include 'template/menu/horis/saturday/index.php';

            }
			else if ($template == "3")
            {
               include 'template/menu/horis/simple-menu/index.php';

            }
			else if ($template == "4")
            {
               include 'template/menu/horis/slate/index_B.php';
				
            }
			else if ($template == "5")
            {
               include 'template/menu/horis/slate/index_G.php';
				
            }
			else if ($template == "6")
            {
               include 'template/menu/horis/slate/index_V.php';
				
            }
			else if ($template == "7")
            {
               include 'template/menu/horis/slate/index_R.php';
				
            }
			else if ($template == "8")
            {
                include 'template/menu/horis/style4/index.php';

            }
			else if ($template == "9")
            {
               include 'template/menu/horis/Timeforbed/index.php';

            }
			else if ($template == "10")
            {
                include 'template/menu/horis/wax/index_O.php';
            }
			else if ($template == "11")
            {
                include 'template/menu/horis/wax/index_B.php';
            }
			else if ($template == "12")
            {
                include 'template/menu/horis/wax/index_G.php';
            }
			else if ($template == "13")
            {
                include 'template/menu/horis/wax/index_Gr.php';
            }
			else if ($template == "14")
            {
                include 'template/menu/horis/wax/index_R.php';
            }
            else if ($template == "15")
            {
                include 'template/menu/onglet/1/';
            }
            else if ($template == "16")
            {
                include 'template/menu/onglet/2/';
            }
            else if ($template == "17")
            {
                include'template/menu/vertical/1/';
            }
	
}
function Get_Homepage($id)
{
	$bdd = bdd_conect("1");
	$req = $bdd->prepare("SELECT id,input,link FROM menu WHERE parrent=:id AND homepage=1");
	$req->execute(array('id' => $id));
	$rep = $req->fetch();	
	$link =  $rep['link'];
    
    $chemin = "pages/".$link;
    $file = file_get_contents($chemin);
    $texte_html = stripslashes($file);
    echo $texte_html;

}