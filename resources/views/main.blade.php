@extends('base')

@section('main')
    <div id="app" class="container-fluid">
        <div class="d-flex justify-content-center gap-5">
            <!-- Left: Products -->
            <div class="" style="width:70%;">
                <div class="row mb-3">
                    <div class="col-md-2 col-2">
                        <select v-model="selectedCategory" class="form-select">
                            <option value="">All Categories</option>
                            <option v-for="category in categories" :key="category" :value="category">
                                [[ category ]]
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" v-model="searchQuery" class="form-control" placeholder="Search products...">
                    </div>
                </div>

                <div class="row w-52">
                    <div class="col-md-4 mb-4" v-for="product in filteredProducts" :key="product.id">
                        <div class="card" style="width: 18rem;">
                            <img :src="product.image" class="card-img-top" :alt="product.title"
                                style="height: 200px; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title">[[ product.title.slice(0, 10) ]]</h5>
                                <p class="card-text">$[[ product.price ]]</p>
                                <button class="btn btn-primary w-100" @click="addToCart(product)">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Cart Sidebar -->
            <div class="" style="width: 30%">
                <h4>Your Cart ([[ cart.length ]])</h4>
                <hr>
                <div v-if="cart.length === 0">
                    <p>Your cart is empty.</p>
                </div>
                <div v-for="(item, index) in cart" :key="item.id"
                    class="d-flex justify-content-between align-items-center mb-3">
                    <img :src="item.image" alt="" style="width: 50px; height: 50px; object-fit: contain;">
                    <div style="flex: 1; margin-left: 10px;">
                        <p class="mb-1" style="font-size: 14px;">[[ item.title.slice(0, 10) ]]</p>
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
                <p><strong>Total USD: </strong>$[[ cartTotal.toFixed(2) ]]</p>
                <p><strong>Total Riel: </strong>៛[[ (cartTotal *
                    4000).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") ]]</p>
                <button class="btn btn-success w-100">Checkout</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        Vue.createApp({
            delimiters: ['[[', ']]'],
            data() {
                return {
                    products: [],
                    categories: [],
                    searchQuery: '',
                    selectedCategory: '',
                    cart: []
                }
            },
            computed: {
                filteredProducts() {
                    return this.products.filter(product => {
                        const matchesSearch = product.title.toLowerCase().includes(this.searchQuery
                            .toLowerCase());
                        const matchesCategory = this.selectedCategory === '' || product.category === this
                            .selectedCategory;
                        return matchesSearch && matchesCategory;
                    });
                },
                cartTotal() {
                    return this.cart.reduce((total, item) => total + item.price * item.quantity, 0);
                }
            },
            methods: {
                async getProduct() {
                    try {
                        const response = await axios.get('https://fakestoreapi.com/products');
                        this.products = response.data;
                        this.getCategories();
                    } catch (error) {
                        console.error(error);
                    }
                },
                getCategories() {
                    this.categories = [...new Set(this.products.map(product => product.category))];
                },
                addToCart(product) {
                    const existing = this.cart.find(item => item.id === product.id);
                    if (existing) {
                        existing.quantity++;
                    } else {
                        this.cart.push({
                            ...product,
                            quantity: 1
                        });
                    }
                },
                updateQuantity(index, amount) {
                    this.cart[index].quantity += amount;
                },
                removeFromCart(index) {
                    this.cart.splice(index, 1);
                }
            },
            mounted() {
                this.getProduct();
            }
        }).mount('#app');
    </script>
@endsection
