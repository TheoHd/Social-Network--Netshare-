<?php
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*CORE FUNCTIONS /////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function redirect($destination){
	header("Location:index.php?p=".$destination);
}
function db_query($query){
	global $db;
	$statement = $db->query($query);
	return $statement;
}
function sql_check_error($statement){
	global $db;
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->exec($statement);
}
function sessionVerif($session){
	if(isset($_SESSION['connected'])){
		redirect("home");
	}
}
function sessionHomeVerif(){
	global $_SESSION;
	if(!isset($_SESSION['connected'])){
		redirect("register");
	}
}
function error_display($msg){
	echo $msg;	
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*FORM FUNCTIONS //////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function loginSubmit(){
	global $db;
	if (isset($_POST['submit'])) {
		extract($_POST);
		$pwd = sha1($pwd);
		$statement = $db->prepare("SELECT * FROM users WHERE email = ? AND pwd = ?");
		$statement->execute([$email, $pwd]);
		sql_check_error($statement);
		if ($action = $statement->fetch()) {
			$_SESSION['connected'] = true;
			$_SESSION['id_u'] = $action['id_u'];
			$_SESSION['username'] = $action['username'];
			$_SESSION['alias'] = $action['alias'];

			if (isset($_POST['remember']) && ($_POST['remember'] == "cookie_verif")) {
				setcookie('auth',$action['id_u']."-----".sha1($action['email'].$action['pwd']),time()+(3600*24*3),'/','localhost',false,true);
				//le dernier argument évite que le cookie soit éditable en javascript
			}
			header("Location:index.php?p=home");
		}
		if(isset($_COOKIE['auth']))
		{
			extract($_SERVER);
			extract($_COOKIE);
			// $auth = $_COOKIE['auth'];
			$auth = explode('-----',$auth);
			$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
			$statement->execute([$auth[0]]);
			$action = $statement->fetch();
			$key = sha1($email.$pwd.$REMOTE_ADDR);
			if ($key == $auth[1]) {
				$_SESSION['connecte'] = true;
				$_SESSION['id_u'] = $auth[0];
				setcookie('auth',$id_u."-----".sha1($email.$pwd.$REMOTE_ADDR),time()+(3600*24*3),'/','localhost',false,true);
			}
		}
	}
}
function registerSubmit(){
	global $db;
	if (isset($_POST['submit-form-register'])){
		extract($_POST);	
		$pwd = sha1($pwd);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$statement = $db->prepare('INSERT INTO users (email,surname,name,pwd) VALUES (?, ?, ?, ?)');
		$statement->execute([$email,$surname,$name,$pwd]);
		$q = $db->prepare('SELECT id_u, email, pwd FROM users WHERE email = :email');
		$q->bindValue(":email",$email,PDO::PARAM_STR);
		$q->execute();
		$data = $q->fetch(PDO::FETCH_OBJ);
		$q = $db->prepare('INSERT INTO friends (user_id1, user_id2, status) VALUES (?, ?, ?)');
		$q->execute([$data->id_u, $data->id_u, 2]);
		$db->exec($q,$statement);
		redirect("confirmation-inscription");
	}
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*HEADER FUNCTIONS ///////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function notifications(){
	global $db;
	$selfid = $_SESSION['id_u'];
	echo '<ul class="dropdown-menu ddp-props-options pl-1 pr-1" id="notif_ul">';
	$statement = $db->query("SELECT DISTINCT id_u,surname,name,avatar FROM users, friends WHERE
		friends.user_id2 = $selfid AND friends.user_id1 = users.id_u AND friends.status = '1'
		AND friends.user_id1 != friends.user_id2");
	while($action = $statement->fetch()){
	    echo 	'<li>
	    			<form method="post" action="">
		    			<div class="col-md-3">	    				
		    				<img style="width:40px;height:40px;"src="'.BASE_URL.$action['avatar'].'">
		    			</div>
		    			<div class="col-md-9">	    				
		    				<span style="color:white;">Demande d\'ajout d\'amis de '.$action['surname'].' '.$action['name'].'</span>
		    			</div>
		    			<input type="hidden" name="recup_id" value="'.$action['id_u'].'">
		    			<div class="col-md-12 text-center">	   
		    				<button class="btn btn_default" type="submit" name="accepter">Accepter</button>
							<button class="btn btn_default" type="submit name="refuser" >Refuser</button>
						</div>
					</form>
	    		</li>';
	}
    echo '</ul>';
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*FRIENDS FUNCTIONS //////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function home_friendList(){
	global $db;
	$selfid = $_SESSION['id_u'];
	$statement = $db->query("SELECT DISTINCT id_u,surname,name,avatar FROM users, friends WHERE 
		friends.user_id1 = $selfid AND friends.user_id2 = users.id_u AND friends.status = '2'
		AND friends.user_id1 != friends.user_id2 
		OR 
		friends.user_id2 = $selfid AND friends.user_id1 = users.id_u AND friends.status = '2'
		AND friends.user_id1 != friends.user_id2");
	while($action = $statement->fetch()){
		echo '<a href="index.php?p=extra-profile&user-id='.$action['id_u'].'">
                <div class="friends-space-infos col-md-12 mb-1">
                    <div class="col-md-4"><img src="'.BASE_URL.$action['avatar'].'" alt=""></div>
                    <div class="col-md-6 ">
                        <span class="ml-1 mr-1 align-middle">'.$action['name'].' '.$action['surname'].'</span>
                    </div>
                    <div class="col-md-2 "><i class="fa fa-circle "></i>
                    </div>                                
                </div>
            </a>';
	}	
}
function options_friendList(){
	global $db;
	$selfid = $_SESSION['id_u'];
	$statement = $db->query("SELECT DISTINCT surname,name FROM users, friends WHERE 
		friends.user_id1 = $selfid AND friends.user_id2 = users.id_u AND friends.status = '2'
		AND friends.user_id1 != friends.user_id2 
		OR 
		friends.user_id2 = $selfid AND friends.user_id1 = users.id_u AND friends.status = '2'
		AND friends.user_id1 != friends.user_id2");
	while($action = $statement->fetch()){
		echo '<option value="'.$action['surname'].'">'.$action['name'].'</option>';
	}
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*PAGINATION /////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function paginationHeader(){
	global $db;
	$elemParPage = 5;
	$commentsTotalReq = $db->query("SELECT * from comments");
	$commentsTotal = $commentsTotalReq->rowCount();
	$pagesTotales = ceil(($commentsTotal/$elemParPage) - 3);
	if(isset($_GET['elem']) AND !empty($_GET['elem']) AND $_GET['elem'] > 0 AND $_GET['elem'] <= $pagesTotales)
	{
		$_GET['elem'] = intval($_GET['elem']);
		$pageCourante = $_GET['elem'];
		}
	else{
		$pageCourante = 1;
	}

	$depart =($pageCourante-1)*$elemParPage;
}
function paginationFooter(){
	global $db;
	function footer(){
		for($i=1;$i<=$pagesTotales;$i++){
				if($i == $pageCourante){
					echo $i.' ';
				} elseif ($i == $pageCourante+1){
					echo '<a href="index.php?page='.$i.'" class="suivant">'.$i.'</a> ';
				} else {
					echo '<a href="index.php?page='.$i.'">'.$i.'</a> ';
				}
			}
	}
	echo'<div id="pagination">'.footer().'</div>';
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*HOME SPACE /////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function homeNewsList(){
	global $db;
	$statement = db_query("SELECT * FROM comments ORDER BY rand()");
	while($action = $statement->fetch()){
		echo '<div class="panel panel-default col-md-12 pl-1 pr-1 pt-1 link-actu-props">
                            <a href="">
                            <div class="col-md-12 apercu-comm-spr-infos pl-0 pr-0">
                                <div class="col-md-12 pl-0 pr-0">                                    
                                    <div class="col-md-4"><img class="apercu-comm-spr-img bdr-black" src="'.BASE_URL.$action['avatar_com'].'" alt=""></div>
                                    <div class="col-md-6 col-md-offset-1"><a class="tc-black" href="">'.$action['auteur_com'].'</a></div>
                                    <div class="col-md-6 col-md-offset-1 tc-dgrey">'.$action['alias_auteur_com'].'</div>                                 
                                    <div class="col-md-7 col-md-offset-1 actu-tstamp pr-0"><p class="mb-0">'.$action['date_com'].'</p></div>
                                </div>
                                <div class="col-md-12 pl-0 pr-0">
                                    <div class="col-md-12">
                                        <p class="mb-0 mt-1">'.$action['content_com'].'</p>
                                    </div>
                                    <div class="col-md-12 mb-1 mt-1 actu-buttons">
                                        <div class="col-md-3"><a href=""><i class="fa fa-reply"></i></a></div>
                                        <div class="col-md-3"><a href=""><i class="fa fa-share-alt"></i></a></div>
                                        <div class="col-md-3"><a href=""><i class="fa fa-heart"></i></a></div>
                                        <div class="col-md-3"><a href=""><i class="fa fa-navicon"></i></a></div>                                        
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>';
	}
}
function homeCommentList(){
	global $db;
	$statement = db_query("SELECT * FROM comments ORDER BY date_com DESC");
	while($action = $statement->fetch()){
	echo '	<div class="col-md-12 panel panel-default mb-0 esp-post-mods">
			<div class="col-md-1 mt-1">
                <img style="width:69px;height:69px;border-radius:3px;" src="'.BASE_URL.$action['avatar_com'].'">    
            </div>
            <div class="col-md-8 mt-1">
                <p class="mt-half mb-0"><b>'.$action['auteur_com'].'</b><a href=""> '.$action['alias_auteur_com'].'</a></p>    
            </div>
            <div class="col-md-8">
                <p class="mb-0"><b>'.$action['title_com'].'</b> <br> <span>'.$action['date_com'].'</span></p>
            </div>
             <div class="col-md-12">
                <p>'.$action['content_com'].'</p>
            </div>
            <div class="col-md-3 mb-1">
                <div class="col-md-3 pl-0 "><a href=""><i class="fa fa-reply"></i></a></div>
                <div class="col-md-3 pl-0"><a href=""><i class="fa fa-heart"></i></a></div>                                  
            </div>
        </div> ';
	}

}
function homeSendComment(){
	global $db;
	if (isset($_POST['send-comment'])) {
		extract($_POST);
		$statement = $db->prepare("INSERT INTO comments(auteur_com, alias_auteur_com, title_com, content_com) VALUES (?, ?, ?, ?)");
		$statement->execute([$_SESSION['username'], $_SESSION['alias'], $title_com, $content_com]);
	}
}
function homeGetAvatar(){
	global $db;
	$statement = db_query("SELECT * FROM users WHERE id_u =". $_SESSION['id_u']);
	$action = $statement->fetch();
	echo '<div class="profil-space-infos-avatar m-2 bdr-black"><img src="'.BASE_URL.$action['avatar'].'" alt=""></div>';
}
function homeGetBackground(){
	global $db;
	$statement = db_query("SELECT * FROM users WHERE id_u =". $_SESSION['id_u']);
	$action = $statement->fetch();
	echo '<img src="'.BASE_URL.$action['background'].'" alt="">';
}
function homeGetDisplayName(){
	global $db;
	$statement = db_query("SELECT * FROM users WHERE id_u =". $_SESSION['id_u']);
	$action = $statement->fetch();
	echo $action['name'].' '.$action['surname'];
}
function addFriend(){
	global $db;
	if(isset($_POST['add_friend'])){
		extract($_POST);
		function update_it($variable,$name){
			global $db;
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$statement1 = $db->prepare("SELECT * FROM users WHERE surname LIKE ? OR name LIKE ?");
			$statement1->execute([$variable, $variable]);
			$action = $statement1->fetch();
			$statement = $db->prepare('INSERT INTO friends (user_id1, user_id2, status) VALUES (?, ?, ?)');
			$statement->execute([$_SESSION['id_u'], $action['id_u'], '1']);
			/*$db->exec("SELECT * FROM users WHERE surname LIKE ? OR name LIKE ?");
			$db->exec('INSERT INTO friends (user_id1, user_id2, status) VALUES ('.$_SESSION['id_u'].', '.$action['id_u'].', 1)');*/
		}
		if(isset($user_real_name) && !empty($user_real_name)){
			update_it($user_real_name,'user_real_name');
		}
	}
}
function acceptFriend(){
	global $db;
	if(isset($_POST['accepter'])){
		extract($_POST);
		function update_it($variable,$name){
			global $db;
			$selfid = $_SESSION['id_u'];
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			/*$statement1 = $db->query("SELECT user_id1 FROM friends WHERE user_id1 = ?");*/
			$statement = $db->prepare('UPDATE friends SET status = "2" WHERE user_id1 = ? AND user_id2 = ? AND status = ?');
			$statement->execute([$variable,$selfid,'1']);
			$db->exec('UPDATE friends SET status = "2" WHERE user_id1 = '.$variable.' AND user_id2 = '.$selfid.' AND status = "1"');
		}
		if(isset($recup_id) && !empty($recup_id)){
			update_it($recup_id,'recup_id');
		}
	}
}
function refuseFriend(){
	global $db;
	if(isset($_POST['refuser'])){
		extract($_POST);
		function update_it($variable,$name){
			global $db;
			$selfid = $_SESSION['id_u'];
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			/*$statement1 = $db->query("SELECT user_id1 FROM friends WHERE user_id1 = ?");*/
			$statement = $db->prepare('UPDATE friends SET status = 2 WHERE user_id1 = ? AND user_id2 = ? AND status = ?');
			$statement->execute([$variable,$selfid,'0']);
			$db->exec('UPDATE friends SET status = 2 WHERE user_id1 = ? AND user_id2 = ? AND status = ?');
		}
		if(isset($recup_id) && !empty($recup_id)){
			update_it($recup_id,'recup_id');
		}
	}
}
function deleteFriend(){
	global $db;
	if(isset($_POST['delete'])){
		extract($_POST);
		function update_it($variable,$name){
			global $db;
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$statement = $db->prepare('UPDATE friends SET status = 0 WHERE 
				user_id1 = ? AND user_id2 = ? AND status = ? AND user_id1 != user_id2 
				OR 
				user_id1 = ? AND user_id2 = ? AND status = ? AND user_id1 != user_id2');
			$statement->execute([$variable,$_SESSION['id_u'],'2',$_SESSION['id_u'],$variable,'2']);
		}
		if(isset($userid) && !empty($userid)){
			update_it($userid,'userid');
		}
	}
}
function blockFriend(){
	global $db;
	if(isset($_POST['block'])){
		extract($_POST);
		function update_it($variable,$name){
			global $db;
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$statement = $db->prepare('UPDATE friends SET status = 3 WHERE 
				user_id1 = ? AND user_id2 = ? AND status = ? AND user_id1 != user_id2 
				OR 
				user_id1 = ? AND user_id2 = ? AND status = ? AND user_id1 != user_id2');
			$statement->execute([$variable,$_SESSION['id_u'],'2',$_SESSION['id_u'],$variable,'2']);
		}
		if(isset($userid) && !empty($userid)){
			update_it($userid,'userid');
		}
	}
}
function formDeleteFriendButton(){
	global $db;
	if(isset($_GET['user-id'])){
		$statement = $db->prepare('SELECT * FROM friends WHERE user_id1 = ? AND user_id2 = ? AND status = ?');
		$statement->execute([$_GET['user-id'],$_SESSION['id_u'],'2']);
		$lel = $statement->rowCount();
		if($lel != 0){
			echo '<form action="" method="post">
		            	<input class="hidden" name="selfid" value="'.$_SESSION['id_u'].'" type="hidden">
		            	<input class="hidden" name="userid" value="'.$_GET['user-id'].'" type="hidden">
		            	<button type="submit" name="delete" class="btn btn-default">Supprimer</button>
		            </form>
		            <br>
		            <form action="" method="post">
		            	<input class="hidden" name="selfid" value="'.$_SESSION['id_u'].'" type="hidden">
		            	<input class="hidden" name="userid" value="'.$_GET['user-id'].'" type="hidden">
		            	<button type="submit" name="block" class="btn btn-default">Bloquer</button>
		            </form>';
		}
	}
}
function redirectIfBlocked(){

}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*PROFILE OPTIONS SPACE //////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function profileInfosEdit(){
	global $db;
	if(isset($_POST['submit-edit']) && $_SESSION['connected']){
		extract($_POST);
		function update_it($variable,$name){
			global $db;
			$statement = $db->prepare('UPDATE users SET '.$name.' = ? WHERE id_u = '.$_SESSION['id_u']);
			$statement->execute([$variable]);
		}
		if(isset($username) && !empty($username)){
			update_it($username,'username');
		}
		if(isset($alias) && !empty($alias)){
			update_it($alias,'alias');
		}
		if(isset($surname) && !empty($surname)){
			update_it($surname,'surname');
		}
		if(isset($name) && !empty($name)){
			update_it($name,'name');
		}
		if(isset($birthday) && !empty($birthday)){
			update_it($birthday,'birthday');
		}
		if(isset($adress) && !empty($adress)){
			update_it($adress,'adress');
		}
		if(isset($zip) && !empty($zip)){
			update_it($zip,'zip');
		}
		if(isset($city) && !empty($city)){
			update_it($city,'city');
		}
	}	
}
function profileAjouterImageEdit(){
	global $db;
	if(isset($_POST['image'])){
		$way = ROOT.'\images\albums\\'.$_FILES['image']['name'];
		$waydb = '\images\albums\\'.$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $way);
		$sendImage = $db->prepare('INSERT INTO photos (url_p,id_u) VALUES (? , ?) ');
		$sendImage->execute([$waydb,$_SESSION['id_u']]);
	}
}
function profileAvatarEdit(){
	global $db;
	if(isset($_POST['submit-avatar'])){
		$way = ROOT.'\images\members\avatars\\'.$_FILES['avatar']['name'];
		$waydb = '\images\members\avatars\\'.$_FILES['avatar']['name'];
		move_uploaded_file($_FILES['avatar']['tmp_name'], $way);
		$updateAvatar = $db->prepare('UPDATE users SET avatar = ? WHERE id_u = '.$_SESSION['id_u']);
		$updateAvatar->execute([$waydb]);
	}
}
function profileBackgroundEdit(){
	global $db;
	if(isset($_POST['submit-background'])){
		$way = ROOT.'\images\members\backgrounds\\'.$_FILES['background']['name'];
		$waydb = '\images\members\backgrounds\\'.$_FILES['background']['name'];
		move_uploaded_file($_FILES['background']['tmp_name'], $way);
		$updateBackground = $db->prepare('UPDATE users SET background = ? WHERE id_u = '.$_SESSION['id_u']);
		$updateBackground->execute([$waydb]);
	}
}
function profileEmailPasswordEdit(){
	global $db;
	if(isset($_POST['submit-security'])){
		extract($_POST);
		function update_it($variable,$name){
			global $db;
			$statement = $db->prepare('UPDATE users SET '.$name.' = ? WHERE id_u = '.$_SESSION['id_u']);
			$statement->execute([$variable]);
		}
		if(isset($email) && !empty($email)){
			update_it($email,'email');
		}
		if(isset($password) && !empty($password)){
			update_it($password,'password');
		}
	}
}
function profilePlaceTimeEdit(){
	global $db;
	if(isset($_POST['submit-placetime'])){
		extract($_POST);
		function update_it($variable,$name){
			global $db;
			$statement = $db->prepare('UPDATE users SET '.$name.' = ? WHERE id_u = '.$_SESSION['id_u']);
			$statement->execute([$variable]);
		}
		if(isset($timezone) && !empty($timezone)){
			update_it($timezone,'timezone');
		}
		if(isset($country) && !empty($country)){
			update_it($country,'country');
		}
	}
}
function profileBlockEdit(){

}
function profileEditWhile(){
	$statement = db_query("SELECT * FROM users WHERE id_u =". $_SESSION['id_u']);
	while($action = $statement->fetch()){
		echo '
		<div class="col-md-12 ps-private-infos pl-0 pr-0">
            <ul class="mt-2 mb-2 pl-0">
            	<li>
                    <div class="input-group mt-1">
                        <span style="width:150px;" class="input-group-addon" id="sizing-addon1">Nom d\'utilisateur</span>
                        <input style="width:100%;" type="text" name="username" class="form-control" placeholder="'.$action['username'].'" aria-describedby="sizing-addon1">
                    </div>
                </li>
                <li>
                    <div class="input-group mt-1">
                        <span style="width:150px;" class="input-group-addon" id="sizing-addon1">Alias</span>
                        <input style="width:100%;" type="text" name="alias" class="form-control" placeholder="'.$action['alias'].'" aria-describedby="sizing-addon1">
                    </div>
                </li>
                <li>
                    <div class="input-group mt-1">
                        <span style="width:150px;" class="input-group-addon" id="sizing-addon1">Nom</span>
                        <input style="width:100%;" type="text" name="surname" class="form-control" placeholder="'.$action['surname'].'" aria-describedby="sizing-addon1">
                    </div>
                </li>
                <li>
                    <div class="input-group mt-1">
                        <span style="width:150px;" class="input-group-addon" id="sizing-addon2">Prénom</span>
                        <input style="width:100%;" type="text" name="name" class="form-control" placeholder="'.$action['name'].'" aria-describedby="sizing-addon2">
                    </div>
                </li>
                <li>
                    <div class="input-group mt-1">
                        <span style="width:150px;" class="input-group-addon" id="sizing-addon1">Date de naissance</span>
                        <input style="width:100%;" value="'.$action['birthday'].'" type="date" name="birthday" class="form-control" aria-describedby="sizing-addon1">
                    </div>
                </li>
                <li>
                    <div class="input-group mt-1">
                        <span style="width:150px;" class="input-group-addon" id="sizing-addon1">Adresse</span>
                        <input style="width:100%;" type="text" name="adress" class="form-control" placeholder="'.$action['adress'].'" aria-describedby="sizing-addon1">
                    </div>
                </li>
                <li>
                    <div class="input-group mt-1">
                        <span style="width:150px;" class="input-group-addon" id="sizing-addon1">Code Postal</span>
                        <input style="width:100%;" type="text" name="zip" class="form-control" placeholder="'.$action['zip'].'" aria-describedby="sizing-addon1">
                    </div>
                </li>
                <li>
                    <div class="input-group mt-1">
                        <span style="width:150px;" class="input-group-addon" id="sizing-addon1">Ville</span>
                        <input style="width:100%;" type="text" name="city" class="form-control" placeholder="'.$action['city'].'" aria-describedby="sizing-addon1">
                    </div>
                </li>
            </ul>
        </div>';
	}
}
function profileEmailPasswordWhile(){
	$statement = db_query("SELECT * FROM users WHERE id_u =". $_SESSION['id_u']);
	while($action = $statement->fetch()){
		echo '<div class="input-group">
	            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope"></i></span>
	            <input style="width:100%;" name="email" id="email-edit" type="type" class="form-control" placeholder="'.$action['email'].'" aria-describedby="sizing-addon1">
	        </div>
	        <div class="input-group mt-1">
	            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
	            <input style="width:100%;" name="password" id="password-edit1" type="password" class="form-control" placeholder="Mot de passe" aria-describedby="sizing-addon1">
	            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
	            <input style="width:100%;" name="password-confirm" id="password-edit2" type="password" class="form-control" placeholder="Confirmer le mot de passe" aria-describedby="sizing-addon1">
	        </div>';
    }
}
function profileGetBackgroundUrl(){
	global $db, $_SESSION;
	$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
	$statement->execute([$_SESSION['id_u']]);
	while($action = $statement->fetch()){
		echo '<img id="edit-profile-background" src="'.BASE_URL.$action['background'].'" alt="">';
	}
}
function profileGetAvatarUrl(){
	global $db, $_SESSION;
	$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
	$statement->execute([$_SESSION['id_u']]);
	while($action = $statement->fetch()){
		echo '<img id="edit-profile-avatar" src="'.BASE_URL.$action['avatar'].'" alt="">';
	}
}
function profileRealGetBackgroundUrl(){
	global $db, $_SESSION;
	$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
	$statement->execute([$_SESSION['id_u']]);
	while($action = $statement->fetch()){
		echo ' <img align="left" style="height:10%;" class="fb-image-lg" src="'.BASE_URL.$action['background'].'" alt="Profile image example" />';
	}
}
function profileRealGetAvatarUrl(){
	global $db, $_SESSION;
	$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
	$statement->execute([$_SESSION['id_u']]);
	while($action = $statement->fetch()){
		echo ' <img align="left" class="fb-image-profile thumbnail" src="'.BASE_URL.$action['avatar'].'" alt="Profile image example" />';
	}
}
function profileActualCountry(){
	global $db, $_SESSION;
	$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
	$statement->execute([$_SESSION['id_u']]);
	while($action = $statement->fetch()){
		echo '<input style="width:100%;" type="text" value="'.$action['country'].'" disabled placeholder="Aucune ville choisie" class="form-control" aria-describedby="sizing-addon1">';
	}
}
function profileActualTimezone(){
	global $db, $_SESSION;
	$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
	$statement->execute([$_SESSION['id_u']]);
	while($action = $statement->fetch()){
		echo '<input style="width:100%;" type="text" value="(GMT'.$action['timezone'].':00)" disabled placeholder="Aucun fuseau horaire choisi" class="form-control" aria-describedby="sizing-addon1">';
	}
}
function profileCountries(){
	$statement = db_query("SELECT * FROM countries");
	while($action = $statement->fetch()){
		echo '<option value="'.$action['name_country'].'">'.$action['name_country'].'</option>';
	}
}
function profileTimezones(){
	$statement = db_query("SELECT * FROM timezones,users");
	while($action = $statement->fetch()){
		echo '<option timeZoneId="'.$action['id_tz'].'" gmtAdjustment="'.$action['gmt_adj_tz'].'" useDaylightTime="'.$action['use_daylighttime_tz'].'" default="'.$action['timezone'].'" value="'.$action['value'].'">('.$action['gmt_adj_tz'].') '.$action['name_tz'].'</option>';
	}		
}
function profileRealGetGallery(){
	global $db;
	$statement = $db->prepare("SELECT * FROM photos WHERE id_u = ?");
	$statement->execute([$_SESSION['id_u']]);
	while($action = $statement->fetch()){
		echo '<div class="col-lg-3 col-sm-4 col-xs-6">
                    <a title="Image '.$action['id_p'].'" href="#"><img class="thumbnail img-responsive" style="width:600px;height:240px;" src="'.BASE_URL.$action['url_p'].'"></a>
                </div>';
	}
	echo '<div class="col-lg-3 col-sm-4 col-xs-6">
                    <a title="Image 1" href="index.php?p=ajouter-image"><img class="thumbnail img-responsive" style="width:600px;height:240px;" src="/Main/etude_Netshare\images\albums\add_img.jpg"></a>
                </div>';
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*PROFILE OPTIONS SPACE //////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function galleryRealGetGallery(){
	global $db;
	$statement = $db->prepare("SELECT * FROM photos WHERE id_u = ?");
	$statement->execute([$_SESSION['id_u']]);
	while($action = $statement->fetch()){
		echo '<div class="col-lg-3 col-sm-4 col-xs-6">
                    <a title="Image '.$action['id_p'].'" href="#"><img class="thumbnail img-responsive" style="width:600px;height:240px;" src="'.BASE_URL.$action['url_p'].'"></a>
                </div>';
	}
	echo '<div class="col-lg-3 col-sm-4 col-xs-6">
                    <a title="Image 1" href="index.php?p=gallery"><img class="thumbnail img-responsive" style="width:600px;height:240px;" src="/Main/etude_Netshare\images\albums\add_img.jpg"></a>
                </div>';
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*PROFILE OPTIONS SPACE //////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function extraRealGetBackgroundUrl(){
	global $db;
	if(isset($_GET['user-id'])){
		$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
		$statement->execute([$_GET['user-id']]);
		while($action = $statement->fetch()){
			echo ' <img align="left" class="fb-image-lg" src="'.BASE_URL.$action['background'].'" alt="Profile image example" />';
		}
	}
}
function extraRealGetAvatarUrl(){
	global $db;
	if(isset($_GET['user-id'])){
		$statement = $db->prepare("SELECT * FROM users WHERE id_u = ?");
		$statement->execute([$_GET['user-id']]);
		while($action = $statement->fetch()){
			echo '<img class="fb-image-profile thumbnail" id="edit-profile-avatar" src="'.BASE_URL.$action['avatar'].'" alt="">';
		}
	}
}
function extraGetDisplayName(){
	global $db;
	if(isset($_GET['user-id'])){
		$statement = db_query("SELECT * FROM users WHERE id_u =". $_GET['user-id']);
		$action = $statement->fetch();
		echo $action['name'].' '.$action['surname'];
	}
}
function extraRealGetGallery(){
	global $db;
	if(isset($_GET['user-id'])){
		$statement = $db->prepare("SELECT * FROM photos WHERE id_u = ?");
		$statement->execute([$_GET['user-id']]);
		while($action = $statement->fetch()){
			echo '<div class="col-lg-3 col-sm-4 col-xs-6">
                    <a title="Image '.$action['id_p'].'" href="#"><img class="thumbnail img-responsive" style="width:600px;height:240px;" src="'.BASE_URL.$action['url_p'].'"></a>
                </div>';
		}
		echo '<div class="col-lg-3 col-sm-4 col-xs-6">
                    <a title="Image 1" href="index.php?p=ajouter-image"><img class="thumbnail img-responsive" style="width:600px;height:240px;" src="/Main/etude_Netshare\images\albums\add_img.jpg"></a>
                </div>';
	}
}
