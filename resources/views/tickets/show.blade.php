@extends('tickets.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Ticket {{ $ticket->id }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tickets.index') }}">Tickets list</a>
            </div>
        </div>
    </div>
    <form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">   
        <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edit</a>   
        @csrf
        @method('DELETE')      
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $ticket->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                {{ $ticket->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <image height="100px" src="{{asset( $ticket->photo )}}"/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Propietario:</strong>
                {{ $ticket->owner }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prioridad:</strong>
                {{ $ticket->priority }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    Show one
@endsection