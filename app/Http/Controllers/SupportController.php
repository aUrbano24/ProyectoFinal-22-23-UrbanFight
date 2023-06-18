<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;


class SupportController extends Controller
{

    public function create() {
        $data = support::orderBy('created_at', 'desc')->paginate(5);
        return view('support/support', compact('data'));
      /*   return view('support/support'); */

    }

    public function store(Request $request)
{

    if (Auth::check()) {
        $request->validate([
            'image' => 'image|max:2048'
        ]);

        $userId = Auth::id();
        $support = new Support;

        $support->type = $request->input('type');
        $support->title = $request->input('title');
        if (strlen($support->title) > 50) {
            return redirect()->route("supportStore")->with("errorTitle", "El titulo no puede superar los 50 carácteres.");
        }
        $support->description = $request->input('description');
        if (strlen($support->description) > 2500 ) {
            return redirect()->route("supportStore")->with("errorDescription", "La descripción larga no puede superar los 2500 carácteres.");
        }

        $support->user_id = $userId;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $url = Storage::url($imagePath);
            $support->image = $url;
        }

        $support->save();

        // Resto de tu código...

        return redirect()->route("supportCreate")->with("success", "El mensaje ha sido recibido con éxito. Gracias por contactarnos!!");
    } else {
        // Manejar el caso cuando no hay usuario autenticado
        // Por ejemplo, redireccionar a la página de inicio de sesión
        return redirect('/login')->with('error', 'Debes iniciar sesión antes de contactarnos.');
    }


    // Validar los datos del formulario
    /* $request->validate([
        'type' => 'required',
        'title' => 'required',
        'description' => 'required',
        'image' => 'nullable|image',
    ]);

    // Enviar el correo electrónico
    $data = [
        'type' => $request->type,
        'title' => $request->title,
        'description' => $request->description,
        'image' => $request->file('image'),
    ];

    Mail::send('emails.contacto', $data, function ($message) use ($data) {
        $message->to('alfonsourba@gmail.com', 'Destinatario')
            ->subject('Nuevo formulario de contacto');

        if (isset($data['image'])) {
            $message->attach($data['image']->getRealPath(), [
                'as' => $data['image']->getClientOriginalName(),
                'mime' => $data['image']->getMimeType(),
            ]);
        }
    }); */

    // Redirigir al usuario después de enviar el formulario
}


}
