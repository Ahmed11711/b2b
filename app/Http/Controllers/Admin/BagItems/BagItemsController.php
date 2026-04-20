<?php

namespace App\Http\Controllers\Admin\BagItems;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\BagItems\BagItemsStoreRequest;
use App\Http\Requests\Admin\BagItems\BagItemsUpdateRequest;
use App\Http\Resources\Admin\BagItems\BagItemsResource;
use App\Repositories\BagItems\BagItemsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BagItemsController extends BaseController
{
    public function __construct(BagItemsRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'BagItems',
            fileFields: ['image']
        );

        $this->hasGallery         = true;
        $this->withRelationships  = ['gallery'];
        $this->storeRequestClass  = BagItemsStoreRequest::class;
        $this->updateRequestClass = BagItemsUpdateRequest::class;
        $this->resourceClass      = BagItemsResource::class;
    }

    protected function beforeStore(array $data, Request $request): array
    {
        unset($data['gallery']);
        return $data;
    }

    protected function beforeUpdate(array $data, $existingRecord, Request $request): array
    {
        unset($data['gallery']);
        return $data;
    }

    protected function uploadGalleryFiles(Request $request, $record): void
    {
        $galleryItems = $request->input('gallery', []);

        if (empty($galleryItems) || !method_exists($record, 'gallery')) return;

        foreach ($galleryItems as $index => $item) {
            try {
                // جيب الملف من gallery[index][file]
                $file = $request->file("gallery.{$index}.file");
                $type = $item['type'] ?? 'other';

                if (!$file) continue;

                $filename = time() . '_' . Str::random(8) . '_' . $file->getClientOriginalName();
                $path = $file->storeAs("uploads/{$this->collectionName}/gallery", $filename, $this->uploadDisk);

                $record->gallery()->create([
                    'image' => "/storage/" . $path,
                    'type'  => $type,
                ]);
            } catch (\Throwable $e) {
                Log::error("Gallery upload failed for BagIte   ms: " . $e->getMessage());
            }
        }
    }
}
