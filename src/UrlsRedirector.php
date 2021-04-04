<?php


namespace Combindma\Redirector;

use Combindma\Redirector\Models\Redirect;
use Spatie\MissingPageRedirector\Redirector\Redirector;
use Symfony\Component\HttpFoundation\Request;

class UrlsRedirector implements Redirector
{
    public function getRedirectsFor(Request $request): array
    {
        return Redirect::all()->flatMap(function ($redirect) {
            return [$redirect->old_url => [$redirect->new_url, $redirect->status]];
        })->toArray();
    }
}
