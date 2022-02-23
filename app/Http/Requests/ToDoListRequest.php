<?php

namespace App\Http\Requests;
use App\Models\Dolist;
use Illuminate\Foundation\Http\FormRequest;

class ToDoListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'deadline' => 'required',
            'task' => [
                'required',
                function($attribute, $value, $fail){
                    $res = Dolist::where($attribute, $value)->where('task', $this->request->get('task'))->get();
                    if($res->count() > 0){
                        $fail("Already Exist");
                    }
                }
            ]
        ];
    }
}
