<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class BlogController extends Controller
{
    public function IndexBlog(){

        $blog=Blog::all();
        $blog_count=Blog::all()->count();
        return view('Espace-Admin.module-site-web.blog.index',compact('blog','blog_count'));
    }

    public function CreateBlog(){

        $blog=BlogCategory::orderBy('blog_category','ASC')->get();
        $icon=Icon::all();

        return view('Espace-Admin.module-site-web.blog.add',compact('blog','icon'));
    }


    public function StoreBlog(Request $request){
        $valid=$request->validate([
            'blog_titre'=>'required|string',
            'blogcategory'=>'required|string',
            'tag'=>'required|string',
            'image'=>'required|image|mimes:jpg,png,jiff,svg,jpeg|Max:2048',

        ]);

        if($request->hasfile('image')){
            $file= $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= 'Dtic-'.time(). '.'. $extension;
            $file->move('photo/blog/',$filename);

        }else{
            return $request ;
            $save->image='';
        }
        if($request->icon_id==0){
            $icon=0;
        }else{
            $icon=$request->icon_id;
        }
        Blog::insert([
          'blog_category_id'=>$request->blogcategory,
          'blog_title'=>$request->blog_titre,
          'blog_tag'=>$request->tag,
          'blog_description'=>$request->description,
          'blog_image'=>$filename,
          'etat'=>0,
          'icon_id'=>$icon,

        ]);


        $notification=array(
            'message'=>'Enregistrement reussi',
            'alert-type'=>'success'
        );
        return BACK()->with($notification);


    }

// Edit
    public function EditBlog($id){

        $modif=Blog::findOrFail($id);
        $blog=BlogCategory::orderBy('blog_category','ASC')->get();
        $icon=Icon::all();

        return view('Espace-Admin.module-site-web.blog.edit',compact('blog','modif','icon'));
    }



    //update
    public function UpdateBlog(Request $request,$id){
        $valid=$request->validate([
            'blog_titre'=>'required|string',
            'tag'=>'required|string',


        ]);

        $save=Blog::find($id);
        if($request->hasfile('image')){
            $destination="photo/blog/".$save->image;
            if(File::exists($destination)){
               File::delete($destination);
            }
           $file= $request->file('image');
           $extension= $file->getClientOriginalExtension();
           $filename='Dtic-'.time(). '.'. $extension;
           $file->move('photo/blog/',$filename);
           $save->blog_image=$filename;
       }else{

           $save->blog_image=$request->image2;
       }

       if($request->blog_category==0){
        $save->blog_category_id=$request->blogcategory2;
       }else{
        $save->blog_category_id=$request->blogcategory;
       }
       if($request->icon_id==0){
        $save->icon_id=$request->icon2;
       }else{
        $save->icon_id=$request->icon_id;
       }
       $save->blog_title=$request->blog_titre;
       $save->blog_tag=$request->tag;
       $save->blog_description=$request->description;
       $save->update();
        $notification=array(
            'message'=>'Enregistrement reussi',
            'alert-type'=>'success'
        );
        return BACK()->with($notification);


    }


    public function ShowBlog($id){
        $voirs=Blog::All()->where('id','=',$id)->first();

        return view('Espace-Admin.module-site-web.blog.view',compact('voirs'));
    }

    public function DestroyBlog(Request $request){
        $clients=Blog::findOrFail($request->id);
        $verifier=Blog::all()->where('id','=',$request->id)->first();
        $destination="photo/blog/".$verifier->blog_image;
        if(File::exists($destination)){
           File::delete($destination);
        }
        $clients->delete();

            return BACK()->with("message","Suppression reussi Avec Success");

    }


    public function StateBlog(Request $request,$id)
    {
        $mod=Blog::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Blog Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Blog Désactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
