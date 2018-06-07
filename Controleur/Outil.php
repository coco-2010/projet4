<?php
//use Mailgun\Mailgun;
class Outil 
{
    private $doss;

    public function GET($name){
        if(isset($_GET[$name])){return $_GET[$name];}
        return null;
    }

  /*  public function redirect($redirect ='projet4/home'){
        if($redirect == "login")
            echo '<script language="JavaScript" type="text/javascript">window.location.replace("Users/login");</script>';
        elseif ($redirect == "home")
            echo '<script language="JavaScript" type="text/javascript">window.location.replace("projet4/home");</script>';
        else
            echo '<script language="JavaScript" type="text/javascript">window.location.replace("'.$redirect.'");</script>';
    }*/

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
        if(!empty ($data)){/*
            var_dump($data);
            require 'Theme/site/mailgun-php/vendor/autoload.php';
            
            # Instantiate the client.
            ///$client = new \Http\Adapter\Guzzle6\Client();
            //$client->getHttpClient()->setDefaultOption('verify', false);
            $mgClient = new Mailgun('key-3f21db38b1222d8537d41ba829844804', new \Http\Adapter\Guzzle6\Client());
            $domain = "projet4";  var_dump(openssl_get_cert_locations());

            # Make the call to the client.
            $result = $mgClient->sendMessage($domain, array(
                'from'    => 'Excited User <mailgun@projet4>',
                'to'      => 'Baz <coralie.leoty@gmail.com>',
                'subject' => $data['name'],
                'text'    => $data['textarea']
            ));*/
        }
    }
}

$Outil = new Outil();