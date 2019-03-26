@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home ></a>
    <a href="{{ route('brands.index') }}" class="bred">Brands ></a>
</div>


<div class="title-pg">
    <h1 class="title-pg">{{$title}}</h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
            <!-- <input type="text" name="nome" placeholder="Nome:" class="form-control"> -->
        {!! Form::open(['route' => 'brands.search', 'class' => 'form form-inline' ]) !!}
            {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja encontrar?']) !!}
            <button class="btn btn-search">Pesquisar</button>
        {!!Form::close()!!}
    </div>

    @if(isset($dataForm['key_search']))

        <div class="alert alert-info">
            <p>
                <a href="{{ route('brands.index') }}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                Resultados para: <strong>{{$dataForm['key_search']}}</strong>
            </p>
        </div>

    @endif


    <div class="messages">
      @include('panel.includes.alerts')
    </div>

    <div class="class-btn-insert">
        <a href="{{ route('brands.create') }}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar
        </a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Criado Em:</th>
            <th>Atualizado Em:</th>
            <th width="150">Ações</th>
        </tr>
        @forelse($brands as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->created_at}}</td>
                <td>{{ $brand->updated_at }}</td>
                <td>
                    <a href="{{route('brands.edit', $brand->id)}}" class="edit">Edit</a>
                    <a href="{{route('brands.show', $brand->id)}}" class="delete">View</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="200">Nenhum item Cadastrado!</td>
            </tr>
        @endforelse
    </table>

<!-- DataForm é necessário para paginação não perder os dados para a outra página -->
    @if(isset($dataForm))
        {!! $brands->appends($dataForm)->links() !!}
    @else
        {!! $brands->links() !!}
    @endif
</div><!--Content Dinâmico-->

@endsection