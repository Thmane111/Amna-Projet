<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\CategoryEvent;
use App\Models\Type_Ticket;
use App\Models\Ticket;
use App\Models\Admin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event=Event::all();
        return view('Espace-Admin.Evenement.index',compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_T=Type_Ticket::all();
        return view('Espace-Admin.Evenement.add',compact('type_T'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateDate=$request->validate([
            'nom_event'=>'required|string',
            'lieu_event'=>'required|string',
            'date_event'=>'required|date',
            'phone'=>'required|string',
            'time_event'=>'required|string',
            'nombre_event'=>'required|integer',
            'email'=>'required|string|unique:clients',
            'adresse'=>'required|string',
            'image'=>'required|image|mimes:jpg,png,jiff,svg,jpeg|Max:2048'
    ]);

    $save=new Event;


    $save->user_id=1;
    $save->category_event_id=1;
    $save->Nom_Event=$request->nom_event;
    $save->Detail_Event=$request->detail_event;
    $save->Date_Event=$request->date_event;
    $save->Heure_Event=$request->time_event;
    $save->Lieu_Event=$request->lieu_event;
    $save->Nombre_Ticket=$request->nombre_event;
    $save->save();
   $cc=0;
    $compteur_type_ticket=Type_Ticket::all()->count();

    if($compteur_type_ticket!=0){


    $ll_type_ticket=Type_Ticket::all()->where('nom','vip')->first();
    $ll_type_ticket2=Type_Ticket::all()->where('nom','prestige')->first();


        if($request->filled('ticket_vip')){
            for($i=1; $i<=$request->ticket_vip; $i++){

                $save1=new Ticket;
                $save1->event_id=$save->id;
                $save1->type__ticket_id=$ll_type_ticket->id;
                $save1->Numero_Ticket=12344;
                $save1->prix=$request->prix_vip;
                $save1->save();

            }
        }else{
            echo '';
        }

        if($request->filled('ticket_log')){
            for($i=1; $i<=$request->ticket_log; $i++){
                $save1=new Ticket;
                $save1->event_id=$save->id;
                $save1->type__ticket_id=$ll_type_ticket2->id;
                $save1->Numero_Ticket=12344;
                $save1->prix=$request->prix_log;
                $save1->save();
            }
        }else{
            echo '';
        }


        Alert::success('Enregistrer ');
        return BACK()->with('message',"reussi");;

    }


   dd($cc);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }










    public function getPrenom($mail)
{
     $html=" ";
    $sous= Admin::where('email', $mail)->first();
        $html.= $sous->prenom.' '.$sous->name;
    return response()->json($html);
}


public function getTel($mail)
{
     $html2=" ";
    $sous= Admin::where('email', $mail)->first();
        $html2.= $sous->telephone;
    return response()->json($html2);
}


public function getAdresse($mail)
{
     $html3=" ";
    $sous= Admin::where('email', $mail)->first();
        $html3.= $sous->adresse;
    return response()->json($html3);
}

public function getChamp1($id1,$id2)
{
     $html3=" ";
    $sous= Type_Ticket::where('id', $id2)->first();
    if($id1==1){


    $html3.= '  <div class="col-md">
    <small class="text-light fw-medium d-block">Ticket '.$sous->nom.'</small>
    <div class="form-check form-check-inline mt-3">
      <input class="form-check-input" type="number"  name="ticket_vip" style="width: 100px;" />
      <label class="form-check-label" for="inlineCheckbox1"  style="margin-left: 5px;">nombre</label>
    </div>
    <div class="form-check form-check-inline" >
      <input class="form-check-input" type="text" name="prix_vip" style="width: 100px;"  />
      <label class="form-check-label" for="inlineCheckbox2" style="margin-left: 5px;">Prix</label>
    </div>

    </div>';
    }else{
        $html3.='';
    }
    return response()->json($html3);
}

public function getChamp2($id1,$id2)
{
     $html3=" ";
    $sous= Type_Ticket::where('id', $id2)->first();
    if($id1==1){


    $html3.= '  <div class="col-md">
    <small class="text-light fw-medium d-block">Ticket '.$sous->nom.'</small>
    <div class="form-check form-check-inline mt-3">
      <input class="form-check-input" type="number"  name="ticket_log" style="width: 100px;" />
      <label class="form-check-label" for="inlineCheckbox1"  style="margin-left: 5px;">nombre</label>
    </div>
    <div class="form-check form-check-inline" >
      <input class="form-check-input" type="text" name="prix_log" style="width: 100px;"  />
      <label class="form-check-label" for="inlineCheckbox2" style="margin-left: 5px;">Prix</label>
    </div>

    </div>';
    }else{
        $html3.='';
    }
    return response()->json($html3);
}
}



