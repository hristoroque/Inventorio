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
    UNIQUE KEY (DNI),
    UNIQUE KEY (login)
)CHARSET=utf8;

CREATE TABLE providers (  asd  
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    company VARCHAR(100) NOT NULL,
    state BOOLEAN DEFAULT TRUE,
    created DATETIME,
    modified DATETIME,
    UNIQUE KEY (company)
)CHARSET=utf8;

CREATE TABLE categories (    
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) ,
    state BOOLEAN DEFAULT TRUE,
    created DATETIME,
    modified DATETIME,
    UNIQUE KEY (name)
)CHARSET=utf8;

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    provider_id INT NOT NULL,
    category_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) ,
    price FLOAT(20) NOT NULL,    
    state BOOLEAN DEFAULT TRUE,   
    created DATETIME,
    modified DATETIME,
    UNIQUE KEY (name),
    FOREIGN KEY provider_key (provider_id) REFERENCES providers(id),
    FOREIGN KEY category_key (category_id) REFERENCES categories(id)
) CHARSET=utf8;

CREATE TABLE kardexes (
    id INT AUTO_INCREMENT PRIMARY KEY,    
    user_id INT NOT NULL,
    created DATETIME,
    modified DATETIME,    
    FOREIGN KEY user_key (user_id) REFERENCES users(id)    
) CHARSET=utf8;

CREATE TABLE articles_kardexes (    
    resgistry BOOLEAN DEFAULT TRUE,
    quantity INT(5) NOT NULL,
    amount INT(10) NOT NULL,    
    article_id INT NOT NULL,
    kardex_id INT NOT NULL,
    PRIMARY KEY (article_id, kardex_id),
    FOREIGN KEY kardex_key(kardex_id) REFERENCES kardexes(id),
    FOREIGN KEY article_key(article_id) REFERENCES articles(id)
) CHARSET=utf8;