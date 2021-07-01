<form method="POST" name="reg-form" autocomplete="new-password">
<div class="authorization container">
    <ul class="data-list">
        <li class="reg-list"><input class="textarea" type="text" name="username" placeholder="Никнейм" pattern="[a-zA-z0-9]{3,}" required="true"></li>
        <li class="reg-list"><input class="textarea" type="password" name="password" placeholder="Пароль" required="true"></li>
        <li><input class="textarea" type="submit" name="login_btn" value="Войти"></li>
    </ul>
</div>
</form>
<?php 
    if(isset($_POST['login_btn'])){
        $x = new mysqli("localhost", "root", "", "r_w");
        $pass = $_POST['password'];
        $result = $x->query("select Login,Password,is_admin from user_data where Login like '{$_POST['username']}'");
        if ($data = $result->fetch_assoc()) {
            if($pass == $data['Password']){
                setcookie("login",$data['Login'], time()+60*60*24, "/");
                setcookie("admin",$data['is_admin'], time()+60*60*24, "/");
                header("Location: glavnoe_menu_logged.php");
            }
            else { echo "Введен неверный пароль";}
        } else { echo "Указанного пользователя не существует"; }
        $x->close();
    } 
?>