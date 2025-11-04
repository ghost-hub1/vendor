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
    return isset($data[$key]) ? htmlspecialchars($data[$key]) : $default;
}

function formatCurrency($amount) {
    return number_format(floatval($amount ?? 0), 2);
}

// Calculate tax and subtotal for display
$subtotal = getOrderValue($order_data, 'order_total', 0) / 1.08;
$tax_amount = $subtotal * 0.08;
$final_total = getOrderValue($order_data, 'order_total', 0);

// Get payment method with proper formatting
$payment_method = getOrderValue($order_data, 'payment_method', 'Pending Selection');
$payment_icons = [
    'Bank Transfer' => 'fas fa-university',
    'Cryptocurrency' => 'fab fa-bitcoin', 
    'Wire Transfer' => 'fas fa-exchange-alt'
];
$payment_icon = $payment_icons[$payment_method] ?? 'fas fa-credit-card';
?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xxl-10">
            <!-- Success Header -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-success text-white py-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <div class="success-icon me-4">
                                    <i class="fas fa-check-circle fa-3x"></i>
                                </div>
                                <div>
                                    <h2 class="mb-2 fw-bold">Order Confirmed & Secure</h2>
                                    <p class="mb-0 fs-5">Your order <strong>#<?php echo $order_id; ?></strong> has been encrypted and queued for processing</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="security-badge">
                                <i class="fas fa-shield-alt fa-2x me-2"></i>
                                <span class="fs-6">End-to-End Encrypted</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Personal Confirmation Section -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="mb-0"><i class="fas fa-user-check me-2"></i>Order Confirmation</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center">
                                    <div class="avatar-circle bg-primary text-white">
                                        <i class="fas fa-user fa-2x"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h4 class="text-primary mb-2"><?php echo getOrderValue($order_data, 'full_name'); ?></h4>
                                    <p class="lead mb-3">
                                        You have successfully selected <strong class="text-success"><?php echo $payment_method; ?></strong> 
                                        as your payment method. Your delivery information has been securely recorded in our encrypted database.
                                    </p>
                                    
                                    <div class="alert alert-success border-0">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-envelope fa-2x me-3 text-success"></i>
                                            <div>
                                                <h6 class="mb-1">Payment Details Delivery</h6>
                                                <p class="mb-0">
                                                    Complete payment instructions will be sent to your secure email 
                                                    <strong><?php echo getOrderValue($order_data, 'email'); ?></strong> 
                                                    within the next <span class="text-danger fw-bold">30-60 minutes</span>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Explanation -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0"><i class="fas fa-shield-alt me-2"></i>Enhanced Security Protocol</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-2 text-center mb-3">
                                    <i class="fas fa-lock fa-3x text-primary"></i>
                                </div>
                                <div class="col-md-10">
                                    <h6 class="text-primary mb-3">Why Payment Details Are Sent via Secure Email</h6>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-start">
                                                <i class="fas fa-user-shield text-success me-3 mt-1"></i>
                                                <div>
                                                    <strong>Identity Verification</strong>
                                                    <p class="small text-muted mb-0">Ensures payment instructions reach only the verified account owner</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-start">
                                                <i class="fas fa-encryption text-warning me-3 mt-1"></i>
                                                <div>
                                                    <strong>Encrypted Communication</strong>
                                                    <p class="small text-muted mb-0">Bank-level encryption protects sensitive financial information</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-start">
                                                <i class="fas fa-history text-info me-3 mt-1"></i>
                                                <div>
                                                    <strong>Audit Trail</strong>
                                                    <p class="small text-muted mb-0">Creates secure timestamped record of all communications</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-start">
                                                <i class="fas fa-ban text-danger me-3 mt-1"></i>
                                                <div>
                                                    <strong>Fraud Prevention</strong>
                                                    <p class="small text-muted mb-0">Prevents unauthorized access to payment credentials</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 p-3 bg-light rounded border">
                                        <small class="text-muted">
                                            <i class="fas fa-info-circle me-1"></i>
                                            This security measure complies with international financial regulations and ensures your transaction remains completely confidential and protected against interception.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Timeline -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-light py-3">
                            <h6 class="mb-0"><i class="fas fa-road me-2"></i>Secure Processing Timeline</h6>
                        </div>
                        <div class="card-body">
                            <div class="stepper">
                                <div class="step completed">
                                    <div class="step-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6 class="step-title">Order Placed</h6>
                                        <small class="step-description">Encrypted order received</small>
                                    </div>
                                </div>
                                <div class="step active">
                                    <div class="step-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6 class="step-title">Payment Details Sent</h6>
                                        <small class="step-description">Secure email dispatched</small>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-icon">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6 class="step-title">Payment Verified</h6>
                                        <small class="step-description">Funds confirmation</small>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6 class="step-title">Equipment Shipped</h6>
                                        <small class="step-description">Discreet packaging</small>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-icon">
                                        <i class="fas fa-laptop-code"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6 class="step-title">Remote Setup</h6>
                                        <small class="step-description">Secure configuration</small>
                                    </div>
                                </div>
                                <div class="step">
                                    <div class="step-icon">
                                        <i class="fas fa-flag-checkered"></i>
                                    </div>
                                    <div class="step-content">
                                        <h6 class="step-title">Operational</h6>
                                        <small class="step-description">Ready for deployment</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Order Summary -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-dark text-white py-3">
                            <h6 class="mb-0"><i class="fas fa-receipt me-2"></i>Order Summary</h6>
                        </div>
                        <div class="card-body">
                            <div class="order-item mb-3">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <h6 class="mb-1">Professional Equipment Package</h6>
                                        <small class="text-muted">Advanced technical equipment suite</small>
                                    </div>
                                    <span class="badge bg-primary">Encrypted</span>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span>$<?php echo formatCurrency($subtotal); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tax (8%):</span>
                                <span>$<?php echo formatCurrency($tax_amount); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping:</span>
                                <span class="text-success">SECURE & FREE</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold fs-5">
                                <span>Total Amount:</span>
                                <span class="text-primary">$<?php echo formatCurrency($final_total); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-light py-3">
                            <h6 class="mb-0"><i class="<?php echo $payment_icon; ?> me-2"></i>Selected Payment Method</h6>
                        </div>
                        <div class="card-body text-center p-4">
                            <div class="payment-method-display">
                                <i class="<?php echo $payment_icon; ?> fa-3x text-primary mb-3"></i>
                                <h5 class="text-success"><?php echo $payment_method; ?></h5>
                                <small class="text-muted">Secure transaction protocol activated</small>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Information -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-light py-3">
                            <h6 class="mb-0"><i class="fas fa-shipping-fast me-2"></i>Secure Delivery</h6>
                        </div>
                        <div class="card-body">
                            <div class="shipping-info">
                                <strong class="d-block mb-2"><?php echo getOrderValue($order_data, 'full_name'); ?></strong>
                                <?php if (!empty(getOrderValue($order_data, 'company'))): ?>
                                    <span class="text-muted d-block mb-2"><?php echo getOrderValue($order_data, 'company'); ?></span>
                                <?php endif; ?>
                                
                                <div class="address-section mt-3">
                                    <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                    <span><?php echo getOrderValue($order_data, 'address'); ?></span>
                                </div>
                                <div class="address-section">
                                    <i class="fas fa-city text-muted me-2"></i>
                                    <span><?php echo getOrderValue($order_data, 'city'); ?>, <?php echo getOrderValue($order_data, 'state'); ?> <?php echo getOrderValue($order_data, 'zip_code'); ?></span>
                                </div>
                                <div class="address-section">
                                    <i class="fas fa-phone text-muted me-2"></i>
                                    <span><?php echo getOrderValue($order_data, 'phone'); ?></span>
                                </div>
                                <div class="address-section">
                                    <i class="fas fa-envelope text-muted me-2"></i>
                                    <span><?php echo getOrderValue($order_data, 'email'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary" onclick="window.print()">
                                    <i class="fas fa-print me-2"></i>Print Confirmation
                                </button>
                                <button class="btn btn-outline-success" id="emailReceiptBtn">
                                    <i class="fas fa-paper-plane me-2"></i>Resend Details
                                </button>
                                <a href="dashboard.php" class="btn btn-outline-dark">
                                    <i class="fas fa-tachometer-alt me-2"></i>Control Panel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Section -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body text-center py-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h5 class="mb-3"><i class="fas fa-headset me-2"></i>Elite Support Available</h5>
                            <p class="text-muted mb-3">
                                Our dedicated security team is available 24/7 to assist with your order and ensure complete operational readiness.
                            </p>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-envelope text-primary me-2"></i>
                                        <strong>support@tech-operations.com</strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-phone text-success me-2"></i>
                                        <strong>1-800-OP-SECURE</strong>
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

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-paper-plane me-2"></i>Details Resent</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                <h4>Secure Email Sent!</h4>
                <p class="text-muted">Payment instructions have been re-sent to your secure email address.</p>
            </div>
        </div>
    </div>
</div>

<style>
.success-icon {
    animation: bounceIn 1s ease-in-out;
}

.avatar-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.security-badge {
    background: rgba(255,255,255,0.2);
    padding: 10px 15px;
    border-radius: 25px;
    display: inline-flex;
    align-items: center;
}

.stepper {
    display: flex;
    justify-content: space-between;
    position: relative;
}

.stepper::before {
    content: '';
    position: absolute;
    top: 30px;
    left: 0;
    right: 0;
    height: 2px;
    background: #e9ecef;
    z-index: 1;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
    flex: 1;
}

.step-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    background: #e9ecef;
    color: #6c757d;
    transition: all 0.3s ease;
}

