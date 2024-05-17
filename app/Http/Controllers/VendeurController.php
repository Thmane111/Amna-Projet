<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\Product;



use App\Models\sous_categorie;
use App\Models\User;


use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\ImageProduct;
use Intervention\Image\Exception\NotReadableException;

class VendeurController extends Controller
{
    public function index()
    {
        $prod_user=Product::all()->where('user_id','=',Auth::user()->id)
        ->where('deletable','=','0');
        $compt=Product::all()->where('user_id','=',Auth::user()->id)
        ->where('deletable','=','0')->count();

        return view('Market-Place.Annonceur.space_membre.dashbord_membre',compact('prod_user','compt'));
    }






    public function AjoutProd(Request $request)
    {


        $validateDate=$request->validate([
            'titre'=>'required|string|Max:37',
            'prix'=>'required|integer',
            'sous_cat'=>'required',
            'ville'=>'required|string',
            'phone'=>'required|integer'


    ]);

    $save= new Product;

    $save->titre_prod =$request->titre;
    $save->user_id =$request->id;
    $save->category_id =$request->cat;
    $save->sous__categorie_id=$request->sous_cat;
    $save->description =$request->detail;
    $save->livraison=$request->liv;
    $save->prix_prod =$request->prix;
    $save->ville=$request->ville;

   $save->deletable=0;
   $save->etat=0;
    if($request->of==0){
        $save->type_offre=0;
    }else{
        $save->type_offre=$request->of;
    }














$save->save();
$image=$request->file('image');
foreach($image as $images){

    $img =new ImageProduct;
        $file=$images;
        $extension=$file->getClientOriginalExtension();
        $filename='Expad-Rim-'. time(). '.'. $extension;
        $resize_image=Image::make($file->getRealPath());
        $destinationPath=public_path('/uploads/Annonce');
        $resize_image->resize(1000,800)->save($destinationPath.'/'.$filename);
        $destinationPath=$images->store('uploads/Annonce');
        $img->image=$filename;
        $img->product_id=$save->id;
$img->save();


}

   return BACK()->with('message',"Annonce enregistrer avec success !");

    }













    public function show($id)
    {
        $voirs=Product::All()->where('id','=',$id)->first();
        $img=ImageProduct::all()->where('product_id','=',$voirs->id);
        return view('Market-Place.Annonceur.custom.custom_detail',compact('voirs','img'));
    }












    public function edit($id)
    {
        $modif=Product::findOrFail($id);
        return view('Market-Place.Annonceur.space_membre.edit_produit',compact('modif'));
    }










    public function update(Request $request, $id)
    {

        $validateDate=$request->validate([
            'nom'=>'required|string|Max:50',
            'prenom'=>'required|string|Max:50',
            'tel'=>'required|integer',





    ]);
    $save= User::find($id);
    $save->name =$request->nom;
    $save->prenom =$request->prenom;
    $save->telephone =$request->tel;
    $save->save();
    return BACK()->with('message',"Modification reussi !");
    }












    public function veuille($id): RedirectResponse
    {
        $get_detail=Product::findOrFail($id);

        $get_detail->deletable=1;
        $get_detail->save();
        return redirect('/expad/annonceur');
    }











    public function update_profile(request $request,$id){

        $validateDate=$request->validate([
            'image'=>'required',


    ]);

    $save=user::find($id);
    if($request->hasfile('image')){
        $destination="photo/profile/".$save->image;
        if(File::exists($destination)){
           File::delete($destination);
        }
       $file= $request->file('image');
       $extension= $file->getClientOriginalExtension();
       $filename= time(). '.'. $extension;
       $file->move('photo/profile/',$filename);
       $save->profile=$filename;
   }else{
       return $request ;
       $save->profile='';
   }
   $save->update();
   return BACK()->with('message',"Enregistrement avec success !");

    }














    public function state($id)
    {
        $mod=User::findOrFail($id);
        if($mod->etat==0)
        {
            $etat=1;
            $message="utilisateur Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="utilisateur Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }










    public function form_annonce(){
        $countries=categorie::all()->where('id','!=',2)
        ->where('id','!=',3)
        ;




    return view('Market-Place.Annonceur.formulaire_annonce.formulaire_simple', compact('countries'));

    }







    public function immo_form(){
        $cat_imm=sous_categorie::all()->where('categorie_id','=',2);

        return view('Market-Place.Annonceur.formulaire_annonce.formulaire_immobiliers',compact('cat_imm'));
    }

    public function vih_annonce(){
        $cat_vih=sous_categorie::all()->where('categorie_id','=',3);
        return view('Market-Place.Annonceur.formulaire_annonce.formulaire_vihicules',compact('cat_vih'));
    }






    public function edit_prod($id)
    {
        $modif=Product::findOrFail($id);
        return view('Market-Place.Annonceur.space_membre.edit_produit',compact('modif'));
    }










    public function update_prod(Request $request,$id)
    {
        $validateDate=$request->validate([
            'titre'=>'required|string|Max:25',
            'prix'=>'required|integer',





    ]);


    $save= Product::find($id);
    $save->titre_prod =$request->titre;

      if($request->ville==""){
        $save->ville=$request->v_ville;
      }else{
        $save->ville=$request->ville;
      }

      if($request->detail==""){
        $save->description =$request->v_detail;
      }else{
        $save->description =$request->detail;
      }

    $save->prix_prod =$request->prix;

    $save->type_offre =0;






   $save->save();
   return BACK()->with('message',"Modification reussi !");
    }



    public function getCountry($id)
    {

         $html=" ";
        // $rid = $request->post('rid');
        // $countries= DB::table('countries')->where('region_id', $rid)->get();
        // dd($countries);

        $sous= sous_categorie::where('categorie_id', $id)->get();

        // dd($countries);


        foreach($sous as $souss){

            $html.= '  <option value="'.$souss->id.'">'.$souss->nom_type.'</option>';
        }
        return response()->json($html);




}


}
