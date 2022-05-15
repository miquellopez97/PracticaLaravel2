@extends('tickets.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>M07-PR04 Index</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="pull-right">
                <a class="btn btn-success" href="create"> Create New Ticket</a>
            </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Propietario</th>
            <th>Prioridad</th>
            <th>Fecha de creación</th>
        </tr>
        @foreach ($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->title }}</td>
            <td>{{ $ticket->owner }}</td>
            <td>{{ $ticket->priority }}</td>
            <td>{{ $ticket->created_at }}</td>
            <td>
                <form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('tickets.show',$ticket->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection

@section('footer')
    Index
@endsection