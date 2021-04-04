<?php

namespace Combindma\Redirector\Http\Controllers;


use Combindma\Redirector\Http\Requests\RedirectRequest;
use Combindma\Redirector\Models\Redirect;

class RedirectController extends Controller
{
    public function index()
    {
        $redirects = Redirect::all();
        return view('redirector::.index', compact('redirects'));
    }

    public function create()
    {
        $redirect = new Redirect();
        return view('redirector::.create', compact('redirect'));
    }

    public function store(RedirectRequest $request)
    {
        Redirect::create($request->validated());
        flash(__('redirector::messages.created'));
        return redirect()->route('redirector::redirects.index');
    }

    public function edit(Redirect $redirect)
    {
        return view('redirector::.edit', compact('redirect'));
    }

    public function update(RedirectRequest $request, Redirect $redirect)
    {
        $redirect->update($request->validated());
        flash(__('redirector::messages.updated'));
        return back();
    }

    public function destroy(Redirect $redirect)
    {
        $redirect->delete();
        flash(__('redirector::messages.deleted'));
        return back();
    }
}
