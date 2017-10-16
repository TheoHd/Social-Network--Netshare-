<?= acceptFriend(); ?>
<?= refuseFriend(); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre -->
    <title>netshare</title>
    <!-- Details -->
    <meta name="description" content="Netshare est un réseau social hors du commun, où tout est partagé en temps réel avec vos amis !">
    <meta name="keywords" content="net share, netshare, net, share, réseau, social, réseau social" />
    <meta name="author" content="Théo Huchard" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/hover.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <!-- Bootstrap CDN -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="js/npm.js"></script> -->
    <!-- Gallery -->
    <script type="text/javascript" src="js/gallery.js"></script>
    <script type="text/javascript" src="js/notif.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
    <!-- Verif Form Edit -->
    <script type="text/javascript" src="js/verif-form-edit.js"></script>
    <!-- Verif Notif -->
    <script type="text/javascript" src="js/verif_notif.js"></script>
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Barre du "dessus" -->
    <section class="row top-bar">
        <div class="container" id="top-bar-elements">
            <!-- Icône -->
            <div class="col-md-1 col-md-offset-1" id="icon">
                <a href="index.php?p=home"><i class="fa fa-telegram text-center"></i></a>
            </div>
            <!-- Recherche -->
            <div class="col-md-2" id="search">
                <form class="pd-0" action="">
                    <input type="text" id="header-search-item" placeholder="Rechercher">
                </form>               
            </div>
            <!-- Contact - A propos -->
            <div class="col-md-8 text-right" id="headbar-list">
                <ul class="m-0">
                    <li><a href="index.php?p=home"><i class="fa fa-home mr-1"></i>Accueil</a></li>
                    <li><a href="index.php?p=profile"><i class="fa fa-user-circle mr-1"></i>Profil</a></li>
                    <li><a href="index.php?p=gallery"><i class="fa fa-window-maximize mr-1"></i>Gallerie</a></li>
                    <li><a href="index.php?p=inbox"><i class="fa fa-envelope mr-1"></i>Messagerie</a></li>
                    <li id="dynamic-option">
                        <span>
                        <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog mr-1"></i>Options</a>
                        <ul class="dropdown-menu ddp-props-options">
                          <li><a href="index.php?p=logout">Se déconnecter</a></li>
                          <li><a href="index.php?p=options">Options</a></li>
                          <li><a href="index.php?p=about">À propos</a></li>
                          <li><a href="index.php?p=contact">Contactez-nous</a></li>
                        </ul> 
                        </span>                       
                    </li>
                    <li id="dynamic-notif">
                        <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="condition-notif" class='mr-1 change-notif-color'>1</span>
                            <i class="fa fa-thumb-tack mr-1 change-notif-color"></i>
                            <span class="change-notif-color">Notifications</span>
                        </a>
                        <?= notifications(); ?>
                        </span> 
                    </li>                    
                </ul>
            </div>
    </section>