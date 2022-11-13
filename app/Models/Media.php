<?php

namespace App\Models;

use App\Models\Traits\HasConnationLandLoad;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static $types = [
        'image' => [
            'image/gif',
            'image/avif',
            'image/apng',
            'image/png',
            'image/svg+xml',
            'image/webp',
            'image/jpeg'
        ],
        'audio' => [
            'audio/mpeg',
            'audio/aac',
            'audio/wav',
        ],
        'video' => [
            'video/mp4',
            'video/webm',
            'video/mpeg',
            'video/x-msvideo',
        ],
        'document' => [
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/pdf'
        ],
        'archive' => [
            'application/zip',
            'application/x-7z-compressed',
            'application/gzip',
            'application/vnd.rar',
        ],
    ];


    public function getFileTypeAttribute()
    {
        foreach (self::$types as $type => $mimes) {
            if (in_array($this->mime_type, $mimes)) {
                return $type;
            }
        }

        return 'other';
    }

    public function getPreviewUrlAttribute()
    {
        $urls = collect([
            // 'image' => url("storage/media/{$this->author->name}/{$this->created_at->format('Y/m/d')}/{$this->id}/{$this->file_name}"),
            'image' => Storage::url($this->file_path),
            'audio' => asset('images/file-type-audio.svg'),
            'video' => asset('images/file-type-video.svg'),
            'document' => asset('images/file-type-document.svg'),
            'archive' => asset('images/file-type-archive.svg'),
            'other' => asset("images/file-type-other.svg")
        ]);

        return $urls[$this->file_type];
    }

    public function getUrlAttribute()
    {
        return Storage::url($this->file_path);
    }


    public function getFullUrlAttribute()
    {
        return url('/')  . Storage::url($this->file_path);
    }


    public function getPathAttribute()
    {
        return "{$this->file_path}";
    }

    public static function getMimes($fileType)
    {
        return self::$types[$fileType] ?? [];
    }

    public function scopeType(Builder $builder, $type)
    {
        if (!is_null($type)) {
            $builder->whereIn('mime_type', self::getMimes($type));
        }

        return $builder;
    }

    public function scopeMonth(Builder $builder, $date)
    {
        if (!is_null($date)) {
            $builder->whereBetween('created_at', [
                Carbon::createFromFormat('d-m-Y', $date)->startOfMonth(),
                Carbon::createFromFormat('d-m-Y', $date)->endOfMonth(),
            ]);
        }

        return $builder;
    }

    public function scopeSearch(Builder $builder, $term)
    {
        if (!is_null($term)) {
            $builder->where('name', 'LIKE', "%$term%");
        }

        return $builder;
    }

    public function modelable()
    {
      return $this->morphTo();
    }

}
