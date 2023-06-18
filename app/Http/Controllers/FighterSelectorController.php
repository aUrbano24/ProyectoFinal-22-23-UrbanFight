<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fighter;
use App\Models\Maps;


class FighterSelectorController extends Controller
{
    public function index()
    {
        $data = Fighter::all();
        $data2 = Maps::all();
        return view('game/battle', compact('data', 'data2'));
    }

   /*  public function show($id)
    {
        $fighter = Fighter::findOrFail($id);
        return view('game/show_selectorFighter.blade.php', compact('fighter'));
    }
 */




}
