@extends('base')
@section('main')
    <div class="container" id="app">
        <header>
            <h1><i class="fas fa-box-open"></i> Category Management System</h1>
            <p>Add and manage your Category with ease</p>
        </header>

        <div class="main-content">
            <section class="form-section">
                <h2 class="section-title">Add New Category</h2>
                <form id="CategoryForm">
                    <div class="form-group">
                        <label for="CategoryName">Category Name</label>
                        <input type="text" id="CategoryName" placeholder="Enter Category name" required>
                    </div>

                    <div class="form-group">
                        <label for="CategoryDescription">Description</label>
                        <textarea id="CategoryDescription" rows="3" placeholder="Enter Category description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="CategoryPrice">Price ($)</label>
                        <input type="number" id="CategoryPrice" placeholder="Enter price" min="0" step="0.01"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="CategoryCategory">Category</label>
                        <select id="CategoryCategory" required>
                            <option value="">Select a category</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Books">Books</option>
                            <option value="Home & Kitchen">Home & Kitchen</option>
                            <option value="Sports">Sports</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="CategoryImage">Image URL (optional)</label>
                        <input type="url" id="CategoryImage" placeholder="Enter image URL">
                    </div>

                    <button type="submit"><i class="fas fa-plus-circle"></i> Add Category</button>
                </form>
            </section>

            <section class="list-section">
                <h2 class="section-title">Category List</h2>
                <div class="Category-list" id="CategoryList">
                    <!-- Category items will be added here dynamically -->
                    <div class="empty-list">
                        <i class="fas fa-box-open"></i>
                        <p>No Categorys added yet</p>
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
