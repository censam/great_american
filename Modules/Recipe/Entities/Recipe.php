<?php namespace Modules\Recipe\Entities;

use Illuminate\Database\Eloquent\Model;
// use Dimsav\Translatable\Translatable;
// use Modules\Media\Repositories\FileRepository;
use Modules\Media\Support\Traits\MediaRelation;
class Recipe extends Model
{
	use MediaRelation;
    protected $table = 'recipe__recipes';
    protected $fillable = ['name','content'];
    public function getGalleryAttribute()
    {
    return $this->files()->where('zone','gallery')->get();
    }
}
