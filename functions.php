    <?php
    session_start();

    function create_password($max_length, $word, $number, $symbol, $yes, $no)
    {
        $all_char = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '£', '$', '%', '&', '/', '(', ')', '=', '?', '^', '*', '[', ']', '{', '}', '#', '@'];

        $sub_word = array_slice($all_char, 0, 51);            //sub array dei primi 51 indici, ovvero lettere
        $sub_num = array_slice($all_char, 52, 61);            //sub array di nueri
        $sub_simb = array_slice($all_char, 62, 79);            //sub array di caratteri speciali

        $new_password = [];

        if ($yes === 'true') {                                                  //! BLOCCO DI CODICE PER LE PASSWORD CHE SI RIPETONO

            if ($word === 'on' && $number === 'on' && $symbol === 'on') {          //Ogni tipo 
                for ($i = 0; $i < $max_length; $i++) {
                    $new_password[] = $all_char[array_rand($all_char)];
                }
            } elseif ($word === 'on' && $number !== 'on' && $symbol !== 'on') {     //solo lettere
                for ($i = 0; $i < $max_length; $i++) {
                    $new_password[] = $sub_word[array_rand($sub_word)];
                }
            } elseif ($number === 'on' && $word !== 'on' && $symbol !== 'on') {        //solo numeri
                for ($i = 0; $i < $max_length; $i++) {
                    $new_password[] = $sub_num[array_rand($sub_num)];
                }
            } elseif ($symbol === 'on' && $number !== 'on' && $word !== 'on') {         //solo simboli
                for ($i = 0; $i < $max_length; $i++) {
                    $new_password[] = $sub_simb[array_rand($sub_simb)];
                }
            } elseif ($word === 'on' && $number === 'on') {                     //lettere e numeri
                $sub_word_num = array_merge($sub_word, $sub_num);               //unione dei due sottoinsiemi
                shuffle($sub_word_num);                                         //mescolamento indici dell'array risultante
                for ($i = 0; $i < $max_length; $i++) {
                    $new_password[] = $sub_word_num[array_rand($sub_word_num)];
                }
            } elseif ($word === 'on' && $symbol === 'on') {                          //lettere e simboli
                $sub_num_simb = array_merge($sub_word, $sub_simb);
                shuffle($sub_num_simb);
                for ($i = 0; $i < $max_length; $i++) {
                    $new_password[] = $sub_num_simb[array_rand($sub_num_simb)];
                }
            } elseif ($number === 'on' && $symbol === 'on') {                     //numeri e simboli
                $sub_word_simb = array_merge($sub_num, $sub_simb);
                shuffle($sub_word_simb);
                for ($i = 0; $i < $max_length; $i++) {
                    $new_password[] = $sub_word_simb[array_rand($sub_word_simb)];
                }
            }
        } elseif ($no === 'false') {                                          //! BLOCCO DI CODICE PER LE PASSWORD CHE NON SI RIPETONO

            if ($word === 'on' && $number === 'on' && $symbol === 'on') {               //Ogni tipo
                for ($i = 0; $i < $max_length; $i++) {
                    $new_char = $all_char[array_rand($all_char)];                       //seleziona un carattere casuale dall'array $all_char
                    if (!in_array($new_char, $new_password)) {                          //se il carattere non è già presente nell'array
                        $new_password[] = $new_char;
                    }
                }
            } elseif ($word === 'on' && $number !== 'on' && $symbol !== 'on') {       //solo lettere
                for ($i = 0; $i < $max_length; $i++) {
                    $new_char = $sub_word[array_rand($sub_word)];
                    if (!in_array($new_char, $new_password)) {
                        $new_password[] = $new_char;
                    }
                }
            } elseif ($number === 'on' && $word !== 'on' && $symbol !== 'on') {       //solo numeri
                for ($i = 0; $i < $max_length; $i++) {
                    $new_char = $sub_num[array_rand($sub_num)];
                    if (!in_array($new_char, $new_password)) {
                        $new_password[] = $new_char;
                    }
                }
            } elseif ($symbol === 'on' && $number !== 'on' && $word !== 'on') {      //solo simboli
                for ($i = 0; $i < $max_length; $i++) {
                    $new_char = $sub_simb[array_rand($sub_simb)];
                    if (!in_array($new_char, $new_password)) {
                        $new_password[] = $new_char;
                    }
                }
            } elseif ($word === 'on' && $number === 'on') {                           //lettere e numeri
                $sub_word_num = array_merge($sub_word, $sub_num);                   //unione dei due sottoinsiemi
                shuffle($sub_word_num);                                             //mescolamento indici dell'array risultante
                for ($i = 0; $i < $max_length; $i++) {
                    $new_char = $sub_word_num[array_rand($sub_word_num)];
                    if (!in_array($new_char, $new_password)) {                      //se il carattere non è già presente nell'array
                        $new_password[] = $new_char;
                    }
                }
            } elseif ($word === 'on' && $symbol === 'on') {                           //lettere e simboli
                $sub_word_simb = array_merge($sub_word, $sub_simb);
                shuffle($sub_word_simb);
                for ($i = 0; $i < $max_length; $i++) {
                    $new_char = $sub_word_simb[array_rand($sub_word_simb)];
                    if (!in_array($new_char, $new_password)) {
                        $new_password[] = $new_char;
                    }
                }
            } elseif ($number === 'on' && $symbol === 'on') {                        //numeri e simboli
                $sub_num_simb = array_merge($sub_num, $sub_simb);
                shuffle($sub_num_simb);
                for ($i = 0; $i < $max_length; $i++) {
                    $new_char = $sub_num_simb[array_rand($sub_num_simb)];
                    if (!in_array($new_char, $new_password)) {
                        $new_password[] = $new_char;
                    }
                }
            }
        }


        $_SESSION['password'] = implode('', $new_password);
        header('Location: ./success.php');
    }

    // !  La funzione array_rand() seleziona un indice casuale dall'array, che poi viene utilizzato per accedere all'elemento corrispondente nell'array. Questo approccio è veloce e semplice, ma richiede l'accesso all'array due volte: una per selezionare l'indice casuale e una per accedere all'elemento corrispondente.

    // ! La funzione shuffle(), d'altra parte, mescola casualmente gli elementi dell'array, quindi l'elemento casuale selezionato è semplicemente il primo elemento dell'array mescolato. Questo approccio richiede una sola iterazione dell'array, ma può essere meno efficiente se l'array è molto grande.

    // !$new_password[] = array_rand($all_char) seleziona casualmente un indice dall'array $all_char utilizzando array_rand() e lo aggiunge alla fine dell'array $new_password. Ciò significa che il nuovo elemento aggiunto a $new_password sarebbe l'indice dell'elemento selezionato, non l'elemento stesso.Mentre $all_char[array_rand($all_char)] seleziona casualmente un elemento dall'array $all_char utilizzando array_rand() e lo aggiunge alla fine dell'array $new_password. Ciò significa che il nuovo elemento aggiunto a $new_password sarebbe l'elemento selezionato, non l'indice.
    ?>

