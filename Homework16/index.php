<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //change all database related data here:
        require('./config/dbconfig.php');

        require('./dbfunc.php');
        require('./tablefunc.php');
        require('./updateFormFn.php');

        
        if(isset($_POST['delete'])){
            $id = (int)$_POST['delete'];
            $deleteData = getDelete($tableName, $id);
            session_start();
            $_SESSION['deleteData'] = $deleteData;
            $_SESSION['id'] = $id;
            header('Location: confirmRedirect.php');
            exit;
        }

        if(isset($_POST['update'])) {
            $id = (int)$_POST['update'];
            $sql = getUpdate($needInfo, $tableName, $id);
            $datas = getData($sql);

            session_start();
            $_SESSION['datas'] = $datas;
            header('Location: updateRedirect.php');
            exit;
        }
        
        
        $sql = getSelect($needInfo, $tableName);
        $datas = getData($sql);
        print(generateTable($datas, true, $header));
        
        ?>
    </body>
</html>
