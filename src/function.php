<?php 
session_start();



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

if(isset($_POST['checked'])){
    $_SESSION['temp'] = $_SESSION['incomplete'][$_POST['checked']] ; 
    array_splice($_SESSION['incomplete'],$_POST['checked'],1);
    if(isset($_SESSION['complete'])){
    array_push($_SESSION['complete'],$_SESSION['temp']);
    
}
else{
    $_SESSION['complete'] = array($_SESSION['temp']);
}
$myArr=array();
$myArr['incomplete'] = $_SESSION['incomplete'];
$myArr['complete'] = $_SESSION['complete'];
echo json_encode($myArr);


}
if(isset($_POST['unchecked'])){
    $_SESSION['temp'] = $_SESSION['complete'][$_POST['unchecked']] ; 
    array_splice($_SESSION['complete'],$_POST['unchecked'],1);
    if(isset($_SESSION['incomplete'])){
    array_push($_SESSION['incomplete'],$_SESSION['temp']);
    
}
else{
    $_SESSION['incomplete'] = array($_SESSION['temp']);
}
$myArr=array();
$myArr['incomplete'] = $_SESSION['incomplete'];
$myArr['complete'] = $_SESSION['complete'];
echo json_encode($myArr);
}
?>