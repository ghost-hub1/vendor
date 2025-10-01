// assets/js/main.js

document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Payment method selection
    const paymentOptions = document.querySelectorAll('.payment-option');
    const paymentDetails = document.getElementById('payment-details');
    
    const paymentTemplates = {
        bank: `
            <div class="alert alert-info">
                <h6><i class="fas fa-university me-2"></i>Bank Transfer Instructions</h6>
                <p class="mb-2">After submitting your order, you will receive detailed bank transfer information via email.</p>
                <div class="bg-light p-3 rounded">
                    <small>
                        <strong>Note:</strong> Please use your order ID as payment reference. Transfer processing takes 1-2 business hours.
                    </small>
                </div>
            </div>
        `,
        crypto: `
            <div class="alert alert-warning">
                <h6><i class="fas fa-coins me-2"></i>Cryptocurrency Payment</h6>
                <p class="mb-2">We accept Bitcoin (BTC), Ethereum (ETH), and Tether (USDT).</p>
                <div class="bg-light p-3 rounded">
                    <small>
                        <strong>Important:</strong> Wallet addresses will be provided after order submission. Crypto payments are verified within 30 minutes.
                    </small>
                </div>
            </div>
        `,
        wire: `
            <div class="alert alert-success">
                <h6><i class="fas fa-exchange-alt me-2"></i>Wire Transfer</h6>
                <p class="mb-2">Suitable for international payments and corporate accounts.</p>
                <div class="bg-light p-3 rounded">
                    <small>
                        <strong>Processing:</strong> Wire transfers typically clear within 2-4 business hours. All details provided via email.
                    </small>
                </div>
            </div>
        `
    };
    
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove active class from all options
            paymentOptions.forEach(opt => {
                opt.classList.remove('border-primary');
                opt.classList.add('border-light');
            });
            
            // Add active class to selected option
            this.classList.remove('border-light');
            this.classList.add('border-primary');
            
            // Show payment details
            const method = this.dataset.method;
            if (paymentDetails && paymentTemplates[method]) {
                paymentDetails.innerHTML = paymentTemplates[method];
                paymentDetails.style.display = 'block';
            }
        });
    });

    // Form validation enhancement
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let valid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    valid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    });

    // Add to cart animation
    window.addToCart = function(productId) {
        const cartBadge = document.querySelector('.cart-badge');
        if (cartBadge) {
            // Animation
            cartBadge.style.transform = 'scale(1.5)';
            setTimeout(() => {
                cartBadge.style.transform = 'scale(1)';
            }, 300);
        }
    };
});

// Countdown timer for redirects
function startCountdown(seconds, redirectUrl) {
    let countdown = seconds;
    const countdownElement = document.getElementById('countdown');
    
    const timer = setInterval(function() {
        countdown--;
        if (countdownElement) {
            countdownElement.textContent = countdown;
        }
        
        if (countdown <= 0) {
            clearInterval(timer);
            window.location.href = redirectUrl;
        }
    }, 1000);
}