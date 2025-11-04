<?php require_once __DIR__ . '/includes/header.php'; ?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xxl-10">
            <!-- Progress Indicator -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-center flex-fill">
                                    <div class="progress-step completed">
                                        <i class="fas fa-shopping-cart fa-lg"></i>
                                    </div>
                                    <small class="d-block mt-2 fw-semibold">Cart</small>
                                </div>
                                <div class="flex-fill">
                                    <div class="progress-bar bg-primary" style="height: 3px;"></div>
                                </div>
                                <div class="text-center flex-fill">
                                    <div class="progress-step active">
                                        <i class="fas fa-credit-card fa-lg"></i>
                                    </div>
                                    <small class="d-block mt-2 fw-semibold">Payment</small>
                                </div>
                                <div class="flex-fill">
                                    <div class="progress-bar" style="height: 3px; background: #e9ecef;"></div>
                                </div>
                                <div class="text-center flex-fill">
                                    <div class="progress-step">
                                        <i class="fas fa-check-circle fa-lg"></i>
                                    </div>
                                    <small class="d-block mt-2">Confirmation</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Main Payment Column -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-dark text-white py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"><i class="fas fa-lock me-2"></i>Secure Payment Gateway</h4>
                                <span class="badge bg-success"><i class="fas fa-shield-alt me-1"></i>SSL Secured</span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <!-- Order Summary -->
                            <div class="alert alert-dark border-0 mb-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-2 fw-bold">Professional Equipment Package</h6>
                                        <div class="row text-muted small">
                                            <div class="col-md-6">
                                                <i class="fas fa-box me-1"></i> <?php echo $cart_count; ?> Items
                                            </div>
                                            <div class="col-md-6">
                                                <i class="fas fa-weight me-1"></i> 2.5 kg Total Weight
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <div class="h5 mb-1 text-primary">$<?php echo number_format($total_price * 1.08, 2); ?></div>
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-clock me-1"></i>Pending Payment
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Methods -->
                            <h5 class="mb-3 border-bottom pb-2">
                                <i class="fas fa-wallet me-2"></i>Select Payment Method
                            </h5>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <div class="payment-option card border-3 h-100" data-method="Bank Transfer">
                                        <div class="card-body text-center p-4">
                                            <div class="payment-icon mb-3">
                                                <i class="fas fa-university fa-3x text-primary"></i>
                                            </div>
                                            <h6 class="fw-bold">Bank Transfer</h6>
                                            <small class="text-muted d-block mb-2">Direct bank transfer</small>
                                            <div class="security-badge">
                                                <small class="text-success">
                                                    <i class="fas fa-shield-check me-1"></i>Secure
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="payment-option card border-3 h-100" data-method="Cryptocurrency">
                                        <div class="card-body text-center p-4">
                                            <div class="payment-icon mb-3">
                                                <i class="fab fa-bitcoin fa-3x text-warning"></i>
                                            </div>
                                            <h6 class="fw-bold">Cryptocurrency</h6>
                                            <small class="text-muted d-block mb-2">BTC, ETH, USDT</small>
                                            <div class="security-badge">
                                                <small class="text-success">
                                                    <i class="fas fa-user-shield me-1"></i>Anonymous
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="payment-option card border-3 h-100" data-method="Wire Transfer">
                                        <div class="card-body text-center p-4">
                                            <div class="payment-icon mb-3">
                                                <i class="fas fa-exchange-alt fa-3x text-success"></i>
                                            </div>
                                            <h6 class="fw-bold">Wire Transfer</h6>
                                            <small class="text-muted d-block mb-2">International wire</small>
                                            <div class="security-badge">
                                                <small class="text-success">
                                                    <i class="fas fa-globe me-1"></i>Global
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dynamic Payment Details -->
                            <div id="payment-details" class="mb-4" style="display: none;"></div>

                            <!-- Shipping Information -->
                            <h5 class="mb-3 border-bottom pb-2">
                                <i class="fas fa-shipping-fast me-2"></i>Shipping Information
                            </h5>
                            
                            <form id="shipping-form" action="submit-payment.php" method="POST" class="needs-validation" novalidate>
                                <input type="hidden" name="payment_method" id="payment-method-input">
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Full Name *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control" name="full_name" required>
                                            <div class="invalid-feedback">Please provide a valid name.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email Address *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="email" required>
                                            <div class="invalid-feedback">Please provide a valid email.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Street Address *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                            <input type="text" class="form-control" name="address" required>
                                            <div class="invalid-feedback">Please provide a valid address.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">City *</label>
                                        <input type="text" class="form-control" name="city" required>
                                        <div class="invalid-feedback">Please provide a valid city.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">State *</label>
                                        <select class="form-select" name="state" required>
                                            <option value="">Select State</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a state.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">ZIP Code *</label>
                                        <input type="text" class="form-control" name="zip_code" required>
                                        <div class="invalid-feedback">Please provide a valid ZIP code.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Phone Number *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input type="tel" class="form-control" name="phone" required>
                                            <div class="invalid-feedback">Please provide a valid phone number.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Company (Optional)</label>
                                        <input type="text" class="form-control" name="company">
                                    </div>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label small" for="terms">
                                        I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> 
                                        and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                    </label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3" id="submit-btn">
                                        <i class="fas fa-lock me-2"></i>
                                        <span class="submit-text">Secure Order & Proceed to Payment</span>
                                        <div class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                                    </button>
                                    <div class="text-center mt-2">
                                        <small class="text-muted">
                                            <i class="fas fa-shield-alt me-1"></i>
                                            All data is encrypted and securely transmitted
                                        </small>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Order Summary Card -->
                    <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0"><i class="fas fa-receipt me-2"></i>Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span>$<?php echo number_format($total_price, 2); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tax (8%):</span>
                                <span>$<?php echo number_format($total_price * 0.08, 2); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping:</span>
                                <span class="text-success">FREE</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <strong>Total:</strong>
                                <strong class="h5 text-primary">$<?php echo number_format($total_price * 1.08, 2); ?></strong>
                            </div>
                            <div class="alert alert-success small mb-0">
                                <i class="fas fa-shipping-fast me-1"></i>
                                <strong>Express Shipping:</strong> 2-3 business days
                            </div>
                        </div>
                    </div>

                    <!-- Security Features -->
                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-header bg-light py-3">
                            <h6 class="mb-0"><i class="fas fa-shield-alt me-2"></i>Security Features</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-lock text-success me-3"></i>
                                <div>
                                    <small class="fw-bold d-block">256-bit SSL Encryption</small>
                                    <small class="text-muted">Bank-level security</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-user-shield text-primary me-3"></i>
                                <div>
                                    <small class="fw-bold d-block">Privacy Protected</small>
                                    <small class="text-muted">No data sharing</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock text-warning me-3"></i>
                                <div>
                                    <small class="fw-bold d-block">Auto Session Timeout</small>
                                    <small class="text-muted">15 minutes of inactivity</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonials -->
                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-header bg-light py-3">
                            <h6 class="mb-0"><i class="fas fa-comments me-2"></i>Client Testimonials</h6>
                        </div>
                        <div class="card-body">
                            <div class="testimonial-item mb-3">
                                <div class="text-warning mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="small mb-2">"Payment verification took only 15 minutes and equipment shipped same day. Exceptional discreet service!"</p>
                                <small class="text-muted">- Jessica L., Security Consultant</small>
                            </div>
                            <div class="testimonial-item mb-3">
                                <div class="text-warning mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="small mb-2">"The cryptocurrency option provided perfect anonymity. Received immediate payment confirmation."</p>
                                <small class="text-muted">- David M., IT Director</small>
                            </div>
                            <div class="testimonial-item">
                                <div class="text-warning mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="small mb-2">"Bank transfer was seamless and secure. Package arrived discreetly packaged as promised."</p>
                                <small class="text-muted">- Marcus T., Operations Lead</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.progress-step {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    background: #e9ecef;
    color: #6c757d;
}

