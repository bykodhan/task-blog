<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Admin paneli anasayfasını göster
    public function index()
    {
        return view('back.index');
    }
}
