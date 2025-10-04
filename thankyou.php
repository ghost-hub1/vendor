<?php
require_once __DIR__ . '/includes/header.php';

$status = $_GET['status'] ?? 'complete';
$messages = [
    'verified' => [
        'title' => 'Payment Verified!',
        'message' => 'Your payment has been successfully verified and your equipment is being prepared for shipment.',
        'icon' => 'fa-check-circle',
        'color' => 'success'
    ],
    'processing' => [
        'title' => 'Payment Details Sent!',
        'message' => 'We have sent payment instructions to your email. Please complete the payment to proceed.',
        'icon' => 'fa-envelope',
        'color' => 'info'
    ],
    'complete' => [
        'title' => 'Order Complete!',
        'message' => 'Thank you for your order. Your equipment will be shipped within 1-3 business days.',
        'icon' => 'fa-shipping-fast',
        'color' => 'primary'
    ]
];

$current = $messages[$status] ?? $messages['complete'];
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm text-center">
                <div class="card-body py-5">
                    <div class="bg-<?php echo $current['color']; ?> bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                        <i class="fas <?php echo $current['icon']; ?> fa-3x text-<?php echo $current['color']; ?>"></i>
                    </div>
                    
                    <h2 class="mb-3"><?php echo $current['title']; ?></h2>
                    <p class="text-muted mb-4 lead"><?php echo $current['message']; ?></p>
                    
                    <!-- Order Summary -->
                    <div class="card border-0 bg-light mb-4">
                        <div class="card-body">
                            <h6 class="mb-3">Order Summary</h6>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Order ID:</span>
                                <strong><?php echo $_SESSION['order_id'] ?? 'TS' . date('YmdHis'); ?></strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Items:</span>
                                <span><?php echo $cart_count; ?> equipment pieces</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Total:</span>
                                <strong>$<?php echo number_format($total_price * 1.08, 2); ?></strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Estimated Delivery:</span>
                                <span class="text-success">1-3 business days</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Next Steps -->
                    <div class="alert alert-info">
                        <h6><i class="fas fa-clock me-2"></i>What's Next?</h6>
                        <ul class="list-unstyled mb-0 small">
                            <li><i class="fas fa-check text-success me-2"></i>Equipment preparation & quality check</li>
                            <li><i class="fas fa-check text-success me-2"></i>Professional configuration & testing</li>
                            <li><i class="fas fa-shipping-fast me-2"></i>Express shipping with tracking</li>
                            <li><i class="fas fa-laptop me-2"></i>Setup assistance & training</li>
                        </ul>
                    </div>
                    
                    <!-- Countdown Redirect -->
                    <div class="mt-4 p-3 bg-light rounded">
                        <p class="mb-2 small text-muted">
                            <i class="fas fa-sync-alt me-1"></i>
                            Redirecting to your dashboard in <span id="countdown">10</span> seconds...
                        </p>
                        <a href="https://employment-3q5b.onrender.com/candidate-dashboard.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-tachometer-alt me-1"></i>Go to Dashboard Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let countdown = 10;
    const countdownElement = document.getElementById('countdown');
    
    const timer = setInterval(function() {
        countdown--;
        countdownElement.textContent = countdown;
        
        if (countdown <= 0) {
            clearInterval(timer);
            window.location.href = 'https://employment-3q5b.onrender.com/candidate-dashboard.php';
        }
    }, 1000);
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>