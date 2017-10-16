<?= loginSubmit(); ?>

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
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <!-- Script <-->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <!-- Form Verif   -->
    <script type="text/javascript" src="js/verif-form-register.js"></script>
    <script type="text/javascript" src="js/verif-form-login.js"></script>
</head>

<body>
    <!-- Barre du "dessus" -->
    <section class="row top-bar-connexion">
        <div class="container" id="top-bar-elements">
            <!-- Icône -->
            <a href="index.php?p=register">
            <div class="col-md-5 col-md-offset-1" id="icon">
                <div class="col-md-12">
                    <div class="col-md-6 mt-half">
                        <div class="col-md-6">
                        <i class="fa fa-telegram text-center"></i>
                        </div>
                        <div class="col-md-6" id="name">
                            <h2>netshare</h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <!-- Contact - A propos -->
            <div class="col-md-6" id="headbar-list">
                <form id="form-login" action="#" method="post">
                    <div class="col-md-4">
                        <div class="col-md-12"><input class="lp-input" id="frm_log_email" name="email" type="email" placeholder="Adresse e-mail"></div>
                        <div class="col-md-12 login-props"><a href=""><input class="lp-cb" type="checkbox" name="remember" value="cookie_verif"><span class="ml-1 lp-span">Rester connecter</span></a></div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12"><input class="lp-input" id="frm_log_pwd" name="pwd" type="password" placeholder="Mot de passe"></div>
                        <div class="col-md-12 login-props"><a href=""><span class="lp-span">Mot de passe oublié ?</span></a></div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 mt-1"><input class="button-props" name="submit" type="submit"></div>
                    </div>
                </form>
            </div>  
        </div>
    </section>