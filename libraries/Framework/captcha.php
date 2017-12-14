<?php


namespace Framework;
use \Config\Config;

class captcha{
public function genarateCaptcha($sLength=null) {    
    if (empty($sLength)) {
               $sLength = rand(Config::Min_Captcha_Length, Config::Max_Captcha_Length);
           }

           $sWords  = Config::Captcha_Words;
           $sVocals = Config::Captcha_Vocal;

           $sText  = "";
           $iVocal = rand(0, 1);
           for ($i=0; $i<$sLength; $i++) {
               if ($iVocal) {
                   $text .= substr($sVocals, mt_rand(Config::Min_Vocla_Mt_Rand, Config::Max_Vocal_Mt_Rand), Config::Vocal_Length);
               } else {
                   $text .= substr($sWords, mt_rand(Config::Min_Words_Mt_Rand, Config::Max_Words_Mt_Rand), Config::Words_Length);
               }
               $vocal = !$vocal;
           }
        $_SESSION['mbula'] = $sText;
        return $sText;
}
public function checkCaptcha() {
        if (isset($_REQUEST['_SESSION'])) {
        header('HTTP/1.0 400 Bad Request'); 
        die('400 Bad Request'); 
      }
        $good_captcha = $_SESSION['mbula']; // The server generated Captcha.
        
        $user_captcha = !isset($_GET['usrcap'])    // Check for a GET Request.
                        ? !isset($_POST['usrcap']) // Else it could be a POST. 
                            ? null                 // Nope, so let it be null.
                            : $_POST['usrcap']     // ...But on the other side
                        : $_GET['usrcap'];         // we can take what is sent.

        // The empty() check guarantees that a Captcha was rendered. If not, it's a bad one...
        $is_valid = (empty($good_captcha) || $user_captcha != $good_captcha) ? "bad" : "valid";
        echo json_encode($is_valid);
    }
}