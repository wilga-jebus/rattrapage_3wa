<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
    <h1>Checkout</h1>
    <form method="post" action="/checkout/process">
        <h2>Shipping Address</h2>
        <label for="line1">Address Line 1:</label>
        <input type="text" id="line1" name="line1" required>
        <br>
        <label for="line2">Address Line 2:</label>
        <input type="text" id="line2" name="line2">
        <br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
        <br>
        <label for="zipCode">Zip Code:</label>
        <input type="text" id="zipCode" name="zipCode" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <br>
        <h2>Payment Information</h2>
        <label for="cardType">Card Type:</label>
        <select id="cardType" name="cardType" required>
            <option value="V">Visa</option>
            <option value="M">MasterCard</option>
            <option value="A">American Express</option>
        </select>
        <br>
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required>
        <br>
        <label for="cardExpires">Card Expiry Date:</label>
        <input type="text" id="cardExpires" name="cardExpires" required>
        <br>
        <button type="submit">Place Order</button>
    </form>
</body>
</html>