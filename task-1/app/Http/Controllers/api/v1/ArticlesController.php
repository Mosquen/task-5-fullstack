<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\API\v1\BaseController as BaseController;
use App\Models\Articles;
use Validator;
use App\Http\Resources\Articles as ArticlesResource;

class ArticlesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Articles = Articles::all();
    
        return $this->sendResponse(ArticlesResource::collection($Articles), 'Articless retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $Articles = Articles::create($input);
   
        return $this->sendResponse(new ArticlesResource($Articles), 'Articles created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Articles = Articles::find($id);
  
        if (is_null($Articles)) {
            return $this->sendError('Articles not found.');
        }
   
        return $this->sendResponse(new ArticlesResource($Articles), 'Articles retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $Articles)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $Articles->title = $input['title'];
        $Articles->content = $input['content'];
        $Articles->image = $input['image'];

        $Articles->save();
   
        return $this->sendResponse(new ArticlesResource($Articles), 'Articles updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $Articles)
    {
        $Articles->delete();
   
        return $this->sendResponse([], 'Articles deleted successfully.');
    }
}
