create database ideacomp;

use ideacomp;

create table ideaTypes
(
	ideaTypeID int auto_increment primary key,
    ideaTypeName varchar(30) not null unique
);

create table ideas
(
	ideaID varchar(5) not null primary key,
    ideaName varchar(50) not null,
    ideaContent varchar(3000) null,
    ideaFile varchar(30) null,
    ideaTypeID int not null,
    constraint foreign key (ideaTypeID) references ideaTypes(ideaTypeID)
);

create table comments
(
	commentID varchar(30) not null primary key,
    commentName varchar(50) not null,
    commentDetails varchar(100) not null,
    userID varchar(30) not null,
    constraint foreign key (userID) references users(userID)
);

create table admins
(
	adminID varchar(30) not null primary key,
    adminName varchar(50) not null,
    adminPhone varchar(12) null,
    adminEmail varchar(100) null
);

-- insert data
insert into ideaTypes(ideaTypeName) values
('Questionnaire'), ('Problem'), ('Learning'), ('Other');

select * from ideaTypes;

SELECT * from ideas;

insert into ideas(ideaID, ideaName, ideaContent, ideaFile, ideaTypeID) values
('0001', 'How many chapters', 'How many chapters in Doreamon?', '', '1'),
('0002', 'Fix a bug', 'Bug fixes','', '2'),
('0003', 'Need', 'I need help', '', '2');