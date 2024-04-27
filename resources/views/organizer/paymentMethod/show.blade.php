@extends('layouts.organizer')
@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }
</style>
@endsection


@section('content')
<div class="card">
  <div class="card-header">
      <div class="container">
          <div class="row">
              <div class="col">
                  <h6 class="h-block">
                      Pengaturan Metode Pembayaran
                  <h6>
              </div>
          </div>
      </div>
  </div>
  <div class="card-body">
    <div class="container">
      <form action="payment-methods/update" method="post">
        @csrf
        @foreach ($paymentMethods as $paymentMethod)
          <div>
            <p class="font-weight-bold">{{ $paymentMethod->code }}</p>
            <p>({{ $paymentMethod->type }})</p>
            <input type="hidden" name="payment_methods[{{ $loop->index }}][code]" value="{{ $paymentMethod['code'] }}">
            <input  name="payment_methods[{{ $loop->index }}][status]" type="checkbox" {{ $paymentMethod['status'] === true ? 'checked' : 'unchecked' }} data-toggle="toggle" data-size="xs">
            <hr>
          </div>
        @endforeach
        <button class="btn" type="reset" onclick='window.location.reload(true);'>Cancel</button>
        <button class="btn btn-primary" type="submit">Update Status</button>

      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

@endsection