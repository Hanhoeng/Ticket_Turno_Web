<!DOCTYPE html>
<html>

<head>
    <?php include_once "inclusiones/meta_tags.php"; ?>
    <title>Registro de aspirantes</title>
    <?php include_once "inclusiones/css_y_favicon.php"; ?>
    <link rel="stylesheet" href="css/index_estilos.css">
</head>

<body id="LoginForm">
    <!-- Menu Principal -->
    <div class="container" style="margin-top:50px;">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Admin Login</h2>
                    <p>Please enter your user and password</p>
                </div>
                <!-- Formulario -->
                <form id="Login" method="post" action="login_attempt.php" onsubmit="return valida_login()" ;>
                    <!-- Usuario -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="f_user" name="f_user" placeholder="User">
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <input type="password" class="form-control" id="f_pwd" name="f_pwd" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    include_once "inclusiones/js_incluidos.php";
    ?>

</body>

</html>