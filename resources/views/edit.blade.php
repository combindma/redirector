@extends('dashui::layouts.app')
@section('title', 'Modifier redirection')
@section('content')
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="shadow sm:rounded-md">
            <form id="form-action" action="{{ route('redirector::redirects.update', $redirect) }}" method="POST">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div class="mb-4">
                        <h1 class="text-lg leading-6 font-medium text-gray-900">Modifier redirection</h1>
                    </div>
                    @include('dashui::components.alert')
                    @csrf
                    @method('PUT')
                    @include('redirector::form', ['createForm' => false])
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <a class="btn-subtle" href="{{ route('redirector::redirects.index') }}">Retour</a>
                    <button type="submit" class="ml-2 btn">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
