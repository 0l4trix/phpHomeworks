<?php

$formArray = [
    ['type'=>'email', 'emailcim' => 'kisspeter@gmail.com'],
    ['type'=>'text', 'nev' => 'Kiss Péter'],
    
];


function generateForm(array $formArray){
    
}


function generateEmail(string $name, string $value = null){
    return '<input type="email" name="'.$name.'" '. ($value !== null ? 'value="'.$value.'" ': '').'>';
}

function generateText(string $name, string $value = null){
    return '<input type="text" name="'.$name.'" '. ($value !== null ? 'value="'.$value.'" ': '').'>';
}

