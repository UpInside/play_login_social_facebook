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
        if (1 == 1) {
            echo "<div class='logged_content'>";
            echo "<div class='logged_content_img'>";
            echo "<img src='IMAGEM' width='100' height='100' class='user_thumb'>";
            echo "</div>";
            echo "<div class='logged_content_data'>";
            echo "<h1>Seja bem-vindo(a) NOME COMPLETO</h1>";
            echo "<p>Seu e-mail de cadastro: EMAIL</p>";
            echo "<p>Seu Facebook ID: ID</p>";
            echo "<p class='logged_content_data_actions'><button class='icon-exit'>Deslogar conta!</button></p>";
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
</body>
</html><?php
ob_end_flush();