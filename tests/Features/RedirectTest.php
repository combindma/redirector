<?php

namespace Combindma\Redirector\Tests\Features;


use Combindma\Redirector\Models\Redirect;
use Combindma\Redirector\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RedirectTest extends TestCase
{
    use RefreshDatabase;

    protected function setData($data = [])
    {
        return array_merge([
            'old_url' => strtolower($this->faker->url),
            'new_url' => strtolower($this->faker->url),
            'status' => 302
        ], $data);
    }

    /** @test */
    public function admin_can_create_a_redirection()
    {
        $data = $this->setData();
        $response = $this->from(route('redirector::redirects.create'))->post(route('redirector::redirects.store'), $data);
        $response->assertRedirect(route('redirector::redirects.index'));
        $response->assertSessionHasNoErrors();
        $this->assertCount(1, $redirects = Redirect::all());
        $redirect = $redirects->first();
        $this->assertEquals($data['old_url'], $redirect->old_url);
        $this->assertEquals($data['new_url'], $redirect->new_url);
        $this->assertEquals($data['status'], $redirect->status);
    }

    /** @test */
    public function admin_can_edit_a_redirection()
    {
        $redirect = Redirect::factory()->create();
        $data = $this->setData();
        $response = $this->from(route('redirector::redirects.edit', $redirect))->put(route('redirector::redirects.update', $redirect), $data);
        $response->assertRedirect(route('redirector::redirects.edit', $redirect));
        $response->assertSessionHasNoErrors();
        $redirect->refresh();
        $this->assertEquals($data['old_url'], $redirect->old_url);
        $this->assertEquals($data['new_url'], $redirect->new_url);
        $this->assertEquals($data['status'], $redirect->status);
    }

    /** @test */
    public function admin_can_delete_a_redirection()
    {
        $redirect = Redirect::factory()->create();
        $response = $this->from(route('redirector::redirects.index'))->delete(route('redirector::redirects.destroy', $redirect));
        $response->assertRedirect(route('redirector::redirects.index'));
        $this->assertCount(0, Redirect::where('id', $redirect->id)->get());
    }
}
