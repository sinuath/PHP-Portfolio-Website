use a5459_main;

DROP TABLE IF EXISTS `MEDIALIBRARY`;

create table MEDIALIBRARY(
    media char(26) not null primary key,
    Submission DATE
);

INSERT INTO `MEDIALIBRARY` VALUES ('oil','2016-08-05');

