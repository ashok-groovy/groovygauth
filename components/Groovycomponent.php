<?php
namespace vendor\googleauth\groovygoogleauth\components;
 
use Yii;
use yii\base\Component;
class Groovycomponent extends Component {
    public function init(){
        $path = Yii::getAlias("@vendor/googleauth/groovygoogleauth/googleLib/GoogleAuthenticator.php");
        require_once($path);
    }
    public function createSecret(){
        $ga = new \GoogleAuthenticator();
        $secret = $ga->createSecret();
        return $secret;
    }

    public function verifyGoogle($secret,$code){
        $ga = new \GoogleAuthenticator();
        $checkResult = $ga->verifyCode($secret, $code, 2);
        return $checkResult;
    }

    public function qrCodeGoogle($email,$secret,$name = "Groovy"){
        $ga = new \GoogleAuthenticator();
        return $ga->getQRCodeGoogleUrl($email,$secret,$name);
    }
}