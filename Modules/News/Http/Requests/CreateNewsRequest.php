<?php namespace Modules\News\Http\Requests;
use Modules\Core\Internationalisation\BaseFormRequest;
class CreateNewsRequest extends BaseFormRequest
{
   

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
