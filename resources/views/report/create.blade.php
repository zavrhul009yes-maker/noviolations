<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание заявления</title>
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Создание заявления</h1>
    
    <a href="{{ route('reports.index') }}">← Назад</a>
    
    <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Номер автомобиля:</label>
            <input type="text" name="number" value="{{ old('number') }}" required>
            @error('number')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label>Описание:</label>
            <textarea name="description" rows="5" required>{{ old('description') }}</textarea>
            @error('description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        
        <button type="submit">Создать</button>
    </form>
</body>
</html>