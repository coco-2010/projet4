<?php
class Outil 
{
    private $doss;

    public function GET($name){
        if(isset($_GET[$name])){return $_GET[$name];}
        return null;
    }

    public function redirect($redirect){
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("'.$redirect.'");</script>';var_dump($redirect);
    }

    public function alert($type,$msg){
        echo "<div class='alert alert-$type' role='alert'>$msg
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button></div>";
    }

    public function verifVar($get){
        if(isset($get) && preg_match("`[A-Za-z0-9_\-\.]`", $get))
            return $get;
        else return null;
    }

   public function contact($data){
        if(!empty ($data)){
            var_dump($data['name']);
            $name = trim($data['name']);
            $subject = trim($data['subject']);
            $email = trim($data['email']); var_dump($data['email']);
            $message = trim($data['textarea']);

            
            /* Destinataire (votre adresse e-mail) */
            $to = 'coralie.leoty@gmail.com';
            
            /* Construction du message */
            $msg  = 'Bonjour,'."\r\n\r\n";
            $msg .= 'Ce mail a été envoyé depuis creepdev.fr/projet4 par '.$name."\r\n\r\n";
            $msg .= 'Voici le message qui vous est adressé :'."\r\n";
            $msg .= '***************************'."\r\n\r\n";
            $msg .= $message."\r\n\r\n";
            $msg .= '***************************'."\r\n";
            
            /* En-têtes de l'e-mail */
            $headers = "From: \"$name\"<$email>";
            var_dump($headers);
            /* Envoi de l'e-mail */
            mail($to, $subject, $msg, $headers);
        }
    }
}

$Outil = new Outil();