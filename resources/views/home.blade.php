@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <h5>Subscribe:</h5>
                    {{-- @if (!Auth::user()->subscribedToPlan('monthly', 'primary')) --}}
                      <form action="your-server-side-code" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_KXojW6vzm2kfZytiD9guwFu5"
    data-amount="999"
    data-name="laravel-cashier"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
