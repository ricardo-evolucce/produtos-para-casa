@extends('layouts.admin')

@section('title', 'Editar Produto')

@section('content')
<h1>Editar Produto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nome do Produto:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="form-control">
        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        @error('description')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="image">Imagem do Produto:</label>
        <input type="file" name="image" id="image" class="form-control">
        @if($product->image)
            <div style="margin-top:10px;">
                <img src="{{ asset($product->image) }}" alt="{{ $product->alt ?? $product->name }}" style="max-width:150px;">
            </div>
        @endif
        @error('image')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="url">URL de Afiliado:</label>
        <input type="url" name="url" id="url" value="{{ old('url', $product->url) }}" required class="form-control">
        @error('url')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="category">Categoria:</label>
        <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}" class="form-control">
        @error('category')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="alt">Texto alternativo da imagem (ALT):</label>
        <input type="text" name="alt" id="alt" value="{{ old('alt', $product->alt) }}" class="form-control">
        @error('alt')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Atualizar Produto</button>
</form>
@endsection
