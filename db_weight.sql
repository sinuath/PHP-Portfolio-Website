use a5459_main;

DROP TABLE IF EXISTS `WEIGHT`;

create table WEIGHT(
    WEIGHTID int unsigned not null auto_increment primary key,
    weight int unsigned not null,
    Submission DATE
);


INSERT INTO `WEIGHT` VALUES (1,284,NULL),(3,288,'2016-08-02'),(4,286,'2016-08-03'),(5,287,'2016-08-08'),(6,284,'2016-08-13');

