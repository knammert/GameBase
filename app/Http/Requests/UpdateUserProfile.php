<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\AlphaSpaces;


class UpdateUserProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $userId = Auth::id();
        return [
            'email' => [
                'required',
                Rule::unique('users')->ignore($userId),
                'email'
            ],
            'name' => [
                'required',
                'max:15',
                new AlphaSpaces
            ],
            'phone' => [
                'min:9'
            ],
            'avatar' => 'nullable|file|image'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Podany adres email jest zajęty',
            'name.max' => 'Maksymalna ilość znaków to: :max'
        ];
    }
}
