<?php 
session_start();

function display_todo(){
   if(isset($_SESSION['incomplete'])){
       foreach($_SESSION['incomplete'] as $key => $val){
           echo "<li><input type = 'checkbox' name = 'check'></li>
           <label>".$val."</label>
        <button class='' id ='edit' data-edit=".$key."  name='editBtn'>Edit</button>
        <button class='' id='delete' data-delete=".$key."  name='detBtn'>delete</button>
        <input type='hidden' name='todoid' value=".$key." ></li>" ;

        
       }
   }
else{
    echo " " ;
}}

if(isset($_POST['input'])){
    
        if (isset($_SESSION['incomplete'])){
            array_push($_SESSION['incomplete'], $_POST['input']);
        }
        else{
            $_SESSION['incomplete'] = array($_POST['input']);
        }
        
        echo json_encode($_SESSION['incomplete']);
       }
if(isset($_POST['editBtn'])){
    // $val = $_POST['editBtn'];
    // foreach($_SESSION['incomplete'] as $key => $val){
    //     if()
    // }
    echo json_encode($_SESSION['incomplete']);

}
if(isset($_POST['new_val'])){
    if(isset($_SESSION['incomplete'])){
        foreach($_SESSION['incomplete'] as $key => $val){
            if($key == $_POST['update_id']){
                $_SESSION['incomplete'][$key] = $_POST['new_val'];
            }
        }
        echo json_encode($_SESSION['incomplete']);
    }
}
if(isset($_POST['del_Btn'])){
    if(isset($_SESSION['incomplete'])){
        array_splice($_SESSION['incomplete'],$_POST['del_Btn'],1);
        echo json_encode($_SESSION['incomplete']);
    }
}
?>