<!DOCTYPE html>
<html>
<head>
    <title><?php echo $site['name']; ?> - <?php echo $page['name']; ?></title>

    <base href="http://loquii.alwaysdata.net/other/PoxCMS/">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php
    $extensionName = 'css';

    foreach($templateFiles as $file)
    {
        $path = 'view/ui/template/' . $templateId . '/' . $file;

        if(!is_dir($path))
        {
            $extension = strrchr($file, '.');

            $extension = substr($extension, 1);

            if($extensionName == $extension)
            {
                echo '<link type="text/css" href="' . $path . '" rel="stylesheet">';
            }
        }
    }?>
</head>
<body>
<div class="container">
    <header>
        <div class="row-fluid">
            <div class="span12">
                <h1><?php echo $site['name']; ?></h1>
                <p class="lead"><?php echo $site['description']; ?></p>
            </div>
        </div>
        <div class="subnav">
            <ul class="nav nav-pills">
                <?php
                foreach($listMenus as $menu)
                {
                    if($menu['fileName'] == $page['fileName'])
                    {
                        echo '<li class="active">';
                    }
                    else
                    {
                        echo '<li>';
                    }

                    echo '<a href="' . $siteId . '/' . $menu['fileName'] . '">' . $menu['name'] . '</a></li>';
                }?>
            </ul>
        </div>
    </header>

    <section style="margin-top: -10px;">
        <div class="page-header">
            <h1><?php echo $page['name']; ?></h1>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php echo $page['content']; ?>
            </div>
        </div>
    </section>

    <hr>

    <footer>
        <div class="row-fluid">
            <div class="span6">
                <p><?php echo $site['footer']; ?></p>
            </div>
            <div class="pull-right">
                <p><a href="<?php echo $siteId; ?>/<?php echo $page['fileName']; ?>#top">Aller en haut</a></p>
            </div>
        </div>
    </footer>
</div>

<?php
$extensionName = 'js';

foreach($templateFiles as $file)
{
    $path = 'view/ui/template/' . $templateId . '/' . $file;

    if(!is_dir($path))
    {
        $extension = strrchr($file, '.');

        $extension = substr($extension, 1);

        if($extensionName == $extension)
        {
            echo '<script type="text/javascript" src="' . $path . '"></script>';
        }
    }
}?>
</body>
</html>