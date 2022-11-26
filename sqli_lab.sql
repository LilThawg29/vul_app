drop database if exists vul_app;

create database vul_app;
use vul_app;

create table users (id int(3) auto_increment primary key, username varchar(255) not null, password varchar(255) not null);
insert into users (username, password) value("admin", "tryguessme");
insert into users (username, password) value("guest", "guest");
insert into users (username, password) value("thang", "123abcd456");

create table products (id int(3) auto_increment primary key, name varchar(255) not null, price int(6) not null,type varchar(255) not null);
insert into products (name, type, price) value("Thinkpad", "May tinh", 2300);
insert into products (name, type, price) value("Iphone", "Dien thoai", 2000);
insert into products (name, type, price) value("SamSung", "Dien thoai", 1500);