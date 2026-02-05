<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultet;

class FakultetController extends Controller
{
       public function index()
    {
        $fakulteti = Fakultet::orderBy('naziv')->get();
        return view('fakulteti.index', compact('fakulteti'));
    }

}
