<?php
  include('function/function.php');
if(isset($_POST['valider']) && empty($_POST['valider'])){


$login=$_POST['email'];
$pass=trim(md5($_POST['pass1']));



$date= date('y/m/d h:i:s');
$error=[];
if(empty($_POST['email']) || empty($_POST['pass1'])){

    $error[]="Veuillez remplire tout les champs ! ";
    
}
else{
  
 
   if(! filter_var($login, FILTER_VALIDATE_EMAIL)){
    $error[]="Adresse Email Non valide";
   }

   save_input_data(); 
   
$sql=$bdd->prepare="SELECT nom,prenom,email,mot_passe FROM compte where email='".$login."' and etat=1";
$exe=$bdd->query($sql);
$row=$exe->rowcount();

if($row!=0){
  $line=$exe->fetch(PDO::FETCH_ASSOC);
  extract($line);
  $nom=$line['nom'];
  $prenom=$line['prenom'];
  $login1=$line['email'];
  $mpass=$line['mot_passe'];

  if(strcmp($mpass,$pass)==0){
    if(count($error)==0){

    
   $_SESSION['diagne']=$login;
    echo "
    <script type='text/javascript'>
    alert('Bienvenue ".$prenom." ".$nom." sur votre espace');
    window.location.href='./?page=Acceuil';
    </script>
   "; die();
    }

  }else if(strcmp($mpass,$pass)!=0){
    $error[]="Mot de passe incorrecte";
  }
  
}else if($row==0){
  $error[]="Adresse Email Non valide";
}



        
  




   







}

}
?>