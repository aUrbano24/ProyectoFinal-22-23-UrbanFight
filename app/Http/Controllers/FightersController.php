<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fighter;

class FightersController extends Controller
{
    public function index()
    {
        $data = Fighter::all();
        return view('Fighters/fighters', compact('data'));
    }

    public function edit($id)
    {
        /* echo $id; */
        try {
            $fighters = Fighter::findOrFail($id);
            return view("fighters/edit_fighters", compact('fighters'));

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404); // Redirige a la página 404 personalizada
        }

    }

    public function update(Request $request, $id)
{
    $fighters = Fighter::find($id);

    $name = $request->post('name');
    if (strlen($name) > 21) {
        return redirect()->route("fightersEdit", $fighters->id)->with("errorTitle", "El nombre del luchador debe tener menos de 21 caracteres.");
    }
    $fighters->name = $name;

    $defense = $request->post('defense');
    if ($defense > 100) {
        return redirect()->route("fightersEdit", $fighters->id)->with("errorTitle", "Un luchador no puede tener más de 100 de defensa.");
    }
    $fighters->defense = $defense;

    $attack = $request->post('attack');
    if ($attack < 101) {
        return redirect()->route("fightersEdit", $fighters->id)->with("errorTitle", "Un luchador debe tener mínimo 101 de ataque.");
    }
    $fighters->attack = $attack;

    $attackSpeed = $request->post('attackSpeed');
    $fighters->attackSpeed = $attackSpeed;

    $reach = $request->post('reach');
    $fighters->reach = $reach;

    $speedMovement = $request->post('speed_movement');
    if ($speedMovement < 500) {
        return redirect()->route("fightersEdit", $fighters->id)->with("errorTitle", "Un luchador debe tener mínimo 500 de velocidad de movimiento.");
    }
    $fighters->speed_movement = $speedMovement;

    $fighters->save();

    return redirect()->route("FightersIndex")->with("success", "¡Actualizado con éxito!");
}

}
