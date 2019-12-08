CREATE TABLE IF NOT EXISTS USERS(
    ID		    INT NOT NULL AUTO_INCREMENT,
	USERNAME 	varchar(20) UNIQUE NOT NULL,
	PASSWORD 	varchar(100) NOT NULL,
	NAME 		varchar(100) NOT NULL,
	EMAIL 		varchar(100) NULL,
	PHONE 		varchar(20) NULL,
	ADDRESS 	varchar(200) NULL,
    SEX		    bit,
	DoR		    date,
    PRIMARY KEY (ID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;