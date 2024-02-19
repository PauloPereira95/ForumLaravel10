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
      // dd($supports);
      // pass the data do view compact('supports')
    return view('admin/supports/index',compact('supports'));
   }
   // Render de Create Page
   public function create(){
      return view('/admin/supports/create');
   }
   // Store teh content of support
   public function store(Request $request, Support $support){
      $data = $request->all();
      $data['status'] = 'a';

      // insert in model
      $support = $support->create($data);
     
      return redirect()->route('supports.index');
   }
   public function show (string|int $id){

      /**
       * Find by id options
       * Support::where('id', $id)->first();
       * Support::where('id','=', $id)->first();
       */
      if(!$support = Support::find($id)){
         return back();
      }
      return view('admin/supports/show',compact('support'));
   }
}
