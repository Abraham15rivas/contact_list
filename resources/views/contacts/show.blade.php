@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3 class="text-center mt-5">Vista contacto</h3>
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value={{ $contact->name }} readonly/>
        </div>
        <div class="form-group">
            <label for="surname">Apellido:</label>
            <input type="text" class="form-control" name="surname" value={{ $contact->surname }} readonly/>
        </div>
        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="text" class="form-control" name="email" value={{ $contact->email }} readonly/>
        </div>
        <div class="form-group">
            <label for="contact_number">Número de contacto</label>
            <input type="text" class="form-control" name="contact_number" value={{ $contact->contact_number }} readonly/>
        </div>
        <a href="/home" class="btn btn-primary float-right">Atrás</a>
    </div>
</div>
@endsection
