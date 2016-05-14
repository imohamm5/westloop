

use westdemo;

update menu set image='Images/Coffee/turkeyHam.jpg' where prodid=101;
update menu set image='Images/Coffee/Terkey.jpg' where prodid=102;
update menu set image='Images/Coffee/veggie_sub.jpg' where prodid=103;
update menu set image='Images/Coffee/smokedturkey.jpg' where prodid=104;
update menu set image='Images/Coffee/Terkey.jpg' where prodid=105;
update menu set image='Images/Coffee/turkeyHam.jpg' where prodid=106;
update menu set image='Images/Coffee/roast_beef.jpg' where prodid=107;
update menu set image='Images/Coffee/smokedturkey.jpg' where prodid=108;
update menu set image='Images/Coffee/roast_beef.jpg' where prodid=109;
update menu set image='Images/Coffee/CornBeefonRye.jpg' where prodid=110;
update menu set image='Images/Coffee/italian-beef.jpg' where prodid=111;
update menu set image='Images/Coffee/cheezybeef.jpg' where prodid=112;
update menu set image='Images/Coffee/hotdog.jpg' where prodid=113;
update menu set image='Images/Coffee/polish.jpg' where prodid=114;
update menu set image='Images/Coffee/broccoli_cheese_soup.jpg' where prodid=115;
update menu set image='Images/Coffee/nachos.jpg' where prodid=116;
update menu set image='Images/Coffee/cookies.jpg' where prodid=117;
update menu set image='Images/Coffee/Fountain-Drinks.jpg' where prodid=118;
update menu set image='Images/Coffee/water.jpg' where prodid=119;
update menu set image='Images/Coffee/coke-bottle.jpg' where prodid=120;
update menu set image='Images/Coffee/redbull.jpg' where prodid=121;

commit;

