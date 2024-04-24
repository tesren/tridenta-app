-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 24-04-2024 a las 22:49:41
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tridenta-app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `action_events`
--

CREATE TABLE `action_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionable_id` bigint(20) UNSIGNED NOT NULL,
  `target_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fields` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'running',
  `exception` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `original` mediumtext COLLATE utf8mb4_unicode_ci,
  `changes` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `action_events`
--

INSERT INTO `action_events` (`id`, `batch_id`, `user_id`, `name`, `actionable_type`, `actionable_id`, `target_type`, `target_id`, `model_type`, `model_id`, `fields`, `status`, `exception`, `created_at`, `updated_at`, `original`, `changes`) VALUES
(1, '9bc8c01b-90c2-4647-8010-d689f455e665', 1, 'Create', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-11 19:53:07', '2024-04-11 19:53:07', NULL, '{\"name\":\"Erick Cliente\",\"email\":\"erickalejandropm117@gmail.com\",\"agent_id\":1,\"updated_at\":\"2024-04-11T19:53:07.000000Z\",\"created_at\":\"2024-04-11T19:53:07.000000Z\",\"id\":2}'),
(2, '9bc8d995-6967-48a2-a76c-be4ca4447aa7', 1, 'Update', 'App\\Models\\User', 1, 'App\\Models\\User', 1, 'App\\Models\\User', 1, '', 'finished', '', '2024-04-11 21:04:22', '2024-04-11 21:04:22', '{\"role\":\"realtor\"}', '{\"role\":\"superadmin\"}'),
(3, '9bc8d9a2-3d70-45cf-8258-ddbba31cc9f4', 1, 'Update', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-11 21:04:30', '2024-04-11 21:04:30', '{\"role\":\"realtor\",\"agent_id\":1}', '{\"role\":\"client\",\"agent_id\":null}'),
(4, '9bc8da89-3e9d-4ba7-9f4b-2250c588f7df', 1, 'Create', 'App\\Models\\User', 3, 'App\\Models\\User', 3, 'App\\Models\\User', 3, '', 'finished', '', '2024-04-11 21:07:01', '2024-04-11 21:07:01', NULL, '{\"name\":\"Efra\\u00edn Valencia\",\"email\":\"efrain@domusvallarta.com\",\"role\":\"agent\",\"agent_id\":null,\"updated_at\":\"2024-04-11T21:07:01.000000Z\",\"created_at\":\"2024-04-11T21:07:01.000000Z\",\"id\":3}'),
(5, '9bc8dd65-ba6c-4fd2-a1df-db6b89146b26', 1, 'Update', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-11 21:15:01', '2024-04-11 21:15:01', '{\"agent_id\":null}', '{\"agent_id\":\"3\"}'),
(6, '9bca9441-b3c0-4015-9390-4df2cb7d6a3d', 1, 'Create', 'App\\Models\\Tower', 1, 'App\\Models\\Tower', 1, 'App\\Models\\Tower', 1, '', 'finished', '', '2024-04-12 17:42:10', '2024-04-12 17:42:10', NULL, '{\"name\":\"A\",\"updated_at\":\"2024-04-12T17:42:10.000000Z\",\"created_at\":\"2024-04-12T17:42:10.000000Z\",\"id\":1}'),
(7, '9bcab321-4d83-4e79-80f2-a3927793de18', 1, 'Create', 'App\\Models\\User', 4, 'App\\Models\\User', 4, 'App\\Models\\User', 4, '', 'finished', '', '2024-04-12 19:08:30', '2024-04-12 19:08:30', NULL, '{\"name\":\"Wendy Arce\",\"email\":\"wendy@punto401.com\",\"phone\":null,\"lang\":\"es\",\"country_code\":\"MX\",\"role\":\"admin\",\"updated_at\":\"2024-04-12T19:08:30.000000Z\",\"created_at\":\"2024-04-12T19:08:30.000000Z\",\"id\":4}'),
(8, '9bcab357-019a-4615-a106-cc40dbe73915', 1, 'Create', 'App\\Models\\User', 5, 'App\\Models\\User', 5, 'App\\Models\\User', 5, '', 'finished', '', '2024-04-12 19:09:05', '2024-04-12 19:09:05', NULL, '{\"name\":\"Daniel Michelena\",\"email\":\"michelena@punto401.com\",\"phone\":null,\"lang\":\"es\",\"country_code\":\"MX\",\"role\":\"admin\",\"updated_at\":\"2024-04-12T19:09:05.000000Z\",\"created_at\":\"2024-04-12T19:09:05.000000Z\",\"id\":5}'),
(9, '9bcab39b-8d32-48f1-a71b-6198bf4f5ddc', 1, 'Create', 'App\\Models\\User', 6, 'App\\Models\\User', 6, 'App\\Models\\User', 6, '', 'finished', '', '2024-04-12 19:09:50', '2024-04-12 19:09:50', NULL, '{\"name\":\"Glenda Olgu\\u00edn\",\"email\":\"glenda@punto401.com\",\"phone\":null,\"lang\":\"es\",\"country_code\":\"MX\",\"role\":\"admin\",\"updated_at\":\"2024-04-12T19:09:50.000000Z\",\"created_at\":\"2024-04-12T19:09:50.000000Z\",\"id\":6}'),
(10, '9bcab3e9-753f-4639-ac49-83c462e233b7', 1, 'Create', 'App\\Models\\User', 7, 'App\\Models\\User', 7, 'App\\Models\\User', 7, '', 'finished', '', '2024-04-12 19:10:41', '2024-04-12 19:10:41', NULL, '{\"name\":\"Javier Ortega\",\"email\":\"javier@punto401.com\",\"phone\":null,\"lang\":\"es\",\"country_code\":\"MX\",\"role\":\"admin\",\"updated_at\":\"2024-04-12T19:10:41.000000Z\",\"created_at\":\"2024-04-12T19:10:41.000000Z\",\"id\":7}'),
(11, '9bcab42b-d88e-4b04-8d73-23715e886692', 1, 'Create', 'App\\Models\\User', 8, 'App\\Models\\User', 8, 'App\\Models\\User', 8, '', 'finished', '', '2024-04-12 19:11:24', '2024-04-12 19:11:24', NULL, '{\"name\":\"Tania Ramos\",\"email\":\"tania@punto401.com\",\"phone\":null,\"lang\":\"es\",\"country_code\":\"MX\",\"role\":\"admin\",\"updated_at\":\"2024-04-12T19:11:24.000000Z\",\"created_at\":\"2024-04-12T19:11:24.000000Z\",\"id\":8}'),
(12, '9bcab48a-eeb5-466f-a714-4a516c982004', 1, 'Create', 'App\\Models\\User', 9, 'App\\Models\\User', 9, 'App\\Models\\User', 9, '', 'finished', '', '2024-04-12 19:12:27', '2024-04-12 19:12:27', NULL, '{\"name\":\"Raul Flores\",\"email\":\"raul@punto401.com\",\"phone\":null,\"lang\":\"es\",\"country_code\":\"MX\",\"role\":\"admin\",\"updated_at\":\"2024-04-12T19:12:27.000000Z\",\"created_at\":\"2024-04-12T19:12:27.000000Z\",\"id\":9}'),
(13, '9bcab4c1-d608-424d-bc34-6c1a8edd170f', 1, 'Create', 'App\\Models\\User', 10, 'App\\Models\\User', 10, 'App\\Models\\User', 10, '', 'finished', '', '2024-04-12 19:13:03', '2024-04-12 19:13:03', NULL, '{\"name\":\"Tania Vizcaino\",\"email\":\"viztani@punto401.com\",\"phone\":null,\"lang\":\"es\",\"country_code\":\"MX\",\"role\":\"admin\",\"updated_at\":\"2024-04-12T19:13:03.000000Z\",\"created_at\":\"2024-04-12T19:13:03.000000Z\",\"id\":10}'),
(14, '9bcab5ef-0a13-46ff-b60d-0f36cda59982', 1, 'Create', 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, '', 'finished', '', '2024-04-12 19:16:20', '2024-04-12 19:16:20', NULL, '{\"name\":\"Tipo 1\",\"bedrooms\":\"3\",\"flexrooms\":null,\"bathrooms\":\"4\",\"interior_const\":\"146.90\",\"exterior_const\":\"23.20\",\"parking_area\":null,\"storage_area\":null,\"const_total\":\"170.1\",\"updated_at\":\"2024-04-12T19:16:20.000000Z\",\"created_at\":\"2024-04-12T19:16:20.000000Z\",\"id\":1}'),
(15, '9bcabad8-d3d7-43d1-8165-df2383ec65fb', 1, 'Create', 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, '', 'finished', '', '2024-04-12 19:30:04', '2024-04-12 19:30:04', NULL, '{\"name\":\"101\",\"unit_type_id\":1,\"tower_id\":1,\"section_id\":null,\"floor\":\"1\",\"price\":\"9000000\",\"currency\":\"MXN\",\"status\":\"Disponible\",\"updated_at\":\"2024-04-12T19:30:04.000000Z\",\"created_at\":\"2024-04-12T19:30:04.000000Z\",\"id\":1}'),
(16, '9bcac2ca-e9d2-4c2c-81bf-76de2f035d40', 1, 'Update', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-12 19:52:17', '2024-04-12 19:52:17', '{\"lang\":\"\"}', '{\"lang\":\"es\"}'),
(17, '9bcb0327-8131-40a7-bc1d-3308514942ce', 1, 'Update', 'App\\Models\\User', 3, 'App\\Models\\User', 3, 'App\\Models\\User', 3, '', 'finished', '', '2024-04-12 22:52:15', '2024-04-12 22:52:15', '{\"lang\":\"\"}', '{\"lang\":\"es\"}'),
(18, '9bd8f9a1-6046-4fd0-add8-351c3d65ea0a', 1, 'Update', 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, '', 'finished', '', '2024-04-19 21:27:13', '2024-04-19 21:27:13', '[]', '[]'),
(19, '9bde9e84-725b-4981-aeee-995f381ccab3', 1, 'Create', 'App\\Models\\PaymentPlan', 1, 'App\\Models\\PaymentPlan', 1, 'App\\Models\\PaymentPlan', 1, '', 'finished', '', '2024-04-22 16:47:25', '2024-04-22 16:47:25', NULL, '{\"name\":\"Prueba\",\"name_en\":\"Test\",\"discount\":\"10\",\"down_payment\":\"30\",\"second_payment\":null,\"months_percent\":\"30\",\"closing_payment\":\"40\",\"updated_at\":\"2024-04-22T16:47:25.000000Z\",\"created_at\":\"2024-04-22T16:47:25.000000Z\",\"id\":1}'),
(20, '9bdeb4fa-25d9-4cba-ae65-4876d98deabd', 1, 'Update', 'App\\Models\\PaymentPlan', 1, 'App\\Models\\PaymentPlan', 1, 'App\\Models\\PaymentPlan', 1, '', 'finished', '', '2024-04-22 17:50:13', '2024-04-22 17:50:13', '{\"down_payment\":30,\"second_payment\":null}', '{\"down_payment\":\"20\",\"second_payment\":\"10\"}'),
(21, '9be09c70-277b-4106-8573-2ca098e30ee8', 1, 'Update', 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, '', 'finished', '', '2024-04-23 16:33:15', '2024-04-23 16:33:15', '[]', '[]'),
(22, '9be0d8ee-5da7-4dc9-afce-0f6da6e5bd20', 1, 'Update', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-23 19:22:24', '2024-04-23 19:22:24', '{\"country_code\":null}', '{\"country_code\":\"US\"}'),
(23, '9be0d8fd-71d7-437d-be5a-d2e466a7ca7f', 1, 'Update', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-23 19:22:34', '2024-04-23 19:22:34', '{\"country_code\":\"US\"}', '{\"country_code\":\"CA\"}'),
(24, '9be0dab6-a2be-4ba0-9792-47fca7598cfe', 1, 'Update', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-23 19:27:23', '2024-04-23 19:27:23', '[]', '[]'),
(25, '9be0dfb3-1223-45ea-bf8e-4d475bb058d2', 1, 'Create', 'App\\Models\\User', 11, 'App\\Models\\User', 11, 'App\\Models\\User', 11, '', 'finished', '', '2024-04-23 19:41:20', '2024-04-23 19:41:20', NULL, '{\"name\":\"Erick\",\"email\":\"erickalejandro@gmail.com\",\"phone\":null,\"lang\":\"es\",\"country_code\":\"MX\",\"role\":\"client\",\"agent_id\":\"3\",\"updated_at\":\"2024-04-23T19:41:20.000000Z\",\"created_at\":\"2024-04-23T19:41:20.000000Z\",\"id\":11}'),
(27, '9be105e0-f6ab-464f-8523-76add36a87bd', 1, 'Enviar datos de acceso', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'a:0:{}', 'finished', '', '2024-04-23 21:28:05', '2024-04-23 21:28:11', NULL, NULL),
(28, '9be10953-493e-4526-8e7d-6004fc7f50fa', 1, 'Update', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-23 21:37:44', '2024-04-23 21:37:44', '{\"email\":\"erickalejandropm117@gmail.com\"}', '{\"email\":\"tesren@live.com.mx\"}'),
(29, '9be10965-7980-49e4-a3c2-909abc32aa8c', 1, 'Enviar datos de acceso', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'a:0:{}', 'finished', '', '2024-04-23 21:37:55', '2024-04-23 21:38:01', NULL, NULL),
(30, '9be112c2-ee9f-474e-9543-2d153285bcdf', 1, 'Enviar datos de acceso', 'App\\Models\\User', 1, 'App\\Models\\User', 1, 'App\\Models\\User', 1, 'a:0:{}', 'finished', '', '2024-04-23 22:04:07', '2024-04-23 22:04:07', NULL, NULL),
(31, '9be11314-0b08-43fe-869a-14841a8ed0e3', 1, 'Enviar datos de acceso', 'App\\Models\\User', 1, 'App\\Models\\User', 1, 'App\\Models\\User', 1, 'a:0:{}', 'finished', '', '2024-04-23 22:05:00', '2024-04-23 22:05:00', NULL, NULL),
(32, '9be113bf-021d-46d8-b0c5-23d97c9272fc', 1, 'Enviar datos de acceso', 'App\\Models\\User', 1, 'App\\Models\\User', 1, 'App\\Models\\User', 1, 'a:0:{}', 'finished', '', '2024-04-23 22:06:52', '2024-04-23 22:06:52', NULL, NULL),
(33, '9be2a2c8-f2e3-4ecc-8430-b4e62d0263e1', 1, 'Update', 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, '', 'finished', '', '2024-04-24 16:42:39', '2024-04-24 16:42:39', '{\"name\":\"Tipo 1\",\"interior_const\":146.9,\"exterior_const\":23.2,\"const_total\":170.1}', '{\"name\":\"1\",\"interior_const\":\"145.71\",\"exterior_const\":\"21.69\",\"const_total\":\"167.40\"}'),
(34, '9be2aa6a-0c9b-4d8b-9f12-fba75dc9f9fc', 1, 'Create', 'App\\Models\\UnitType', 2, 'App\\Models\\UnitType', 2, 'App\\Models\\UnitType', 2, '', 'finished', '', '2024-04-24 17:03:59', '2024-04-24 17:03:59', NULL, '{\"name\":\"2\",\"bedrooms\":\"3\",\"flexrooms\":null,\"bathrooms\":\"4\",\"interior_const\":\"148.18\",\"exterior_const\":\"27.70\",\"parking_area\":null,\"storage_area\":null,\"const_total\":\"175.88\",\"updated_at\":\"2024-04-24T17:03:59.000000Z\",\"created_at\":\"2024-04-24T17:03:59.000000Z\",\"id\":2}'),
(35, '9be2aaaf-f795-47b8-8e38-4b22c3ec48f9', 1, 'Create', 'App\\Models\\UnitType', 3, 'App\\Models\\UnitType', 3, 'App\\Models\\UnitType', 3, '', 'finished', '', '2024-04-24 17:04:45', '2024-04-24 17:04:45', NULL, '{\"name\":\"3\",\"bedrooms\":\"2\",\"flexrooms\":null,\"bathrooms\":\"3\",\"interior_const\":\"89.72\",\"exterior_const\":\"12.88\",\"parking_area\":null,\"storage_area\":null,\"const_total\":\"102.6\",\"updated_at\":\"2024-04-24T17:04:45.000000Z\",\"created_at\":\"2024-04-24T17:04:45.000000Z\",\"id\":3}'),
(36, '9be2aad9-ee2a-4b20-806c-df216d1c031d', 1, 'Create', 'App\\Models\\UnitType', 4, 'App\\Models\\UnitType', 4, 'App\\Models\\UnitType', 4, '', 'finished', '', '2024-04-24 17:05:13', '2024-04-24 17:05:13', NULL, '{\"name\":\"4\",\"bedrooms\":\"2\",\"flexrooms\":null,\"bathrooms\":\"3\",\"interior_const\":\"94.18\",\"exterior_const\":\"12.65\",\"parking_area\":null,\"storage_area\":null,\"const_total\":\"106.83\",\"updated_at\":\"2024-04-24T17:05:13.000000Z\",\"created_at\":\"2024-04-24T17:05:13.000000Z\",\"id\":4}'),
(37, '9be2abfa-a565-4ab0-9ea4-02613069f87b', 1, 'Create', 'App\\Models\\UnitType', 5, 'App\\Models\\UnitType', 5, 'App\\Models\\UnitType', 5, '', 'finished', '', '2024-04-24 17:08:22', '2024-04-24 17:08:22', NULL, '{\"name\":\"5\",\"bedrooms\":\"0\",\"flexrooms\":null,\"bathrooms\":\"1\",\"interior_const\":\"46.24\",\"exterior_const\":\"4.73\",\"parking_area\":null,\"storage_area\":null,\"const_total\":\"50.97\",\"updated_at\":\"2024-04-24T17:08:22.000000Z\",\"created_at\":\"2024-04-24T17:08:22.000000Z\",\"id\":5}'),
(38, '9be2ac2c-d105-4a7f-bee2-f393f3412be6', 1, 'Create', 'App\\Models\\UnitType', 6, 'App\\Models\\UnitType', 6, 'App\\Models\\UnitType', 6, '', 'finished', '', '2024-04-24 17:08:55', '2024-04-24 17:08:55', NULL, '{\"name\":\"6\",\"bedrooms\":\"1\",\"flexrooms\":null,\"bathrooms\":\"2\",\"interior_const\":\"54.72\",\"exterior_const\":\"12.23\",\"parking_area\":null,\"storage_area\":null,\"const_total\":\"66.95\",\"updated_at\":\"2024-04-24T17:08:55.000000Z\",\"created_at\":\"2024-04-24T17:08:55.000000Z\",\"id\":6}'),
(39, '9be2ae90-b9f7-462c-b29d-5c6e24d40972', 1, 'Update', 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, '', 'finished', '', '2024-04-24 17:15:36', '2024-04-24 17:15:36', '[]', '[]'),
(40, '9be2aeb1-27e0-41ed-b482-2a98057c8dc9', 1, 'Update', 'App\\Models\\UnitType', 2, 'App\\Models\\UnitType', 2, 'App\\Models\\UnitType', 2, '', 'finished', '', '2024-04-24 17:15:57', '2024-04-24 17:15:57', '[]', '[]'),
(41, '9be2aec0-be79-4252-992d-470eaf33ffd5', 1, 'Update', 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, '', 'finished', '', '2024-04-24 17:16:07', '2024-04-24 17:16:07', '[]', '[]'),
(42, '9be2af35-5550-4720-850f-8c134d7f4297', 1, 'Update', 'App\\Models\\UnitType', 3, 'App\\Models\\UnitType', 3, 'App\\Models\\UnitType', 3, '', 'finished', '', '2024-04-24 17:17:24', '2024-04-24 17:17:24', '[]', '[]'),
(43, '9be2af4d-3a91-4229-a2f7-7dd1801bfc5f', 1, 'Update', 'App\\Models\\UnitType', 4, 'App\\Models\\UnitType', 4, 'App\\Models\\UnitType', 4, '', 'finished', '', '2024-04-24 17:17:39', '2024-04-24 17:17:39', '[]', '[]'),
(44, '9be2af7b-29d9-4468-b8ad-b11104baf475', 1, 'Update', 'App\\Models\\UnitType', 5, 'App\\Models\\UnitType', 5, 'App\\Models\\UnitType', 5, '', 'finished', '', '2024-04-24 17:18:09', '2024-04-24 17:18:09', '[]', '[]'),
(45, '9be2af90-c139-4872-8fd1-683f9dd8d896', 1, 'Update', 'App\\Models\\UnitType', 6, 'App\\Models\\UnitType', 6, 'App\\Models\\UnitType', 6, '', 'finished', '', '2024-04-24 17:18:24', '2024-04-24 17:18:24', '[]', '[]'),
(46, '9be2b54b-d261-4b28-a614-e589558e8e79', 1, 'Update', 'App\\Models\\User', 2, 'App\\Models\\User', 2, 'App\\Models\\User', 2, '', 'finished', '', '2024-04-24 17:34:25', '2024-04-24 17:34:25', '{\"notes\":null}', '{\"notes\":\"Probando\"}'),
(47, '9be2c1c9-dc2e-480f-8625-a4c21ba0514d', 1, 'Create', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:09:21', '2024-04-24 18:09:21', NULL, '{\"name\":\"Torre E\",\"points\":\"513.15 1365.85 902.51 1365.89 910.68 989.22 509.78 989.22 513.15 1365.85\",\"text_x\":\"0\",\"text_y\":\"0\",\"updated_at\":\"2024-04-24T18:09:21.000000Z\",\"created_at\":\"2024-04-24T18:09:21.000000Z\",\"id\":1}'),
(48, '9be2c2a2-bfa2-4d83-b197-6f47b89ff07e', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:11:43', '2024-04-24 18:11:43', '{\"text_x\":0,\"text_y\":0}', '{\"text_x\":\"406\",\"text_y\":\"1426\"}'),
(49, '9be2c31a-601f-4fee-b67d-734d64283aec', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:13:02', '2024-04-24 18:13:02', '{\"points\":\"513.15 1365.85 902.51 1365.89 910.68 989.22 509.78 989.22 513.15 1365.85\"}', '{\"points\":\"513.15,1365.85 902.51,1365.89 910.68,989.22 509.78,989.22 513.15,1365.85\"}'),
(50, '9be2c394-3328-4504-8aa8-5064216a07de', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:14:21', '2024-04-24 18:14:21', '{\"text_x\":406,\"text_y\":1426}', '{\"text_x\":\"1426\",\"text_y\":\"406\"}'),
(51, '9be2c6b7-be6b-4fb4-a4ea-10edb332afb9', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:23:08', '2024-04-24 18:23:08', '{\"points\":\"513.15,1365.85 902.51,1365.89 910.68,989.22 509.78,989.22 513.15,1365.85\",\"text_x\":1426,\"text_y\":406}', '{\"points\":\"1137.91 1694.37 1139.19 1560.44 749.83 1560.41 237.68 1564.17 237.68 1694.37 1137.91 1694.37\",\"text_x\":\"643\",\"text_y\":\"1621\"}'),
(52, '9be2ca5d-860d-47d7-a76a-7f22240792b2', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:33:20', '2024-04-24 18:33:20', '[]', '[]'),
(53, '9be2ca62-6198-4687-8d1a-92c9577776cd', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:33:23', '2024-04-24 18:33:23', '[]', '[]'),
(54, '9be2caa0-6fce-4392-923a-e6a62db1ec5a', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:34:04', '2024-04-24 18:34:04', '{\"text_y\":1621}', '{\"text_y\":\"1631\"}'),
(55, '9be2cb80-8d9d-4120-b2eb-bdd4d4848165', 1, 'Create', 'App\\Models\\Section', 2, 'App\\Models\\Section', 2, 'App\\Models\\Section', 2, '', 'finished', '', '2024-04-24 18:36:31', '2024-04-24 18:36:31', NULL, '{\"name\":\"A\",\"subtitle\":\"1 - 7\",\"points\":\"749.83 1560.41 1139.19 1560.44 1147.36 1183.78 746.46 1183.78 749.83 1560.41\",\"text_x\":\"909\",\"text_y\":\"1340\",\"updated_at\":\"2024-04-24T18:36:31.000000Z\",\"created_at\":\"2024-04-24T18:36:31.000000Z\",\"id\":2}'),
(56, '9be2cbf9-6234-45ae-a88a-9622f3e83358', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:37:50', '2024-04-24 18:37:50', '{\"name\":\"Torre E\"}', '{\"name\":\"E\"}'),
(57, '9be2cc15-cbf0-4b6b-987e-11f5960b7b7c', 1, 'Update', 'App\\Models\\Section', 2, 'App\\Models\\Section', 2, 'App\\Models\\Section', 2, '', 'finished', '', '2024-04-24 18:38:08', '2024-04-24 18:38:08', '{\"text_x\":909}', '{\"text_x\":\"890\"}'),
(58, '9be2cc50-1817-4559-b049-3ed13f243ec1', 1, 'Update', 'App\\Models\\Section', 2, 'App\\Models\\Section', 2, 'App\\Models\\Section', 2, '', 'finished', '', '2024-04-24 18:38:47', '2024-04-24 18:38:47', '{\"text_x\":890}', '{\"text_x\":\"855\"}'),
(59, '9be2cddc-beed-4286-bef3-2fbda6a2098e', 1, 'Create', 'App\\Models\\Section', 3, 'App\\Models\\Section', 3, 'App\\Models\\Section', 3, '', 'finished', '', '2024-04-24 18:43:07', '2024-04-24 18:43:07', NULL, '{\"name\":\"A\",\"subtitle\":\"8-16\",\"points\":\"1147.36 1183.78 1152.14 695.75 751.5 695.75 746.46 1183.78 1147.36 1183.78\",\"text_x\":\"909\",\"text_y\":\"918\",\"updated_at\":\"2024-04-24T18:43:07.000000Z\",\"created_at\":\"2024-04-24T18:43:07.000000Z\",\"id\":3}'),
(60, '9be2cdfb-0a36-4426-91ba-8475edaadc8a', 1, 'Update', 'App\\Models\\Section', 3, 'App\\Models\\Section', 3, 'App\\Models\\Section', 3, '', 'finished', '', '2024-04-24 18:43:26', '2024-04-24 18:43:26', '{\"text_x\":909}', '{\"text_x\":\"855\"}'),
(61, '9be2ce63-63e4-4358-93b0-eec0e1f8d3b6', 1, 'Create', 'App\\Models\\Section', 4, 'App\\Models\\Section', 4, 'App\\Models\\Section', 4, '', 'finished', '', '2024-04-24 18:44:35', '2024-04-24 18:44:35', NULL, '{\"name\":\"A\",\"subtitle\":\"17-25\",\"points\":\"1152.14 695.75 751.5 695.75 748.17 195.56 1160.93 197.71 1152.14 695.75\",\"text_x\":\"855\",\"text_y\":\"380\",\"updated_at\":\"2024-04-24T18:44:35.000000Z\",\"created_at\":\"2024-04-24T18:44:35.000000Z\",\"id\":4}'),
(62, '9be2cfd5-2686-436d-8d94-5ce2bec696af', 1, 'Create', 'App\\Models\\Section', 5, 'App\\Models\\Section', 5, 'App\\Models\\Section', 5, '', 'finished', '', '2024-04-24 18:48:37', '2024-04-24 18:48:37', NULL, '{\"name\":\"B\",\"subtitle\":\"1-7\",\"points\":\"748.78 1442.91 685.43 1442.91 685.43 1425.22 631.88 1425.22 631.88 1399.96 583.88 1399.96 583.88 1379.75 537.4 1379.75 537.4 1352.47 488.9 1352.47 488.9 1332.77 455.55 1332.77 452.52 1076.11 496.48 1076.11 496.48 1087.23 537.4 1087.23 537.4 1097.84 583.38 1097.84 583.38 1109.46 627.33 1109.46 627.33 1120.57 683.92 1120.57 683.92 1132.7 746.46 1132.7 748.78 1442.91\",\"text_x\":\"552\",\"text_y\":\"1216\",\"updated_at\":\"2024-04-24T18:48:37.000000Z\",\"created_at\":\"2024-04-24T18:48:37.000000Z\",\"id\":5}'),
(63, '9be2cfef-a504-480c-bb58-24dfc4fd4ab8', 1, 'Update', 'App\\Models\\Section', 5, 'App\\Models\\Section', 5, 'App\\Models\\Section', 5, '', 'finished', '', '2024-04-24 18:48:55', '2024-04-24 18:48:55', '{\"text_x\":552}', '{\"text_x\":\"522\"}'),
(64, '9be2d006-e264-4045-9bc1-adca7dd3b10d', 1, 'Update', 'App\\Models\\Section', 5, 'App\\Models\\Section', 5, 'App\\Models\\Section', 5, '', 'finished', '', '2024-04-24 18:49:10', '2024-04-24 18:49:10', '{\"text_x\":522,\"text_y\":1216}', '{\"text_x\":\"512\",\"text_y\":\"1226\"}'),
(65, '9be2d096-2b56-4ece-808f-ef240f9534b5', 1, 'Create', 'App\\Models\\Section', 6, 'App\\Models\\Section', 6, 'App\\Models\\Section', 6, '', 'finished', '', '2024-04-24 18:50:44', '2024-04-24 18:50:44', NULL, '{\"name\":\"B\",\"subtitle\":\"8-16\",\"points\":\"452.52 1076.11 452.52 727.08 493.97 727.08 493.97 721.91 532.74 721.91 532.74 718.47 581.85 718.47 581.85 714.16 630.53 714.16 630.53 712.01 684.8 712.01 684.8 708.56 751.36 708.56 746.46 1132.7 683.92 1132.7 683.92 1120.57 627.33 1120.57 627.33 1109.46 583.38 1109.46 583.38 1097.84 537.4 1097.84 537.4 1087.23 496.48 1087.23 496.48 1076.11 452.52 1076.11\",\"text_x\":\"512\",\"text_y\":\"865\",\"updated_at\":\"2024-04-24T18:50:44.000000Z\",\"created_at\":\"2024-04-24T18:50:44.000000Z\",\"id\":6}'),
(66, '9be2d0a7-7fdc-4072-b42e-2388153fd301', 1, 'Update', 'App\\Models\\Section', 6, 'App\\Models\\Section', 6, 'App\\Models\\Section', 6, '', 'finished', '', '2024-04-24 18:50:55', '2024-04-24 18:50:55', '{\"text_y\":865}', '{\"text_y\":\"875\"}'),
(67, '9be2d0b3-27ae-469c-892d-25598d6be4cc', 1, 'Update', 'App\\Models\\Section', 6, 'App\\Models\\Section', 6, 'App\\Models\\Section', 6, '', 'finished', '', '2024-04-24 18:51:03', '2024-04-24 18:51:03', '{\"text_y\":875}', '{\"text_y\":\"885\"}'),
(68, '9be2d171-77b2-4683-a113-91d807444fb5', 1, 'Create', 'App\\Models\\Section', 7, 'App\\Models\\Section', 7, 'App\\Models\\Section', 7, '', 'finished', '', '2024-04-24 18:53:07', '2024-04-24 18:53:07', NULL, '{\"name\":\"B\",\"subtitle\":\"17-25\",\"points\":\"452.52 727.08 450.64 370.61 491.4 370.61 491.4 353.09 532.97 353.09 532.97 337.19 581.05 337.19 581.05 318.45 631.18 318.45 631.18 300.52 683.75 300.52 683.75 278.1 748.72 278.1 751.36 708.56 684.8 708.56 684.8 712.01 630.53 712.01 630.53 714.16 581.85 714.16 581.85 718.47 532.74 718.47 532.74 721.91 493.97 721.91 493.97 727.08 452.52 727.08\",\"text_x\":\"512\",\"text_y\":\"466\",\"updated_at\":\"2024-04-24T18:53:07.000000Z\",\"created_at\":\"2024-04-24T18:53:07.000000Z\",\"id\":7}'),
(69, '9be2d17f-df79-4a45-8f7c-e46a8ff6de95', 1, 'Update', 'App\\Models\\Section', 7, 'App\\Models\\Section', 7, 'App\\Models\\Section', 7, '', 'finished', '', '2024-04-24 18:53:17', '2024-04-24 18:53:17', '{\"text_y\":466}', '{\"text_y\":\"486\"}'),
(70, '9be2d325-4b02-4176-9433-3bd866a163f7', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 18:57:53', '2024-04-24 18:57:53', '{\"img_path\":null}', '{\"img_path\":\"QeypBCHm5ospvCeofyx7N1LU26ckbWAPkTdl3dCH.jpg\"}'),
(71, '9be2db21-ed1b-4e7f-aef1-7928f301045b', 1, 'Update', 'App\\Models\\Section', 2, 'App\\Models\\Section', 2, 'App\\Models\\Section', 2, '', 'finished', '', '2024-04-24 19:20:13', '2024-04-24 19:20:13', '{\"img_path\":null}', '{\"img_path\":\"ww1kopuOflShr6rMwrrg4FVqUqNRjfSKojj6M32q.jpg\"}'),
(72, '9be2e447-62e8-4e7d-bff6-697c3f7bb5ce', 1, 'Create', 'App\\Models\\Tower', 2, 'App\\Models\\Tower', 2, 'App\\Models\\Tower', 2, '', 'finished', '', '2024-04-24 19:45:47', '2024-04-24 19:45:47', NULL, '{\"name\":\"B\",\"updated_at\":\"2024-04-24T19:45:47.000000Z\",\"created_at\":\"2024-04-24T19:45:47.000000Z\",\"id\":2}'),
(73, '9be2e44b-fd84-4be9-9068-bd4f1b190517', 1, 'Create', 'App\\Models\\Tower', 3, 'App\\Models\\Tower', 3, 'App\\Models\\Tower', 3, '', 'finished', '', '2024-04-24 19:45:50', '2024-04-24 19:45:50', NULL, '{\"name\":\"E\",\"updated_at\":\"2024-04-24T19:45:50.000000Z\",\"created_at\":\"2024-04-24T19:45:50.000000Z\",\"id\":3}'),
(74, '9be2e7c3-c51b-43fb-a996-91d547cad06c', 1, 'Update', 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, '', 'finished', '', '2024-04-24 19:55:32', '2024-04-24 19:55:32', '{\"section_id\":null,\"name\":\"101\",\"price\":9000000,\"currency\":\"MXN\",\"status\":\"Disponible\"}', '{\"section_id\":1,\"name\":\"14\",\"price\":\"0\",\"currency\":\"USD\",\"status\":\"Apartada\"}'),
(75, '9be2e894-03d2-4e0f-8c47-54f73ac67d56', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 19:57:49', '2024-04-24 19:57:49', '[]', '[]'),
(76, '9be2e8fd-cd26-4fc6-a31c-56e8b2ba7ba5', 1, 'Update', 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, 'App\\Models\\Section', 1, '', 'finished', '', '2024-04-24 19:58:58', '2024-04-24 19:58:58', '{\"img_path\":null,\"viewbox\":null}', '{\"img_path\":\"tbx4hMIW7v8kC5g5W0kihLHOUw323RScd0FlniD7.jpg\",\"viewbox\":\"0 0 1080 1080\"}'),
(77, '9be2e9bc-648d-4873-8eb9-7cd94d25e8f1', 1, 'Update', 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, '', 'finished', '', '2024-04-24 20:01:03', '2024-04-24 20:01:03', '[]', '[]'),
(78, '9be2e9bc-66b5-4e3a-bf93-84c0da40d64f', 1, 'Create', 'App\\Models\\Shape', 1, 'App\\Models\\Shape', 1, 'App\\Models\\Shape', 1, '', 'finished', '', '2024-04-24 20:01:03', '2024-04-24 20:01:03', NULL, '{\"points\":\"396.47 738.44 119.1 740.6 119.1 658.17 398.97 660.45 396.47 738.44\",\"text_x\":\"242\",\"text_y\":\"708\",\"unit_id\":1,\"updated_at\":\"2024-04-24T20:01:03.000000Z\",\"created_at\":\"2024-04-24T20:01:03.000000Z\",\"id\":1}'),
(79, '9be2ff68-a25e-42dc-ae30-826e5efec6dd', 1, 'Update', 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, 'App\\Models\\UnitType', 1, '', 'finished', '', '2024-04-24 21:01:39', '2024-04-24 21:01:39', '[]', '[]'),
(80, '9be30477-c0be-4577-8a64-dff1c7bb454d', 1, 'Update', 'App\\Models\\Shape', 1, 'App\\Models\\Shape', 1, 'App\\Models\\Shape', 1, '', 'finished', '', '2024-04-24 21:15:48', '2024-04-24 21:15:48', '[]', '[]'),
(81, '9be30477-c263-4095-9d8d-49e0dfee5610', 1, 'Update', 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, '', 'finished', '', '2024-04-24 21:15:48', '2024-04-24 21:15:48', '{\"youtube_link\":null}', '{\"youtube_link\":\"https:\\/\\/youtu.be\\/SoHBpfBz848\"}'),
(82, '9be30c20-0554-4f57-97a3-ab28b9a8f6bf', 1, 'Update', 'App\\Models\\Shape', 1, 'App\\Models\\Shape', 1, 'App\\Models\\Shape', 1, '', 'finished', '', '2024-04-24 21:37:13', '2024-04-24 21:37:13', '[]', '[]'),
(83, '9be30c20-06ac-4ba8-9d41-a514e6adf297', 1, 'Update', 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, 'App\\Models\\Unit', 1, '', 'finished', '', '2024-04-24 21:37:13', '2024-04-24 21:37:13', '{\"view_path\":null}', '{\"view_path\":\"LCMPBiF19XNz2cByGuyvMtmmKoitW5HBBqD1jd4i.jpg\"}'),
(84, '9be31f60-3f8d-4904-a5e6-b4faf83f8e5a', 1, 'Update', 'App\\Models\\Section', 7, 'App\\Models\\Section', 7, 'App\\Models\\Section', 7, '', 'finished', '', '2024-04-24 22:31:02', '2024-04-24 22:31:02', '{\"points\":\"452.52 727.08 450.64 370.61 491.4 370.61 491.4 353.09 532.97 353.09 532.97 337.19 581.05 337.19 581.05 318.45 631.18 318.45 631.18 300.52 683.75 300.52 683.75 278.1 748.72 278.1 751.36 708.56 684.8 708.56 684.8 712.01 630.53 712.01 630.53 714.16 581.85 714.16 581.85 718.47 532.74 718.47 532.74 721.91 493.97 721.91 493.97 727.08 452.52 727.08\",\"viewbox\":null}', '{\"points\":\"1152.14 695.75 751.5 695.75 748.17 135.82 1160.93 137.96 1152.14 695.75\",\"viewbox\":\"0 0 1080 1080\"}'),
(85, '9be31fa7-1a7e-4705-b89b-224eab8fab68', 1, 'Update', 'App\\Models\\Section', 7, 'App\\Models\\Section', 7, 'App\\Models\\Section', 7, '', 'finished', '', '2024-04-24 22:31:49', '2024-04-24 22:31:49', '{\"points\":\"1152.14 695.75 751.5 695.75 748.17 135.82 1160.93 137.96 1152.14 695.75\"}', '{\"points\":\"452.52 727.08 450.64 318.99 491.4 318.99 491.4 301.47 532.97 301.47 532.97 285.58 581.05 285.58 581.05 266.83 631.18 266.83 631.18 248.9 683.75 248.9 683.75 226.48 748.72 226.48 751.36 708.56 684.8 708.56 684.8 712.01 630.53 712.01 630.53 714.16 581.85 714.16 581.85 718.47 532.74 718.47 532.74 721.91 493.97 721.91 493.97 727.08 452.52 727.08\"}'),
(86, '9be32015-b5d4-48bd-8c7b-5073cb409fbb', 1, 'Update', 'App\\Models\\Section', 4, 'App\\Models\\Section', 4, 'App\\Models\\Section', 4, '', 'finished', '', '2024-04-24 22:33:01', '2024-04-24 22:33:01', '{\"points\":\"1152.14 695.75 751.5 695.75 748.17 195.56 1160.93 197.71 1152.14 695.75\",\"viewbox\":null}', '{\"points\":\"1152.14 695.75 751.5 695.75 748.17 135.82 1160.93 137.96 1152.14 695.75\",\"viewbox\":\"0 0 1080 1080\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `construction_updates`
--

CREATE TABLE `construction_updates` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `portrait_path` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `user_id`, `agent_id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'erickalejandropm117@gmail.com', 'Eri_erES2024&', '2024-04-23 21:28:11', '2024-04-23 21:28:11'),
(2, 2, 1, 'tesren@live.com.mx', 'Eri_teES2024&', '2024-04-23 21:38:01', '2024-04-23 21:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `valid` tinyint(1) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\Unit', 1, '4ed022ec-60f6-4ac2-8254-3603def04d6c', 'unitgallery', 'debpa-b02', 'debpa-b02jpg.jpg', 'image/jpeg', 'media', 'media', 291243, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2024-04-23 16:33:15', '2024-04-23 16:33:15'),
(3, 'App\\Models\\UnitType', 1, '607af6b4-bb17-4433-b80b-264953792243', 'blueprints', 'tipo-1', 'tipo-1jpg.jpg', 'image/jpeg', 'media', 'media', 319578, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2024-04-24 17:15:36', '2024-04-24 17:15:36'),
(4, 'App\\Models\\UnitType', 2, '1245afd9-ae51-4956-b25e-c525d6931634', 'blueprints', 'tipo-2', 'tipo-2jpg.jpg', 'image/jpeg', 'media', 'media', 478511, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2024-04-24 17:15:57', '2024-04-24 17:15:57'),
(5, 'App\\Models\\UnitType', 2, 'd428ec32-72b1-4fc3-861f-da552305a7f8', 'blueprints', 'tipo-2', 'tipo-2jpg.jpg', 'image/jpeg', 'media', 'media', 406290, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2024-04-24 17:15:57', '2024-04-24 17:15:58'),
(6, 'App\\Models\\UnitType', 1, '1f77f98b-756f-478f-ae72-c4b18e68b732', 'blueprints', 'tipo-1', 'tipo-1jpg.jpg', 'image/jpeg', 'media', 'media', 412540, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2024-04-24 17:16:07', '2024-04-24 17:16:08'),
(7, 'App\\Models\\UnitType', 3, '1b315569-6323-4b39-bb66-60ceb71beeaa', 'blueprints', 'tipo-3', 'tipo-3jpg.jpg', 'image/jpeg', 'media', 'media', 237027, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2024-04-24 17:17:24', '2024-04-24 17:17:24'),
(8, 'App\\Models\\UnitType', 3, '138219c7-5bb9-4acd-968e-e14fd967dc0c', 'blueprints', 'tipo-3', 'tipo-3jpg.jpg', 'image/jpeg', 'media', 'media', 325810, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2024-04-24 17:17:24', '2024-04-24 17:17:24'),
(9, 'App\\Models\\UnitType', 4, '5f3be703-a523-431a-bba9-48d20a9470dc', 'blueprints', 'tipo-4', 'tipo-4jpg.jpg', 'image/jpeg', 'media', 'media', 242525, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2024-04-24 17:17:39', '2024-04-24 17:17:40'),
(10, 'App\\Models\\UnitType', 4, '3691e4b9-d693-4d1c-87ac-133253b35541', 'blueprints', 'tipo-4', 'tipo-4jpg.jpg', 'image/jpeg', 'media', 'media', 293577, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2024-04-24 17:17:40', '2024-04-24 17:17:40'),
(11, 'App\\Models\\UnitType', 5, '2bafe328-abc6-4003-b53a-814ad2c7b97e', 'blueprints', 'tipo-5', 'tipo-5jpg.jpg', 'image/jpeg', 'media', 'media', 171943, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2024-04-24 17:18:09', '2024-04-24 17:18:10'),
(12, 'App\\Models\\UnitType', 5, '99687a72-cfe2-4ace-8497-f22158757936', 'blueprints', 'tipo-5', 'tipo-5jpg.jpg', 'image/jpeg', 'media', 'media', 219275, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2024-04-24 17:18:10', '2024-04-24 17:18:10'),
(13, 'App\\Models\\UnitType', 6, '4553aeaf-4ecf-4a51-87ca-696074aac170', 'blueprints', 'tipo-6', 'tipo-6jpg.jpg', 'image/jpeg', 'media', 'media', 169701, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2024-04-24 17:18:24', '2024-04-24 17:18:24'),
(14, 'App\\Models\\UnitType', 6, 'e54ea5b3-a89c-4ef2-96bc-1d353f525252', 'blueprints', 'tipo-6', 'tipo-6jpg.jpg', 'image/jpeg', 'media', 'media', 261119, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2024-04-24 17:18:24', '2024-04-24 17:18:24'),
(15, 'App\\Models\\UnitType', 1, '4e17b073-5f9f-4e70-a45b-07c8790039ff', 'gallery', '3', '3jpg.jpg', 'image/jpeg', 'media', 'media', 718939, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2024-04-24 21:01:39', '2024-04-24 21:01:40'),
(16, 'App\\Models\\UnitType', 1, '1d5414b5-8b17-430c-837c-f8a4420c7efe', 'gallery', '4', '4jpg.jpg', 'image/jpeg', 'media', 'media', 770705, '[]', '[]', '{\"large\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2024-04-24 21:01:39', '2024-04-24 21:01:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_04_23_104901_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nova_field_attachments`
--

CREATE TABLE `nova_field_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `attachable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachable_id` bigint(20) UNSIGNED NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nova_notifications`
--

CREATE TABLE `nova_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nova_pending_field_attachments`
--

CREATE TABLE `nova_pending_field_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `draft_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_plans`
--

CREATE TABLE `payment_plans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `down_payment` int(11) NOT NULL,
  `second_payment` int(11) DEFAULT NULL,
  `months_percent` int(11) DEFAULT NULL,
  `closing_payment` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payment_plans`
--

INSERT INTO `payment_plans` (`id`, `name`, `name_en`, `discount`, `down_payment`, `second_payment`, `months_percent`, `closing_payment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Prueba', 'Test', 10, 20, 10, 30, 40, '2024-04-22 16:47:25', '2024-04-22 17:50:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_plan_unit`
--

CREATE TABLE `payment_plan_unit` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `payment_plan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `private_messages`
--

CREATE TABLE `private_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `private_messages`
--

INSERT INTO `private_messages` (`id`, `user_id`, `message`, `url`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hola quiero info', 'tridenta.com', '2024-04-15 19:01:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `points` text NOT NULL,
  `text_x` double NOT NULL,
  `text_y` double NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `viewbox` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `name`, `subtitle`, `points`, `text_x`, `text_y`, `img_path`, `viewbox`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'E', NULL, '1137.91 1694.37 1139.19 1560.44 749.83 1560.41 237.68 1564.17 237.68 1694.37 1137.91 1694.37', 643, 1631, 'tbx4hMIW7v8kC5g5W0kihLHOUw323RScd0FlniD7.jpg', '0 0 1080 1080', '2024-04-24 18:09:21', '2024-04-24 19:58:58', NULL),
(2, 'A', '1 - 7', '749.83 1560.41 1139.19 1560.44 1147.36 1183.78 746.46 1183.78 749.83 1560.41', 855, 1340, 'ww1kopuOflShr6rMwrrg4FVqUqNRjfSKojj6M32q.jpg', NULL, '2024-04-24 18:36:31', '2024-04-24 19:20:13', NULL),
(3, 'A', '8-16', '1147.36 1183.78 1152.14 695.75 751.5 695.75 746.46 1183.78 1147.36 1183.78', 855, 918, NULL, NULL, '2024-04-24 18:43:07', '2024-04-24 18:43:26', NULL),
(4, 'A', '17-25', '1152.14 695.75 751.5 695.75 748.17 135.82 1160.93 137.96 1152.14 695.75', 855, 380, NULL, '0 0 1080 1080', '2024-04-24 18:44:35', '2024-04-24 22:33:01', NULL),
(5, 'B', '1-7', '748.78 1442.91 685.43 1442.91 685.43 1425.22 631.88 1425.22 631.88 1399.96 583.88 1399.96 583.88 1379.75 537.4 1379.75 537.4 1352.47 488.9 1352.47 488.9 1332.77 455.55 1332.77 452.52 1076.11 496.48 1076.11 496.48 1087.23 537.4 1087.23 537.4 1097.84 583.38 1097.84 583.38 1109.46 627.33 1109.46 627.33 1120.57 683.92 1120.57 683.92 1132.7 746.46 1132.7 748.78 1442.91', 512, 1226, NULL, NULL, '2024-04-24 18:48:37', '2024-04-24 18:49:10', NULL),
(6, 'B', '8-16', '452.52 1076.11 452.52 727.08 493.97 727.08 493.97 721.91 532.74 721.91 532.74 718.47 581.85 718.47 581.85 714.16 630.53 714.16 630.53 712.01 684.8 712.01 684.8 708.56 751.36 708.56 746.46 1132.7 683.92 1132.7 683.92 1120.57 627.33 1120.57 627.33 1109.46 583.38 1109.46 583.38 1097.84 537.4 1097.84 537.4 1087.23 496.48 1087.23 496.48 1076.11 452.52 1076.11', 512, 885, NULL, NULL, '2024-04-24 18:50:44', '2024-04-24 18:51:03', NULL),
(7, 'B', '17-25', '452.52 727.08 450.64 318.99 491.4 318.99 491.4 301.47 532.97 301.47 532.97 285.58 581.05 285.58 581.05 266.83 631.18 266.83 631.18 248.9 683.75 248.9 683.75 226.48 748.72 226.48 751.36 708.56 684.8 708.56 684.8 712.01 630.53 712.01 630.53 714.16 581.85 714.16 581.85 718.47 532.74 718.47 532.74 721.91 493.97 721.91 493.97 727.08 452.52 727.08', 512, 486, NULL, '0 0 1080 1080', '2024-04-24 18:53:07', '2024-04-24 22:31:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3lFmQrQZJz1MQfqVls8FO93SoZOevXOCj3TuIxEM', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaVV3NzR1SU1PTGhGaEVsd0hKak5CSFM5WUhsQXpwOTNJN3E0R1c3NCI7czo2OiJsb2NhbGUiO3M6MjoiZXMiO3M6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQvaW52ZW50b3J5L3VuaXQvMSI7fX0=', 1713998909);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shapes`
--

CREATE TABLE `shapes` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `points` varchar(255) DEFAULT NULL,
  `text_x` double DEFAULT NULL,
  `text_y` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `shapes`
--

INSERT INTO `shapes` (`id`, `unit_id`, `points`, `text_x`, `text_y`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '396.47 738.44 119.1 740.6 119.1 658.17 398.97 660.45 396.47 738.44', 242, 708, '2024-04-24 20:01:03', '2024-04-24 20:01:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `towers`
--

CREATE TABLE `towers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `towers`
--

INSERT INTO `towers` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A', '2024-04-12 17:42:10', '2024-04-12 17:42:10', NULL),
(2, 'B', '2024-04-24 19:45:47', '2024-04-24 19:45:47', NULL),
(3, 'E', '2024-04-24 19:45:50', '2024-04-24 19:45:50', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_type_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `floor` int(11) NOT NULL,
  `price` double NOT NULL,
  `currency` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `view_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `units`
--

INSERT INTO `units` (`id`, `unit_type_id`, `section_id`, `name`, `floor`, `price`, `currency`, `status`, `youtube_link`, `view_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '14', 1, 0, 'USD', 'Apartada', 'https://youtu.be/SoHBpfBz848', 'LCMPBiF19XNz2cByGuyvMtmmKoitW5HBBqD1jd4i.jpg', '2024-04-12 19:30:04', '2024-04-24 21:37:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unit_types`
--

CREATE TABLE `unit_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `flexrooms` int(11) DEFAULT NULL,
  `bathrooms` double NOT NULL,
  `interior_const` double NOT NULL,
  `parking_area` double DEFAULT NULL,
  `storage_area` double DEFAULT NULL,
  `exterior_const` double NOT NULL,
  `const_total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unit_types`
--

INSERT INTO `unit_types` (`id`, `name`, `bedrooms`, `flexrooms`, `bathrooms`, `interior_const`, `parking_area`, `storage_area`, `exterior_const`, `const_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 3, NULL, 4, 145.71, NULL, NULL, 21.69, 167.4, '2024-04-12 19:16:20', '2024-04-24 16:42:39', NULL),
(2, '2', 3, NULL, 4, 148.18, NULL, NULL, 27.7, 175.88, '2024-04-24 17:03:59', '2024-04-24 17:03:59', NULL),
(3, '3', 2, NULL, 3, 89.72, NULL, NULL, 12.88, 102.6, '2024-04-24 17:04:45', '2024-04-24 17:04:45', NULL),
(4, '4', 2, NULL, 3, 94.18, NULL, NULL, 12.65, 106.83, '2024-04-24 17:05:13', '2024-04-24 17:05:13', NULL),
(5, '5', 0, NULL, 1, 46.24, NULL, NULL, 4.73, 50.97, '2024-04-24 17:08:22', '2024-04-24 17:08:22', NULL),
(6, '6', 1, NULL, 2, 54.72, NULL, NULL, 12.23, 66.95, '2024-04-24 17:08:55', '2024-04-24 17:08:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unit_user`
--

CREATE TABLE `unit_user` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unit_user`
--

INSERT INTO `unit_user` (`id`, `unit_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'realtor',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `agent_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `lang`, `country_code`, `email_verified_at`, `password`, `role`, `notes`, `agent_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Erick', 'erick@punto401.com', '3221084847', '', NULL, NULL, '$2y$12$ICXFFPn0CqIe9eKN.nWQT.Rfz/VD3zGGbdUWKIa6DzI8oWQLaqhv2', 'superadmin', NULL, NULL, 'JZbSI50DHqmNUAgE2HtZ95ZP9FSLB9cqXun50F82qXLVYyoixDIB7fQyAHbC', '2024-01-12 00:18:31', '2024-04-11 21:04:22', NULL),
(2, 'Erick Cliente', 'tesren@live.com.mx', NULL, 'es', 'CA', NULL, '$2y$12$P47aHrzfLfWhkwBK6hGqueDlKTUEdINnr9ZKCGtwB0Mx8uG6xfNjm', 'client', 'Probando', 3, 'P1DDFYz6xtAyO1LhJ8jWx5avuAAhUoySl9NaCYYIS2xQir7EDZJdCBKzAUxz', '2024-04-11 19:53:07', '2024-04-24 17:34:25', NULL),
(3, 'Efraín Valencia', 'efrain@domusvallarta.com', NULL, 'es', NULL, NULL, '$2y$12$8QUCbYIL9smNlYg/fhUz/.vJcw3FX3nZ156DoiWuRhpW6pBUF0HDa', 'agent', NULL, NULL, '6IjsuURwAHwbF8k5qiPdawytXzXza2O5Mxg0bKaDX4nwPjlSdDK2dQWEaXFQ', '2024-04-11 21:07:01', '2024-04-12 22:52:15', NULL),
(4, 'Wendy Arce', 'wendy@punto401.com', NULL, 'es', 'MX', NULL, '$2y$12$Jv88CuooK2NhVOvLyrkTK.lYm3E4AWYIqr85k3IwWnRuvqykV7Zb6', 'admin', NULL, NULL, NULL, '2024-04-12 19:08:30', '2024-04-12 19:08:30', NULL),
(5, 'Daniel Michelena', 'michelena@punto401.com', NULL, 'es', 'MX', NULL, '$2y$12$Da7osEqlhjo.Fbmhw75ahu2Y.Wkg.vdHR6aRSPLUIcxdGVSCZdTQy', 'admin', NULL, NULL, NULL, '2024-04-12 19:09:05', '2024-04-12 19:09:05', NULL),
(6, 'Glenda Olguín', 'glenda@punto401.com', NULL, 'es', 'MX', NULL, '$2y$12$Smgu6d7BWBVQALLtkpUTw.CyM8CkGjp9iaspsyikROlK7o78ulefG', 'admin', NULL, NULL, NULL, '2024-04-12 19:09:50', '2024-04-12 19:09:50', NULL),
(7, 'Javier Ortega', 'javier@punto401.com', NULL, 'es', 'MX', NULL, '$2y$12$ELZ3qZWLIUJ2KNVl1EUS6Osfv8NKxdwVsh0c6A2degJN1O5cju1VG', 'admin', NULL, NULL, NULL, '2024-04-12 19:10:41', '2024-04-12 19:10:41', NULL),
(8, 'Tania Ramos', 'tania@punto401.com', NULL, 'es', 'MX', NULL, '$2y$12$eMrFrO5za9ITuJztyE62ruLjL22xZJc/Bge2q2ugt1oeyi4kuswu6', 'admin', NULL, NULL, NULL, '2024-04-12 19:11:24', '2024-04-12 19:11:24', NULL),
(9, 'Raul Flores', 'raul@punto401.com', NULL, 'es', 'MX', NULL, '$2y$12$fiT0pzFVKAPN3tdsfhBatuKdLwwQa0LSlQslOp8ef28QzOsUbijE2', 'admin', NULL, NULL, 'xjWcF52EZR7xHGddBBFiQfcGPGLrN1GWP3yOQeYsyhoKRtPYgWiuDGvRlCtY', '2024-04-12 19:12:27', '2024-04-12 19:12:27', NULL),
(10, 'Tania Vizcaino', 'viztani@punto401.com', NULL, 'es', 'MX', NULL, '$2y$12$Xj0dkRYduox1DD3oEQUqBOHFcBvYRW0MQaj/PoZMvSlExWuK7MYVm', 'admin', NULL, NULL, NULL, '2024-04-12 19:13:03', '2024-04-12 19:13:03', NULL),
(11, 'Erick', 'erickalejandro@gmail.com', NULL, 'es', 'MX', NULL, '$2y$12$Mx/fEq/Sa02tTKfeMck61OcozSSo5Ell14.TL3DB5gHrbyVw2LbOW', 'client', NULL, 3, NULL, '2024-04-23 19:41:20', '2024-04-23 19:41:20', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `action_events`
--
ALTER TABLE `action_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_events_actionable_type_actionable_id_index` (`actionable_type`,`actionable_id`),
  ADD KEY `action_events_target_type_target_id_index` (`target_type`,`target_id`),
  ADD KEY `action_events_batch_id_model_type_model_id_index` (`batch_id`,`model_type`,`model_id`),
  ADD KEY `action_events_user_id_index` (`user_id`);

--
-- Indices de la tabla `construction_updates`
--
ALTER TABLE `construction_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nova_field_attachments`
--
ALTER TABLE `nova_field_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nova_field_attachments_attachable_type_attachable_id_index` (`attachable_type`,`attachable_id`),
  ADD KEY `nova_field_attachments_url_index` (`url`);

--
-- Indices de la tabla `nova_notifications`
--
ALTER TABLE `nova_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nova_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indices de la tabla `nova_pending_field_attachments`
--
ALTER TABLE `nova_pending_field_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nova_pending_field_attachments_draft_id_index` (`draft_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `payment_plans`
--
ALTER TABLE `payment_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment_plan_unit`
--
ALTER TABLE `payment_plan_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `private_messages`
--
ALTER TABLE `private_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `shapes`
--
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indices de la tabla `towers`
--
ALTER TABLE `towers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_type_id` (`unit_type_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indices de la tabla `unit_types`
--
ALTER TABLE `unit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unit_user`
--
ALTER TABLE `unit_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `agent_id` (`agent_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `action_events`
--
ALTER TABLE `action_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `construction_updates`
--
ALTER TABLE `construction_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nova_field_attachments`
--
ALTER TABLE `nova_field_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nova_pending_field_attachments`
--
ALTER TABLE `nova_pending_field_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_plans`
--
ALTER TABLE `payment_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `payment_plan_unit`
--
ALTER TABLE `payment_plan_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `private_messages`
--
ALTER TABLE `private_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `shapes`
--
ALTER TABLE `shapes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `towers`
--
ALTER TABLE `towers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `unit_types`
--
ALTER TABLE `unit_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `unit_user`
--
ALTER TABLE `unit_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
