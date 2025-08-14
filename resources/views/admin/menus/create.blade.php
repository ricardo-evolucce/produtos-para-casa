<h1>Criar Menu</h1>

<form action="{{ route('admin.menus.store') }}" method="POST">
    @csrf
    <label>Título</label>
    <input type="text" name="title" required>

    <label>Página</label>
    <select name="page_id" required>
        @foreach($pages as $page)
            <option value="{{ $page->id }}">{{ $page->title }}</option>
        @endforeach
    </select>

    <label>Posição</label>
    <select name="position" required>
        <option value="principal">Principal</option>
        <option value="secundario">Secundário</option>
        <option value="rodape">Rodapé</option>
    </select>

    <label>Ordem</label>
    <input type="number" name="sort_order" value="0">

    <button type="submit">Salvar</button>
</form>
