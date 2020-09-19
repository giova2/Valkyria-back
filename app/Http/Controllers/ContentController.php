<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Page;
use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{

	public function index($page_id=0)
	{
		$data 	 = array();
		if(empty($page_id)){
			$contents = Content::where('visible', 1)->get();
			foreach($contents as $content){
				$data[] = ['id'=>$content['id'], 'title'=>$content['name'], 'body'=> $content['text']];	
			}
		}else{
			$content = Content::where('page_id', $page_id)->get();
			foreach($content as $key => $value){
				$data[$value->name] = $value;
			}
		}
		
		return response()->json($data, 200);		
	}


	// -->> Recibe la pagina y devuelve los contenidos

	public function create(ContentRequest $request)
	{
		$content = new Content;
		$content->page_id 	= $request->input('pageId');
		$content->name 		= $request->input('name');
		$content->text 		= $request->input('text');
		$content->visible	= $request->input('visible');
		$content->save();
		return response()->json($content, 200);
	}

	public function update(ContentRequest $request){
		$content 	   		= Content::find($request->input('id'));
		$content->name 		= $request->input('name');
		$content->text 		= $request->input('text');
		$content->visible	= $request->input('visible');
		$content->save();
		return response()->json($content, 200);
	}

	public function destroy(ContentRequest $request){
		$content = Content::find($request->id);
		if($content->allowed_to_delete()){
			return response()->json(['ok' =>$content->destroy()], 200);
		}
		return response()->json(['error' =>'No se permite eliminar un contenido reservado'], 500);
	}
}
