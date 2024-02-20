<?php

namespace App\Http\Controllers\Admin;

//rules of store and update
use App\Models\Support;

use Illuminate\Http\Request;
use App\Dto\CreateSupportDTO;
use App\Dto\UpdateSupportDTO;
use App\Service\SupportService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;

class SupportController extends Controller
{
   // attributes promotion ex.: protected SupportService $service
   public function __construct(protected SupportService $service)
   {

   }

   // Dependecy Injection exe .: index(Support $support)
   public function index(Request $request)
   {

      $supports = $this->service->getAll($request->filter);
      // dd($supports);
      // pass the data do view compact('supports')
      return view('admin/supports/index', compact('supports'));
   }
   // Render de Create Page
   public function create()
   {
      return view('/admin/supports/create');
   }

   // Store teh content of support
   public function store(StoreUpdateSupport $request, Support $support)
   {

      $this->service->new(CreateSupportDTO::makeFromRequest($request));

      return redirect()->route('supports.index');
   }
   public function show(string|int $id)
   {

      /**
       * Find by id options
       * Support::where('id', $id)->first();
       * Support::where('id','=', $id)->first();
       */
      if (!$support = $this->service->findOne($id)) {
         return back();
      }
      return view('admin/supports/show', compact('support'));
   }
   public function edit(string $id, Support $support)
   {
      if (!$support = $this->service->findOne($id)) {
         return back();
      }
      return view('admin/supports/edit', compact('support'));
   }
   public function update(StoreUpdateSupport $request, Support $support, string $id): \stdClass|null
   {
      $request = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

      if (!$support) {
         return back();
      }


      return redirect()->route('supports.index');
   }
   public function destroy(string|int $id)
   {
      $this->service->delete($id);
      return redirect()->route('supports.index');
   }
}
