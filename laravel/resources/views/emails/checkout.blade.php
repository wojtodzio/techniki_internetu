New order!

<br />
<br />

Items:
<ul>
    @foreach($items as $cartItem)
        <li>
            name: {{ $cartItem->Product->name }}, quantity: {{ $cartItem->quantity }}
        </li>
    @endforeach
</ul>

<br />

Address:
<ul>
    @foreach($address as $field => $value)
        <li>{{ $field }}: {{ $value }}</li>
    @endforeach
</ul>
