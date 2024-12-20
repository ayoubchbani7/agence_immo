<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPropretyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Property::class,'property');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index',[
             "properties" =>Property::orderBy('created_at','desc')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $property =  new Property();
       $property->fill([
            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>2,
            'floor'=>0,
            'city'=>"Casa",
            'adresse'=>"Casa 12 Rue 53 N79",
            'code_postal'=>75001,
            'sold'=>false
       ]);
       return view ('admin.properties.form',[
            'property' => $property ,
            'options'=>Option::pluck('name','id')
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        //
        $property = Property::create($request->all());
        $options= collect($request->validated('options'))->pluck('id')->toArray();
        $property->options()->sync(array_filter($options));
        return to_route('admin.property.index')->with('success','Le bien a été bien ajouté');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //

        return view('admin.properties.form',[
            'property'=> $property,
            'options'=>Option::pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {

        $property->update($request->validated());
        $options = collect($request->validated('options'))->pluck('id')->toArray();
        $options = array_filter($options, fn($value) => !is_null($value) && $value !== '');
        $property->options()->sync($options);
         return to_route('admin.property.index')->with('success','Le bien a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success','Le bien a été bien supprimé');

    }
}
