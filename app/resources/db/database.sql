create database vulc_bascov;
use vulc_bascov;


create table contacts (
	id int(6) unsigned auto_increment primary key,
    c_name varchar(30) not null,
    c_phone varchar(30) not null
);

create table info (
	id int(6) unsigned auto_increment primary key,
    i_text text,
    i_date varchar(50)	
);

create table article (
	id int(6) unsigned auto_increment primary key,
    a_title varchar(50),
    a_text text,
    a_date varchar(50),
    a_image longblob
);

