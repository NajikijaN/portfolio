<?php

use Illuminate\Support\Facades\Http;

it('validates the required contact form fields', function () {
    $response = $this->from('/')->post(route('contact.send'), []);

    $response->assertRedirect('/');
    $response->assertSessionHasErrors([
        'name',
        'email',
        'message',
    ]);
});

it('requires a recaptcha response when recaptcha is configured', function () {
    config()->set('services.recaptcha.site_key', 'test-site-key');
    config()->set('services.recaptcha.secret_key', 'test-secret-key');

    $response = $this->from('/')->post(route('contact.send'), [
        'name' => 'Kijan',
        'email' => 'kijan@example.com',
        'message' => 'Hallo!',
    ]);

    $response->assertRedirect('/');
    $response->assertSessionHasErrors([
        'g-recaptcha-response',
    ]);
});

it('rejects the form when recaptcha verification fails', function () {
    config()->set('services.recaptcha.site_key', 'test-site-key');
    config()->set('services.recaptcha.secret_key', 'test-secret-key');

    Http::fake([
        'https://www.google.com/recaptcha/api/siteverify' => Http::response([
            'success' => false,
        ]),
    ]);

    $response = $this->from('/')->post(route('contact.send'), [
        'name' => 'Kijan',
        'email' => 'kijan@example.com',
        'message' => 'Hallo!',
        'g-recaptcha-response' => 'invalid-token',
    ]);

    $response->assertRedirect('/');
    $response->assertSessionHasErrors([
        'g-recaptcha-response',
    ]);
});
