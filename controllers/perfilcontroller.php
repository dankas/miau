<?php
session_start();
require_once 'core/Database.php';
require_once 'models/user.php';






function listPets($pets) {
     foreach($pets as $key => $value){
        echo "<tr>";
        echo "<td>". $value->nome ." </td>";
        echo "<td>". $value->tipo ." </td>";
        echo "<td>". $value->race ." </td>";
        echo "<td>". $value->nascimento ." </td>";
        echo "<td>". $value->bio ." </td>";
        echo "<td> <button> <button> </td>";
        echo "</tr>";
     }
}

?>