@extends('base')

@section('title', $category->exists ? "Editer une catégorie" : "Créer une catégorie")

@section('content')
    <form action="{{ $category->exists ? route('category.update', $category) : route('category.store')}}" id="propertyForm" class="col-10 m-auto card p-3 vstack gap-2" method="POST">
        @csrf
        @method($category->exists ? "PATCH" : "POST")
        <h2 class="text-center">@yield('title')</h2>
        <hr class="mt-0">
        @include('shared.input', [
                'label' => 'Nom de la catégorie',
                'value' => $category->name,
                'name' => 'name',
                'class' => 'col'
            ])
        <button type="submit" class="btn btn-primary">{{ $category->exists ? "Modifier" : "Créer"}}</button>
    </form>
@endsection