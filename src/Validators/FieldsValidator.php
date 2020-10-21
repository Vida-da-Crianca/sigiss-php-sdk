<?php 
namespace CarlosOCarvalho\Sigiss\Validators;

use CarlosOCarvalho\Sigiss\Exceptions\ValidatorException;
use Respect\Validation\Validator;


class FieldsValidator
{   

    private $rules = [];

    public function rules($rules){
        $this->rules = $rules;
        return $this;
    }
    
    public function validate($data){
       
        $fails = [];
        $rules = $this->rules;
        foreach($rules as $key => $options){
             foreach($options as $rule =>  $msg){
                 if( !Validator::$rule()->validate($data[$key] ?? '') ){
                      array_push($fails, sprintf('%s', sprintf($msg, $key)));
                 }
             }
        }
        if( count($fails) > 0)  throw new ValidatorException(implode(PHP_EOL, $fails));
        return true;
    }

}