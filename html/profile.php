<?php
require_once($_SERVER['DOCUMENT_ROOT']."/App/paths.php");
require_once(ROOT_DIR."/App/User/Entity.php");
require_once(ROOT_DIR."/App/User/Repo.php");

if(empty($_GET["user_id"])){
   header("Location: /index.php");
   exit();
}
//Get user info
$userRepo = new UserRepository();
$profileUser = $userRepo->getById($_GET['user_id']);
if(empty($profileUser)){
    header("Location: /index.php");
    exit();
}

//Check if client is logged in
$loggedUser = false;
session_start();
if(isset($_SESSION['user'])){
    $loggedUser = $_SESSION['user'];
}

//Check if profile depends to current user
$editable = false;
if($loggedUser && $loggedUser->getId() === $profileUser->getId()){
    $editable = true;
}
?>
<!Doctype html>
<html lang="pl">
<head>
    <title>SoundRoulette - <?php echo $profileUser->getUsername();?></title>
    <link href="/css/profileStyles.css" rel="stylesheet">
</head>
<body>
    <header class="wrapper">
        <div class="profile-img"><img alt="avatar" class="avatar" src=<?php echo '"'.$profileUser->getProfileImageSrc().'"'; ?>></div>
        <div class="profile-name" style=""><h2 style="display:inline"><?php echo $profileUser->getUsername()?></h2>
            <?php
            if ($editable) echo "(zalogowany)";
            ?>
        </div>
    </header>
    <main class="wrapper">
        rodzaj konta: <?php echo $profileUser->getGroupPermission()->getName(); ?>
    </main>
</body>
</html>