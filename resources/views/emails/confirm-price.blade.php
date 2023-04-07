<x-mail::message>
# your order info:
 
Dear Customer,
the order total price is: {{($totalPrice)/100}}$
please confirm you order or cancel it

 
<x-mail::button :url="$confirmUrl">
    confirm
</x-mail::button>

<x-mail::button :url="$cancelUrl">
    cancel
</x-mail::button>
Thank you for choosing our pharmacy!
</x-mail::message>


