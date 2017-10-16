<?= deleteFriend(); ?>
<?= blockFriend(); ?>
<section class="profile">
    <div class="row">
        <div class="container">
            <div class="fb-profile">
                <div class="fb-profile-container container ">
                    <div class="col-md-12" style="background-color: #3498DB; padding-right: 0; padding-left: 0;">
                        <?php extraRealGetBackgroundUrl(); ?>
                        <?php extraRealGetAvatarUrl(); ?>
                    </div>
                    <div class="col-md-12" style="background-color: #3498DB;">
                        <div class="fb-profile-text" style="padding-bottom: 40px;">
                            <h1 style="padding-left: 30px; color:white;"><?= extraGetDisplayName();?></h1>
                        </div>
                        <div class="fb-profile-text" style="padding-bottom: 40px;">
                             <?= formDeleteFriendButton(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <section class="gallery mt-3">
            <div class="container mt-3">
                <div class="row mt-3">
                    <?php extraRealGetGallery(); ?>
                    <hr>
                    <hr>
                </div>
            </div>
            <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal">×</button>
                            <h3 class="modal-title">Heading</h3>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
