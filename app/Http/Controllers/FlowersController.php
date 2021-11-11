<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class FlowersController extends Controller
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
        return view('/flower/create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'image' => ['image'],
        ]);
        if (request()->hasFile('image')) {
            $imagePath = request('image')->store('image_uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();

        auth()->user()->flower()->create([
            'name' => $data['name'],
            'image' => $imagePath,
        ]);
        } else {
            $imagePath = 'image_uploads/NoImage.png';

            auth()->user()->flower()->create([
                'name' => $data['name'],
                'image' => $imagePath,
        ]);
        }
        return redirect('/flower/show');
    }

    public function showall()
    {
        $flowers = DB::table('flowers')->get();
        return view('/flower/show', ['flowers' => $flowers]);
    }

    public function show($id)
    {
        $flower = Flower::where('id', $id)->first();
        
        $stockrooms =DB::table('Stockroomflowers')->join('Stockrooms', 'stockrooms.id', '=', 'stockroomflowers.stockroom_id')
                ->join('flowers', 'flowers.id', '=', 'stockroomflowers.flower_id')->where('flower_id', $id)->select('stockrooms.name','stockroomflowers.id', 'flower_id', 'aantal')->get();
        
        $total_flowers =DB::table('Stockroomflowers')->join('Stockrooms', 'stockrooms.id', '=', 'stockroomflowers.stockroom_id')
                ->join('flowers', 'flowers.id', '=', 'stockroomflowers.flower_id')->where('flower_id', $id)->sum('aantal');

        return view('/flower/showone', ['flower' => $flower, 'stockrooms' => $stockrooms, 'total_flowers' =>$total_flowers]);
    }

    public function edit($id)
    {
        $flower = flower::where('id', $id)->first();
        return view('/flower/edit', ['flower' => $flower]);
    }

    public function editName($id)
    {
        $data = request()->validate([
            'name' => 'required',
            'image' => ['image'],
        ]);

        if (request()->hasFile('image')) {
            $imagePath = request('image')->store('image_uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();

            $flower =  flower::find($id);
            $flower->name = $data['name'];
            $flower->image = $imagePath;
            $flower->save();
        }

        return redirect('/flower/show');
    }

    public function destroy($id)
    {
        $flower = flower::find($id);
        $flower->delete();
        return redirect('/flower/show');
    }
}