

use test;

CREATE TABLE IF NOT EXISTS `delivery_addresses` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) DEFAULT NULL ,
  `name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `mobilphone` varchar(50) DEFAULT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



INSERT INTO `delivery_addresses` (`id`, `userid`,`name`, `address`, `postcode`, `city`,`mobilphone`) VALUES
(1, 1, 'imran','2259 w Rosemont ave ', '60607', 'Chicago', '7734568967'),
(2, 2, 'Ahmed','Skokie suburbs', '60607', 'Chicago', '7734568967'),
(3, 3, 'Fahad','Sacramento & Granvill', '60607', 'Chicago', '7734568967'),
(4, 4, 'Junaid','next to fahads place', '60607', 'Chicago', '7734568967');


CREATE TABLE IF NOT EXISTS `delivery_areas` (
  `id` int(11) NOT NULL auto_increment,
  `region` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `region` (`region`,`city`,`zip`)
) ;



INSERT INTO `delivery_areas` (`id`, `region`, `city`, `zip`) VALUES
(1, 'Illinois', 'Chicago', '60601'),
(2, 'Illinois', 'Chicago', '60602'),
(3, 'Illinois', 'Chicago', '60603'),
(4, 'Illinois', 'Chicago', '60604'),
(5, 'Illinois', 'Chicago', '60605'),
(6, 'Illinois', 'Chicago', '60606'),
(7, 'Illinois', 'Chicago', '60607'),
(8, 'Illinois', 'Chicago', '60608'),
(9, 'Illinois', 'Chicago', '60610'),
(10, 'Illinois', 'Chicago', '60611'),
(11, 'Illinois', 'Chicago', '60612'),
(12, 'Illinois', 'Chicago', '60616'),
(13, 'Illinois', 'Chicago', '60622'),
(14, 'Illinois', 'Chicago', '60642'),
(15, 'Illinois', 'Chicago', '60654'),
(16, 'Illinois', 'Chicago', '60661');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `menu` (
  `prodid` int(11) NOT NULL ,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`prodid`)
) ;

--

--

INSERT INTO `menu` (`prodid`, `name`, `type`, `price`, `size`,`image`) VALUES
(101, 'Turkey Ham', 'coldsubs',3.99, 'Medium','Images/Coffee/turkeyHam.jpg'),
(102, 'Turkey', 'coldsubs', 3.99, 'Medium','Images/Coffee/Terkey.jpg'),
(103, 'Veggie Sub', 'coldsubs', 3.99, 'Medium','Images/Coffee/veggie_sub.jpg'),
(104, 'Smoked Turkey', 'coldsubs', 4.99, 'Medium','Images/Coffee/smokedturkey.jpg'),
(105, 'Honey Turkey', 'coldsubs', 4.99, 'Medium', 'Images/Coffee/Terkey.jpg'),
(106, 'Ham & Turkey (combo)', 'coldsubs', 4.99, 'Medium', 'Images/Coffee/turkeyHam.jpg'),
(107, 'Roast Beef', 'coldsubs', 4.99, 'Medium','Images/Coffee/roast_beef.jpg'),
(108, 'Corn Beef', 'coldsubs', 4.99, 'Medium', 'Images/Coffee/smokedturkey.jpg'),
(109, 'Roast Beef & Corn Beef(combo)', 'coldsubs', 4.99, 'Medium', 'Images/Coffee/roast_beef.jpg'),
(110, 'Corn Beef on Rye', 'coldsubs', 4.99, 'Medium','Images/Coffee/CornBeefonRye.jpg'),
(111, 'Italian Beef', 'hotfood', 4.99, 'Medium','Images/Coffee/italian-beef.jpg'),
(112, 'Cheezy Beef', 'hotfood', 5.99, 'Medium', 'Images/Coffee/cheezybeef.jpg'),
(113, 'Hot Dog', 'hotfood', 2.19, 'Medium','Images/Coffee/hotdog.jpg'),
(114, 'Polish', 'hotfood', 3.19, 'Medium','Images/Coffee/polish.jpg'),
(115, 'Chicken Noodle Soup', 'soup&side', 2.79, 'Medium','Images/Coffee/broccoli_cheese_soup.jpg'),
(116, 'Nachoos', 'soup&side', 2.99, 'Medium','Images/Coffee/nachos.jpg'),
(117, 'Cookies', 'soup&side', 1.39, 'Medium','Images/Coffee/cookies.jpg'),
(118, 'Fountain Drinks', 'beverages',1.89, 'Medium','Images/Coffee/Fountain-Drinks.jpg'),
(119, 'Mineral Water Bottle', 'beverages', 1.49, 'Medium','Images/Coffee/water.jpg'),
(120, 'Coke(Bottle)', 'beverages', 2.49, 'Medium','Images/Coffee/coke-bottle.jpg'),
(121, 'RedBull', 'beverages', 2.99, 'Medium','Images/Coffee/redbull.jpg');



CREATE TABLE IF NOT EXISTS `order_details` (
  `orderid` int(11) NOT NULL auto_increment,
  `userid` int(11) DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `prodid` int(11) DEFAULT NULL,
  `qty` tinyint(3) DEFAULT NULL,
  `price` double(6,2) DEFAULT NULL,
  `extas_total` double(6,2) DEFAULT NULL,
  `subtotal` double(6,2)DEFAULT NULL,
  `paymenttype` varchar(50) DEFAULT NULL,
  PRIMARY KEY  (`orderid`),
  KEY `prodid` (`prodid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL auto_increment,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(32)DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobilphone` varchar(50) DEFAULT NULL,
  `regdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`userid`),
  KEY `email` (`email`,`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



INSERT INTO `users` (`userid`,`email`, `password`, `name`,`mobilphone`,`regdate`) VALUES
(1,'imran.mohammedcse@gmail.com', 'fawwaz@56', 'imran', '7734568967','2014-09-01 00:00:00'),
(2,'imran.mohdcse01@gmail.com.com', 'fawwaz@56', 'imran', '7734568967','2014-10-01 00:00:00');
