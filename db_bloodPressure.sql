use a5459_main;

DROP TABLE IF EXISTS `BLOODPRESSURE`;

create table BLOODPRESSURE(
    BPID int unsigned not null auto_increment primary key,
    systolic int unsigned not null,
    diastolic int unsigned not null,
    Submission DATE
);
