@extends('layouts.admin')

@section('content')
    <h1>Editar Menu: {{ $menu->title }}</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Título:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title', $menu->title) }}" required>
            @error('title')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 15px;">
            <label for="page_id">Página associada:</label><br>
            <select id="page_id" name="page_id" required>
                <option value="">-- Selecione uma página --</option>
                @foreach($pages as $page)
                    <option value="{{ $page->id }}" 
                        {{ old('page_id', $menu->page_id) == $page->id ? 'selected' : '' }}>
                        {{ $page->title }}
                    </option>
                @endforeach
            </select>
            @error('page_id')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 15px;">
            <label for="position">Posição do menu:</label><br>
            <select id="position" name="position" required>
                <option value="">-- Selecione a posição --</option>
                <option value="principal" {{ old('position', $menu->position) == 'principal' ? 'selected' : '' }}>Principal</option>
                <option value="secundario" {{ old('position', $menu->position) == 'secundario' ? 'selected' : '' }}>Secundário</option>
                <option value="rodape" {{ old('position', $menu->position) == 'rodape' ? 'selected' : '' }}>Rodapé</option>
            </select>
            @error('position')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 15px;">
            <label for="sort_order">Ordem de exibição (opcional):</label><br>
            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $menu->sort_order) }}" min="0" step="1">
            @error('sort_order')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit">Salvar</button>
            <a href="{{ route('admin.menus.index') }}" style="margin-left: 10px;">Cancelar</a>
        </div>
    </form>
@endsection
