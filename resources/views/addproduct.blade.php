@extends('base')
@section('main')
    <div class="container" id="app">
        <header>
            <h1><i class="fas fa-box-open"></i> Product Management System</h1>
            <p>Add and manage your products with ease</p>
        </header>

        <div class="main-content">
            <section class="form-section">
                <h2 class="section-title">Add New Product</h2>
                <form id="productForm">
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" id="productName" placeholder="Enter product name" required>
                    </div>

                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea id="productDescription" rows="3" placeholder="Enter product description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="productPrice">Price ($)</label>
                        <input type="number" id="productPrice" placeholder="Enter price" min="0" step="0.01"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="productCategory">Category</label>
                        <select id="productCategory" required>
                            <option value="">Select a category</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Books">Books</option>
                            <option value="Home & Kitchen">Home & Kitchen</option>
                            <option value="Sports">Sports</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productImage">Image URL (optional)</label>
                        <input type="url" id="productImage" placeholder="Enter image URL">
                    </div>

                    <button type="submit"><i class="fas fa-plus-circle"></i> Add Product</button>
                </form>
            </section>

            <section class="list-section">
                <h2 class="section-title">Product List</h2>
                <div class="product-list" id="productList">
                    <!-- Product items will be added here dynamically -->
                    <div class="empty-list">
                        <i class="fas fa-box-open"></i>
                        <p>No products added yet</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        const {
            createApp,
            ref
        } = Vue

        createApp({
            setup() {
                const message = ref('Hello vue!')
                return {
                    message
                }
            }
        }).mount('#app')
    </script>
@endsection
