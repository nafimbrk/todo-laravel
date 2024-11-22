<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
       
        <a class="navbar-brand" href="#">Todo List</a>
        
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            {{-- <ul class="navbar-nav">
                <li class="nav-item {{ request()->routeIs('todo') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('todo') }}">List</a>
                </li>
                <li class="nav-item {{ request()->routeIs('todopry') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('todopry') }}">List Priority</a>
                </li>
            </ul> --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('todo') }}">Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('todopry') }}">Task Priority</a>
                </li>
            </ul>
        </div>
    </div>
</nav>