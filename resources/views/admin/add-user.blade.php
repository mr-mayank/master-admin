@extends('layouts.master')

@section('title')
    Register User
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Register User</h4>
            </div>
            <div class="card-body col-md-6">
              <form action="/add-user" method="POST">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" >
                </div>

                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" >
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Enter Confirm Password" name="cpassword" >
                </div>
                <button type="submit" class="btn btn-success">ADD</button>
                <a href="/admin" class="btn btn-danger">Cancel</a>
              </form>
             
            </div>
          </div>
        </div>
    </div>
    </div>

@endsection

@section('scripts')

@endsection