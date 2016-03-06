<?php namespace Modules\News\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateNewsRequest extends BaseFormRequest
{
    // protected $translationsAttributesKey = 'page::pages.validation.attributes';

    public function rules()
    {
       

         return [
            'name' => 'required',
            'url' => 'required|url',
            'short_content' => 'required|between:10,300',
            'long_content' => 'required|min:100',
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
