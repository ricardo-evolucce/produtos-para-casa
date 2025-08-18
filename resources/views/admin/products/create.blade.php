@extends('layouts.admin')

@section('title', 'Cadastrar Produto')

@section('content')
<h1>Cadastrar Produto</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Nome do Produto:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-control">
        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        @error('description')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="image">Imagem do Produto:</label>
        <input type="file" name="image" id="image" required class="form-control">
        @error('image')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="url">URL de Afiliado:</label>
        <input type="url" name="url" id="url" value="{{ old('url') }}" required class="form-control">
        @error('url')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="category">Categoria:</label>
        <input type="text" name="category" id="category" value="{{ old('category') }}" class="form-control">
        @error('category')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
        <label for="alt">Texto alternativo da imagem (ALT):</label>
        <input type="text" name="alt" id="alt" value="{{ old('alt') }}" class="form-control">
        @error('alt')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="form-group">
    <label for="price">Preço:</label>
    <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required class="form-control">
    @error('price')<small class="text-danger">{{ $message }}</small>@enderror
</div>


    <button type="submit" class="btn btn-primary">Salvar Produto</button>
</form>
@endsection
