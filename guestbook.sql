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
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (from_id) REFERENCES users(id),
    FOREIGN KEY (to_id) REFERENCES users(id),
    FOREIGN KEY (main_id) REFERENCES messages(id)
        ON DELETE SET NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER $$
CREATE  FUNCTION `check_login` (`uname` VARCHAR(255), `pass` VARCHAR(255)) RETURNS INT 
BEGIN
    RETURN (SELECT id FROM users WHERE uname = username AND pass = password);
end$$

CREATE PROCEDURE `regist_user` (IN `email` VARCHAR(255), IN `pw` VARCHAR(255), IN `fname` VARCHAR(255))  begin
if exists(select id from users where email=username) Then
BEGIN
    select 'Already exists';
END;
else
BEGIN
    insert into users (`username`, `password`, `fullname`)  values (email,pw,fname);
    select 'Done';
END;
END IF;
END$$
