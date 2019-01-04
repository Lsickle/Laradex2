<?php

namespace LaraDex\Http\Controllers;
use LaraDex\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaraDex\Http\Requests\StoreTrainerRquest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if (!$request->User()) {
          return redirect()->route('login');
        }else{
            $request->User()->authorizeRoles('admin');
            $trainers = Trainer::all();
            return view('trainers.index', compact('trainers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        if (!$request->User()) {
          return redirect()->route('login');
        }else{
            $request->User()->authorizeRoles('admin','user');
            return view('trainers.create');
        }
        
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

        return redirect()->route('trainers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Trainer $trainer)
    {   
        if (!$request->User()) {
            return redirect()->route('login');
        }else{
            return view('trainers.show', compact('trainer'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Trainer $trainer)
    {   
        if (!$request->User()) {
            return redirect()->route('login');
        }else{
            return view('trainers.edit', compact('trainer'));
        }
        
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
        //primero se borr la imagen almacenada previamente
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        //luego se carga la imagen a actualizar
        $trainer->fill($request->except('avatar'));
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $trainer->avatar = $name;
        }
        $trainer->save();
        return redirect()->route('trainers.show',[$trainer])->with('status','Entrenador actualizado correctamente');    


        // return 'Updated';
        // return $request;
        // return $trainer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
        return redirect()->route('trainers.index');
        // return 'deleted';
    }
}
