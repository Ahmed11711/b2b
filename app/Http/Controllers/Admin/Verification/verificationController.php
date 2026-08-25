<?php

namespace App\Http\Controllers\Admin\Verification;

use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\verification\verificationStoreRequest;
use App\Http\Requests\Admin\verification\verificationUpdateRequest;
use App\Http\Requests\Admin\verification\verificationUpdateStatusRequest;
use App\Http\Requests\Admin\verification\verificationUpdateStoresRequest;
use App\Http\Resources\Admin\verification\verificationResource;
use App\Repositories\verification\verificationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerificationController extends BaseController
{
    public function __construct(verificationRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'verification',
            fileFields: ['id_card_front', 'id_card_back', 'commercial_register', 'tax_card']
        );

        $this->storeRequestClass  = verificationUpdateStoresRequest::class;
        $this->updateRequestClass = verificationUpdateStatusRequest::class;
        $this->resourceClass      = verificationResource::class;
    }



    /**
 
     */
    protected function applyScoping($query)
    {
        $user = auth('api')->user();

        if ($user && $user->role === 'super_admin') {
            return $query;
        }

        return $query->where('user_id', 11);
    }
}
