<?php
    include('class_asunto.php');
    include('class_db.php');

    class asunto_dal extends class_db{
        function __construct()
        {
            parent :: __construct();
        }//end construct

        function __destruct()
        {
            parent :: __destruct();
        }//end destruct

        function asunto_por_id($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="SELECT * FROM asunto WHERE ID_ASUNTO='$id'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $total_asuntos=mysqli_num_rows($result);
            $obj_det=null;
            if($total_asuntos==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new asunto($renglon["ID_ASUNTO"],utf8_encode($renglon["ASUNTO"]));
            }//end if
            return $obj_det;
        }

        function obtener_lista_asunto(){
            $sql="SELECT * FROM asunto";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $total_asuntos=mysqli_num_rows($rs);
            $obj_det=null;

            if($total_asuntos>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($rs)){
                    $obj_det= new asunto($renglon["ID_ASUNTO"],utf8_encode($renglon["ASUNTO"]));
                    $i++;
                    $lista[$i]=$obj_det;
                    unset($obj_det);
                }//end while
                return $lista;
            }//end if
        }//end obtener_lista_asuntos

        function agregar($obj){
            $sql = "insert into asunto (";
            $sql .= "ASUNTO) ";
            $sql .= "values (";
            $sql .= "'".$obj->getAsunto()."'";
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

        function actualizar_asunto($obj){
            $sql="UPDATE asunto SET ";
            $sql.="asunto='".$obj->getAsunto()."'";
            $sql.=" WHERE ID_ASUNTO=".$obj->getIdAsunto();
            
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

        public function existe_asunto($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql = "SELECT COUNT(*) FROM asunto";
            $sql.= " WHERE ID_ASUNTO='$id'";
            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

            $renglon = mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;
        }

        public function borra_asunto($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="DELETE FROM asunto WHERE ID_ASUNTO='$id'";
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