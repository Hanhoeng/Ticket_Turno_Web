<?php
    session_start();
    $user=isset($_POST["f_user"]) ? $user=strtoupper($_POST["f_user"]) : $user=null;
    $pass=isset($_POST["f_pwd"]) ? $pass=strtoupper($_POST["f_pwd"]) : $user=null;
    if($_POST){
        require_once 'php/funciones_php.php';
        $errores=array();

        if(!validaRequerido($user)){
            $errores[]="Usuario llegó vacío";
        }
        if(!validaRequerido($pass)){
            $errores[]="Contraseña llego vacío";
        }
    }

?>

<?php
    if(!$errores){
        include("class/class_user.php");
        include("class/class_dal_user.php");
        $obj_usuario = new usuario(NULL,$user,$pass);
        $metodos_usuarios = new user_dal;
        $id = $metodos_usuarios->is_correct($obj_usuario->getUsuario(),$obj_usuario->getPassword());
        if($id!=0){
            include_once "inclusiones/css_y_favicon.php";
            $_SESSION['usuario']=$id;
?>
<div class="container-fluid">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center;">Sesion iniciada!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <a class="btn btn-warning" href="buscador.php" style="margin-left: 5px">Continuar</a>
                </div>
                <div class="col-md-5"></div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php
        }else{
            include_once "inclusiones/css_y_favicon.php";
?>

<div class="container-fluid">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center;">Usuario o contraseña incorrectos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <a class="btn btn-warning" href="index.php" style="margin-left: 5px">Regresar</a>
                </div>
                <div class="col-md-5"></div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php
            
        }
    }else{
        echo "<ul style='color_red',font-size=25px;>";
        foreach($errores as $error):
            echo "<li><h2>".$error."</h2></li>";
        endforeach;
        echo "</ul>";
    }
?>