@extends('layouts.app')

@section('content')
    <div class="container">

        <div id="payment-request-button">
            <button onclick="strppy()"> Pay with stripe</button>
        </div>


    </div>
    <div id="error-message"></div>
@endsection

@section('script')

    <script>


        function strppy() {
            var stripe = Stripe('{{ env("Stripe_Key") }}');
            var paymentRequest = stripe.paymentRequest({
                country: 'US',
                currency: 'usd',
                total: {
                    label: 'Demo total',
                    amount: 1000,
                },
                requestPayerName: true,
                requestPayerEmail: true,
            });
            stripe.redirectToCheckout({
                items: [
                    // Replace with the ID of your SKU
                    {sku: 'sku_Fbq0nb5skkuFHV', quantity: 1}
                ],
                successUrl: '{{ env("APP_URL") }}/payment',
                cancelUrl: '{{ env("APP_URL") }}/subscribe',
            }).then(function (result) {
                console.log(result.data);
                // If `redirectToCheckout` fails due to a browser or network
                // error, display the localized error message to your customer
                // using `result.error.message`.
            });
        }

    </script>



{{-- <script>
  var stripe = Stripe('pk_test_RWffIhERxQz2IKoLqmaffkNZ00FN7KGp6c');

  var checkoutButton = document.getElementById('checkout-button-sku_Fbq0nb5skkuFHV');
  checkoutButton.addEventListener('click', function () {
    // When the customer clicks on the button, redirect
    // them to Checkout.
    stripe.redirectToCheckout({
      items: [{sku: 'sku_Fbq0nb5skkuFHV', quantity: 1}],

      successUrl: 'https://your-website.com/success',
      cancelUrl: 'https://your-website.com/canceled',
    })
    .then(function (result) {
      if (result.error) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, display the localized error message to your customer.
        var displayError = document.getElementById('error-message');
        displayError.textContent = result.error.message;
      }
    });
  });
</script> --}}
@endsection
