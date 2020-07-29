use a5459_main;

DROP TABLE IF EXISTS `USERTABLE`;

create table USERTABLE(
  Username char(16) not null primary key,
  Password char(40) not null,
  IsAdmin bool,
  Llogin DATE
);

INSERT INTO `USERTABLE` VALUES 
            ('username Goes Here', 'Password Goes Here', True, '2016-12-15');

