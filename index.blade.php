@extends('layouts.app')

@section('content')
    <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn success">Criar Produto</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    </thead>
        <tbody>
        @foreach($products as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>
                 <a href="{{route('admin.products.edit', ['store' => $p->id])}}" class="btn btn-sm btn-default">EDITAR</a>
                 <a href="{{route('admin.products.edit', ['store' => $p->id])}}" class="btn btn-sm btn-default">REMOVER</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$store->links()}}
@endsection
