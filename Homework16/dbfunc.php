<?php

if(!function_exists('getData')){
    function getData(string $sql){
        $data = [];
        require('./config/dbconfig.php');
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $result = mysqli_query($conn, $sql);
        if($result){
            //count of resultset 
            if (mysqli_num_rows($result) > 0) {
                while(($row = mysqli_fetch_assoc($result)) !== Null) {
                    $data[] = $row;
                }
            }
            
        }
        mysqli_close($conn);
        return $data;
    }
}

if(!function_exists('execute')){
    function execute(string $sql){
        require('./config/dbconfig.php');
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
}

if(!function_exists('getSelect')){
    function getSelect(array $fields, string $tableName, string $where=null){
        $selectString = 'SELECT ';
        foreach ($fields as $field) {
            $selectString .= $field.',';
        }
        $selectString = substr($selectString, 0, strlen($selectString)-1);
        
        $selectString .= ' FROM '.$tableName.' ';
        
        $selectString .= $where ?? '';
        
        return $selectString;
    }
}

if(!function_exists('getDelete')) {
function getDelete(string $tableName, int $id){
    $deleteString = 'DELETE FROM `'.$tableName.'`';
    $deleteString .= 'WHERE id='.$id;
    return $deleteString;
}
}
