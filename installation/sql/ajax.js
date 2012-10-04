function signin(action,host, ident, pass,bdd)
{
	var OAjax;
	if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
	else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
	OAjax.open('POST',"sql/signin.php",true);
	OAjax.onreadystatechange = function()
	{
		if (OAjax.readyState == 4 && OAjax.status==200)
		{
			if (document.getElementById) 
			{	
				if (OAjax.responseText =='ok') {
                 //  alert(OAjax.responseText);
				   save_info_bdd(host,ident,pass,bdd);
				}
                else if (OAjax.responseText == 'not')
                {
                  //  alert(OAjax.responseText);
                    document.getElementById('ok').style.display="none";
                    document.getElementById('erreur').style.display="";
                    document.getElementById('msg3').style.display="none";
				}
                else
                {
                  //  alert(OAjax.responseText);
                    document.getElementById('ok').style.display="none";
                    document.getElementById('erreur').style.display="";
                    document.getElementById('msg3').style.display="none";
                }
			}
		}
	}
	OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	OAjax.send('action='+action+'&host='+host +'&ident='+ident+'&pass='+pass+'&bdd='+bdd);
}
function setdbd(action)
{
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"sql/signin.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (OAjax.responseText =='true') {
                document.getElementById('ok1').style.display="";
                document.getElementById('msg31').style.display="none";
                document.getElementById('erreur1').style.display="none";
                document.getElementById('suiva').disabled="";
            }
            else if (OAjax.responseText == 'false')
            {
                document.getElementById('ok1').style.display="none";
                document.getElementById('erreur1').style.display="";
                document.getElementById('msg31').style.display="none";
            }
            else
            {
                document.getElementById('ok1').style.display="none";
                document.getElementById('erreur1').style.display="";
                document.getElementById('erreur1').innerHTML=OAjax.responseText;
                document.getElementById('msg31').style.display="none";
            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('action='+action);
}
function save_info_bdd(host,ident,pass,base)
{
    var OAjax;
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"../configs/sql/sql_config.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (document.getElementById)
            {
                if (OAjax.responseText =='true') {
                    alert(OAjax.responseText+"google2");
                    document.getElementById('ok').style.display="";
                    document.getElementById('msg3').style.display="none";
                    document.getElementById('erreur').style.display="none";
                    document.getElementById('suivant').disabled="";
                }
                else if (OAjax.responseText == 'false')
                {
                   // alert(OAjax.responseText);
                    document.getElementById('ok').style.display="none";
                    document.getElementById('erreur').style.display="";
                    document.getElementById('msg3').style.display="none";
                }

            }
        }
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('host='+host +'&ident='+ident+'&pass='+pass+'&bdd='+base);
}
