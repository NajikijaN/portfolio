<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Translation\PotentiallyTranslatedString;
use Throwable;

class Recaptcha implements ValidationRule
{
    public function __construct(
        private readonly Repository $config,
    ) {}

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isEnabled()) {
            return;
        }

        if (! is_string($value) || $value === '') {
            $fail('Bevestig dat je geen robot bent.');

            return;
        }

        $secret = (string) $this->config->get('services.recaptcha.secret_key');

        try {
            $response = Http::asForm()
                ->timeout(10)
                ->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => $secret,
                    'response' => $value,
                ]);
        } catch (Throwable) {
            $fail('De reCAPTCHA controle is mislukt. Probeer het opnieuw.');

            return;
        }

        $payload = $response->json();

        if (! $response->successful() || ! is_array($payload) || ! ($payload['success'] ?? false)) {
            $fail('De reCAPTCHA controle is mislukt. Probeer het opnieuw.');
        }
    }

    private function isEnabled(): bool
    {
        $siteKey = (string) $this->config->get('services.recaptcha.site_key');
        $secretKey = (string) $this->config->get('services.recaptcha.secret_key');

        return $siteKey !== '' && $secretKey !== '';
    }
}
