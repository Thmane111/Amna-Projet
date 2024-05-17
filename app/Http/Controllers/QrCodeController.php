<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Event;
use getID3;
use RealRashid\SweetAlert\Facades\Alert;
class QrCodeController extends Controller
{
    public function indexSC($id)
    {
        $vq_event=Event::all()->where('client_id',1)->first();
        $cpt_ticket_vip_T=Ticket::all()->where('event_id',$vq_event->id)
        ->where('type__ticket_id','=',1)->count();

        $cpt_ticket_vip_0=Ticket::all()->where('event_id',$vq_event->id)
        ->where('type__ticket_id','=',1)
        ->where('statut','=',0)->count();

        $cpt_ticket_log_T=Ticket::all()->where('event_id',$vq_event->id)
        ->where('type__ticket_id','=',2)->count();

        $cpt_ticket_log_0=Ticket::all()->where('event_id',$vq_event->id)
        ->where('type__ticket_id','=',2)
        ->where('statut','=',0)->count();
        $list_ticket=Ticket::all()->where('event_id',$vq_event->id);
        return view('Espace-Admin.GenereQR.index',compact('vq_event','list_ticket','cpt_ticket_vip_T','cpt_ticket_vip_0','cpt_ticket_log_T','cpt_ticket_log_0'));
    }

    public function store(Request $request)
    {
        $verifie_ticket=Ticket::all()->where('Numero_Ticket','=',$request->text)
        ->where('event_id','=',$request->event)
        ->count();

        if($verifie_ticket!=0){
            $vq_expire=Ticket::all()->where('Numero_Ticket','=',$request->text)
            ->where('event_id','=',$request->event)
            ->where('statut','=',0)
            ->count();

            if($vq_expire!=0){


            $verifie_ticket2=Ticket::all()->where('Numero_Ticket','=',$request->text)
            ->where('event_id','=',$request->event)
            ->first();

            $update= Ticket::find($verifie_ticket2->id);
            $update->statut=1;
            $update->update();
            Alert::warning('Veuillez rensigner le sexe ');
            return BACK();




        dd($request);
            }else{
                Alert::warning('false ');
                return BACK()->with('error',"Ticket non valable");;
            }
        }else{
            dd($verifie_ticket);
        }
        // $vq_event=Event::all()->where('client_id',1)->first();
        // return view('Espace-Admin.GenereQR.index',compact('vq_event'));
    }
}
