<?php namespace Modules\Testimonials\Entities;

// use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;
class Testimonials extends Model
{
    // use Translatable;
	use MediaRelation;
    protected $table             = 'testimonials__testimonials';
    public $translatedAttributes = [];
    protected $fillable          = ['name','content','address','reviews'];
}
