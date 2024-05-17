<?php 
                        if(isset($_POST['edit_prof'])){

                        
                                            $id_ed=$_POST['id_com'];
                                        
                                  

                                            $req_ed="SELECT * FROM compte where id='".$id_ed."'";
                                            $exe_ed=$bdd->query($req_ed);
                                            $row_ed=$exe_ed->rowCount();

                                            if($row_ed!=0){
                                                $line_ed=$exe_ed->fetch(PDO::FETCH_ASSOC);
                                                extract($line_ed);
                                            
                                                $img_compte=$line_ed['image'];
                                            }
                                         

                                         if(!empty($_FILES['photo']['name'])){
                                

                                                 
                                          $cible='./compte/dist/img/';
                                          $extensions=array('.jpg','.gif','.jpeg','.png','.JPG','.GIF','.JPEG','.PNG');
                                          $extension_1=strrchr($_FILES['photo']['name'],'.');
                                          $nom_file_1=$_FILES['photo']['name'];
                                          $taille_1=$_FILES['photo']['size'];
                                          $tmp_1=$_FILES['photo']['tmp_name'];
                       
                                          if((strstr($nom_file_1,"."))!=""){
                                            if(!in_array($extension_1,$extensions)){
                                          
                                              echo "
                                              <script type='text/javascript'>
                                            alert('Extensions Non autorises ');
                                              window.location.href='./?page=dashbord';
                                              </script>
                                             "; die();
                                        
                                         
                                            }else {
                                              //formatage du nom fichier
                                               if(move_uploaded_file($_FILES['photo']['tmp_name'],$cible.$nom_file_1)){
                                                
                                                $req_update="UPDATE compte SET image='".$nom_file_1."' where id='".$id_ed."' ";
                                                $exe_update=$bdd->query($req_update);
                                                echo "
                                                <script type='text/javascript'>
                                                 alert('reussi 1');
                                                window.location.href='./?page=dashbord';
                                                </script>
                                               "; die();
                                     
                                          }
                                        }
                                         }
                                          }
                                }
             
     ?>