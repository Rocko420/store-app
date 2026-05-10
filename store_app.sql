CREATE DATABASE IF NOT EXISTS store_app;

USE store_app;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO products (name, description, price) VALUES
('Gaming Mouse', 'High precision RGB gaming mouse.', 49.99),
('Mechanical Keyboard', 'RGB mechanical keyboard with blue switches.', 89.99),
('USB Headset', 'Noise cancelling USB gaming headset.', 69.99),
('1080p Webcam', 'HD webcam for streaming and meetings.', 39.99),
('Laptop Stand', 'Adjustable aluminum laptop stand.', 29.99);