<?PHP
    include "../Tools/conexao.php";

    $sql = "DELETE FROM armourtable;
            ALTER TABLE armourtable AUTO_INCREMENT = 1;
            DELETE FROM behemothtable;
            ALTER TABLE behemothtable AUTO_INCREMENT = 1;
            DELETE FROM weapontable;
            ALTER TABLE weapontable AUTO_INCREMENT = 1;";

    $cleanDB = $conex -> prepare($sql);
    try
    {
        $cleanDB -> execute();
    } 
    catch (Exception $cleanDB) 
    {
        echo 'Caught exception: ',  $cleanDB->getMessage(), "</br>";
    }
    echo "Database Cleared.";
?>  
<a href="linkWeaponStash.php">
    <input type="button" value="Step 2. (Weapons and Behemoths)">
</a>