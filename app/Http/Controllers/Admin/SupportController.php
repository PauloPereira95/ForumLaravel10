<?php

namespace App\Http\Controllers\Admin;
//rules of store and update
use App\Http\Requests\StoreUpdateSupport;

use App\Models\Support;
use App\Service\SupportService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    // attributes promotion ex.: protected SupportService $service
    public function __construct(protected SupportService $service)
    {

    }

    // Dependecy Injection exe .: index(Support $support)
   public function index(Request $request){

      $supports = $this->service->getAll($request->filter);
      // dd($supports);
      // pass the data do view compact('supports')
    return view('admin/supports/index',compact('supports'));
   }
   // Render de Create Page
   public function create(){
      return view('/admin/supports/create');
   }
   // Store teh content of support
   public function store(StoreUpdateSupport $request, Support $support){
      $data = $request->validated();
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
      if(!$support = $this->service->findOne($id)){
         return back();
      }
      return view('admin/supports/show',compact('support'));
   }
   public function edit(string $id , Support $support){
      if(!$support = $this->service->findOne($id)){
         return back();
      }
      return view('admin/supports/edit',compact('support'));
   }
   public function update(string | int $id, Support $support,StoreUpdateSupport $request){
      if(!$support = $support->find($id) ){
         return back();
      }
      // only update 2 columns
      $support->update($request->validated());
      return redirect()->route('supports.index');
   }
   public function destroy(string | int $id){
      $this->service->delete($id);
      return redirect()->route('supports.index');
   }
}
