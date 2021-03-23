<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
    class conectar
    {
        private $conect;
        public function __construct()
        {
          $this->conect = new mysqli("localhost", "root", "", "web-master");
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
        public function correos($from, $theme, $message)
        {
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'oliveragaston69@gmail.com';                     //SMTP username
                $mail->Password   = 'santino2018';                               //SMTP password
                $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom($from, $from);
                $mail->addAddress('masterasuntos@gmail.com');     //Add a recipient
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $theme;
                $mail->Body    = $message;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
            );
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
                    }
        }

