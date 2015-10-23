CREATE TABLE products
(product_id INT AUTO_INCREMENT,
name VARCHAR(255),
price DECIMAL (8,2),
description VARCHAR(255),
stock INT,
PRIMARY KEY (product_id));


CREATE TABLE image(
image_id INT AUTO_INCREMENT,
product_id INT,
link VARCHAR(100),
PRIMARY KEY (image_id),
FOREIGN KEY (product_id) REFERENCES products (product_id)
);
