<?php include '../layouts/header.php'; ?>

<!-- product list -->
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" id="product_list">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Price</th>
                <th>Rating</th>
                <th>Stock</th>
                <th>Brand</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will load from script -->
        </tbody>
    </table>
</div>

<!-- Scripts -->
<script>
// Fetch API to get data from cURL script
var apiUrl = 'https://dummyjson.com/products?limit=10';
fetch('../../curl_script.php?api_url=' + encodeURIComponent(apiUrl))
    .then(response => response.json())
    .then(data => {
        // Load data to the table
        var productList = document.getElementById('product_list');
        data.products.forEach(product => {
            productList.innerHTML += `
            <tr>
                <td>`+ product.title +`</td>
                <td><img src="`+ product['thumbnail']+`" alt="`+ product['title'] +`" style="width: 50%; height: 50%;">
                </td>
                <td>`+ product.description +`</td>
                <td>`+ product.price +`</td>
                <td>`+ product.rating +`</td>
                <td>`+ product.stock +`</td>
                <td>`+ product.brand +`</td>
                <td><a href="product_details.php?product_id=` + product['id'] + `">
                        <button type="button" class="btn btn-info" data-original-title="" title="View" name="view">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                    </a>
                </td>
            </tr>
            `;
        });
    })
    .catch(error => console.error('Error fetching data:', error));
</script>

<?php include '../layouts/footer.php'; ?>