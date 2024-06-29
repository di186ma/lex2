@extends('layouts.app')

@section('content')
    <h1>Edit Query</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('queries.update', $query->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $query->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="admin_id">Admin:</label>
            <select name="admin_id" id="admin_id">
                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}" {{ $query->admin_id == $admin->id ? 'selected' : '' }}>
                        {{ $admin->first_name }} {{ $admin->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="lawyer_id">Lawyer:</label>
            <select name="lawyer_id" id="lawyer_id">
                <option value="" {{ $query->lawyer_id == null ? 'selected' : '' }}>None</option>
                @foreach ($lawyers as $lawyer)
                    <option value="{{ $lawyer->id }}" {{ $query->lawyer_id == $lawyer->id ? 'selected' : '' }}>
                        {{ $lawyer->first_name }} {{ $lawyer->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="query_text">Query Text:</label><br>
            <textarea name="query_text" id="query_text" rows="4">{{ $query->query_text }}</textarea>
        </div>
        <button type="submit">Update Query</button>
    </form>
@endsection
