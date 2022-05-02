<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TicketController extends Controller
{
    public function viewTicket(Request $req){
        $departure = $req->query('dep');
        $destination = $req->query('des');
        $productDate = $req->query('date');
        $arrInput = array($departure, $destination, $productDate);
        $garageData = DB::table('garage')->get();       
        $ticket = DB::table('ticket')
                        ->where([
                                ['departure', $departure],
                                ['destination', $destination],
                                ['productDate', $productDate]
                        ]); 
        if($req->t){
            $time = $req->t;
            switch ($time) {
                case '1':
                    $ticket->where('time','<',6);                   
                    break;
                case '2':
                    $ticket->whereBetween('time',[6,12]);
                    break;
                case '3':
                    $ticket->whereBetween('time',[12,18]);
                    break; 
                case '4':
                    $ticket->whereBetween('time',[18,24]);
                    break;                              
            }
        }  
        if($req->sort){
            $sort = $req->sort;
            switch ($sort) {
                case '1':
                    $ticket->orderBy('time','asc');                   
                    break;
                case '2':
                    $ticket->orderBy('time','desc'); 
                    break;
                case '3':
                    $ticket->orderBy('buyPrice','asc'); 
                    break; 
                case '4':
                    $ticket->orderBy('buyPrice','desc'); 
                    break;                              
            }           
        }
        if($req->g){
            $gara = $req->g;            
            for($i = 0;$i <= 20;$i++){
                if($gara == $i){
                    $ticket->where('gara_id',$i);
                }
            }             
        }
        if($req->m){
            $gara = $req->m;            
            for($i = 0;$i <= 20;$i++){
                if($gara == $i){
                    $ticket->where('gara_id',$i);
                }
            }             
        }
    
        $media = DB::table('media_type')->get();
        return view('ticket', [
            'garageData'=>$garageData,
            'ticket'=>$ticket->get(), 
            'media'=>$media, 
            'arrInput'=>$arrInput,
            'countTicket'=>$ticket->count()
        ]);
    }
}
