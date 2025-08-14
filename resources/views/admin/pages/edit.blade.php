@if($errors->any())
    <div style="color: red;">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@extends('layouts.admin')

@section('content')
    <h1>Edit Page: {{ $page->title }}</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.pages.update', $page->id) }}"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title', $page->title) }}" required>
            @error('title')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 10px;">
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4">{{ old('description', $page->description) }}</textarea>
            @error('description')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <h3>Select Products to show on this page:</h3>
            @foreach($products as $product)
                <div>
                    <label>
                        <input 
                            type="checkbox" 
                            name="products[]" 
                            value="{{ $product->id }}" 
                            {{ in_array($product->id, old('products', $page->products->pluck('id')->toArray())) ? 'checked' : '' }}
                        >
                        {{ $product->name }}
                    </label>
                </div>
            @endforeach
            @error('products')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Imagem Hero atual -->
    @if($page->hero_image)
    <div class="form-group">
        <label>Imagem Hero Atual:</label><br>
        <img src="{{ asset('img/' . $page->hero_image) }}" alt="{{ $page->title }}" style="max-width: 400px; margin-top: 10px; border-radius: 6px;">
    </div>
    @endif

    <!-- Upload nova imagem -->
    <div class="form-group">
        <label for="hero_image">Substituir Imagem Hero (JPG, PNG, WEBP)</label>
        <input type="file" name="hero_image" id="hero_image" class="form-control" accept="image/*">
        <small>Será convertida automaticamente para WebP e comprimida.</small>
    </div>

        <div style="margin-top: 20px;">
            <button type="submit">Save</button>
            <a href="{{ route('admin.pages.index') }}">Cancel</a>
        </div>
    </form>
@endsection
