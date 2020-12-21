<?php
if(!empty($_POST['pass'])){
    echo password_hash($_POST['pass'], PASSWORD_ARGON2I);
}?>
<html>
    <form method="POST" action="passwordgen.php">
        <input type="password" name="pass">
        <input type="submit">
    </form>
</html>