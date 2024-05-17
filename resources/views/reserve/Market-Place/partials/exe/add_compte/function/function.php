
<?php

if(!function_exists('not_empty')){
function not_empty($fields = []){
   if(count($fields) !=0){
     foreach($fields as $field ){
      if(empty($_POST[$field]) || trim($_POST[$field])== ""){
        return false;
      }
     }
     return true;
   }
}
}

if(!function_exists('save_input_data')){
function save_input_data(){
    foreach($_POST as $key => $value){
        if(strpos($key,'pass1')=== false){
            $_SESSION['input'][$key] = $value;
        }
      
    }
  }
}

if(!function_exists('get_input')){
  function get_input($key){
    return !empty($_SESSION['input'][$key])
     ? $_SESSION['input'][$key]
     : null;
  }
}



if(!function_exists('clear_input_data')){
  function clear_input_data(){
     if(isset($_SESSION['input'])){
      $_SESSION['input']= [];
     }
  }
}



?>