<?php 
                        if(isset($_POST['edit_dash'])){

                        
                                            $id_ed=$_POST['id_com'];
                                            $nom_ed=$_POST['nom'];
                                            $prenom_ed=$_POST['prenom'];
                                            $tel_ed=$_POST['tel'];
                                     $error=[];

                                            $req_ed="SELECT * FROM compte where id='".$id_ed."'";
                                            $exe_ed=$bdd->query($req_ed);
                                            $row_ed=$exe_ed->rowCount();

                                            if($row_ed!=0){
                                                $line_ed=$exe_ed->fetch(PDO::FETCH_ASSOC);
                                                extract($line_ed);
                                                $nom_cp=$line_ed['nom'];
                                                $prenom_cp=$line_ed['prenom'];
                                                $tel_cp=$line_ed['tel'];
                                            }
                                         

                                         if(empty($_FILES['photo']['name'])){
                                            if(empty($_POST['nom'])){
                                                echo "
                                                <script type='text/javascript'>
                                                  alert('le champs du nom est vide');
                                                window.location.href='./?page=dashbord';
                                                </script>
                                               "; die(); 
                                            }else

                                            if(mb_strlen($nom_ed) <= 1 || mb_strlen($nom_ed) >7  ){
                                               
                                                echo "
                                                <script type='text/javascript'>
                                                  alert('Veuillez un nom valide');
                                                window.location.href='./?page=dashbord';
                                                </script>
                                               "; die();
                                               }

                                               if(empty($_POST['prenom'])){
                                                echo "
                                                <script type='text/javascript'>
                                                  alert('le champs du prenom est vide');
                                                window.location.href='./?page=dashbord';
                                                </script>
                                               "; die(); 
                                            }else
                                            
                                               if(mb_strlen($prenom_ed) <=1 || mb_strlen($prenom_ed) >12){
                                               
                                                echo "
                                                <script type='text/javascript'>
                                                  alert('Veuillez donnes un prenom valide');
                                                window.location.href='./?page=dashbord';
                                                </script>
                                               "; die();
                                               }
                                            
                                           
                                               if(empty($_POST['tel'])){
                                                echo "
                                                <script type='text/javascript'>
                                                  alert('le champs telephone est vide');
                                                window.location.href='./?page=dashbord';
                                                </script>
                                               "; die(); 
                                            }else
                                               if(! filter_var($tel_ed, FILTER_VALIDATE_INT)){
                                              
                                                echo "
                                                <script type='text/javascript'>
                                                  alert('Numero téléphone incorrect');
                                                window.location.href='./?page=dashbord';
                                                </script>
                                               "; die();
                                               }
                                            
                                             if(count($error)==0){

                                             
                                            if($nom_ed==$nom_cp){
                                                if($prenom_ed==$prenom_cp){
                                                    if($tel_ed==$tel_cp){
                                                        $req_update1="UPDATE compte SET nom='".$nom_ed."',prenom='".$prenom_ed."',tel='".$tel_ed."' where id='".$id_ed."' ";
                                                        $exe_update1=$bdd->query($req_update1);
                                                        echo "
                                                        <script type='text/javascript'>
                                                         alert('reussi 1');
                                                        window.location.href='./';
                                                        </script>
                                                       "; die();

                                                    }else if($tel_ed!=$tel_cp){
                                                        $req_update2="UPDATE compte SET tel='".$tel_ed."' where id='".$id_ed."' ";
                                                        $exe_update2=$bdd->query($req_update2);
                                                        echo "
                                                        <script type='text/javascript'>
                                                         alert('reussi 2');
                                                        window.location.href='./';
                                                        </script>
                                                       "; die();
                                                    }
                                                }else if($prenom_ed!=$prenom_cp){
                                                    $req_update3="UPDATE compte SET prenom='".$prenom_ed."',tel='".$tel_ed."' where id='".$id_ed."' ";
                                                    $exe_update3=$bdd->query($req_update3);
                                                    echo "
                                                    <script type='text/javascript'>
                                                     alert('reussi 3');
                                                    window.location.href='./';
                                                    </script>
                                                   "; die();
                                                }
                                            }elseif($nom_ed!=$nom_cp){
                                                if($prenom_ed==$prenom_cp){
                                                    if($tel_ed==$tel_cp){
                                                        $req_update4="UPDATE compte SET nom='".$nom_ed."' where id='".$id_ed."' ";
                                                        $exe_update4=$bdd->query($req_update4);
                                                        echo "
                                                        <script type='text/javascript'>
                                                         alert('reussi 4');
                                                        window.location.href='./?page=dashbord';
                                                        </script>
                                                       "; die();
    }else if($tel_ed!=$tel_cp){
    $req_update5="UPDATE compte SET nom='".$nom_ed."',tel='".$tel_ed."' where id='".$id_ed."' ";
    $exe_update5=$bdd->query($req_update5);
    echo "
    <script type='text/javascript'>
    alert('reussi 5');
    window.location.href='./?page=dashbord'
     </script>
     "; die();
        }
    }elseif($prenom_ed!=$prenom_cp){
                if($tel_ed!=$tel_cp){
                    $req_update6="UPDATE compte SET nom='".$nom_ed."',prenom='".$prenom_ed."',tel='".$tel_ed."' where id='".$id_ed."' ";
                    $exe_update6=$bdd->query($req_update6);
                    echo "
                    <script type='text/javascript'>
                    alert('reussi 6');
                     window.location.href='./?page=dashbord';
                     </script>
                        "; die();
                }elseif($tel_ed==$tel_cp){
                    $req_update7="UPDATE compte SET nom='".$nom_ed."',prenom='".$prenom_ed."' where id='".$id_ed."' ";
                    $exe_update7=$bdd->query($req_update7);
                    echo "
                    <script type='text/javascript'>
                    alert('reussi 7');
                     window.location.href='./?page=dashbord';
                     </script>
                        "; die();
                }                                      

    
            }
                }
                 }
                    }
                    }
     ?>