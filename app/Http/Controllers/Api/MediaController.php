<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Log;

class MediaController extends Controller
{

  public function index(Request $request)
  {
      $length = $request->get('length' , 12);
      if($request->has('ids')){
        $media = Media::whereIn('id' , $request->get('ids' ,[]))->get();
      }else{
        $media = Media::search(request('term'));
        foreach ($request->get('type' , ['all']) as $key => $type) {
          # code...
          $media = $media->type($type , $key);
        }


        $media = $media->latest()->paginate($length);
      }
      return MediaResource::collection($media);
  }

  public function getImg($id)
  {

      $media = Media::find($id);
      return new MediaResource($media);

  }


    public function store()
    {
        request()->validate([
            'file' => ['file', 'max:512000']
        ], [
            'max' => 'File cannot be larger than 512MB.'
        ]);

        try {

            $media = DB::transaction(function() {

                $file = request()->file('file');
                $file_name = str_replace(" ","_",$file->getClientOriginalName());

                $media = Media::create([
                    'name' => $file_name,
                    'file_name' => $file_name,
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                    'author_id' => auth()->id()
                ]);

                $directory = "media/{$media->created_at->format('Y/m/d')}/{$media->id}";
                $media = Media::find($media->id);
                $media->update([
                'file_path' => $directory.'/'.$media->file_name
                ]);
                $file->storeAs($directory, $media->file_name, 'public');


                return $media;
            });

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

            return response()->json(['message' => $exception->getMessage()], 422);
        }


        return [
            'id' => $media->id,
            'preview_url' => $media->preview_url,
            'full_url' => $media->full_url,
        ];
    }

    public function destroy()
    {
        request()->validate([
            'mediaIds' => ['required', 'array']
        ]);

        foreach (Media::find(request('mediaIds')) as $media) {
            $media->delete();
            Storage::disk('public')->delete($media->path);
        }

        return redirect()->back();
    }
}
