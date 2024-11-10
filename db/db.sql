-- create database
create database inotebook;

use inotebook;

create table signup
(
    roll_no int auto_increment primary key,
    name varchar(50),
    email varchar(25),
    phone int ,
    password varchar(25)
);

create table notes 
(
    heading varchar(125),
    description varchar(3000),
    tag varchar(75)
);

