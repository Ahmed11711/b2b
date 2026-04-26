<?php

namespace App\Http\Controllers\Api\Bids;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Bids\BidsRequest;
use App\Models\bids;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BidsController extends Controller
{
    use ApiResponseTrait;


    public function store(BidsRequest $request)
    {

        $data = $request->validated();
        $user_id = $request->get('user_id');

        $bids = bids::create([
            'user_id' => $user_id,
            'post_id' => $data['post_id'],
        ]);

        return $this->successResponse($bids, "Bid created successfully");
    }
}
