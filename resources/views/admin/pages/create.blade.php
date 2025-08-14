@extends('layouts.admin')

@section('content')
    <h1>Create New Page</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.pages.store') }}">
    @csrf

        <div>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 10px;">
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
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
                            {{ in_array($product->id, old('products', [])) ? 'checked' : '' }}
                        >
                        {{ $product->name }}
                    </label>
                </div>
            @endforeach
            @error('products')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit">Create</button>
            <a href="{{ route('admin.pages.index') }}">Cancel</a>
        </div>
    </form>
@endsection
