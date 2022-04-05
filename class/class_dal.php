<?php
    include('class_ticket_turno.php');
    include('class_db.php');

    class ticket_turno_dal extends class_db{
        function __construct()
        {
            parent :: __construct();
        }//end construct

        function __destruct()
        {
            parent :: __destruct();
        }//end destruct

        function ticket_por_id($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="SELECT * FROM ticket_turno WHERE ID_TICKET='$id'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $total_TICKETS=mysqli_num_rows($result);
            $obj_det=null;
            if($total_TICKETS==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new ticket_turno($renglon["ID_TICKET"],utf8_encode($renglon["TRAMITANTE"]),utf8_encode($renglon["CURP"]),utf8_encode($renglon["NOMBRE"]),utf8_encode($renglon["PATERNO"]),utf8_encode($renglon["MATERNO"]),$renglon["TELEFONO"],$renglon["CELULAR"],utf8_encode($renglon["CORREO"]),$renglon["EDAD"],utf8_encode($renglon["ID_MUNICIPIO"]),utf8_encode($renglon["ID_ASUNTO"]));
            }//end if
            return $obj_det;
        }

        function ticket_por_id_y_curp($id,$curp){
            $id=$this->db_conn->real_escape_string($id);
            $curp=$this->db_conn->real_escape_string($curp);
            $sql="SELECT * FROM ticket_turno WHERE ID_TICKET='$id' AND CURP='$curp';";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $total_TICKETS=mysqli_num_rows($result);
            $obj_det=null;
            if($total_TICKETS==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new ticket_turno($renglon["ID_TICKET"],utf8_encode($renglon["TRAMITANTE"]),utf8_encode($renglon["CURP"]),utf8_encode($renglon["NOMBRE"]),utf8_encode($renglon["PATERNO"]),utf8_encode($renglon["MATERNO"]),$renglon["TELEFONO"],$renglon["CELULAR"],utf8_encode($renglon["CORREO"]),$renglon["EDAD"],utf8_encode($renglon["ID_MUNICIPIO"]),utf8_encode($renglon["ID_ASUNTO"]));
            }//end if
            return $obj_det;
        }

        function obtener_lista_ticket(){
            $sql="SELECT * FROM ticket_turno";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $total_TICKETS=mysqli_num_rows($rs);
            $obj_det=null;

            if($total_TICKETS>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($rs)){
                    $obj_det= new ticket_turno($renglon["ID_TICKET"],utf8_encode($renglon["TRAMITANTE"]),utf8_encode($renglon["CURP"]),utf8_encode($renglon["NOMBRE"]),utf8_encode($renglon["PATERNO"]),utf8_encode($renglon["MATERNO"]),$renglon["TELEFONO"],$renglon["CELULAR"],utf8_encode($renglon["CORREO"]),$renglon["EDAD"],utf8_encode($renglon["ID_MUNICIPIO"]),utf8_encode($renglon["ID_ASUNTO"]));
                    $i++;
                    $lista[$i]=$obj_det;
                    unset($obj_det);
                }//end while
                return $lista;
            }//end if
        }//end obtener_lista_TICKETS

        function agregar($obj){
            $sql = "insert into ticket_turno (";
            $sql .= "TRAMITANTE,";
            $sql .= "CURP,";
            $sql .= "NOMBRE,";
            $sql .= "PATERNO,";
            $sql .= "MATERNO,";
            $sql .= "TELEFONO,";
            $sql .= "CELULAR,";
            $sql .= "CORREO,";
            $sql .= "EDAD,";
            $sql .= "ID_MUNICIPIO,";
            $sql .= "ID_ASUNTO) ";
            $sql .= "values (";
            $sql .= "'".$obj->getTramitante()."',";
            $sql .= "'".$obj->getCurp()."',";
            $sql .= "'".$obj->getNombre()."',";
            $sql .= "'".$obj->getPaterno()."',";
            $sql .= "'".$obj->getMaterno()."',";
            $sql .= $obj->getTelefono().",";
            $sql .= $obj->getCelular().",";
            $sql .= "'".$obj->getCorreo()."',";
            $sql .= "".$obj->getEdad().",";
            $sql .= $obj->getMunicipio().",";
            $sql .= $obj->getAsunto();
            $sql .= ");";
    
            //echo $sql;exit;
            $this->set_sql($sql);
            $this->db_conn->set_charset("utf8");
            mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            if(mysqli_affected_rows($this->db_conn)==1){
                $insertado=1;
            }else{
                $insertado=0;
            }
            unset($obj);
            return $insertado;
        }

        function actualizar_ticket($obj){
            $sql="UPDATE ticket_turno SET ";
            $sql.="TRAMITANTE='".$obj->getTramitante()."'";
            $sql.=" WHERE ID_TICKET=".$obj->getIdTicket();
            
            //echo $sql;exit;
            $this->set_sql($sql);
            $this->db_conn->set_charset("utf8");
            mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            if(mysqli_affected_rows($this->db_conn)==1){
                $actualizado=1;
            }else{
                $actualizado=0;
            }
            unset($obj);
            return $actualizado;
        }

        public function existe_ticket($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql = "SELECT COUNT(*) FROM ticket_turno";
            $sql.= " WHERE ID_TICKET='$id'";
            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

            $renglon = mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;
        }

        public function borra_ticket($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="DELETE FROM ticket_turno WHERE ID_TICKET='$id'";
            $this->set_sql($sql);
            mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            if(mysqli_affected_rows($this->db_conn)==1){
                $borrado=1;
            }else{
                $borrado=0;
            }
            return $borrado;
        }
    }
?>