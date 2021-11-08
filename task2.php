<?php 
declare(strict_types = 1);

function nextChar(string $char):string{
    if ($char === "z") {
        $apperance_char = ++$char;
        return substr($apperance_char, 0, -1);   //when input 'z' output 'aa' , and we try to remove last char

    }else{
        return ++$char;
    }
    
}

echo nextChar('a');

?>