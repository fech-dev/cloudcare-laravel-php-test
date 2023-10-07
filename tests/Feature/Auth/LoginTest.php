<?php

use App\Models\User;

describe('Login', function () {

    beforeEach(function () {
        $this->user = User::factory()->create();
    });

    test('should respond with 422 error if username is not provided', function () {
        $credentials = [
            'password' => 'password'
        ];

        $route = route('auth.login');
        $this->postJson($route, $credentials)
            ->assertUnprocessable()
            ->assertInvalid([
                'username' => 'The username field is required'
            ]);
    });

    test('should respond with 422 error if password is not provided', function () {
        $credentials = [
            'username' =>  $this->user->username,
        ];

        $route = route('auth.login');
        $this->postJson($route, $credentials)
            ->assertUnprocessable()
            ->assertInvalid([
                'password' => 'The password field is required'
            ]);
    });

    test('should respond with 422 error if password is less then 8 chars', function () {
        $credentials = [
            'username' =>  $this->user->username,
            'password' => '1234'
        ];

        $route = route('auth.login');
        $this->postJson($route, $credentials)
            ->assertUnprocessable()
            ->assertInvalid([
                'password' => 'The password field must be at least 8 characters.'
            ]);
    });

    test('should respond with 401 if username does not exist', function () {
        $credentials = [
            'username' =>  'mario.rossi',
            'password' => 'password'
        ];

        $route = route('auth.login');
        $this->postJson($route, $credentials)
            ->assertUnauthorized();
    });

    test('should respond with 200 code and with a token', function () {

        $credentials = [
            'username' =>  $this->user->username,
            'password' => 'password'
        ];

        $route = route('auth.login');
        $this->postJson($route, $credentials)
            ->assertOk()
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in',
            ]);

    });
});
