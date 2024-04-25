<?php

namespace App\Http\Controllers;

use App\Mail\NewLead;
use App\Models\Message;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\PrivateMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class PublicPagesController extends Controller
{
    
    public function sendMail(Request $request){

        $validator = Validator::make( $request->all(), [
            'full_name'       => 'required|string|min:1|max:255',
            'email'      => 'required|email|string|max:255',
            'phone'      => 'nullable|numeric',
            'message'    => 'required|string|max:500',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()->withInput()->with(['errors'=> $validator->errors()->all()]);
        }
        else{
            $msg = new PrivateMessage();

            $msg->user_id = auth()->user()->id;
            $msg->message = $request->input('message');
            $msg->url = $request->input('url');

            $msg->save();


            //$email = Mail::to('info@domusvallarta.com')->bcc('ventas@punto401.com');
        
            $email = Mail::to('erick@punto401.com');
            
            $email->send(new NewLead($msg));

            if( isset($pdf) ){
                return $pdf->stream();
            }
            
            return redirect()->back()->with('message', 'Gracias, su mensaje ha sido enviado');
        }    
    }

}
