@extends('base')

@section('title', 'Liste des catégories')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('category.create')}}" class="btn btn-primary">Ajouter une catégorie</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th  class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{$categorie->name}}</td>
                    
                    <td >
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{route('category.edit', $categorie)}}" class="btn btn-primary">Editer</a>
                            <form action="{{route('category.destroy', $categorie)}}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links()}}

@endsection