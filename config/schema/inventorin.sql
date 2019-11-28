CREATE DATABASE inventorin;

USE inventorin;

CREATE TABLE users (    
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    DNI INT(8) NOT NULL,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    state BOOLEAN DEFAULT TRUE,
    created DATETIME,
    modified DATETIME,
    UNIQUE (DNI),
    UNIQUE (login)
)CHARSET=utf8;

CREATE TABLE providers (    
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    company VARCHAR(100) NOT NULL,
    state BOOLEAN DEFAULT TRUE,
    created DATETIME,
    modified DATETIME,
    UNIQUE (company)
)CHARSET=utf8;

CREATE TABLE categories (    
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) ,
    state BOOLEAN DEFAULT TRUE,
    created DATETIME,
    modified DATETIME,
    UNIQUE (name)
)CHARSET=utf8;

CREATE TABLE operations_types (    
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
)CHARSET=utf8;

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    provider_id INT NOT NULL,
    category_id INT NOT NULL,
    buy_price FLOAT(20) NOT NULL,
	sell_price FLOAT(20) NOT NULL,    
	name VARCHAR(100) NOT NULL,
    description VARCHAR(255) ,    
    state BOOLEAN DEFAULT TRUE,   
    created DATETIME,
    modified DATETIME,
    UNIQUE (name),
    FOREIGN KEY provider_key (provider_id) REFERENCES providers(id),
    FOREIGN KEY category_key (category_id) REFERENCES categories(id)
) CHARSET=utf8;

CREATE TABLE operations_cab (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,    
    operation_type_id INT NOT NULL,
    created DATETIME,
    modified DATETIME,    
    FOREIGN KEY user_key (user_id) REFERENCES users(id),
    FOREIGN KEY operation_type_key (operation_type_id) REFERENCES operations_types(id)
) CHARSET=utf8;

CREATE TABLE operations_det (
    id INT AUTO_INCREMENT PRIMARY KEY,
    operation_cab_id INT NOT NULL,
	article_id INT NOT NULL,    
    quantity INT(10) NOT NULL,
    created DATETIME,
    modified DATETIME,        
    FOREIGN KEY operation_cab_key (operation_cab_id) REFERENCES operations_cab(id),
	FOREIGN KEY article_key(article_id) REFERENCES articles(id)
) CHARSET=utf8;

CREATE TABLE kardexes_cab (
    id INT AUTO_INCREMENT PRIMARY KEY,    
    article_id INT NOT NULL,
	current_stock INT(10) NOT NULL,
	current_balance FLOAT(20) NOT NULL,    
    created DATETIME,
    modified DATETIME,    
    FOREIGN KEY article_key2 (article_id) REFERENCES articles(id)    
) CHARSET=utf8;

CREATE TABLE kardexes_det (    
    id INT AUTO_INCREMENT PRIMARY KEY,    
    kardex_cab_id INT NOT NULL,
    date DATETIME,	
	entry_amount INT(10) NOT NULL,
	entry_unit_price FLOAT(20) NOT NULL,    
	entry_total_price FLOAT(20) NOT NULL,    
	output_amount INT(10) NOT NULL,
	output_unit_price FLOAT(20) NOT NULL,    
	output_total_price FLOAT(20) NOT NULL,    
	existence_current_stock INT(10) NOT NULL,
	existence_current_balance FLOAT(20) NOT NULL,	
    FOREIGN KEY kardex_cab_key(kardex_cab_id) REFERENCES kardexes_cab(id)    
) CHARSET=utf8;

INSERT INTO operations_types(name) VALUES ('comprar');
INSERT INTO operations_types(name) VALUES ('vender');