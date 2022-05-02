<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function sendMail(){
        $detail = [
            'title'=>'Mail from laravel 8',
            'body'=>'This is my first testing for sendding mail in laravel8'
        ];
        Mail::to('phanhop24022001@gmail.com')->send(new TestMail($detail));
        return 'Send Mail Successfully';
    }
}
