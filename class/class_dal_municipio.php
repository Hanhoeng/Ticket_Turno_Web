<?php
    include('class_municipio.php');
    include('class_db.php');

    class municipio_dal extends class_db{
        function __construct()
        {
            parent :: __construct();
        }//end construct

        function __destruct()
        {
            parent :: __destruct();
        }//end destruct

        function municipio_por_id($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="SELECT * FROM municipios WHERE ID_MUNICIPIO='$id'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $total_municipios=mysqli_num_rows($result);
            $obj_det=null;
            if($total_municipios==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new municipio($renglon["ID_MUNICIPIO"],utf8_encode($renglon["MUNICIPIO"]));
            }//end if
            return $obj_det;
        }

        function obtener_lista_municipio(){
            $sql="SELECT * FROM municipios";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $total_municipios=mysqli_num_rows($rs);
            $obj_det=null;

            if($total_municipios>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($rs)){
                    $obj_det= new municipio($renglon["ID_MUNICIPIO"],utf8_encode($renglon["MUNICIPIO"]));
                    $i++;
                    $lista[$i]=$obj_det;
                    unset($obj_det);
                }//end while
                return $lista;
            }//end if
        }//end obtener_lista_municipios

        function agregar($obj){
            $sql = "insert into municipios (";
            $sql .= "MUNICIPIO) ";
            $sql .= "values (";
            $sql .= "'".$obj->getMunicipio()."'";
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

        function actualizar_municipio($obj){
            $sql="UPDATE municipios SET ";
            $sql.="MUNICIPIO='".$obj->getMunicipio()."'";
            $sql.=" WHERE ID_MUNICIPIO=".$obj->getIdMunicipio();
            
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

        public function existe_municipio($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql = "SELECT COUNT(*) FROM municipios";
            $sql.= " WHERE ID_MUNICIPIO='$id'";
            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

            $renglon = mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;
        }

        public function borra_municipio($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="DELETE FROM municipios WHERE ID_MUNICIPIO='$id'";
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