<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Den &amp;David  </title>


    <link rel="stylesheet" href="style.css">

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
    
</head>          

<body>
    <div class="header">
        <div class="row">
            <div class="col-lg-6">
                <span class="logo">. </span></div>
            <div class="col-md-4 col-md-offset-2">
                <?php
 include_once 'dbConnection.php';
session_start();
    if(!(isset($_SESSION['email']))){
    header("location:index.php");

    }
    else
    {

    $email=$_SESSION['email'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1">
&nbsp;&nbsp;
<a href="logout.php?q=account.php" class="log">
<img src="image/signs1.png " alt="logo">
&nbsp;Salir</button></a></span>';
}?>
            </div>
        </div>
    </div>
    <div class="bg responderinvita">

        <div class="container">
            <!--container start-->
            <div class="row">
                <div class="col-md-12">
                    <!--home start-->


<?php
//                    Para 1 persona
if(@$_GET['q']== 'quiz' && @$_GET['step']== 1 && @$_GET['eid'] == 'asdkjg51ap') {
    $eid=@$_GET['eid']; 
    $sn=@$_GET['sn'];
    $total=@$_GET['t'];
    $page=@$_GET['page'];
    if ($page == 1) {
    $indpar= $page; 
    $sqlw =mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND part='$page' ORDER BY sn ASC "); 
    $extra = $sqlw->fetch_assoc();
    $pivote = $extra['ciclo'];   
        $_SESSION['pivote'] = $pivote;

    $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND part='$indpar' ORDER BY sn ASC " );
    
    echo '<div class="panel" style="margin:2%">';
    echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&page='.$page.'" method="POST" class="form-horizontal"> ';
    while($row=mysqli_fetch_array($q)) {
        $qns=$row['qns'];
        $qid=$row['qid'];
        $sn=$row['sn'];
        $ciclo=$row['ciclo'];
        $stype = $row['type_score'];
        // Formato para la prgunta        
        echo '<div class="solitarie">
        <b><br>'.$qns.'</b><br><br>'; 
        $jojo=mysqli_query($con,"SELECT * FROM options WHERE qid='$eid' "); 
        $negind = $sn - 1; 
            foreach ($jojo as $row) {
                $option=$row['option'];
                $optionid=$row['optionid'];
            echo' <label> <input type="radio" 
            name="answer['.$negind.']" value="'.$optionid.'" required> '.$option.'</label><br><br>';
            echo '<input type="hidden" name="bnumq['.$negind.']"  value="'.$sn.'">';
            echo '<input type="hidden" name="stype['.$negind.']" value="'.$stype.'">';
        } 
     }
    echo'<br><button type="submit" class="btn btn-primary btn-solitarie"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Enviar</button></form></div>';
    }

}
    

//    Para personas que pueden tener algún invitado
                    
    if(@$_GET['q']== 'quiz' && @$_GET['step']== 1 && @$_GET['eid'] == 'kmasa873m') {
    $eid=@$_GET['eid']; 
    $sn=@$_GET['sn'];
    $total=@$_GET['t'];
    $page=@$_GET['page'];
    if ($page == 1) {
    $indpar= $page; 
//        Se obtienen las preguntas
    $sqlw =mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND part='$page' ORDER BY sn ASC "); 
    $extra = $sqlw->fetch_assoc();
    $pivote = $extra['ciclo'];   

    $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND part='$indpar' ORDER BY sn ASC " );
    
    echo '<div class="panel" style="margin:2%">';
    echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&page='.$page.'" method="POST" class="form-horizontal"> ';
    while($row=mysqli_fetch_array($q)) {
        $qns=$row['qns'];
        $qid=$row['qid'];
        $sn=$row['sn'];
        $ciclo=$row['ciclo'];
        $stype = $row['type_score'];       
        echo '<div class="solitarie"> <b>'.$qns.'</b><br>'; 
        $jojo=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' "); 
        $negind = $sn - 1; 
            foreach ($jojo as $row) {
                $option=$row['option'];
                $optionid=$row['optionid'];
            echo' <label> <input type="radio" 
            name="answer['.$negind.']" value="'.$optionid.'" required> '.$option.'</label><br><br>';
            echo '<input type="hidden" name="bnumq['.$negind.']"  value="'.$sn.'">';
            echo '<input type="hidden" name="stype['.$negind.']" value="'.$stype.'">';
        } 
     }
    echo'<br><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Enviar_</button></form></div></div>';
    }

//    Obtiene informacion para la siguiente ronda de preguntas
    $copia  = $page; 
    $sqlw =mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND part='$page' ORDER BY sn ASC "); 
    $extra = $sqlw->fetch_assoc();
    $pivote = $extra['ciclo'];
    echo '<br>'; 
     $_SESSION['pivote'] = $pivote;
   $page=@$_GET['page']; 
        
 if ($page > 1 && $page <= $pivote) {
//     Obtiene las preguntas
        $indpar = $page;
        $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND part='$page' ORDER BY sn ASC " );
        echo '<div class="panel" style="margin:5%">';
        echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&page='.$indpar.'" method="POST" class="form-horizontal"> ';
        while($row=mysqli_fetch_array($q)) {
            $qns=$row['qns'];  
            $qid=$row['qid'];
            $sn=$row['sn'];
            $ciclo=$row['ciclo'];           
            $stype = $row['type_score'];
            echo '<div class="solitarie">
            <b><br>'.$qns.'</b><br>';
            $jojo=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' ");
            $negind = $sn - 1;
            foreach($jojo as $row) {
                $option=$row['option'];
                $optionid=$row['optionid'];
                echo' <div class="col-sm-2 ppp" >  
                <label> <input type="radio" 
                name="answer['.$negind.']" value="'.$optionid.'" required> '.$option.'</label></div>';

                 echo '<input type="hidden" name="bnumq['.$negind.']" value="'.$sn.'">';
                echo '<input type="hidden" name="stype['.$negind.']" value="'.$stype.'">';
            }
         }
//        Boton de enviar, continua el proceso hasta que sea necesario
        echo'<br><button type="submit" class="btn btn-primary btn-solitarie"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Enviar</button></form></div></div>'; 

    }

}                 
       
                    
    /*  Al terminar las preguntas, muestra un mensaje final */
               
    if(@$_GET['q']== 'result' && @$_GET['eid'] ) {
    $eid=@$_GET['eid'];
    echo '<div class="panel">
        <center><h1 class="title" style="color:#0c6980; margin-top:20px">Gracias por tu respuesta!</h1><center>
        <br/><table class="table table-striped title1" style="font-size:20;font-weight:bold;">';
    }
                
?>

                </div>
            </div>
        </div>
    </div>
    <!--Seccion de pie de pagina -->
    <div class="row footer">
    </div>

</body>

</html>
