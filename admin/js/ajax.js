/**
 * Created with JetBrains PhpStorm.
 * User: guillaume
 * Date: 26/02/13
 * Time: 21:06
 * To change this template use File | Settings | File Templates.
 */
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
                }

            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('content='+content +'&titre='+titre);
}