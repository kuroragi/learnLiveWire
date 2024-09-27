<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrixAttachmentController extends Controller
{
    public function store(Request $request){
        response()->json('masuk');
        $file = $request->file('attachment');
        $path = $file->store('attachment', 'public');

        return response()->json([
            'url' => Storage::url($path)
        ]);
    }
}
