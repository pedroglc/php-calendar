<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calendario</title>
</head>
<body>
    <div class="container">
    <h1> <?php echo date('Y'); ?></h1>
    <p>
        <?php
            date_default_timezone_set('America/Sao_Paulo');
            if(date('H') >= 6 && date('H') <= 11){
                echo "Bom dia!";
            } else if(date('H') >= 12 && date('H') <= 17){
                echo "Boa tarde!";
            } else {
                echo "Boa noite!";
            }
        ?>
    </p>
    <h5>
        Agora são <?php echo date('H'); ?>h<?php echo date('i'); ?>
    </h5>
    </div>
    
    <div class="table">
        <table table id="calendar">
            <?php echo'<th style="color:red">Dom</th>';?>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <?php echo'<th style="color:gray">Sab</th>';?>
            <?php calendario(); ?>
        </table>
    </div>

    <?php
        function linha($semana)
        {
            echo "<tr>";
            for($i=0; $i <=6; $i++){
                if (isset($semana[$i])) {            
                    if($semana[$i]===$semana[0]){
                        echo '<td style="color:red;">' . $semana[$i] . '</td>';
                    }else{
                        if ($semana[$i]==date('j')) {
                            echo '<td style="font-weight:bold;color:blue;">' . $semana[$i] . '</td>';
                        } else {
                            echo '<td>' . $semana[$i] . '</td>';
                        }
                    }                   
                } else {
                    echo '<td></td>';
                }                
            }
            echo "</tr>";
        }
        function calendario(){
            $dia=1;
            $semana=array();
            while($dia<=31){
                array_push($semana, $dia);

                if(count($semana)==7){
                    linha($semana);
                    $semana=array();
                }
                $dia++;
            }
            linha($semana);
        }
        
        
    ?>
</body>
</html>