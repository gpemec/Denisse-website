<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];


if(@$_GET['q']== 'quiz' && @$_GET['step']== 2 && @$_GET['eid'] == 'asdkjg51ap') {
    $eid=@$_GET['eid'];
//    $total=@$_GET['t'];
    $qid=@$_GET['qid'];
    $optionid=@$_POST['optionid'];
    $latte= @$_GET['page'];
    $i_1= $latte + 1; 
    $colector = @$_POST;
    $japon= $_SESSION['pivote'];

$list_scores = [1, 0, 0];
$user_answer = $colector['answer'];
$user_np = $colector['bnumq'];
$user_typescore = $colector['stype'];   

if ( array_key_exists( 0, $user_np)) {
    $c=0;
        $puntaje[$c] = $user_answer[$c] * $list_scores[$user_typescore[$c]]; 
    }
//  Respuesta
    $suma = ($puntaje);
// Insertando en DB
    $q=mysqli_query($con,"INSERT INTO clonehistory VALUES('$email','$eid','','','',
    '','$suma', '', '', '',
    '', '', '', '', NOW() )");
    echo 'Cuando las otras llegan  ' , '<br>' ;
    header("location:account.php?q=result&eid=$eid");
}


//   AQUI INICIA la PROGRAMACION PARA EL QUIZ 2
if(@$_GET['q']== 'quiz' && @$_GET['step']== '2' && @$_GET['eid']== 'kmasa873m' ) {
    $eid=@$_GET['eid']; 
    $total=@$_GET['t'];
    $qid=@$_GET['qid'];
    //$part=@$_GET['part'];

    $optionid=@$_POST['optionid'];
    $latte= @$_GET['page'];
    $i_1= $latte + 1; 
    $colector = @$_POST;
    $japon= $_SESSION['pivote'];

//Acumulador para cada una de las personas
 $list_scores = [1, 1, 1, 1];
    
$user_answer = $colector['answer'];
$user_np = $colector['bnumq'];  
$user_typescore = $colector['stype'];   

if ( array_key_exists( 0, $user_np)) {
    echo 'Primer registro ' , '<br>' ;  
    $c=0;
        $puntaje[$c] = $user_answer[$c] * $list_scores[$user_typescore[$c]]; 
    
//  Cantidad de personas 
    $suma = array_sum($puntaje);
//  Es el numero de personas seleccionadas
    $count_userselecc = array_sum($user_answer);
// Insertando en DB
    $q=mysqli_query($con,"INSERT INTO clonehistory VALUES('$email','$eid','','','',
    '','$suma', '', '', '',
    '$count_userselecc', '', '', '', NOW() )");
    header("location:account.php?q=quiz&step=1&eid=$eid&page=$i_1");
}
else {
    if($latte == $japon){
        for ($c= min(array_keys($user_np)); $c <=max(array_keys($user_np)); $c++) {
            $puntaje[$c] = $user_answer[$c] * $list_scores[$user_typescore[$c]]; 
        }
    //  Confirmacion  
        $suma = array_sum($puntaje);
    //  Es el numero de personas seleccionadas
        $count_userselecc = array_sum($user_answer);
    // Insertando en DB
        $qq=mysqli_query($con, "UPDATE `clonehistory` SET `S2`= '$suma' ,`R2`='$count_userselecc' WHERE email = '$email' AND eid = '$eid' ");
        header("location:account.php?q=result&eid=$eid");
        }
    }
}


?> 



