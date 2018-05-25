<?php
ob_start();
session_start();
?><!DOCTYPE>
<html>
<head>
    <title>Login Social</title>
</head>
<link href="_cdn/css/fonticon.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">
<link href="_cdn/css/style.css" rel="stylesheet">
<body>

<div class="box">
    <div class="box_content">

        <?php
        if (!empty($_SESSION['login']) && $_SESSION['login'] == true) {
            echo "<div class='logged_content'>";
            echo "<div class='logged_content_img'>";
            echo "<img src='{$_SESSION['user_thumb']}' width='100' height='100' class='user_thumb'>";
            echo "</div>";
            echo "<div class='logged_content_data'>";
            echo "<h1>Seja bem-vindo(a) {$_SESSION['first_name']} {$_SESSION['last_name']}</h1>";
            echo "<p>Seu e-mail de cadastro: {$_SESSION['email']}</p>";
            echo "<p>Seu Facebook ID: {$_SESSION['user_id_fb']}</p>";
            echo "<p class='logged_content_data_actions'><button class='btn_logout_facebook icon-exit'>Deslogar conta!</button></p>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='login_content'>";
            echo "<h1>Login Social - Facebook</h1>";
            echo "<button class='btn_login_facebook icon-facebook'>Continuar com Facebook</button>";
            echo "<div>";
        }
        ?>

    </div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

    $(function () {

        $('.btn_login_facebook').click(function () {

            FB.login(function (response) {

                if (response.authResponse) {
                    FB.api('me?fields=id,name,email,first_name,last_name', function (response) {

                        $.post('controllerAjax.php', {
                            callback: 'Login', callback_action: 'login_facebook',
                            user_id_fb: response.id,
                            first_name: response.first_name,
                            last_name: response.last_name,
                            email: response.email
                        });
                        location.reload();
                    });
                }
            }, {scope: 'public_profile,email'});

        });

        $('.btn_logout_facebook').click(function(){

            FB.logout(function(response) {
                $.post('controllerAjax.php', {callback: 'Login', callback_action: 'logout'});
                location.reload();
            });
        });
    });

</script>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '{SEU-APP-ID}',
            cookie: true,
            xfbml: true,
            version: '{CODIGO-DA-VERSAO}'
        });

        FB.AppEvents.logPageView();

        FB.getLoginStatus(function (response) {});

    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version={CODIGO-DA-VERSAO}&appId={SEU-APP-ID}&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html><?php
ob_end_flush();