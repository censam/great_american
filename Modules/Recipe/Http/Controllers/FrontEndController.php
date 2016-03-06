<?php namespace Modules\Recipe\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Recipe\Repositories\RecipeRepository;

class FrontEndController extends BasePublicController
{
    /**
     * @var RecipeRepository
     */
    private $recipe;
    
    public function __construct(RecipeRepository $recipe)
    {
        
        $this->recipe = $recipe;
        
    }

    public function index()
    {
        $recipes = $this->recipe->all();
        return view('recipe::public.recipes',compact('recipes'));
    }

    public function show($id)
    {
        $recipe = $this->recipe->find($id);
        return view('recipe::public.recipe',compact('recipe'));
    }

   
}
