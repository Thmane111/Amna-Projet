<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use PDF;
use Intervention\Image\Exception\NotReadableException;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket=Event::all();

        return view('Espace-Admin.Ticket.index',compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Espace-Admin.Ticket.add');
    }
    public function create2($id)
    {
        $data_event=Event::all()->where('id',$id)->first();
        return view('Espace-Admin.Ticket.add',compact('data_event'));
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
    }
    public function store2(Request $request)

    {

        $validateDate=$request->validate([

            'image'=>'required|image|mimes:jpg,png,jiff,svg,jpeg|Max:2048'
    ]);

    $save=Event::find($request->id);
    if($request->hasfile('image')){
        $destination="photo/propos/".$save->image;
        if(File::exists($destination)){
           File::delete($destination);
        }
       $file= $request->file('image');
       $extension= $file->getClientOriginalExtension();
       $filename='Dtic-'.time(). '.'. $extension;
       $file->move('Affiche_Event/',$filename);
       $save->image=$filename;
   }else{

       $save->image=$request->image2;
   }

    $save->update();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function getQRCode($id){
        $data_QR=Ticket::all()->where('event_id',$id);
        return view('Espace-Admin.Ticket.QRCode',compact('data_QR','id'));

    }

    public function telechargeTicket($id){
//         $data_QR=Ticket::all()->where('event_id',$id);

//         try {
//             $pdf = PDF::loadView('Espace-Admin.Ticket.view-ticket', compact('data_QR'))->setPaper([0, 0, 552, 140]);
//             // Définir les marges pour centrer le contenu
// $pdf->setOption('margin-top', 30); // Ajustez la marge supérieure selon vos besoins
// $pdf->setOption('margin-bottom', 30); // Ajustez la marge inférieure selon vos besoins
// $pdf->setOption('margin-left', 90); // Ajustez la marge gauche selon vos besoins
// $pdf->setOption('margin-right', 90); // Ajustez la marge droite selon vos besoins
//             return $pdf->download('ticket_event.pdf');

//         } catch (\Exception $e) {
//             // Log or display the error message
//             return response()->json(['error' => $e->getMessage()], 500);
//         }




// ...
$data_QR=Ticket::all()->where('event_id',$id);
$qrCodes = [];
foreach ($data_QR as $donnees) {
    $qrCodeSize = 40;
    $qrCode = QrCode::format('png')->size($qrCodeSize)->generate($donnees->Numero_Ticket);
    $qrCodes[$donnees->id] = 'data:image/png;base64,' . base64_encode($qrCode);
}



// ...

// return $view = view('Espace-Admin.Ticket.view-ticket', compact('data_QR', 'qrCodes'))->render();
$pdf = PDF::loadView('Espace-Admin.Ticket.view-ticket', compact('data_QR', 'qrCodes'))->setPaper('a4', 'landscape');


return $pdf->download('ticket_event.pdf');

// $snappy = new Pdf('/Back/Affiche_Event/wkhtmltopdf'); // Assurez-vous que le chemin est correct
// $snappy->setOption('margin-top', 30);
// $snappy->setOption('margin-bottom', 30);
// $snappy->setOption('margin-left', 90);
// $snappy->setOption('margin-right', 90);

// $pdf = $snappy->getOutputFromHtml($view);

// return response()->stream(
//     function () use ($pdf) {
//         echo $pdf;
//     },
//     200,
//     [
//         'Content-Type' => 'application/pdf',
//         'Content-Disposition' => 'attachment; filename="ticket_event.pdf"',
//     ]
// );


    }
}
