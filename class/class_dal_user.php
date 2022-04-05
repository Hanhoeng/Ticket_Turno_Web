<?php
    include('class_user.php');
    include('class_db.php');

    class user_dal extends class_db{
        function __construct()
        {
            parent :: __construct();
        }//end construct

        function __destruct()
        {
            parent :: __destruct();
        }//end destruct

        //manejadores para usuarios
        public function is_correct($user, $pass){
            $user=$this->db_conn->real_escape_string($user);
            $pass=$this->db_conn->real_escape_string($pass);
            $sql = "SELECT ID FROM usuarios";
            $sql.= " WHERE USER='$user'";
            $sql.= " AND PASS='$pass'";
            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $total_user = mysqli_num_rows($rs);
            if($total_user==1){
                $renglon = mysqli_fetch_array($rs);
                $cuantos=$renglon[0];
                return $cuantos;
            }else{
                return "0";
            }
        }
    }
?>