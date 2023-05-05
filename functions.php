<?php

function create_password($max_length)
{     // funzione che crea la password
    $all_char = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '£', '$', '%', '&', '/', '(', ')', '=', '?', '^', '*', '[', ']', '{', '}', '#', '@'];
    $new_password = [];
    for ($i = 0; $i < $max_length; $i++) {
        $new_password[] = $all_char[array_rand($all_char)];
    }
    return implode('', $new_password);          // implode trasforma un array in una stringa
}

if (empty($error_message)) {
    $password = create_password($pass);         // la variabile password diventa la funzione create_password con la variabile pass come argomento
}

?>