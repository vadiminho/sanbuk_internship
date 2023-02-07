<?php

namespace App\Services;

use App\Models\Banner;


class BannerService
{

    public function getBannerRecord($bannerType)
    {
        return Banner::where('type', $bannerType)->get();
    }
}