<?php require_once __DIR__ . '/includes/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-laptop-code me-2 text-primary"></i>Pre-Configured Onboarding Package</h4>
                        <span class="badge bg-primary">Paysphere Inc. Approved</span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Hardware Bundle Section -->
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted mb-3">Hardware Bundle - Standard Home Office Setup</h6>
                        <?php foreach ($_SESSION['cart']['hardware'] as $key => $item): ?>
                        <div class="row align-items-center mb-3 pb-3 border-bottom product-item" data-aos="fade-up" data-aos-delay="<?php echo $key * 100; ?>">
                            <div class="col-md-2">
                                <div class="product-image-container">
                                    <img src="assets/images/products/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="img-fluid rounded shadow-sm product-image">
                                    <div class="product-overlay">
                                        <i class="fas fa-search-plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-1 fw-bold product-title"><?php echo $item['name']; ?></h6>
                                <small class="text-muted">Enterprise-grade equipment • Company configured</small>
                            </div>
                            <div class="col-md-2 text-end">
                                <span class="fw-bold text-dark price-display">$<?php echo number_format($item['price'], 2); ?></span>
                            </div>
                            <div class="col-md-2 text-center">
                                <span class="badge bg-success requirement-badge">Required</span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <!-- Hardware Subsidy Breakdown -->
                        <div class="bg-light rounded p-3 mt-3" data-aos="fade-up" data-aos-delay="400">
                            <div class="row text-sm">
                                <div class="col-8">Hardware Subtotal</div>
                                <div class="col-4 text-end">$1,929.98</div>
                                
                                <div class="col-8 text-success">Paysphere Inc. Subsidy</div>
                                <div class="col-4 text-end text-success">-$1,429.98</div>
                                
                                <div class="col-8 fw-bold">Your Hardware Co-Pay</div>
                                <div class="col-4 text-end fw-bold text-primary">$500.00</div>
                            </div>
                        </div>
                    </div>

                    <!-- Software & Licenses Section -->
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted mb-3">Software & Licenses (Mandatory - 12 Month Subscription)</h6>
                        <?php foreach ($_SESSION['cart']['software'] as $key => $item): ?>
                        <div class="row align-items-center mb-3 software-item" data-aos="fade-up" data-aos-delay="<?php echo $key * 100 + 200; ?>">
                            <div class="col-md-2">
                                <div class="bg-primary text-white rounded p-3 text-center software-icon">
                                    <i class="fas fa-shield-alt fa-2x"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="mb-1 fw-bold"><?php echo $item['name']; ?></h6>
                                <small class="text-muted">Corporate license • Security compliance required</small>
                            </div>
                            <div class="col-md-2 text-end">
                                <span class="fw-bold text-dark">$<?php echo number_format($item['price'], 2); ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Setup Fee Section -->
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted mb-3">One-Time Setup & Configuration</h6>
                        <div class="row align-items-center setup-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="col-md-2">
                                <div class="bg-info text-white rounded p-3 text-center setup-icon">
                                    <i class="fas fa-cogs fa-2x"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="mb-1 fw-bold">Remote IT Setup & Asset Registration</h6>
                                <small class="text-muted">Secure configuration and corporate system integration</small>
                            </div>
                            <div class="col-md-2 text-end">
                                <span class="fw-bold text-dark">$400.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-primary border-0" data-aos="fade-up" data-aos-delay="700">
                        <div class="d-flex">
                            <i class="fas fa-building me-3 mt-1"></i>
                            <div>
                                <strong>Enterprise Procurement Portal</strong><br>
                                <small class="mb-0">This package is pre-configured for Paysphere Inc. compliance. All items are required for system access and security protocols.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Order Summary Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 100px;" data-aos="fade-left" data-aos-delay="300">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-file-invoice me-2"></i>Order Summary</h5>
                </div>
                <div class="card-body">
                    <!-- Order Breakdown -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Hardware Co-Pay</span>
                            <span class="fw-medium">$500.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Software & Licenses</span>
                            <span class="fw-medium">$1,100.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Setup & Registration</span>
                            <span class="fw-medium">$400.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Shipping & Handling</span>
                            <span class="text-success fw-medium">FREE</span>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <!-- Total -->
                    <div class="d-flex justify-content-between mb-4">
                        <strong class="fs-5">Total Amount Due</strong>
                        <strong class="fs-5 text-primary total-amount">$2,000.00</strong>
                    </div>
                    
                    <!-- Payment Button -->
                    <a href="payment.php" class="btn btn-primary btn-lg w-100 py-3 payment-btn" data-aos="zoom-in" data-aos-delay="800">
                        <i class="fas fa-lock me-2"></i>Proceed to Secure Payment
                    </a>
                    
                    <!-- Security & Trust Badges -->
                    <div class="mt-4 text-center" data-aos="fade-up" data-aos-delay="900">
                        <div class="row g-2">
                            <div class="col-4">
                                <div class="border rounded p-2 trust-badge">
                                    <i class="fas fa-shield-alt text-success"></i>
                                    <small class="d-block">SSL Secure</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-2 trust-badge">
                                    <i class="fas fa-user-lock text-primary"></i>
                                    <small class="d-block">PCI Compliant</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-2 trust-badge">
                                    <i class="fas fa-briefcase text-info"></i>
                                    <small class="d-block">B2B Certified</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Compliance Notice -->
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Payment required to activate corporate assets and schedule equipment shipment.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Product Image Container with Professional Hover Effects */
.product-image-container {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.product-image {
    transition: all 0.4s ease;
    transform: scale(1);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 123, 255, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
    border-radius: 8px;
}

.product-overlay i {
    color: white;
    font-size: 1.5rem;
    transform: scale(0.8);
    transition: all 0.3s ease;
}

/* Professional Hover States */
.product-item:hover .product-image {
    transform: scale(1.05);
}

.product-item:hover .product-overlay {
    opacity: 1;
}

.product-item:hover .product-overlay i {
    transform: scale(1);
}

/* Software Icon Animations */
.software-icon {
    transition: all 0.3s ease;
    transform: scale(1);
}

.software-item:hover .software-icon {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
}

/* Setup Icon Animations */
.setup-icon {
    transition: all 0.3s ease;
    transform: scale(1);
}

.setup-item:hover .setup-icon {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(23, 162, 184, 0.3);
}

/* Payment Button Animation */
.payment-btn {
    transition: all 0.3s ease;
    transform: translateY(0);
}

.payment-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.4);
}

