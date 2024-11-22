<x-layout judul="Tasks by Category">
    <div class="container mt-4">
        <h1 class="text-center mb-4">Tasks Priority by Category</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-3">{{ $category->name }}</h2>
                <ul class="list-group mb-4" id="todo-list">
                    @forelse ($category->todosPry as $todo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <span class="task-text">
                                    {!! $todo->is_done == '1' ? '<del>' : '' !!}
                                    {{ $todo->task_pry }}
                                    {!! $todo->is_done == '1' ? '</del>' : '' !!}
                                </span>
                                @if ($todo->due_date)
                                    <span class="badge bg-primary">{{ \Carbon\Carbon::parse($todo->due_date)->format('d/m/Y') }}</span>
                                @endif
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">
                            Tidak ada task yang cocok dengan category ini
                        </li>
                    @endforelse
                </ul>
                <a href="{{ route('todopry') }}" class="btn btn-secondary">Kembali ke Daftar Task Priority</a>
            </div>
        </div>
    </div>
</x-layout>
