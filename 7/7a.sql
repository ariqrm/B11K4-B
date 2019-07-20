-- bikin database
CREATE DATABASE `arkademy`;
-- tabel kategori
CREATE TABLE `Kategori` ( `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `salary` varchar(25) DEFAULT NULL );
-- tabel work
CREATE TABLE `Work` ( `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` varchar(25) DEFAULT NULL, `id_salary` int(11), FOREIGN KEY(`id_salary`) REFERENCES `Kategori`(`id`));
-- tabel Nama
CREATE TABLE `Nama` ( `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` varchar(25) DEFAULT NULL, `id_work` int(11), `id_salary` int(11),FOREIGN KEY(`id_work`) REFERENCES `Work`(`id`),FOREIGN KEY(`id_salary`) REFERENCES `Kategori`(`id`));
--input data
INSERT INTO `Kategori` VALUES(1, '10.000.000'),(2, '12.000.000');
INSERT INTO `Work` (`id`,`name`, `id_salary`) VALUES(1, 'Frontend Dev', 1),(2, 'Backend Dev', 2);
INSERT INTO `Nama` (`id`,`name`, `id_work`, `id_salary`) VALUES(1, 'Rebecca', 1, 1),(2, 'Vita', 2, 2);
-- query menghasilkan table poin 7.a

SELECT `N`.`name`,`H`.`name`AS `work`,`K`.`salary` AS `salary` FROM `Nama` AS `N` JOIN `Work` AS `H` ON `N`.`id_work`=`H`.`id` JOIN `Kategori` AS `K` ON `N`.`id_salary`=`K`.`id` ORDER BY `N`.`id`;

