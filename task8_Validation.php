<?php 


function clean($input){
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripcslashes($input);
        return $input;
}

function validation($input , $flag){   
$status = true;
    switch ($flag) {
        case 1:    //when enterd 1 as secound params which is flag , we will use empty test
            if (empty($input)) {
               $status = false;
            }
            break;
        case 2:
            if (strlen($input) < 100) {
                $status = false;
            }
            break;        



    }


    return $status;
}

?>