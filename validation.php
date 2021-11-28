<?php 


 class validator{


    public function  Clean($input){
      
        $value = trim($input);
        $value = htmlspecialchars($value);
        $value = stripcslashes($value);
        return $value;  
      
    } 
   
  
  
   public  function validate($input,$flag){
     
    $status = true;
    switch ($flag) {
        case 1:    
            if (empty($input)) {
               $status = false;
            }
            break;
        case 2:
            if (!filter_var($input , FILTER_VALIDATE_EMAIL)) {
                $status = false;
            }
            break;        
        
        case 3:
            if (!preg_match("/^[A-Za-z]*$/",$input)) {
                $status = false;
            }    
            break;

        case 4:
                if (!filter_var($input , FILTER_VALIDATE_INT)) {
                    $status = false;
                }
                break;    

       }
  
       return $status;
    }
    
   
    
 
  

 }


?>