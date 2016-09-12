<?php 
class FormValidation {
    private $errors = array();

    public function generateToken($formName) {
        $token = md5(uniqid(microtime()));
        $_SESSION[$formName.'_token'] = $token;
        return $token;
    }

    public function validateForm($formValues, $formName, $rules) {
        $token = $_SESSION[$formName.'_token'];
        if($token == $formValues[$formName.'_token']) {
            foreach($rules as $rule) {
                if(!preg_match("#^".$rule['regex']."$#", trim($formValues[$formName.'_'.$rule['name']]))) {
                    $this->errors[] = $rule['error'];
                }
            }
            if(empty($this->errors)) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function getErrors() {
        return $this->errors;
    }
}