<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Instituto Educativo Ficticio</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.esm.min.js">

    <script src="https://www.google.com/recaptcha/api.js?render=6Lfm9DAlAAAAAJOn8NA1LPT_oaXNVkePPQFk5i9K"></script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('clave-del-sitio', {action: 'formulario_registro'}).then(function(token) {
        document.getElementById('recaptchaResponse').value = token;
        });
    });
    </script>


    
</head>

<body>
    <?php
    include "config.php";
    include 'views/header.php';
    ?>
</body>

</html>