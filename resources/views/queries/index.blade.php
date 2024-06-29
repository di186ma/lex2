@extends('layouts.app')

@section('content')
    <h1>Queries</h1>

    <a href="{{ route('queries.create') }}">Create New Query</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
@endsection
