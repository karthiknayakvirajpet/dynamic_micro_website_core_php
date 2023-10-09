<!DOCTYPE html>
<html>
    <head>
        <title>My Products</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    </head>
    <body>
        <header>
            <h1>Welcome to My Store</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="templates/products/product_list.php">Products</a></li>
                </ul>
            </nav>
        </header>


        <!-- product slider -->
        <div class="product-slider mt-4">
            <div class="slider-container" id="product_slides">
                <!-- Images will load from script -->
            </div>
        </div>
 

<!-- Scripts -->
<script>
// Pause slider animation on hover
var sliderContainer = document.querySelector('.slider-container');
sliderContainer.addEventListener('mouseenter', function () {
    this.style.animationPlayState = 'paused';
});
sliderContainer.addEventListener('mouseleave', function () {
    this.style.animationPlayState = 'running';
});


// Fetch API to get data from cURL script
var apiUrl = 'https://dummyjson.com/products?limit=10';

//fetch('curl_script.php?api_url=' + encodeURIComponent(apiUrl))
fetch('curl_script.php?api_url=' + apiUrl)
    .then(response => response.json())
    .then(data => {
        // Load images to the slider
        var productList = document.getElementById('product_slides');
        data.products.forEach(product => {
            productList.innerHTML += `
                <a href="templates/products/product_details.php?product_id=`+product['id']+`">
                    <img src='`+product['thumbnail']+`' alt='`+product['title']+`' style="height: 90%;">
                </a>
            `;
        });
    })
    .catch(error => console.error('Error fetching data:', error));
</script>


<?php include 'templates/layouts/footer.php'; ?>