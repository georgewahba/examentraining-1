<?php

namespace App\Http\Controllers;

use App\Models\Stockroom;
use App\Models\Stockroomflower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockroomsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        if (session()->has('errors')) {
            dd(session()->get('errors'));
        }
        return view('/stockroom/create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
        ]);
            auth()->user()->stockroom()->create([
                'name' => $data['name'],
        ]);
        return redirect('/stockroom/show');
    }

    public function show($id)
    {
        $stockroom = Stockroom::where('id', $id)->first();

        $flowers =DB::table('Stockroomflowers')->join('Stockrooms', 'stockrooms.id', '=', 'stockroomflowers.stockroom_id')
                ->join('flowers', 'flowers.id', '=', 'stockroomflowers.flower_id')->where('stockroom_id', $id)->select('flowers.name','stockroomflowers.id', 'flower_id', 'aantal')->get();
                
        $total_flowers =DB::table('Stockroomflowers')->join('Stockrooms', 'stockrooms.id', '=', 'stockroomflowers.stockroom_id')
        ->join('flowers', 'flowers.id', '=', 'stockroomflowers.flower_id')->where('stockroom_id', $id)->sum('aantal');
        
        return view('/stockroom/showone', ['stockroom' => $stockroom, 'flowers'=>$flowers, 'total_flowers' => $total_flowers]);
    }
    
    public function showall()
    {
        $stockrooms = DB::table('stockrooms')->get();
        return view('/stockroom/show', ['stockrooms' => $stockrooms]);
    }

    public function edit($id)
    {
        $stockroom = Stockroom::where('id', $id)->first();
        return view('/stockroom/edit', ['stockroom' => $stockroom]);
    }

    public function editName($id)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);
        $stockroom =  Stockroom::find($id);
        $stockroom->name = $data['name'];
        $stockroom->save();
        return redirect('/stockroom/show');
    }

    public function destroy($id)
    {
        $stockroom =  Stockroom::find($id);
        $stockroom->delete();
        return redirect('/stockroom/show');
    }
}
