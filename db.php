<?php
    class DB{
        // protected $server, $db;
        // private $user, $psw;
        private $conn;
        // private $isConnected = false;

        function __construct(){
            // $this->server = "localhost";
            // $this->db = "slipstream";
            // $this->user = "root";
            // $this->psw = "";
        }

        public function connect(){
            $this->conn = new mysqli("localhost", "root", "", "slipstream");
            // $isConnected = false;
            if($this->conn == false) return false;

            // $isConnected = true;
            return true;
        }

        public function query($query){
            $res = mysqli_query($this->conn, $query);
            return $res;
        }

        public function disconnect(){
            // if(!$this->isConnected) return true;
            return mysqli_close($this->conn);
        }
    }
?>