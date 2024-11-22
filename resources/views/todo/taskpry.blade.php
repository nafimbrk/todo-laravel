<x-layout judul="task priority">
    <div class="container mt-4">
        <!-- 01. Content -->
        <h1 class="text-center mb-4">Task Priority</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- 02. Form input data -->
                        <form id="todo-form" action="{{ route('todopry.post') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="task_pry" id="todo-input" placeholder="Tambah task baru" required value="{{ old('task_pry') }}">
                                <input type="text" class="form-control flatpickr" name="due_date" id="due-date-input" placeholder="Tanggal jatuh tempo" value="{{ old('due_date') }}">
                                <select class="form-select" name="category_id">
                                    <option value="" selected>Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        <form id="todo-form" action="{{ route('todopry') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </div>
                        </form>

                        <!-- 04. Display Data -->
                        <ul class="list-group mb-4" id="todo-list">
                            @foreach ($data as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center {{ $item->due_date && $item->due_date < now() ? 'bg-danger text-white' : '' }}">
                                <div>
                                    <span class="task-text">
                                        @if ($item->is_done == '1')
                                            <del>{{ $item->task_pry }}</del>
                                        @else
                                            {{ $item->task_pry }}
                                        @endif
                                    </span>
                                    @if ($item->due_date)
                                        <span class="badge bg-primary">{{ \Carbon\Carbon::parse($item->due_date)->format('d/m/Y') }}</span>
                                    @endif
                                    @if ($item->category)
                                        <span class="badge bg-secondary">
                                            <a href="{{ route('taskspry.by.category', ['id' => $item->category->id]) }}" class="text-white text-decoration-none">
                                                {{ $item->category->name }}
                                            </a>
                                        </span>
                                    @endif
                                </div>
                                <div class="btn-group">
                                    <form action="{{ route('todopry.delete', ['id' => $item->id]) }}" method="POST" onsubmit="return confirm('yakin akan menghapus data ini?')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete-btn">✕</button>
                                    </form>
                                    <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">✎</button>
                                </div>
                            </li>
                            <li class="list-group-item collapse" id="collapse-{{ $loop->index }}">
                                <form action="{{ route('todopry.update', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="task_pry" value="{{ $item->task_pry }}">
                                            <input type="text" class="form-control flatpickr" name="due_date" value="{{ $item->due_date ? $item->due_date->format('Y-m-d') : '' }}">
                                            <select class="form-select" name="category_id">
                                                <option value="" selected>Pilih Kategori</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="radio px-2">
                                            <label>
                                                <input type="radio" value="0" name="is_done" {{ $item->is_done == '0' ? 'checked' : '' }}> Belum
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="1" name="is_done" {{ $item->is_done == '1' ? 'checked' : '' }}> Selesai
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        @endforeach
                        </ul>
                        {{ $data->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>






