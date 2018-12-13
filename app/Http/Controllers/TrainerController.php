<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use LaraDex\Trainer;
use LaraDex\Http\Requests\StoreTrainerRquest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRquest $request)
    {
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }
        else{
            $name = public_path().'/images/default.jpg';

        }
        if (empty($request->input('description'))){
            $desc='descripcion generada automaticamente';
        }else{
            $desc=$request->input('description');
        }
        if (empty($request->input('slug'))){
            $slug=$request->input('name');
        }else{
            $slug=$request->input('slug');
        }
        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->avatar = $name;
        $trainer->description = $desc;
        $trainer->slug = $slug;
        $trainer->save();

        return 'Saved';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
         return view('trainers.show', compact('trainer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
        // return $trainer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except('avatar'));
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $trainer->avatar = $name;
        }
        $trainer->save();
        return 'Updated';
        // return $request;
        // return $trainer;
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
