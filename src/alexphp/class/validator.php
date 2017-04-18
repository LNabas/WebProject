<?php

/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 18/04/2017
 * Time: 10:06
 */
class validator
{
    private $data;
    private $errors = [];

    public function __construct($data){
        $this->data = $data;
    }

    //permet de savoir si le champ n'est pas vide
    private function getField($field){
        if(!isset($this->data[$field])){
            return null;
        }
        return $this->data[$field];
    }

    public function isAlpha($field, $errorMsg){
        if(!preg_match('/^[a-zA-Z0-9]+$/', $this->getField($field))){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function IsUniq($field, $db, $table, $errorMsg){
        $record = $db->query("SELECT id FROM $table WHERE $field = ?", [$this->getField($field)])->fetch();
        if($record){
            $this->errors[ $field] = $errorMsg;
        }
    }

    public function isEmail($field, $errorMsg){
        if(!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isConfirmed($field, $errorMsg = ''){
        $value = $this->getField($field);
        if(empty($value) || $value != $this->getField($field. '_confirm')){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isValid(){
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}