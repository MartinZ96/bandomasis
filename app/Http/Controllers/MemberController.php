<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
{
//  $this->middleware('auth');
//  $this->middleware('auth', ['except' => ['singleCard','index']]);
 $this->middleware('auth')->except('index');
}
    public function index()
    {
        
               $members = Member::all();
       return view('member.index', ['members' => $members]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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

$validator = Validator::make($request->all(),
       [
           'member_name' => ['required', 'min:2', 'max:32', 'alpha'],
           'member_surname' => ['required', 'min:2', 'max:32'],
           'member_live' => ['required', 'min:2', 'max:32','alpha'],
           'member_experience' => ['required','max:100','numeric'],
           'member_registered' => ['required','min:1','max:100','numeric'],
       ],
[
'member_name.required' => 'Must enter the name',
'member_name.min' => 'Name too short',
'member_name.max' => 'Name too long',
'member_name.alpha' => 'Do not enter numbers or random simbols',

'member_surname.required' => 'Must enter the surname',
'member_surname.min' => 'Surname too short',
'member_surname.max' => 'Surname too long',
'member_surname.alpha' => 'Do not enter numbers or random simbols',

'member_live.required' => 'Must enter the live',
'member_live.min' => 'Too short',
'member_live.max' => 'Too long',
'member_live.alpha' => 'Do not enter numbers or random simbols',

'member_experience.required' => 'Must enter the experience',
'member_experience.max' => 'Number is too big',
'member_experience.numeric' => 'Must be a number',

'member_registered.required' => 'Must enter the registered date',
'member_registered.max' => 'Number is too big',
'member_surname.min' => 'Surname too short',
'member_registered.numeric' => 'Must be a number'
]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $member = new Member;
$member->name = $request->member_name;
$member->surname = $request->member_surname;
$member->live = $request->member_live;
$member->experience = $request->member_experience;
$member->registered = $request->member_registered;

$member->save();
return redirect()->route('member.index')->with('success_message', 'Member created.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('member.edit', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {

// Validator

$validator = Validator::make($request->all(),
       [
           'member_name' => ['required', 'min:2', 'max:32', 'alpha'],
           'member_surname' => ['required', 'min:2', 'max:32'],
           'member_live' => ['required', 'min:2', 'max:32','alpha'],
           'member_experience' => ['required','max:100','numeric'],
           'member_registered' => ['required','min:1','max:100','numeric'],
       ],
[
'member_name.required' => 'Must enter the name',
'member_name.min' => 'Name too short',
'member_name.max' => 'Name too long',
'member_name.alpha' => 'Do not enter numbers or random simbols',

'member_surname.required' => 'Must enter the surname',
'member_surname.min' => 'Surname too short',
'member_surname.max' => 'Surname too long',
'member_surname.alpha' => 'Do not enter numbers or random simbols',

'member_live.required' => 'Must enter the live',
'member_live.min' => 'Too short',
'member_live.max' => 'Too long',
'member_live.alpha' => 'Do not enter numbers or random simbols',

'member_experience.required' => 'Must enter the experience',
'member_experience.max' => 'Number is too big',
'member_experience.numeric' => 'Must be a number',

'member_registered.required' => 'Must enter the registered date',
'member_registered.max' => 'Number is too big',
'member_surname.min' => 'Surname too short',
'member_registered.numeric' => 'Must be a number'

]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);

       }

       $member->name = $request->member_name;
       $member->surname = $request->member_surname;
       $member->live = $request->member_live;
       $member->experience = $request->member_experience;
       $member->registered = $request->member_registered;
       $member->save();
       return redirect()->route('member.index')->with('success_message', 'Member updated.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
       if($member->memberReservoirs->count()){
      return redirect()->route('member.index')->with('info_message', 'Member can not be deleted, probably member have some reservoirs.');
       }
       $member->delete();
       return redirect()->route('member.index')->with('success_message', 'Deleted.');

    }
}
