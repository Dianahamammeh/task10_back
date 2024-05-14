<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::all();
        return response()->json($folders);
    }

    public function show(Folder $folder)
    {
        return response()->json($folder);
    }

    public function store(Request $request)
    {
        $folder = Folder::create($request->all());
        return response()->json($folder, 201);
    }

    public function update(Request $request, Folder $folder)
    {
        $folder->update($request->all());
        return response()->json($folder);
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();
        return response()->json(null, 204);
    }
}