<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Filmera Key</title>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"/>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('assets/picture/logo_filmera.png') }}" alt="Logo">
            FILMERAKEY
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
          @csrf
          <button type="submit" class="btn-logout">Logout</button>
        </form>
    </nav>

    <!-- Main Dashboard -->
    <main class="dashboard">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        <p>Manage your API keys below:</p>

        @if(session('message'))
            <div class="message success">{{ session('message') }}</div>
        @endif

        @if(Auth::user()->api_key)
            <div class="key-item">
              <div class="key-box">{{ Auth::user()->api_key }}</div>
              <div>Main Key</div>
              <div>Active</div>
              <div>
                <form action="{{ route('revoke.api.key') }}" method="POST" style="display: inline;">
                  @csrf
                  <button type="submit">❌</button>
                </form>
              </div>
            </div>
        @else
            <form action="{{ route('generate.api.key') }}" method="POST">
              @csrf
              <input type="text" name="name" placeholder="API Key Name" required />
              <button type="submit">Generate</button>
            </form>
        @endif

        <!-- Key List -->
        <table class="key-list">
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apiKeys as $key)
                <tr>
                    <td>
                      <div class="key-box">
                        {{ $key->key }}
                      </div>
                    </td>
                    <td>{{ $key->name ?? '-' }}</td>
                    <td>{{ $key->status ?? '-'}}</td>
                    <td>
                        <form method="POST" action="{{ route('revoke.api.key', $key->id) }}">
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </main>

</body>
</html>
