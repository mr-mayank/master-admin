@extends('layouts.master')

@section('title')
    Edit - Registered
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Edit Registered Roles</h4>
            </div>
            <div class="card-body col-md-6">
              <form action="/role-reg-update/{{$users->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="username" class="form-control" value="{{ $users->name }}">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" value="{{$users->email}}" >
                </div>

                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="/role-reg" class="btn btn-danger">Cancel</a>
              </form>
             
            </div>
          </div>
        </div>
    </div>
    </div>

@endsection

@section('scripts')

@endsection