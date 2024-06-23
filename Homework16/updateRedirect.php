<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            margin: 3em;
            text-align: center;
        }
        input[readonly] {
            color: #868686;
        }

        form * {
	        margin: 0.5em 0 1em 0;
        }

        input[type=submit] {
	        padding: 2px;
            font-size: medium;
	        margin: 1em;
        }

    </style>
</head>
<body>
    <?php
        require('./dbfunc.php');
        require('./tablefunc.php');
        require('./updateFormFn.php');
        require('./config/dbconfig.php');

        session_start();
        $datas = $_SESSION['datas'];
        print(generateForm($datas, $needInfo, $cancel, $submit));

        $newDatas = [];

        if(isset($_POST[$submit])) {
        foreach ($datas as $key => $data) {
            $i = 0;
            foreach ($data as $key => $value) {
            $i++;
                array_push($newDatas, $_POST[$needInfo[$i-1]]);
            }
        }
        echo update($tableName, $newDatas, $needInfo);
        execute(update($tableName, $newDatas, $needInfo));
        /*header('Location: index.php');
        exit;*/
        }

        if(isset($_POST[$cancel])) {
            header('Location: index.php');
            exit;
        }
    ?>
    
</body>
</html>