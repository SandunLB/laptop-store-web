<footer style="background-color: rgba(0, 0, 0); padding: 50px 0; color: #fff;">
        <div class="footer-content" style="display: flex; justify-content: space-around; align-items: flex-start; flex-wrap: wrap; max-width: 1200px; margin: auto;">
            <div class="footer-section about" style="flex: 1; padding: 20px;">
                <h2>About Us</h2>
                <p>We are a leading online store for laptops, providing high-quality products and exceptional customer service.</p>
                <div class="contact" style="margin-top: 20px;">
                    <span style="display: block; margin-bottom: 10px;"><i class="fas fa-phone" style="margin-right: 10px;"></i> +1234567890</span>
                    <span style="display: block;"><i class="fas fa-envelope" style="margin-right: 10px;"></i> info@example.com</span>
                </div>
                <div class="social" style="margin-top: 20px;">
                    <a href="#" style="text-decoration: none; color: #fff; margin-right: 10px;"><i class="fab fa-facebook"></i></a>
                    <a href="#" style="text-decoration: none; color: #fff; margin-right: 10px;"><i class="fab fa-twitter"></i></a>
                    <a href="#" style="text-decoration: none; color: #fff;"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section links" style="flex: 1; padding: 20px;">
                <h2>Quick Links</h2>
                <ul style="list-style-type: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><a href="index.php" style="text-decoration: none; color: #fff;">Home</a></li>
                    <li style="margin-bottom: 10px;"><a href="products.php" style="text-decoration: none; color: #fff;">Products</a></li>
                    <li style="margin-bottom: 10px;"><a href="about.php" style="text-decoration: none; color: #fff;">About</a></li>
                    <li><a href="contact.php" style="text-decoration: none; color: #fff;">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section contact-form" style="flex: 1; padding: 20px;">
                <h2>Contact Us</h2>
                <form action="#" method="post" style="margin-top: 10px;">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Your email address..." style="width: 100%; padding: 10px; margin-bottom: 10px; border: none; border-radius: 5px;">
                    <textarea name="message" class="text-input contact-input" placeholder="Your message..." style="width: 100%; padding: 10px; margin-bottom: 10px; border: none; border-radius: 5px;"></textarea>
                    <button type="submit" class="btn btn-big" style="background-color: #0f0; color: #000; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"><i class="fas fa-envelope" style="margin-right: 10px;"></i>Send</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom" style="text-align: center; padding: 20px 0; background-color: rgba(0, 0, 0, 0.6);">
            &copy; <?php echo date('Y'); ?> Laptop Store. All rights reserved.
        </div>
    </footer>
