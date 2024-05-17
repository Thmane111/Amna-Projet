<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temoignage=Temoignage::all();
        $temoignage_count=Temoignage::all()->count();
        return view('Espace-Admin.module-site-web.temoignage.index',compact('temoignage','temoignage_count'));
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
        $valid=$request->validate([
            'poste'=>'required|string',
            'detail'=>'required|image|mimes:jpg,png,jiff,svg,jpeg|Max:2048',

        ]);


        Temoignage::insert([
          'poste'=>$request->poste,
          'detail'=>$request->detail,
          'etat'=>0,
          'deletable'=>0,
          'user_id'=>1,
          'created_at'=>Carbon::now(),


        ]);


        $notification=array(
            'message'=>'Enregistrement reussi',
            'alert-type'=>'success'
        );
        return BACK()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show(Temoignage $temoignage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function edit(Temoignage $temoignage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temoignage $temoignage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temoignage $temoignage)
    {
        //
    }
}
