<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stockroom;
use App\Models\Stockroomflower;
use Illuminate\Support\Facades\DB;


class StockroomFlowersController extends Controller
{
    public function create($id)
    {
        if (session()->has('errors')) {
            dd(session()->get('errors'));
        }
        $stockroom = Stockroom::where('id', $id)->first();
        $flowers = DB::table('flowers')->get();

        return view('/stockroomflowers/create', ['stockroom' => $stockroom, 'flowers' => $flowers]);
    }

    public function store()
    {
        $flowerid = request('flower_id_');
        $data = request()->validate([
            'stockroom_id' => 'required',
            'aantal' => 'required',
        ]);

            auth()->user()->stockroomflower()->create([
                'stockroom_id' => $data['stockroom_id'],
                'aantal' => $data['aantal'],
                'flower_id' => $flowerid,
        ]);
        return redirect('/stockroom/show');
    }

    public function edit($id)
    {
        $stockroom = Stockroomflower::where('id', $id)->first();
        $flowers = DB::table('flowers')->get();        
        $flower_ids = DB::table('stockroomflowers')->get();

        return view('/stockroomflowers/edit', ['stockroom' => $stockroom, 'flowers' => $flowers, 'flower_ids' => $flower_ids]);
    }

    public function editName($id)
    {
        $flowerid = request('flower_id_');
        $data = request()->validate([
            'aantal' => 'required',
        ]);
            $edit = stockroomflower::find($id);
            $edit->aantal = $data['aantal'];
            $edit->flower_id = $flowerid;
            $edit->save();
        return redirect('/stockroom/show');
    }
}
