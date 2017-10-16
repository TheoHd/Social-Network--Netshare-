<?= sessionHomeVerif(); ?>
<?= homeSendComment(); ?>
<?= addFriend(); ?>

<section class="row mb-3">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
                <div class="col-md-12 panel panel-default friends-space pl-0 pr-0">
                    <div class="panel-body">
                        <span>Liste d'amis</span> 
                        <span>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-plus-square-o"></i>
                                <span>Ajouter un ami</span>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <form action="" class="text-center" method="post">
                                    <label for="user_real_name">Nom de l'utilisateur</label>
                                    <input class="mt-1" name="user_real_name" id="search-user" autocomplete="off" type="text"><br>
                                    <input class="result text-left" name="friend_found" style="border:1px solid grey; color:grey;" id="result" disabled>
                                    <button type="submit" class="btn btn-default mt-2" name="add_friend">Envoyer une invitation !</button>
                                </form>
                              </li>
                            </ul>
                        </span>
                    </div>
                    <div class="panel-footer col-md-12 pr-0 pl-0 fd-spc-list">
                        <?= home_FriendList(); ?>
                    </div>
                </div>
            </div>            
            <div class="col-md-8 panel panel-default profil-space pt-2">
                <div class="col-md-12 profil-space-real mb-3 ">
                    <div style="height:400px;overflow:hidden;">
                    <?= homeGetBackground(); ?>
                    </div>
                    <div class="profil-space-infos bgc-blue">
                        <?= homeGetAvatar(); ?>
                        
                        <div class="profil-space-infos-nomprenom ">
                            <p><?= homeGetDisplayName(); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pr-0 pl-0">
                    <form class="col-md-12 pr-0 pl-0 mt-1" action="" method="post">
                        <div class="panel panel-default br-0 comm-panel-mods mb-0">
                            <div class="panel-body mt-half mb-half pt-0 pb-0">
                                <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon1">Titre</span>
                                  <input type="text" name="title_com" class="form-control" aria-describedby="sizing-addon1">
                                </div>
                            </div>
                            <div class="panel-footer text-center" id="comm-space">
                                <textarea name="content_com" id="commentaire"></textarea>
                            </div>
                            <div class="panel-footer" id="comm-props">
                                <div class="pull-left ml-2">
                                	<a href=""><i class="fa fa-smile-o" id="commentaire-emoticone"></i></a>
                                	<a href=""><i class="fa fa-file-image-o ml-2" id="commentaire-image"></i></a>
                                </div>
                                <div class="pull-right">
                                	<button class="btn" type="submit" name="send-comment" id="btn-sd-comm"><i class="fa fa-send" id="commentaire-send"></i>
                                	<span>Envoyer</span></button>
                            	</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 espace-posts-main">
                    <div class="col-md-12 panel panel-default" id="espace-posts">
                        <div class="col-md-12 panel-body epc pl-0 pr-0 pb-0" id="espace-posts-child">
                            <?= homeCommentList(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2" id="apercu-comm">
                <div class="col-md-12 panel panel-default p-0">
                    <div class="panel-body col-md-12">
                        <span>Fil d'actualité</span>
                    </div>
                    <div class="col-md-12 panel-footer apercu-comm-spr">
                        <?= homeNewsList(); ?>
                    </div>
                </div>
                <div class="col-md-12 panel panel-default p-0" id="footer">
                    <div class="panel-body col-md-12" id="footer-props">
                        <p>© 2017 netshare <a href="">À propos</a> <a href="">Aide</a> <a href="">Conditions Générales d'Utilisation</a> <a href="">Cookies</a> <a href="">Développeurs</a></p>
                    </div>
                </div>             
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'commentaire' );
    </script>
</section>