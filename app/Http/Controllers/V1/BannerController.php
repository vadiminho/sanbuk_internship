<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Subgroup;

#[Group('Banners')]
class BannerController extends Controller
{
    public function __construct(private BannerService $bannerService)
    {
    }

    #[Subgroup('Get Record')]
    #[Endpoint('Get Record By Type')]
    public function getRecordByType($bannerType)
    {
        return $this->bannerService->getBannerRecord($bannerType);
    }
}
