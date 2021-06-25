<?php
	$dbHost = "localHost";
	$dbUser = "root";
	$dbPass = "";
	
	$conn = mysqli_connect($dbHost, $dbUser, $dbPass);

	$dbName = "threshold_food";

	$sql = "DROP DATABASE IF EXISTS $dbName;
       		CREATE DATABASE IF NOT EXISTS $dbName;";
	mysqli_multi_query($conn, $sql);

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die("Database Connection Failed!");

	$sql = 
	"
CREATE TABLE administrator
(
	Admin_Id           INT(11)        		NOT NULL   		PRIMARY KEY,
	Admin_Name         VARCHAR(255) 		NOT NULL   	 	UNIQUE,
	Admin_Password     VARCHAR(255) 		NOT NULL
);   	  
 
CREATE TABLE product
(
	Product_No          INT(11)        	NOT NULL   		PRIMARY KEY   AUTO_INCREMENT,
	Product_Name        VARCHAR(255) 	NOT NULL,
	Product_Price       DECIMAL(64,2) 	NOT NULL,
	Product_Category    VARCHAR(255) 	NOT NULL,
	Product_Quantity    INT(11)         NOT NULL,
	Total_Sales         DECIMAL(64,2)   NOT NULL   	   DEFAULT 0,
	Product_Desc	    VARCHAR(1000)   NOT NULL
);
 
CREATE TABLE customer
(
    Customer_Id	            INT(11)        	NOT NULL   	PRIMARY KEY    AUTO_INCREMENT,
	Customer_FullName 		VARCHAR(255) 	NOT NULL,
    Customer_Name           VARCHAR(255)    NOT NULL   	 UNIQUE,
    Customer_Password   	VARCHAR(255)    NOT NULL,
    Customer_Phone          INT(11)         NOT NULL,
    Customer_Email          VARCHAR(255) 	NOT NULL   	 UNIQUE
);
 
CREATE TABLE bill
(
    Customer_Id  		INT(11)        	REFERENCES customer(Customer_Id),
	Product_No      	INT(11)        	REFERENCES product(Product_No),
	Buy_Quantity		INT             NOT NULL,
	Total_Price 		DECIMAL(64,2)   NOT NULL,
	Transaction_Time    DATETIME       	NOT NULL
);
 
INSERT INTO administrator VALUES (1, 'admin_reset', 'reset'), (2, 'admin_allie', 'allieChiang123'), (3, 'admin_micole', 'micoleSiow123');
 
INSERT INTO product VALUES
(1,'LIZIQI Snail Noodle 335g', 5.00, 'Instant Noodle', 15, 200,'Snail Rice Noodles is also known as Luosifen, is a famous Chinese noodles dish that made from river snails and pork bones, black cardamom and more...'),
(2, 'NISSIN Ramen', 5.00, 'Instant Noodle', 15, 200, 'There is no greater joy than slurping down a piping bowl of ramen. Satisfy your taste buds with springy and smooth texture wheat noodles served in a generous rich broth.'),
(3,'SAMYANG Ramen', 6.00, 'Instant Noodle', 15, 200, 'Hot Chicken Flavour Ramen or buldak-bokkeum-myeon, commonly known as the fire noodles, is a brand of ramyeon produced by Samyang Food in South Korea.'),
(4, 'HAIDILAO hotpot', 15.00, 'Instant Hotpot', 15, 0, 'Haidilao Hotpot is a self-heating, instant, and portable hotpot that is suitable to eat at any time, anywhere. 15 minutes of cooking with water could bring you a satisfying meal.' ),
(5, 'Fried Rice', 15.00, 'Instant Rice', 15, 0, ' This is a delicious fried rice from Nagatanien. The mix contains all the necessary ingredients, including rice, grilled pork and vegetables, to make tasty Chahan (Japanese fried rice). '),
(6, 'KAI XIAO ZAO', 15.00, 'Instant Rice', 15, 0, 'Kai Xiao Zao is literally translated as  ''open small stove'', but no fire or electricity is necessary at all to get this stove working..and bring you the best Chinese cuisine'),
(7, 'Pringles', 5.00, 'Snack', 15, 100, ' Each chip is uniquely shaped and well-seasoned. It is not greasy on your fingers and in your mouth. '),
(8, 'Quest Protein Cookies', 15.00, 'Snack', 15, 0, 'Quest Protein Cookies are soft and chewy baked treats with plenty of fiber and minimal net carbs and sugar. It is healthy and at the same time, can fulfill your cookie cravings! '),
(9, 'ANMUXI Yogurt', 65.00, 'Drink', 15, 350, 'ANMUXI Yogurt is a well-known yogurt in China, it caters to various sizes and flavours. It is high in protein than standard yogurt flavors with a national minimum of 35% protein.'),
(10, 'CHA PI', 10.00, 'Drink', 15, 300, 'Cha Pi is a top trending drink in China. The tea is mixed with fruit and tastes fresh and natural.');

INSERT INTO customer VALUES (1, 'Ed Sheeran',  'sheeran', 'a12345', 164567894, 'edsheeran@gmail.com');
INSERT INTO bill VALUES (1, 1, 5, 25, '2021-06-17 00:55:04'), (1, 2, 2, 10, '2021-05-17 12:05:04 '), (1, 3, 1, 6, '2021-06-15 17:55:04'), (1, 4, 8, 120, '2021-06-05 23:16:04 '), (1, 5, 3, 45, '2021-04-25 22:14:26');
	";

	mysqli_multi_query($conn, $sql);
?>