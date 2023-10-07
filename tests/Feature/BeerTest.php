<?php

use App\Models\User;

describe('Beer', function () {
    describe('Guest Users', function () {
        test('are not allowed to list beers', function () {
            $route = route('beers.index');

            $this->getJson($route)
                ->assertUnauthorized();
        });
    });

    describe('Logged User', function () {

        beforeEach(function () {
            $this->user = User::factory()->create();
            $this->token = auth()->login($this->user);
        });

        test('can list 25 beers (default)', function () {
            $route = route('beers.index');

            $this->getJson($route)
                ->assertOk()
                ->assertJsonCount(25, 'data');
        });

        test('can list 20 beers', function () {
            $route = route('beers.index', ['per_page' => 20]);

            $this->getJson($route)
                ->assertOk()
                ->assertJsonCount(20, 'data');
        });


        test('can list 10 beers with pagination', function () {
            $route = route('beers.index', ['per_page' => 10, 'page' => 2]);

            $this->getJson($route)
                ->assertOk()
                ->assertJsonCount(10, 'data');
        });
    });
});
