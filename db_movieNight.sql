use a5459_main;

DROP TABLE IF EXISTS `MOVIENIGHT`;

create table MOVIENIGHT(
  Letter char(1),
  Movie char(70) not null primary key
);

INSERT INTO `MOVIENIGHT` VALUES ('K','Knights of Badassdom'),('K','Kung Fury'),('E','Army of Darkness'),('S','Scott Pilgrim Vs. The World'),('P','Pitch Perfect'),('H','Hitchhiker\'s Guide To The Galaxy'),('O','Ocean\'s Eleven'),('N','Now You See Me'),('D','Deadpool'),('T','Tank Girl'),('M','Manic'),('F','50/50'),('R','Reservoir Dogs'),('I','Italian Job'),('O','Other Guys, The'),('B','Bunraku'),('J','Just Visiting'),('J','Jennifers Body'),('F','Fight Club'),('F','Feast'),('C','Constantine'),('Y','Yes Man'),('L','The Losers'),('E','Equilibrium'),('J','Jonah Hex'),('S','Stone Cold'),('S','Stretch'),('L','Let\'s Go to Prison'),('K','Kill Bill'),('H','Harold and Kumar'),('G','Grandma\'s Boy'),('P','The Princess Bride'),('U','Underworld'),('Z','Zorro, The Legend Of'),('X','X-Men'),('A','American Ultra'),('A','American Werewolf in Paris'),('Q','Queen of the Damned'),('Q','Quarantine'),('W','Walk Hard: Dewey Cox'),('W','Wallee'),('W','Wanted'),('R','Resident Evil'),('W','Watchmen'),('W','We Are The Best'),('W','We\'re the millers'),('W','weird science'),('W','Whip It!'),('W','Wreck-It Ralph'),('U','U-571'),('B','Blade'),('P','Pitch Black'),('R','Rocky Horror Picture Show'),('S','Sanctum'),('G','Get Smart'),('N','Nightmare Before Christmas'),('C','Catch Me If You Can'),('I','Ip Man'),('P','Pirates of the Carribeans'),('T','Tron'),('T','Two Girls One Cup'),('','Big Fish'),('v','v for vendetta'),('m','Me, Myself and Irene'),('Z','Zathura'),('Y','You, Me and Dupree'),('X','xXx: State if the Union'),('B','Blade Runner: Director\'s Cut'),('M','Machinist, The'),('F','Four Brothers'),('F','The Fugitive'),('G','Gangster Squad'),('H','Hall Pass'),('H','Hidalgo'),('I','Inglorious Bastards'),('J','John Wick'),('X','XXX'),('i','idiocracy'),('W','What We Do Is Secret'),('L','League of Extraordinary Gentlemen');

