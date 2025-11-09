<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fitness Journal')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Fitness Journal</h1>
            <nav>
                <a href="{{ route('activities.index') }}">All Activities</a>
                <a href="{{ route('activities.create') }}">Add Activity</a>
                <a href="{{ route('activities.search') }}">Search</a>
            </nav>
        </header>

        <main>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Fitness Journal. Track your workouts and stay fit!</p>
        </footer>
    </div>
</body>
</html>

