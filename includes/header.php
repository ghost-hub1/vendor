<?php
// includes/header.php
session_start();

// Default equipment package (will populate session cart if empty)
$equipment_package = [
    'professional_laptop' => [
        'name' => 'Dell Latitude 7440 Laptop',
        'price' => 1299.99,
        'image' => 'laptop.jpg',
        'category' => 'computing'
    ],
    'dual_monitors' => [
        'name' => 'Dell UltraSharp 24" Dual Monitors',
        'price' => 599.99,
        'image' => 'monitors.jpg',
        'category' => 'displays'
    ],
    'professional_headset' => [
        'name' => 'Jabra Evolve2 65 Headset',
        'price' => 279.99,
        'image' => 'headset.jpg',
        'category' => 'audio'
    ],
    'ergonomic_chair' => [
        'name' => 'Herman Miller Aeron Chair',
        'price' => 1499.99,
        'image' => 'chair.jpg',
        'category' => 'furniture'
    ],
    'docking_station' => [
        'name' => 'Dell Thunderbolt Dock WD22TB4',
        'price' => 349.99,
        'image' => 'dock.jpg',
        'category' => 'accessories'
    ],
    'webcam' => [
        'name' => 'Logitech Brio 4K Webcam',
        'price' => 199.99,
        'image' => 'webcam.jpg',
        'category' => 'video'
    ]
];

// Populate session cart with defaults (6 items) if not set
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $_SESSION['cart'] = $equipment_package;
}

// Dynamic cart count based on session cart (defaults to 6 because we prepopulated)
$cart_count = count($_SESSION['cart']);

// Total price calculation (kept for compatibility)
$total_price = array_sum(array_column($_SESSION['cart'], 'price'));

// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TechSolutions Pro - Professional IT Equipment</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Optional external CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        :root {
            --primary: #0ea5a4;
            --accent: #7c3aed;
            --dark: #0f172a;
            --muted: #6b7280;
            --card-bg: rgba(255,255,255,0.9);
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }

        .navbar-modern {
            background: linear-gradient(90deg, rgba(14,165,164,0.06), rgba(124,58,237,0.03));
            backdrop-filter: blur(6px);
            border-bottom: 1px solid rgba(15,23,42,0.04);
            padding: .6rem 0;
        }

        .navbar-brand {
            display:flex;
            align-items:center;
            gap:.6rem;
            font-weight:700;
            color:var(--dark);
            text-decoration: none;
        }

        .navbar-brand i { font-size:1.35rem; color:var(--accent); }

        .nav-link { color:var(--dark); font-weight:500; }
        .nav-link.active { color:var(--accent); }

        /* Search box */
        .nav-search {
            min-width: 220px;
            max-width: 420px;
        }
        .nav-search .form-control {
            border-radius: 999px;
            padding-left: 1rem;
            padding-right: 2.5rem;
            border: 1px solid rgba(15,23,42,0.08);
            box-shadow: none;
        }

        /* Cart icon */
        .cart-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: var(--card-bg);
            border: 1px solid rgba(15,23,42,0.04);
            color: var(--dark);
            text-decoration: none;
        }
        .cart-btn i { font-size: 1.25rem; }

        .cart-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            min-width: 22px;
            height: 22px;
            padding: 0 6px;
            background: #ef4444; /* red */
            color: #fff;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight:700;
            display:flex;
            align-items:center;
            justify-content:center;
            box-shadow: 0 3px 8px rgba(239,68,68,0.18);
            border: 2px solid white;
            transform-origin: center;
        }

        /* Pulse animation for badge */
        @keyframes badgePulse {
            0% { transform: scale(1); box-shadow: 0 3px 8px rgba(239,68,68,0.12); }
            50% { transform: scale(1.12); box-shadow: 0 6px 18px rgba(239,68,68,0.22); }
            100% { transform: scale(1); box-shadow: 0 3px 8px rgba(239,68,68,0.12); }
        }

        .cart-badge.pulse {
            animation: badgePulse 1.2s infinite;
        }

        .header-actions { display:flex; gap:.75rem; align-items:center; }

        @media (max-width: 575px) {
            .nav-search { display:none; }
            .navbar-brand span { display:none; }
            .cart-btn { width:44px; height:44px; }
        }

        /* Small visual tweak to ensure fixed-top doesn't obscure content */
        .nav-spacer { height: 72px; }
    </style>
