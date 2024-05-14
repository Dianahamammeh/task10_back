<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        
        $documents = Cache::remember('documents', 60, function () {
            return Document::all();
        });

        return view('document.index', compact('documents'));
    }

    public function show(Document $document)
    {
        
        {
            $url = Storage::url($document->file_path);
        
            return response()->json([
                'title' => $document->title,
                'description' => $document->description,
                'file_url' => $url,
            ]);

    }}


    public function store(Request $request)
    {
       
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
    ]);

    $file = $request->file('file');
    $path = Storage::putFile('documents', $file);

    Document::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'file_path' => $path,
    ]);

    return response()->json(['message' => 'Document created successfully'], 201);
}
    

    public function update(Request $request, Document $document)
    {
        $document->update($request->all());
        return response()->json($document);
    }

    public function destroy(Document $document)
   {
    Storage::delete($document->file_path);

    $document->delete();

    return response()->json(['message' => 'Document deleted successfully'], 204);
}
}