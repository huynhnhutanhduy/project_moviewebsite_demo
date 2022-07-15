CREATE TABLE `aecaychuoi`.`admin` ( 
    `username` VARCHAR(50) NOT NULL , 
    `password` VARCHAR(32) NOT NULL , 
    PRIMARY KEY (`username`)
) ENGINE = InnoDB;

INSERT INTO `admin` (`username`, `password`) VALUES ('aecaychuoi', 'aecaychuoi');