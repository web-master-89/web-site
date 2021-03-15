<?php
    class conectar
    {
        private $conect;
        public function __construct()
        {
          $this->conect = new mysqli("localhost", "id16386731_bruno", "Te4mUg@TamEbm9wF", "id16386731_webmaster");
            if ($this->conect->connect_errno) 
        {
          echo "Failed to connect to MySQL: " . $this->connect_error;
          exit();
        }  
        }
        public function conectado()
        {
            return $this->conect;
        }
    }

