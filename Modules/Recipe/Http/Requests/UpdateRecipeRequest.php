<?php namespace Modules\Recipe\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateRecipeRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'page::pages.validation.attributes';

    public function rules()
    {
       

        return [
           'name' => 'required',
            'content' => 'required'
        ];
    }



    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            
        ];
    }

    
}
