<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Attribution;
use App\Models\Tache;
use App\Models\groupe;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groupe=groupe::all()->where('etat','=',1);


        return view('Back.permission.index',compact('groupe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //





                for($i=0 ; $i<$request->count;$i++){

                    $verifie = Permission::where([
                        'permission' => $request->tache[$i],
                        'groupe_id' => $request->groupe_id,
                        'module_id' => $request->module_id
                    ])->count();

                    if($verifie==0){

                    $save= new Permission;
                    $save->module_id =$request->module_id;
                    $save->groupe_id =$request->groupe_id;
                    $save->permission=$request->tache[$i];

                   //$states = $request->input('etat', []);
                        if (isset($request->etat[$i])) {
                            $save->etat =1;
                        } else {
                            $save->etat =0;
                        }

                    $save->deletable=0;
                    $save->save();

                    }else{
                        $verifie2 = Permission::where([
                            'permission' => $request->tache[$i],
                            'groupe_id' => $request->groupe_id,
                            'module_id' => $request->module_id
                        ])->first();

                        $save= Permission::find($verifie2->id);
  //$states = $request->input('etat', []);
                        if (isset($request->etat[$i])) {
                            $save->etat =1;
                        } else {
                            $save->etat =0;
                        }

                        $save->update();


                    }

                }
                return BACK()->with('message',"reussi2 !");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voirs=tache::All()->where('module_id','=',$id)->first();
        return  view('Back.permission.permission',compact('$voirs'));
    }


    public function permi2($id,$id2)
    {
       $vq=Permission::all()->where('module_id','=',$id)
       ->where('groupe_id','=',$id2)->count();
       if($vq!=0){
        $vq2=Permission::all()->where('module_id','=',$id)
        ->where('groupe_id','=',$id2);
       }else{
        $vq2=" ";
       }

        $voirs=tache::All()->where('module_id','=',$id)
        ->where('etat','=',1)
        ;
        $count_voirs=tache::All()->where('module_id','=',$id)->count();
        $groupe=groupe::all()->where('id','=',$id2)->first();
        return  view('Back.permission.permission',compact('voirs','groupe','count_voirs','vq2','vq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}

?>
