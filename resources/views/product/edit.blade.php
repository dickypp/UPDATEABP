<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <h1>Edit Product</h1>

        <form action="{{ route('product.update', $product->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="mb-3">
              <label for="nameInput" class="form-label">Nama Produk</label>
              <input type="text" class="form-control" id="nameInput" name="name" value="{{ $product->name }}">
          </div>

          <div class="mb-3">
            <label for="stockInput" class="form-label">Stock Produk</label>
            <input type="number" class="form-control" id="stockInput" name="stock" value="{{ $product->stock }}">
          </div>

          <div class="mb-3">
            <label for="priceInput" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" id="priceInput" name="price"  value="{{ $product->price }}">
          </div>

          <div class="mb-3">
            <label for="brandInput" class="form-label">Brand Product</label>
            <select class="form-select" id="brandInput" name="brand_id">
              <option value="0" disabled selected>Pilih Brand</option>
              @foreach ($mereks as $merek)
              <option value="{{ $merek->id }}" @if ($product->merek_id == $merek->id)
                  selected
              @endif>{{ $merek->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="warehouseInput" class="form-label">Warehouse Product</label>
            <select class="form-select" id="warehouseInput" name="warehouse_id">
              <option value="0" disabled selected>Pilih Warehouse</option>
              @foreach ($warehouses as $warehouse)
              <option value="{{ $warehouse->id }}" @if ($product->warehouse_id == $warehouse->id)
                selected
              @endif>{{ $warehouse->name }}</option>
              @endforeach
            </select>
          </div>

          <button class="btn btn-primary" type="submit">Simpan</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>