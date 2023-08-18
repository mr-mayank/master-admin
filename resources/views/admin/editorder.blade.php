@extends('layouts.master')

@section('title')
    Edit an Order
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Order</h4>
            </div>
            @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
          @endif
            <div class="card-body">
                <form action="/order-update/{{$order->id}}" method="POST">
                   {{csrf_field()}}
                     {{method_field('PUT')}}
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Title :</label>
                      <input type="text" name="title" class="form-control" id="recipient-name" value="{{$order->name}}">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Description:</label>
                      <textarea class="form-control"  name="description" id="message-text">{{$order->discription}}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Discount:</label>
                      <input type="text" class="form-control" name="discount" value="{{$order->discount}}" id="message-text">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Tax:</label>
                      <input class="form-control" value="{{$order->tax}}" name="tax" id="message-text">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Total:</label>
                      <input class="form-control" value="{{$order->total}}" name="total" id="message-text">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="/orders" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection