<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{route('formulario_submit')}}" method="post">
        @csrf

        <div>
            <label>Nome:</label><br>
            <input type="text" name="text_nome" size="40" value="{{old('text_nome')}}">
        </div>

        <div>
            <label>Telefone:</label><br>
            <input type="text" name="text_telefone" size="40" value="{{old('text_telefone')}}">
        </div>

        <div>
            <label>Email:</label><br>
            <input type="email" name="text_email" size="40" value="{{old('email')}}">
        </div>

        <div>
            <input type="submit" value="Salvar">
        </div>
    </form>

    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif

</body>
</html>
