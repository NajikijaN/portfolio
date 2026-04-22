<?php

it('validates the required contact form fields', function () {
    $response = $this->from('/')->post(route('contact.send'), []);

    $response->assertRedirect('/');
    $response->assertSessionHasErrors([
        'name',
        'email',
        'message',
    ]);
});
