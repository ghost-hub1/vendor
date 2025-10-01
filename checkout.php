<?php require_once __DIR__ . '/includes/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Your Equipment Package</h4>
                </div>
                <div class="card-body">
                    <?php foreach ($_SESSION['cart'] as $key => $item): ?>
                    <div class="row align-items-center mb-4 pb-4 border-bottom">
                        <div class="col-md-2">
                            <img src="assets/images/products/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-1"><?php echo $item['name']; ?></h6>
                            <small class="text-muted">Professional equipment - Required for your position</small>
                        </div>
                        <div class="col-md-2 text-center">
                            <span class="fw-bold text-primary">$<?php echo number_format($item['price'], 2); ?></span>
                        </div>
                        <div class="col-md-2 text-center">
                            <span class="badge bg-success">Required</span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        This equipment package is required for your position and cannot be modified. All items are professionally configured for optimal performance.
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Order Summary</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal (<?php echo $cart_count; ?> items)</span>
                        <span>$<?php echo number_format($total_price, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>
                        <span class="text-success">FREE</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax</span>
                        <span>$<?php echo number_format($total_price * 0.08, 2); ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total</strong>
                        <strong class="text-primary">$<?php echo number_format($total_price * 1.08, 2); ?></strong>
                    </div>
                    
                    <a href="payment.php" class="btn btn-primary btn-lg w-100">
                        <i class="fas fa-lock me-2"></i>Proceed to Payment
                    </a>
                    
                    <div class="mt-3 text-center">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt me-1"></i>
                            Secure payment processing. Your information is protected.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>