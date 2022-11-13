<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Log;
use Request;

class MediaController extends Controller
{

  public function index(Request $request)
  {
      $length = $request->get('length' , 12);
      $media = Media::search(request('term'))->latest()->paginate($length);
      if($request->has('ids')){
          $media = Media::whereIn('id' , $request->get('ids' ,[]))->get();
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

                $media = Media::create([
                    'name' => $file->getClientOriginalName(),
                    'file_name' => $file->getClientOriginalName(),
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
