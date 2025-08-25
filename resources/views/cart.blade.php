<!-- Right: Cart Sidebar -->
<div style="width: 350px; background: #fff; border-left: 1px solid #ddd; padding: 15px; overflow-y: auto;">
    <h4>Your Cart ([[ cart.length ]])</h4>
    <hr>
    <div v-if="cart.length === 0">
        <p>Your cart is empty.</p>
    </div>
    <div v-for="(item, index) in cart" :key="item.id"
        class="d-flex justify-content-between align-items-center mb-3">
        <img :src="item.image" alt="" style="width: 50px; height: 50px; object-fit: contain;">
        <div style="flex: 1; margin-left: 10px;">
            <p class="mb-1" style="font-size: 14px;">[[ item.title ]]</p>
            <p class="mb-1">$[[ (item.price * item.quantity).toFixed(2) ]]</p>
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-outline-secondary" @click="updateQuantity(index, -1)"
                    :disabled="item.quantity === 1">-</button>
                <span class="mx-2">[[ item.quantity ]]</span>
                <button class="btn btn-sm btn-outline-secondary" @click="updateQuantity(index, 1)">+</button>
            </div>
        </div>
        <button class="btn btn-sm btn-danger" @click="removeFromCart(index)">X</button>
    </div>
    <hr>
    <p><strong>Total: </strong>$[[ cartTotal.toFixed(2) ]]</p>
    <button class="btn btn-success w-100">Checkout</button>
</div>
