@extends('layouts.app')

@section('content')
    <h1>Create Query</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('queries.store') }}" method="POST">
        @csrf
        <div>
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="admin_id">Admin:</label>
            <select name="admin_id" id="admin_id">
                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}" {{ old('admin_id') == $admin->id ? 'selected' : '' }}>
                        {{ $admin->first_name }} {{ $admin->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="lawyer_id">Lawyer:</label>
            <select name="lawyer_id" id="lawyer_id">
                <option value="" {{ old('lawyer_id') == null ? 'selected' : '' }}>None</option>
                @foreach ($lawyers as $lawyer)
                    <option value="{{ $lawyer->id }}" {{ old('lawyer_id') == $lawyer->id ? 'selected' : '' }}>
                        {{ $lawyer->first_name }} {{ $lawyer->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="query_text">Query Text:</label><br>
            <textarea name="query_text" id="query_text" rows="4">{{ old('query_text') }}</textarea>
        </div>
        <button type="submit">Create Query</button>
    </form>
@endsection
