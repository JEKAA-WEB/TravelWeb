<?php

$conn=mysqli_connect('localhost', 'root', 'MYSQL', 'tourly', 3307);

if(!$conn){
    echo 'connection error' . mysqli_connect_error();
}
// else{
//     echo 'successfully connected';
// }

?>