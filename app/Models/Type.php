<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;
    use ModelTree;

    protected $depthColumn = 'depth';
}
