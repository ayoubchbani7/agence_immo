<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertyRequest;
use App\Models\Proprety;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
    public function index(SearchPropertyRequest $request)
    {
        $query = Proprety::query();
       
        if($price = $request->validated('price'))
        {
            $query = $query->where('price','<=' , $price);
        }
        if($surface = $request->validated('surface'))
        {
            $query = $query->where('surface','<=' , $surface);
        }
       if($rooms = $request->validated('rooms'))
        {
            $query = $query->where('rooms','<=' ,$rooms);
        } 
       if($title = $request->validated('title'))
        {
            $query = $query->where('title','LIKE' , "%$title%");
        } 
        return view('property.index' ,[
            'properties'=> $query->paginate(4), 
            'input'  => $request->validated() 
        ]);
    }
    public function show(string $slug,Proprety $proprety)
    {
        $exeptedSlug = $proprety->getSlug();
        if($slug !== $exeptedSlug){
            return to_route('property.show',['slug'=> $exeptedSlug,'property'=>$exeptedSlug]);
        }
        return view('property.show',['property'=>$proprety]);
    }
}
