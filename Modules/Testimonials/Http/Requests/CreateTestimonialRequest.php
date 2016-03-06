<?php namespace Modules\Testimonials\Http\Requests;
use Modules\Core\Internationalisation\BaseFormRequest;
class CreateTestimonialRequest extends BaseFormRequest
{
   

    public function rules()
    {
        return [
            'name' => 'required',
            'content' => 'required',
            'address' => 'required',
            'reviews' => 'required',
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
