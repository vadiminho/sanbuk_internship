<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    const TYPE_MOST_POPULAR = 0;
    const TYPE_BY_THEME = 1;
    const TYPE_BY_BOAT = 2;


}
