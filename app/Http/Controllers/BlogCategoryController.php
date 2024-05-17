<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
class BlogCategoryController extends Controller
{
    public function IndexBlogCategory(){

        $blogcategory=BlogCategory::all();
        $blogcategory_count=BlogCategory::all()->count();
        return view('Espace-Admin.module-site-web.blogcategory.index',compact('blogcategory','blogcategory_count'));
    }




    public function StoreBlogCategory(Request $request){
        $valid=$request->validate([
            'blogcategory'=>'required|string',
        ],[
            'blocategory.required'=>'champs vide',
        ]);


$ver=BlogCategory::all()->where('blog_category','=',$request->blogcategory)->count();
        if($ver==0){
        $save= new BlogCategory;
        $save->blog_category=$request->blogcategory;
        $save->etat=0;

        $save->save();
        return BACK()->with('message',"Enregistrement avec success !");
        }else{
            return BACK()->with('error',"Existe déja !");
        }

    }

    public function UpdateBlogCategory(Request $request,$id){
        $valid=$request->validate([
            'blogcategory'=>'required|string'
        ]);

$ver=BlogCategory::all()->where('blog_category','=',$request->blogcategory)
 ->where('id','=',$request->$id)
->count();
        if($ver==0){
            $save= BlogCategory::find($id);
        $save->blog_category=$request->blogcategory;


        $save->update();
        return BACK()->with('message',"Enregistrement avec success !");
        }else{
            return BACK()->with('error',"Existe déja !");
        }

    }

    public function DestroyBlogCategory(Request $request){
        $del=BlogCategory::findOrFail($request->id);
        $del->delete();
            return BACK()->with("message","Suppression reussi Avec Success");

    }
    public function StateBlogCategory(Request $request,$id)
    {
        $mod=BlogCategory::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Blog catégorie Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Blog catégorie Désactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
