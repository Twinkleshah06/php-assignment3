<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
</head>
<body>
    <h1>Stripe Payment Integration</h1>
    <form id="payment-form">
        <div id="card-element"></div>
        <button type="submit">Pay</button>
        <div id="payment-result"></div>
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_PUBLISHABLE_KEY') }}");
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        document.getElementById('payment-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const response = await fetch('/api/create-payment-intent', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ amount: 50 }) // Amount in dollars
            });
            
            const { clientSecret } = await response.json();

            const { paymentIntent, error } = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: cardElement,
                }
            });

            if (error) {
                document.getElementById('payment-result').textContent = error.message;
            } else {
                document.getElementById('payment-result').textContent = 'Payment successful!';
            }
        });
    </script>
</body>
</html>
