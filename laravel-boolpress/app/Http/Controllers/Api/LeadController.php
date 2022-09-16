<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importo il model
use App\Lead;
//importo il validatore
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouContactEmail;


class LeadController extends Controller
{
    //agomento request 
    public function store(Request $request){
        //ottenere tutti i dati
        $data = $request->all();
        //validazione di tutti i dati
        $validator = Validator::make($data,[
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required|max:60000',
        ]);
        //validazione non riuscita
        if( $validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        //salvo tutti i dati nel database(db)
        $new_lead = new Lead();
        //massassaimnet
        $new_lead ->fill($data);
        $new_lead ->save();

        //email ringraziamento segnalazione
        Mail::to($data['email'])->send(new ThankYouContactEmail());

        //risposta
        return response()->json([
            'success' => true
        ]);
    }
}