/* Trust Badge Animations */
.trust-badge {
    transition: all 0.3s ease;
    transform: scale(1);
}

.trust-badge:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Staggered Animation Delays */
.product-item:nth-child(odd) {
    animation-delay: 0.1s;
}

.product-item:nth-child(even) {
    animation-delay: 0.2s;
}

/* Mobile Optimizations */
@media (max-width: 768px) {
    .product-image-container {
        margin-bottom: 1rem;
    }
    
    .product-overlay {
        opacity: 0.9;
    }
    
    .product-overlay i {
        transform: scale(1);
    }
    
    /* Reduce animation intensity on mobile */
    .product-item:hover .product-image {
        transform: scale(1.02);
    }
}

/* AOS Animation Customizations */
[data-aos] {
    pointer-events: none;
}

[data-aos].aos-animate {
    pointer-events: auto;
}

/* Loading State for Images */
.product-image {
    opacity: 0;
    animation: imageFadeIn 0.6s ease forwards;
}

@keyframes imageFadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
</style>

<!-- AOS Library for Scroll Animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
// Initialize AOS (Animate On Scroll)
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 600,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100,
        disable: function() {
            return window.innerWidth < 768;
        }
    });
    
    // Prevent image clicking
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('click', function(e) {
            e.preventDefault();
        });
        
        // Add loading error handling
        img.addEventListener('error', function() {
            this.style.display = 'none';
        });
    });
    
    // Enhanced hover effects for touch devices
    if ('ontouchstart' in window) {
        const productItems = document.querySelectorAll('.product-item, .software-item, .setup-item');
        productItems.forEach(item => {
            item.addEventListener('touchstart', function() {
                this.classList.add('touch-active');
            });
            
            item.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.classList.remove('touch-active');
                }, 300);
            });
        });
    }
    
    // Smooth scroll to top on page load
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
