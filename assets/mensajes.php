<?php
include('conexion.php');
//use  PHPMailer\PHPMailer\Exception ;
    class mensaje
    {
        private $con;
        public $email;
        public $asunto;
        public $mensaje;
          public function __construct()
        {
            $this->con = new conectar();
            $this->con = $this->con->conectado();  
        }
        function guardar($email, $asunto, $mensaje)
        {
            $this->con = new conectar();
            $this->email = $email;
            $this->asunto = $asunto;
            $this->mensaje = $mensaje;
            $sql = "INSERT INTO mensajes(email, asunto, mensaje) VALUES ('$this->email', '$this->asunto', '$this->mensaje')";
            if($this->con->conectado()->query($sql) == true)
            {
                echo "consulta realizada";
            }else {
                    echo "Error: " . $sql . "<br>" . $this->con->conectado()->error;
                  }
        }
        
    }
if(!empty($_POST['f']))
{
    $funcion = $_POST['f'];
    if ($funcion == 'crear_cliente')
    {
        if(isset($_POST['correo']) && !empty($_POST['correo']))
        {
            $insert = new mensaje();
            $insert->guardar($_POST['correo'], $_POST['consulta'], $_POST['message']);
            
        }
    }
   
}

