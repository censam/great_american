<?php namespace Modules\News\Entities;


use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;
class News extends Model
{
    

    protected $table = 'news__news';
    public $translatedAttributes = [];
    protected $fillable = ['name','url','short_content','long_content'];
}
