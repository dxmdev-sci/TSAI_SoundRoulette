<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/App/paths.php");
require_once(ROOT_DIR . "/App/User/Repo.php");
require_once(ROOT_DIR . "/App/User/Entity.php");

if(!empty($_POST['usr']) && !empty($_POST['pwd'])){
    $userRepo = new UserRepository();
    $user = $userRepo->login($_POST['usr'], $_POST['pwd']);
    if($user !== false){
        $_SESSION['user'] = $user;
        //TODO move to home page
        header("Location: profile.php?user_id=".$user->getId());
        exit();
    }
    else{
        echo "wrong password or username";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <link href="/css/loginStyles.css" rel="stylesheet">
    <title>Sound Roulette - logon</title>
</head>
<body>
<h1>Log in to SoundRoulette</h1>
<hr>
    <main>

        <form method="POST" action="login.php">
            <label>
                <input type="text" name="usr" placeholder="username">
            </label>
            <br><div style="padding-top: 0.2em"></div>
            <label>
                <input type="password" name="pwd" placeholder="password">
            </label><br><br>
            <button type="submit">Log in</button>
        </form>
    </main>
</body>
</html>