<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>

<div class="edit-container">
    <div class="edit-tab">Editing: {{ $item->name }}</div>
    
    <div class="edit-box">
        <form action="/products/{{ $item->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Product Name:</label>
                <input type="text" name="name123" value="{{ $item->name }}" required>
            </div>

            <div class="form-group">
                <label>Price:</label>
                <input type="text" name="price123" value="{{ $item->price }}" required>
            </div>

            <div class="form-group">
                <label>Category:</label>
                <select name="catID" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" 
                            {{ $item->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">Update Changes</button>
        </form>

        <br>
        <a href="/products">Cancel and Go Back</a>
    </div>
</div>

</body>
</html>