@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Registered Roles</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Email
                </th>
                <th>
                  Type
                </th>
                <th>
                  Edit
                </th>
                {{-- <th>
                  Delete
                </th> --}}
                
              </thead>
              <tbody>
                @foreach ($users as $row)
                <tr>
                    <td>
                        {{$row->name}}
                    </td>
                    <td>
                        {{$row->email}}
                    </td>
                    <td>
                        {{$row->type}}
                    </td>
                    <td>
                        <a href="/role-edit/{{$row->id}}" class="btn btn-success">Edit</a>
                    </td>
                    {{-- <td>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td> --}}
                </tr>

                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
    
@endsection

@section('scripts')
@endsection
