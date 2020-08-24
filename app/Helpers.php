<?php

use Illuminate\Support\Facades\Validator;

function valaditionData($data,$rules,$messages)
{


    $validate = Validator::make($data, $rules, $messages);

    if($validate->fails())
    {

        $errors = $validate->errors();
        
        return $errors;
    }       

}

function isNull($data)
{
    return isNull($data);
}


?>