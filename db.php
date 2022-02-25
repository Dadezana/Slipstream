<?php
    class DB{
        protected $server, $db, $table;
        private $user, $psw;
        private $conn = NULL;
        private $isConnected = false;

        function __construct($server, $db, $user="root", $psw=""){
            $this->server = $server;
            $this->db = $db;
            $this->user = $user;
            $this->psw = $psw;
        }

        function connect(){
            $conn = mysqli_connect($this->server, $this->user, $this->psw, $this->db);
            $isConnected = false;
            if(!$conn) return false;

            $isConnected = true;
            return $conn;
        }

        function query($query){
            return mysqli_query($this->conn, $query);
        }

        function disconnect(){
            if(!$this->isConnected) return true;
            return mysqli_close($this->conn);
        }
    }
?>