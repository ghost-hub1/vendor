    <!-- Enhanced Footer -->
    <footer class="footer-enhanced pt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="mb-3 text-white">
                        <i class="fas fa-laptop-code me-2 text-primary"></i>TechSolutions Pro
                    </h5>
                    <p class="footer-text mb-4">
                        Professional IT equipment and solutions for modern workforces. 
                        Trusted by companies worldwide for reliable technology deployments.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="footer-social">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                        <a href="#" class="footer-social">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="footer-social">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h6 class="mb-3 text-white">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="index.php" class="footer-link">Home</a>
                        </li>
                        <li class="mb-2">
                            <a href="about.php" class="footer-link">About</a>
                        </li>
                        <li class="mb-2">
                            <a href="products.php" class="footer-link">Products</a>
                        </li>
                        <li class="mb-2">
                            <a href="contact.php" class="footer-link">Contact</a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4">
                    <h6 class="mb-3 text-white">Services</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="footer-link">Equipment Procurement</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="footer-link">IT Setup & Configuration</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="footer-link">Technical Support</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="footer-link">Equipment Repair</a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4">
                    <h6 class="mb-3 text-white">Contact Info</h6>
                    <ul class="list-unstyled footer-text">
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>San Francisco, CA
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2 text-primary"></i>+1 (276) 356-4133
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2 text-primary"></i>techsolutionspro@proton.me
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-clock me-2 text-primary"></i>Mon-Fri: 9AM-6PM PST
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr class="footer-divider my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="footer-text mb-0">&copy; 2025 TechSolutions Pro. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex gap-4 justify-content-md-end">
                        <a href="#" class="footer-link small">Privacy Policy</a>
                        <a href="#" class="footer-link small">Terms of Service</a>
                        <a href="#" class="footer-link small">Security</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <style>
        .footer-enhanced {
            background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .footer-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(37, 99, 235, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(6, 182, 212, 0.1) 0%, transparent 50%);
        }

        .footer-enhanced .container {
            position: relative;
            z-index: 2;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.8) !important;
            line-height: 1.6;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.7) !important;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: white !important;
            transform: translateX(5px);
        }

        .footer-social {
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-social:hover {
            color: white;
            transform: translateY(-3px);
        }

        .footer-divider {
            border-color: rgba(255, 255, 255, 0.1) !important;
            margin: 2rem 0;
        }
    </style>
</body>
</html>