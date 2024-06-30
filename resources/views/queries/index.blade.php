@extends('layouts.app')

@section('content')
    <h1>Queries</h1>

    <a href="{{ route('queries.create') }}">Create New Query</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('queries.updatePerPage') }}" method="POST">
        @csrf
        <label for="per_page">Items per page:</label>
        <select name="per_page" id="per_page">
            <option value="2" {{ session('per_page', 10) == 2 ? 'selected' : '' }}>2</option>
            <option value="5" {{ session('per_page', 10) == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ session('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ session('per_page', 10) == 20 ? 'selected' : '' }}>20</option>
        </select>
        <button type="submit">Apply</button>
    </form>

    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Admin</th>
            <th>Lawyer</th>
            <th>Query Text</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($queries as $query)
            <tr>
                <td>{{ $query->id }}</td>
                <td>{{ optional($query->user)->first_name ?? 'N/A' }}</td>
                <td>{{ optional($query->admin)->first_name ?? 'N/A' }}</td>
                <td>{{ $query->lawyer ? $query->lawyer->first_name . ' ' . $query->lawyer->last_name : 'N/A' }}</td>
                <td>{{ $query->query_text }}</td>
                <td>
                    <a href="{{ route('queries.edit', $query->id) }}">Edit</a>
                    <form action="{{ route('queries.destroy', $query->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <style>
        /* Встроенные стили для изменения размера стрелок */
        .pagination .page-link {
            font-size: 20px; /* Размер текста стрелок */
            padding: 10px 15px; /* Размер стрелок */
        }
    </style>
    {{ $queries->appends(['per_page' => $queries->perPage()])->links('vendor.pagination.bootstrap-5') }}
@endsection
