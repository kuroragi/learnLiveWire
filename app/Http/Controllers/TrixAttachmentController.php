<?php

namespace App\Http\Controllers;

use App\Models\PostsAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrixAttachmentController extends Controller
{
    public function store(Request $request){
        $file = $request->file('attachment');
        $path = $file->store('attachment', 'public');

        // PostsAttachment::create([
        //     'id_post' => 'newattachment',
        //     'attachment' => $path,
        // ]);

        return response()->json([
            'url' => Storage::url($path)
        ]);
    }

    public function remove(Request $request) {
        
        $fileUrl = $request->input('file_url');

        $filepath = str_replace(asset('storage'), 'public', $fileUrl);

        if(Storage::exists($filepath)){
            // PostsAttachment::destroy('id', $request->id);
            Storage::delete($filepath);
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false, 'message' => 'file not found'], 404);
    }
}
