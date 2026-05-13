<x-app-layout>
    <h1>Административная панель</h1>
    <table>
    <thead>
            <tr>
                <th>ID</th>
                <th>ФИО создателя</th>
                <th>Номер авто</th>
                <th>Описание заявления</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->user->name}}</td>
                <td>{{ $report->number }}</td>
                <td>{{ $report->description }}</td>
                <td>
                @if($report->status->name === 'новое')
                <form class="status-form" action="{{ route('reports.updateStatus', $report->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <select name="status_id" onchange="this.form.submit()">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">
                            {{ $status->name }}
                        </option>
                @endforeach
            </select>
        </form>
    @else
        <span>
            {{ $report->status->name }}
        </span>
    @endif
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</x-app-layout>
