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
        	$this->conn = new mysqli("localhost", "root", "", "slipstream");

            if($this->conn == false) return false;

            return true;
        }

        public function query($query){
            $this->res = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
            return $this->res;
        }

        public function disconnect(){
            return mysqli_close($this->conn);
        }

        public function fetch($res = NULL)
        {
            if ($res == NULL) $res = $this->res;
            $this->res_assoc = mysqli_fetch_assoc($res);
            return $this->res_assoc;
        }
    }
?>