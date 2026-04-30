<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование заявления</title>
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Редактирование заявления</h1>
    
    <a href="{{ route('reports.index') }}">← Назад</a>
    
    <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label>Номер автомобиля:</label>
            <input type="text" name="number" value="{{ old('number', $report->number) }}" required>
            @error('number')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label>Описание:</label>
            <textarea name="description" rows="5" required>{{ old('description', $report->description) }}</textarea>
            @error('description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        
        <button type="submit">Обновить</button>
    </form>
    
    <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
    </form>
</body>
</html>