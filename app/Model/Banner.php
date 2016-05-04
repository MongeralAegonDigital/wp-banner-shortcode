<?php

namespace MAD\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner_shortcode';

    protected $fillable = array(
    'name', 'slug', 'html',
    );

    public function setHtmlAttribute($value)
    {
        $this->attributes['html'] = stripslashes($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(' ', '_', strtolower($value));
    }
}
