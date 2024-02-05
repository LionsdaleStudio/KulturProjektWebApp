<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function SendWelcomeMail() {
        $username = "Richárd";

        Mail::to('richardwyeth@gmail.com')->send(new WelcomeMail($username));

        return "Email sent successfully";
    }
}
