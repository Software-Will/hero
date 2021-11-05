<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all(); //Modelo de items
        return view('admin.items.index', ['items' => $items]); //Retorna la vista de esta carpeta
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.items.create'); //Direccion de ficheros no de sistema de rutas
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->saveItems($request, null);
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
        $item = Item::find($id);
        return view('admin.items.edit', ['item' => $item]); //Direccion de ficheros
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
        return $this->saveItems($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $item->delete();

        return redirect()->route('item.index');
    }

    //Metodo para guardar o editar un item sea para update o insert (store)
    public function saveItems(Request $request, $id)
    {
        if ($id) { //Si existe el id se realiza el get para el update, sino crea uno nuevo
            $item = Item::find($id); //GET - para editar item
        } else {
            $item = new Item(); //Objeto del modelo item para insertar un nuevo item
        }
        //Seteo de atributos, mediante la captura, sea update o store
        $item->name = $request->input('name');
        $item->hp = $request->input('hp');
        $item->atq = $request->input('atq');
        $item->def = $request->input('def');
        $item->luck = $request->input('luck');
        $item->cost = $request->input('cost');

        $item->save(); //se guarda directamente en la bd

        //return redirect()->route('admin.heroes'); - asi es antes de implementar resource controller
        return redirect()->route('item.index');
    }
}
