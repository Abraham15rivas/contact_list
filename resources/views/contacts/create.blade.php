@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h3 class="text-center mt-5">Agregar contacto</h3>
     <div>
       @if ($errors->any())
         <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
           </ul>
         </div><br />
       @endif
         <form method="post" action="{{ route('contacts.store') }}">
            @csrf
            <div class="form-group">    
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name"/>
            </div>

            <div class="form-group">
                <label for="surname">Apellido</label>
                <input type="text" class="form-control" name="surname"/>
            </div>

            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="text" class="form-control" name="email"/>
            </div>
            <div class="form-group">
                <label for="contact_number">Número de contacto:</label>
                <input type="text" class="form-control" name="contact_number"/>
            </div>
            <a href="/home" class="btn btn-primary float-right">Atrás</a>                
            <button type="submit" class="btn btn-success float-right">Guardar</button>
         </form>
     </div>
   </div>
   </div>
@endsection