.progress-step.completed {
    background: #198754;
    color: white;
}

.progress-step.active {
    background: #0d6efd;
    color: white;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
}

.payment-option {
    cursor: pointer;
    transition: all 0.3s ease;
    border-color: #e9ecef !important;
}

.payment-option:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    border-color: #0d6efd !important;
}

.payment-option.active {
    border-color: #0d6efd !important;
    background: rgba(13, 110, 253, 0.05);
}

.payment-icon {
    transition: transform 0.3s ease;
}

.payment-option:hover .payment-icon {
    transform: scale(1.1);
}

.security-badge {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.payment-option:hover .security-badge {
    opacity: 1;
}

.sticky-top {
    z-index: 1020;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.4);
}

.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-1px);
}

.border-3 {
    border-width: 3px !important;
}

/* Ensure proper spacing */
.g-4 > [class*="col-"] {
    padding: 1rem;
}

/* Testimonial styling */
.testimonial-item {
    padding: 1rem;
    border-radius: 0.5rem;
    background: #f8f9fa;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentOptions = document.querySelectorAll('.payment-option');
    const paymentDetails = document.getElementById('payment-details');
    const paymentMethodInput = document.getElementById('payment-method-input');
    const submitBtn = document.getElementById('submit-btn');
    const form = document.getElementById('shipping-form');
    
    // Enhanced payment method templates
    const paymentTemplates = {
        'Bank Transfer': `
            <div class="alert alert-primary border-0">
                <div class="d-flex align-items-start">
                    <i class="fas fa-university fa-2x me-3 mt-1"></i>
                    <div class="flex-grow-1">
                        <h6 class="alert-heading mb-2">Bank Transfer Instructions</h6>
                        <p class="mb-3">After order confirmation, you'll receive detailed banking information via encrypted email.</p>
                        <div class="bg-light p-3 rounded border">
                            <small class="d-block mb-1">
                                <i class="fas fa-info-circle me-1 text-primary"></i>
                                <strong>Processing Time:</strong> 1-2 business hours
                            </small>
                            <small class="d-block mb-1">
                                <i class="fas fa-key me-1 text-primary"></i>
                                <strong>Security:</strong> End-to-end encrypted communication
                            </small>
                            <small class="d-block">
                                <i class="fas fa-qrcode me-1 text-primary"></i>
                                <strong>Reference:</strong> Use Order ID as payment reference
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        `,
        'Cryptocurrency': `
            <div class="alert alert-warning border-0">
                <div class="d-flex align-items-start">
                    <i class="fab fa-bitcoin fa-2x me-3 mt-1"></i>
                    <div class="flex-grow-1">
                        <h6 class="alert-heading mb-2">Cryptocurrency Payment</h6>
                        <p class="mb-3">We accept Bitcoin (BTC), Ethereum (ETH), and Tether (USDT) for maximum privacy.</p>
                        <div class="bg-light p-3 rounded border">
                            <small class="d-block mb-1">
                                <i class="fas fa-bolt me-1 text-warning"></i>
                                <strong>Verification:</strong> Within 30 minutes (3 confirmations)
                            </small>
                            <small class="d-block mb-1">
                                <i class="fas fa-user-secret me-1 text-warning"></i>
                                <strong>Privacy:</strong> No personal information required
                            </small>
                            <small class="d-block">
                                <i class="fas fa-wallet me-1 text-warning"></i>
                                <strong>Wallet:</strong> Address provided after order submission
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        `,
        'Wire Transfer': `
            <div class="alert alert-success border-0">
                <div class="d-flex align-items-start">
                    <i class="fas fa-exchange-alt fa-2x me-3 mt-1"></i>
                    <div class="flex-grow-1">
                        <h6 class="alert-heading mb-2">International Wire Transfer</h6>
                        <p class="mb-3">Ideal for corporate accounts and international clients.</p>
                        <div class="bg-light p-3 rounded border">
                            <small class="d-block mb-1">
                                <i class="fas fa-globe me-1 text-success"></i>
                                <strong>Processing:</strong> 2-4 business hours
                            </small>
                            <small class="d-block mb-1">
                                <i class="fas fa-building me-1 text-success"></i>
                                <strong>Corporate:</strong> Perfect for business accounts
                            </small>
                            <small class="d-block">
                                <i class="fas fa-envelope me-1 text-success"></i>
                                <strong>Details:</strong> Full instructions via secure email
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        `
    };
    
    // Payment method selection
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove active class from all options
            paymentOptions.forEach(opt => {
                opt.classList.remove('active', 'border-primary');
                opt.classList.add('border-light');
            });
            
            // Add active class to selected option
            this.classList.remove('border-light');
            this.classList.add('active', 'border-primary');
            
            // Store selected payment method
            const method = this.dataset.method;
            paymentMethodInput.value = method;
            
            // Store in session via AJAX
            fetch('set-payment-method.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'payment_method=' + encodeURIComponent(method)
            });
            
            // Show payment details with animation
            paymentDetails.style.opacity = '0';
            paymentDetails.innerHTML = paymentTemplates[method];
            paymentDetails.style.display = 'block';
            setTimeout(() => {
                paymentDetails.style.opacity = '1';
                paymentDetails.style.transition = 'opacity 0.3s ease';
            }, 50);
        });
    });
    
    // Enhanced form validation
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!paymentMethodInput.value) {
            showAlert('Please select a payment method before submitting.', 'warning');
            return;
        }
        
        if (!form.checkValidity()) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return;
        }
        
        // Show loading state
        const spinner = submitBtn.querySelector('.spinner-border');
        const submitText = submitBtn.querySelector('.submit-text');
        spinner.classList.remove('d-none');
        submitText.textContent = 'Processing Secure Payment...';
        submitBtn.disabled = true;
        
        // Submit the form
        setTimeout(() => {
            form.submit();
        }, 2000);
    });
    
    function showAlert(message, type = 'info') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        form.prepend(alertDiv);
        
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>