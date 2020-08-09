<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $fillable = [
      'parent_id','title','logo','description','sorted','status','menu_show'
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
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children()
    {
        $this->hasMany(Category::class,'parent_id');
    }

    public function getCreatedAtAttribute($value)
    {
        $date = explode(' ',$value);
        $old_date = explode('-',$date[0]);
        $new_date = implode('-',\Morilog\Jalali\CalendarUtils::toJalali($old_date[0],$old_date[1],$old_date[2]));
        return $this->attributes['created_at'] = $new_date;
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
