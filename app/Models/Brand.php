<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;
    use HasFactory;

    protected function fullName(): Attribute
    {
        return Attribute::make(function () {
            if ($this->name_zh == '') {
                return $this->name_en;
            }
            elseif ($this->name_en == '') {
                return $this->name_zh;
            }
            else {
                return $this->name_zh . '(' . $this->name_en . ')';
            }
            
        });
    }
}
