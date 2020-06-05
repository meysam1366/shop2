<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'parent_id','title','logo','description','sorted','status'
    ];

    public function logoLink()
    {
        return url('/') . $this->logo;
    }

    public function statusText()
    {
        return $this->status == 1 ? 'فعال' : 'غیرفعال';
    }

    public function parent()
    {
        return $this->hasOne(Category::class,'id','parent_id');
    }

    public function getCreatedAtAttribute($value)
    {
        $date = explode(' ',$value);
        $old_date = explode('-',$date[0]);
        $new_date = implode('-',\Morilog\Jalali\CalendarUtils::toJalali($old_date[0],$old_date[1],$old_date[2]));
        return $this->attributes['created_at'] = $new_date;
    }
}
