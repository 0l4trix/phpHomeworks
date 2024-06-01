<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p.right {
            text-align: right;
            margin-right: 15px;
        }
        form {
            margin: 15px;
        }
        div.main {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            margin: 15px;
            border-top: 2px solid black;
        }
        div.data {
            padding: 10px;
            border: 1px solid black;
            margin: 7px;
        }
        div.extraData {
            width: 100%;
            margin: 10px;
            text-align: center;
        }
        div.radio,
        button[type="submit"] {
            display: block;
            margin-top: 15px;
        }
    </style>
</head>
<body>

        <form method="post">
            <label for="num">Adjon meg egy 1990 és 1999 közötti évszámot: </label>
            <input type="text" name="num" id="num"><br>
            <p>Milyen adatokat szeretne tudni?</p>
            <label for="name">Játékosok nevét</label>
            <input type="checkbox" name="check[]" id="name" value="0">
            <label for="first">Mettől játszottak</label>
            <input type="checkbox" name="check[]" id="first" value="1">
            <label for="last">Meddig játszottak</label>
            <input type="checkbox" name="check[]" id="last" value="2">
            <label for="weight">Súlyukat</label>
            <input type="checkbox" name="check[]" id="weight" value="3">
            <label for="height">Magasságukat</label>
            <input type="checkbox" name="check[]" id="height" value="4">
            <div class="radio">
            <label for="average">Átlag súly- és magasságukat</label>
            <input type="radio" name="average" id="average">
            </div>
            <button type="submit">Mehet</button>
        </form>

    <?php
        $csvFile = 'balkezesek.csv';
        require('fn.php');
        $dataCheck = '';
        if(isset($_POST['check'])) {
            foreach($_POST['check'] as $key => $value) {
                $dataCheck .= $value;
            }
            $checked = str_split($dataCheck, 1);
        }

        if(isset($_POST['num'])){
            $num       = $_POST['num'];
            $average = isset($_POST['average']);

            ?>
                <div class="main">
                <div class="extraData">
                <p class="right">
            <?php
                print('Adatsorok (játékosok) száma: '.lineNum($csvFile, ';')); //without header
            ?>
                </p>
                <h2>Játékosok<?php if((int)$num >= 1990 && (int)$num <= 1999) {echo ' ('.(int)$num.')';}?></h2>
                </div>
            <?php

                if(isset($checked) && (int)$num >= 1990 && (int)$num <= 1999) {
                    $num       = floor($_POST['num']);
                    infoSearch($csvFile, $num, $checked, $average);
                } else if (!isset($checked) && (int)$num >= 1990 && (int)$num <= 1999) {
                    $checked = ['0', '1'];
                    $num       = floor($_POST['num']);
                    infoSearch($csvFile, $num, $checked, $average);
                } else {
                    print'Hibás adat, kérek egy 1990 és 1999 közötti évszámot!';
                }
        }
    ?></div>
    
</body>
</html>