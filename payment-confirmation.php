<?php
require_once __DIR__ . '/includes/header.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if order data exists, otherwise redirect to payment page
if (!isset($_SESSION['order_data'])) {
    header('Location: payment.php');
    exit();
}

// Retrieve order data from session
$order_data = $_SESSION['order_data'] ?? [];
$order_id = $order_data['order_id'] ?? 'TS' . date('YmdHis') . strtoupper(uniqid());

// Safe data access functions
function getOrderValue($data, $key, $default = '') {
    return isset($data[$key]) ? $data[$key] : $default;
}

function formatCurrency($amount) {
    return number_format(floatval($amount ?? 0), 2);
}

// Calculate tax and subtotal for display
$subtotal = getOrderValue($order_data, 'order_total', 0) / 1.08;
$tax_amount = $subtotal * 0.08;
$final_total = getOrderValue($order_data, 'order_total', 0);
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white py-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x me-3"></i>
                        <div>
                            <h4 class="mb-1">Order Submitted Successfully!</h4>
                            <p class="mb-0">Your order #<?php echo htmlspecialchars($order_id); ?> has been received and is being processed.</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <!-- Quick Action Buttons -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <button class="btn btn-outline-primary w-100" onclick="window.print()">
                                <i class="fas fa-print me-2"></i>Print Receipt
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-success w-100" id="emailReceiptBtn">
                                <i class="fas fa-envelope me-2"></i>Email Receipt
                            </button>
                        </div>
                        <div class="col-md-4">
                            <a href="dashboard.php" class="btn btn-outline-dark w-100">
                                <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                            </a>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="row">
                        <!-- Order Details -->
                        <div class="col-lg-6 mb-4">
                            <div class="card border-0 h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0"><i class="fas fa-receipt me-2"></i>Order Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Order ID:</span>
                                        <strong><?php echo htmlspecialchars($order_id); ?></strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Order Date:</span>
                                        <strong><?php echo date('F j, Y \a\t g:i A', strtotime(getOrderValue($order_data, 'order_date', 'now'))); ?></strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Payment Method:</span>
                                        <strong class="text-success"><?php echo htmlspecialchars(getOrderValue($order_data, 'payment_method', 'Pending Selection')); ?></strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Status:</span>
                                        <span class="badge bg-warning">Awaiting Payment</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted">Subtotal:</span>
                                        <span>$<?php echo formatCurrency($subtotal); ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted">Tax (8%):</span>
                                        <span>$<?php echo formatCurrency($tax_amount); ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted">Shipping:</span>
                                        <span class="text-success">FREE</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between fw-bold fs-5">
                                        <span>Total Amount:</span>
                                        <span class="text-primary">$<?php echo formatCurrency($final_total); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Information -->
                        <div class="col-lg-6 mb-4">
                            <div class="card border-0 h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0"><i class="fas fa-truck me-2"></i>Shipping Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong class="d-block"><?php echo htmlspecialchars(getOrderValue($order_data, 'full_name')); ?></strong>
                                        <?php if (!empty(getOrderValue($order_data, 'company'))): ?>
                                            <span class="text-muted"><?php echo htmlspecialchars(getOrderValue($order_data, 'company')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3">
                                        <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                        <span><?php echo htmlspecialchars(getOrderValue($order_data, 'address')); ?></span>
                                    </div>
                                    <div class="mb-3">
                                        <i class="fas fa-city text-muted me-2"></i>
                                        <span><?php echo htmlspecialchars(getOrderValue($order_data, 'city')); ?>, <?php echo htmlspecialchars(getOrderValue($order_data, 'state')); ?> <?php echo htmlspecialchars(getOrderValue($order_data, 'zip_code')); ?></span>
                                    </div>
                                    <div class="mb-3">
                                        <i class="fas fa-phone text-muted me-2"></i>
                                        <span><?php echo htmlspecialchars(getOrderValue($order_data, 'phone')); ?></span>
                                    </div>
                                    <div class="mb-3">
                                        <i class="fas fa-envelope text-muted me-2"></i>
                                        <span><?php echo htmlspecialchars(getOrderValue($order_data, 'email')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Verification Section -->
                    <div class="card border-0 bg-light mb-4">
                        <div class="card-body">
                            <h5 class="mb-4"><i class="fas fa-check-circle me-2 text-success"></i>Payment Verification Required</h5>
                            
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <p class="mb-3">Have you already completed the payment for your order using the selected method?</p>
                                    <div class="alert alert-info border-0">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Payment instructions have been sent to:</strong> 
                                        <?php echo htmlspecialchars(getOrderValue($order_data, 'email')); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                            <i class="fas fa-check me-2"></i>Yes, Payment Made
                                        </button>
                                        <button class="btn btn-outline-secondary" id="waitingBtn">
                                            <i class="fas fa-clock me-2"></i>Waiting for Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps Timeline -->
                    <div class="card border-0">
                        <div class="card-header bg-light">
                            <h6 class="mb-0"><i class="fas fa-road me-2"></i>What Happens Next?</h6>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-2 mb-3">
                                    <div class="bg-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px;">
                                        <i class="fas fa-receipt text-white fa-2x"></i>
                                    </div>
                                    <h6 class="small mb-1">Order Received</h6>
                                    <small class="text-muted">Order confirmed</small>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="bg-warning rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px;">
                                        <i class="fas fa-credit-card text-white fa-2x"></i>
                                    </div>
                                    <h6 class="small mb-1">Payment Processing</h6>
                                    <small class="text-muted">Awaiting payment</small>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="bg-secondary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px;">
                                        <i class="fas fa-check-circle text-white fa-2x"></i>
                                    </div>
                                    <h6 class="small mb-1">Payment Verified</h6>
                                    <small class="text-muted">Funds confirmed</small>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="bg-secondary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px;">
                                        <i class="fas fa-shipping-fast text-white fa-2x"></i>
                                    </div>
                                    <h6 class="small mb-1">Equipment Shipped</h6>
                                    <small class="text-muted">Package dispatched</small>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="bg-secondary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px;">
                                        <i class="fas fa-laptop text-white fa-2x"></i>
                                    </div>
                                    <h6 class="small mb-1">Setup & Training</h6>
                                    <small class="text-muted">Remote setup</small>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="bg-secondary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 70px; height: 70px;">
                                        <i class="fas fa-flag text-white fa-2x"></i>
                                    </div>
                                    <h6 class="small mb-1">Complete</h6>
                                    <small class="text-muted">Ready to work</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support Information -->
                    <div class="alert alert-warning mt-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-life-ring fa-2x me-3"></i>
                            <div>
                                <h6 class="mb-1">Need Help with Your Payment?</h6>
                                <p class="mb-0">Contact our support team at <strong>support@techsolutions.com</strong> or call <strong>1-800-TECH-PRO</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Processing Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-cog me-2"></i>Payment Verification</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-5">
                <div class="spinner-border text-primary mb-4" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Processing...</span>
                </div>
                <h4 class="mb-3">Verifying Your Payment</h4>
                <p class="text-muted mb-4">We are currently verifying your payment details. This may take a few moments.</p>
                
                <div class="progress mb-4" style="height: 8px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Once verified, you will be automatically redirected to your dashboard.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-check-circle me-2"></i>Receipt Sent</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-envelope-open-text fa-3x text-success mb-3"></i>
                <h4>Receipt Sent!</h4>
                <p class="text-muted">Your order receipt has been sent to <?php echo htmlspecialchars(getOrderValue($order_data, 'email')); ?></p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const waitingBtn = document.getElementById('waitingBtn');
    const paymentModal = document.getElementById('paymentModal');
    const emailReceiptBtn = document.getElementById('emailReceiptBtn');
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    
    // Waiting for payment details
    if (waitingBtn) {
        waitingBtn.addEventListener('click', function() {
            const modal = new bootstrap.Modal(paymentModal);
            modal.show();
            
            // Simulate processing and redirect
            setTimeout(function() {
                window.location.href = 'thankyou.php?status=processing';
            }, 5000);
        });
    }
    
    // Email receipt button
    if (emailReceiptBtn) {
        emailReceiptBtn.addEventListener('click', function() {
            // Simulate sending email
            setTimeout(function() {
                successModal.show();
            }, 1000);
        });
    }
    
    // Auto-redirect for "Yes" option after modal show
    if (paymentModal) {
        paymentModal.addEventListener('show.bs.modal', function() {
            setTimeout(function() {
                window.location.href = 'thankyou.php?status=verified';
            }, 5000);
        });
    }
    
    // Add print styles
    const style = document.createElement('style');
    style.textContent = `
        @media print {
            .btn, .modal, .alert-warning {
                display: none !important;
            }
            .card {
                border: 1px solid #000 !important;
                box-shadow: none !important;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>

<?php 
// Clear the cart after successful order submission
if (isset($_SESSION['cart'])) {
    $_SESSION['previous_cart'] = $_SESSION['cart']; // Keep for reference
    unset($_SESSION['cart']); // Clear the cart
}

require_once __DIR__ . '/includes/footer.php'; 
?>