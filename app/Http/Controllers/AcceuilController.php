<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ImageProduct;
use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function show($id)
    {
        $voirs=Product::All()->where('id','=',$id)->first();
        $img=ImageProduct::all()->where('product_id','=',$voirs->id);

        $sous_prd=Product::all()->where('sous__categorie_id',$voirs->sous__categorie_id)
        ->where('id','!=',$voirs->id)
        ;



        return view('Market-Place.Annonceur.custom.custom_produit',compact('voirs','img','sous_prd'));
    }
}
