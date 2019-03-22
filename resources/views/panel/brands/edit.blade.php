@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home ></a>
    <a href="{{ route('brands.index') }}" class="bred">Brands ></a>
    <a href="{{ route('brands.edit', $brand->id) }}" class="bred">Editar ></a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{$title}}</h1>
</div>

<div class="content-din">

    <form class="form form-search form-ds" action="{{ route('brands.update', $brand->id) }}" method="POST">
        {{csrf_field()}}
        {!! method_field('PUT') !!}
        <div class="form-group">
            <input type="text" value="{{ $brand->name }}" name="name" placeholder="Nome:" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-search">Enviar</button>
        </div>
    </form>

</div><!--Content Dinâmico-->

@endsection