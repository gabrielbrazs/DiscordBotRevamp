<a href="SQLSrc/cleanDatabase.php">
    <input type="button" value="Step 1. (clean DB)">
</a>
<!-- SUPER BAREBONES SORRY UWU just look at the pretty php/mysql scripts l8ter -->
<!-- TODO fix this shit index page, & css around everything -->
<!-- TODO Finish with the magi spreadsheet integration -->
<!-- TODO Think about how tf will i do the ratings shit what a chore -->
<h3>just tryina figure out the api go click the button</h3>
<?php
    echo "<style>
            table, th, td {
                border: 1px solid black;
            }
            </style>";
    include "SQLSrc/sourcelinks.php";

    if(!ini_set('default_socket_timeout', 15)) echo "<!-- unable to change socket timeout -->";

    if (($handle = fopen($linkWeapon, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $spreadsheet_data[] = $data;
        }
        fclose($handle);
    }
    else
        die("Problem reading csv");
    $count = 0;
    $count2 = 0;
    
    echo "<table>";
    foreach($spreadsheet_data as $x){
        $count = 0;
        echo "<tr>";
        foreach($x as $y){
            if($count2 == 0 && $count != 4 && $count != 5){
                echo "<td rowspan='2'>".$y."</td>";
            } else {
                if($count2 == 0 && $count == 4 && $count == 5){
                    echo "<td>".$y."</td>";
                } else {
                    if ($count2 == 1 && $count != 4 && $count != 5){

                    } else {
                        if ($count2 == 1 && $count == 4 && $count == 5){
                            echo "<td>".$y."</td>";
                        } else {
                            if($count2 == 0 && $count == 4){
                                echo "<td colspan='2'>".$y."</td>";
                                
                            } else {
                                
                                if($y != '') {
                                    echo "<td>".$y."</td>";
                                } else {
                                    if($count2 != 0){
                                        echo "<td> - </td>";
                                    }
                                        
                                }
                                
                            }
                        }
                    }
                }
            }
            $count++;
        }
        echo '</tr>';
        $count2++;
    }
    echo "</table>";
    
?>
