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

   
    <table class="table table-striped">
        <tr>
            <th>Marca</th>
            <th>Qte Passageiros</th>
            <th>Classe</th>
            <th>Criado Em:</th>
            <th>Atualizado Em:</th>
            <th width="150">Ações</th>
        </tr>
        @forelse($planes as $plane)
            <tr>
                <td>{{ $plane->brand_id }}</td>
                <td>{{ $plane->qty_passengers }}</td>
                <td>{{ $plane->class }}</td>
                <td>{{ $plane->created_at}}</td>
                <td>{{ $plane->updated_at }}</td>
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

</div><!--Content Dinâmico-->

@endsection