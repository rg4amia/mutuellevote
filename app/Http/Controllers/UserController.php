<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd(request('filtreemail'));

        $users = User::when(request('nomprenom'), function ($q, $v) {
            $q->whereLike('nomprenom', $v);
        })->when(request('matricule'), function ($q, $v) {
            $q->whereLike('matricule', $v);
        })->when(request('matricule'), function ($q, $v) {
            $q->whereLike('matricule',$v );
        })->when(request('email'), function ($q, $v) {
            $q->whereLike('email', $v);
        })->when(request('telephone'), function ($q, $v) {
            $q->whereLike('telephone',$v );
        })->when(request('filtreemail'), function ($q, $v) {
            if ($v == "0") {
                $q->where('email',null);
            } elseif ($v == "1"){
                $q->where('email','!=',null);
            }
        })->paginate(25);

        return view('customs.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('customs.admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        session()->flash('success',"Modification reussit $user->name");
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
