create database if not exists guestbook;
use guestbook;

create table users
(
    id int primary key,
    username varchar(255) not null,
    password varchar(255) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table messages
(
    id int primary key,
    content varchar(65535) not null,
    from_id int not null,
    to_id int not null,
    main_id int null,
    FOREIGN KEY (from_id) REFERENCES users(id),
    FOREIGN KEY (to_id) REFERENCES users(id),
    FOREIGN KEY (main_id) REFERENCES messages(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;