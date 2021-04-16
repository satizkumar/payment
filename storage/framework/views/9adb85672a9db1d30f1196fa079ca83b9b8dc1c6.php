<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(!@$response): ?>
    <div class="row justify-content-center">

        <div class="col-md-12">
            <br>
            <div class="card">

                <div class="card-header">
                    <h6>Products Details</h6>
                    <p><?php echo e($products['name']); ?></p>
                    <p><?php echo e($products['price']); ?></p>
                    <p><?php echo e($products['description']); ?></p>
                </div>
            </div>
            <br>
            <div class="card">
                <form action="<?php echo e(url('/charge')); ?>" method="post" id="payment-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="card-header">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                        </div>
                        <div class="card-body">
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            <input type="hidden" name="plan" value="<?php echo e($products['id']); ?>" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark" type="submit">Pay</button>
                    </div>
                    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                </form>
                <script src="https://js.stripe.com/v3/"></script>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<h3>Response</h3>
<div class='row'>
    <pre>
    <?php echo e(var_dump($response)); ?>

    </pre>

</div>
<a href="/payment" class="btn btn-primary btn-sm">
    <<< Back to Purchase</a>


        <?php endif; ?>

        <script>
            // Create a Stripe client.
            var stripe = Stripe('<?php echo e(env("STRIPE_KEY")); ?>');


            // Create an instance of Elements.
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });
            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });
            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
        </script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\payment\resources\views/detail.blade.php ENDPATH**/ ?>