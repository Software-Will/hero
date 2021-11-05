<?php

namespace App\Http\Controllers;

use App\Models\Enemy;
use Illuminate\Http\Request;

class EnemyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enemies = Enemy::all();
        return view('admin.enemies.index', ['enemies' => $enemies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.enemies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->saveEnemy($request, null);
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
        $enemy = Enemy::find($id);

        return view('admin.enemies.edit', ['enemy' => $enemy]);
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
        return $this->saveEnemy($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enemy = Enemy::find($id);

        $enemy->delete();

        return redirect()->route('enemy.index');
    }

    //Metodo para guardar o actualizar un enemigo sea para update o insert (store)
    public function saveEnemy(Request $request, $id)
    {
        if ($id) { //Si existe el id se realiza el get para el update, sino crea uno nuevo
            $enemy = Enemy::find($id); //GET
        } else {
            $enemy = new Enemy();
        }
        //Seteo de atributos, mediante la captura, sea update o store
        $enemy->name = $request->input('name');
        $enemy->hp = $request->input('hp');
        $enemy->atq = $request->input('atq');
        $enemy->def = $request->input('def');
        $enemy->coins = $request->input('coins');
        $enemy->xp = $request->input('xp');

        //hay una imagen? CLASE 98
        /*if ($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $name = time() . '_' . $file->getClientOriginalName(); //esta funcion evita el doble seteo de img_path
            $destinationPath = public_path('/images/enemies/'); //me quede en la clase 98
            $file->move($destinationPath, $name); //para guardado local

            $enemy->img_path = $name;
 
            //FORM.BLADE.PHP -> ENEMYS
            <div class="form-group">
      <label for="img_path">Imagen</label>
      <input type="file" id="img_path" name="img_path" required>
  </div>
        }*/

        $enemy->save(); //se guarda directamente en la bd

        //return redirect()->route('admin.heroes'); - asi es antes de implementar resource controller
        return redirect()->route('enemy.index');
    }
}
