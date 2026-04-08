<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница заявлений</title>
</head>
<body>
<div class="container">
        <h1>Список заявок</h1>

        @if($reports->isEmpty())
            <p>Нет ни одной заявки.</p>
        @else
            @foreach ($reports as $report)
                <div class="report-item">
                    <div class="car-number">
                        <strong>Номер автомобиля:</strong> {{ $report->car_number }}
                    </div>
                    <div class="description">
                        <strong>Описание:</strong> {{ $report->description }}
                    </div>
                    <div class="created-at">
                        <strong>Дата создания:</strong> {{ $report->created_at }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
    
</body>
</html>