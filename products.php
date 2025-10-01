<?php include 'includes/header.php'; ?>

<div class="container py-5 mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3">
            <!-- Categories Sidebar -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-filter me-2"></i>Categories</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active">All Products</a>
                        <a href="#" class="list-group-item list-group-item-action">Laptops & Computers</a>
                        <a href="#" class="list-group-item list-group-item-action">Monitors & Displays</a>
                        <a href="#" class="list-group-item list-group-item-action">Audio Equipment</a>
                        <a href="#" class="list-group-item list-group-item-action">Office Furniture</a>
                        <a href="#" class="list-group-item list-group-item-action">Networking</a>
                        <a href="#" class="list-group-item list-group-item-action">Accessories</a>
                    </div>
                </div>
            </div>
            
            <!-- Package Info -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0"><i class="fas fa-star me-2"></i>Your Professional Package</h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted">Your equipment package is pre-selected and cannot be modified. All items are required for optimal performance.</p>
                    <a href="checkout.php" class="btn btn-primary btn-sm w-100">
                        <i class="fas fa-shopping-cart me-1"></i>Proceed to Checkout
                    </a>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-primary mb-1">200+</h5>
                            <small class="text-muted">Products</small>
                        </div>
                        <div class="col-6">
                            <h5 class="text-success mb-1">24/7</h5>
                            <small class="text-muted">Support</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Products Area -->
        <div class="col-lg-9">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">Professional IT Equipment</h2>
                    <p class="text-muted mb-0">Premium devices for enterprise and remote workforces</p>
                </div>
                <div class="d-flex gap-2">
                    <span class="badge bg-primary fs-6">6 items in your package</span>
                </div>
            </div>

            <!-- Your Package Section -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-header bg-light">
                    <h5 class="mb-0 text-primary">
                        <i class="fas fa-box me-2"></i>Your Professional Equipment Package
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <?php foreach ($equipment_package as $key => $product): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card product-card border-0 shadow-sm h-100">
                                <div class="position-relative">
                                    <img src="assets/images/products/<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>" style="height: 180px; object-fit: cover;">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-success">In Package</span>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title"><?php echo $product['name']; ?></h6>
                                    <p class="card-text text-muted small flex-grow-1">Professional-grade equipment optimized for remote work.</p>
                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="h6 text-primary mb-0">$<?php echo number_format($product['price'], 2); ?></span>
                                            <span class="badge bg-primary">Required</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Additional Products Section -->
            <div class="mb-4">
                <h4 class="section-title-sm mb-4">Additional Professional Equipment</h4>
                <p class="text-muted mb-4">Explore our full range of enterprise-grade IT equipment and accessories</p>
            </div>

            <!-- Laptops & Computers -->
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-4">
                        <i class="fas fa-laptop me-2 text-primary"></i>Laptops & Computers
                    </h5>
                </div>
                
                <!-- Product 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/macbook-pro-16.jpg" class="card-img-top" alt="MacBook Pro 16" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-warning">Popular</span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Apple MacBook Pro 16"</h6>
                            <p class="card-text text-muted small flex-grow-1">M2 Pro chip, 32GB RAM, 1TB SSD. Perfect for creative professionals.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$2,499.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/dell-xps-15.jpg" class="card-img-top" alt="Dell XPS 15" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Dell XPS 15 9530</h6>
                            <p class="card-text text-muted small flex-grow-1">Intel i9, 32GB RAM, 1TB SSD, 4K OLED touchscreen.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$2,199.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/thinkpad-x1.jpg" class="card-img-top" alt="Lenovo ThinkPad X1" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-success">Business</span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Lenovo ThinkPad X1 Carbon</h6>
                            <p class="card-text text-muted small flex-grow-1">Ultra-light business laptop with military-grade durability.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$1,899.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monitors & Displays -->
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-4">
                        <i class="fas fa-desktop me-2 text-primary"></i>Monitors & Displays
                    </h5>
                </div>
                
                <!-- Monitor 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/dell-ultrasharp-32.jpg" class="card-img-top" alt="Dell UltraSharp 32" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Dell UltraSharp 32" 4K</h6>
                            <p class="card-text text-muted small flex-grow-1">32-inch 4K USB-C Hub Monitor with HDR and color calibration.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$749.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monitor 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/lg-ultrawide.jpg" class="card-img-top" alt="LG UltraWide" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-info">UltraWide</span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">LG 38WN95C UltraWide</h6>
                            <p class="card-text text-muted small flex-grow-1">38-inch curved UltraWide display with Thunderbolt 3.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$1,299.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monitor 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/samsung-odyssey.jpg" class="card-img-top" alt="Samsung Odyssey" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Samsung Odyssey G7</h6>
                            <p class="card-text text-muted small flex-grow-1">32-inch 240Hz gaming monitor with QLED technology.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$699.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Audio Equipment -->
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-4">
                        <i class="fas fa-headphones me-2 text-primary"></i>Audio Equipment
                    </h5>
                </div>
                
                <!-- Audio 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/sony-headphones.jpg" class="card-img-top" alt="Sony Headphones" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Sony WH-1000XM5</h6>
                            <p class="card-text text-muted small flex-grow-1">Industry-leading noise canceling wireless headphones.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$399.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Audio 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/blue-yeti.jpg" class="card-img-top" alt="Blue Yeti Mic" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Blue Yeti Professional</h6>
                            <p class="card-text text-muted small flex-grow-1">Tri-capsule USB microphone for streaming and recording.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$129.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Audio 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/jbl-speakers.jpg" class="card-img-top" alt="JBL Speakers" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">JBL Professional Speakers</h6>
                            <p class="card-text text-muted small flex-grow-1">Studio monitor speakers for professional audio production.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$299.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Office Furniture -->
            <div class="row g-4">
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-4">
                        <i class="fas fa-chair me-2 text-primary"></i>Office Furniture
                    </h5>
                </div>
                
                <!-- Furniture 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/standing-desk.jpg" class="card-img-top" alt="Standing Desk" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Electric Standing Desk</h6>
                            <p class="card-text text-muted small flex-grow-1">Height-adjustable standing desk with memory presets.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$599.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Furniture 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/office-cabinet.jpg" class="card-img-top" alt="Office Cabinet" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">File Storage Cabinet</h6>
                            <p class="card-text text-muted small flex-grow-1">Secure filing cabinet with lockable drawers.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$349.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Furniture 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="assets/images/products/bookshelf.jpg" class="card-img-top" alt="Bookshelf" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Modern Bookshelf</h6>
                            <p class="card-text text-muted small flex-grow-1">5-tier wooden bookshelf for office organization.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">$199.99</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="card border-0 bg-gradient-primary text-white mt-5">
                <div class="card-body text-center p-5">
                    <h3 class="mb-3">Need Custom Equipment Solutions?</h3>
                    <p class="mb-4 opacity-75">Contact our sales team for bulk pricing and custom configurations.</p>
                    <a href="contact.php" class="btn btn-light btn-lg">
                        <i class="fas fa-headset me-2"></i>Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
