<?php
include_once 'model/sql_connection.php';

if($_SESSION['username'] != NULL)
{
    if($_GET['type'] == 'editsite')
    {
        include_once 'controler/admin/editSite.php';
    }
    elseif($_GET['type'] == 'menu')
    {
        include_once 'controler/admin/menu.php';
    }
    elseif($_GET['type'] == 'page')
    {
        include_once 'controler/admin/page.php';
    }
    elseif($_GET['type'] == 'addpage')
    {
        include_once 'controler/admin/addPage.php';
    }
    elseif($_GET['type'] == 'editpage')
    {
        include_once 'controler/admin/editPage.php';
    }
    elseif($_GET['type'] == 'listTemplate')
    {
        include_once 'controler/admin/listTemplate.php';
    }
    elseif($_GET['type'] == 'customiseTemplate')
    {
        include_once 'controler/admin/customiseTemplate.php';
    }
    elseif($_GET['type'] == 'user')
    {
        include_once 'controler/admin/user.php';
    }
    elseif($_GET['type'] == 'profile')
    {
        include_once 'controler/admin/profile.php';
    }
    elseif($_GET['type'] == 'message')
    {
        include_once 'controler/admin/message.php';
    }
    else
    {
        include_once 'controler/admin/dashboard.php';
    }
}
else
{
    include_once 'controler/admin/index.php';
}