</head>
<body>
    <!-- Enhanced Navigation -->
    <nav class="navbar navbar-expand-lg navbar-modern fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php" aria-label="TechSolutions Pro Home">
                <i class="fas fa-laptop-code" aria-hidden="true"></i>
                <span>TechSolutions Pro</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home me-1" aria-hidden="true"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>" href="about.php">
                            <i class="fas fa-info-circle me-1" aria-hidden="true"></i>About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'products.php' ? 'active' : ''; ?>" href="products.php">
                            <i class="fas fa-box-open me-1" aria-hidden="true"></i>Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>" href="contact.php">
                            <i class="fas fa-envelope me-1" aria-hidden="true"></i>Contact
                        </a>
                    </li>

                    <!-- Inline search (visible on lg+ screens) -->
                    <li class="nav-item d-none d-lg-block ms-3">
                        <form class="nav-search d-flex" role="search" action="products.php" method="GET" aria-label="Search products">
                            <input class="form-control" name="q" type="search" placeholder="Search products, accessories..." aria-label="Search">
                        </form>
                    </li>
                </ul>

                <!-- Actions (always visible) -->
                <div class="header-actions">
                    <!-- SEARCH ICON (small screens / quick access) -->
                    <a class="nav-link d-md-none" href="products.php" title="Search">
                        <i class="fas fa-search"></i>
                    </a>

                    <!-- CART: direct link to checkout.php (no dropdown). Value defaults to the session cart count -->
                    <a href="checkout.php" class="cart-btn" title="View Cart & Checkout" aria-label="View Cart and Checkout">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        <span class="cart-badge pulse" id="cart-badge" aria-live="polite"><?php echo (int)$cart_count; ?></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- spacer so fixed header doesn't cover content -->
    <div class="nav-spacer" aria-hidden="true"></div>

    <!-- Expose cart info to client JS; keep server values authoritative on first load -->
    <script>
        window.APP_CART = {
            count: <?php echo json_encode((int)$cart_count); ?>,
            total: <?php echo json_encode((float)$total_price); ?>,
            // Helper: update badge text and pulse animation (callable by other scripts)
            updateBadge: function(newCount, animate = true) {
                try {
                    const badge = document.getElementById('cart-badge');
                    if (!badge) return;
                    const n = parseInt(newCount, 10) || 0;
                    badge.textContent = n;
                    if (n > 0) {
                        badge.style.display = 'flex';
                    } else {
                        badge.style.display = 'none';
                    }
                    if (animate) {
                        badge.classList.remove('pulse');
                        // reflow to restart animation
                        void badge.offsetWidth;
                        badge.classList.add('pulse');
                    }
                } catch (err) {
                    console.warn('Failed to update cart badge', err);
                }
            },
            // Dispatchable event for global listeners: window.dispatchEvent(new CustomEvent('cart-updated',{detail:{count:5}}))
            initEventListener: function() {
                window.addEventListener('cart-updated', function(e) {
                    if (e && e.detail && typeof e.detail.count !== 'undefined') {
                        window.APP_CART.updateBadge(e.detail.count);
                    }
                });
            }
        };

        // Initialize listener and badge display state
        (function() {
            window.APP_CART.initEventListener();
            // ensure badge visibility
            const b = document.getElementById('cart-badge');
            if (b) {
                b.style.display = (window.APP_CART.count > 0) ? 'flex' : 'none';
            }
        })();
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
