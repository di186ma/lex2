<?php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profile</h1>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
            </div>
            <!-- Add other fields similarly -->
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