.step.completed .step-icon {
    background: #198754;
    color: white;
}

.step.active .step-icon {
    background: #0d6efd;
    color: white;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.3);
    animation: pulse 2s infinite;
}

.step-content {
    text-align: center;
}

.step-title {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 5px;
}

.step-description {
    font-size: 0.8rem;
    color: #6c757d;
}

.address-section {
    padding: 8px 0;
    border-bottom: 1px solid #f8f9fa;
}

.address-section:last-child {
    border-bottom: none;
}

.payment-method-display {
    padding: 20px;
    border: 2px dashed #0d6efd;
    border-radius: 10px;
    background: rgba(13, 110, 253, 0.05);
}

@keyframes bounceIn {
    0% { transform: scale(0.3); opacity: 0; }
    50% { transform: scale(1.05); opacity: 1; }
    100% { transform: scale(1); }
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(13, 110, 253, 0); }
    100% { box-shadow: 0 0 0 0 rgba(13, 110, 253, 0); }
}

.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.btn {
    transition: all 0.3s ease;
}

@media print {
    .btn, .modal, .stepper::before {
        display: none !important;
    }
    .card {
        border: 1px solid #000 !important;
        box-shadow: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const emailReceiptBtn = document.getElementById('emailReceiptBtn');
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    
    // Email receipt button
    if (emailReceiptBtn) {
        emailReceiptBtn.addEventListener('click', function() {
            // Show loading state
            const originalText = emailReceiptBtn.innerHTML;
            emailReceiptBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
            emailReceiptBtn.disabled = true;
            
            // Simulate sending email
            setTimeout(function() {
                emailReceiptBtn.innerHTML = originalText;
                emailReceiptBtn.disabled = false;
                successModal.show();
            }, 2000);
        });
    }
    
    // Add entrance animations
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 200);
    });
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