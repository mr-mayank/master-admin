@extends('layouts.master')

@section('title')
    User Profile
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Edit Your Profile</h4>
            </div>
            <div class="card-body col-md-6">
              <form action="/user-update/{{$users->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="username" class="form-control" value="{{ $users->name }}">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$users->email}}" >
                </div>

                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" class="form-control"  >
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" value="{{$users->password}}" >
                </div> --}}


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



