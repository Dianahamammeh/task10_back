<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'folder_id',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    
    public static function getAllDocuments()
    {
        return Cache::remember('documents', 60, function () {
            return self::all();
        });
    }
}