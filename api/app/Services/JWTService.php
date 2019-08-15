<?php
    namespace app\Services;
    class JWTService extends Services {
        public function encode($caracter){
            $message = $this->jwt->encode($caracter, $this->settings['jwt']['key']);
            return $message;
        }
    }
?>