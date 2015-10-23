CREATE TABLE products
(product_id INT AUTO_INCREMENT,
name VARCHAR(255),
price DECIMAL (8,2),
description VARCHAR(255),
stock INT,
product_group INT,
PRIMARY KEY (product_id));


CREATE TABLE images(
image_id INT AUTO_INCREMENT,
product_id INT,
link VARCHAR(100),
PRIMARY KEY (image_id),
FOREIGN KEY (product_id) REFERENCES products (product_id)
);

CREATE TABLE users(
user_id INT AUTO_INCREMENT,
first_name VARCHAR(30),
last_name VARCHAR(50),
email VARCHAR(50),
password VARCHAR(32),
address VARCHAR(50),
PRIMARY KEY (user_id)
);

CREATE TABLE admins(
admin_id INT AUTO_INCREMENT,
email VARCHAR(50),
password VARCHAR(32),
PRIMARY KEY (admin_id)
);

CREATE TABLE orders(
order_id INT AUTO_INCREMENT,
user_id INT,
PRIMARY KEY (order_id),
FOREIGN KEY (user_id) REFERENCES users (user_id)
);

CREATE TABLE product_order(
order_id INT,
product_id INT,
FOREIGN KEY (order_id) REFERENCES orders (order_id),
FOREIGN KEY (product_id) REFERENCES products (product_id)
);