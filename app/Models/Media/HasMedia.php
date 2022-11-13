<?php

namespace App\Models\Media;

use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasMedia
{

    /**
     * A model may have multiple media.
     */
    public function hasMedia()
    {

        if($this->media->count()){
            return true ;
        }

        return false ;
    }

    /**
     * A model may have multiple media.
     */
    public function getMediaResource($collection = 'default')
    {
        $getFirstMediaUrl = MediaResource::collection($this->getMedia($collection));

        return $getFirstMediaUrl ;
    }

    /**
     * A model may have multiple media.
     */
    public function getFirstMediaResource($collection = 'default')
    {
        $getFirstMediaUrl = new MediaResource($this->getFirstMedia($collection));

        return $getFirstMediaUrl ;
    }

    /**
     * A model may have multiple media.
     */
    public function getFirstMediaUrl($collection = 'default')
    {
        return $this->hasMedia() && $this->getFirstMedia($collection) ? $this->getFirstMedia($collection)->full_url  : 'https://via.placeholder.com/500';
    }


    /**
     * A model may have multiple media.
     */
    public function getMedia($collection = 'default')
    {
        return $this->media->where('pivot.collection' , $collection)->where('pivot.database' , getDatabase($this));
    }

    /**
     * A model may have multiple media.
     */
    public function getFirstMedia($collection = 'default')
    {
       
        return $this->media->where('pivot.collection' , $collection)->where('pivot.database' , getDatabase($this))->first();
    }


    /**
     * A model may have multiple media.
     */
    public function getAllMedia()
    {
        return $this->media;
    }


    /**
     * A model may have multiple media.
     */
    public function media(): MorphToMany
    {



        $oldConnection = $this->getConnectionName();

        return $this->morphToMany(
            Media::class,
            'model',
            'mediable',
            'model_id',
            'media_id'
        )->withPivot(['collection','database']);
    }

}
