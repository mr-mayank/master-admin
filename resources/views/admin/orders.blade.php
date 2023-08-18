@extends('layouts.master')

@section('title')
    Orders
@endsection

@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New Order</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          
        </div>
        <div class="modal-body">
          <form action="/save-order" method="POST">
            {{ csrf_field() }}
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Title :</label>
              <input type="text" name="title" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Description:</label>
              <textarea class="form-control" name="description" id="message-text"></textarea>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Discount:</label>
              <input type="text" class="form-control" name="discount" id="message-text">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Tax:</label>
              <input class="form-control" name="tax" id="message-text">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Total:</label>
              <input class="form-control" name="total" id="message-text">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Orders
            @can('isMaster')
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
              Create Order
            </button>
            @endcan
          </h4>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                   Id
                </th>
                <th>
                  Title
                </th>
                <th>
                  Description
                </th>
                @can('isAdmin')
                <th>
                    Edit
                  </th>
                @endcan
                @can('isMaster')
                <th>
                    Edit
                  </th>
                  <th>
                    Delete
                  </th>
                @endcan
                @can('isUser')
                <th>
                    Discount
                  </th>
                  <th>
                    Tax
                  </th>
                @endcan
                <th class="text-right">
                  Price
                </th>
              </thead>
              <tbody>
                @foreach ($orders as $row)
                <tr>
                  <td>
                    {{ $row->id }}
                  </td>
                  <td>
                    {{ $row->name }}
                  </td>
                  <td>
                    {{ $row->discription }}
                  </td>

                  @can('isAdmin')
                  <td>
                    <a href="{{ url('order-edit/'.$row->id )}}" class="btn btn-success">Edit</a>
                  </td>
                  @endcan

                  @can('isMaster')
                  <td>
                    <a href="{{ url('order-edit/'.$row->id )}}" class="btn btn-success">Edit</a>
                  </td>
                  <td>
                    <a href="delete-order/{{$row->id}}" class="btn btn-danger">Delete</a>
                  </td>
                  @endcan

                  @can('isUser')
                  <td>
                    {{ $row->discount }}
                  </td>
                  <td>
                    {{ $row->tax }}
                  </td>
                  @endcan

                  <td class="text-right">
                    {{ $row->total}}
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    const exampleModal = document.getElementById('exampleModal')
if (exampleModal) {
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
  })
}
</script>
    
@endsection

@section('scripts')
@endsection
