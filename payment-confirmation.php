<?php
require_once __DIR__ . '/includes/header.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shipping_data = [
        'full_name' => htmlspecialchars($_POST['full_name']),
        'email' => htmlspecialchars($_POST['email']),
        'address' => htmlspecialchars($_POST['address']),
        'city' => htmlspecialchars($_POST['city']),
        'state' => htmlspecialchars($_POST['state']),
        'zip_code' => htmlspecialchars($_POST['zip_code']),
        'phone' => htmlspecialchars($_POST['phone']),
        'company' => htmlspecialchars($_POST['company'] ?? ''),
        'order_total' => $total_price * 1.08,
        'order_date' => date('Y-m-d H:i:s')
    ];
    
    // Store in session for confirmation
    $_SESSION['shipping_data'] = $shipping_data;
    $_SESSION['order_id'] = 'TS' . date('Ymd') . strtoupper(uniqid());
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i>Order Submitted Successfully!</h4>
                </div>
                <div class="card-body">
                    <!-- Order Confirmation -->
                    <div class="alert alert-success">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle fa-2x me-3"></i>
                            <div>
                                <h5 class="mb-1">Thank You for Your Order!</h5>
                                <p class="mb-0">Your order has been received and is being processed.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h6>Order Information</h6>
                                    <p class="mb-1"><strong>Order ID:</strong> <?php echo $_SESSION['order_id']; ?></p>
                                    <p class="mb-1"><strong>Order Date:</strong> <?php echo date('F j, Y'); ?></p>
                                    <p class="mb-0"><strong>Total Amount:</strong> $<?php echo number_format($shipping_data['order_total'], 2); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h6>Shipping Information</h6>
                                    <p class="mb-1"><?php echo $shipping_data['full_name']; ?></p>
                                    <p class="mb-1"><?php echo $shipping_data['address']; ?></p>
                                    <p class="mb-1"><?php echo $shipping_data['city']; ?>, <?php echo $shipping_data['state']; ?> <?php echo $shipping_data['zip_code']; ?></p>
                                    <p class="mb-0"><?php echo $shipping_data['phone']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Confirmation -->
                    <div class="mb-4">
                        <h5 class="mb-3">Payment Verification</h5>
                        <div class="card border-0">
                            <div class="card-body">
                                <p class="mb-3">Have you already completed the payment for your order?</p>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                            <i class="fas fa-check me-2"></i>Yes, I've Made Payment
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-outline-secondary w-100" id="waitingBtn">
                                            <i class="fas fa-clock me-2"></i>No, Waiting for Details
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Payment details have been sent to:</strong> <?php echo $shipping_data['email']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps -->
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <h6><i class="fas fa-shipping-fast me-2"></i>What Happens Next?</h6>
                            <div class="row text-center mt-3">
                                <div class="col-md-3">
                                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                                        <i class="fas fa-envelope text-white"></i>
                                    </div>
                                    <p class="small mb-0">Payment Details Emailed</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </div>
                                    <p class="small mb-0">Payment Verification</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                                        <i class="fas fa-shipping-fast text-white"></i>
                                    </div>
                                    <p class="small mb-0">Equipment Shipped</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                                        <i class="fas fa-laptop text-white"></i>
                                    </div>
                                    <p class="small mb-0">Setup & Training</p>
                                </div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const waitingBtn = document.getElementById('waitingBtn');
    const paymentModal = document.getElementById('paymentModal');
    
    waitingBtn.addEventListener('click', function() {
        const modal = new bootstrap.Modal(paymentModal);
        modal.show();
        
        // Simulate processing and redirect
        setTimeout(function() {
            window.location.href = 'thankyou.php?status=processing';
        }, 5000);
    });
    
    // Auto-redirect for "Yes" option after modal show
    paymentModal.addEventListener('show.bs.modal', function() {
        setTimeout(function() {
            window.location.href = 'thankyou.php?status=verified';
        }, 5000);
    });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>