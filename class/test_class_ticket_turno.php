<?php
    include('class_dal.php');

    //prueba de obtener por id
    $obj_ticket = new ticket_turno_dal;
    $resultado = $obj_ticket->ticket_por_id(1);
    if($resultado==null){
        echo "no existe el ticket";
    }else{
        echo "<pre>";
        print_r($resultado);
        echo "</pre>";
    }
    echo "<br>";
    //prueba de obtener lista
    $resultado2=$obj_ticket->obtener_lista_ticket();
    if($resultado2==null){
        echo "No hubo lista";
    }else{
        echo "<pre>";
        print_r($resultado2);
        echo "</pre>";
    }
    echo "<br>";

    //prueba de insertar
    $obj_det = new ticket_turno(1,"benito","GOKD981006HCLLWV07","David Hiroshi","Gloria","Kawasaki",8446003784,8446003784,"sephiMH@gmail.com",23,1,1);
    $obj_det = $obj_ticket->agregar($obj_det);
    if($obj_det==1){
        echo "<br>Ticket insertado correctamente</br>";
    }else{
        echo "<br>Ticket no agregado, vuelva a intentar</br>";
    }

    //prueba actualizar
    $obj_det = new ticket_turno(5,"JUANITO","GOKD981006HCLLWV07","Daniel","Gloria","Kawasaki",8446003784,8446003784,"sephiMH@gmail.com",23,1,1);
    $obj_det = $obj_ticket->actualizar_ticket($obj_det);
    if($obj_det==1){
        echo "<br>Ticket actualizado correctamente</br>";
    }else{
        echo "<br>Ticket no actualizado, vuelva a intentar</br>";
    }
    echo "<br>";

    //prueba de existe_TICKET
    $cuantos = $obj_ticket->existe_ticket(5);
    print '<br> Record count: '.$cuantos.'';
    echo "<br>";
    //prueba de borra_ticket
    $borrado = $obj_ticket->borra_ticket(8);
    if($borrado==1){
        print "<br>registro borrado";
    }else{
        print "<br>registro NO borrado";
    }
?>