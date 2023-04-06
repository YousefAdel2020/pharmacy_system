<p>Dear Customer,</p>

<p>Please confirm your order by clicking the following link:</p>
<p><a href="{{ $confirmUrl }}">Confirm Order</a></p>

<p>If you want to cancel your order, please click the following link:</p>
<p><a href="{{ $cancelUrl }}">Cancel Order</a></p>

<p>Order Information:</p>
<ul>
    <li>Product: {{ $orderInfo['product'] }}</li>
    <li>Quantity: {{ $orderInfo['quantity'] }}</li>
    <li>Price: {{ $orderInfo['price'] }}</li>
    <li>Total: {{ $totalPrice }}</li>
</ul>

<p>Thank you for choosing our pharmacy!</p>
