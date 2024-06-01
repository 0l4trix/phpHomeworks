<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if(!function_exists('lineNum')) 
    {
        function lineNum(string $filename, string $separator){
            if(file_exists($filename)){
            $file = fopen($filename, 'r');
            $lineCount = 0;
            while ($line = fgets($file)) {
            $lineCount++;
            }
            fclose($file);
            return $lineCount-1; //without header
        }
        }
    }

    if(!function_exists('infoSearch')) 
        {
            function infoSearch(string $filename, string $date, array $checked, bool $average){
                $file = fopen($filename, 'r');
                    $weightAdded = 0;
                    $weightCount = 0;
                    $heightAdded = 0;
                    $heightCount = 0;
    
                while (($data = fgetcsv($file, 0, ';')) !== FALSE) {
                    $name = $data[0];
                    $first = $data[1];
                    $last = $data[2];
                    $weight = $data[3];
                    $height = $data[4];
        
                    //if(substr($last, 0, 7)) - for 1999-10
                    //if ($first <= $date <= $last) - for any between
                    if (substr($first, 0, 4) === $date) {
                    $allData[0] = 'Név: '.$name;
                    $allData[1] = 'Először játszott: '.$first;
                    $allData[2] = 'Utoljára játszott: '.$last;
                    $allData[3] = 'Súly: '.round(($weight/2.2046), 1).'kg';
                    $allData[4] = 'Magasság: '.round(($height*2.54), 1).'cm';
                    $weightAdded += (int)$data[3];
                    $heightAdded += (int)$data[4];
                    $weightCount++;
                    $heightCount++;
                            echo '<div class="data">';
                        foreach ($checked as $value) {
                        echo $allData[(int)$value].'<br>';
                        }
                        echo '</div>';
                        print'<br>';
                    }
                }
                $averageWeight = round(($weightAdded/$weightCount)/2.2046, 2);
                $averageHeight = round(($heightAdded/$heightCount)*2.54, 2);
                if($average === true) {
                    print '<div class="extraData">'.'Átlag súlyuk: '.$averageWeight.'kg'.'</div>';
                    print '<div class="extraData">'.'Átlag magasságuk: '.$averageHeight.'cm'.'</div>';
                }
                fclose($file);
            }
        }
    ?>
    
</body>
</html>