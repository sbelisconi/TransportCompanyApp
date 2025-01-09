<?php
require_once "classes/Payment.php";

    // Get the transaction reference from the request
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $reference = $data['reference'];
    $customer_id = $data['customer_id'];
    
    // Verify the payment using Paystack API
    $secret_key = 'sk_test_9ad0ec4fa31deb629564248826df6d29a51533c1'; //Paystack secret key
    $url = "https://api.paystack.co/transaction/verify/" . $reference;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $secret_key"
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $result = json_decode($response, true);
    
    if($result['status'] && $result['data']['status'] === 'success'){
        // Payment was successful
        $customer_email = $result['data']['customer']['email'];
        $amount = $result['data']['amount']/100; //convert kobo to NGN flat rate
        
        // Save payment details to your database here
        $p = new Payment;
        $pay = $p->new_payment($customer_id,$customer_email,$amount,$reference,'success');
        echo json_encode(['status' => 'success', 'message' => 'Payment verified successfully.']);

    }else{
        // Payment failed
        echo json_encode(['status' => 'error', 'message' => 'Payment verification failed.']);
    }
    
?>