<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список заявок</title>
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
    <div class="container">
        <h1>Список заявок</h1>
        
        <a href="{{ route('reports.create') }}">Создать заявку</a>
        <div>
    <span>Сортировка по дате создания: </span>
    <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}" >сначала новые</a>
    <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}" >сначала старые</a>
</div>
<div>
<p>Фильтрация по статусу заявки</p>
<ul>
    @foreach($statuses as $status)
    <li>
        <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $status->id]) }}" >
            {{ $status->name }}
        </a>
    </li>
    @endforeach
</ul>
</div>
        
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        
        @foreach ($reports as $report)
            <div style="border:1px solid #ccc; margin:10px 0; padding:10px;">
                <h3>Автомобиль: {{ $report->number }}</h3>
                <p>Описание: {{ $report->description }}</p>
                <p>Дата создания: {{ $report->created_at }}</p>
                <p>{{$report->status->name}}</p>
                
                <a href="{{ route('reports.show', $report->id) }}">Редактировать</a>
                
                <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
                </form>
            </div>
        @endforeach
        {{$reports->appends(request()->query())->links()}}
    </div>
    </x-app-layout>
</body>
</html>