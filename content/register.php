<?= sessionVerif($_SESSION); ?>
<?= registerSubmit(); ?>

<section class="row login-section inscription-color">
<div class="container">
    <div class="container">
    <div class="col-md-6">
         <div class="panel-body">
            <form id="signupform" name="signupform" class="form-horizontal signupform" method="post" action="#" role="form">
                <div class="form-group ml-3">
                    <div class="col-md-6">
                        <h1 class="title-mods">Inscription</h1>
                    </div>
                </div>
                <div class="form-group ml-3">
                    
                    <div class="col-md-7">
                        <input type="text" id="form_email" class="form-control lp-input-signup" name="email" placeholder="Adresse e-mail">                        
                    </div>
                    <div class="col-md-3">
                        <span class="error_message" id="email_error_message"></span>
                    </div>
                </div>
                <div class="form-group ml-3">
                    <div class="col-md-7">
                        <input type="text" id="form_surname" class="form-control lp-input-signup" name="surname" placeholder="Nom">                        
                    </div>
                    <span class="error_message" id="surname_error_message"></span>
                </div>
                <div class="form-group ml-3">
                    <div class="col-md-7">
                        <input type="text" id="form_name" class="form-control lp-input-signup" name="name" placeholder="Prénom">                        
                    </div>
                    <span class="error_message" id="name_error_message"></span>
                </div>
                <div class="form-group ml-3">
                    <div class="col-md-7">
                        <input type="password" id="form_password" class="form-control lp-input-signup" name="pwd" placeholder="Mot de passe">                        
                    </div>
                    <div class="col-md-3">
                        <span class="error_message" id="password_error_message"></span>
                    </div>
                </div>
                <div class="form-group ml-3">
                    <div class="col-md-7">
                        <input type="password" id="form_retype_password" class="form-control lp-input-signup" name="pwd2" placeholder="Confirmation du mot de passe">                        
                    </div>
                    <div class="col-md-3">
                        <span class="error_message" id="retype_password_error_message"></span>
                    </div>
                </div>
                <div class="form-group ml-3 btn-div-register">
                    <div class="col-md-10 text-center btn-register">
                        <button id="btn-netshare" type="submit" name="submit-form-register" class="btn btn-primary btn-netshare"><i class="icon-facebook"></i>S'inscrire</button>
                    </div>
                </div>
            </form>
        </div>
        
        </div>
        <div class="col-md-6 pl-0 register-map">
            <span><h1 class="title-mods">Rejoignez la communauté, partout dans le monde</h1></span>
            <img src="images/register/register-map.png" alt="">
        </div>
    </div>
</div>
</section>
<div class="error-log" id="error_log_email"></div>
<div class="error-log" id="error_log_pwd"></div>