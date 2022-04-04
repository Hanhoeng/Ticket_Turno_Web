<?php
    include("class_dal_user.php");
    $prueba = new user_dal;

    $res = $prueba->is_correct("cris","pass");
    print $res;
?>