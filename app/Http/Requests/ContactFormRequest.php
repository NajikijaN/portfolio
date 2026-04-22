<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $recaptchaEnabled = (string) config('services.recaptcha.site_key') !== ''
            && (string) config('services.recaptcha.secret_key') !== '';

        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'g-recaptcha-response' => [
                Rule::requiredIf($recaptchaEnabled),
                new Recaptcha(config()),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vul je naam in.',
            'email.required' => 'Vul je e-mailadres in.',
            'email.email' => 'Vul een geldig e-mailadres in.',
            'message.required' => 'Vul een bericht in.',
        ];
    }
}
