<?= profileInfosEdit(); ?>
<?= profileAvatarEdit(); ?>
<?= profileBackgroundEdit(); ?>
<?= profileEmailPasswordEdit(); ?>
<?= profilePlaceTimeEdit(); ?>
<?= profileBlockEdit(); ?>

<section class="row mb-3">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
                <div class="col-md-12 panel panel-default pl-0 pr-0">
                    <div class="panel-body">
                        <span>Paramètres</span>
                    </div>
                    <div class="panel-footer col-md-12 pr-0 pl-0 st-spc-list">
                        <a href="">
                            <div class="col-md-12 mb-1">
                                <i class="fa fa-edit"></i><span class="ml-1 mr-1">Editer le profil</span>
                            </div>
                        </a>
                        <a href="">
                            <div class="col-md-12 mb-1">
                                <i class="fa fa-compass"></i><span class="ml-1 mr-1">Lieu</span>
                            </div>
                        </a>
                        <a href="">
                            <div class="col-md-12 mb-1">
                                <i class="fa fa-bookmark"></i><span class="ml-1 mr-1">Notifications</span>
                            </div>
                        </a>
                        <a href="">
                            <div class="col-md-12 mb-1">
                                <i class="fa fa-lock"></i><span class="ml-1 mr-1">Sécurité</span>
                            </div>
                        </a>
                        <a href="">
                            <div class="col-md-12 mb-1">
                                <i class="fa fa-video-camera"></i><span class="ml-1 mr-1">Vidéos et photos</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 panel panel-default profil-space pt-1">
                <div class="panel panel-default col-md-12">
                    <div class="panel-body col-md-12">
                        
                    </div>
                    <div class="row">
                        <div class="container">

                            <div class="col-md-7">
                                <div class="panel panel-default">
                                    <div class="panel-body" id="change-dat-pls">
                                        <span><b>Changer d'avatar / background</b></span>
                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="panel-body">
                                            <div class="col-md-12 text-center">
                                                <h3>Background</h3>
                                                <?= profileGetBackgroundUrl(); ?>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <h3>Avatar</h3>
                                                <?= profileGetAvatarUrl(); ?>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-file-image-o"></i></span>
                                                    <input style="width:100%;" type="file" name="avatar" id="avatar" class="form-control" aria-describedby="sizing-addon1">
                                                </div>
                                                <span style="color:red; border-left:20px;">
                                                    <?php if(isset($msg)){echo $msg;} ?>
                                                </span>
                                                <div class="input-group pt-2">
                                                    <button class="btn btn-default" id="change-avatar" type="submit" name="submit-avatar">Modifier son avatar</button>
                                                </div>                               
                                            </div>
                                        </div>
                                    </form>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-file-image-o"></i></span>
                                                    <input style="width:100%;" type="file" name="background" id="background" class="form-control" aria-describedby="sizing-addon1">
                                                </div>
                                                <span style="color:red; border-left:20px;">
                                                    <?php if(isset($msg)){echo $msg;} ?>
                                                </span>
                                                <div class="input-group pt-2">
                                                    <button class="btn btn-default" id="change-avatar" type="submit" name="submit-background">Modifier son background</button>
                                                </div>                               
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default col-md-5">
                                <form action="#" method="post">
                                    <div class="panel-body">
                                        <span><b>Edition du profil</b></span>
                                    </div>
                                    <?= profileEditWhile();?>                                
                                    <div class="input-group mt-1 mb-2">
                                        <button class="btn btn-default submit-change" type="submit" name="submit-edit" id="submit-edit">Modifier les informations</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-body pt-1">
                                        <span><b>Activer / Désactiver les notifications</b></span>
                                    </div>
                                    <div class="panel-body pb-1">
                                        <div class="col-md-12 ">
                                            <button class="btn btn-default" type="submit" name="submit-notifs" id="submit-notifs">Activer / Désactiver les notifications</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 pl-0">
                                <form action="" method="post" id="form-edit">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <span><b>Sécurité</b></span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <?= profileEmailPasswordWhile(); ?>
                                            <div class="input-group" style="color:red;" id="email_error_edit"></div>
                                            <div class="input-group" style="color:red;" id="password_error_edit"></div>
                                            <div class="input-group" style="color:red;" id="password_error_edit2"></div>
                                            <div class="input-group mb-1 mt-2">
                                                <button class="btn btn-default" type="submit" name="submit-security" id="submit-security">Changer les informations</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="panel">
                                <div class="col-md-6 pl-0">
                                    <form action="" method="post">
                                    <div class="panel panel-default">
                                        <div class="panel-header">
                                            <div class="col-md-12 pt-2 pb-2">
                                                <span><b>Lieu / Heure</b></span>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon1">Pays</span>
                                                    <?= profileActualCountry(); ?>
                                                <select style="width:100%;" type="type" name="country" class="form-control" placeholder="" aria-describedby="sizing-addon1">
                                                    <?= profileCountries(); ?>
                                                </select>
                                            </div>
                                            <div class="input-group mt-1">
                                                <span class="input-group-addon" id="sizing-addon1">Heure</span>                                                
                                                    <?= profileActualTimezone(); ?>
                                                <select style="width:100%;" type="type" name="timezone" class="form-control" placeholder="" aria-describedby="sizing-addon1">
                                                    <?= profileTimezones(); ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12 pl-0">
                                                <button class="btn btn-default submit-change mt-3 " type="submit" name="submit-placetime" id="submit-placetime">Modifier le lieu / l'heure</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-md-6 pl-0">
                                    <form action="" method="post">
                                    <div class="panel panel-default">
                                        <div class="panel-header">
                                            <div class="col-md-12 pt-2 pb-2">
                                                <span><b>Bloquer un ami</b></span>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="input-group mb-3">
                                                <span>Pour empêcher certaines personnes de voir vos photos et vidéos, veuillez les sélectionnez dans la liste ci-dessous, puis cliquez sur "Bloquer"</span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon1">Amis</span>
                                                <select style="width:100%;" type="type" class="form-control" placeholder="" aria-describedby="sizing-addon1">
                                                    <?= options_friendList(); ?>
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <div class="col-md-12 pl-0">
                                                <button class="btn btn-default submit-change mt-3 " type="submit" name="submit-blocked" id="submit-vidpic">Bloquer</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-md-2" id="apercu-comm">                
                <div class="col-md-12 panel panel-default p-0" id="footer">
                    <div class="panel-body col-md-12" id="footer-props">
                        <p>© 2017 netshare <a href="">À propos</a> <a href="">Aide</a> <a href="">Conditions Générales d'Utilisation</a> <a href="">Cookies</a> <a href="">Développeurs</a></p>
                    </div>
                </div>             
            </div>
        </div>
    </div>
</section>