UPDATE `menu` SET `ServingSize` = '252', `Calories` = '370', `CalFromFat` = '80', `TotalFat` = '9', `SatFat` = '3.5', `Chol` = '40', `Sodium` = '950', `Carbohydrate` = '53' WHERE `menu`.`prodid` = 101;
UPDATE `menu` SET `ServingSize` = '252', `Calories` = '370', `CalFromFat` = '80', `TotalFat` = '9', `SatFat` = '3.5', `Chol` = '40', `Sodium` = '950', `Carbohydrate` = '53' WHERE `menu`.`prodid` = 102;
UPDATE `menu` SET `ServingSize` = '195', `Calories` = '230', `CalFromFat` = '60', `TotalFat` = '7', `SatFat` = '3.5', `Chol` = '15', `Sodium` = '430', `Carbohydrate` = '51' WHERE `menu`.`prodid` = 103;
UPDATE `menu` SET `ServingSize` = '252', `Calories` = '360', `CalFromFat` = '70', `TotalFat` = '8', `SatFat` = '3.5', `Chol` = '35', `Sodium` = '820', `Carbohydrate` = '53' WHERE `menu`.`prodid` = 104;
UPDATE `menu` SET `ServingSize` = '252', `Calories` = '360', `CalFromFat` = '70', `TotalFat` = '8', `SatFat` = '3.5', `Chol` = '35', `Sodium` = '820', `Carbohydrate` = '53' WHERE `menu`.`prodid` = 105;
UPDATE `menu` SET `ServingSize` = '252', `Calories` = '370', `CalFromFat` = '80', `TotalFat` = '9', `SatFat` = '3.5', `Chol` = '40', `Sodium` = '950', `Carbohydrate` = '53' WHERE `menu`.`prodid` = 106;
UPDATE `menu` SET `ServingSize` = '266', `Calories` = '400', `CalFromFat` = '80', `TotalFat` = '9.5', `SatFat` = '4', `Chol` = '60', `Sodium` = '810', `Carbohydrate` = '52' WHERE `menu`.`prodid` = 107;
UPDATE `menu` SET `ServingSize` = '266', `Calories` = '400', `CalFromFat` = '80', `TotalFat` = '9.5', `SatFat` = '4', `Chol` = '60', `Sodium` = '810', `Carbohydrate` = '52' WHERE `menu`.`prodid` = 108;
UPDATE `menu` SET `ServingSize` = '266', `Calories` = '400', `CalFromFat` = '80', `TotalFat` = '9.5', `SatFat` = '4', `Chol` = '60', `Sodium` = '810', `Carbohydrate` = '52' WHERE `menu`.`prodid` = 109;
UPDATE `menu` SET `ServingSize` = '266', `Calories` = '400', `CalFromFat` = '80', `TotalFat` = '9.5', `SatFat` = '4', `Chol` = '60', `Sodium` = '810', `Carbohydrate` = '52' WHERE `menu`.`prodid` = 110;
UPDATE `menu` SET `ServingSize` = '266', `Calories` = '400', `CalFromFat` = '80', `TotalFat` = '9.5', `SatFat` = '4', `Chol` = '60', `Sodium` = '810', `Carbohydrate` = '52' WHERE `menu`.`prodid` = 111;
UPDATE `menu` SET `ServingSize` = '266', `Calories` = '400', `CalFromFat` = '80', `TotalFat` = '9.5', `SatFat` = '4', `Chol` = '60', `Sodium` = '810', `Carbohydrate` = '52' WHERE `menu`.`prodid` = 112;
UPDATE `menu` SET `ServingSize` = '150', `Calories` = '120', `CalFromFat` = '20', `TotalFat` = '4', `SatFat` = '1.5', `Chol` = '15', `Sodium` = '220', `Carbohydrate` = '25' WHERE `menu`.`prodid` = 113;
UPDATE `menu` SET `ServingSize` = '150', `Calories` = '120', `CalFromFat` = '20', `TotalFat` = '4', `SatFat` = '1.5', `Chol` = '15', `Sodium` = '220', `Carbohydrate` = '25' WHERE `menu`.`prodid` = 114;
UPDATE `menu` SET `ServingSize` = '125', `Calories` = '100', `CalFromFat` = '20', `TotalFat` = '4', `SatFat` = '1.5', `Chol` = '15', `Sodium` = '120', `Carbohydrate` = '15' WHERE `menu`.`prodid` = 115;
UPDATE `menu` SET `ServingSize` = '100', `Calories` = '70', `CalFromFat` = '10', `TotalFat` = '3', `SatFat` = '1', `Chol` = '15', `Sodium` = '100', `Carbohydrate` = '20' WHERE `menu`.`prodid` = 116;
UPDATE `menu` SET `ServingSize` = '45', `Calories` = '200', `CalFromFat` = '90', `TotalFat` = '10', `SatFat` = '5', `Chol` = '15', `Sodium` = '130', `Carbohydrate` = '30' WHERE `menu`.`prodid` = 117;
UPDATE `menu` SET `ServingSize` = '21', `Calories` = '260', `CalFromFat` = '0', `TotalFat` = '0', `SatFat` = '0', `Chol` = '0', `Sodium` = '15', `Carbohydrate` = '71' WHERE `menu`.`prodid` = 118;
UPDATE `menu` SET `ServingSize` = '252', `Calories` = '360', `CalFromFat` = '70', `TotalFat` = '8', `SatFat` = '3.5', `Chol` = '35', `Sodium` = '820', `Carbohydrate` = '53' WHERE `menu`.`prodid` = 119;
UPDATE `menu` SET `ServingSize` = '21', `Calories` = '260', `CalFromFat` = '0', `TotalFat` = '0', `SatFat` = '0', `Chol` = '0', `Sodium` = '15', `Carbohydrate` = '71' WHERE `menu`.`prodid` = 120;
UPDATE `menu` SET `ServingSize` = '21', `Calories` = '360', `CalFromFat` = '0', `TotalFat` = '0', `SatFat` = '0', `Chol` = '0', `Sodium` = '35', `Carbohydrate` = '100' WHERE `menu`.`prodid` =121;