<?php
  include('function/function.php');
if(isset($_POST['valider']) && empty($_POST['valider'])){


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$mot_pass1=$_POST['pass1'];
$mot_pass2=$_POST['pass2'];


$date= date('y/m/d h:i:s');
$error=[];
if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['tel']) || empty($_POST['email']) || empty($_POST['pass1']) || empty($_POST['pass2'])){

    $error[]="Veuillez remplire tout les champs ! ";
    
}
else{
  
   if(mb_strlen($nom) < 1 && mb_strlen($nom) >7  ){
    $error[]="Veuillez un nom valide";
   }

   if(mb_strlen($prenom) < 1 && mb_strlen($prenom) >12){
    $error[]="Veuillez donnes un prenom valide";
   }

   if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error[]="Adresse Email Non valide";
   }

   if(! filter_var($tel, FILTER_VALIDATE_INT)){
    $error[]="Numero téléphone incorrect";
   }




   if(mb_strlen($mot_pass1) <6 ){
    $error[]="Mininium 6 caracters";
   }else{
    if($mot_pass1!=$mot_pass2){
       $error[]="Les deux mot de passe ne concordent pas";
    }else{
              
$sql="SELECT email FROM compte where email='".$email."' ";
$exe=$bdd->query($sql);
$nbre=$exe->rowcount();


if($nbre!=0){
 $error[]="Email deja utilisez";
}else if($nbre==0){

  if(count($error)==0){

  
  $etat=0;
  $delettable=0;
  $connect=0;
  $cle_activ=0;
  $image=0;

 
    
        
       
    
    
  
    $requet=$bdd->prepare("Insert INTO compte(id,nom,prenom,email,tel,mot_passe,date_enreg,image,etat,deletable)
    
    VALUES(:id,:nom,:prenom,:email,:tel,:mot_passe,:date_enreg,:image,:etat,:deletable)");

    $requet->bindValue('id','',PDO::PARAM_INT);
    $requet->bindValue('nom',$nom,PDO::PARAM_STR);
    $requet->bindValue('prenom',$prenom,PDO::PARAM_STR);
    $requet->bindValue('email',$email,PDO::PARAM_STR);
    $requet->bindValue('tel',$tel,PDO::PARAM_INT);
    $requet->bindValue('mot_passe',md5($mot_pass1),PDO::PARAM_STR);
    $requet->bindValue('date_enreg',$date);
    $requet->bindValue('image',$image,PDO::PARAM_STR);
    $requet->bindValue('etat',$etat,PDO::PARAM_INT);
    $requet->bindValue('deletable',$delettable,PDO::PARAM_INT);

    $requet->execute() or die(print_r($requet->errorInfo()));
    echo "
    <script type='text/javascript'>
   
    window.location.href='../';
    </script>
   "; die();
}else if(count($error)!=0){
    save_input_data(); 
  } 
}
    }
  }

  save_input_data(); 

   







}

}else{
    clear_input_data();
}
?>