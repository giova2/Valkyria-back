<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\PageRequest;

class PageController extends Controller
{
	public function index(){
		$pages = Page::all();
		return response()->json($pages, 200);
	}

	public function create(PageRequest $request){
		try{
			$page = Page::create(['name' => $request->pageName]);
			return response()->json($page, 200);
		} catch(\Exception $e){
			return response()->json(['error'=>$e, 500]);
		}
	}
	
	public function destroy(Request $request){
		$page = Page::find($request->id);
		if(is_numeric($page->id) && $page->allowed_to_delete() )
			return response()->json(['ok' =>$page->destroy()], 200);
		return response()->json(['error'=>'el id no existe o bien ha querido eliminar un contenido reservado, no se puede eliminar'], 500);
	}

}
