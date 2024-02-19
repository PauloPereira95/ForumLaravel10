<?php

namespace App\Http\Controllers\Admin;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
   // Dependecy Injection exe .: index(Support $support)
   public function index(Support $support){
     
      $supports = $support->all();
      dd($supports);
      // pass the data do view compact('supports')
    return view('admin/supports/index',compact('supports'));
   }
}
