<?php

namespace App\Http\Requests\Backend\Forum\Assignment;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ManageAssignmentRequest.
 */
class ManageAssignmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isExecutive();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
