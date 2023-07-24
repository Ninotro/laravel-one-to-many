<h1>Crea un nuovo Progetto</h1>
<form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <label for="title">Titolo:</label>
    <input type="text" name="title" id="title" required>

    <label for="description">Descrizione:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="type_id">Tipologia:</label>
    <select name="type_id" id="type_id">
        <option value="">Seleziona una tipologia</option>
        @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select>

    <button type="submit">Salva Progetto</button>
</form>