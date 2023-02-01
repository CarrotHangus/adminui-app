<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'required|string',
            'description' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'reporter' => 'required|string',
        ]);

        $file = storage_path('app/public/hazard.json');
        $data = json_decode(file_get_contents($file), true);
        $data[] = $validatedData;
        file_put_contents($file, json_encode($data));

        $request->session()->flash('success', 'Hazard successfully submitted.');

        return back()->withInput();
    }
    
}
