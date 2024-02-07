<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    return [
        'host' => 'required',
        'port' => 'required',
        'username' => 'required',
        'password' => 'required',
        'fromEmail' => 'required',
        'useTLS' => 'required', // Rimosso il "required" e assicurato che sia trattato come booleano
        'useSSL' => 'required', // Rimosso il "required" e assicurato che sia trattato come booleano
    ];
}
}
