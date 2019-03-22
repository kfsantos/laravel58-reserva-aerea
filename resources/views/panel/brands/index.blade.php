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
    <form class="form form-inline">
        <input type="text" name="nome" placeholder="Nome:" class="form-control">
        <button class="btn btn-search">Pesquisar</button>
    </form>
</div>

<div class="messages">
    @if(session ('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(session ('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif

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
                <a href="{{route('brands.destroy', $brand->id)}}" class="delete">Delete</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="200">Nenhum item Cadastrado!</td>
        </tr>
    @endforelse
</table>

<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

</div><!--Content Dinâmico-->

@endsection