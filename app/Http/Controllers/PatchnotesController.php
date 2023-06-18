<?php

namespace App\Http\Controllers;

use App\Models\Patchnotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PatchnotesController extends Controller
{

    public function index()
    {
        $data = patchnotes::orderBy('id', 'desc')->paginate(10);
        return view('patchnotes/patchnotes', compact('data'));
    }

    public function create()
    {
        //el formulario donde nosotros agregamos datos
        return view('patchnotes/add_patchnotes');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'image' => 'image|max:2048'
            ]);
            $patchnotes = new Patchnotes;
            $patchnotes->title = $request->post('title');
            if (strlen($patchnotes->title) > 50) {
                return redirect()->route("notesCreate")->with("errorTitle", "El titulo no puede superar los 50 carácteres.");
            }
            $patchnotes->short_Description = $request->post('short_Description');
            if (strlen($patchnotes->short_Description) > 350) {
                return redirect()->route("notesCreate")->with("errorShortDescription", "La descripción corta no puede superar los 350 carácteres.");
            }
            $patchnotes->long_Description = $request->post('long_Description');
            if (strlen($patchnotes->long_Description) > 5000 ) {
                return redirect()->route("notesCreate")->with("errorLongDescription", "La descripción larga no puede superar los 5000 carácteres.");
            }
            if (strlen($patchnotes->long_Description) <= strlen($patchnotes->short_Description) ) {
                return redirect()->route("notesCreate")->with("errorLongDescription2", "La descripción larga debe ser mayor que la descripción corta.");
            }
            $patchnotes->date = $request->post('date');

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $url = Storage::url($imagePath);
                $patchnotes->image = $url;
            }

            $patchnotes->save();

            return redirect()->route("notesIndex")->with("success", "Agregado con exito!");
        }
        /* print_r($_POST); */
    }

    public function show($id)
    {
        try {
            $patchnotes = Patchnotes::findOrFail($id);
            return view('patchnotes/delete_patchnotes', compact('patchnotes'));

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404); // Redirige a la página 404 personalizada
        }
    }


    public function edit($id)
    {
        /* echo $id; */
        try {
            $patchnotes = Patchnotes::findOrFail($id);
            return view("patchnotes/edit_patchnotes", compact('patchnotes'));

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404); // Redirige a la página 404 personalizada
        }

    }

    public function update(Request $request, $id)
    {
        //este metodo actualiza los datos en bd
        $patchnotes = Patchnotes::find($id);
        $patchnotes->title = $request->post('title');
        if (strlen($patchnotes->title) > 50) {
            return redirect()->route("notesEdit",$patchnotes->id)->with("errorTitle", "El titulo no puede superar los 50 carácteres.");
        }
        $patchnotes->short_Description = $request->post('short_Description');
        if (strlen($patchnotes->short_Description) > 350) {
            return redirect()->route("notesEdit",$patchnotes->id)->with("errorShortDescription", "La descripción corta no puede superar los 350 carácteres.");
        }
        $patchnotes->long_Description = $request->post('long_Description');
        if (strlen($patchnotes->long_Description) > 5000 ) {
            return redirect()->route("notesEdit",$patchnotes->id)->with("errorLongDescription", "La descripción larga no puede superar los 5000 carácteres.");
        }
        if (strlen($patchnotes->long_Description) <= strlen($patchnotes->short_Description) ) {
            return redirect()->route("notesEdit",$patchnotes->id)->with("errorLongDescription2", "La descripción larga debe ser mayor que la descripción corta.");
        }
        $patchnotes->date = $request->post('date');
        $patchnotes->save();

        return redirect()->route("notesEdit",$patchnotes->id)->with("success", "Actualizado con exito!");
    }

    public function delete($id)
    {
        try {
            $patchnotes = Patchnotes::findOrFail($id);
            $patchnotes->delete();
            return redirect()->route("notesIndex")->with("success", "Eliminado con exito!");

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404); // Redirige a la página 404 personalizada
        }
    }
}
