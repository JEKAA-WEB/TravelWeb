<?php

$conn=mysqli_connect('10.4.107.146', 'root', 'MYSQL', 'tourly', 3307);

if(!$conn){
    echo 'connection error' . mysqli_connect_error();
}
// else{
//     echo 'successfully connected';
// }

?>