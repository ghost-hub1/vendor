<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0"><i class="fas fa-credit-card me-2"></i>Payment Information</h4>
                </div>
                <div class="card-body">
                    <!-- Order Summary -->
                    <div class="alert alert-light border">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Professional Equipment Package</h6>
                                <small class="text-muted"><?php echo $cart_count; ?> items • Total: $<?php echo number_format($total_price * 1.08, 2); ?></small>
                            </div>
                            <span class="badge bg-primary">Pending Payment</span>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <h5 class="mb-3">Select Payment Method</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="payment-option card border-2" data-method="bank">
                                <div class="card-body text-center">
                                    <i class="fas fa-university fa-2x text-primary mb-3"></i>
                                    <h6>Bank Transfer</h6>
                                    <small class="text-muted">Direct bank transfer</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-option card border-2" data-method="crypto">
                                <div class="card-body text-center">
                                    <i class="fas fa-coins fa-2x text-warning mb-3"></i>
                                    <h6>Cryptocurrency</h6>
                                    <small class="text-muted">BTC, ETH, USDT</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment-option card border-2" data-method="wire">
                                <div class="card-body text-center">
                                    <i class="fas fa-exchange-alt fa-2x text-success mb-3"></i>
                                    <h6>Wire Transfer</h6>
                                    <small class="text-muted">International wire</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details (Dynamic) -->
                    <div id="payment-details" class="mb-4" style="display: none;">
                        <!-- Dynamic content will be loaded here -->
                    </div>

                    <!-- Shipping Information -->
                    <h5 class="mb-3">Shipping Information</h5>
                    <form id="shipping-form" action="payment-confirmation.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" name="full_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Street Address *</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">City *</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">State *</label>
                                <select class="form-select" name="state" required>
                                    <option value="">Select State</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <!-- Add all US states -->
                                    <option value="CA">California</option>
                                    <option value="TX">Texas</option>
                                    <option value="NY">New York</option>
                                    <option value="FL">Florida</option>
                                    <!-- ... more states ... -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">ZIP Code *</label>
                                <input type="text" class="form-control" name="zip_code" required pattern="[0-9]{5}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Company (Optional)</label>
                                <input type="text" class="form-control" name="company">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100" id="submit-btn">
                                <i class="fas fa-paper-plane me-2"></i>Submit Order & Proceed to Payment
                            </button>
                        </div>
                    </form>

                    <!-- Testimonials -->
                    <div class="mt-5">
                        <h5 class="mb-3">What Our Clients Say</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card border-0 bg-light">
                                    <div class="card-body">
                                        <div class="text-warning mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="small mb-2">"Payment was verified within 15 minutes and equipment shipped same day. Incredible service!"</p>
                                        <small class="text-muted">- Jessica L., Remote Team Lead</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 bg-light">
                                    <div class="card-body">
                                        <div class="text-warning mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="small mb-2">"The bank transfer option made everything easy. Received payment confirmation email immediately."</p>
                                        <small class="text-muted">- David M., IT Manager</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentOptions = document.querySelectorAll('.payment-option');
    const paymentDetails = document.getElementById('payment-details');
    
    // Payment method templates
    const paymentTemplates = {
        bank: `
            <div class="alert alert-info">
                <h6><i class="fas fa-university me-2"></i>Bank Transfer Instructions</h6>
                <p class="mb-2">After submitting your order, you will receive detailed bank transfer information via email.</p>
                <div class="bg-light p-3 rounded">
                    <small>
                        <strong>Note:</strong> Please use your order ID as payment reference. Transfer processing takes 1-2 business hours.
                    </small>
                </div>
            </div>
        `,
        crypto: `
            <div class="alert alert-warning">
                <h6><i class="fas fa-coins me-2"></i>Cryptocurrency Payment</h6>
                <p class="mb-2">We accept Bitcoin (BTC), Ethereum (ETH), and Tether (USDT).</p>
                <div class="bg-light p-3 rounded">
                    <small>
                        <strong>Important:</strong> Wallet addresses will be provided after order submission. Crypto payments are verified within 30 minutes.
                    </small>
                </div>
            </div>
        `,
        wire: `
            <div class="alert alert-success">
                <h6><i class="fas fa-exchange-alt me-2"></i>Wire Transfer</h6>
                <p class="mb-2">Suitable for international payments and corporate accounts.</p>
                <div class="bg-light p-3 rounded">
                    <small>
                        <strong>Processing:</strong> Wire transfers typically clear within 2-4 business hours. All details provided via email.
                    </small>
                </div>
            </div>
        `
    };
    
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove active class from all options
            paymentOptions.forEach(opt => {
                opt.classList.remove('border-primary');
                opt.classList.add('border-light');
            });
            
            // Add active class to selected option
            this.classList.remove('border-light');
            this.classList.add('border-primary');
            
            // Show payment details
            const method = this.dataset.method;
            paymentDetails.innerHTML = paymentTemplates[method];
            paymentDetails.style.display = 'block';
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>