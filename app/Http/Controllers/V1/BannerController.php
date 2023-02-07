<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use Illuminate\Http\Request;


class BannerController extends Controller
{
    public function __construct(private BannerService $bannerService)
    {
    }


    public function getRecordByType($bannerType)
    {
        return $this->bannerService->getBannerRecord($bannerType);
    }
}
