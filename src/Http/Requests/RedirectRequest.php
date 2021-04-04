<?php

namespace Combindma\Redirector\Http\Requests;

use Elegant\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Foundation\Http\FormRequest;

class RedirectRequest extends FormRequest
{
    use SanitizesInput;

    public function authorize()
    {
        return true;
    }

    public function filters()
    {
        return [
            'old_url' => 'trim|lowercase',
            'new_url' => 'trim|lowercase',
            'status' => 'digit',
        ];
    }

    public function rules()
    {
        return [
            'old_url' => 'required|string',
            'new_url' => 'required|string',
            'status' => 'nullable|numeric',
        ];
    }
}
