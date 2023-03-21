<?php
    include('../models/connect.php');

    if(isset($_GET['submit'])){

        if(!empty($_GET['platform'])) {
            if ($_GET['platform'] == 'Toutes') {
                $checkedPlatforms = $db->query('SELECT * FROM games GROUP BY id ORDER By name ASC')->fetchAll();
                echo "egor";
                // var_dump($checkedPlatforms);
            }
            else  {
                $condition = "";
                $i = 0;
                foreach($_GET['platform'] as $value) {
                    $condition .= $value;
                    if($i < count($_GET['platform'])) {
                        $condition .= " OR platforms.name LIKE ". $value;  
                    }
                    $i++;
                };
                $checkedPlatforms = $db->prepare('SELECT DISTINCT games.name FROM games
                                            INNER JOIN games_platforms ON games_platforms.game_id = games.id
                                            INNER JOIN platforms ON platforms.id = games_platforms.platform_id
                                            WHERE platforms.name = "Windows"'
                                            .$condition);
                $checkedPlatforms->execute();
                var_dump($checkedPlatforms);
            }
                // foreach($_GET['platform'] as $value){
                // echo "Value : ".$value.'<br/>';
                // var_dump($value);
                // $checkedPlatforms = $db->prepare('SELECT  games.name FROM games
                //                             INNER JOIN games_platforms ON games_platforms.game_id = games.id
                //                             INNER JOIN platforms ON platforms.id = games_platforms.platform_id
                //                             WHERE platforms.name LIKE :platformValue
                //                             GROUP BY games.id ORDER By games.name ASC;');
                //   $checkedPlatforms->bindParam(':platformValue', $value);
                //   $checkedPlatforms->execute();
                
                //   $tests = $checkedPlatforms->fetchAll(PDO::FETCH_ASSOC);
                //   var_dump($tests);
                //   $allow = array($tests[0]['name']);
                //   $yop = array_intersect_key($tests, array_flip($allow));
                //   var_dump($yop);
                //   var_dump($tests); 
                //     foreach($yop as $test) {
                //     echo $test['name'];
                // }
                // }
            }
            // header("Location: ../views/view_liste de jeux.php");
        }
    
?>