<?php

use Combindma\Redirector\Http\Controllers\RedirectController;
use Combindma\Redirector\Models\Redirect;
use function Pest\Faker\faker;
use function Pest\Laravel\from;
use function PHPUnit\Framework\assertCount;

function setData($data = [])
{
    return array_merge([
        'old_url' => strtolower(faker()->url),
        'new_url' => strtolower(faker()->url),
        'status' => 302,
    ], $data);
}

test('admin can create a redirection', function () {
    $data = setData();
    from(action([RedirectController::class, 'create']))
        ->post(action([RedirectController::class, 'store']), $data)
        ->assertRedirect(action([RedirectController::class, 'index']))
        ->assertSessionHasNoErrors();
    assertCount(1, $redirects = Redirect::all());
    $redirect = $redirects->first();
    expect($redirect->old_url)->toBe($data['old_url']);
    expect($redirect->new_url)->toBe($data['new_url']);
    expect($redirect->status)->toBe($data['status']);
});

test('admin can edit a redirection', function () {
    $redirect = Redirect::factory()->create();
    $data = setData();
    from(action([RedirectController::class, 'edit'], ['redirect' => $redirect]))
        ->put(action([RedirectController::class, 'update'], ['redirect' => $redirect]), $data)
        ->assertRedirect(action([RedirectController::class, 'edit'], ['redirect' => $redirect]))
        ->assertSessionHasNoErrors();
    $redirect->refresh();
    expect($redirect->old_url)->toBe($data['old_url']);
    expect($redirect->new_url)->toBe($data['new_url']);
    expect($redirect->status)->toBe($data['status']);
});

test('admin can delete a redirection', function () {
    $redirect = Redirect::factory()->create();
    from(action([RedirectController::class, 'index']))
        ->delete(action([RedirectController::class, 'destroy'], ['redirect' => $redirect]))
        ->assertRedirect(action([RedirectController::class, 'index']));
    assertCount(0, Redirect::where('id', $redirect->id)->get());
});
