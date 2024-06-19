# Laptop Store Website

A advanced laptop store website built using PHP, CSS, HTML, and MySQL.

## Features

- Display laptops
- Search by criteria
- Shopping cart
- User authentication
- Admin panel

## Technologies Used

- PHP
- HTML
- CSS
- MySQL

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/your-username/laptop-store.git
    ```

2. Navigate to the project directory:
    ```sh
    cd laptop-store
    ```

3. Import the MySQL database:
    - Create a database named `laptop_store`.
    - Import the `database.sql` file:
        ```sql
        mysql -u your-username -p laptop_store < sql/database.sql
        ```

4. Configure the database connection:
    - Open `config.php`.
    - Update the database details:
        ```php
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'your-username');
        define('DB_PASSWORD', 'your-password');
        define('DB_NAME', 'laptop_store');
        ```

5. Start the local development server:
    ```sh
    php -S localhost:8000
    ```

6. Open your browser and go to:
    ```
    http://localhost:8000
    ```

