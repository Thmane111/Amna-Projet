<?php

namespace App\Http\Controllers;
use App\Models\NavigueMenu;
use App\Models\Categorie;
use App\Models\sous_categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class NavBarController extends Controller
{
    public function nav1($id)
    {

        $recherche_count=Product::all()->where('category_id',$id)->count();
        $recherche=Product::all()->where('category_id',$id);
        $cato=sous_categorie::all()->where('categorie_id',$id);

        return view('Front.categorie.categorie_1',compact('recherche','recherche_count','cato'));
    }

    public function nav2($id1,$id2)
    {

        $recherche_count=Product::all()->where('category_id',$id1)
        ->where('sous__categorie_id',$id2)
        ->count();
        $recherche=Product::all()->where('category_id',$id1)
        ->where('sous__categorie_id',$id2);
        $cato=sous_categorie::all()->where('categorie_id',$id2);

        return view('Front.categorie.categorie_1',compact('recherche','recherche_count','cato'));
    }
}
