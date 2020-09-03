<div class="row">
    <div class="col-sm-12">
        @if ($contacts->isNotEmpty())
            <h3 class="text-center">Todos los contactos</h3>    
        @endif
      <table class="table table-striped table-responsive py-3">
        @if ($contacts->isNotEmpty())
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Correo</td>
                    <td>Número de contacto</td>
                    <td class="text-center" colspan="3">Acciones</td>
                </tr>
            </thead>
        @endif
        <tbody>
            @forelse ($contacts as $key => $contact)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->surname}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->contact_number}}</td>
                <td>
                    <a href="{{ route('contacts.show',$contact->id)}}" class="btn btn-primary">Ver</a>
                </td>
                <td>
                    <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
                <h1 class="text-center mt-5 mb-5">No resultados</h1>
            @endforelse 
        </tbody>
      </table>
    <div>
    </div>