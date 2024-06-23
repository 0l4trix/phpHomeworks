<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
        body {
            margin: auto;
            text-align: center;
            margin-top: 2em;

        }

        p {
            font-size: larger;
            margin: 0;
        }

        input[type=submit] {
	        padding: 2px;
            font-size: medium;
	        margin: 1em;
        }
        input[type=text] {
            margin: 0.5em;
        }

        input[readonly] {
            color: #868686;
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
        $deleteData = $_SESSION['deleteData'];
        $id = $_SESSION['id'];
        $datas = getData(getUpdate($needInfo, $tableName, $id));

        print(confirmationForm($datas, $needInfo, $cancel, $submit));

        if(isset($_POST[$submit])) {
            execute($deleteData);
            header('Location: index.php');
            exit;
        }

        if(isset($_POST[$cancel])) {
            header('Location: index.php');
            exit;
        }
    ?>
    
</body>
</html>