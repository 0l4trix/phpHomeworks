<?php

//Update mechanism

if(!function_exists('getUpdate')){
    function getUpdate(array $fields, string $tableName, $id, string $where=null){
        $selectString = 'SELECT ';
        foreach ($fields as $field) {
            $selectString .= $field.',';
        }
        $selectString = substr($selectString, 0, strlen($selectString)-1);
        
        $selectString .= ' FROM '.$tableName.' ';
        
        $selectString .= 'WHERE id='.$id;
        
        return $selectString;
    }
}

if(!function_exists('update')) {
function update(string $tableName, array $datas, array $sqlHeader){
    if (count($datas) === count($sqlHeader)) {
    $updateString = 'UPDATE `'.$tableName.'`';
    $updateString .= ' SET ';
    for ($i=0; $i < count($sqlHeader); $i++) { 
        //$updateString .= 'SET '.$sqlHeader[$i].'='.$datas[$i];
        $sqlHeader[$i] === 'id' ? null :
            $updateString .= $sqlHeader[$i].' = `'.$datas[$i].'`, ';
    }
     $updateString = substr($updateString, 0, (strlen($updateString)-2));
        $updateString .= ' WHERE id = '.$datas[0];
    return $updateString;
    }
}
}

//Form generation

if(!function_exists('generateForm')) {
    function generateForm(array $datas, array $sqlHeader, ... $buttonValues) {
    if (count($datas[0]) === count($sqlHeader)) {
    $form = '<form method="post">';
        foreach ($datas as $key => $data) {
            $i = 0;
            foreach ($data as $key => $value) {
            $i++;
            $form .= $sqlHeader[$i-1].'<br>'.generateText($sqlHeader[$i-1], $value).'<br>';
            }
        }
    $form .= generateButton($buttonValues[0], 'Elvetés');
    $form .= generateButton($buttonValues[1], 'Mentés');
    $form .= '</form>';
    return $form;
    }

    }
}

if(!function_exists('confirmationForm')) {
    function confirmationForm(array $datas, array $sqlHeader, ... $buttonValues) {
    $form = '<form method="post">';
    $form .= '<p>Biztos törli?</p><br>';
    foreach ($datas as $key => $data) {
        $i = 0;
        foreach ($data as $key => $value) {
        $i++;
        $form .= $sqlHeader[$i-1].'<br>'.generateText($sqlHeader[$i-1], $value, true).'<br>';
        }
    }
    $form .= generateButton($buttonValues[0], 'Vissza');
    $form .= generateButton($buttonValues[1], 'Törlés');
    $form .= '</form>';
    return $form;
    }
}

if(!function_exists('generateText')) {
function generateText(string $name, string $value = null, bool $readonly=false){
    if ($readonly) {
        return '<input type="text" name="'.$name.'" '. ($value !== null ? 'value="'.$value.'" ': '').' readonly>';
    }else if ($name === 'id') {
        return '<input type="text" name="'.$name.'" '. ($value !== null ? 'value="'.$value.'" ': '').' readonly>';
    } else {
        return '<input type="text" name="'.$name.'" '. ($value !== null ? 'value="'.$value.'" ': '').'>';
    }
}
}

if(!function_exists('generateButton')) {
function generateButton(string $name, string $value) {
    return '<input type="submit" name="'.$name.'" '. 'value="'.$value.'" '.'>';

}
}
