<div id="header">
    <h1><a href="dashboard.html">PoxCMS Admin</a></h1>
</div>

<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span
                class="text">Profile</span></a></li>
        <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown"
                                                                   data-target="#menu-messages" class="dropdown-toggle"><i
                class="icon icon-envelope"></i> <span class="text">Messages</span> <span
                class="label label-important">0</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#">new message</a></li>
                <li><a class="sInbox" title="" href="#">inbox</a></li>
                <li><a class="sOutbox" title="" href="#">outbox</a></li>
                <li><a class="sTrash" title="" href="#">trash</a></li>
            </ul>
        </li>
        <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span
                class="text">Settings</span></a></li>
        <li class="btn btn-inverse"><a title="" href="deco.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
        </li>
    </ul>
</div>

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li><a href="add_page.php"><i class="icon icon-file"></i>ajouter une page</a></li>
        <li><a href="#">mise en place de base</a></li>
        <li><a href="edit_page.php"><i class="icon icon-edit"></i>Editer une page</a></li>
        <li><a href="#"><i class="icon icon-list"></i>Element du site</a></li>
        <li><a href="del_page.php"><i class="icon icon-remove"></i>suprimer une page</a></li>
        <li><a href="add_menu.php"><i class="icon icon-plus"></i>Ajouter un menu</a></li>
        <li><a href="edit_menu.php"><i class="icon icon-edit"></i>editer un menu</a></li>
        <li><a href="def_home.php">Definir la page d'accueille du site</a></li>
        <li><a href="users.php"><i class="icon icon-user"></i>Gestion des Utilisateurs</a></li>
    </ul>
</div>