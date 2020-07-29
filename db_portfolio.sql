use a5459_main;

DROP TABLE IF EXISTS `Portfolio`;
DROP TABLE IF EXISTS `PortfolioPictures`;
DROP TABLE IF EXISTS `PortfolioCategories`;
DROP TABLE IF EXISTS `PortfolioLinks`;

create table Portfolio(
    PortID int unsigned not null auto_increment primary key,
    Title char(60) not null,
    ShortDescription char(220) not null,
    Description TEXT not null
);

create table PortfolioPictures(
    PortID int unsigned not null primary key,
    PictureURL char(100) not null
);

create table PortfolioCategories(
    PortCatID int unsigned not null auto_increment primary key,
    PortID int unsigned not null,
    Category char(50) not null
);

create table PortfolioLinks(
    PortLinkID int unsigned not null auto_increment primary key,
    PortID int unsigned not null,
    URLName char(40) not null,
    URL char(120) not null
);



INSERT INTO `Portfolio` VALUES (NULL, 'Funions', 'Developed for the hungry', 'Originally developed to combat hunger in people who do not like chips');

