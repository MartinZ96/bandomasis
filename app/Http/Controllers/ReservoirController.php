<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use App\Models\Member;
use Validator;

class ReservoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function __construct()
    {
    // $this->middleware('auth');
    // $this->middleware('auth', ['except' => ['singleCard','index']]);
    $this->middleware('auth')->except('index');
    }
    public function index()
    {
       $reservoirs = Reservoir::all();
       return view('reservoir.index', ['reservoirs' => $reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $members = Member::all();
       return view('reservoir.create', ['members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// Validator

$request->area = str_replace(',','.',$request->area);

$validator = Validator::make($request->all(),
       [
           'reservoir_title' => ['required', 'min:2', 'max:32', 'alpha'],
           'reservoir_area' => ['required', 'min:1', 'max:12312313123', 'numeric'],
           'reservoir_about' => ['required', 'min:2', 'max:10000'],
       ],
[
'reservoir_title.required' => 'Must enter the title',
'reservoir_title.min' => 'Title too short',
'reservoir_title.max' => 'Title too long',
'reservoir_title.alpha' => 'Do not enter numbers or random simbols',

'reservoir_area.required' => 'Must enter the area',
'reservoir_area.min' => 'Area too short',
'reservoir_area.max' => 'Area too long',
'reservoir_registered.numeric' => 'Must be a number',

'reservoir_about.required' => 'Must enter the about',
'reservoir_about.min' => 'Too short',
'reservoir_about.max' => 'Too long',

]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

       $reservoir = new Reservoir;
       $reservoir->title = $request->reservoir_title;
       $reservoir->area = $request->reservoir_area;
       $reservoir->about = $request->reservoir_about;
       $reservoir->member_id = $request->member_id;
       $reservoir->save();
       return redirect()->route('reservoir.index')->with('success_message', 'Reservoir created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
       $members = Member::all();
       return view('reservoir.edit', ['reservoir' => $reservoir, 'members' => $members]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {

// Validator

$request->area = str_replace(',','.',$request->area);

$validator = Validator::make($request->all(),
       [
           'reservoir_title' => ['required', 'min:2', 'max:32', 'alpha'],
           'reservoir_area' => ['required', 'min:1', 'max:12312313123', 'numeric'],
           'reservoir_about' => ['required', 'min:2', 'max:10000'],
       ],
[
'reservoir_title.required' => 'Must enter the title',
'reservoir_title.min' => 'Title too short',
'reservoir_title.max' => 'Title too long',
'reservoir_title.alpha' => 'Do not enter numbers or random simbols',

'reservoir_area.required' => 'Must enter the area',
'reservoir_area.min' => 'Area too short',
'reservoir_area.max' => 'Area too long',
'reservoir_area.numeric' => 'Must be a number',

'reservoir_about.required' => 'Must enter the about',
'reservoir_about.min' => 'Too short',
'reservoir_about.max' => 'Too long',

]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

       $reservoir->title = $request->reservoir_title;
       $reservoir->area = $request->reservoir_area;
       $reservoir->about = $request->reservoir_about;
       $reservoir->member_id = $request->member_id;
       $reservoir->save();
       return redirect()->route('reservoir.index')->with('success_message', 'Reservoir updated.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {   
       $reservoir->delete();
       return redirect()->route('reservoir.index')->with('success_message', 'Reservoir deleted.');
    }
}
