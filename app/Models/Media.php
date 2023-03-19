<?php

namespace App\Models;

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
            'image' => url('/')  . Storage::url($this->file_path),
            'audio' => asset('images/file-type-audio.svg'),
            'video' => asset('images/video_type_file.jpg'),
            'document' => asset('images/pdf_type_file.jpg'),
            'archive' => asset('images/file-type-archive.svg'),
            'other' => asset("images/file-type-other.svg")
        ]);

        return $urls[$this->file_type];
    }

    public function getUrlAttribute()
    {
      return url('/')  . Storage::url($this->file_path);
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

    public function scopeType(Builder $builder, $type , $index = 0)
    {
      $mimes = collect(self::$types)->collapse();

      if($index === 0){

        if (!is_null($type) && $type != 'all') {
            $builder->whereIn('mime_type', self::getMimes($type));
        }else if($type == 'all'){
          $builder->whereIn('mime_type', $mimes);

        }
      }else{
        if (!is_null($type) && $type != 'all') {
          $builder->orWhereIn('mime_type', self::getMimes($type));
        }else if($type == 'all'){
          $builder->orWhereIn('mime_type', $mimes);

        }
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
