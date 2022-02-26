<?php
    class DB{
        protected $server, $db;
        private $user, $psw;
        private $conn;
        protected $res, $res_assoc;

        function __construct(){
            $this->server = "localhost";
            $this->db = "slipstream";
            $this->user = "root";
            $this->psw = "";
        }

        public function connect(){
            $this->conn = new mysqli($this->server, $this->user, $this->psw, $this->db);
            if($this->conn == false) return false;

            return true;
        }

        public function query($query){
            $this->res = mysqli_query($this->conn, $query);
            return $this->res;
        }

        public function disconnect(){
            return mysqli_close($this->conn);
        }

        public function fetch(){
            $this->res_assoc = mysqli_fetch_assoc($this->res);
            return $this->res_assoc;
        }
    }
?>