<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    //
    public function view(){
        return view('projects.view_qr_code');
    }
}
