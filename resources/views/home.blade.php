@extends('layouts/app_layout')

@php
    use App\Classes\Enc;
    $enc = new Enc();
@endphp

@section('conteudo')
    <div>
        <h3>Lista de Usuários</h3>
        <hr>

        <ul>
        @foreach ($usuarios as $user)
            <li><a href="{{route('main_edit', ['id_usuario' => $enc->encriptar($user->id)])}}">EDIT</a> - {{$user->usuario}}</li>
        @endforeach
        </ul>
    </div>

    <div>
        <h3>Upload de Ficheiro</h3>
        <form method="post" action="{{route('main_upload')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="ficheiro">
            <input type="submit" value="Enviar">
        <form>
    </div>

    {{-- errors --}}
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

@endsection
