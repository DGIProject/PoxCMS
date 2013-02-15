<?php
/**
 * Created by JetBrains PhpStorm.
 * User: guillaume
 * Date: 22/12/12
 * Time: 10:54
 * To change this template use File | Settings | File Templates.
 */

include "function.php";
?>
<html>
<head>
</head>
<body>
cette page vous permet d'editer vos menu :<br> pour que tous fonctionne bien vous devez choisir le menu que vous voulez editer avec le titre/decription que vous avez
entrer lors de sa creation.<br>
<?php
if ($_GET['id'] != NULL) {
    $bdd = bdd_conect();
    $req = $bdd->prepare("UPDATE menu SET template=:choosedTemplate WHERE title=:ti");
    $req->execute(array(
        'choosedTemplate' => $_GET['id'],
        'ti' => $_GET['title']
    ));
    echo '<script type="text/javascript">window.location="edit_menu.php"</script>';
}

?>
<form name="edit_menu" action="" method="post">
    <select name="select"><?php

        $bdd = bdd_conect();
        $req = $bdd->prepare("SELECT * FROM menu");
        $req->execute();
        $rep = $req->fetchAll();
        foreach ($rep as $done) {
            if ($done['title'] != NULL) {

                echo "<option>" . $done['title'] . "</option>";
            }

        }
        ?>
    </select><br>
    <input type="submit" value="Suivant" name="choosemenu">
</form>
<?php
if (isset($_POST['select'])) {

    $req = $bdd->prepare("SELECT * FROM menu WHERE title=:ti");
    $req->execute(array(
        'ti' => $_POST['select']
    ));
    $rep = $req->fetch();
    $id = $rep['id'];
    $req = $bdd->prepare("SELECT * FROM menu WHERE parrent=:id_current");
    $req->execute(array(
        'id_current' => $id
    ));
    $rep = $req->fetchAll();

    ?>
<br>
<p>
    vous pouvez editer les lien de votre menu depuis cette page mais aussi choisir le template que vous voulez.
    <br>
<form action="" method="get">
    <select onchange="
            if (this.selectedIndex == 0)
            {
                document.getElementById('preview').src= '../template/menu/horis/dolphinmenu/';
                document.getElementById('CHt').value = this.selectedIndex;
            }
            else if (this.selectedIndex == 1)
            {
                document.getElementById('preview').src= '../template/menu/horis/horizontalderoulant1/';
                document.getElementById('CHt').value = this.selectedIndex;

            }
            else if (this.selectedIndex == 2)
            {
                document.getElementById('preview').src= '../template/menu/horis/saturday/';
                document.getElementById('CHt').value = this.selectedIndex;

            }else if (this.selectedIndex == 3)
            {
                document.getElementById('CHt').value = this.selectedIndex;
                document.getElementById('preview').src= '../template/menu/horis/simple-menu/';

            }else if (this.selectedIndex == 4)
            {
                document.getElementById('preview').src= '../template/menu/horis/slate/index.html#B';
                document.getElementById('CHt').value = this.selectedIndex;
            }
			else if (this.selectedIndex == 5)
            {
                document.getElementById('preview').src= '../template/menu/horis/slate/index.html#G';
                document.getElementById('CHt').value = this.selectedIndex;
            }else if (this.selectedIndex == 6)
            {
                document.getElementById('preview').src= '../template/menu/horis/slate/index.html#R';
                document.getElementById('CHt').value = this.selectedIndex;
            }else if (this.selectedIndex == 7)
            {
                document.getElementById('preview').src= '../template/menu/horis/slate/index.html#V';
                document.getElementById('CHt').value = this.selectedIndex;
            }else if (this.selectedIndex == 8)
            {
                document.getElementById('CHt').value = this.selectedIndex;
                document.getElementById('preview').src= '../template/menu/horis/style4/';

            }else if (this.selectedIndex == 9)
            {
                document.getElementById('CHt').value = this.selectedIndex;
                document.getElementById('preview').src= '../template/menu/horis/Timeforbed/';

            }else if (this.selectedIndex == 10)
            {
                document.getElementById('CHt').value = this.selectedIndex;
                document.getElementById('preview').src= '../template/menu/horis/wax/index.html#B';
            }
			else if (this.selectedIndex == 11)
            {
                document.getElementById('CHt').value = this.selectedIndex;
                document.getElementById('preview').src= '../template/menu/horis/wax/index.html#G';
            }
			else if (this.selectedIndex == 12)
            {
                document.getElementById('CHt').value = this.selectedIndex;
                document.getElementById('preview').src= '../template/menu/horis/wax/index.html#Gr';
            }
			else if (this.selectedIndex == 13)
            {
                document.getElementById('CHt').value = this.selectedIndex;
                document.getElementById('preview').src= '../template/menu/horis/wax/index.html#O';
            }
			else if (this.selectedIndex == 14)
            {
                document.getElementById('CHt').value = this.selectedIndex;
                document.getElementById('preview').src= '../template/menu/horis/wax/index.html#R';
            }
            else if (this.selectedIndex == 15)
            {
                document.getElementById('preview').src= '../template/menu/onglet/1/';
                document.getElementById('CHt').value = this.selectedIndex;
            }
            else if (this.selectedIndex == 16)
            {
                document.getElementById('preview').src= '../template/menu/onglet/2/';
                document.getElementById('CHt').value = this.selectedIndex;
            }
            else if (this.selectedIndex == 17)
            {
                document.getElementById('preview').src= '../template/menu/vertical/1/';
                document.getElementById('CHt').value = this.selectedIndex;


            }

            ">
    <option>dolphinmenu</option>
    <option>horizontalderoulant1</option>
    <option>saturday</option>
    <option>simple-menu</option>
    <option>slate Blue</option>
	<option>slate green</option>
	<option>slate Red</option>
	<option>slate Purpule</option>
    <option>style4</option>
    <option>Timeforbed</option>
    <option>wax blue</option>
	<option>wax green</option>
	<option>wax grey</option>
	<option>wax Orange</option>
	<option>wax Red</option>
    <option>onglet 1</option>
    <option>onglet 2</option>
    <option>vertical 1</option>
</select><br>
    <iframe id="preview" width="700px" height="100px"></iframe>
    <input type="hidden" value="" id="CHt" name="id">
    <input type="hidden" name="title" value="<?php echo $_POST['select']; ?>">
    <br>
    <input type="submit" value="choisir le template">
</form>
<br>
<form method="post" action="save_edited_menu.php">
<table>
    <tr><td>Elements</td>
        <?php
	$i2 = 0 ;
        foreach ($rep as $done) {
            echo '<td>' . $done['input'] . '</td><input type="hidden" name="input'.$i2.'" value="'.$done['input'].'">';
		$i2++;
        }
        ?>
    </tr>
    <tr><td>pages</td>
    <?php 
    $listepages = get_liste_page();
    $i =0 ;
    foreach ($rep as $done) {
            echo '<td><select name="pageforelement'.$i.'">';
            foreach ($listepages as $value) {
            	
            	echo '<option>'. $value['titre'].'</option>';
            	
            }
            echo '</select></td>';
            $i++;
        }
    
    ?>
    </tr>
</table>
<input type="hidden" name="numberofelemt" value="<?php echo $i ; ?>" />
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="submit" name="save" value="entegistrer les page" />
</form>

    <?php } ?>

</body>
</html>