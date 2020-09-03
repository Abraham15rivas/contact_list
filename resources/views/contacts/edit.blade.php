@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3 class="text-center mt-5">Actualizar contacto</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" value={{ $contact->name }} />
            </div>

            <div class="form-group">
                <label for="surname">Apellido:</label>
                <input type="text" class="form-control" name="surname" value={{ $contact->surname }} />
            </div>

            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="text" class="form-control" name="email" value={{ $contact->email }} />
            </div>
            <div class="form-group">
                <label for="contact_number">Número de contacto</label>
                <input type="text" class="form-control" name="contact_number" value={{ $contact->contact_number }} />
            </div>
            <a href="/home" class="btn btn-primary float-right">Atrás</a>
            <button type="submit" class="btn btn-success float-right">Actualizar</button>
        </form>
    </div>
</div>
@endsection
