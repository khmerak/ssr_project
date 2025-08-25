<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .form-section,
        .list-section {
            flex: 1;
            min-width: 300px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
            color: #2c3e50;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        button {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background 0.3s;
        }

        button:hover {
            background: #2980b9;
        }

        .product-list {
            max-height: 500px;
            overflow-y: auto;
        }

        .product-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            transition: background 0.3s;
        }

        .product-item:hover {
            background: #f9f9f9;
        }

        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #2c3e50;
        }

        .product-details {
            display: flex;
            margin-top: 5px;
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .product-price {
            font-weight: 600;
            color: #27ae60;
            margin-right: 15px;
        }

        .product-category {
            background: #eef7ff;
            color: #3498db;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
        }

        .product-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
            color: #7f8c8d;
            transition: color 0.3s;
        }

        .edit-btn:hover {
            color: #3498db;
        }

        .delete-btn:hover {
            color: #e74c3c;
        }

        .empty-list {
            text-align: center;
            padding: 30px;
            color: #7f8c8d;
        }

        .empty-list i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ddd;
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    @include('navbar')

    <div class="d-flex">
        @yield('main')
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')

</html>
