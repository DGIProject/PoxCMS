function confirmAdding(content,titre)
{
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"savepage.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (document.getElementById)
            {
                if (OAjax.responseText !='true') {
                    $.gritter.add({
                        title:	'Page crée avec sucée',
                        text:	OAjax.responseText,
                        image: 	'img/valide.png',
                        sticky: false
                    });
                    var obj = 'window.location.replace("pages.php");';
                    setTimeout(obj,2000);
                }

            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('content1='+encodeURIComponent(content) +'&titre='+titre);
}

function deletepage(page)
{
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"del_exe.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (document.getElementById)
            {
                if (OAjax.responseText !='true') {
                    $.gritter.add({
                        title:	'Page suprimé avec succée',
                        text:	OAjax.responseText,
                        image: 	'img/valide.png',
                        sticky: false
                    });
                    var obj = 'window.location.replace("pages.php");';
                    setTimeout(obj,2000);
                }

            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('page='+page);
}

function confirmEdit(page, content)
{
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"save_edited_file.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (document.getElementById)
            {
                if (OAjax.responseText !='true') {
                    $.gritter.add({
                        title:	'Page edité avec succée',
                        text:	OAjax.responseText,
                        image: 	'img/valide.png',
                        sticky: false
                    });
                    var obj = 'window.location.replace("pages.php");';
                    setTimeout(obj,2000);

                }
                else
                {
                    $.gritter.add({
                        title:	'Erreur !',
                        text:	OAjax.responseText,
                        image: 	'../img/valide.png',
                        sticky: false
                    });
                }

            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('selected1='+page+'&content1='+encodeURIComponent(content));
}

function previewPage(path)
{
    var OAjax;

    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"admin.php?type=page&a=showPreviewPage",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            document.getElementById('returnPreview').innerHTML = OAjax.responseText;
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('path=' + path);
}

function updateButtonEditMenu(menuId)
{
    console.log('updateButtonEditMenu');

    console.log(menuId);

    document.getElementById('buttonEditMenu' + menuId).classList.remove('disabled');
}

function saveEditMenu(menuId)
{
    console.log('saveEditMenu');

    var row = 1;

    var OAjax;

    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"admin.php?type=menu&a=editMenu",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            console.log('saved');

            document.getElementById('buttonEditMenu' + menuId).classList.add('disabled');
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('name=' + document.getElementById('inputNameMenu' + menuId).value + '&row=' + row + '&fileName=' + document.getElementById('selectFileNameMenu' + menuId).value + '&menuId=' + menuId);
}

function deleteThis(id)
{
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"mailsActions.php?a=deletemails",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (document.getElementById)
            {
                if (OAjax.responseText ='true') {
                    var id2 = '#'+id;
                    var obj = 'document.getElementById('+id+').parentNode.removeChild(document.getElementById('+id+'))';
                    $(id2).fadeTo(400,0.01);
                    setTimeout(obj,400);
                }

            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('id='+id);
}

function deleteavert(id)
{
    document.getElementById('returne').innerHTML = '<div class="alert alert-danger">êtes vous sur des vouloir suprimer ce compte ?<br>Cette action est irresversible !</div><input type="bouton" data-dismiss="modal" class="btn btn-danger" onclick="deleteUser('+id+')" value="OUI !"><input type="buton" class="btn btn-info" data-dismiss="modal" value="NON!">';
}
function deleteUser(id)
{
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"deleteUser.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (document.getElementById)
            {
                if (OAjax.responseText ='true') {
                    $.gritter.add({
                        title:	'Terminé',
                        text:	'Le compte a bien été suprimé !',
                        image: 	'../img/valide.png',
                        sticky: false
                    });
                    var obj = 'window.location.replace("users.php");';
                    setTimeout(obj,2000);
                }
                else
                {
                    $.gritter.add({
                        title:	'Erreur',
                        text:	'Le compte n\'a pas été suprimé !',
                        image: 	'../img/valide.png',
                        sticky: false
                    });
                }

            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('id='+id);
}
function defHomePage(pageSelected)
{
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"DefineHomePage.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (document.getElementById)
            {
                if (OAjax.responseText ='true') {
                    window.location.replace("admin.php");

                }
            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('page='+pageSelected);
}

function confirmDelete(path)
{
    document.getElementById('returnDelete').innerHTML = '<center><a href="' + path + '" class="btn btn-danger">Confirmation de suppression</a> <a href="#" data-dismiss="modal" class="btn btn-default">Annuler</a></center>';
}