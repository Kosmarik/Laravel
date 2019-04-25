<?php

    class dbConnect{
        protected $servername;
        protected $username;
        protected $password;
        protected $dbname;
        protected $conn;



        public function __construct(){
            $this->servername = 'localhost';
            $this->username = 'root';
            $this->password = '24862';
            $this->dbname = 'myShop';
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        }

        public function __destruct()
        {
            mysqli_close($this->conn);
        }
    }
