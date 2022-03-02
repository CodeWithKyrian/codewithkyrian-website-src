<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaLibraryRequest;
use App\Http\Resources\Media as MediaResource;
use App\Models\MediaLibrary;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    private MediaLibrary $mediaLibrary;

    public function __construct() {
         $this->mediaLibrary = MediaLibrary::first();
    }

    /**
     * Return the comments.
     */
    public function index(Request $request): ResourceCollection
    {
        return MediaResource::collection(
            $this->mediaLibrary->media()->paginate($request->input('limit', 20))
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaLibraryRequest $request)
    {
        // $this->authorize('store', Media::class);

        $image = $request->file('file');
        $name = $image->getClientOriginalName();

        if ($request->filled('name')) {
            $name = $request->input('name');
        }

        $media = $this->mediaLibrary
                        ->addMedia($image)
                        ->usingName($name)
                        ->toMediaCollection();

        // return new MediaResource(
        //     $this->mediaLibrary
        //                 ->addMedia($image)
        //                 ->usingName($name)
        //                 ->toMediaCollection()
        // );
        return response()->json([
            'location' => $media->getFullUrl()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $medium): Response
    {
        $this->authorize('delete', $medium);

        $medium->delete();

        return response()->noContent();
    }
}
