create database if not exists guestbook;
use guestbook;

create table users
(
    id int  not null primary key AUTO_INCREMENT,
    username varchar(255) not null,
    password varchar(255) not null,
    fullname varchar(255) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table messages
(
     id int  not null primary key AUTO_INCREMENT,
    content varchar(65535) not null,
    from_id int not null,
    to_id int not null,
    main_id int null,
    FOREIGN KEY (from_id) REFERENCES users(id),
    FOREIGN KEY (to_id) REFERENCES users(id),
    FOREIGN KEY (main_id) REFERENCES messages(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DELIMITER $$
CREATE  FUNCTION `check_login` (`uname` VARCHAR(255), `pass` VARCHAR(255)) RETURNS INT 
BEGIN
    RETURN (SELECT id FROM users WHERE uname = username AND pass = password);
end$$