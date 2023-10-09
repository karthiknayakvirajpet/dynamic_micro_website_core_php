<?php include '../layouts/header.php'; ?>

<div class="table-responsive">
    <table class="table" id="product_detail">
        <!-- Data will load from script -->
    </table>
</div>


<!-- Scripts -->
<script>
// Fetch API to get data from cURL script
<?php $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null; ?>
var apiUrl = 'https://dummyjson.com/products/<?php echo $product_id; ?>';

//fetch('../../curl_script.php?api_url=' + encodeURIComponent(apiUrl))
fetch('../../curl_script.php?api_url=' + apiUrl)
    .then(response => response.json())
    .then(data => {
        // Load data to the table
        var productDetail = document.getElementById('product_detail');

        productDetail.innerHTML += `
        <tr><th>Title</th><td>`+ data['title'] +`</td></tr>
        <tr><th>Image</th><td><img src="`+ data['thumbnail'] +`" alt="`+ data['title'] +`" style="width: 25%; height: 25%;"></td></tr>
        <tr><th>Description</th><td>`+ data['description'] +`</td></tr>
        <tr><th>Price</th><td>`+ data['price'] +`</td></tr>
        <tr><th>Rating</th><td>`+ data['rating'] +`</td></tr>
        <tr><th>Stock</th><td>`+ data['stock'] +`</td></tr>
        <tr><th>Brand</th><td>`+ data['brand'] +`</td></tr>  
        `;
    })
    .catch(error => console.error('Error fetching data:', error));
</script>

<?php include '../layouts/footer.php'; ?>