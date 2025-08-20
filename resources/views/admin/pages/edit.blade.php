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

<form method="POST" action="{{ route('admin.pages.update', $page->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

{{-- Título --}}
<div>
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" value="{{ old('title', $page->title) }}" required>
    @error('title')
        <div style="color:red;">{{ $message }}</div>
    @enderror
</div>

{{-- Descrição --}}
<div style="margin-top: 10px;">
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4">{{ old('description', $page->description) }}</textarea>
    @error('description')
        <div style="color:red;">{{ $message }}</div>
    @enderror
</div>

{{-- Seções FAQ --}}
<div style="margin-top: 20px;">
    <h3>Seções FAQ</h3>
    <div id="faq-sections">
        @foreach(old('sections', $sections ?? []) as $index => $section)
            <div class="faq-section" style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                <input type="hidden" name="sections[{{ $index }}][id]" value="{{ $section['id'] ?? $section->id }}">
                
                <label>Ordem:</label>
                <input type="number" name="sections[{{ $index }}][order]" value="{{ old("sections.$index.order", $section['order'] ?? $section->order) }}" style="width:60px; margin-bottom:5px;">
                
                <div class="faq-items">
                    @foreach($section['content']['items'] ?? $section->content['items'] ?? [['question'=>'','answer'=>'']] as $i => $item)
                        <div class="faq-item" style="margin-bottom:5px;">
                            <input type="text" name="sections[{{ $index }}][questions][{{ $i }}][question]" placeholder="Pergunta" value="{{ $item['question'] ?? '' }}" style="width:80%;">
                            <textarea name="sections[{{ $index }}][questions][{{ $i }}][answer]" placeholder="Resposta" style="width:80%; margin-top:2px;">{{ $item['answer'] ?? '' }}</textarea>
                            <button type="button" class="remove-faq">Remover</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="add-faq">Adicionar Pergunta</button>
            </div>
        @endforeach
    </div>
    <button type="button" id="add-section" style="margin-top:10px;">Adicionar Seção FAQ</button>
</div>

{{-- Produtos --}}
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

{{-- Hero Image --}}
@if($page->hero_image)
<div class="form-group" style="margin-top:20px;">
    <label>Imagem Hero Atual:</label><br>
    <img src="{{ asset('img/' . $page->hero_image) }}" alt="{{ $page->title }}" style="max-width: 400px; margin-top: 10px; border-radius: 6px;">
</div>
@endif

<div class="form-group">
    <label for="hero_image">Substituir Imagem Hero (JPG, PNG, WEBP)</label>
    <input type="file" name="hero_image" id="hero_image" class="form-control" accept="image/*">
    <small>Será convertida automaticamente para WebP e comprimida.</small>
</div>

{{-- Botões --}}
<div style="margin-top: 20px;">
    <button type="submit">Save</button>
    <a href="{{ route('admin.pages.index') }}">Cancel</a>
</div>
</form>

{{-- JS para adicionar/remover perguntas e seções --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    function addFaqItem(sectionDiv, index) {
        const faqItems = sectionDiv.querySelector('.faq-items');
        const i = faqItems.children.length;
        const div = document.createElement('div');
        div.classList.add('faq-item');
        div.style.marginBottom = '5px';
        div.innerHTML = `
            <input type="text" name="sections[${index}][questions][${i}][question]" placeholder="Pergunta" style="width:80%;">
            <textarea name="sections[${index}][questions][${i}][answer]" placeholder="Resposta" style="width:80%; margin-top:2px;"></textarea>
            <button type="button" class="remove-faq">Remover</button>
        `;
        faqItems.appendChild(div);
        div.querySelector('.remove-faq').addEventListener('click', () => div.remove());
    }

    document.querySelectorAll('.add-faq').forEach(button => {
        button.addEventListener('click', () => {
            const sectionDiv = button.closest('.faq-section');
            const index = Array.from(document.querySelectorAll('.faq-section')).indexOf(sectionDiv);
            addFaqItem(sectionDiv, index);
        });
    });

    document.querySelectorAll('.remove-faq').forEach(button => {
        button.addEventListener('click', () => button.closest('.faq-item').remove());
    });

    document.getElementById('add-section').addEventListener('click', () => {
        const sectionsDiv = document.getElementById('faq-sections');
        const index = sectionsDiv.children.length;
        const div = document.createElement('div');
        div.classList.add('faq-section');
        div.style.border = '1px solid #ccc';
        div.style.padding = '10px';
        div.style.marginBottom = '10px';
        div.innerHTML = `
            <input type="hidden" name="sections[${index}][id]" value="">
            <label>Ordem:</label>
            <input type="number" name="sections[${index}][order]" value="${index+1}" style="width:60px; margin-bottom:5px;">
            <div class="faq-items"></div>
            <button type="button" class="add-faq">Adicionar Pergunta</button>
        `;
        sectionsDiv.appendChild(div);

        // Adicionar funcionalidade ao botão de adicionar perguntas
        div.querySelector('.add-faq').addEventListener('click', () => {
            addFaqItem(div, index);
        });
    });
});
</script>
@endsection
