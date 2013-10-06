<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from bootswatch.com/amelia/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 03 Oct 2013 17:27:26 GMT -->
<head>
    <title><?php echo $site['name']; ?> - <?php echo $page['name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://clangue.net/other/PoxCMS/">
    <meta charset="UTF-8"/>
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
    <link rel="stylesheet" href="template/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="template/assets/css/bootswatch.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="template/bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="template/bower_components/bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  </head>
  <body>
    <script src="template/assets/js/bsa.js"></script>

    <div class="container">

        <div class="page-header" id="banner">
            <div class="row">
                <div class="col-lg-6">
                    <h1><?php echo $site['name']; ?></h1>
                    <p class="lead"><?php echo $site['description']; ?></p>
                </div>
            </div>
            <div class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo $site['id']; ?>"><?php echo $site['name']; ?></a>
                    </div>
                    <div class="navbar-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
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
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar -->
        </div>

        <!-- Navbar
        ================================================== -->
        <div class="bs-docs-section clearfix">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1><?php echo ($page['name'] != NULL) ? $page['name'] : 'Page introuvable'; ?></h1>
                    </div>
                    <div class="bs-example">
                        <?php echo ($page['content'] != NULL) ? $page['content'] : 'Aucun contenu à afficher.'; ?>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><?php echo $site['footer']; ?></p>
                    <p><a href="<?php echo $siteId; ?>/<?php echo $page['fileName']; ?>#top">Aller en haut</a></p>
                </div>
            </div>

        </footer>
    </div>

    <script src="template/bower_components/jquery/jquery.min.js"></script>
    <script src="template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="template/assets/js/bootswatch.js"></script>
  </body>

<!-- Mirrored from bootswatch.com/amelia/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 03 Oct 2013 17:28:07 GMT -->
</html>