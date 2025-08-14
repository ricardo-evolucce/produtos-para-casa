@extends('layouts.admin')

@section('content')
    <h1>Menus</h1>
    <a href="/admin/menus/create">Criar</a>

    @if(session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Página</th>
            <th>Posição</th>
            <th>Ordem</th>
              <th>Ações</th> <!-- Coluna para os botões -->
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->title }}</td>
                <td>{{ $menu->page->title ?? '-' }}</td>
                <td>{{ $menu->position }}</td>
                <td>{{ $menu->sort_order }}</td>
                  <td>
                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-sm btn-primary">Editar</a>

                
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
