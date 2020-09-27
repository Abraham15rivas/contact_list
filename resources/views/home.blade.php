@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <a class="navbar-brand">{{ __('Lista de contactos') }}</a>
                        <form class="form-inline" method="post" action="{{ route('contact.search') }}">
                            @csrf
                            <input class="form-control mr-sm-2" type="search" placeholder="buscar" name="search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    </nav>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido!') }}
                    <a href="{{ route('contacts.create') }}" class="btn btn-info float-right">Agregar contacto</a>
                </div>
                @include('contacts.index')
                <div class="float-right">
                    @if (!isset($search))
                        {{ $contacts->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
