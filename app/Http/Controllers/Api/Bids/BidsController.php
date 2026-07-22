<?php

namespace App\Http\Controllers\Api\Bids;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Bids\BidsRequest;
use App\Models\bids;
use App\Services\IpLocationService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BidsController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected IpLocationService $ipLocationService) {}

    public function store(BidsRequest $request)
    {
        $data = $request->validated();
        $user_id = $request->get('user_id');

        $ip = $request->ip();
        $location = $this->ipLocationService->getLocationFromIp($ip);

        $bids = bids::create([
            'user_id'         => $user_id,
            'post_id'         => $data['post_id'],
            'user_contact_id' => $data['user_contact_id'],
            'ip_address'      => $ip,
            'city'            => $location['city'],
            'country'         => $location['country'],
        ]);

        return $this->successResponse($bids, "Bid created successfully");
    }
}
