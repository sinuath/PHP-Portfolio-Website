use a5459_main;

DROP TABLE IF EXISTS `AUTOMOTIVE`;

create table AUTOMOTIVE(
    service char(10) not null primary key,
    Submission DATE
);

INSERT INTO `AUTOMOTIVE` VALUES ('oil','2016-08-05');

