<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- Enhanced Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Enterprise IT Solutions for Modern Workforces</h1>
                <p class="lead mb-4">Trusted by Fortune 500 companies to equip remote teams with cutting-edge technology. Licensed partner of Dell, Microsoft, and Apple with 24/7 professional support.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="products.php" class="btn btn-light btn-lg">
                        <i class="fas fa-search me-2"></i>Explore Products
                    </a>
                    <a href="checkout.php" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-bolt me-2"></i>Quick Checkout
                    </a>
                    <a href="#services" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-play-circle me-2"></i>Watch Demo
                    </a>
                </div>
                
                <!-- Trust Metrics -->
                <div class="row mt-5 pt-4 border-top border-light border-opacity-25">
                    <div class="col-4 text-center">
                        <h3 class="text-white mb-1">500+</h3>
                        <small class="text-light opacity-75">Enterprise Clients</small>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="text-white mb-1">50K+</h3>
                        <small class="text-light opacity-75">Devices Deployed</small>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="text-white mb-1">24/7</h3>
                        <small class="text-light opacity-75">Support</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="assets/images/hero-equipment.png" alt="Professional IT Equipment" class="img-fluid rounded-3 shadow-lg">
                    <div class="position-absolute top-0 start-0 m-3">
                        <span class="badge bg-success bg-opacity-90 px-3 py-2">
                            <i class="fas fa-shipping-fast me-1"></i>1-3 Day Delivery
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Badges Section -->
<section class="py-5 trust-badges">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="section-title-sm">Trusted by Industry Leaders</h3>
        </div>
        <div class="row justify-content-center align-items-center g-4">
            <div class="col-6 col-md-3 col-lg-2 text-center">
                <img src="assets/images/dell-logo.png" alt="Dell Technologies" class="img-fluid" style="height: 35px;">
            </div>
            <div class="col-6 col-md-3 col-lg-2 text-center">
                <img src="assets/images/microsoft-logo.png" alt="Microsoft" class="img-fluid" style="height: 30px;">
            </div>
            <div class="col-6 col-md-3 col-lg-2 text-center">
                <img src="assets/images/apple-logo.png" alt="Apple" class="img-fluid" style="height: 35px;">
            </div>
            <div class="col-6 col-md-3 col-lg-2 text-center">
                <img src="assets/images/jabra-logo.png" alt="Jabra" class="img-fluid" style="height: 25px;">
            </div>
            <div class="col-6 col-md-3 col-lg-2 text-center">
                <img src="assets/images/logitech-logo.png" alt="Logitech" class="img-fluid" style="height: 30px;">
            </div>
            <div class="col-6 col-md-3 col-lg-2 text-center">
                <img src="assets/images/hp-logo.png" alt="HP" class="img-fluid" style="height: 35px;">
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title">Featured Professional Equipment</h2>
        <p class="text-center text-muted lead mb-5">Premium devices trusted by remote teams worldwide</p>
        
        <div class="row g-4">
            <!-- Product 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="assets/images/products/dell-xps.jpg" class="card-img-top" alt="Dell XPS Laptop" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-primary">Bestseller</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Dell XPS 15</h5>
                        <p class="card-text text-muted small flex-grow-1">Professional workstation laptop with 4K display and 32GB RAM.</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="h5 text-primary mb-0">$2,299.99</span>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="assets/images/products/apple-macbook.jpg" class="card-img-top" alt="Apple MacBook Pro" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">MacBook Pro 16"</h5>
                        <p class="card-text text-muted small flex-grow-1">M2 Pro chip, 32GB unified memory, 1TB SSD storage.</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="h5 text-primary mb-0">$2,499.99</span>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="assets/images/products/dual-monitors.jpg" class="card-img-top" alt="Dual Monitor Setup" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Dual 4K Monitor Setup</h5>
                        <p class="card-text text-muted small flex-grow-1">Two 27" 4K IPS monitors with ergonomic stands.</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="h5 text-primary mb-0">$899.99</span>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="assets/images/products/office-chair.jpg" class="card-img-top" alt="Ergonomic Chair" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-success">New</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Ergonomic Office Chair</h5>
                        <p class="card-text text-muted small flex-grow-1">Executive chair with lumbar support and adjustable arms.</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="h5 text-primary mb-0">$499.99</span>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="products.php" class="btn btn-primary btn-lg">
                <i class="fas fa-grid me-2"></i>View All Products
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="section-padding">
    <div class="container">
        <h2 class="section-title">Our Comprehensive Services</h2>
        <p class="text-center text-muted lead mb-5">End-to-end IT solutions for modern enterprises</p>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card service-card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="service-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h5>Equipment Procurement</h5>
                        <p class="text-muted">Complete professional equipment packages delivered within 1-3 business days across the US with white-glove service.</p>
                        <ul class="list-unstyled text-start text-muted small mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Bulk pricing for enterprises</li>
                            <li><i class="fas fa-check text-success me-2"></i>Custom configuration</li>
                            <li><i class="fas fa-check text-success me-2"></i>Quality assurance testing</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card service-card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="service-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h5>IT Setup & Support</h5>
                        <p class="text-muted">Professional installation, configuration, and ongoing technical support for all equipment with 24/7 monitoring.</p>
                        <ul class="list-unstyled text-start text-muted small mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Remote configuration</li>
                            <li><i class="fas fa-check text-success me-2"></i>On-site installation</li>
                            <li><i class="fas fa-check text-success me-2"></i>24/7 technical support</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card service-card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="service-icon">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <h5>Repair & Maintenance</h5>
                        <p class="text-muted">Comprehensive repair services and maintenance plans to keep your equipment running smoothly with rapid response times.</p>
                        <ul class="list-unstyled text-start text-muted small mt-3">
                            <li><i class="fas fa-check text-success me-2"></i>Same-day repair service</li>
                            <li><i class="fas fa-check text-success me-2"></i>Preventive maintenance</li>
                            <li><i class="fas fa-check text-success me-2"></i>Hardware replacement</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Installation Team Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title text-start">Professional Installation Teams</h2>
                <p class="lead mb-4">Our certified technicians ensure seamless setup and configuration of all your equipment.</p>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                                <i class="fas fa-user-check text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Certified Technicians</h6>
                                <small class="text-muted">Manufacturer-certified experts</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Rapid Deployment</h6>
                                <small class="text-muted">Same-day installation available</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                                <i class="fas fa-shield-alt text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Security Focused</h6>
                                <small class="text-muted">Enterprise security configuration</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                                <i class="fas fa-headset text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Training Included</h6>
                                <small class="text-muted">User training and documentation</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="contact.php" class="btn btn-primary btn-lg mt-3">
                    <i class="fas fa-calendar me-2"></i>Schedule Installation
                </a>
            </div>
            <div class="col-lg-6">
                <img src="assets/images/installation-team.jpg" alt="Professional Installation Team" class="img-fluid rounded-3 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section-padding">
    <div class="container">
        <h2 class="section-title">What Our Enterprise Clients Say</h2>
        <p class="text-center text-muted lead mb-5">Trusted by companies worldwide for reliable IT solutions</p>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card testimonial-card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-warning mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-3">"The equipment arrived within 48 hours and was perfectly configured for our security requirements. The installation team was incredibly professional."</p>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/avatars/avatar1.jpg" alt="Sarah Johnson" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Sarah Johnson</h6>
                                <small class="text-muted">Remote Team Manager, TechCorp</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card testimonial-card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-warning mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-3">"Payment verification was incredibly fast. We had confirmation within minutes and the equipment was shipped immediately. Their support team is exceptional."</p>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/avatars/avatar2.jpg" alt="Michael Chen" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Michael Chen</h6>
                                <small class="text-muted">IT Director, Global Solutions</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card testimonial-card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-warning mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-3">"The repair service saved us during a critical project. Technician arrived same day and resolved the issue professionally. Their response time is unmatched."</p>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/avatars/avatar3.jpg" alt="Emily Rodriguez" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Emily Rodriguez</h6>
                                <small class="text-muted">Operations Lead, Innovate Inc</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-8">
                <h3 class="mb-2">Ready to Equip Your Team?</h3>
                <p class="mb-0 opacity-75">Get professional IT equipment with enterprise-grade support and rapid deployment.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="checkout.php" class="btn btn-light btn-lg">
                    <i class="fas fa-rocket me-2"></i>Get Started Now
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
