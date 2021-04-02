-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_type` enum('name','inn','description','director','address','phone_number') DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `user_id`, `company_id`, `company_type`, `text`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	NULL,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',	'2021-04-02 08:26:03',	'2021-04-02 08:26:03'),
(2,	1,	1,	'name',	'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritat',	'2021-04-02 08:26:16',	'2021-04-02 08:26:16'),
(3,	2,	1,	'name',	'ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quae',	'2021-04-02 08:26:45',	'2021-04-02 08:26:45'),
(4,	2,	1,	'description',	'ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quae',	'2021-04-02 08:26:48',	'2021-04-02 08:26:48'),
(5,	2,	2,	'name',	'ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quae',	'2021-04-02 08:26:56',	'2021-04-02 08:26:56'),
(6,	2,	2,	'description',	'voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem',	'2021-04-02 08:27:10',	'2021-04-02 08:27:10');

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `inn` varchar(12) NOT NULL,
  `director` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `companies` (`id`, `name`, `description`, `inn`, `director`, `address`, `phone_number`) VALUES
(1,	'СанВоенГрузоТренингЭкстрим',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit',	'453453453',	'sed do eiusmod tempor incididunt u',	'Ut enim ad minim veniam',	'+79001002030'),
(2,	'ГрузФармВелоУчеб',	'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',	'123123123143',	'Duis aute irure dolor',	'in reprehenderit in voluptate velit es',	'+79650505512'),
(3,	'КожВенЗооЭкскурсия',	'e cillum dolore eu fugiat nulla pariatur.',	'1231242357',	'Excepteur sint occaecat cupid',	'ntium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit',	'131241234'),
(4,	'ОборонЗдравТур',	' numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. ',	'1231235534',	'ratione voluptatem sequi nesciunt. Nequ',	'Ut enim ad minima veniam, quis nos',	'131241234'),
(5,	'exercitationem ullam corporis',	'suscipit laboriosam',	'12312312',	'ut aliquid ex ea commodi consequ',	'ut aliquid ex ea commodi consequ',	'+7123123424');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'$2y$10$qHf5uqTO21R2dZDvAvLaO.fc7oRJAFxgsHLXOEbkHQfTs1EjgExnO',	NULL,	'2021-03-31 16:12:30',	'2021-03-31 16:12:30'),
(2,	'user1',	'$2y$10$JhINIoBTAuDaxzC3ESkuoe4RgHkgVzxj8q6JJTXDOmN6NobGaizQS',	NULL,	'2021-03-31 16:36:23',	'2021-03-31 16:36:23');

-- 2021-04-02 08:35:36