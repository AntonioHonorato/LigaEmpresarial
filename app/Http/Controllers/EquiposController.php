<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Grupo;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Description;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->q;
        if($request->ajax()){
            $equipos=Equipo::Activo()->where('equipo','like','%'.$request->q.'%')->get();
            $result = $equipos->map(function($item, $key){
                return ['title'=>$item->equipo, 'id'=>$item->id,'description'=>'Hola mundo'];

            });

            return response()->json($result);   
        }else{
            $equipos = Equipo::Activo()->get();
            return view('equipos.index', compact('equipos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::all();
        return view('equipos.create',compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipos = Equipo::create($request->all());
        return response()->json($equipos,201);   
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
    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        $equipo->update($request->all());
        return response()->json($equipo,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->update(['activo'=>0]);
        return response()->json($equipo,200);
    }
}
