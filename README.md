# EazyByts-Final-Project
# Fitness and Wellness Platform

Welcome to the **Fitness and Wellness Platform**! This project is a web-based application that helps users achieve a healthier and happier life through a balanced approach to fitness and wellness. The platform provides information about fitness, wellness, and other health-related topics and allows users to subscribe to a newsletter for regular updates.

## Features

- **Home Page**: Introduction to the platform and navigation to other sections.
- **About Us**: Information about the platform's mission and purpose.
- **Contact Us**: A contact form where users can get in touch with the platform.
- **News Subscription**: Users can subscribe to a newsletter by entering their email address.

## Technologies Used

- **Frontend**: HTML5, CSS3
- **Backend**: PHP
- **Database**: MySQL

## Setup and Installation

### Prerequisites

- **Web Server**: You need a web server like Apache or Nginx.
- **PHP**: Ensure PHP is installed and configured on your server.
- **MySQL**: Install MySQL and create a database for the platform.

### Installation Steps

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/fitness-wellness-platform.git
    ```
2. **Create the Database**:
    - Open your MySQL command line or a database management tool like phpMyAdmin.
    - Create a database named `Fitness`:
      ```sql
      CREATE DATABASE Fitness;
      ```
    - Select the database:
      ```sql
      USE Fitness;
      ```
    - Create the required tables:
      ```sql
      CREATE TABLE users (
          id INT AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255) NOT NULL,
          email VARCHAR(255) NOT NULL,
          phone VARCHAR(10) NOT NULL,
          age INT NOT NULL,
          gender VARCHAR(10) NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      );

      CREATE TABLE contact (
          id INT AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255) NOT NULL,
          email VARCHAR(255) NOT NULL,
          subject VARCHAR(255) NOT NULL,
          message TEXT NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      );

      CREATE TABLE news (
          id INT AUTO_INCREMENT PRIMARY KEY,
          email VARCHAR(255) NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      );
      ```

3. **Configure Database Connection**:
    - Update the database connection details in the PHP files:
      - `register.php`
      - `contact.php`
      - `about.php`
    - Replace the following placeholders with your database credentials:
      ```php
      $servername = "localhost"; // Your database server name
      $username = "root"; // Your database username
      $password = "yourpassword"; // Your database password
      $dbname = "Fitness"; // Database name
      ```

4. **Deploy the Project**:
    - Copy the project files to your web server's root directory.
    - Ensure your web server is running.

5. **Access the Platform**:
    - Open your web browser and navigate to `http://localhost/index.html` (or the appropriate URL if using a remote server).

## Usage

- **Register**: Navigate to the `Register` page, fill out the form, and submit to register as a user.
- **Contact Us**: Use the contact form to reach out to the platform administrators.
- **News Subscription**: Enter your email on the `About Us` page to receive regular updates.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for review.

## Contact

For any inquiries or feedback, feel free to reach out via the `Contact Us` page.

---

**Developed by**: Pavi

**Year**: 2024


