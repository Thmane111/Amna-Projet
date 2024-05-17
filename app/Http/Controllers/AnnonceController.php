<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ImageProduct;
use App\Models\categorie;
use App\Models\sous_categorie;
class AnnonceController extends Controller
{
    public function index()
    {
        $annonce=Product::all();
        $annonce_count=Product::all()->count();
        return view('Espace-Admin.module-market-place.produit.index',compact('annonce','annonce_count'));
    }


    public function show($id)
    {
        $voirs=Product::All()->where('id','=',$id)->first();
        $img1=ImageProduct::all()->where('product_id','=',$id)->first();

        $img = ImageProduct::where('product_id', '=',$id)
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();
        return view('Espace-Admin.module-market-place.produit.view',compact('voirs','img','img1'));
    }


    public function edit($id)
    {
        $modif=Product::findOrFail($id);
        $categorie=categorie::all()->where('etat','=',1);
        $sous_categorie=sous_categorie::all()->where('etat','=',1);
        return view('Espace-Admin.module-market-place.produit.edit',compact('modif','categorie','sous_categorie'));
    }

    public function update(Request $request,$id)
    {
        $validateDate=$request->validate([
            'titre'=>'required|string|Max:40',






    ]);


    $save= Product::find($id);
    $save->titre_prod =$request->titre;

      if($request->category=="0"){
        $save->category_id=$request->category2;
      }else{
        $save->category_id=$request->category;
      }

      if($request->sous_category=="0"){
        $save->sous__categorie_id=$request->sous_category2;
      }else{
        $save->sous__categorie_id=$request->sous_category;
      }


        $save->description =$request->description;
   $save->update();
   return BACK()->with('message',"Modification reussi !");
    }





    public function state(Request $request)
    {
        $mod=Product::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="produit Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="produit Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);



    }

    public function Destroy(Request $request,$id){
        $del=Product::findOrFail($request->id_f);
        $del->delete();
            return BACK()->with("message","Suppression reussi Avec Success");

    }
}
