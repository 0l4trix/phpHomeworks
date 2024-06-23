<?php

if(!function_exists('generateTable')) {
    function generateTable(array $datas, bool $action, array $header = null, bool $footer = true){
        $tableString = '<table>';
        $tableHeaderString = '';
        if($header !== null){
            if(count($header) !== count($datas[0])){
                return 'error : count of header not correct';
            }
            $action ? $header[] = 'Műveletek' : $header;
            $tableHeaderString = generateTableHeader($header);
        }
        $tableString .= $tableHeaderString;
        $tableString .= generateTableBody($datas, $action);
        if($footer){
            $tableFooterString = str_replace(['thead', 'th'], ['tfoot', 'td'], $tableHeaderString);
            $tableString .= $tableFooterString;
        }
        $tableString .= '</table>';
        return $tableString;
    }
}
       
if(!function_exists('generateTableHeader')) {
function generateTableHeader(array $header){
    $tableHeaderString = '<thead>';
    $tableHeaderString .= '<tr>';
    foreach ($header as $columnName) {
        $tableHeaderString .= '<th>'.$columnName.'</th>';
    }
    $tableHeaderString .= '</tr>';
    $tableHeaderString .= '</thead>';
    return $tableHeaderString;
}
}

/**
 * Id mező mindenkéépen kell!
 * @param array $datas
 * @param type $action
 */

 if(!function_exists('generateTableBody')) {
function generateTableBody(array $datas, $action = true){
    $tableString = "<tbody> \n";
    foreach ($datas as $key => $data) {
        $tableString .= "<tr> \n";
        foreach ($data as $key => $column) {
            $tableString .= '<td>'.$column."</td> \n";
            
        }
        if($action && isset($data['id'])){
            $tableString .= '<td>'.generateUpdateAction((int)$data['id'])."</td> \n";
            $tableString .= '<td>'.generateDeleteAction((int)$data['id'])."</td> \n";

        }
        $tableString .= "</tr> \n";
    }
    $tableString .= "</tbody> \n";
    return $tableString;
}
 }

 if(!function_exists('generateDeleteAction')) {
function generateDeleteAction(int $id){
    return '<form method="POST">'
    . '<input type="hidden" name="delete" id="delete_'.$id.'" value="'.$id.'">'
    . '<button type="submit">Törlés</button>'
    . '</form>';
    
}
 }

 if(!function_exists('generateUpdateAction')) {
function generateUpdateAction(int $id){
    return '<form method="POST">'
    . '<input type="hidden" name="update" id="update_'.$id.'" value="'.$id.'">'
    . '<button type="submit">Módosítás</button>'
    . '</form>';
}
 }