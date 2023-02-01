<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Form2Controller extends Controller
{
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'date' => 'required',
        ]);

        $file = storage_path('app/public/News.json');
        $data = json_decode(file_get_contents($file), true);
        $data[] = $validatedData;
        file_put_contents($file, json_encode($data));

        $request->session()->flash('success', 'News successfully submitted.');

        return back()->withInput();
    }
}
