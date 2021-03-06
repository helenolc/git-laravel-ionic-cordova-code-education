@extends('app')

@section('content')

    <div class="container">
        <h3>Novo Produto</h3>

        @include('errors._check')

        {!! Form::open(['route'=>'admin.products.store','method'=>'POST', 'class'=>'form']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Criar Produtos',['class'=>'btn btn-primary']) !!}
        </div>



        {!! Form::close() !!}
    </div>


@endsection