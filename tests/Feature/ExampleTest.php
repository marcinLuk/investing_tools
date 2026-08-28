<?php

use App\Models\User;

test('guests visiting the home page are redirected to the login screen', function () {
    $response = $this->get(route('home'));

    $response->assertRedirect(route('login'));
});

test('authenticated users visiting the home page end up on the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->followingRedirects()->get(route('home'));

    $response->assertOk();
    $this->assertSame(route('dashboard'), url()->current());
});
