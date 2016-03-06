<?php namespace Modules\Recipe\Http\Requests;
use Modules\Core\Internationalisation\BaseFormRequest;
class CreateRecipeRequest extends BaseFormRequest
{
   

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
