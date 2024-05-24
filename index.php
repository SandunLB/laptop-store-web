<?php include 'includes/header.php'; ?>

<!-- Global CSS Styles -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f2f5;
        color: #333;
    }
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    h2 {
        font-size: 2.5em;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1.2em;
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
        text-decoration: none;
    }
    .btn:hover {
        background-color: #0056b3;
    }
    section {
        padding: 50px 0;
    }
    .flex-container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 20px;
    }
    .feature, .choose-us-item, .brand, .upcoming-item {
        text-align: center;
        flex: 1 1 30%;
        margin: 20px;
        padding: 20px;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }
    .feature:hover, .choose-us-item:hover, .brand:hover, .upcoming-item:hover {
        transform: scale(1.05);
    }
    img {
        max-width: 100%;
        border-radius: 10px;
    }
    ul {
        list-style-type: none;
        padding: 0;
    }
    li {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    li img {
        width: 100px;
        height: auto;
        margin-right: 20px;
        flex-shrink: 0;
    }
    .details {
        text-align: left;
    }
</style>

<!-- Landing Image Section -->
<section id="landing" style="background-image: url('resource/colorful_laptop_with_black_background_4k_hd_black_aesthetic.jpg'); height: 600px; background-size: cover; background-position: center; position: relative; color: #fff;">
    <div class="landing-content" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #fff;">
        <h1>Welcome to Laptop Store</h1>
        <p>Your ultimate destination for high-quality laptops.</p>
        <a href="#features" class="btn">Explore Now</a>
    </div>
</section>

<!-- Features Section -->
<section id="features">
    <div class="container">
        <h2>Features</h2>
        <div class="flex-container">
            <div class="feature">
                <img src="resource/high perfomance.jpg" alt="Performance">
                <h3>Powerful Performance</h3>
                <p>Experience lightning-fast performance with the latest processors and ample RAM.</p>
            </div>
            <!-- Add other features with images -->
            <div class="feature">
                <img src="resource/sleek.jpg" alt="Design">
                <h3>Sleek Design</h3>
                <p>Enjoy the best of both worlds with powerful performance and sleek design.</p>
            </div>
            <div class="feature">
                <img src="resource/long battery.jpg" alt="Battery Life">
                <h3>Long Battery Life</h3>
                <p>Stay unplugged longer with laptops that offer extended battery life.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section id="choose-us">
    <div class="container">
        <h2>Why Choose Us</h2>
        <p>At Laptop Store, we are committed to providing the best shopping experience for our customers. Here's why you should choose us:</p>
        <div class="flex-container">
            <div class="choose-us-item">
                <img src="resource/ProArt-3.webp" alt="Wide Selection">
                <div class="details">Wide selection of top-quality laptops</div>
            </div>
            <div class="choose-us-item">
                <img src="resource/depositphotos_307014266-stock-illustration-operator-icon-line-design.jpg" alt="Customer Service">
                <div class="details">Exceptional customer service</div>
            </div>
            <div class="choose-us-item">
                <img src="resource/extended-warranty-logo-png.png" alt="Warranty">
                <div class="details">Comprehensive warranty options</div>
            </div>
        </div>
    </div>
</section>

<!-- Brand Authorized Section -->
<section id="brand-authorized">
    <div class="container">
        <h2>Brand Authorized</h2>
        <p>We are proud to be authorized dealers for the following leading laptop brands:</p>
        <div class="flex-container">
            <div class="brand">
                <img src="resource/apple.webp" alt="Apple">
                <div class="details">Apple</div>
            </div>
            <div class="brand">
                <img src="resource/gigabyte.png" alt="Gigabyte">
                <div class="details">Gigabyte</div>
            </div>
            <div class="brand">
                <img src="resource/acer.png" alt="Acer">
                <div class="details">Acer</div>
            </div>
            <div class="brand">
                <img src="resource/msi.png" alt="MSI">
                <div class="details">MSI</div>
            </div>
            <div class="brand">
                <img src="resource/asus.png" alt="Asus">
                <div class="details">Asus</div>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Laptops Section -->
<section id="upcoming-laptops">
    <div class="container">
        <h2>Upcoming Laptops</h2>
        <p>Get ready for the latest and greatest laptops coming soon to Laptop Store:</p>
        <div class="flex-container">
            <div class="upcoming-item">
                <img src="resource/MacBook-Pro-14inch-Space-Grey-2023-Apple-Asia-1.webp" alt="MacBook Pro">
                <div class="details">Apple MacBook Pro 2023</div>
            </div>
            <div class="upcoming-item">
                <img src="resource/Dell 15.webp" alt="Dell XPS">
                <div class="details">Dell XPS 15 2023</div>
            </div>
            <div class="upcoming-item">
                <img src="resource/hp lap 2023.png" alt="HP Spectre">
                <div class="details">HP Spectre x360 2023</div>
            </div>
        </div>
    </div>
</section>

<!-- View Products Section -->
<section id="view-products">
    <div class="container">
        <h2>View Products</h2>
        <p>Explore our extensive collection of laptops and find the perfect one for your needs:</p>
        <a href="products.php" class="btn" style="display: block; width: 200px; margin: 20px auto; text-align: center; background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">View All Products</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
