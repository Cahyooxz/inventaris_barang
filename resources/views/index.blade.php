@extends('layouts.app')
@section('content')
<form action="{{ route('login') }}">
  <!-- Email Address -->
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control">
  </div>
</form>
@endsection