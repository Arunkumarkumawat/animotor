# ************************************************************
# Antares - SQL Client
# Version 0.7.34
# 
# https://antares-sql.app/
# https://github.com/antares-sql/antares
# 
# Host: 127.0.0.1 (mariadb.org binary distribution 10.11.14)
# Database: db
# Generation time: 2025-11-26T18:52:49+05:30
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activity_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity_logs`;

CREATE TABLE `activity_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;

INSERT INTO `activity_logs` (`id`, `user_id`, `title`, `info`, `created_at`, `updated_at`) VALUES
	(1, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "Driver created.", "{\"first_name\":\"adsfa\",\"last_name\":\"asdfa\",\"phone\":\"23423432\",\"email\":\"afads@adsfa.com\",\"work_phone\":\"243242\"}", "2025-09-04 18:29:36", "2025-09-04 18:29:36"),
	(2, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"asdf\"}", "2025-09-19 10:44:39", "2025-09-19 10:44:39"),
	(3, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"BMW 5 SERIES\"}", "2025-09-24 12:23:52", "2025-09-24 12:23:52"),
	(4, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Excepturi aut aliqui\"}", "2025-09-25 23:34:08", "2025-09-25 23:34:08"),
	(5, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"hjjjjjjjjjj\"}", "2025-09-26 00:40:21", "2025-09-26 00:40:21"),
	(6, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"ssss\"}", "2025-09-26 06:13:16", "2025-09-26 06:13:16"),
	(7, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"dddddddd\"}", "2025-09-26 06:16:24", "2025-09-26 06:16:24"),
	(8, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Sit aliquid tenetur\"}", "2025-09-26 06:17:13", "2025-09-26 06:17:13"),
	(9, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Expedita voluptas au\"}", "2025-09-26 06:17:44", "2025-09-26 06:17:44"),
	(10, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Obcaecati ullam sint\"}", "2025-09-26 06:21:13", "2025-09-26 06:21:13"),
	(11, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Obcaecati ullam sint\"}", "2025-09-26 06:21:14", "2025-09-26 06:21:14"),
	(12, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Laborum Anim quo es\"}", "2025-09-26 06:23:29", "2025-09-26 06:23:29"),
	(13, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Deserunt cumque iste\"}", "2025-09-26 06:26:28", "2025-09-26 06:26:28"),
	(14, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Commodo est omnis ut\"}", "2025-09-26 06:27:18", "2025-09-26 06:27:18"),
	(15, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Et ullam cumque obca\"}", "2025-09-26 06:30:49", "2025-09-26 06:30:49"),
	(16, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Ea repellendus Eos\"}", "2025-09-26 06:32:47", "2025-09-26 06:32:47"),
	(17, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Ea voluptatum facere\"}", "2025-09-26 06:34:30", "2025-09-26 06:34:30"),
	(18, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Laboriosam dolor ne\"}", "2025-09-26 06:55:31", "2025-09-26 06:55:31"),
	(19, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Odio duis dicta cons\"}", "2025-09-26 07:00:44", "2025-09-26 07:00:44"),
	(20, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Accusantium repellen\"}", "2025-09-26 07:11:50", "2025-09-26 07:11:50"),
	(21, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Mercedes vito\"}", "2025-09-26 21:11:07", "2025-09-26 21:11:07"),
	(22, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Irure placeat non l\"}", "2025-09-26 23:50:47", "2025-09-26 23:50:47"),
	(23, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Distinctio Consequa\"}", "2025-09-27 00:02:43", "2025-09-27 00:02:43"),
	(24, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Laborum voluptate si\"}", "2025-09-27 05:15:15", "2025-09-27 05:15:15"),
	(25, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"fsdfffffffffffffffffffffffffff\"}", "2025-09-30 21:26:22", "2025-09-30 21:26:22"),
	(26, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\"}", "2025-09-30 22:08:54", "2025-09-30 22:08:54"),
	(27, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"fdf\"}", "2025-10-01 17:13:04", "2025-10-01 17:13:04"),
	(28, "a001f4d6-d253-4a60-b208-a298a127ecde", "New Car created.", "{\"car_name\":\"Iste sed ut quis fugit ullamc\"}", "2025-10-01 20:15:53", "2025-10-01 20:15:53"),
	(29, "a001f4d6-d253-4a60-b208-a298a127ecde", "New Car created.", "{\"car_name\":\"Est est et nihil ea rerum cum\"}", "2025-10-01 20:16:34", "2025-10-01 20:16:34"),
	(30, "a001f4d6-d253-4a60-b208-a298a127ecde", "New Car created.", "{\"car_name\":\"Aut sequi accusantium sit eiu\"}", "2025-10-01 20:19:41", "2025-10-01 20:19:41"),
	(31, "a001f4d6-d253-4a60-b208-a298a127ecde", "New Car created.", "{\"car_name\":\"Aperiam numquam neque corrupti\"}", "2025-10-01 20:25:06", "2025-10-01 20:25:06"),
	(32, "a001f4d6-d253-4a60-b208-a298a127ecde", "New Car created.", "{\"car_name\":\"Consequat Ut nobis aut est la\"}", "2025-10-01 20:33:28", "2025-10-01 20:33:28"),
	(33, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Error consequat Quia cupidita\"}", "2025-10-01 21:14:42", "2025-10-01 21:14:42"),
	(34, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Dolore temporibus reiciendis o\"}", "2025-10-01 21:16:10", "2025-10-01 21:16:10"),
	(35, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Dolore temporibus reiciendis o\"}", "2025-10-01 21:16:11", "2025-10-01 21:16:11"),
	(36, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Aut qui maiores qui est omnis\"}", "2025-10-01 21:17:19", "2025-10-01 21:17:19"),
	(37, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Perferendis quos ipsa maxime\"}", "2025-10-01 21:18:39", "2025-10-01 21:18:39"),
	(38, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Mini\"}", "2025-10-06 13:06:42", "2025-10-06 13:06:42"),
	(39, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"kia\"}", "2025-10-08 21:14:10", "2025-10-08 21:14:10"),
	(40, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"kia\"}", "2025-10-08 21:14:15", "2025-10-08 21:14:15"),
	(41, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"kia\"}", "2025-10-08 21:14:16", "2025-10-08 21:14:16"),
	(42, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"kia\"}", "2025-10-08 21:14:16", "2025-10-08 21:14:16"),
	(43, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"kia\"}", "2025-10-08 21:19:10", "2025-10-08 21:19:10"),
	(44, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"maruti suzuki 800\"}", "2025-10-09 16:01:29", "2025-10-09 16:01:29"),
	(45, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Mercedes-Benz\"}", "2025-10-09 22:07:43", "2025-10-09 22:07:43"),
	(46, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"Maruti\"}", "2025-10-10 11:34:23", "2025-10-10 11:34:23"),
	(47, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"ABCC1234\"}", "2025-10-10 12:11:29", "2025-10-10 12:11:29"),
	(48, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "New Car created.", "{\"car_name\":\"2025 Land Rover Range Rover\"}", "2025-10-10 16:59:51", "2025-10-10 16:59:51");

/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table banks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banks`;

CREATE TABLE `banks` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `holder_name` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `bank_code` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banks_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` decimal(8,2) DEFAULT NULL,
  `reference` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pick_up_date` date DEFAULT NULL,
  `pick_up_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off_date` date DEFAULT NULL,
  `drop_off_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pick_location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off_location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pick_up_lat` decimal(10,7) DEFAULT NULL,
  `pick_up_lng` decimal(10,7) DEFAULT NULL,
  `drop_off_lat` decimal(10,7) DEFAULT NULL,
  `drop_off_lng` decimal(10,7) DEFAULT NULL,
  `car_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `cancelled` tinyint(1) NOT NULL DEFAULT 0,
  `rating` int(11) DEFAULT NULL,
  `rating_comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_time_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` int(11) DEFAULT NULL,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `grand_total` decimal(12,2) DEFAULT NULL,
  `rental_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` decimal(8,2) NOT NULL DEFAULT 0.00,
  `cancellation_reason` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `booking_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `insurance_fee` double NOT NULL DEFAULT 0,
  `deposit_fee` double NOT NULL DEFAULT 0,
  `company_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `booking_period` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extras` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `billing_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;

INSERT INTO `bookings` (`id`, `region_id`, `driver_id`, `customer_id`, `fee`, `reference`, `pick_up_date`, `pick_up_time`, `drop_off_date`, `drop_off_time`, `pick_location`, `drop_off_location`, `status`, `payment_status`, `payment_method`, `pick_up_lat`, `pick_up_lng`, `drop_off_lat`, `drop_off_lng`, `car_id`, `completed`, `cancelled`, `rating`, `rating_comment`, `extra_time_price`, `discount`, `tax`, `grand_total`, `rental_id`, `booking_type`, `commission`, `cancellation_reason`, `cancelled_by`, `comment`, `picked`, `created_at`, `updated_at`, `booking_number`, `confirmation_no`, `is_confirmed`, `insurance_fee`, `deposit_fee`, `company_id`, `payment_detail`, `booking_period`, `extras`, `billing_details`) VALUES
	("a060bbeb-f95e-482e-b7d0-1d34b8ccc453", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a060bbeb-f441-457a-a10f-120153ab65d5", 132, "ANI -BOOKING-0911-278", "2025-11-17", "13:00", "2025-11-19", "13:00", "Jaipur Region", "Vaishali Nagar", "pending", "unpaid", "cash", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-17 09:55:01", "2025-11-17 09:55:01", "19397106312", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", NULL, "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"Ankit\",\"last_name\":\"Karan\",\"address\":\"397, Near Mamta School, Hasanpura A, Jaipur - 302006, RJ, India\",\"country\":\"India\",\"city\":\"Jaipur\",\"phone\":\"8765432112\",\"zipcode\":\"302006\"}"),
	("a060f0aa-b200-4f70-bb6a-cba1da4d6439", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a060e5c3-f1cc-4d9f-95ae-03e809b65ecf", 132, "ANI -BOOKING-1211-347", "2025-11-17", "15:00", "2025-11-19", "15:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-17 12:22:30", "2025-11-17 12:24:52", "19397203652", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1nctUNN6rp5S9076fyoWAAkC8yfW6wVFdYJCkJt2R9QYpBjfK3m4BubaM\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a060f0aa-b200-4f70-bb6a-cba1da4d6439\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763382195,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763468595,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SURUCIuZHxyg8RG1nTh2qql\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15265492,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"Test\",\"last_name\":\"asdf\",\"address\":\"-\",\"country\":\"Albania\",\"city\":\"adfasdf\",\"phone\":\"+91-8441872796\",\"zipcode\":\"234324\"}"),
	("a060f2cd-8470-4e3e-8466-32bec0ad424b", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a060e33d-b592-4617-a50b-0b31f5db915f", 132, "ANI -BOOKING-1211-832", "2025-11-17", "16:00", "2025-11-19", "16:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-17 12:28:28", "2025-11-17 12:29:07", "19397207594", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1bgDb7tRdsIS7stYssHpmI3aeV6ruVU6PjK9ChRitYN7ka82sx1AI2n36\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a060f2cd-8470-4e3e-8466-32bec0ad424b\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763382520,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763468920,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SURYIIuZHxyg8RG1vhlBpfu\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15265492,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"Test\",\"last_name\":\"User\",\"address\":\"aaddad\",\"country\":\"Argentina\",\"city\":\"Jaipur\",\"phone\":\"+91-8441872796\",\"zipcode\":\"33333\"}"),
	("a062bd7f-7b57-4d34-882e-ada15e3607ee", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a060e33d-b592-4617-a50b-0b31f5db915f", 132, "ANI -BOOKING-0911-417", "2025-11-18", "13:00", "2025-11-20", "13:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-18 09:51:04", "2025-11-18 09:51:42", "19398054113", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1bHHapnOGID4IITE1ACmFk43hpbFw3PfJYsFujOCuTicnN2ATSmYILusc\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a062bd7f-7b57-4d34-882e-ada15e3607ee\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763459474,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763545874,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SUlZUIuZHxyg8RG0ahhcBIv\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15240713,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"Ankit\",\"last_name\":\"Karan\",\"address\":\"397\",\"country\":\"India\",\"city\":\"Jaipur\",\"phone\":\"+91-8441872796\",\"zipcode\":\"302005\"}"),
	("a062c003-0b6f-4d6c-b1d1-04df42b2f016", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a060e33d-b592-4617-a50b-0b31f5db915f", 132, "ANI -BOOKING-0911-488", "2025-11-18", "13:00", "2025-11-20", "13:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-18 09:58:06", "2025-11-18 09:59:35", "19398058752", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1zf2E9v2zF1GGXwHEzo226VngEmFOcXa8FxzMknEXM4oY1spgxQwaAKAu\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a062c003-0b6f-4d6c-b1d1-04df42b2f016\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763459897,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763546296,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SUlh8IuZHxyg8RG1r8CV9XO\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15240713,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"Test\",\"last_name\":\"Karan\",\"address\":\"Lorem\",\"country\":\"India\",\"city\":\"Jaipur\",\"phone\":\"+91-8441872796\",\"zipcode\":\"456453\"}"),
	("a064b50d-0e31-4861-8817-14746e37785b", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-963", "2025-11-19", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-19 09:19:07", "2025-11-19 09:19:50", "19398983418", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a11mJCNtW9Y6S24heCdRlDsKpiqfxvm4Vuq66PGYwo0IZVj6jTFdreG1zC\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064b50d-0e31-4861-8817-14746e37785b\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763543957,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"arun@gmail.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763630357,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV7YDIuZHxyg8RG1Yp7Zhxf\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"asdfa\",\"last_name\":\"asdfa\",\"address\":\"asdfds\",\"country\":\"Bangladesh\",\"city\":\"asdfasd\",\"phone\":\"254678976\",\"zipcode\":\"45678976\"}"),
	("a064b8f8-6c72-4fe1-9f68-1399f46e0afc", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-769", "2025-11-19", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-19 09:30:04", "2025-11-19 09:31:09", "19398990650", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1kfoIFtCobAXbs7DnCOU66yWD2bKBkLmmLPqUPygjckVWFJHLtg5BezE0\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064b8f8-6c72-4fe1-9f68-1399f46e0afc\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763544614,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763631014,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV7jBIuZHxyg8RG4fUIyLoT\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"asdfasdfa\",\"last_name\":\"adfadsf\",\"address\":\"asdfasdf\",\"country\":\"Algeria\",\"city\":\"adfadsf\",\"phone\":\"fasfasdfad\",\"zipcode\":\"asdfasdf\"}"),
	("a064ba1e-5673-481c-bbb7-0e3268efdc36", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-468", "2025-11-19", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-19 09:33:17", "2025-11-19 09:33:46", "19398992769", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1I70NAj6kHJky1SczXOuBqPh24KfRu666UYU4KhH7MS7lakT9pZSIFrg0\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064ba1e-5673-481c-bbb7-0e3268efdc36\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763544808,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"adsg\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763631208,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV7liIuZHxyg8RG4yTyMWbr\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"asdf\",\"last_name\":\"asdfasdf\",\"address\":\"fasdfa\",\"country\":\"Albania\",\"city\":\"asdfasdfas\",\"phone\":\"asdfasdf\",\"zipcode\":\"sdfsadf\"}"),
	("a064bcaf-4394-4465-9b7e-1dc1452a61df", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-735", "2025-11-19", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-19 09:40:27", "2025-11-19 09:40:59", "19398997505", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1l1PfxcpPCZgGKhc3jWRBCkcGyBVzYE56LhFLXJzFYpLgdRGaQdHfanEF\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064bcaf-4394-4465-9b7e-1dc1452a61df\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763545240,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763631640,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV7shIuZHxyg8RG4r4HH4A0\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"asdfa\",\"last_name\":\"asdf\",\"address\":\"397, Near Mamta School, Hasanpura A, Jaipur - 302006, RJ, India\",\"country\":\"Albania\",\"city\":\"adasf\",\"phone\":\"asdfdad\",\"zipcode\":\"302006\"}"),
	("a064bd2a-4694-402b-85ae-8c7e159aaf46", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-573", "2025-11-19", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-19 09:41:48", "2025-11-19 09:42:21", "19398998392", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1XFyhT5D7fJr70HSa03GI4QGkWna7sKGe1GafJR4cCQbid2LCr4xeFtRC\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064bd2a-4694-402b-85ae-8c7e159aaf46\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763545317,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"nosacil444@chaineor.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763631716,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV7u1IuZHxyg8RG1uN0aDEZ\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"sdfadsf\",\"last_name\":\"asdfa\",\"address\":\"adsfa\",\"country\":\"Afghanistan\",\"city\":\"asdfa\",\"phone\":\"asdfasfd\",\"zipcode\":\"sdfa\"}"),
	("a064be0b-f8b3-4a71-816d-06368ca36c66", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-107", "2025-11-19", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-19 09:44:16", "2025-11-19 09:44:49", "19399000019", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1IuE97p1GKi6RQxfUoOQuKZhuHDGDigF0zb1kJYVhlZBBP5sqVPFuVd5W\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064be0b-f8b3-4a71-816d-06368ca36c66\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763545468,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"arun@gmail.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763631868,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV7wPIuZHxyg8RG1tW1iLff\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"afsdf\",\"last_name\":\"asddfa\",\"address\":\"asdfa\",\"country\":\"Albania\",\"city\":\"asdfsda\",\"phone\":\"asdfa\",\"zipcode\":\"asddfa\"}"),
	("a064be9b-68f6-4afa-b2d1-aa445a3866d0", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-447", "2025-11-19", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-19 09:45:50", "2025-11-19 09:46:23", "19399001053", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1ubmz5Do9x6XVQZ9JdnyUzkfHHWweD1xtYzT5zre3bUiAiQhIc7BovJtv\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064be9b-68f6-4afa-b2d1-aa445a3866d0\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763545565,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"arun@gmail.com\",\"individual_name\":null,\"name\":\"sdgdfg\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763631964,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV7xvIuZHxyg8RG3Ntg7weQ\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"sadfasd\",\"last_name\":\"asfdsaf\",\"address\":\"asdfads\",\"country\":\"Afghanistan\",\"city\":\"sadfsa\",\"phone\":\"asdf\",\"zipcode\":\"asdfasdf\"}"),
	("a064bf10-513e-4cdc-8439-8fb89f0ac940", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-517", "2025-11-19", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-19 09:47:06", "2025-11-19 09:47:33", "19399001895", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1qnU3LqwCphG1MIQUTdXdGcyzB2AZRt1e9CvcCZwkfb2lWa37eyUGbQth\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064bf10-513e-4cdc-8439-8fb89f0ac940\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763545636,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"2fda\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763632035,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV7z3IuZHxyg8RG1XYNZhUU\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"adsfa\",\"last_name\":\"asdfa\",\"address\":\"sddfa\",\"country\":\"Albania\",\"city\":\"sdfads\",\"phone\":\"sdfasd\",\"zipcode\":\"asdfs\"}"),
	("a064c169-43c4-4813-811c-0cd804f253a0", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a064b4f8-84d4-40e5-871e-99867a07d59a", 132, "ANI -BOOKING-0911-197", "2025-12-20", "12:00", "2025-11-21", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 3, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, "customer", NULL, NULL, "2025-11-19 09:53:40", "2025-11-22 07:47:30", "19399006228", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1CQMQljFoyCjB7UQUI8hFAX2IQ3xfvSfE8GQyZMA96P4HHckv2vQyUJFw\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a064c169-43c4-4813-811c-0cd804f253a0\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763546029,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"jiyip30729@delaeb.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763632429,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SV85cIuZHxyg8RG154dl2MW\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15193702,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"Test\",\"last_name\":\"Karan\",\"address\":\"397, Near Mamta School, Hasanpura A, Jaipur - 302006, RJ, India\",\"country\":\"Antarctica\",\"city\":\"23422\",\"phone\":\"456879542\",\"zipcode\":\"302006\"}"),
	("a06aaac5-0c90-4a78-939a-bc83d388d7ae", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, "a06aa969-e638-436d-8e6a-21bc4178aa99", 132, "ANI -BOOKING-0811-545", "2025-11-22", "12:00", "2025-11-24", "12:00", "Jaipur Region", "Vaishali Nagar", "pending", "paid", "stripe", NULL, NULL, NULL, NULL, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 0, 0, NULL, NULL, 0, NULL, 0, 1260, NULL, "with_full_protection", 0, NULL, NULL, NULL, NULL, "2025-11-22 08:25:20", "2025-11-22 08:26:06", "19401799122", NULL, 0, 1029, 0, "a05aed52-e30a-4605-97f4-c5e332ab6765", "{\"id\":\"cs_test_a1ZzuS3fZrFGt7h2UMoMa55DHrngNb3rzfaOhYMBWvNYeQsWS2n0Levwu4\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":true},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":126000,\"amount_total\":126000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"provider\":null,\"status\":null},\"billing_address_collection\":null,\"branding_settings\":{\"background_color\":\"#ffffff\",\"border_style\":\"rounded\",\"button_color\":\"#0074d4\",\"display_name\":\"ANI MOTORS LTD\",\"font_family\":\"default\",\"icon\":null,\"logo\":null},\"cancel_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/cancel\",\"client_reference_id\":\"a06aaac5-0c90-4a78-939a-bc83d388d7ae\",\"client_secret\":null,\"collected_information\":null,\"consent\":null,\"consent_collection\":null,\"created\":1763799928,\"currency\":\"gbp\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"business_name\":null,\"email\":\"temp@gmail.com\",\"individual_name\":null,\"name\":\"Test User\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":null,\"discounts\":[],\"expires_at\":1763886328,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"origin_context\":null,\"payment_intent\":\"pi_3SWC8rIuZHxyg8RG1EFnXrDc\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"permissions\":null,\"phone_number_collection\":{\"enabled\":false},\"presentment_details\":{\"presentment_amount\":15362819,\"presentment_currency\":\"inr\"},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"https:\\/\\/animotor.ddev.site\\/stripe\\/success?session_id={CHECKOUT_SESSION_ID}\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null,\"wallet_options\":null}", "3 day", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"quantity\":\"1\",\"interval\":\"daily\",\"paid\":99}]", "{\"first_name\":\"asdf\",\"last_name\":\"asdfad\",\"address\":\"asdfasdf\",\"country\":\"Albania\",\"city\":\"asf\",\"phone\":\"34234234\",\"zipcode\":\"asdfasdf\"}");

/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table cancellation_reasons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cancellation_reasons`;

CREATE TABLE `cancellation_reasons` (
  `id` char(36) NOT NULL,
  `user_type` varchar(191) NOT NULL,
  `reason` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table car_availabilities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_availabilities`;

CREATE TABLE `car_availabilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` varchar(50) NOT NULL,
  `day_of_week` varchar(191) NOT NULL,
  `pickup_hours_start` time NOT NULL,
  `pickup_hours_end` time NOT NULL,
  `return_hours_start` time NOT NULL,
  `return_hours_end` time NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `car_availabilities` WRITE;
/*!40000 ALTER TABLE `car_availabilities` DISABLE KEYS */;

INSERT INTO `car_availabilities` (`id`, `car_id`, `day_of_week`, `pickup_hours_start`, `pickup_hours_end`, `return_hours_start`, `return_hours_end`, `status`, `created_at`, `updated_at`) VALUES
	(1, "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", "Monday", "19:00:00", "19:00:00", "19:00:00", "18:00:00", "1", "2025-11-14 12:44:47", "2025-11-14 12:45:08");

/*!40000 ALTER TABLE `car_availabilities` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table car_blackouts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_blackouts`;

CREATE TABLE `car_blackouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` varchar(100) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `reason` varchar(191) NOT NULL,
  `hard_block` enum('1','0') NOT NULL DEFAULT '0',
  `notes` text DEFAULT NULL,
  `status` varchar(5) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table car_damage_reports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_damage_reports`;

CREATE TABLE `car_damage_reports` (
  `id` char(36) NOT NULL,
  `car_id` char(36) NOT NULL,
  `booking_id` char(36) DEFAULT NULL,
  `company_id` char(36) DEFAULT NULL,
  `return_id` char(36) DEFAULT NULL,
  `any_damage` tinyint(1) NOT NULL DEFAULT 1,
  `damaged_panel` int(11) NOT NULL DEFAULT 0,
  `damage_type` varchar(191) DEFAULT NULL,
  `alloy_wheels_damage` tinyint(1) NOT NULL DEFAULT 1,
  `alloy_damages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `windscreen_damage` tinyint(1) NOT NULL DEFAULT 1,
  `windscreen_damages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `mirror_damage` tinyint(1) NOT NULL DEFAULT 1,
  `mirror_damages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `warning_lights` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `lights_on` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `seat_damage` tinyint(1) NOT NULL DEFAULT 1,
  `seat_damages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `clean_exterior` tinyint(1) NOT NULL DEFAULT 1,
  `exterior_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `handbook` tinyint(1) NOT NULL DEFAULT 1,
  `handbook_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `spare_wheel` tinyint(1) NOT NULL DEFAULT 1,
  `fuel_cap` tinyint(1) NOT NULL DEFAULT 1,
  `aeriel` tinyint(1) NOT NULL DEFAULT 1,
  `floor_mat` tinyint(1) NOT NULL DEFAULT 1,
  `tools` tinyint(1) NOT NULL DEFAULT 1,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `spare_wheel_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `spare_wheel_description` text DEFAULT NULL,
  `fuel_cap_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `fuel_cap_description` text DEFAULT NULL,
  `floor_mat_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `floor_mat_description` text DEFAULT NULL,
  `aerial_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `aerial_description` text DEFAULT NULL,
  `tools_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `tools_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_damage_reports_car_id_foreign` (`car_id`),
  CONSTRAINT `car_damage_reports_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table car_extras
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_extras`;

CREATE TABLE `car_extras` (
  `id` char(36) NOT NULL,
  `car_id` char(36) NOT NULL,
  `is_taxed` tinyint(1) NOT NULL DEFAULT 1,
  `tax_expiry_date` date DEFAULT NULL,
  `tax_amount` decimal(11,2) DEFAULT NULL,
  `tax_type` varchar(191) DEFAULT NULL COMMENT 'monthly, yearly',
  `mots` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'car mots',
  `service` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'car servicing',
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'car documents',
  `finance` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'car finance',
  `damage_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'car finance',
  `repairs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'car finance',
  `subscriptions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'car subscriptions',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_extras_car_id_foreign` (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `car_extras` WRITE;
/*!40000 ALTER TABLE `car_extras` DISABLE KEYS */;

INSERT INTO `car_extras` (`id`, `car_id`, `is_taxed`, `tax_expiry_date`, `tax_amount`, `tax_type`, `mots`, `service`, `documents`, `finance`, `damage_history`, `repairs`, `subscriptions`, `created_at`, `updated_at`) VALUES
	("a05aed53-0951-47be-81d2-44b5fb752497", "a05aed52-e6cd-4014-9ba8-1ae88d999b5a", 1, "2025-11-14", 33, "monthly", "[{\"test_date\":\"2025-11-14\",\"expiry_date\":\"2025-11-15\",\"result\":\"pass\",\"details\":\"asdfasdf\"}]", "[{\"last_service_date\":\"2025-11-14\",\"next_service_date\":\"2025-11-06\",\"last_service_mileage\":\"44\",\"next_service_mileage\":\"44\"}]", "[{\"document_type\":\"sfsaf\",\"document_name\":\"sdfsd\",\"upload_date\":\"2025-11-14\",\"expiry_date\":\"2025-11-21\",\"action_type\":\"asdfsdf\",\"action_date\":\"2025-11-20\",\"file\":\"https:\\/\\/animotor.ddev.site\\/storage\\/photos\\/9a9ede47-d4e9-4205-b546-c6437d4914f5\\/1763124156_Screenshot_20251111_175519.png\"}]", "{\"finance_type\":\"sdsadf\",\"purchase_price\":\"33\",\"agreement_number\":\"3333\",\"funder_name\":\"asdfa\",\"agreement_start_date\":\"2025-11-13\",\"agreement_end_date\":\"2025-11-14\",\"loan_amount\":\"33\",\"repayment_frequency\":\"33\",\"amount\":\"33\"}", "[{\"reported_date\":\"2025-11-14\",\"incident_date\":\"2025-11-07\",\"insurance_reference_no\":\"asdfsdf\",\"total_claim_cost\":\"33\",\"status\":\"open\"}]", "[{\"booking_id\":\"asdfds\",\"booking_date\":\"2025-11-14\",\"date_time\":\"2025-11-14 18:13\",\"mileage_at_repair\":\"asd\",\"workshop_name\":\"fsdfadsfsd\",\"repair_type\":\"fsdfs\",\"total_cost\":\"343\",\"vat\":\"4343\",\"invoice\":\"https:\\/\\/animotor.ddev.site\\/storage\\/files\\/9a9ede47-d4e9-4205-b546-c6437d4914f5\\/1763124237_Screenshot_20251111_175519.png\"}]", NULL, "2025-11-14 12:38:11", "2025-11-14 12:43:57");

/*!40000 ALTER TABLE `car_extras` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table car_rentals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_rentals`;

CREATE TABLE `car_rentals` (
  `id` char(36) NOT NULL,
  `car_id` char(36) NOT NULL,
  `rental_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_rentals_rental_id_foreign` (`rental_id`),
  KEY `car_rentals_car_id_foreign` (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table cars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `price_per_day` decimal(8,2) NOT NULL DEFAULT 10.00,
  `model` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gear` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `door` int(11) DEFAULT NULL,
  `vehicle_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_instruction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off_instruction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extras` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracker_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_coverage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `important_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `damage_excess` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_deposit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seats` int(11) NOT NULL DEFAULT 4,
  `mileage` int(11) NOT NULL DEFAULT 0 COMMENT '0 for unlimited',
  `insurance_fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `price_per_mileage` decimal(8,2) NOT NULL DEFAULT 0.00,
  `air_condition` tinyint(1) NOT NULL DEFAULT 0,
  `cancellation_fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `bags` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1 large bag',
  `bags_large` int(3) DEFAULT NULL,
  `deposit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `region_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_packages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_group` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_out` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `date_due` datetime DEFAULT NULL,
  `time_due` datetime DEFAULT NULL,
  `driver` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `commission_fee` decimal(10,2) DEFAULT NULL,
  `daily_rate` decimal(10,2) DEFAULT NULL,
  `weekly_rate` decimal(10,2) DEFAULT NULL,
  `monthly_rate` decimal(10,2) DEFAULT NULL,
  `dynamic_pricings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `mileage_policy` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage_limit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excess_mileage_rate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancellation_policy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `private_hire` tinyint(1) NOT NULL DEFAULT 0,
  `licensing_authority` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phv_plate_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phv_expiry_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_insurance_expiry` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plate_certificate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_insurance_proof` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term` tinyint(1) NOT NULL DEFAULT 0,
  `long_term` tinyint(1) NOT NULL DEFAULT 0,
  `rent_to_buy` tinyint(1) NOT NULL DEFAULT 0,
  `short_term_minimum_term` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term_maximum_term` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term_pricing_cadence` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term_weekly_price_wo_ins` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term_weekly_price_w_ins` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term_maintenance_included` tinyint(1) NOT NULL DEFAULT 0,
  `short_term_deposit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term_excess_liability` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term_early_return_fee` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_term_notice_period_to_return` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_term_billing_cycle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_term_default_deposit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_term_term_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `long_term_prices` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `long_term_excess_liability` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_term_vehicle_swap_allowed` tinyint(1) NOT NULL DEFAULT 0,
  `long_term_early_termination_rules` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_term` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_billing_cycle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_price_per_cycle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_deposit_amount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_balloon_payment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_payment_break_weeks_year` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_mileage_allowance_per_cycle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_excess_mileage_rate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to_buy_insurance_included` tinyint(1) NOT NULL DEFAULT 0,
  `rent_to_buy_maintenance_included` tinyint(1) NOT NULL DEFAULT 0,
  `rent_to_buy_ev_incentive_included` tinyint(1) NOT NULL DEFAULT 0,
  `rent_to_buy_ownership_transfer_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_pick` int(1) NOT NULL DEFAULT 0,
  `ideal_for_family` int(1) NOT NULL DEFAULT 0,
  `pickup` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`pickup`)),
  `dropup` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dropup`)),
  `free_cancellation` tinyint(1) NOT NULL DEFAULT 0,
  `collision_damage_waiver` tinyint(1) NOT NULL DEFAULT 0,
  `theft_protection` tinyint(1) NOT NULL DEFAULT 0,
  `unlimited_mileage` tinyint(1) NOT NULL DEFAULT 0,
  `vehicle_features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`vehicle_features`)),
  `daily_rate_tax_incl` tinyint(1) NOT NULL DEFAULT 1,
  `weekly_rate_tax_incl` tinyint(1) NOT NULL DEFAULT 1,
  `monthly_rate_tax_incl` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `top_pick` (`top_pick`),
  KEY `ideal_for_family` (`ideal_for_family`),
  KEY `bags_large` (`bags_large`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;

INSERT INTO `cars` (`id`, `driver_id`, `title`, `make`, `is_available`, `price_per_day`, `model`, `type`, `year`, `color`, `gear`, `door`, `vehicle_no`, `image`, `youtube_link`, `photos`, `pickup_instruction`, `drop_off_instruction`, `extras`, `description`, `registration_number`, `tracker_no`, `license_no`, `body_type`, `fuel_type`, `engine_size`, `mileage_text`, `insurance_coverage`, `important_text`, `damage_excess`, `security_deposit`, `requirements`, `seats`, `mileage`, `insurance_fee`, `price_per_mileage`, `air_condition`, `cancellation_fee`, `bags`, `bags_large`, `deposit`, `created_at`, `updated_at`, `region_id`, `rental_packages`, `country`, `state`, `city`, `company_id`, `insurance_group`, `date_out`, `time_out`, `date_due`, `time_due`, `driver`, `commission_fee`, `daily_rate`, `weekly_rate`, `monthly_rate`, `dynamic_pricings`, `is_approved`, `mileage_policy`, `mileage_limit`, `excess_mileage_rate`, `cancellation_policy`, `vehicle_photos`, `private_hire`, `licensing_authority`, `phv_plate_number`, `phv_expiry_date`, `hr_insurance_expiry`, `plate_certificate`, `hr_insurance_proof`, `short_term`, `long_term`, `rent_to_buy`, `short_term_minimum_term`, `short_term_maximum_term`, `short_term_pricing_cadence`, `short_term_weekly_price_wo_ins`, `short_term_weekly_price_w_ins`, `short_term_maintenance_included`, `short_term_deposit`, `short_term_excess_liability`, `short_term_early_return_fee`, `short_term_notice_period_to_return`, `long_term_billing_cycle`, `long_term_default_deposit`, `long_term_term_options`, `long_term_prices`, `long_term_excess_liability`, `long_term_vehicle_swap_allowed`, `long_term_early_termination_rules`, `rent_to_buy_term`, `rent_to_buy_billing_cycle`, `rent_to_buy_price_per_cycle`, `rent_to_buy_deposit_amount`, `rent_to_buy_balloon_payment`, `rent_to_buy_payment_break_weeks_year`, `rent_to_buy_mileage_allowance_per_cycle`, `rent_to_buy_excess_mileage_rate`, `rent_to_buy_insurance_included`, `rent_to_buy_maintenance_included`, `rent_to_buy_ev_incentive_included`, `rent_to_buy_ownership_transfer_notes`, `top_pick`, `ideal_for_family`, `pickup`, `dropup`, `free_cancellation`, `collision_damage_waiver`, `theft_protection`, `unlimited_mileage`, `vehicle_features`, `daily_rate_tax_incl`, `weekly_rate_tax_incl`, `monthly_rate_tax_incl`) VALUES
	("a05aed52-e6cd-4014-9ba8-1ae88d999b5a", NULL, "Lorem Ipsum", "Acura", 1, 10, "MDX", "Hatchback", "2024", "Black", "Automatic", 3, "HMFPK1782P", NULL, "aqz-KE-bpKQ", NULL, "asdfas asdfas dfasdfd", "ad fasdfadsfasfasfasdf sdfad", "[{\"title\":\"dsfsda\",\"price\":\"33\",\"description\":\"fsdf\",\"interval\":\"daily\"}]", "Lorem Ipsum De Generate", "HMFPK1782P", NULL, "HMFPK1782P", NULL, NULL, NULL, "<p>asdfsadf</p>", "[{\"level\":\"basic\",\"cover\":\"asdf\",\"cover_descr\":\"<p>aasdfadsfasdf<\\/p>\",\"daily_price\":\"343\",\"excess\":\"343\"}]", "<p>sdfsaf</p>", "<p>asfsadf</p>", "<p>sdfdsaf</p>", "<p>sfsdaf</p>", 5, 0, 0, 0, 1, 0, "4", 8, 400, "2025-11-14 12:38:11", "2025-11-14 12:45:10", "a05ac570-b1f0-4406-a583-2a12ed97c1de", NULL, NULL, NULL, NULL, "a05aed52-e30a-4605-97f4-c5e332ab6765", NULL, NULL, NULL, NULL, NULL, "{\"name\":null,\"photo\":null,\"years_experience\":null,\"special_skills\":null,\"primary_language\":null,\"additional_languages\":null,\"area_expertise\":null,\"tour_guide_experience\":null,\"driving_licenses\":null,\"certifications\":null,\"customer_reviews\":null,\"overall_rating\":null,\"work_hours\":null,\"days_off\":null,\"phone_number\":null,\"email_address\":null,\"working_hours\":null,\"driver_breaks\":null,\"accommodation\":null,\"food\":null,\"toll_tax\":null,\"dropoff_location\":null,\"miscellaneous\":null}", 44, 44, 44, 44, "[{\"rule_name\":\"asdf\",\"adjustment_type\":\"percentage_increase\",\"adjustment_value\":\"33\",\"start_date\":\"2025-11-15\",\"end_date\":\"2026-01-30\",\"status\":1}]", 1, "", "", "", "", "[\"https:\\/\\/animotor.ddev.site\\/storage\\/files\\/9a9ede47-d4e9-4205-b546-c6437d4914f5\\/1763124295_Screenshot_20251111_175519.png\"]", 1, "Leeds City Council", "HMFPK1782P", "2025-11-14", "2026-04-14", "https://animotor.ddev.site/storage/files/9a9ede47-d4e9-4205-b546-c6437d4914f5/1763124007_Screenshot_20251111_175519.png", "https://animotor.ddev.site/storage/files/9a9ede47-d4e9-4205-b546-c6437d4914f5/1763124007_Screenshot_20251111_175519.png", 1, 1, 1, "4", NULL, NULL, "34", "33", 1, "3", "33", "33", "33", "weekly", "33", "[\"3m\",\"6m\",\"9m\"]", "{\"3m\":{\"price_wo_ins\":\"3\",\"price_w_ins\":\"3\",\"maintenance_included\":0,\"maintenance_type\":\"basic\",\"maintenance_price\":\"33\",\"mileage\":\"33\",\"excess_rate\":\"33\"},\"6m\":{\"price_wo_ins\":\"3\",\"price_w_ins\":\"3\",\"maintenance_type\":\"basic\",\"maintenance_price\":\"33\",\"mileage\":\"33\",\"excess_rate\":\"33\"},\"9m\":{\"price_wo_ins\":\"3\",\"price_w_ins\":\"3\",\"maintenance_type\":\"basic\",\"maintenance_price\":\"33\",\"mileage\":\"33\",\"excess_rate\":\"33\"}}", "333", 1, "Loerm pisdfdf", "3", "weekly", "33", "33", "33", "3", "33", "33", 1, 1, 1, "33adfadsfadsf", 1, 1, "[{\"location\":\"Jaipur\",\"latitude\":\"26.9124336\",\"longitude\":\"75.7872709\"},{\"location\":\"Alwar\",\"latitude\":\"27.5529907\",\"longitude\":\"76.6345735\"}]", "[{\"location\":\"Jaipur\",\"latitude\":\"26.9124336\",\"longitude\":\"75.7872709\"},{\"location\":\"Alwar\",\"latitude\":\"27.5529907\",\"longitude\":\"76.6345735\"}]", 1, 1, 1, 1, "[\"Air Conditioning\",\"Bluetooth\",\"GPS Navigation\"]", 1, 1, 1);

/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'doctor',
  `status` varchar(191) NOT NULL DEFAULT 'active',
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `tin` varchar(191) DEFAULT NULL,
  `contact_name` varchar(191) DEFAULT NULL,
  `contact_phone` varchar(191) DEFAULT NULL,
  `contact_email` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trading_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registration_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `business_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `incorporation_date` date DEFAULT NULL,
  `company_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `finance_contact_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `operating_license` varchar(255) DEFAULT NULL,
  `finance_contact_email` varchar(255) DEFAULT NULL,
  `finance_contact_phone` varchar(255) DEFAULT NULL,
  `support_contact_name` varchar(255) DEFAULT NULL,
  `support_contact_email` varchar(255) DEFAULT NULL,
  `support_contact_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `name`, `address`, `postal_code`, `city`, `logo`, `state`, `country`, `tin`, `contact_name`, `contact_phone`, `contact_email`, `created_at`, `updated_at`, `trading_name`, `registration_no`, `business_email`, `incorporation_date`, `company_type`, `finance_contact_name`, `timezone`, `operating_license`, `finance_contact_email`, `finance_contact_phone`, `support_contact_name`, `support_contact_email`, `support_contact_phone`) VALUES
	("a05aed52-e30a-4605-97f4-c5e332ab6765", "Animotor", "adsf asdfa dfa dsfasdfas fdf", NULL, NULL, NULL, NULL, NULL, NULL, "animotor", "0945348011", "admin@taxi.com", "2025-11-14 12:38:11", "2025-11-14 12:38:11", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	("a0610765-fe77-4c0a-aa10-026196d3dfe7", "User", "asdfsdd", "234324", NULL, NULL, NULL, "Bahamas", NULL, "Test", "+91-8441872796", "arun@gmail.com", "2025-11-17 13:26:03", "2025-11-17 13:26:03", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	("a062a004-a90e-4cd3-a1a2-8fd25f84acd9", "Lorem", "397, Near Mamta School, Hasanpura A, Jaipur - 302006, RJ, India", "302006", NULL, NULL, NULL, "9a9ede47-de7b-4c54-bbab-2ce56fc28d69", NULL, "Test", "+918441934533", "admin@gmail.com", "2025-11-18 08:28:38", "2025-11-18 08:50:35", "asdfasd", "ASDF12345678", "test@gmail.com", "2025-11-06", "plc", "asdf", "IST", "8767867678", "asdf1@gmail.com", "+918441934523", "asdfa", "asdf2@gmail.com", "+918441934523");

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table company_branches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company_branches`;

CREATE TABLE `company_branches` (
  `id` char(36) NOT NULL,
  `company_id` char(36) NOT NULL,
  `branch_name` varchar(191) NOT NULL,
  `branch_phone` varchar(191) DEFAULT NULL,
  `branch_address` text DEFAULT NULL,
  `branch_postcode` varchar(191) DEFAULT NULL,
  `branch_country` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `company_branches` WRITE;
/*!40000 ALTER TABLE `company_branches` DISABLE KEYS */;

INSERT INTO `company_branches` (`id`, `company_id`, `branch_name`, `branch_phone`, `branch_address`, `branch_postcode`, `branch_country`, `created_at`, `updated_at`) VALUES
	("a056d518-4080-4be8-b6e1-591376398701", "a056d1bb-d6d2-48a3-931c-ffb9bdae61ec", "Branch 1", "654564654534135", "pak wheel branch 1 address", "1223345", NULL, "2025-11-12 06:47:07", "2025-11-12 06:47:07"),
	("a056ff34-a8d0-4f40-bc9b-aaa27c04de36", "a056dd6a-9ad3-4f07-a365-db7cee33fa86", "Branch 1", "6542654564654564", "branch 1 address", "1645645645", NULL, "2025-11-12 08:44:52", "2025-11-12 08:44:52"),
	("a05713e9-62f0-4fa9-9b32-9d5432c097cb", "a05712d6-a80b-440b-bed5-b30d148e2696", "Branch 1", "65426546544", "Branch 1 adress", "654265454584", NULL, "2025-11-12 09:42:46", "2025-11-12 09:42:46"),
	("a0572ad2-391f-49dc-ac11-259078fe0dea", "a05729e8-f33a-48dd-b050-17b8b1311eca", "Branch 1", "654264564654", "Branch 1 adress", "56456455", NULL, "2025-11-12 10:46:50", "2025-11-12 10:46:50"),
	("a062a91c-0d4c-4205-bfa6-8d7d786790c5", "a062a004-a90e-4cd3-a1a2-8fd25f84acd9", "asdff", "+918441934526", "asdf", "234234", NULL, "2025-11-18 08:54:04", "2025-11-18 08:54:04");

/*!40000 ALTER TABLE `company_branches` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table company_finance_infos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company_finance_infos`;

CREATE TABLE `company_finance_infos` (
  `id` char(36) NOT NULL,
  `company_id` char(36) NOT NULL,
  `preferred_currency` varchar(3) DEFAULT NULL,
  `tax_profile` varchar(191) DEFAULT NULL,
  `tax_id` varchar(191) DEFAULT NULL,
  `reverse_charge` varchar(200) DEFAULT NULL,
  `payout_type` varchar(200) DEFAULT NULL,
  `iban` varchar(191) DEFAULT NULL,
  `account_title` varchar(191) DEFAULT NULL,
  `sort_code` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `company_finance_infos` WRITE;
/*!40000 ALTER TABLE `company_finance_infos` DISABLE KEYS */;

INSERT INTO `company_finance_infos` (`id`, `company_id`, `preferred_currency`, `tax_profile`, `tax_id`, `reverse_charge`, `payout_type`, `iban`, `account_title`, `sort_code`, `created_at`, `updated_at`) VALUES
	("a05684b8-1a04-4577-a548-54c7ad2d9693", "a04d51a2-2444-4ca8-ba50-d3ddf1a7cde4", "EUR", "GST", "21321322331", "partial", "wallet", "GB295465452541545", NULL, NULL, "2025-11-12 03:02:22", "2025-11-12 05:05:41"),
	("a056d245-b3d4-456f-bc8a-1dee179f61c7", "a056d1bb-d6d2-48a3-931c-ffb9bdae61ec", "GBP", "GST", "1211564564555", "no", "bank", "GB2954564154584545", NULL, NULL, "2025-11-12 06:39:14", "2025-11-12 06:45:02"),
	("a056e2ff-b413-494c-833c-5a238f784928", "a056dd6a-9ad3-4f07-a365-db7cee33fa86", "EUR", "GST", "2131231232123", "1", "bank", "GB68465412645654545", "test account", "12345", "2025-11-12 07:26:00", "2025-11-12 08:44:14"),
	("a0571311-7e08-4063-ab85-97eab3ea85c1", "a05712d6-a80b-440b-bed5-b30d148e2696", "GBP", "VAT", "65465416545", "yes", "bank", "GB65456456454545", NULL, NULL, "2025-11-12 09:40:25", "2025-11-12 09:42:26"),
	("a0572a41-8d06-4371-b34b-2e3e4b6e411e", "a05729e8-f33a-48dd-b050-17b8b1311eca", "GBP", "VAT", "6545546545455", "yes", "bank", "GB654564545646545458", NULL, NULL, "2025-11-12 10:45:15", "2025-11-12 10:46:29"),
	("a062a607-4fb2-4de6-a984-cc945e0ebf4e", "a062a004-a90e-4cd3-a1a2-8fd25f84acd9", "CAD", "GST", "HMFPK1897P", "yes", "bank", "GB29NWBK60161331926819", NULL, NULL, "2025-11-18 08:45:27", "2025-11-18 08:51:58");

/*!40000 ALTER TABLE `company_finance_infos` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table complaints
# ------------------------------------------------------------

DROP TABLE IF EXISTS `complaints`;

CREATE TABLE `complaints` (
  `id` char(36) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `ride_id` char(36) NOT NULL,
  `complain` text DEFAULT NULL,
  `by` varchar(191) NOT NULL DEFAULT 'rider',
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `driver` varchar(191) DEFAULT NULL,
  `rider` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `complaints_ride_id_foreign` (`ride_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` char(36) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `dial_code` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `flag` varchar(191) DEFAULT NULL,
  `currency_name` varchar(191) DEFAULT NULL,
  `currency_code` varchar(191) DEFAULT NULL,
  `currency_symbol` varchar(191) DEFAULT NULL,
  `dial_min_length` varchar(191) DEFAULT NULL,
  `dial_max_length` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `name`, `dial_code`, `code`, `flag`, `currency_name`, `currency_code`, `currency_symbol`, `dial_min_length`, `dial_max_length`, `is_active`, `created_at`, `updated_at`) VALUES
	("9a9ede47-da33-47fc-b3a8-0ea58f2b0542", "Afghanistan", "+93", "AF", "AF.png", "afghani", "AFN", "؋", "9", "9", 1, "2023-11-16 12:00:47", "2025-04-30 11:56:17"),
	("9a9ede47-db3a-4638-bfcd-8be28e037004", "Albania", "+355", "AL", "AL.png", "lek", "ALL", "Lek", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-dcbe-4093-bae4-d4cabcc9b96a", "Antarctica", "+672", "AQ", "AQ.png", "", "", "", "6", "6", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-dd7e-49e1-b015-8294520a83a1", "Algeria", "+213", "DZ", "DZ.png", "Algerian dinar", "DZD", "DZD", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-de7b-4c54-bbab-2ce56fc28d69", "American Samoa", "+1", "AS", "AS.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-df49-491e-bef3-0bae9a83f94b", "Andorra", "+376", "AD", "AD.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e03b-457d-bd28-e30a91c7120d", "Angola", "+244", "AO", "AO.png", "kwanza", "AOA", "Kz", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e11b-442a-aac9-619d3a29b790", "Antigua and Barbuda", "+1", "AG", "AG.png", "East Caribbean dollar", "XCD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e1f4-465b-8936-e410b982d5e1", "Azerbaijan", "+994", "AZ", "AZ.png", "Azerbaijani manat", "AZN", "ман", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e2b9-4120-b691-43e56a6b1e99", "Argentina", "+54", "AR", "AR.png", "Argentine peso", "ARS", "$", "10", "12", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e38a-4379-89b5-19a0beac8759", "Australia", "+61", "AU", "AU.png", "Australian dollar", "AUD", "$", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e44f-48d8-87e9-1ea5d2d949b4", "Austria", "+43", "AT", "AT.png", "euro", "EUR", "€", "13", "13", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e522-415c-8294-a567412ff8cf", "Bahamas", "+1", "BS", "BS.png", "Bahamian dollar", "BSD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e5ee-4f1b-baba-7f70a5cd7724", "Bahrain", "+973", "BH", "BH.png", "Bahraini dinar", "BHD", "BHD", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e6ba-4b7d-a521-bfdcc0f9c822", "Bangladesh", "+880", "BD", "BD.png", "taka (inv.)", "BDT", "BDT", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e78f-43ca-945a-b0f690c659e5", "Armenia", "+374", "AM", "AM.png", "dram (inv.)", "AMD", "AMD", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e858-44b2-8531-43c31bc4217e", "Barbados", "+1", "BB", "BB.png", "Barbados dollar", "BBD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e931-4d2f-8415-3c560b62c87a", "Belgium", "+32", "BE", "BE.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-e9f8-4200-bb11-1a294bca8c4a", "Bermuda", "+1", "BM", "BM.png", "Bermuda dollar", "BMD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-eac2-43cb-b7ca-9b5e4c5d6156", "Bhutan", "+975", "BT", "BT.png", "ngultrum (inv.)", "BTN", "BTN", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-eb9a-4da9-9603-159f6b80238a", "Bolivia, Plurinational State of", "+591", "BO", "BO.png", "boliviano", "BOB", "$b", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-ec72-49a8-9461-0a50a9912f4a", "Bosnia and Herzegovina", "+387", "BA", "BA.png", "convertible mark", "BAM", "KM", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-ed31-4887-a7c3-a74b93959ebd", "Botswana", "+267", "BW", "BW.png", "pula (inv.)", "BWP", "P", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-edf9-49ef-98ce-64d8c9ef72a7", "Bouvet Island", "+47", "BV", "BV.png", "1", "4", "kr", "15", "15", 1, "2023-11-16 12:00:47", "2025-01-28 01:40:16"),
	("9a9ede47-eeb3-4100-925f-aa8e6df5b286", "Brazil", "+55", "BR", "BR.png", "real (pl. reais)", "BRL", "R$", "11", "11", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-ef77-4643-b2a1-667e3c7b68e6", "Belize", "+501", "BZ", "BZ.png", "Belize dollar", "BZD", "BZ$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f046-467b-802b-eb5b9e5b9618", "British Indian Ocean Territory", "+246", "IO", "IO.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f113-4f1d-ae7e-12d9d07872f5", "Solomon Islands", "+677", "SB", "SB.png", "Solomon Islands dollar", "SBD", "$", "5", "5", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f1f4-4e4b-b9b1-14cbb05b0af3", "Virgin Islands, British", "+1", "VG", "VG.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f2cb-49bd-9fb0-9128340604b8", "Brunei Darussalam", "+673", "BN", "BN.png", "Brunei dollar", "BND", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f3b1-4d2d-9172-0f624033f773", "Bulgaria", "+359", "BG", "BG.png", "lev (pl. leva)", "BGN", "лв", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f481-4ce0-ad8c-d0ce47552db0", "Myanmar", "+95", "MM", "MM.png", "kyat", "MMK", "K", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f54a-488d-98d9-2a1b95d1c3a8", "Burundi", "+257", "BI", "BI.png", "Burundi franc", "BIF", "BIF", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f618-4853-a7cc-cc2d7f282647", "Belarus", "+375", "BY", "BY.png", "Belarusian rouble", "BYR", "p.", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f6ec-4bb6-909a-20afd032d84b", "Cambodia", "+855", "KH", "KH.png", "riel", "KHR", "៛", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f7d0-4f9a-8758-1e8de4a7e72a", "Cameroon", "+237", "CM", "CM.png", "CFA franc (BEAC)", "XAF", "FCF", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f8ba-4175-a987-01d12b4529c8", "Canada", "+1", "CA", "CA.png", "Canadian dollar", "CAD", "$", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-f98b-4893-b85a-1b0a61edb89e", "Cape Verde", "+238", "CV", "CV.png", "Cape Verde escudo", "CVE", "CVE", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-fa54-4241-af9c-4fe0639183a4", "Cayman Islands", "+1", "KY", "KY.png", "Cayman Islands dollar", "KYD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-fb1f-4031-9030-e37c8aea64b9", "Central African Republic", "+236", "CF", "CF.png", "CFA franc (BEAC)", "XAF", "CFA", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-fbe2-406a-9622-dd6cc32ce5c3", "Sri Lanka", "+94", "LK", "LK.png", "Sri Lankan rupee", "LKR", "₨", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-fca7-4ef3-81f5-35571093c937", "Chad", "+235", "TD", "TD.png", "CFA franc (BEAC)", "XAF", "XAF", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-fd66-498d-9da3-8f54a3640fa8", "Chile", "+56", "CL", "CL.png", "Chilean peso", "CLP", "CLP", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-fe36-4b0e-aac9-d67d28946254", "China", "+86", "CN", "CN.png", "renminbi-yuan (inv.)", "CNY", "¥", "12", "12", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-ff0a-402d-a49d-eca00564ad68", "Taiwan, Province of China", "+886", "TW", "TW.png", "new Taiwan dollar", "TWD", "NT$", "12", "12", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede47-ffdd-4b9d-9895-6f4b965e680a", "Christmas Island", "+61", "CX", "CX.png", "Australian dollar", "AUD", "$", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-00b7-46b1-8687-3a151ea880a8", "Cocos (Keeling) Islands", "+61", "CC", "CC.png", "Australian dollar", "AUD", "$", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0191-4cb3-8dfd-447334c62520", "Colombia", "+57", "CO", "CO.png", "Colombian peso", "COP", "$", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0286-4d5b-9da1-d58ea6e37911", "Comoros", "+269", "KM", "KM.png", "Comorian franc", "KMF", "KMF", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-037d-434c-b6be-efa385bf2185", "Mayotte", "+262", "YT", "YT.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0464-42a7-86c3-d3f74e36ce76", "Congo", "+242", "CG", "CG.png", "CFA franc (BEAC)", "XAF", "FCF", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-054d-41f9-901a-c7c8f1c49ee4", "Congo, the Democratic Republic of the Congo", "+243", "CD", "CD.png", "Congolese franc", "CDF", "CDF", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0631-482b-8aec-9dc98a111c36", "Cook Islands", "+682", "CK", "CK.png", "New Zealand dollar", "NZD", "$", "5", "5", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-071b-4d89-b3a8-50aee6c09d8f", "Costa Rica", "+506", "CR", "CR.png", "Costa Rican colón (pl. colones)", "CRC", "₡", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-07fc-4e95-8f8d-2e57984b07df", "Croatia", "+385", "HR", "HR.png", "kuna (inv.)", "HRK", "kn", "12", "12", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-08f2-45a0-acde-0b1b9cc9bf3e", "Cuba", "+53", "CU", "CU.png", "Cuban peso", "CUP", "₱", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-09dc-4461-813f-22bd728593f7", "Cyprus", "+357", "CY", "CY.png", "euro", "EUR", "CYP", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0acd-4acb-82f7-ff8071dd2596", "Czech Republic", "+420", "CZ", "CZ.png", "Czech koruna (pl. koruny)", "CZK", "Kč", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0ba9-4919-a770-cc56415d271b", "Benin", "+229", "BJ", "BJ.png", "CFA franc (BCEAO)", "XOF", "XOF", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0c91-45dd-9246-a45b9896a660", "Denmark", "+45", "DK", "DK.png", "Danish krone", "DKK", "kr", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0d64-4dfa-a78f-b174ad37d770", "Dominica", "+1", "DM", "DM.png", "East Caribbean dollar", "XCD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0e4e-4b86-abfc-f3591c168c04", "Dominican Republic", "+1", "DO", "DO.png", "Dominican peso", "DOP", "RD$", "12", "12", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-0f33-47cd-9a73-dec04af5e5c8", "Ecuador", "+593", "EC", "EC.png", "US dollar", "USD", "$", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1020-4488-9a13-30a9ab0ec361", "El Salvador", "+503", "SV", "SV.png", "Salvadorian colón (pl. colones)", "SVC", "$", "11", "11", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1105-4050-aae6-96592bcd1e04", "Equatorial Guinea", "+240", "GQ", "GQ.png", "CFA franc (BEAC)", "XAF", "FCF", "6", "6", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-11f7-4e66-a991-2a574f2b5546", "Ethiopia", "+251", "ET", "ET.png", "birr (inv.)", "ETB", "ETB", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-12f2-459d-b585-85ac83becc3f", "Eritrea", "+291", "ER", "ER.png", "nakfa", "ERN", "Nfk", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-13ea-465b-af07-094bd246b66c", "Estonia", "+372", "EE", "EE.png", "euro", "EUR", "kr", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-14ef-45ed-ad5b-e0181e0dcec0", "Faroe Islands", "+298", "FO", "FO.png", "Danish krone", "DKK", "kr", "6", "6", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-15d6-4aa5-8cfd-168a52e10cdb", "Falkland Islands (Malvinas)", "+500", "FK", "FK.png", "Falkland Islands pound", "FKP", "£", "5", "5", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-16cf-40e5-97c5-a95646455aec", "South Georgia and the South Sandwich Islands", "+44", "GS", "GS.png", "", "", "£", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-17ba-46f2-9290-515fa07f2df7", "Fiji", "+679", "FJ", "FJ.png", "Fiji dollar", "FJD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-18b8-4255-9e56-2748eb9eaaad", "Finland", "+358", "FI", "FI.png", "euro", "EUR", "€", "12", "12", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-199c-4788-b76f-45c3dc0ecfdf", "France", "+33", "FR", "FR.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1a8e-423f-bd31-0007eeb48aa5", "French Guiana", "+594", "GF", "GF.png", "euro", "EUR", "€", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1b6d-4fba-81bf-39a79e2f42e5", "French Polynesia", "+689", "PF", "PF.png", "CFP franc", "XPF", "XPF", "6", "6", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1c61-4695-81bc-f287a14b9384", "French Southern Territories", "+33", "TF", "TF.png", "euro", "EUR", "€", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1d3a-4ad5-b5c1-434b0e5df5a6", "Djibouti", "+253", "DJ", "DJ.png", "Djibouti franc", "DJF", "DJF", "6", "6", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1e13-4546-97ff-3ce194120d9d", "Gabon", "+241", "GA", "GA.png", "CFA franc (BEAC)", "XAF", "FCF", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1ef5-4748-aebc-9db504b591b5", "Georgia", "+995", "GE", "GE.png", "lari", "GEL", "GEL", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-1fd9-4788-8b5e-841dec64dc5b", "Gambia", "+220", "GM", "GM.png", "dalasi (inv.)", "GMD", "D", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-20df-48dc-ac0c-eca7026a3527", "Palestinian Territory, Occupied", "+970", "PS", "PS.png", NULL, NULL, "₪", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-21cd-4221-86db-5569181734bf", "Germany", "+49", "DE", "DE.png", "euro", "EUR", "€", "9", "13", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-22bd-4d7e-a545-288a09dd9823", "Ghana", "+233", "GH", "GH.png", "Ghana cedi", "GHS", "¢", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-23b4-4caf-a9b5-dd231145aea2", "Gibraltar", "+350", "GI", "GI.png", "Gibraltar pound", "GIP", "£", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-24bb-47b9-a901-7465a8d43993", "Kiribati", "+686", "KI", "KI.png", "Australian dollar", "AUD", "$", "5", "5", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-25a9-49f1-bf48-57adc9dc9af0", "Greece", "+30", "GR", "GR.png", "euro", "EUR", "€", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-269b-42ff-a815-40a04d2c6db7", "Greenland", "+299", "GL", "GL.png", "Danish krone", "DKK", "kr", "6", "6", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-27cb-48dd-9fde-f545e50f0dab", "Grenada", "+1", "GD", "GD.png", "East Caribbean dollar", "XCD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-28cc-4e3e-a076-8497c8a8fa4f", "Guadeloupe", "+590", "GP", "GP.png", "euro", "EUR ", "€", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-29c0-4883-9c35-ccc8ffc1ade8", "Guam", "+1", "GU", "GU.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-2a8b-4df1-8047-9813495b0abb", "Guatemala", "+502", "GT", "GT.png", "quetzal (pl. quetzales)", "GTQ", "Q", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-2b54-45c1-95df-aec47cfc9afd", "Guinea", "+224", "GN", "GN.png", "Guinean franc", "GNF", "GNF", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-2c1e-4e94-9efc-700c8aec6bf2", "Guyana", "+592", "GY", "GY.png", "Guyana dollar", "GYD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-2d03-43f7-8329-1b3755ce9685", "Haiti", "+509", "HT", "HT.png", "gourde", "HTG", "G", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-2dd1-42a1-8627-80caf8ebbb9e", "Heard Island and McDonald Islands", "+61", "HM", "HM.png", "", "", "$", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-2ea3-427a-8def-12441b124dd3", "Holy See (Vatican City State)", "+39", "VA", "VA.png", "euro", "EUR", "€", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-2f6e-499a-8aa7-2b35f1657025", "Honduras", "+504", "HN", "HN.png", "lempira", "HNL", "L", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-304a-4ab5-9863-07730b098d9e", "Hong Kong", "+852", "HK", "HK.png", "Hong Kong dollar", "HKD", "$", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3138-49e5-8835-4960b20cda6c", "Hungary", "+36", "HU", "HU.png", "forint (inv.)", "HUF", "Ft", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3208-4685-9b5f-5a4380bfcb8a", "Iceland", "+354", "IS", "IS.png", "króna (pl. krónur)", "ISK", "kr", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-32dc-4335-8c4f-b4931f69bed5", "India", "+91", "IN", "IN.png", "Indian rupee", "INR", "₹", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-33b0-4f6a-a058-e95451e04168", "Indonesia", "+62", "ID", "ID.png", "Indonesian rupiah (inv.)", "IDR", "Rp", "13", "13", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-347f-4116-b95a-434d92fa4cf8", "Iran, Islamic Republic of", "+98", "IR", "IR.png", "Iranian rial", "IRR", "﷼", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3549-4966-b543-5143bdb40f7a", "Iraq", "+964", "IQ", "IQ.png", "Iraqi dinar", "IQD", "IQD", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-360d-4762-be89-02c4b36b0c0d", "Ireland", "+353", "IE", "IE.png", "euro", "EUR", "€", "7", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-36d7-40e0-af9b-0f9ccb1ceab8", "Israel", "+972", "IL", "IL.png", "shekel", "ILS", "₪", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-37a6-4098-8784-0066885f70fd", "Italy", "+39", "IT", "IT.png", "euro", "EUR", "€", "13", "13", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-387b-49d2-b895-c8c5f4a3a50f", "Côte d\'Ivoire", "+225", "CI", "CI.png", "CFA franc (BCEAO)", "XOF", "XOF", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3941-4811-9b3b-36897248bb6b", "Jamaica", "+1", "JM", "JM.png", "Jamaica dollar", "JMD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3a0b-481b-85d6-29eb10e765e6", "Japan", "+81", "JP", "JP.png", "yen (inv.)", "JPY", "¥", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3ada-4e34-8520-bcfc88bb2c22", "Kazakhstan", "+7", "KZ", "KZ.png", "tenge (inv.)", "KZT", "лв", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3b9d-40a9-9310-167a12db8c7e", "Jordan", "+962", "JO", "JO.png", "Jordanian dinar", "JOD", "JOD", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3c73-4e4b-9042-5b624a0b59f7", "Kenya", "+254", "KE", "KE.png", "Kenyan shilling", "KES", "KES", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3d3d-4fd4-8037-bbd27d20e325", "Korea, Democratic People\'s Republic of", "+850", "KP", "KP.png", "North Korean won (inv.)", "KPW", "₩", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3e05-4e82-9e06-eea7625941b1", "Korea, Republic of", "+82", "KR", "KR.png", "South Korean won (inv.)", "KRW", "₩", "11", "11", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3ece-489d-bf93-84c64897bfdf", "Kuwait", "+965", "KW", "KW.png", "Kuwaiti dinar", "KWD", "KWD", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-3f97-4626-8118-7800c8959c24", "Kyrgyzstan", "+996", "KG", "KG.png", "som", "KGS", "лв", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-405e-40d5-80c7-c6d0f0382577", "Lao People\'s Democratic Republic", "+856", "LA", "LA.png", "kip (inv.)", "LAK", "₭", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4125-453e-9ff5-dfb75a6634ae", "Lebanon", "+961", "LB", "LB.png", "Lebanese pound", "LBP", "£", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-41ec-4849-b90d-d801f26f951c", "Lesotho", "+266", "LS", "LS.png", "loti (pl. maloti)", "LSL", "L", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-42ce-4ba9-8e4a-3bcc36ddc859", "Latvia", "+371", "LV", "LV.png", "euro", "EUR", "Ls", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-43a9-4d70-8493-baa051b701fb", "Liberia", "+231", "LR", "LR.png", "Liberian dollar", "LRD", "$", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4476-4f9b-9d0b-1839dd0be7ba", "Libya", "+218", "LY", "LY.png", "Libyan dinar", "LYD", "LYD", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-453d-49ca-9afc-a70efa5b3495", "Liechtenstein", "+423", "LI", "LI.png", "Swiss franc", "CHF", "CHF", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4607-485a-999f-907757396859", "Lithuania", "+370", "LT", "LT.png", "euro", "EUR", "Lt", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-46d0-4091-b88c-c63ab7376c1e", "Luxembourg", "+352", "LU", "LU.png", "euro", "EUR", "€", "11", "11", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4797-4d3d-9b46-bd7252ef678a", "Macao", "+853", "MO", "MO.png", "pataca", "MOP", "MOP", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4861-4a33-88cf-3c89a4f65ff5", "Madagascar", "+261", "MG", "MG.png", "ariary", "MGA", "MGA", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4931-4d02-9214-97aafa5bcc66", "Malawi", "+265", "MW", "MW.png", "Malawian kwacha (inv.)", "MWK", "MK", "7", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4a47-4738-8a5d-4bce0bd0bdee", "Malaysia", "+60", "MY", "MY.png", "ringgit (inv.)", "MYR", "RM", "11", "11", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4b20-4c48-a20f-8c63f77d90bf", "Maldives", "+960", "MV", "MV.png", "rufiyaa", "MVR", "Rf", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4c17-4545-a895-139be13e34b4", "Mali", "+223", "ML", "ML.png", "CFA franc (BCEAO)", "XOF", "XOF", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4d06-408e-aeb9-93f2e5a73f87", "Malta", "+356", "MT", "MT.png", "euro", "EUR", "MTL", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4dfe-4d16-ac75-d2be96b998ea", "Martinique", "+596", "MQ", "MQ.png", "euro", "EUR", "€", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4ee8-4a4f-8856-c7150f9b63d4", "Mauritania", "+222", "MR", "MR.png", "ouguiya", "MRO", "UM", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-4fd8-40d1-83da-7c20c4b68e76", "Mauritius", "+230", "MU", "MU.png", "Mauritian rupee", "MUR", "₨", "7", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-50ce-4e8d-9b3a-28b00310559b", "Mexico", "+52", "MX", "MX.png", "Mexican peso", "MXN", "$", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-51b9-4206-b806-0f853939e66b", "Monaco", "+377", "MC", "MC.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-52b2-4389-ad5e-edf32813466c", "Mongolia", "+976", "MN", "MN.png", "tugrik", "MNT", "₮", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-53bd-469c-9dc0-1c53489ae12e", "Moldova, Republic of", "+373", "MD", "MD.png", "Moldovan leu (pl. lei)", "MDL", "MDL", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-54b2-4c70-a9a6-ee2ebf44c195", "Montenegro", "+382", "ME", "ME.png", "euro", "EUR", "€", "12", "12", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-559c-420a-9f4e-ad9f2cb29ddd", "Montserrat", "+1", "MS", "MS.png", "East Caribbean dollar", "XCD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-568b-4838-b11e-86526926e2ed", "Morocco", "+212", "MA", "MA.png", "Moroccan dirham", "MAD", "MAD", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-5778-4363-82ff-78d5512e409d", "Mozambique", "+258", "MZ", "MZ.png", "metical", "MZN", "MT", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-587c-43fa-9a08-3751c09105f3", "Oman", "+968", "OM", "OM.png", "Omani rial", "OMR", "﷼", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-597b-4ddc-a95b-44658c9aabee", "Namibia", "+264", "NA", "NA.png", "Namibian dollar", "NAD", "$", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-5a7d-45b3-929a-cf9a64182e4c", "Nauru", "+674", "NR", "NR.png", "Australian dollar", "AUD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-5b79-4359-a77a-2bf392745e72", "Nepal", "+977", "NP", "NP.png", "Nepalese rupee", "NPR", "₨", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-5c73-426f-a476-9794df6ad011", "Netherlands", "+31", "NL", "NL.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-5d77-401f-8346-bc9db7596209", "Curaçao", "+599", "CW", NULL, "Netherlands Antillean guilder (CW1)", "ANG", NULL, "9", "9", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-5e80-42f2-8a4c-cdbd8bd116e8", "Aruba", "+297", "AW", "AW.png", "Aruban guilder", "AWG", "ƒ", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-5f7a-4998-805f-47990661896d", "New Caledonia", "+687", "NC", "NC.png", "CFP franc", "XPF", "XPF", "6", "6", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-6080-40db-9f01-02e52625e2ab", "Vanuatu", "+678", "VU", "VU.png", "vatu (inv.)", "VUV", "Vt", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-617f-4545-ad4c-da32f9cc142a", "New Zealand", "+64", "NZ", "NZ.png", "New Zealand dollar", "NZD", "$", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-6287-451a-bd6a-81121859f76d", "Nicaragua", "+505", "NI", "NI.png", "córdoba oro", "NIO", "C$", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-63ad-4a40-9419-b3bd72cd8bc9", "Niger", "+227", "NE", "NE.png", "CFA franc (BCEAO)", "XOF", "XOF", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-64b1-4084-8de0-e1d8d7301dcf", "Nigeria", "+234", "NG", "NG.png", "naira (inv.)", "NGN", "₦", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-65ce-4cc0-9878-98aa61ee207c", "Niue", "+683", "NU", "NU.png", "New Zealand dollar", "NZD", "$", "4", "4", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-66f1-4fa2-95c9-f1b8cf93d935", "Norfolk Island", "+672", "NF", "NF.png", "Australian dollar", "AUD", "$", "15", "15", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-67f4-40ed-94ff-a4927a9e9e44", "Norway", "+47", "NO", "NO.png", "Norwegian krone (pl. kroner)", "NOK", "kr", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-68ea-4643-a96d-b991e536a6fc", "Northern Mariana Islands", "+1", "MP", "MP.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-69e6-4adc-b550-c75a102b2230", "United States Minor Outlying Islands", "+1", "UM", "UM.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-6b16-42a6-bb37-941817d4fec4", "Micronesia, Federated States of Micronesia", "+691", "FM", "FM.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-6c48-4852-b582-1b56cd1dcc3e", "Marshall Islands", "+692", "MH", "MH.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-6d7c-472f-b7c6-ad2dc3eea090", "Palau", "+680", "PW", "PW.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-6e9c-47dc-873b-15d19a3ba502", "Pakistan", "+92", "PK", "PK.png", "Pakistani rupee", "PKR", "₨", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-6fb9-4c97-b797-d9f06bec1229", "Panama", "+507", "PA", "PA.png", "balboa", "PAB", "B/.", "8", "8", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-70cd-4ffd-9817-b74be3ad7f0c", "Papua New Guinea", "+675", "PG", "PG.png", "kina (inv.)", "PGK", "PGK", "11", "11", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-71e3-4550-bb7b-ba62108b66c6", "Paraguay", "+595", "PY", "PY.png", "guaraní", "PYG", "Gs", "10", "10", 1, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	("9a9ede48-730c-4fe7-bbb6-3adc2b65237e", "Peru", "+51", "PE", "PE.png", "new sol", "PEN", "S/.", "11", "11", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-742a-404c-abb7-2348e868ffe2", "Philippines", "+63", "PH", "PH.png", "Philippine peso", "PHP", "Php", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-7549-499e-bb1d-3281e57de6fd", "Pitcairn", "+649", "PN", "PN.png", "New Zealand dollar", "NZD", "$", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-7663-4c63-ae0a-f986e129b32b", "Poland", "+48", "PL", "PL.png", "zloty", "PLN", "zł", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-773b-435a-ad92-b1a737868e83", "Portugal", "+351", "PT", "PT.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-781c-4ef5-81ba-7349e0210ed8", "Guinea-Bissau", "+245", "GW", "GW.png", "CFA franc (BCEAO)", "XOF", "XOF", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-7900-430b-8703-752c77fbca3f", "Timor-Leste", "+670", "TL", "TL.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-79d7-4baf-81bd-3052ab223f39", "Puerto Rico", "+1", "PR", "PR.png", "US dollar", "USD", "$", "15", "15", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-7aca-4417-b5c0-78019940c37c", "Qatar", "+974", "QA", "QA.png", "Qatari riyal", "QAR", "﷼", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-7be1-42b2-b56f-c6a4ed7e3ff0", "Reunion", "+262", "RE", "RE.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-7ced-43e0-8dde-c8cf1437852a", "Romania", "+40", "RO", "RO.png", "Romanian leu (pl. lei)", "RON", "lei", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-7df8-4e27-a3ae-c466d8cab351", "Russian Federation", "+7", "RU", "RU.png", "Russian rouble", "RUB", "руб", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-7f14-4187-b943-71c742d17653", "Rwanda", "+250", "RW", "RW.png", "Rwandese franc", "RWF", "RWF", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8022-4270-8ed7-9fe19e0a7cc3", "Saint Barthelemy", "+590", "BL", NULL, "euro", "EUR", NULL, "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8124-4ec4-bb46-77b0bd762bb4", "Saint Helena, Ascension and Tristan da Cunha", "+290", "SH", "SH.png", "Saint Helena pound", "SHP", "£", "4", "4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8219-44d5-934c-d79890e743d9", "Saint Kitts and Nevis", "+1", "KN", "KN.png", "East Caribbean dollar", "XCD", "$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-830f-4d13-a048-2748d2acbab2", "Anguilla", "+1", "AI", "AI.png", "East Caribbean dollar", "XCD", "$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-83f9-453e-8af2-270f4fd58eae", "Saint Lucia", "+1", "LC", "LC.png", "East Caribbean dollar", "XCD", "$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-84ca-448d-8e18-9c38216c4dc3", "Saint Martin (French part)", "+590", "MF", NULL, "euro", "EUR", NULL, "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-85c2-4b86-9aa6-13b709db2ddb", "Saint Pierre and Miquelon", "+508", "PM", "PM.png", "euro", "EUR", "€", "6", "6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-86b2-449b-be9b-76c313d60549", "Saint Vincent and the Grenadines", "+1", "VC", "VC.png", "East Caribbean dollar", "XCD", "$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-87a2-4899-bec5-ffe704366e34", "San Marino", "+378", "SM", "SM.png", "euro", "EUR ", "€", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8884-404d-ac74-8df362e093a3", "Sao Tome and Principe", "+239", "ST", "ST.png", "dobra", "STD", "Db", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8955-4896-8ea4-20bbb7560814", "Saudi Arabia", "+966", "SA", "SA.png", "riyal", "SAR", "﷼", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8b55-4d25-9b4b-8e9352a33e5a", "Senegal", "+221", "SN", "SN.png", "CFA franc (BCEAO)", "XOF", "XOF", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8c48-4bc5-8216-838e9e7ea867", "Serbia", "+381", "RS", NULL, "Serbian dinar", "RSD", NULL, "12", "12", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8d1b-4dad-85d9-39329732885a", "Seychelles", "+248", "SC", "SC.png", "Seychelles rupee", "SCR", "₨", "6", "6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8df0-42ea-9751-055eda3801d0", "Sierra Leone", "+232", "SL", "SL.png", "leone", "SLL", "Le", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8ece-4258-bbff-f0a714930c27", "Singapore", "+65", "SG", "SG.png", "Singapore dollar", "SGD", "$", "12", "12", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-8fb3-451f-a2a4-64597aac2207", "Slovakia", "+421", "SK", "SK.png", "euro", "EUR", "Sk", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9080-4647-a638-430259d4c651", "VietNam", "+84", "VN", "VN.png", "dong", "VND", "₫", "11", "11", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-914c-4fdc-b57f-9b42f6cb922b", "Slovenia", "+386", "SI", "SI.png", "euro", "EUR", "€", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-921a-4021-a1a6-343cfcf27b09", "Somalia", "+252", "SO", "SO.png", "Somali shilling", "SOS", "S", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-92f6-41ab-8c7c-6b60b8e62ab1", "South Africa", "+27", "ZA", "ZA.png", "rand", "ZAR", "R", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-93c0-40c3-9bb1-49a78dc8538e", "Zimbabwe", "+263", "ZW", "ZW.png", "Zimbabwe dollar (ZW1)", "ZWL", "Z$", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9493-43a9-b52d-02d156f5953f", "Spain", "+34", "ES", "ES.png", "euro", "EUR", "€", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-956e-4cdb-a2b7-9bee04f79885", "South Sudan", "+211", "SS", "SD.png", "South Sudanese pound", "SSP", NULL, "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9653-46f3-843e-afb92ec6ab75", "Sudan", "+249", "SD", "SD.png", "Sudanese pound", "SDG", NULL, "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9751-4463-b627-181dde48ebb8", "Western Sahara", "+212", "EH", "EH.png", "Moroccan dirham", "MAD", "MAD", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9855-4c23-b3f3-4f2d9edac8ea", "Suriname", "+597", "SR", "SR.png", "Surinamese dollar", "SRD", "$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-994a-4942-a79b-e1fa2fe531aa", "Svalbard and Jan Mayen", "+47", "SJ", "SJ.png", "Norwegian krone (pl. kroner)", "NOK", "kr", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9a2e-4dbb-b52f-16835641c585", "Swaziland", "+268", "SZ", "SZ.png", "lilangeni", "SZL", "SZL", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9b15-4671-accf-c002f50e0403", "Sweden", "+46", "SE", "SE.png", "krona (pl. kronor)", "SEK", "kr", "13", "13", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9bf0-4379-a369-da9eb9c96abd", "Switzerland", "+41", "CH", "CH.png", "Swiss franc", "CHF", "CHF", "12", "12", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9cde-4001-94de-ae204ca92fd6", "Syrian Arab Republic", "+963", "SY", "SY.png", "Syrian pound", "SYP", "£", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9dd9-4539-a3cc-0f76cb8a02db", "Tajikistan", "+992", "TJ", "TJ.png", "somoni", "TJS", "TJS", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9ed3-4239-9e50-78eb9969d02c", "Thailand", "+66", "TH", "TH.png", "baht (inv.)", "THB", "฿", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-9fd2-4aaa-b701-115cf43727d8", "Togo", "+228", "TG", "TG.png", "CFA franc (BCEAO)", "XOF", "XOF", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a0c1-4ddc-afc9-a40279d1f300", "Tokelau", "+690", "TK", "TK.png", "New Zealand dollar", "NZD", "$", "4", "4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a1bf-4cc4-8b0a-4e07eff0bfff", "Tonga", "+676", "TO", "TO.png", "pa’anga (inv.)", "TOP", "T$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a2c4-4951-9389-e78dc459c3bc", "Trinidad and Tobago", "+1", "TT", "TT.png", "Trinidad and Tobago dollar", "TTD", "TT$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a3ce-4f2e-acf3-c3f8c65d46d5", "United Arab Emirates", "+971", "AE", "AE.png", "UAE dirham", "AED", "AED", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a4bf-4241-ae87-5e768733e501", "Tunisia", "+216", "TN", "TN.png", "Tunisian dinar", "TND", "TND", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a5c5-495a-8544-1e1309d608e4", "Turkey", "+90", "TR", "TR.png", "Turkish lira (inv.)", "TRY", "₺", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a6c3-4dbd-ae7b-b7ec13bbd445", "Turkmenistan", "+993", "TM", "TM.png", "Turkmen manat (inv.)", "TMT", "m", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a7ca-49be-b61d-9aeb37cefe34", "Turks and Caicos Islands", "+1", "TC", "TC.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a8d5-4793-ab89-a6337b5e9203", "Tuvalu", "+688", "TV", "TV.png", "Australian dollar", "AUD", "$", "6", "6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-a9cd-4b5b-91ae-af131e1091af", "Uganda", "+256", "UG", "UG.png", "Uganda shilling", "UGX", "UGX", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-aad1-45d3-b1a3-36c07ff1bd28", "Ukraine", "+380", "UA", "UA.png", "hryvnia", "UAH", "₴", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-abcf-46a4-9b12-e804d11aa885", "Macedonia, the former Yugoslav Republic of", "+389", "MK", "MK.png", "denar (pl. denars)", "MKD", "ден", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-acca-4615-aaa8-cc402053f45c", "Egypt", "+20", "EG", "EG.png", "Egyptian pound", "EGP", "£", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-adc9-490f-99fe-d81ee32235ba", "United Kingdom", "+44", "GB", "GB.png", "pound sterling", "GBP", "£", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-aece-4db4-a0dd-507ab4225852", "Guernsey", "+44", "GG", NULL, "Guernsey pound (GG2)", "GGP (GG2)", NULL, "6", "6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-afe9-49eb-a4d5-871d61138b69", "Jersey", "+44", "JE", NULL, "Jersey pound (JE2)", "JEP (JE2)", NULL, "6", "6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b0f0-4234-b54c-8fcb8d07a7d6", "Isle of Man", "+44", "IM", NULL, "Manx pound (IM2)", "IMP (IM2)", NULL, "6", "6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b1ec-4895-a43a-5beb7c9d2b7b", "Tanzania, United Republic of", "+255", "TZ", "TZ.png", "Tanzanian shilling", "TZS", "TZS", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b2e5-4024-86c8-742284f01b14", "United States", "+1", "US", "US.png", "US dollar", "USD", "$", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b3e8-4385-ab43-8dd97a89db67", "Virgin Islands, U.S.", "+1", "VI", "VI.png", "US dollar", "USD", "$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b4dc-4019-9b67-7ff67a848abc", "Burkina Faso", "+226", "BF", "BF.png", "CFA franc (BCEAO)", "XOF", "XOF", "8", "8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b5d1-4f3b-9f52-59a1991df7b0", "Uruguay", "+598", "UY", "UY.png", "Uruguayan peso", "UYU", "$U", "11", "11", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b6c7-4351-9c66-26d4fd7ad417", "Uzbekistan", "+998", "UZ", "UZ.png", "sum (inv.)", "UZS", "лв", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b7e4-4ece-acbc-15467c7d4bbe", "Venezuela, Bolivarian Republic of", "+58", "VE", "VE.png", "bolívar fuerte (pl. bolívares fuertes)", "VEF", "Bs", "10", "10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b8eb-4b2a-bd6f-67b7a242dad4", "Wallis and Futuna", "+681", "WF", "WF.png", "CFP franc", "XPF", "XPF", "6", "6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-b9e6-4821-b249-e467cd8d0e69", "Samoa", "+685", "WS", "WS.png", "tala (inv.)", "WST", "WS$", "7", "7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-baea-49f8-9ad2-bd43caa86481", "Yemen", "+967", "YE", "YE.png", "Yemeni rial", "YER", "﷼", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede48-bc03-4fcb-ab38-678d3ad0c6a7", "Zambia", "+260", "ZM", "ZM.png", "Zambian kwacha (inv.)", "ZMW", "ZK", "9", "9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9e8a23b3-461a-4122-88a2-3663d89ab4da", "Bouvet Island", "+47", "BV", "BV.png", "", "", "kr", "15", "15", 1, "2025-03-29 05:30:16", "2025-03-29 05:30:16");

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table currencies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `symbol` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `no_of_decimal` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;

INSERT INTO `currencies` (`id`, `name`, `symbol`, `code`, `rate`, `no_of_decimal`, `created_at`, `updated_at`) VALUES
	(1, "United States Dollar", "$", "USD", 1, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(2, "Euro", "€", "EUR", 0.85, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(3, "Japanese Yen", "¥", "JPY", 110.5, 0, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(4, "British Pound Sterling", "£", "GBP", 0.72, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(5, "Australian Dollar", "A$", "AUD", 1.32, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(6, "Canadian Dollar", "C$", "CAD", 1.25, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(7, "Swiss Franc", "CHF", "CHF", 0.92, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(8, "Chinese Yuan", "¥", "CNY", 6.42, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(9, "Indian Rupee", "₹", "INR", 74.5, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(11, "Brazilian Real", "R$", "BRL", 5.35, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(12, "Mexican Peso", "Mex$", "MXN", 20.1, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(13, "Singapore Dollar", "S$", "SGD", 1.33, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(14, "Hong Kong Dollar", "HK$", "HKD", 7.77, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(15, "New Zealand Dollar", "NZ$", "NZD", 1.44, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(16, "South African Rand", "R", "ZAR", 15, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(17, "Russian Ruble", "₽", "RUB", 72.8, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(18, "Norwegian Krone", "kr", "NOK", 8.73, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(19, "Swedish Krona", "kr", "SEK", 8.61, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(20, "UAE Dirham", "د.إ", "AED", 3.67, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(21, "Saudi Riyal", "ر.س", "SAR", 3.75, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(22, "Malaysian Ringgit", "RM", "MYR", 4.14, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(23, "Turkish Lira", "₺", "TRY", 8.27, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(24, "Indonesian Rupiah", "Rp", "IDR", 14225, 0, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(25, "Argentine Peso", "$", "ARS", 115, 2, "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(26, "Pakistani Rupees", "Rs", "567", 12345, 76576, "2025-01-28 01:25:42", "2025-01-28 01:25:42");

/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table documents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `has_expiry_date` tinyint(1) NOT NULL DEFAULT 0,
  `has_id_number` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;

INSERT INTO `documents` (`id`, `name`, `is_required`, `has_expiry_date`, `has_id_number`, `status`, `created_at`, `updated_at`) VALUES
	("9a9ede4a-339c-4269-bd27-fb42685c8e0c", "Drivers License", 1, 1, 0, 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-3451-441d-aefe-3f6a3f26cb99", "Vehicle Photo", 1, 0, 0, 1, "2023-11-16 12:00:49", "2025-04-30 11:56:31"),
	("9e111f03-9bc4-4ab9-8da1-b4bfc744931e", "Ani motor.test", 1, 1, 0, 1, "2025-01-28 01:41:59", "2025-01-28 01:42:22"),
	("9ecb0d65-29e1-45ef-92bd-0b3377aafa59", "hello test", 1, 1, 0, 1, "2025-04-30 11:56:42", "2025-07-18 10:35:30");

/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table driver_documents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `driver_documents`;

CREATE TABLE `driver_documents` (
  `id` char(36) NOT NULL,
  `driver_id` char(36) NOT NULL,
  `document_id` char(36) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `file` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `driving_license_number` varchar(191) DEFAULT NULL,
  `type_of_license_held` varchar(191) DEFAULT NULL,
  `license_issue_date` date DEFAULT NULL,
  `license_expiry_date` date DEFAULT NULL,
  `driving_test_pass_date` date DEFAULT NULL,
  `national_insurance_number` varchar(191) DEFAULT NULL,
  `taxi_number` varchar(191) DEFAULT NULL,
  `dvla_check_code` varchar(191) DEFAULT NULL,
  `issuing_authority` varchar(191) DEFAULT NULL,
  `driver_license_front` varchar(191) DEFAULT NULL,
  `driver_license_back` varchar(191) DEFAULT NULL,
  `proof_of_address` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_documents_driver_id_foreign` (`driver_id`),
  KEY `driver_documents_document_id_foreign` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table driver_forms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `driver_forms`;

CREATE TABLE `driver_forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sending_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` int(11) DEFAULT NULL,
  `personal_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `vehicle` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `charges` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `signature` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `declaration` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `additional_fee` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `hirer_insurance` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `fleet_insurance` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `drivers_license` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `taxi_license` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `claim` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `claim_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `convictions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `conviction_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `conviction_details_2` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `conviction_details_3` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `level_of_cover` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `supporting_documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `client_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `bodywork` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `damage_assessment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `wheels_tyres` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `windscreens` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `mirrors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dash` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `interior` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `exterior` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `handbook` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `spare_wheel` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `fuel_cap` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `aerial` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `floor_mats` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `tools` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `payment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `permission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `return_vehicle` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `report_vehicle` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `report_accident` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `change_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `monthly_maintenance` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `mileage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hire` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `reason` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `rate_total` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `rate` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `agreement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_forms_driver_id_foreign` (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `driver_forms` WRITE;
/*!40000 ALTER TABLE `driver_forms` DISABLE KEYS */;

INSERT INTO `driver_forms` (`id`, `driver_id`, `name`, `status`, `sending_method`, `state`, `action`, `personal_details`, `vehicle`, `charges`, `address`, `signature`, `declaration`, `additional_fee`, `hirer_insurance`, `fleet_insurance`, `documents`, `drivers_license`, `taxi_license`, `claim`, `claim_details`, `convictions`, `conviction_details`, `conviction_details_2`, `conviction_details_3`, `level_of_cover`, `supporting_documents`, `client_details`, `bodywork`, `damage_assessment`, `wheels_tyres`, `windscreens`, `mirrors`, `dash`, `interior`, `exterior`, `handbook`, `spare_wheel`, `fuel_cap`, `aerial`, `floor_mats`, `tools`, `payment`, `permission`, `return_vehicle`, `report_vehicle`, `report_accident`, `change_address`, `monthly_maintenance`, `mileage`, `created_at`, `updated_at`, `hire`, `reason`, `rate_total`, `rate`, `agreement`) VALUES
	(1, "a062a91c-321d-4cf4-860e-1da19ec2d4f6", "", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "2025-11-18 08:54:04", "2025-11-18 08:54:04", NULL, NULL, NULL, NULL, NULL),
	(2, "a062a91c-5455-452d-966c-ea322f62715a", "", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "2025-11-18 08:54:04", "2025-11-18 08:54:04", NULL, NULL, NULL, NULL, NULL);

/*!40000 ALTER TABLE `driver_forms` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table driver_pcns
# ------------------------------------------------------------

DROP TABLE IF EXISTS `driver_pcns`;

CREATE TABLE `driver_pcns` (
  `id` char(36) NOT NULL,
  `driver_id` char(36) DEFAULT NULL COMMENT '(DC2Type:guid)',
  `date_post_received` date DEFAULT NULL,
  `vrm` varchar(191) DEFAULT NULL,
  `pcn_no` varchar(191) DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `date_of_contravention` date DEFAULT NULL,
  `deadline_date` date DEFAULT NULL,
  `issuing_authority` varchar(191) DEFAULT NULL,
  `priority` varchar(191) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `report` longtext DEFAULT NULL,
  `linkup_with_driver` varchar(191) DEFAULT NULL,
  `linkup_with_vehicle_registration_no` varchar(191) DEFAULT NULL,
  `notify_to_driver` varchar(191) DEFAULT NULL,
  `notify_to_staff_member` varchar(191) DEFAULT NULL,
  `notify_to_other` varchar(191) DEFAULT NULL,
  `reminder` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vehicle_id` char(36) DEFAULT NULL,
  `offence_type` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `user_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_pcns_driver_id_foreign` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table faqs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` char(36) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `company_id` char(36) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;

INSERT INTO `faqs` (`id`, `title`, `company_id`, `description`, `created_at`, `updated_at`) VALUES
	("9f69dc52-4b78-4690-9703-7b1af5e952aa", "Test FAQ", NULL, "TEST", "2025-07-18 10:36:07", "2025-07-18 10:36:07"),
	("9f69dc54-65ee-4630-8ba0-d68b7c56bcdb", "Test FAQ", NULL, "TEST", "2025-07-18 10:36:09", "2025-07-18 10:36:09"),
	("9f69dc61-afb2-4267-93fa-0b3158b25864", "Test FAQ", NULL, "TEST", "2025-07-18 10:36:17", "2025-07-18 10:36:17");

/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table fleet_events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fleet_events`;

CREATE TABLE `fleet_events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NULL DEFAULT NULL,
  `guests` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `pcn_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;





# Dump of table history_data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `history_data`;

CREATE TABLE `history_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_form_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `reason` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `vehicle` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `vehicle_out` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `personal_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `payment_date` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `payment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `hirer_insurance` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;





# Dump of table hotels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hotels`;

CREATE TABLE `hotels` (
  `id` char(36) NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `region_id` char(36) DEFAULT NULL,
  `user_id` char(36) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `map_lat` varchar(191) DEFAULT NULL,
  `map_lng` varchar(191) DEFAULT NULL,
  `featured_image_thumb` varchar(191) DEFAULT NULL,
  `featured_image` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` varchar(191) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `facilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotels_slug_unique` (`slug`),
  KEY `hotels_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table incidents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `incidents`;

CREATE TABLE `incidents` (
  `id` char(36) NOT NULL,
  `booking_id` char(36) NOT NULL,
  `company_id` char(36) DEFAULT NULL,
  `user_id` char(36) DEFAULT NULL,
  `owner_name` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `date_of_birth` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `mobile_number` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `occupation` varchar(191) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `policy_number` varchar(191) NOT NULL,
  `insurer` varchar(191) NOT NULL,
  `cover_type` varchar(191) NOT NULL,
  `witnesses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `third_party` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `police_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `accident_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `weather` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `diagrams` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `signature` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table insurance_coverages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `insurance_coverages`;

CREATE TABLE `insurance_coverages` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `policy_number` varchar(20) NOT NULL,
  `insurer_name` varchar(20) NOT NULL,
  `policy_start_date` date NOT NULL,
  `policy_end_date` date NOT NULL,
  `vehicle_classes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `insurer_logo` varchar(255) NOT NULL,
  `coverage_matrix` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `what_not_covered` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `key_exclusions` longtext DEFAULT NULL,
  `excess_amount` decimal(19,2) NOT NULL,
  `max_claim_limit` decimal(19,2) NOT NULL,
  `daily_rate` decimal(19,2) NOT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `customer_instruction` longtext NOT NULL,
  `claims_contact` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `required_documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` enum('Draft','Active') NOT NULL DEFAULT 'Draft',
  `company_id` varchar(255) DEFAULT NULL,
  `policy_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `insurance_coverages` WRITE;
/*!40000 ALTER TABLE `insurance_coverages` DISABLE KEYS */;

INSERT INTO `insurance_coverages` (`id`, `policy_number`, `insurer_name`, `policy_start_date`, `policy_end_date`, `vehicle_classes`, `insurer_logo`, `coverage_matrix`, `what_not_covered`, `key_exclusions`, `excess_amount`, `max_claim_limit`, `daily_rate`, `documents`, `customer_instruction`, `claims_contact`, `required_documents`, `status`, `company_id`, `policy_type`, `created_at`, `updated_at`) VALUES
	(2, "sadfas", "dfasdf", "2025-11-26", "2025-11-29", "[\"compact\",\"suv\",\"luxury\"]", "insurance-coverages/s5GewT2YHD62dXCHlySiCdVvkBAmnaCoBnuC6qsa.jpg", "[{\"name\":\"Collision Damage (CDW)\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Theft Protection\",\"status\":\"partial\",\"partial_notes\":\"sdfasdf\"},{\"name\":\"Glass \\/ Windscreen\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Tyres\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Wheels \\/ Alloys\",\"status\":\"partial\",\"partial_notes\":\"asdfasdf\"},{\"name\":\"Lost \\/ Damaged Keys\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Interior \\/ Upholstery\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Underbody \\/ Roof Damage\",\"status\":\"partial\",\"partial_notes\":\"adsfads\"},{\"name\":\"Third-Party Liability\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Admin Fees Waiver\",\"status\":\"covered\",\"partial_notes\":null}]", "[\"Driving under influence (DUI)\",\"Off-road usage\",\"Flood \\/ water ingress\"]", "asfasdf", 4000, 345, 44, "[\"insurance-coverages\\/S2XXfHQuMQ3aFYYkSOzzsAWUlY7cGJkZKhCVmjAY.pdf\",\"insurance-coverages\\/8fc2M42C4LY26hAGaWoYwJDyhCQn6eXp7cFzpdid.pdf\",\"insurance-coverages\\/L9VXV2cpQGP1i0oRWA9kEHZCUVyqUXHtYkaay4xd.pdf\",\"insurance-coverages\\/CtbpvySdnzaJG8cinPMTYu6Lo0frsbxbpHH2yLpm.pdf\"]", "asdfa", "{\"email\":\"adsfasd@addsfasdf.sdf\",\"phone\":\"45678454\",\"address\":\"asdfasdfsa\",\"portal_url\":\"https:\\/\\/animotor.ddev.site\\/admin\\/insurance-coverages\\/create?type=full_protection\"}", "[\"Rental Agreement \\/ Invoice\",\"Photographs of damage (minimum 4 angles)\",\"Police report (if applicable)\"]", "Active", "a060e33d-b592-4617-a50b-0b31f5db915f", "Full Protection", "2025-11-26 11:20:39", "2025-11-26 16:54:21"),
	(3, "sadfas", "dfasdf", "2025-11-26", "2025-11-29", "[\"compact\",\"suv\",\"luxury\"]", "insurance-coverages/VGkv3vzJSNBn8GIgxLwvdA8R4pcAw4qVOWO3jB2W.jpg", "[{\"name\":\"Collision Damage (CDW)\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Theft Protection\",\"status\":\"partial\",\"partial_notes\":\"sdfasdf\"},{\"name\":\"Glass \\/ Windscreen\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Tyres\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Wheels \\/ Alloys\",\"status\":\"partial\",\"partial_notes\":\"asdfasdf\"},{\"name\":\"Lost \\/ Damaged Keys\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Interior \\/ Upholstery\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Underbody \\/ Roof Damage\",\"status\":\"partial\",\"partial_notes\":\"adsfads\"},{\"name\":\"Third-Party Liability\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Admin Fees Waiver\",\"status\":\"covered\",\"partial_notes\":null}]", "[\"Driving under influence (DUI)\",\"Off-road usage\",\"Flood \\/ water ingress\"]", "asfasdf", 4000, 345, 44, "{\"policy_schedule\":\"insurance-coverages\\/ZZsMykHHkN1OfbMp5YUsttYDnCs65w0MkW5P6X36.pdf\",\"terms_and_conditions\":\"insurance-coverages\\/2r1N6HnctO8nhVpkEykzGbniXFBv9lXR6JXyvyqN.pdf\",\"ipid\":\"insurance-coverages\\/dI2lNxqEolTP29yfzIeIA3i9X9Vsf0BsjB6NRHDv.pdf\",\"insurer_certificate\":\"insurance-coverages\\/Wytvoj5EoITKI1SK74Dr9BOPCTJifq6uVGVuosX2.pdf\"}", "asdfa", "{\"email\":\"adsfasd@addsfasdf.sdf\",\"phone\":\"45678454\",\"address\":\"asdfasdfsa\",\"portal_url\":\"https:\\/\\/animotor.ddev.site\\/admin\\/insurance-coverages\\/create?type=full_protection\"}", "[\"Rental Agreement \\/ Invoice\",\"Photographs of damage (minimum 4 angles)\",\"Police report (if applicable)\"]", "Active", "a060e33d-b592-4617-a50b-0b31f5db915f", "Full Protection", "2025-11-26 11:25:50", "2025-11-26 11:29:24"),
	(4, "sdfsdf", "dfsdfdsf", "2025-11-26", "2025-11-29", "[\"compact\",\"suv\",\"luxury\"]", "insurance-coverages/0kt49jA3YZr2gzb6uaXlRM08bbhEop5MbQZp8MRi.jpg", "[{\"name\":\"Collision Damage\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Single Vehicle Accident\",\"status\":\"partial\",\"partial_notes\":\"wrer\"},{\"name\":\"Multi-Vehicle Accident\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Third-Party Damage\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Towing After Accident\",\"status\":\"partial\",\"partial_notes\":\"rwerwe\"},{\"name\":\"Glass \\/ Windscreen\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Bodywork Damage\",\"status\":\"covered\",\"partial_notes\":null},{\"name\":\"Fire Damage\",\"status\":\"partial\",\"partial_notes\":\"rwrewr\"},{\"name\":\"Vandalism\",\"status\":\"not\",\"partial_notes\":null},{\"name\":\"Admin Fees (Claims Processing)\",\"status\":\"covered\",\"partial_notes\":null}]", "[\"Tyres \\/ Wheels (separate product required)\",\"Underbody damage\",\"Roof damage\"]", "rfsdfdsf", 334, 44, 55, "{\"policy_schedule\":\"insurance-coverages\\/UuADBPWmLseWrlfKgpWDKdcuXFPVIDD1Mj48W6Jp.pdf\",\"terms_and_conditions\":\"insurance-coverages\\/HhSVDDzusQHzdG9rid5PJfRTedaL7pXePWmbLIe8.pdf\",\"ipid\":\"insurance-coverages\\/Ds2RQHTGxvVTu8I0qEtU60WeoftCV9kUBHP65wOx.pdf\",\"insurer_certificate\":\"insurance-coverages\\/lzO78LeZLhbu0IBaR411SWPdxrRZYgZB3EWkHEaM.pdf\"}", "sdfsdf", "{\"email\":\"asdf@asdf.df\",\"phone\":\"234234234\",\"address\":\"asdfads\",\"portal_url\":\"https:\\/\\/animotor.ddev.site\\/admin\\/insurance-coverages\\/create?type=full_protection\"}", "[\"Rental Agreement \\/ Invoice with CDW selected\",\"Photographs of collision damage (minimum 6 angles)\",\"Police report (mandatory for third-party accidents)\"]", "Active", "a060e33d-b592-4617-a50b-0b31f5db915f", "CDW", "2025-11-26 12:22:47", "2025-11-26 12:57:37");

/*!40000 ALTER TABLE `insurance_coverages` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table mail_trackers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mail_trackers`;

CREATE TABLE `mail_trackers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mail_tracker` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `mail_trackers` WRITE;
/*!40000 ALTER TABLE `mail_trackers` DISABLE KEYS */;

INSERT INTO `mail_trackers` (`id`, `mail_tracker`, `details`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
	(19, "{\"date_post_received\":\"2023-08-01\",\"from\":\"Tempore aspernatur \",\"reference_no\":\"Eaque dolore non nat\",\"other\":\"Vel lorem accusantiu\",\"deadline_date\":\"2013-06-25\",\"notes\":\"Id unde ut animi qu\",\"type\":\"HMRC\",\"priority\":\"Low\",\"status\":\"1\"}", "{\"task_due_date\":\"1990-01-01\",\"linkup_with\":\"Quia consequatur La\",\"notify_to\":\"Hic pariatur Volupt\",\"vehicle_registration_no\":\"Iste voluptate in la\",\"staff_member\":\"Pariatur Exercitati\",\"reminder\":\"Enim magnam tempora \",\"other\":\"Non qui aut vel plac\",\"task_instructions\":\"Molestias suscipit c\"}", NULL, "2025-05-08 05:37:47", "2025-05-08 05:37:52", NULL),
	(20, "{\"date_post_received\":\"2023-08-01\",\"from\":\"Tempore 12 \",\"reference_no\":\"Eaque dolore non nat\",\"other\":\"Vel lorem accusantiu\",\"deadline_date\":\"2013-06-25\",\"notes\":\"Id unde ut animi qu\",\"type\":\"HMRC\",\"priority\":\"Low\",\"status\":\"1\"}", NULL, NULL, "2025-05-08 05:38:00", "2025-05-08 05:38:00", NULL),
	(21, "{\"date_post_received\":\"2023-08-01\",\"from\":\"Tempore \",\"reference_no\":\"Eaque dolore non nat\",\"other\":\"Vel lorem accusantiu\",\"deadline_date\":\"2013-06-25\",\"notes\":\"Id unde ut animi qu\",\"type\":\"HMRC\",\"priority\":\"Low\",\"status\":\"1\"}", NULL, NULL, "2025-05-08 05:44:36", "2025-05-08 05:44:36", NULL);

/*!40000 ALTER TABLE `mail_trackers` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table menu_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) unsigned DEFAULT NULL,
  `label` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `icon_type` varchar(191) NOT NULL DEFAULT 'none',
  `icon` varchar(191) DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  KEY `menu_items_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_id`, `label`, `url`, `icon_type`, `icon`, `parent_id`, `order`, `created_at`, `updated_at`) VALUES
	(1, 1, "Home", "/", "none", NULL, NULL, 0, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	(2, 1, "Privacy policy", "privacy", "none", NULL, NULL, 0, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	(3, 1, "Terms & Condition", "terms", "none", NULL, NULL, 0, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	(4, 1, "About us", "about", "none", NULL, NULL, 0, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	(5, 1, "Contact us", "contact_us", "none", NULL, NULL, 0, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	(10, 1, "Careers", "/careers", "none", NULL, NULL, 0, "2024-02-01 23:12:19", "2024-02-01 23:12:19");

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, "Frontpage Top Menu", "frontpage-top-menu", "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	(2, "Careers", "careers", "2024-01-31 17:47:11", "2024-01-31 17:47:11");

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email_address` text NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(191) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, "2014_10_12_000000_create_users_table", 1),
	(2, "2014_10_12_100000_create_password_resets_table", 1),
	(3, "2018_11_06_222923_create_transactions_table", 1),
	(4, "2018_11_07_192923_create_transfers_table", 1),
	(5, "2018_11_15_124230_create_wallets_table", 1),
	(6, "2019_08_19_000000_create_failed_jobs_table", 1),
	(7, "2019_12_14_000001_create_personal_access_tokens_table", 1),
	(8, "2021_06_17_054551_create_soft_credentials_table", 1),
	(9, "2021_11_02_202021_update_wallets_uuid_table", 1),
	(10, "2023_03_09_215455_create_notifications_table", 1),
	(11, "2023_05_24_005201_create_categories_table", 1),
	(12, "2023_06_14_191127_create_banks_table", 1),
	(13, "2023_06_14_191727_create_documents_table", 1),
	(14, "2023_06_14_192041_create_regions_table", 1),
	(15, "2023_06_14_192557_create_vehicle_types_table", 1),
	(16, "2023_06_14_192930_create_vehicle_makes_table", 1),
	(17, "2023_06_14_192940_create_vehicle_models_table", 1),
	(18, "2023_06_15_051132_create_countries_table", 1),
	(19, "2023_06_15_053728_create_trip_requests_table", 1),
	(20, "2023_06_15_060230_create_services_table", 1),
	(21, "2023_06_15_095638_create_settings_table", 1),
	(22, "2023_06_15_101150_laratrust_setup_tables", 1),
	(23, "2023_06_16_122931_create_cancellation_reasons_table", 1),
	(24, "2023_06_16_132235_create_complaints_table", 1),
	(25, "2023_06_16_142304_create_driver_documents_table", 1),
	(26, "2023_06_16_193509_create_cars_table", 1),
	(27, "2023_07_01_213839_create_rentals_table", 1),
	(28, "2023_07_04_094650_create_car_rentals_table", 1),
	(29, "2023_07_04_100928_add_to_cars", 1),
	(30, "2023_07_04_120210_create_bookings_table", 1),
	(31, "2023_07_18_114602_create_pages_table", 1),
	(32, "2023_07_18_122502_create_theme_components_table", 1),
	(33, "2023_07_18_202214_create_page_contents_table", 1),
	(34, "2023_07_21_022500_add_columns_to_users", 1),
	(35, "2023_07_24_155449_create_companies_table", 1),
	(36, "2023_07_24_172145_add_customer_to_users", 1),
	(37, "2023_07_25_121617_add_company_to_models", 1),
	(38, "2023_08_01_225835_add_to_region", 1),
	(39, "2023_08_03_162413_add_to_trips", 1),
	(40, "2023_08_03_172635_add_to_cars", 1),
	(41, "2023_08_04_140430_add_to_pages", 1),
	(42, "2023_08_16_234341_create_faqs_table", 1),
	(43, "2023_08_17_153440_add_to_cars", 1),
	(44, "2023_08_18_162912_add_to_companies", 1),
	(45, "2023_08_19_165037_add_to_booking", 1),
	(46, "2023_08_23_080623_create_car_extras_table", 1),
	(47, "2023_08_23_121736_add_to_cars", 1),
	(48, "2023_08_26_101754_add_to_bookings", 1),
	(49, "2023_08_26_153835_create_hotels_table", 1),
	(50, "2023_08_26_174553_add_image_to_regions", 1),
	(51, "2023_09_01_174010_create_vehicle_defects_table", 1),
	(52, "2023_09_01_175122_create_incidents_table", 1),
	(53, "2023_09_04_191058_create_car_damage_reports_table", 1),
	(54, "2023_09_04_192612_create_vehicle_returns_table", 1),
	(55, "2023_09_05_134042_create_otp_verifies_table", 1),
	(56, "2023_09_07_084422_create_vehicle_inspections_table", 1),
	(57, "2023_10_04_094855_create_currencies_table", 1),
	(58, "2023_10_04_110907_create_jobs_table", 1),
	(59, "2023_10_04_114425_add_settings_team_field", 1),
	(60, "2023_10_04_170151_create_menus_table", 1),
	(61, "2023_10_04_170310_create_menu_items_table", 1),
	(62, "2023_10_10_180620_add_to_users_last_seen", 1),
	(63, "2023_10_10_193341_create_activity_logs_table", 1),
	(64, "2023_10_13_102630_add_to_booking", 1),
	(65, "2023_10_21_212115_add_referral_to_users", 1),
	(66, "2023_10_23_090559_create_rejected_requests_table", 1),
	(67, "2023_10_23_094407_add_temp_driver_to_trips", 1),
	(68, "2023_10_24_000000_create_lara_backup_verify_table", 1),
	(69, "2023_10_24_115147_create_transaction_records_table", 1),
	(70, "2023_11_06_063500_add_ride_status_to_users", 1),
	(71, "2023_11_13_052109_add_to_regions", 1),
	(72, "2023_08_25_112054_create_pcns_table", 2),
	(73, "2024_06_07_120704_add_extra_fields_to_user", 3),
	(74, "2024_06_12_053510_create_rates_table", 3),
	(75, "2024_06_28_210551_add_extr_fields_to_car", 3),
	(76, "2024_06_29_123227_add_extra_field_to_user", 3),
	(77, "2024_07_01_071643_add_fields_to_driver_documents", 3),
	(78, "2024_07_01_082636_add_user_id_to_rates", 3),
	(79, "2024_07_01_095441_add_emegency_contact_to_user", 3),
	(80, "2024_07_01_101856_create_taxi_licenses", 3),
	(81, "2024_07_08_221019_create_payments_table", 3),
	(82, "2024_07_09_081339_create_notes_table", 3),
	(83, "2024_07_10_185300_create_p_c_n_s_table", 3),
	(84, "2024_07_11_073601_create_driver_pcns_table", 3),
	(85, "2024_07_22_212802_create_vehicles_table", 3),
	(86, "2024_07_25_134326_add_fields_to_complaints", 3),
	(87, "2024_07_29_183041_create_fleet_events_table", 3),
	(88, "2024_07_30_092702_create_report_incidents_table", 3),
	(89, "2024_08_01_124336_create_workshops_table", 3),
	(90, "2024_08_05_000909_create_messages_table", 3),
	(91, "2024_08_05_173939_create_mail_trackers_table", 3),
	(92, "2024_08_11_220922_add_document_to_user", 3),
	(93, "2024_08_11_221651_add_fields_to_driver_document", 3),
	(94, "2024_08_11_222146_add_status_to_fleet_events", 3),
	(95, "2024_08_12_084825_add_fields_to_vehicle", 3),
	(96, "2024_08_15_203210_create_driver_forms_table", 3),
	(97, "2024_08_25_224042_add_field_to_driver_form", 3),
	(98, "2024_08_26_145143_create_history_data_table", 3),
	(99, "2024_08_30_074341_add_address_to_history_data", 3),
	(100, "2024_08_31_112518_add_field_to_driver_form", 3),
	(101, "2024_09_03_121503_add_fields_to_driverform", 3),
	(102, "2024_09_25_055635_add_field_to_rate", 3),
	(103, "2024_10_21_052400_add_cities_to_regions", 3),
	(104, "2024_10_21_121841_modify_driver_id_nullable_in_driver_pcn", 3),
	(105, "2024_11_08_170700_add_fields_to_car", 3),
	(106, "2024_11_09_095632_add_field_to_pcn", 3),
	(107, "2025_01_27_112435_add_pass_field_to_user", 4),
	(108, "2025_01_31_081029_add_field_to_pcn", 5),
	(109, "2025_02_10_111823_create_p_c_n_autorities_table", 6),
	(110, "2025_02_28_105926_create_vehicle_mileages_table", 7),
	(111, "2025_03_05_133243_create_monthly_maintenaces_table", 8),
	(112, "2025_03_07_132046_create_monthly_repairs_table", 8),
	(113, "2025_05_06_013613_add_pcn_id_to_fleet_events_table", 9),
	(114, "2025_06_05_195921_add_user_id_to_report_incident_table", 9),
	(115, "2025_06_05_204451_add_user_id_to_fleet_event", 9),
	(116, "2025_06_05_211540_add_user_id_to_workshop", 9),
	(117, "2025_06_05_213400_add_user_id_to_message", 9),
	(118, "2025_06_05_215255_add_user_id_to_mail_tracker", 9),
	(119, "2025_06_05_221455_add_user_id_to_driver_pcn", 9),
	(120, "2025_06_22_064555_add_more_fields", 10),
	(121, "2025_07_23_010648_add_rate_field_to_driver_forms_table", 11),
	(122, "2025_09_04_054423_add_commission_fee_to_cars_table", 12),
	(123, "2025_09_04_123854_update_info_column_in_activiy_logs", 13),
	(124, "2025_09_15_051505_add_pricing_columns_in_cars_table", 14),
	(125, "2025_09_15_075941_create_car_availabilities_table", 15),
	(126, "2025_09_15_082958_create_car_blackouts_table", 15),
	(127, "2025_09_15_085129_create_is_approved_column_for_cars_table", 16),
	(130, "2025_09_16_092758_create_mileage_policy_columns_to_cars_table", 17),
	(131, "2025_09_16_094443_add_photos_column_in_cars_table", 17),
	(135, "2025_09_18_051909_add_personal_hire_columns_in_car_table", 18),
	(136, "2025_09_19_094006_add_columns_to_booking_table", 19);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table monthly_maintenaces
# ------------------------------------------------------------

DROP TABLE IF EXISTS `monthly_maintenaces`;

CREATE TABLE `monthly_maintenaces` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `inspection` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `repairs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `monthly_maintenaces_car_id_foreign` (`car_id`),
  KEY `monthly_maintenaces_booking_id_foreign` (`booking_id`),
  KEY `monthly_maintenaces_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;





# Dump of table monthly_repairs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `monthly_repairs`;

CREATE TABLE `monthly_repairs` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_maintenaces_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `repairs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `monthly_repairs_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;





# Dump of table notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `driver_id` char(36) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `action` int(11) NOT NULL DEFAULT 0,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `notes_driver_id_foreign` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` char(36) NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	("58c21f7c-b14a-4c00-be94-bad0a5e28520", "App\\Notifications\\AccountNotification", "App\\Models\\User", "a064b4f8-84d4-40e5-871e-99867a07d59a", "{\"title\":\"Booking Cancellation Denied\",\"message\":\"Cancellation denied for booking (ANI -BOOKING-0911-197)\",\"type\":\"notification\",\"time\":\"2025-11-22T07:47:30.479033Z\"}", NULL, "2025-11-22 07:47:30", "2025-11-22 07:47:30"),
	("70a36f97-46d6-49d3-9544-dd2e76cacf19", "App\\Notifications\\AccountNotification", "App\\Models\\User", "a060e33d-b592-4617-a50b-0b31f5db915f", "{\"title\":\"Booking payment successful\",\"message\":\"Congratulations, your booking payment is successful\",\"type\":\"booking_payment\",\"time\":\"2025-11-17T12:29:07.813262Z\"}", NULL, "2025-11-17 12:29:07", "2025-11-17 12:29:07"),
	("786af88f-2c01-4208-ac5f-4f760ca184f3", "App\\Notifications\\AccountNotification", "App\\Models\\User", "a060e33d-b592-4617-a50b-0b31f5db915f", "{\"title\":\"Booking    \",\"message\":\"Congratulations, your booking payment is successful\",\"type\":\"booking_payment\",\"time\":\"2025-11-18T09:51:42.236648Z\"}", NULL, "2025-11-18 09:51:42", "2025-11-18 09:51:42"),
	("9da8c52c-e885-46d5-b8e1-2422eb5330ae", "App\\Notifications\\AccountNotification", "App\\Models\\User", "a064b4f8-84d4-40e5-871e-99867a07d59a", "{\"title\":\"Booking Cancellation Denied\",\"message\":\"Cancellation denied for booking (ANI -BOOKING-0911-197)\",\"type\":\"notification\",\"time\":\"2025-11-22T07:47:33.632989Z\"}", NULL, "2025-11-22 07:47:33", "2025-11-22 07:47:33"),
	("d2cdf9d2-f89f-4208-8b83-a951d5741ae6", "App\\Notifications\\AccountNotification", "App\\Models\\User", "a060e5c3-f1cc-4d9f-95ae-03e809b65ecf", "{\"title\":\"Booking payment successful\",\"message\":\"Congratulations, your booking payment is successful\",\"type\":\"booking_payment\",\"time\":\"2025-11-17T12:24:52.490922Z\"}", NULL, "2025-11-17 12:24:52", "2025-11-17 12:24:52");

/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table otp_verifies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `otp_verifies`;

CREATE TABLE `otp_verifies` (
  `id` char(36) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `country` varchar(191) DEFAULT NULL,
  `code` varchar(191) NOT NULL,
  `otp_expires_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table p_c_n_autorities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `p_c_n_autorities`;

CREATE TABLE `p_c_n_autorities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `value` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `p_c_n_autorities` WRITE;
/*!40000 ALTER TABLE `p_c_n_autorities` DISABLE KEYS */;

INSERT INTO `p_c_n_autorities` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
	(1, "Khurram Azhar", NULL, "2025-04-23 09:34:29", "2025-04-23 09:34:29");

/*!40000 ALTER TABLE `p_c_n_autorities` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table p_c_n_s
# ------------------------------------------------------------

DROP TABLE IF EXISTS `p_c_n_s`;

CREATE TABLE `p_c_n_s` (
  `id` char(36) NOT NULL,
  `driver_id` bigint(20) NOT NULL,
  `date_post_received` date DEFAULT NULL,
  `vrm` varchar(191) DEFAULT NULL,
  `pcn_no` varchar(191) DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `date_of_contravention` date DEFAULT NULL,
  `deadline_date` date DEFAULT NULL,
  `issuing_authority` varchar(191) DEFAULT NULL,
  `priority` varchar(191) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `linkup_with_driver` varchar(191) DEFAULT NULL,
  `linkup_with_vehicle_registration_no` varchar(191) DEFAULT NULL,
  `notify_to_driver` varchar(191) DEFAULT NULL,
  `notify_to_staff_member` varchar(191) DEFAULT NULL,
  `notify_to_other` varchar(191) DEFAULT NULL,
  `reminder` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `car_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table page_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `page_contents`;

CREATE TABLE `page_contents` (
  `id` char(36) NOT NULL,
  `page_id` char(36) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `is_shortcode` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `content` text NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_contents_page_id_foreign` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `page_contents` WRITE;
/*!40000 ALTER TABLE `page_contents` DISABLE KEYS */;

INSERT INTO `page_contents` (`id`, `page_id`, `level`, `is_shortcode`, `is_active`, `content`, `title`, `created_at`, `updated_at`) VALUES
	("99e98d8c-51f4-4daa-b976-774a6b8e9eae", "99bb306b-96c0-44e9-9dee-71cbc0cd17b1", 1, 1, 1, "frontpage.components.home_booking", "Booking", "2023-08-18 01:50:12", "2023-08-18 01:51:52"),
	("9a2a2e79-6773-4696-a30e-9cb24cdf5948", "99bb306b-98d4-4258-98a5-7a9ee16aeef9", 1, 0, 1, "<!--content-->\r\n<section class=\"section privacy-section pt-120 pb-120\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<div class=\"terms-policy\">\r\n<h4 class=\"text-center\">About Us</h4><p><br></p>\r\n<p data-aos=\"fade-down\" style=\"text-align: center; \"><span style=\"font-size: 14px;\">ANI Motors is a renowned car hire company based in Slough, United Kingdom, established in 2016. With a strong presence in the industry, ANI Motors has excelled in providing top-notch car rental services to customers. What sets ANI Motors apart is its innovative approach, as it has created a unique marketplace for other car hire firms to showcase their vehicles to potential customers.</span></p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\" style=\"text-align: center; \"><span style=\"font-size: 14px;\">ANI Motors takes pride in its advanced fleet management systems, which streamline the rental process. These systems include digital hire agreements and digital signatures, ensuring a seamless and efficient experience for both renters and the company. To further enhance customer satisfaction, ANI Motors has implemented a vehicle defect reporting system, allowing renters to easily report any issues they encounter during their rental period.</span></p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\" style=\"text-align: center; \"><span style=\"font-size: 14px;\">Recognizing the importance of effective communication, ANI Motors offers live web chat support, enabling customers to receive real-time assistance and prompt solutions to their queries. Additionally, ANI Motors has introduced the Kwikbooking mobile app, a convenient marketplace that connects users with garages, car washes, and tire shops. This app simplifies the process of finding and booking these services, enhancing the overall experience for car owners.</span></p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\" style=\"text-align: center; \"><span style=\"font-size: 14px;\">With its commitment to innovation, customer satisfaction, and technologically driven solutions, ANI Motors continues to revolutionize the car hire industry in the United Kingdom</span></p>\r\n</div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></section><span style=\"font-size: 14px;\">\r\n</span>", "Content", "2023-09-19 04:53:10", "2023-09-19 05:00:48"),
	("9a2a372c-e0bb-40af-9359-7bf716653e1d", "99bb306b-96c0-44e9-9dee-71cbc0cd17b1", 1, 0, 1, "<section class=\"cars__ticket pb-120 pb__10\">\r\n    <div class=\"container\">\r\n        <div class=\"row align-items-center justify-content-center\">\r\n            <div class=\"col-md-8 col-sm-12\">\r\n                <div class=\"train__ticket__content car__ticket__content\">\r\n                    <div class=\"section__header mb__30 wow fadeInDown\">\r\n                        <h5 class=\"text-center\">\r\n                            What do we do?\r\n                        </h5>\r\n                        <p class=\"text-center\">\r\n                            Save time and money by finding the very best car hire deal for your trip, today.\r\n                            We bring the biggest and best car hire companies together one a single website, so one search gives you access to the best prices you can get for the car hire you need. Whatever the vehicle, wherever you are, we are your one stop shop for the best car hire deals today and every day. With exclusive discounts adding even more value, you can have confidence that car hire from Animotors is the best value anywhere, and with our\r\n                                support team ready to help, you get that value while enjoying the best service too.</p><p class=\"text-center\"><br></p><p class=\"text-center\"><br></p><p class=\"text-center\">\r\n                        </p>\r\n\r\n                        <h5 class=\"text-center\">\r\n                            How it Works\r\n                        </h5>\r\n\r\n                        <p class=\"text-center\">\r\n                            Just enter the pickup location where you want to hire a car\r\n                            from and the dates you want the vehicle, then select from the range of\r\n                            vehicles available. It really is that easy, and because we offer the best deals from the biggest names in car hire,\r\n                            you can be confident you have the best deal, every time.</p><p class=\"text-center\"><br></p><p class=\"text-center\"><br></p><p class=\"text-center\"><br></p><p class=\"text-center\">\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>", "Content", "2023-09-19 05:17:29", "2023-09-19 17:09:46"),
	("9a2a4fa9-c64d-4fdf-892b-7007bb89e721", "99bb306b-9907-4b33-9f4f-ed9d8d892dc4", 1, 1, 1, "frontpage.components.contact_form", "Shortcode", "2023-09-19 06:25:58", "2023-09-19 06:27:36"),
	("9a46371d-daf2-4934-8dcb-7aacd23ae6b5", "99bb306b-985e-4e00-b6b3-0492a8c9421b", 1, 0, 1, "<!--content-->\r\n<section class=\"section privacy-section pt-120 pb-120\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<div class=\"terms-policy\">\r\n<h4 class=\"text-center\">ANI Motors Privacy Policy</h4><p><br></p>\r\n<p data-aos=\"fade-down\" style=\"text-align: center; \"><span style=\"font-size: 14px;\">\"We consider your privacy to be of utmost importance. As such, we have developed this policy to ensure that you understand how we collect, use, share, and disclose personal information. The following outlines our privacy policy. Before or at the time we collect personal information, we will clearly state the reasons for gathering it.</span></p><p data-aos=\"fade-down\" style=\"text-align: center; \"><span style=\"font-size: 14px;\">We will collect and use personal information solely for the purposes we have specified and for other legitimate reasons, either with the individual\'s consent or as required by law. We will retain personal information only as long as necessary to fulfill these purposes. We will collect personal information through legal and fair means, and where applicable, with the individual\'s knowledge or consent. Personal information should be relevant to the purposes for which it will be used and, to the extent required for those purposes, accurate, complete, and up-to-date.</span></p><p data-aos=\"fade-down\" style=\"text-align: center; \"><span style=\"font-size: 14px;\">We will safeguard personal information through security measures to prevent loss or theft, as well as unauthorized access, disclosure, copying, use, or alteration. We will promptly provide individuals with access to our policies and procedures for managing personal data. We are committed to conducting our business in accordance with these principles to ensure the security and integrity of personal data.\"</span></p>\r\n</div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></section><span style=\"font-size: 14px;\">\r\n</span>", "Content", "2023-10-03 03:20:30", "2023-10-03 03:24:04"),
	("9a463957-5cd1-465d-b663-bb6a45766a9a", "99bb306b-989c-4d78-9ea9-7b41adb55427", 1, 0, 1, "<!--content-->\r\n<section class=\"section privacy-section pt-120 pb-120\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<div class=\"terms-policy\">\r\n<h4 class=\"text-center\">ANI Motors Terms &amp; Condition</h4><p><br></p>\r\n<p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><b>1. **Usage Terms**</b></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\">When you use this website, you agree to comply with the terms and conditions outlined below, as well as all applicable laws and regulations. If you do not agree with any of these terms and conditions, you are not permitted to use or access this site. The materials on this site are protected by relevant copyright and trademark laws.</span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><br></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><b>2. **License for Use**</b></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\">You are granted permission to temporarily download one copy of the materials (data or software) from the ANI MOTORS LTD website for personal, non-commercial use only. This is a limited license and does not transfer ownership. Under this license, you may not: modify or duplicate the materials; use the materials for any commercial purpose or public display (commercial or non-commercial); attempt to decompile or reconstruct any software or material contained on the ANI MOTORS LTD site; remove any copyright or other proprietary notations from the materials; or transfer the materials to another person or \"mirror\" the materials on another server. This license may be terminated if you violate any of these restrictions and may be terminated by ANI MOTORS LTD at any time. Upon license termination or when your viewing license is terminated, you must destroy any downloaded materials in your possession, whether in electronic or printed form.</span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><br></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><b>3. **Disclaimer**</b></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\">The materials on the ANI MOTORS LTD site are provided \"as is.\" ANI MOTORS LTD makes no guarantees, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Furthermore, ANI MOTORS LTD does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet site or otherwise relating to such materials or on any sites linked to this website.</span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><br></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><b>4. **Limitations**</b></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\">Under no circumstances shall ANI MOTORS LTD or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on the ANI MOTORS LTD Internet site, even if ANI MOTORS LTD or an authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><br></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><b>5. **Changes and Corrections**</b></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\">The materials on the ANI MOTORS LTD site may contain typographical or photographic errors. ANI MOTORS LTD does not warrant that any of the materials on its site are accurate, complete, or current. ANI MOTORS LTD may make changes to the materials contained on its site at any time without notice. However, ANI MOTORS LTD does not commit to updating the materials.</span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><br></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><b>6. **Links**</b></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\">ANI MOTORS LTD has not reviewed all of the websites or links connected to its website and is not responsible for the content of any linked site. Inclusion of any link does not imply endorsement by ANI MOTORS LTD of the site. Use of any linked site is at the user\'s own risk.</span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><br></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><b>7. **Modifications to Terms of Use**</b></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\">ANI MOTORS LTD may revise these terms of use for its website at any time without notice. By using this site, you agree to be bound by the current version of these Terms and Conditions of Use.</span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><br></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\"><b>8. **Governing Law**</b></span></p><p data-aos=\"fade-down\" style=\"text-align: left;\"><span style=\"font-size: 14px;\">Any dispute related to the ANI MOTORS LTD site shall be governed by the laws of the country of India, ANI MOTORS LTD State, without regard to its conflict of law provisions. These are the General Terms and Conditions applicable to the use of a website.</span></p><div style=\"text-align: left;\"><br></div>\r\n</div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></div><span style=\"font-size: 14px;\">\r\n</span></section><span style=\"font-size: 14px;\">\r\n</span>", "Content", "2023-10-03 03:26:44", "2023-10-03 03:28:43"),
	("9b383e7c-51f2-4b0e-90a9-1d7b7af23e69", "9b383e4f-1dae-497c-8e78-d9061a965ec3", 1, 0, 1, "<!--<title>content</title>-->\r\n<section class=\"section privacy-section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<div class=\"terms-policy\">\r\n<p data-aos=\"fade-down\">Welcome to the Careers page at ANI MOTORS, where we are pioneering advancements in fleet management and car booking applications. Our commitment to excellence and innovation has positioned us as leaders in the transportation industry. If you are an individual dedicated to making a meaningful impact, possessing a fervor for technological advancements, and seeking to be an integral part of a dynamic team, we invite you to explore the exciting career opportunities available with us.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">**Why Consider a Career at ANI MOTORS**</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">**1. Impactful Contributions:** Join a company at the forefront of transforming how individuals and businesses manage their fleets and book transportation services.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">**2. Culture of Innovation:** Become a part of a culture that prizes continuous innovation, where your ideas are valued, and you have the chance to contribute to cutting-edge solutions.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">**3. Collaborative Work Environment:** Join a diverse and collaborative team that promotes creativity, learning, and professional growth. Our emphasis on teamwork is integral to achieving success.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">**4. Professional Development:** We are committed to investing in our employees\' professional growth by offering training, mentorship, and opportunities for career advancement within the organization.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">**Current Job Openings:**</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">* **Software Test Engineer:** Play a pivotal role in the development and enhancement of our fleet management and car booking applications. Bring your testing&nbsp; proficiency and dedication to creating scalable, user-friendly solutions.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">* **Product Managers:** Drive the vision and strategy of our products, collaborating with cross-functional teams to deliver features that exceed customer expectations.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">* **Sales and Business Development:** Contribute to our expansion by driving sales, forming strategic partnerships, and identifying new business opportunities.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">* **UX/UI Designers:** Shape the user experience and interface of our applications, ensuring they are intuitive, visually appealing, and aligned with industry best practices.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">**How to Apply:**</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">If you are enthused about the future of transportation, excel in a collaborative environment, and are ready to make a significant contribution, we welcome your application. Explore our current job openings and submit your application through email @ muhammad.shoukat@animotor.co.uk</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">ANI MOTORS is an equal opportunity employer, dedicated to fostering an inclusive and diverse workplace. We encourage applications from candidates of all backgrounds.</p><p data-aos=\"fade-down\"><br></p><p data-aos=\"fade-down\">Embark on the journey with us to redefine the future of fleet management and car booking. Together, let\'s drive innovation and shape the way people move!</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>", "Content", "2024-01-31 17:51:28", "2024-01-31 17:54:59"),
	("9ecb0f51-74ee-4f56-aa30-3662881171bd", "99bb306b-9907-4b33-9f4f-ed9d8d892dc4", 1, 0, 1, "<!--<title>content</title>-->\r\n<section class=\"section privacy-section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<div class=\"terms-policy\">\r\n<p data-start=\"200\" data-end=\"235\"><strong data-start=\"200\" data-end=\"235\">We’re Here to Drive You Forward</strong></p><p data-start=\"237\" data-end=\"450\">At <strong data-start=\"240\" data-end=\"254\">ANI Motors</strong>, your comfort, safety, and convenience are our top priorities. Whether you need a private car hire for business, leisure, airport transfers, or special events — we’re just a message or call away.</p><p data-start=\"452\" data-end=\"555\">Have a question about our services? Need help with a booking? Our friendly team is ready to assist you.</p><hr data-start=\"557\" data-end=\"560\"><h3 data-start=\"562\" data-end=\"581\">📬 Get in Touch</h3><p data-start=\"583\" data-end=\"674\"><strong data-start=\"583\" data-end=\"598\">📍 Address:</strong><br data-start=\"615\" data-end=\"618\"></p><p data-start=\"583\" data-end=\"674\">Office 13, Sheepbridge Business Centre&nbsp;</p><p data-start=\"583\" data-end=\"674\">655 Sheffield Road</p><p data-start=\"583\" data-end=\"674\">Chesterfield&nbsp;</p><p data-start=\"583\" data-end=\"674\">S41 9ED</p><p data-start=\"583\" data-end=\"674\"><font color=\"#ffffff\">S41 9LT</font></p><p data-start=\"583\" data-end=\"674\">Derbyshire, UK</p><p data-start=\"676\" data-end=\"748\"><strong data-start=\"676\" data-end=\"689\">📞 Phone:</strong><br data-start=\"689\" data-end=\"692\">+441753424350<span style=\"font-size: 1rem;\">&nbsp;</span></p><p data-start=\"750\" data-end=\"786\"><strong data-start=\"750\" data-end=\"763\">📧 Email:</strong><br data-start=\"763\" data-end=\"766\">\r\n<a data-start=\"766\" data-end=\"786\" class=\"cursor-pointer\" rel=\"noopener\">info@animotors.co.uk</a></p><p data-aos=\"fade-down\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"788\" data-end=\"847\"><strong data-start=\"788\" data-end=\"809\">🕒 Working Hours:</strong><br data-start=\"809\" data-end=\"812\">\r\nMonday – Friday: 9:00 AM – 5:00 PM</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>", "Content", "2025-04-30 12:02:05", "2025-07-30 08:16:14");

/*!40000 ALTER TABLE `page_contents` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` char(36) NOT NULL,
  `title` varchar(191) NOT NULL,
  `path` varchar(191) NOT NULL,
  `header_type` varchar(191) NOT NULL DEFAULT 'default',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `template` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'component',
  `meta` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_path_unique` (`path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `title`, `path`, `header_type`, `is_active`, `template`, `image`, `type`, `meta`, `created_at`, `updated_at`) VALUES
	("99bb306b-96c0-44e9-9dee-71cbc0cd17b1", "Home", "/", "default", 1, NULL, NULL, "component", NULL, "2023-07-26 00:41:42", "2023-07-26 00:41:42"),
	("99bb306b-985e-4e00-b6b3-0492a8c9421b", "Privacy policy", "privacy", "default", 1, NULL, NULL, "component", NULL, "2023-07-26 00:41:42", "2023-07-26 00:41:42"),
	("99bb306b-989c-4d78-9ea9-7b41adb55427", "Terms & Condition", "terms", "default", 1, NULL, NULL, "component", NULL, "2023-07-26 00:41:42", "2023-07-26 00:41:42"),
	("99bb306b-98d4-4258-98a5-7a9ee16aeef9", "About us", "about", "default", 1, NULL, NULL, "component", NULL, "2023-07-26 00:41:42", "2023-07-26 00:41:42"),
	("99bb306b-9907-4b33-9f4f-ed9d8d892dc4", "Contact us", "contact_us", "default", 1, NULL, NULL, "component", NULL, "2023-07-26 00:41:42", "2023-07-26 00:41:42"),
	("9a9f0d51-2f1a-44a5-a781-23be72514d42", "Services", "services", "default", 1, NULL, NULL, "component", NULL, "2023-11-16 14:12:19", "2023-11-16 14:12:19"),
	("9b383e4f-1dae-497c-8e78-d9061a965ec3", "ANI MOTORS Careers", "careers", "default", 1, NULL, NULL, "component", NULL, "2024-01-31 17:50:58", "2024-01-31 17:50:58");

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	("budaklzcrew@gmail.com", "$2y$10$SP.dxKEXeRom4TyhAGmzPuGJ0ixVrgvbRp6/oxV.gPA0cW20inpWq", "2024-04-04 14:28:07"),
	("admin@taxi.com", "$2y$10$lB5lpSXuRJJqHX31Qmdo/e4AnImpWcBtQUbFwd0rp70qszJTnSCTa", "2025-02-05 05:35:38"),
	("ummerabbasi@gmail.com", "$2y$10$A3Rt2P5eM1qa0hPueOB.0.F4zqP1ncmvzq8WVR9NEIXuHwwZNS826", "2025-02-23 04:04:08"),
	("abid.koen@gmail.com", "$2y$10$iy8JgWIPw/QS3RFGDROEQOchgtFiRHWTSLadgbAwm.dKVBXJ9eddK", "2025-03-23 05:15:54"),
	("panahos879@panvli.com", "$2y$10$Y.zlJyCr/.MdwavPDvD6MeaBFuJp9cMjGb94Y3m/qVL6yeHdpp3Ki", "2025-04-30 14:01:33"),
	("abdulahadqaiser5@gmail.com", "$2y$10$amYreBvZvflMXaav71XRd.GAZiL9iaClZMqwtHdS9zZmSL9SS2OmG", "2025-05-01 10:25:29"),
	("hothal5@hotmail.com", "$2y$10$0bUWqyPmuLQAo5oBerTThu5fXIz1lebgEZ22UkjzVOoxYJxMe28gu", "2025-07-22 07:32:33"),
	("hal_azram@outlook.com", "$2y$10$IJsfDx0q4Wv7f898X6wIGOj5.92PPbYX4Oh2JZ/.K//.1Xm53ZnH6", "2025-07-29 12:00:59"),
	("muhammadghurbanabbasi@gmail.com", "$2y$10$eCLmh6OePMkwXFaDNE0wdOD9cAz/Bl5jXJF59jz5upzoqWlTRaRR2", "2025-08-07 03:10:27");

/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `received_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `late_payment_days` int(11) DEFAULT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_driver_id_foreign` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;





# Dump of table pcns
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pcns`;

CREATE TABLE `pcns` (
  `id` char(36) NOT NULL,
  `vrm` varchar(191) DEFAULT NULL,
  `car_id` char(36) NOT NULL,
  `booking_id` char(36) NOT NULL,
  `pcn_no` varchar(191) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `offence_type` varchar(191) DEFAULT NULL,
  `location` varchar(191) DEFAULT NULL,
  `notice_issue_date` date DEFAULT NULL,
  `payment_dead_line` date DEFAULT NULL,
  `appeal_dead_line` date DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `histories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pcns_booking_id_foreign` (`booking_id`),
  KEY `pcns_car_id_foreign` (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 2),
	(2, 1),
	(2, 2),
	(3, 1),
	(3, 2),
	(4, 1),
	(4, 2),
	(5, 1),
	(5, 2),
	(6, 1),
	(6, 2),
	(7, 1),
	(7, 2),
	(8, 1),
	(8, 2),
	(9, 1),
	(9, 2),
	(9, 5),
	(9, 6),
	(10, 1),
	(10, 2),
	(10, 5),
	(10, 6),
	(11, 1),
	(11, 2),
	(11, 5),
	(11, 6),
	(12, 1),
	(12, 2),
	(12, 5),
	(12, 6),
	(13, 1),
	(13, 2),
	(13, 5),
	(14, 1),
	(14, 2),
	(14, 6),
	(15, 1),
	(15, 2),
	(16, 1),
	(16, 2),
	(17, 1),
	(17, 2),
	(18, 1),
	(18, 2),
	(19, 1),
	(19, 2),
	(20, 1),
	(20, 2),
	(21, 1),
	(21, 2),
	(22, 1),
	(22, 2),
	(23, 1),
	(23, 2),
	(24, 1),
	(24, 2),
	(24, 5),
	(24, 6),
	(25, 1),
	(25, 2),
	(26, 1),
	(26, 2),
	(27, 1),
	(27, 2),
	(28, 1),
	(28, 2),
	(28, 5),
	(29, 1),
	(29, 2),
	(30, 1),
	(30, 2),
	(31, 1),
	(31, 2),
	(32, 1),
	(32, 2),
	(33, 1),
	(33, 2),
	(34, 1),
	(34, 2),
	(35, 1),
	(35, 2),
	(36, 1),
	(36, 2),
	(37, 1),
	(37, 2),
	(38, 1),
	(38, 2),
	(39, 1),
	(39, 2),
	(40, 1),
	(40, 2),
	(40, 5),
	(41, 1),
	(41, 2),
	(42, 1),
	(42, 2),
	(43, 1),
	(43, 2),
	(44, 1),
	(44, 2),
	(45, 1),
	(45, 2),
	(46, 1),
	(46, 2),
	(47, 1),
	(47, 2),
	(48, 1),
	(48, 2),
	(49, 1),
	(49, 2),
	(50, 1),
	(50, 2),
	(51, 1),
	(51, 2),
	(52, 1),
	(52, 2),
	(52, 5),
	(52, 6),
	(53, 1),
	(53, 2),
	(54, 1),
	(54, 2),
	(55, 1),
	(55, 2),
	(56, 1),
	(56, 2),
	(57, 1),
	(57, 2),
	(58, 1),
	(58, 2),
	(59, 1),
	(59, 2),
	(60, 1),
	(60, 2),
	(60, 5),
	(60, 6),
	(61, 1),
	(61, 2),
	(62, 1),
	(62, 2),
	(63, 1),
	(63, 2),
	(64, 1),
	(64, 2),
	(65, 1),
	(65, 2),
	(66, 1),
	(66, 2),
	(67, 1),
	(67, 2),
	(68, 1),
	(68, 2),
	(68, 5),
	(68, 6),
	(69, 1),
	(69, 2),
	(70, 1),
	(70, 2),
	(71, 1),
	(71, 2),
	(72, 1),
	(72, 2),
	(73, 1),
	(73, 2),
	(74, 1),
	(74, 2),
	(75, 1),
	(75, 2),
	(76, 1),
	(76, 2),
	(77, 1),
	(77, 2),
	(78, 1),
	(78, 2),
	(79, 1),
	(79, 2),
	(80, 1),
	(80, 2),
	(81, 1),
	(81, 2),
	(82, 1),
	(82, 2),
	(83, 1),
	(83, 2),
	(84, 1),
	(84, 2),
	(85, 1),
	(85, 2),
	(86, 1),
	(86, 2);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table permission_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` char(36) NOT NULL,
  `user_type` varchar(191) NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, "legal", "legal", "Legal", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(2, "website-pages", "website pages", "Website pages", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(3, "settings-components", "settings components", "Settings components", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(4, "settings-pages", "settings pages", "Settings pages", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(5, "cms-setup", "cms setup", "Cms setup", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(6, "configurations", "configurations", "Configurations", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(7, "settings-services", "settings services", "Settings services", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(8, "roles-index", "roles index", "Roles index", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(9, "bookings-index", "bookings index", "Bookings index", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(10, "drivers-read", "drivers read", "Drivers read", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(11, "trips-read", "trips read", "Trips read", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(12, "admin-dashboard", "admin dashboard", "Admin dashboard", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(13, "admins-users", "admins users", "Admins users", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(14, "insurance-coverages-read", "insurance coverages read", "Insurance coverages read", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(15, "regions-create", "Create Regions", "Create Regions", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(16, "regions-read", "Read Regions", "Read Regions", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(17, "regions-update", "Update Regions", "Update Regions", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(18, "regions-delete", "Delete Regions", "Delete Regions", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(19, "settings-create", "Create Settings", "Create Settings", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(20, "settings-read", "Read Settings", "Read Settings", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(21, "settings-update", "Update Settings", "Update Settings", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(22, "settings-delete", "Delete Settings", "Delete Settings", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(23, "users-create", "Create Users", "Create Users", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(24, "users-read", "Read Users", "Read Users", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(25, "users-update", "Update Users", "Update Users", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(26, "users-delete", "Delete Users", "Delete Users", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(27, "roles-create", "Create Roles", "Create Roles", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(28, "roles-read", "Read Roles", "Read Roles", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(29, "roles-update", "Update Roles", "Update Roles", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(30, "roles-delete", "Delete Roles", "Delete Roles", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(31, "vehicle_types-create", "Create Vehicle_types", "Create Vehicle_types", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(32, "vehicle_types-read", "Read Vehicle_types", "Read Vehicle_types", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(33, "vehicle_types-update", "Update Vehicle_types", "Update Vehicle_types", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(34, "vehicle_types-delete", "Delete Vehicle_types", "Delete Vehicle_types", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(35, "vehicle_makes-create", "Create Vehicle_makes", "Create Vehicle_makes", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(36, "vehicle_makes-read", "Read Vehicle_makes", "Read Vehicle_makes", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(37, "vehicle_makes-update", "Update Vehicle_makes", "Update Vehicle_makes", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(38, "vehicle_makes-delete", "Delete Vehicle_makes", "Delete Vehicle_makes", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(39, "admins-create", "Create Admins", "Create Admins", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(40, "admins-read", "Read Admins", "Read Admins", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(41, "admins-update", "Update Admins", "Update Admins", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(42, "admins-delete", "Delete Admins", "Delete Admins", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(43, "vehicle_models-create", "Create Vehicle_models", "Create Vehicle_models", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(44, "vehicle_models-read", "Read Vehicle_models", "Read Vehicle_models", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(45, "vehicle_models-update", "Update Vehicle_models", "Update Vehicle_models", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(46, "vehicle_models-delete", "Delete Vehicle_models", "Delete Vehicle_models", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(47, "countries-create", "Create Countries", "Create Countries", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(48, "countries-read", "Read Countries", "Read Countries", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(49, "countries-update", "Update Countries", "Update Countries", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(50, "countries-delete", "Delete Countries", "Delete Countries", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(51, "complains-create", "Create Complains", "Create Complains", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(52, "complains-read", "Read Complains", "Read Complains", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(53, "complains-update", "Update Complains", "Update Complains", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(54, "complains-delete", "Delete Complains", "Delete Complains", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(55, "documents-create", "Create Documents", "Create Documents", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(56, "documents-read", "Read Documents", "Read Documents", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(57, "documents-update", "Update Documents", "Update Documents", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(58, "documents-delete", "Delete Documents", "Delete Documents", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(59, "cars-create", "Create Cars", "Create Cars", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(60, "cars-read", "Read Cars", "Read Cars", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(61, "cars-update", "Update Cars", "Update Cars", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(62, "cars-delete", "Delete Cars", "Delete Cars", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(63, "faqs-create", "Create Faqs", "Create Faqs", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(64, "faqs-read", "Read Faqs", "Read Faqs", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(65, "faqs-update", "Update Faqs", "Update Faqs", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(66, "faqs-delete", "Delete Faqs", "Delete Faqs", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(67, "rental-create", "Create Rental", "Create Rental", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(68, "rental-read", "Read Rental", "Read Rental", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(69, "rental-update", "Update Rental", "Update Rental", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(70, "rental-delete", "Delete Rental", "Delete Rental", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(71, "companies-create", "Create Companies", "Create Companies", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(72, "companies-read", "Read Companies", "Read Companies", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(73, "companies-update", "Update Companies", "Update Companies", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(74, "companies-delete", "Delete Companies", "Delete Companies", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(75, "cancellation_reasons-create", "Create Cancellation_reasons", "Create Cancellation_reasons", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(76, "cancellation_reasons-read", "Read Cancellation_reasons", "Read Cancellation_reasons", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(77, "cancellation_reasons-update", "Update Cancellation_reasons", "Update Cancellation_reasons", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(78, "cancellation_reasons-delete", "Delete Cancellation_reasons", "Delete Cancellation_reasons", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(79, "services-create", "Create Services", "Create Services", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(80, "services-read", "Read Services", "Read Services", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(81, "services-update", "Update Services", "Update Services", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(82, "services-delete", "Delete Services", "Delete Services", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(83, "pages-create", "Create Pages", "Create Pages", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(84, "pages-read", "Read Pages", "Read Pages", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(85, "pages-update", "Update Pages", "Update Pages", "2025-11-22 06:20:48", "2025-11-22 06:20:48"),
	(86, "pages-delete", "Delete Pages", "Delete Pages", "2025-11-22 06:20:48", "2025-11-22 06:20:48");

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, "App\\Models\\User", "9a9fe4bc-d3be-495f-a5ac-7b9e7c5ee884", "muhammadhamza0821@gmail.com", "4b2f1679d63166551b69a46e9aec4c6b2ff910271f572f0f82716a2a1c8ffb36", "[\"*\"]", "2023-11-17 07:54:12", NULL, "2023-11-17 00:14:40", "2023-11-17 07:54:12"),
	(2, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "0f319ea59a2ec7d095db7fde7eda685dfc3bb215b4bf3f57537649d259ebd3b4", "[\"*\"]", "2023-11-17 03:40:47", NULL, "2023-11-17 00:45:45", "2023-11-17 03:40:47"),
	(3, "App\\Models\\User", "9aa07df9-ec4c-4c3e-94ef-3a596ccdc169", "abbasisammi@gmail.com", "e1ec1f8a06be9e73117f1cc1c62dfd65123a9e35da2e26f4524abec410a28cc7", "[\"*\"]", "2023-11-17 07:48:02", NULL, "2023-11-17 07:23:09", "2023-11-17 07:48:02"),
	(4, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "eef5dab866814411eaa4610934657990562e18a3e895ae19ca2400613275d32b", "[\"*\"]", NULL, NULL, "2023-11-17 13:23:15", "2023-11-17 13:23:15"),
	(5, "App\\Models\\User", "9aa133d5-4cd3-4eaa-9959-1365ad5245e2", "ummerabbasi@gmail.com", "d7b39d4966f31f09fe6b64495bdd22f3e91904a07561f9cf94ba8f90bbc19296", "[\"*\"]", "2023-11-17 15:52:24", NULL, "2023-11-17 15:51:40", "2023-11-17 15:52:24"),
	(6, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "Benjaminchukwudi0@gmail.com", "ffcfdfd5cdb5ce4fd046414cf51e0f3fe1fb7c84089f29d406b3f26eeb7f89b8", "[\"*\"]", "2023-11-17 23:17:11", NULL, "2023-11-17 23:04:13", "2023-11-17 23:17:11"),
	(7, "App\\Models\\User", "9a9fe4bc-d3be-495f-a5ac-7b9e7c5ee884", "muhammadhamza0821@gmail.com", "37055066db1badc9893da7435ed4ca073691e6d4f8c49424b9cd47b5652c027a", "[\"*\"]", "2023-11-18 00:00:40", NULL, "2023-11-17 23:47:52", "2023-11-18 00:00:40"),
	(8, "App\\Models\\User", "9aa07df9-ec4c-4c3e-94ef-3a596ccdc169", "abbasisammi@gmail.com", "74cb12d8c9a00dfcbc7d5a3dfddbe334cad6e228951c9272a0e73ac2891b1ce0", "[\"*\"]", "2023-11-18 03:49:15", NULL, "2023-11-18 03:46:39", "2023-11-18 03:49:15"),
	(9, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "d0c460e4ebb3b75041913a3214e5dfedd05fd40472434db3cdb83f37e6b9b4e6", "[\"*\"]", "2023-11-18 03:49:21", NULL, "2023-11-18 03:47:15", "2023-11-18 03:49:21"),
	(10, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "5170c00cfd9c944d64c8a2728bb39d188cbfa082662310bde1cde93e79dc30db", "[\"*\"]", "2023-11-18 04:03:01", NULL, "2023-11-18 03:58:53", "2023-11-18 04:03:01"),
	(11, "App\\Models\\User", "9a9fe4bc-d3be-495f-a5ac-7b9e7c5ee884", "muhammadhamza0821@gmail.com", "05ebfd10f460f9111797c44ae2f6971b648c431a3556f9bf41ff3829ab69df80", "[\"*\"]", "2023-11-18 05:23:43", NULL, "2023-11-18 05:23:22", "2023-11-18 05:23:43"),
	(12, "App\\Models\\User", "9a9fe4bc-d3be-495f-a5ac-7b9e7c5ee884", "muhammadhamza0821@gmail.com", "27287d01bcd17a46828a3f70af39d29ae4aa0d0071b0adce8b2f37ba1d68edd1", "[\"*\"]", "2023-11-18 05:27:43", NULL, "2023-11-18 05:27:42", "2023-11-18 05:27:43"),
	(13, "App\\Models\\User", "9aa5b0d5-e61d-4cd3-8fb1-23d002bfcc74", "atiqkhaliq45@gmail.com", "cca97470fda69f9ae90de63d9a6f13d2395bc7c6083237eccfa6edc91584247a", "[\"*\"]", "2023-11-19 21:26:11", NULL, "2023-11-19 21:24:30", "2023-11-19 21:26:11"),
	(14, "App\\Models\\User", "9aaa65f6-9982-448a-908a-ffa7c1fa1f8d", "Kossysmart@gmail.com", "add617ab105d05d9d3aa1a32caf5e56517bb9adbd5773bf53e6232516f547418", "[\"*\"]", "2023-11-22 05:38:35", NULL, "2023-11-22 05:34:17", "2023-11-22 05:38:35"),
	(15, "App\\Models\\User", "9aaa65f6-9982-448a-908a-ffa7c1fa1f8d", "Kossysmart@gmail.com", "f36ea950aef94368484e8b4da67753ce60c9ec4e11455cfd056e544d2d5ab875", "[\"*\"]", NULL, NULL, "2023-11-22 05:39:05", "2023-11-22 05:39:05"),
	(16, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "Benjaminchukwudi0@gmail.com", "677cd9305aa30163f1341a7aee1227f2cd48160e09ee076590a0f3c8f23a3a11", "[\"*\"]", "2023-11-23 15:34:10", NULL, "2023-11-23 15:27:38", "2023-11-23 15:34:10"),
	(17, "App\\Models\\User", "9aa07df9-ec4c-4c3e-94ef-3a596ccdc169", "abbasisammi@gmail.com", "67febe35806072d1e069fce2d8c07b69e3272405856ffb4fe513f04144bd7dee", "[\"*\"]", "2023-11-29 11:17:14", NULL, "2023-11-29 11:17:07", "2023-11-29 11:17:14"),
	(18, "App\\Models\\User", "9ac174db-8220-4839-a554-0f1ab2f69345", "Hamza.aries14@gmail.com", "8f9c1dfd4e33d6d1e3034fc28fff82cbbaa06b9f1f37e9877804d4f9876f7cfa", "[\"*\"]", "2023-12-03 16:41:12", NULL, "2023-12-03 16:39:59", "2023-12-03 16:41:12"),
	(19, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "Benjaminchukwudi0@gmail.com", "0e029da2587575737e025601596b1ec063649b3a3b653421e511d17d33807867", "[\"*\"]", "2023-12-05 02:35:15", NULL, "2023-12-05 02:33:49", "2023-12-05 02:35:15"),
	(20, "App\\Models\\User", "9ac174db-8220-4839-a554-0f1ab2f69345", "Hamza.aries14@gmail.com", "0a0e72f003233f1e9d4942435319162972098696700505dca677b10c3a639b08", "[\"*\"]", "2023-12-05 04:03:11", NULL, "2023-12-05 04:01:49", "2023-12-05 04:03:11"),
	(21, "App\\Models\\User", "9aa07df9-ec4c-4c3e-94ef-3a596ccdc169", "abbasisammi@gmail.com", "883fb7782daf26b0bca37539dc3f1d50d445a791437cfa99cbbfaf8a552e979d", "[\"*\"]", "2023-12-06 15:18:21", NULL, "2023-12-06 15:16:36", "2023-12-06 15:18:21"),
	(22, "App\\Models\\User", "9aa07df9-ec4c-4c3e-94ef-3a596ccdc169", "abbasisammi@gmail.com", "24c96361f6cc046b3241cfc25a1cd0677b7f41f92fa70f8d7177e14e7cf4c3d9", "[\"*\"]", "2024-01-13 13:52:04", NULL, "2024-01-13 13:52:00", "2024-01-13 13:52:04"),
	(23, "App\\Models\\User", "9b6d5d6b-abec-4140-aa57-ece19b55e426", "qa.12@mailinator.com", "bc7a1356c79ea9b77a121a629009aa4eb36ee1eeca5b7ce88299ee434b5a5bf5", "[\"*\"]", "2024-02-27 03:57:26", NULL, "2024-02-27 03:36:50", "2024-02-27 03:57:26"),
	(24, "App\\Models\\User", "9b6d5e1d-86a6-4cc1-b547-687315b2d417", "atiq.idenbrid@gmail.com", "0e3810e0fbd46cce69dab4219364a7b9de1dd8aa81a772f4528df8c0261485d3", "[\"*\"]", "2024-02-27 03:56:17", NULL, "2024-02-27 03:38:47", "2024-02-27 03:56:17"),
	(25, "App\\Models\\User", "9b6d5e1d-86a6-4cc1-b547-687315b2d417", "atiq.idenbrid@gmail.com", "53d04d99e7f0a8d7201378567d837492b45336af4923a26fa696c39673c87318", "[\"*\"]", "2024-02-27 04:16:19", NULL, "2024-02-27 03:57:33", "2024-02-27 04:16:19"),
	(26, "App\\Models\\User", "9b6d5d6b-abec-4140-aa57-ece19b55e426", "qa.12@mailinator.com", "cb2da08d92a93e1a5c2031d4e7ee3ca9ba7cc078f52e338d43c5b8d4aef11e8e", "[\"*\"]", "2024-02-27 03:58:56", NULL, "2024-02-27 03:58:52", "2024-02-27 03:58:56"),
	(27, "App\\Models\\User", "9b6d5e1d-86a6-4cc1-b547-687315b2d417", "atiq.idenbrid@gmail.com", "aa6550a7408a88fe1453a59a04351d004830bbfa214848db9b4fbbc49619fb60", "[\"*\"]", NULL, NULL, "2024-02-27 04:58:11", "2024-02-27 04:58:11"),
	(28, "App\\Models\\User", "9b6d5e1d-86a6-4cc1-b547-687315b2d417", "atiq.idenbrid@gmail.com", "c5f644447762bd78da448fdd5aa2c2924f14a2503748541d6f075dcd49b3a1b9", "[\"*\"]", NULL, NULL, "2024-03-12 11:16:56", "2024-03-12 11:16:56"),
	(29, "App\\Models\\User", "9bc20c6b-cd0e-42f5-88b4-ad4e150ba908", "qa123@mailinator.com", "24432b0eba6e343063849ef6848485ea86127f7b21561fee954587ac897a03c5", "[\"*\"]", "2024-04-09 06:45:13", NULL, "2024-04-09 06:44:52", "2024-04-09 06:45:13"),
	(30, "App\\Models\\User", "9bc20c6b-cd0e-42f5-88b4-ad4e150ba908", "qa123@mailinator.com", "b335254c5718d75e1e029d882ad7063dbbc3990463179e7d29cb58d61e4756b4", "[\"*\"]", "2024-04-09 11:44:12", NULL, "2024-04-09 10:34:49", "2024-04-09 11:44:12"),
	(31, "App\\Models\\User", "9bc20c6b-cd0e-42f5-88b4-ad4e150ba908", "qa123@mailinator.com", "ef33cdd727ef1106b3c0f6be6f1adc97498518ca76f5bf8b6c64cfeb445363e9", "[\"*\"]", "2024-04-10 09:38:07", NULL, "2024-04-10 03:48:09", "2024-04-10 09:38:07"),
	(32, "App\\Models\\User", "9bc20c6b-cd0e-42f5-88b4-ad4e150ba908", "qa123@mailinator.com", "bd47ce7c51f717aa286e6c068607b6d33786b905723f22d835bb20642dcb1d4d", "[\"*\"]", "2024-04-16 03:10:03", NULL, "2024-04-15 23:11:34", "2024-04-16 03:10:03"),
	(33, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "1710bb5e2d96df37afc277973e8a41d96a738e10b227b2ac287a1414733dc1f2", "[\"*\"]", "2024-04-20 03:04:35", NULL, "2024-04-20 03:04:32", "2024-04-20 03:04:35"),
	(34, "App\\Models\\User", "9bc20c6b-cd0e-42f5-88b4-ad4e150ba908", "qa123@mailinator.com", "e666c7eeda22f160a94e5dc5d77a047e60ce217048c43f583c702da0a5636458", "[\"*\"]", "2024-04-20 04:01:49", NULL, "2024-04-20 04:01:13", "2024-04-20 04:01:49"),
	(35, "App\\Models\\User", "9b6d5e1d-86a6-4cc1-b547-687315b2d417", "atiq.idenbrid@gmail.com", "e56db7d3334a6937d93a2004af542ba42641b6376e0e323c3a04c6d73742531d", "[\"*\"]", "2024-05-01 01:53:42", NULL, "2024-05-01 01:52:57", "2024-05-01 01:53:42"),
	(36, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "b7a24efa1c307dbcd541e76ab45e5959bce95c4b7322deda0a7fa30fc4ef6af2", "[\"*\"]", "2024-05-19 03:04:33", NULL, "2024-05-19 02:49:46", "2024-05-19 03:04:33"),
	(37, "App\\Models\\User", "9ac174db-8220-4839-a554-0f1ab2f69345", "Hamza.aries14@gmail.com", "101921a997cec3338953558ee439badd14bdd5ba771bb4d4b02ad447194a1522", "[\"*\"]", "2024-05-30 04:15:40", NULL, "2024-05-30 04:15:37", "2024-05-30 04:15:40"),
	(38, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "48aef3a7c2849aef139c94ff44a63ab6fbdf3cc8f860cbb538b87a742744606f", "[\"*\"]", "2024-11-29 01:16:43", NULL, "2024-11-29 00:55:34", "2024-11-29 01:16:43"),
	(39, "App\\Models\\User", "9d986313-3b25-4f24-b98d-8fca1b37d2a4", "devpnancy@gmail.com", "42b1b85fe3976e7c48c0a45ca2b76e94508617740ad9d8c61a9a5fb3dfdde043", "[\"*\"]", NULL, NULL, "2024-11-29 01:17:07", "2024-11-29 01:17:07"),
	(40, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "4565c80e384b768196834bfbdf87b14afa2ad64866077005f0fd6c30451e7d51", "[\"*\"]", "2024-11-29 01:18:36", NULL, "2024-11-29 01:17:38", "2024-11-29 01:18:36"),
	(41, "App\\Models\\User", "9d986313-3b25-4f24-b98d-8fca1b37d2a4", "devpnancy@gmail.com", "12dddccb46522475ef828a487102713c04038ed108d1a6e594bec3cb5eba69cc", "[\"*\"]", "2024-11-29 01:18:35", NULL, "2024-11-29 01:18:15", "2024-11-29 01:18:35"),
	(42, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "6caaeb5abc0945f1ac0e31450165bee72b495b1742cd8c65fa25697c3dda18f7", "[\"*\"]", "2024-11-29 01:41:05", NULL, "2024-11-29 01:20:18", "2024-11-29 01:41:05"),
	(43, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "c45ce279535edb1ca3213912f0144ef64da239bc0981c6b1d0ca46a288aa0457", "[\"*\"]", "2024-11-29 02:03:06", NULL, "2024-11-29 01:44:57", "2024-11-29 02:03:06"),
	(44, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "0d3f9876696122294ea9f1b956be2b77a89deb8e47a165ec0580b59fadaa14f6", "[\"*\"]", "2024-11-30 02:38:22", NULL, "2024-11-30 02:35:19", "2024-11-30 02:38:22"),
	(45, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "eae32263ec2b54e3fbe2e517f929d0403f597a791f32651b40e74554512da926", "[\"*\"]", "2024-11-30 07:39:33", NULL, "2024-11-30 05:26:50", "2024-11-30 07:39:33"),
	(46, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "14fb3325ed9e1665f16803cf7ee7a16c4943efb7b40c0794e017539d7317e191", "[\"*\"]", "2024-12-03 10:36:33", NULL, "2024-12-03 10:17:02", "2024-12-03 10:36:33"),
	(47, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "c4b3819d0bf686d8216a8e563c05266cb97d3874f27d571506026082401e6518", "[\"*\"]", "2024-12-03 10:59:20", NULL, "2024-12-03 10:53:56", "2024-12-03 10:59:20"),
	(48, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "720d2ebe9af761b0645e1b840731fee1e20fb422d516c3026293f6f96d937954", "[\"*\"]", "2024-12-10 23:30:58", NULL, "2024-12-10 23:21:05", "2024-12-10 23:30:58"),
	(49, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "0a85ae24062d01c1ebd243e9f8b1de154533298d4cb420d592a3c714d2aed54c", "[\"*\"]", "2024-12-10 23:35:26", NULL, "2024-12-10 23:31:51", "2024-12-10 23:35:26"),
	(50, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "589f1012fce7cdbb88c7b2b0ce89615fda31e8b924fb13222ae79e8212c43bd0", "[\"*\"]", "2024-12-10 23:51:23", NULL, "2024-12-10 23:35:53", "2024-12-10 23:51:23"),
	(51, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "d3099ee107459a09a2e874decd3dcef84f52f0a437ed3ab6bc8901ee35cbe8f1", "[\"*\"]", "2024-12-10 23:52:50", NULL, "2024-12-10 23:52:50", "2024-12-10 23:52:50"),
	(52, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "a28064cd3c7d795edacbe5fd7c159ffa8b5ad3e890b263c20da53e94fcc1c079", "[\"*\"]", "2024-12-11 00:06:40", NULL, "2024-12-10 23:56:25", "2024-12-11 00:06:40"),
	(53, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "d3ac2bfc000d4e76f74dbb5fd2a6813bf218d39672669deff81546b1cf9f8307", "[\"*\"]", "2024-12-11 00:32:36", NULL, "2024-12-11 00:06:59", "2024-12-11 00:32:36"),
	(54, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "a360263c6c469293326a8a771416cb3485495f740f3d6b9a940de165f0727d89", "[\"*\"]", "2024-12-11 07:45:34", NULL, "2024-12-11 07:45:18", "2024-12-11 07:45:34"),
	(55, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "a686ceca042fe9cdb877f2d3cf357476422b39c2eef9abc5476571409e5223b2", "[\"*\"]", "2024-12-12 04:40:53", NULL, "2024-12-12 04:40:52", "2024-12-12 04:40:53"),
	(56, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "5f5e31ff58ba08baca9c3e53555a5190954c09babd3bebb6c96f8fb9fde1ed23", "[\"*\"]", "2024-12-12 05:47:49", NULL, "2024-12-12 05:15:56", "2024-12-12 05:47:49"),
	(57, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "e7f6ac177326623af77ccdabb90d4f4e569b4842c4dab7242ad23b6e91bb4faa", "[\"*\"]", "2024-12-12 06:03:30", NULL, "2024-12-12 05:51:25", "2024-12-12 06:03:30"),
	(58, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "e25507ebbf071aec829a291e70a6356ff467624dbe4875620c6c65c0e9f31e30", "[\"*\"]", "2024-12-15 04:38:24", NULL, "2024-12-15 04:38:23", "2024-12-15 04:38:24"),
	(59, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "6057de68e8ce1147ed9a09b5c3f3af11c4114ae29a0f40cd720b1eb12d9cfb6a", "[\"*\"]", "2024-12-15 05:52:08", NULL, "2024-12-15 04:53:27", "2024-12-15 05:52:08"),
	(60, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "8d1ac7e7662c11d346176f50cb401f85bcae21395dead23b569572d17c89da33", "[\"*\"]", "2024-12-15 05:53:07", NULL, "2024-12-15 05:52:38", "2024-12-15 05:53:07"),
	(61, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "5d1da03576497116a44dd837cbe49961ea782678baa9f4405f9e5965c1e7caa7", "[\"*\"]", "2024-12-15 07:08:16", NULL, "2024-12-15 05:57:41", "2024-12-15 07:08:16"),
	(62, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "24d59d40665a16de08316a8abb7505e732e028696d9e2c3c6febe147d79be83d", "[\"*\"]", "2024-12-15 07:30:13", NULL, "2024-12-15 07:30:13", "2024-12-15 07:30:13"),
	(63, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "581130dc17d50a416cd8276da201d97199a14d92591bf037435e0d72ec398b5f", "[\"*\"]", "2024-12-15 07:49:50", NULL, "2024-12-15 07:37:36", "2024-12-15 07:49:50"),
	(64, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "c33f7538cec28afc43a665b563e0faa826e2cbab4a51c820b15ec837e55ca115", "[\"*\"]", "2024-12-15 08:25:24", NULL, "2024-12-15 07:53:16", "2024-12-15 08:25:24"),
	(65, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "ec44ef1388e97fdbc09945d26fbe192b39c4851825b944754c5e9f0a48f4b485", "[\"*\"]", "2024-12-15 09:17:05", NULL, "2024-12-15 08:51:22", "2024-12-15 09:17:05"),
	(66, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "ccd8a4e4a30b34c5bfa00fa2ddb0e5215aaacfd640ac462b6869d4633f2a0e20", "[\"*\"]", "2024-12-24 02:13:14", NULL, "2024-12-24 01:53:22", "2024-12-24 02:13:14"),
	(67, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "17b84add0d252b34824fa135c3879df13e82968e9da0056a36a52abf4a937030", "[\"*\"]", "2024-12-24 09:51:41", NULL, "2024-12-24 03:55:38", "2024-12-24 09:51:41"),
	(68, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "0bd56050290256dcf02e4a85a317aa0fa31f09ea3f84a630ca9852cd146586fc", "[\"*\"]", "2024-12-25 03:55:45", NULL, "2024-12-25 03:35:44", "2024-12-25 03:55:45"),
	(69, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "27c63da0d3e9c90c778e28d20f94c798708f6c5806551bfdc3544f6afaccd737", "[\"*\"]", "2024-12-25 05:05:58", NULL, "2024-12-25 04:14:00", "2024-12-25 05:05:58"),
	(70, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "becff4513b17f71cc17b2ac5df400a8e85f2ba782c267a6f724633b2fd51b357", "[\"*\"]", "2024-12-25 05:41:30", NULL, "2024-12-25 05:41:29", "2024-12-25 05:41:30"),
	(71, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "a113424b41de56f15cb080f586d622c7365fcdbca433ccc6347b84d6d728ab6e", "[\"*\"]", "2024-12-26 01:01:32", NULL, "2024-12-25 08:19:01", "2024-12-26 01:01:32"),
	(72, "App\\Models\\User", "9ded1186-f80f-477e-b406-14c9c3bd8110", "saiyedtabrez786@gmail.com", "1b809ab86c98dc99c7ca2e1344545fd3a44b47bbce48575003846d451711b9fb", "[\"*\"]", NULL, NULL, "2025-01-10 03:34:28", "2025-01-10 03:34:28"),
	(73, "App\\Models\\User", "9ded11c0-dbef-47dc-83aa-3a29e48b98a4", "tabrez@technource.com", "e6e28a138e94ef836a4895034c555f6dc56d5b149d60aafb80e1cf9c7ea02219", "[\"*\"]", NULL, NULL, "2025-01-10 03:35:06", "2025-01-10 03:35:06"),
	(74, "App\\Models\\User", "9ded1186-f80f-477e-b406-14c9c3bd8110", "saiyedtabrez786@gmail.com", "d03c6f0fe7c541160c59c2b35e1e9e0c86f4000d5b515824b0f569cdf891d149", "[\"*\"]", "2025-01-10 03:38:38", NULL, "2025-01-10 03:35:36", "2025-01-10 03:38:38"),
	(75, "App\\Models\\User", "9ded1186-f80f-477e-b406-14c9c3bd8110", "saiyedtabrez786@gmail.com", "b80f8eff2283348cf77ee0433c48887ffa72d18aa711e166742da90e282d2530", "[\"*\"]", "2025-01-10 03:48:44", NULL, "2025-01-10 03:44:58", "2025-01-10 03:48:44"),
	(76, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "72acd5b2b98d7371c954b15dd1c3a1204cccd82d2decd3856d07574dbfa3aae1", "[\"*\"]", "2025-01-12 02:54:41", NULL, "2025-01-12 02:54:37", "2025-01-12 02:54:41"),
	(77, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "5156c705bb6d349e941b42b81cc170b557a6a4ee8b54e37aff81a901c8b4e822", "[\"*\"]", "2025-01-12 03:20:56", NULL, "2025-01-12 02:58:11", "2025-01-12 03:20:56"),
	(78, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "4b53b1b8d169c527d00cb87357776b2030854521804f0dadfd91195ab4bffc5f", "[\"*\"]", "2025-01-12 03:23:47", NULL, "2025-01-12 03:23:46", "2025-01-12 03:23:47"),
	(79, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "87180f83bdb69d967a5eb5cd5671a75395a9d824d9dd944fb00f0b80e888864f", "[\"*\"]", "2025-01-12 04:23:39", NULL, "2025-01-12 04:23:39", "2025-01-12 04:23:39"),
	(80, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "f2386c1043be1568b1333496a916755d81f20a52586edc4a3b2902199edd6089", "[\"*\"]", "2025-01-12 14:52:37", NULL, "2025-01-12 14:40:29", "2025-01-12 14:52:37"),
	(81, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "dc06636d9b147b9a6b3c5d127cac7ffe72d01f29ffa4ad7736a057e7e81bf440", "[\"*\"]", "2025-01-13 05:19:07", NULL, "2025-01-13 05:19:04", "2025-01-13 05:19:07"),
	(82, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "861c10161165f232629d585fd37deea490838b5083252d649bea2fb3b15831a0", "[\"*\"]", "2025-01-13 12:48:03", NULL, "2025-01-13 12:46:52", "2025-01-13 12:48:03"),
	(83, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "df7beeed988072dd1686dc6b6927dbf39e534b397837adf5b7bceaf6d1a35cde", "[\"*\"]", "2025-01-14 02:20:20", NULL, "2025-01-14 01:08:13", "2025-01-14 02:20:20"),
	(84, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "d4274f4120884e7b728a359e68a9f3f0281101cb3368b5823de4873cc228fdef", "[\"*\"]", "2025-01-14 09:47:38", NULL, "2025-01-14 09:47:37", "2025-01-14 09:47:38"),
	(85, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "23ef9494ae16ce75a10c69076e19ee374a846e53869bd5667a256b518455cdc1", "[\"*\"]", "2025-01-15 01:40:52", NULL, "2025-01-15 01:40:47", "2025-01-15 01:40:52"),
	(86, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "f023ffda3782fc80fffed867b3b097b3feb5e85757354247408922c7e479a44a", "[\"*\"]", "2025-01-21 02:27:21", NULL, "2025-01-21 02:17:56", "2025-01-21 02:27:21"),
	(87, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "3ffd5b255ccf1dec6f7710e0947bac4b430b056adcfdea0cfeb6e230727cd560", "[\"*\"]", "2025-01-21 02:35:11", NULL, "2025-01-21 02:32:09", "2025-01-21 02:35:11"),
	(88, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "7b8811da9617e2862f3181c1145ff7a922d1818baa4a88c248d5faa81bd7a828", "[\"*\"]", "2025-01-21 02:53:18", NULL, "2025-01-21 02:41:13", "2025-01-21 02:53:18"),
	(89, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "9a0014cac050344bd28f3512c44d3d39301d1ddcc0cf94888ed5c87257fc895e", "[\"*\"]", "2025-01-21 03:08:56", NULL, "2025-01-21 02:55:10", "2025-01-21 03:08:56"),
	(90, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "06897ba7d9007202995612d0a02b14c3113abc459e1e9fd22d19b4a8330b0dff", "[\"*\"]", "2025-01-21 03:30:13", NULL, "2025-01-21 03:27:38", "2025-01-21 03:30:13"),
	(91, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "e2754df7760779b8e67fefae4e6a6e236a2d43b0c3016f61ea8b0b9dae008c88", "[\"*\"]", "2025-01-21 03:43:14", NULL, "2025-01-21 03:36:18", "2025-01-21 03:43:14"),
	(92, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "f501a2f2eaf7a71be37fe6b4de981ac19d358a2f5c4e5debe17f7bb8dfaca873", "[\"*\"]", "2025-01-21 04:00:50", NULL, "2025-01-21 04:00:06", "2025-01-21 04:00:50"),
	(93, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "9bf340e455279d674de9c0fb12e3a27cb9f28b0ef53f141f5f4c07aa85576721", "[\"*\"]", "2025-01-21 04:20:32", NULL, "2025-01-21 04:02:16", "2025-01-21 04:20:32"),
	(94, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "836680a68ccc9198917d88e512ab9c2ebf9361824c109ff7b089001c4d1c0bde", "[\"*\"]", "2025-01-21 06:21:02", NULL, "2025-01-21 04:29:21", "2025-01-21 06:21:02"),
	(95, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "76dbd31d570a849b591a34f81634fcac1aaeb7152ef94978c291302930ffb243", "[\"*\"]", "2025-01-21 06:24:11", NULL, "2025-01-21 06:23:51", "2025-01-21 06:24:11"),
	(96, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "7f92c9bf7cbc9cfd00ad694a0a047ffed1a8bacc6db6e81c7e7b82ae0040fb11", "[\"*\"]", "2025-01-21 06:37:05", NULL, "2025-01-21 06:37:04", "2025-01-21 06:37:05"),
	(97, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "0e6954e56ea3b329e8cf0177b56036858d39ce1444981045448f1f1c47083d40", "[\"*\"]", "2025-01-21 06:40:06", NULL, "2025-01-21 06:40:05", "2025-01-21 06:40:06"),
	(98, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "6251f670a4e05c949b62f06d30bd558c3dbfd94b3cd4e1711fb2934854c19222", "[\"*\"]", "2025-01-21 06:42:55", NULL, "2025-01-21 06:42:54", "2025-01-21 06:42:55"),
	(99, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "4dc99272d079cc7aa1879d3c70ead9c7c6da240de0c09c9efa4d0683c7ddf36c", "[\"*\"]", "2025-01-21 07:01:21", NULL, "2025-01-21 07:01:20", "2025-01-21 07:01:21"),
	(100, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "2942f94bc9b1a507b231f63414b53843c6e3c3447f326c5aa75a0728bba84ac0", "[\"*\"]", "2025-01-21 07:40:41", NULL, "2025-01-21 07:40:40", "2025-01-21 07:40:41"),
	(101, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "8494f7bc7a6eb46408495af7fd89bab58b3ec38ae378f0e080ffc7c8d084c273", "[\"*\"]", "2025-01-21 08:02:33", NULL, "2025-01-21 07:59:20", "2025-01-21 08:02:33"),
	(102, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "3ed7ac322d265986568eb61ee14152007806b9910584c5995bb1f3b9a8e87965", "[\"*\"]", "2025-01-21 08:05:24", NULL, "2025-01-21 08:05:23", "2025-01-21 08:05:24"),
	(103, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "02c5abb812c2ff9b45089a155cdc5d0553c3b78f71d6639510bf442b7f6ff13b", "[\"*\"]", "2025-01-26 11:09:49", NULL, "2025-01-26 10:35:49", "2025-01-26 11:09:49"),
	(104, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "69707b1c4b99aa0ca3e7b4875eb446f33875d34a0e170a15246336ad392237f4", "[\"*\"]", "2025-01-26 11:21:39", NULL, "2025-01-26 11:21:38", "2025-01-26 11:21:39"),
	(105, "App\\Models\\User", "9e0fc574-e315-460f-871c-983dd3194753", "abid.koen@gmail.com", "5c91b2362617728d95c5741455986b321ad449a3bb0452944bdbba8a944e2f12", "[\"*\"]", NULL, NULL, "2025-01-27 09:35:44", "2025-01-27 09:35:44"),
	(106, "App\\Models\\User", "9e0fc574-e315-460f-871c-983dd3194753", "abid.koen@gmail.com", "220db9033cacefa9bee3311ca2071a8954e96ea91b205aa7d67f92cb9bb74c33", "[\"*\"]", "2025-01-27 09:42:06", NULL, "2025-01-27 09:36:36", "2025-01-27 09:42:06"),
	(107, "App\\Models\\User", "9e114cd0-1d37-48a0-aac7-48a8a565fec6", "abc@gmail.com", "9e1c865acc34baeefdc32d8917846ede6290094aa1909b7a1152931a275c08ac", "[\"*\"]", NULL, NULL, "2025-01-28 03:50:03", "2025-01-28 03:50:03"),
	(108, "App\\Models\\User", "9e114cf9-132f-45fe-ba71-4f2c3ae00924", "abc123@gmail.com", "bb318900c21249e2f41ea4f962877c9bc29f163d56baf44170a9e26b61a5ceb8", "[\"*\"]", NULL, NULL, "2025-01-28 03:50:30", "2025-01-28 03:50:30"),
	(109, "App\\Models\\User", "9e114cf9-132f-45fe-ba71-4f2c3ae00924", "abc123@gmail.com", "b44de9f05d3a61ea0dc1157823ea0ec1a6061e0b8973cb0ccd7e831503fefc89", "[\"*\"]", "2025-01-28 03:52:12", NULL, "2025-01-28 03:51:17", "2025-01-28 03:52:12"),
	(110, "App\\Models\\User", "9e117378-c314-48d1-b8fa-df689d31c1c9", "zaquviwut@mailinator.com", "a7db1cad5be70411ff40fe80c28f1365a7d7b3a2dbce8aa599e91fab73b9e096", "[\"*\"]", "2025-01-28 05:39:56", NULL, "2025-01-28 05:39:55", "2025-01-28 05:39:56"),
	(111, "App\\Models\\User", "9e13985e-5bd4-4f78-aade-ebb9ec7ee076", "jos123@gmail.com", "04451b145a055b9ff3e4405b537d1cee655dcde5acc1fd1610663616347b02e6", "[\"*\"]", NULL, NULL, "2025-01-29 07:14:01", "2025-01-29 07:14:01"),
	(112, "App\\Models\\User", "9e139989-c2fc-4fe5-8d39-62b775c11337", "rishi123@gmail.com", "d69cb3e85838511935f214bfa0a3f9d41f97afe440997db9930de2d94cb09e73", "[\"*\"]", "2025-01-29 07:43:50", NULL, "2025-01-29 07:20:07", "2025-01-29 07:43:50"),
	(113, "App\\Models\\User", "9e0f82bc-12c7-4169-a136-e1f0512ddfb3", "michael.brown@example.com", "9a2e3991e2d80d3eaebce5acccf9a03b653cdd5b8d6f84832a70ea6e5cf88351", "[\"*\"]", "2025-01-29 08:19:28", NULL, "2025-01-29 08:16:38", "2025-01-29 08:19:28"),
	(114, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "6386c1f8732812ec5c671ce779ed9397cd39f11de5669cbe34f5c34aea9a5b15", "[\"*\"]", "2025-02-05 04:23:49", NULL, "2025-02-05 04:20:25", "2025-02-05 04:23:49"),
	(115, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "22adbc1d285330fc4004a614f1725f2643cac0f40699287bbba6cadd81aa83d0", "[\"*\"]", "2025-02-05 05:36:33", NULL, "2025-02-05 05:36:33", "2025-02-05 05:36:33"),
	(116, "App\\Models\\User", "9e218aee-ba71-4c10-b2b9-892fd3fdd14a", "Info@animotor.co.uk", "88b919a365a5bda7cc2fd0023aac1bead2c68efbfbaa2141308d49aba585920e", "[\"*\"]", NULL, NULL, "2025-02-05 05:37:00", "2025-02-05 05:37:00"),
	(117, "App\\Models\\User", "9e218aee-ba71-4c10-b2b9-892fd3fdd14a", "Info@animotor.co.uk", "f7bb567592e0b1bdfd921e3566c76b52a930d4c39a6ef4457801ae5801163618", "[\"*\"]", "2025-02-05 05:41:04", NULL, "2025-02-05 05:38:03", "2025-02-05 05:41:04"),
	(118, "App\\Models\\User", "9e237310-5880-4189-8854-05c25d592c69", "redixx01@gmail.com", "d3e8b2ae89a2e1e4e8436e5cd5e1a65908351e59d75ebd7e1f21459969e89ee4", "[\"*\"]", NULL, NULL, "2025-02-06 04:21:54", "2025-02-06 04:21:54"),
	(119, "App\\Models\\User", "9aa133d5-4cd3-4eaa-9959-1365ad5245e2", "ummerabbasi@gmail.com", "b143a7bbb5a07d5d216b75a8df1e8705f4d5faeb0f536c65172b034c5dc2b48c", "[\"*\"]", "2025-02-23 04:10:31", NULL, "2025-02-23 04:07:45", "2025-02-23 04:10:31"),
	(120, "App\\Models\\User", "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", "ummerabbasi@gmail.com", "130467406bf121fb6855a7c5ae0cfe20529f097863824ab96006b34527c18633", "[\"*\"]", "2025-02-23 04:45:42", NULL, "2025-02-23 04:22:20", "2025-02-23 04:45:42"),
	(121, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "benjaminchukwudi0@gmail.com", "bb69adf39269c4cc8ca4c6bb25e88a2220536b2e00ff6b551cafbbd1997ab7b3", "[\"*\"]", "2025-02-23 04:50:39", NULL, "2025-02-23 04:41:54", "2025-02-23 04:50:39"),
	(122, "App\\Models\\User", "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", "ummerabbasi@gmail.com", "467dca013f3c4d5ab0028170698acb19fe6e02bc32565c671c23450b2d700dc1", "[\"*\"]", "2025-02-23 04:49:25", NULL, "2025-02-23 04:48:11", "2025-02-23 04:49:25"),
	(123, "App\\Models\\User", "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", "ummerabbasi@gmail.com", "55ae824db4d34daac6c773c3391c494bcfcd4b4d5e0962526165eed1ba7ad657", "[\"*\"]", "2025-02-23 05:19:43", NULL, "2025-02-23 05:14:00", "2025-02-23 05:19:43"),
	(124, "App\\Models\\User", "9e7e133b-9681-4539-955a-d73c6cdb3b9e", "qa1234@mailinator.com", "aea5e877946117557626ce6979cd73a7aaef4a612ec268d31167bc0b42373957", "[\"*\"]", NULL, NULL, "2025-03-23 05:34:17", "2025-03-23 05:34:17"),
	(125, "App\\Models\\User", "9e7e133b-9681-4539-955a-d73c6cdb3b9e", "qa1234@mailinator.com", "bf9f496d7be1a717516c61ca236c647efcabc08f4f8a6e4a200089fb5fae8025", "[\"*\"]", "2025-03-23 05:43:32", NULL, "2025-03-23 05:35:21", "2025-03-23 05:43:32"),
	(126, "App\\Models\\User", "9e7e133b-9681-4539-955a-d73c6cdb3b9e", "qa1234@mailinator.com", "2a35b80b784360102f78f6e6459b93a50e32b5ce870f174558a401eff02c0c38", "[\"*\"]", "2025-03-23 05:49:40", NULL, "2025-03-23 05:45:10", "2025-03-23 05:49:40"),
	(127, "App\\Models\\User", "9e7e133b-9681-4539-955a-d73c6cdb3b9e", "qa1234@mailinator.com", "4119a4660a60e6c59f54ea2a4a1426cf05ed36ddaa0a1af54aa25eb7d992d0a0", "[\"*\"]", "2025-03-23 07:57:55", NULL, "2025-03-23 06:15:10", "2025-03-23 07:57:55"),
	(128, "App\\Models\\User", "9e7e133b-9681-4539-955a-d73c6cdb3b9e", "qa1234@mailinator.com", "c9952250b2871ba9d7af5e9fd1aa8086bfd85b82801df8edae7d02f113215866", "[\"*\"]", "2025-03-23 08:04:55", NULL, "2025-03-23 07:58:16", "2025-03-23 08:04:55"),
	(129, "App\\Models\\User", "9e7e133b-9681-4539-955a-d73c6cdb3b9e", "qa1234@mailinator.com", "b996f501895e8b4dbbdb5673564da2a189a49381cb973fa317225e97c34c826a", "[\"*\"]", "2025-03-23 08:39:27", NULL, "2025-03-23 08:11:07", "2025-03-23 08:39:27"),
	(130, "App\\Models\\User", "9ecb38a6-4a5d-46bd-bd04-91c31e853101", "panahos879@panvli.com", "498c043c6582f292d54a4673635ee3a2f02c4c2aa7871434671193219f0063a5", "[\"*\"]", NULL, NULL, "2025-04-30 13:57:39", "2025-04-30 13:57:39"),
	(131, "App\\Models\\User", "9ecb38a6-4a5d-46bd-bd04-91c31e853101", "panahos879@panvli.com", "e909660897951ac46f42dd2a29a6a0d73b81aac413ed6f63a6e6027b6b17ef28", "[\"*\"]", NULL, NULL, "2025-04-30 14:01:07", "2025-04-30 14:01:07"),
	(132, "App\\Models\\User", "9ecb38a6-4a5d-46bd-bd04-91c31e853101", "panahos879@panvli.com", "53792843a8671ea20da594804b68f72ebaf44aa2f824029b485a341baee26ba3", "[\"*\"]", "2025-04-30 14:22:21", NULL, "2025-04-30 14:03:32", "2025-04-30 14:22:21"),
	(133, "App\\Models\\User", "9ecb5fa4-370e-41b9-8910-5c39a6f1655e", "abdulahadqaiser5@gmail.com", "d08754ff6c621dea8be9b0e9d666b7ba4b9ca3ff5b11ef8162f3441e5a18bed0", "[\"*\"]", NULL, NULL, "2025-04-30 15:46:41", "2025-04-30 15:46:41"),
	(134, "App\\Models\\User", "9ecc6fc1-724f-42da-8236-cc32907da10f", "Tester@qas.com", "38fe6c2d69ab49f43b8b216dcc6705272e4df2125c309e7afa9b2fafbe21e2c9", "[\"*\"]", NULL, NULL, "2025-05-01 04:27:34", "2025-05-01 04:27:34"),
	(135, "App\\Models\\User", "9eccf095-03fe-4988-8933-ae1ae45ca21b", "sheikhabdulahad810@gmail.com", "303fd0955c896ab08e2bbf47c871eb81da237e572559a4d9b5912e5a9194e165", "[\"*\"]", NULL, NULL, "2025-05-01 10:27:48", "2025-05-01 10:27:48"),
	(136, "App\\Models\\User", "9eccf095-03fe-4988-8933-ae1ae45ca21b", "sheikhabdulahad810@gmail.com", "b934c4c3eb834acaea7c2adc345979362f3f3c9c82e4caab0c299689faa72991", "[\"*\"]", "2025-05-01 10:36:09", NULL, "2025-05-01 10:28:38", "2025-05-01 10:36:09"),
	(137, "App\\Models\\User", "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", "ummerabbasi@gmail.com", "f4f72ef6331867c3f1ff6fc4860958b212daf9a565f47bb987c007639278375e", "[\"*\"]", "2025-05-01 10:36:17", NULL, "2025-05-01 10:36:17", "2025-05-01 10:36:17"),
	(138, "App\\Models\\User", "9eccf3f4-82a6-47c9-957f-fcddebb89d8f", "sheikhabdulahad810@gmail.com", "0f9d2d0aa9cfa8838ec7d9496fdf2b21fd01d4c6f1503394aba5e0ba6f58a36f", "[\"*\"]", NULL, NULL, "2025-05-01 10:37:14", "2025-05-01 10:37:14"),
	(139, "App\\Models\\User", "9eccf3f4-82a6-47c9-957f-fcddebb89d8f", "sheikhabdulahad810@gmail.com", "785c8145ccd3e1d0234458e78cca89808b5d4e310d64127d6faa72056bd07948", "[\"*\"]", "2025-05-01 10:47:32", NULL, "2025-05-01 10:37:19", "2025-05-01 10:47:32"),
	(140, "App\\Models\\User", "9eccf3f4-82a6-47c9-957f-fcddebb89d8f", "sheikhabdulahad810@gmail.com", "e002c7913f94a404cbcbed2f7671137fd7a7917324475860c8550ff6e4bd95b0", "[\"*\"]", "2025-05-01 12:30:41", NULL, "2025-05-01 12:12:41", "2025-05-01 12:30:41"),
	(141, "App\\Models\\User", "9eccf3f4-82a6-47c9-957f-fcddebb89d8f", "sheikhabdulahad810@gmail.com", "1f6cebbb13bf8561beeb24704d330e585df7fc9c34a94d29b5408bf351514fdf", "[\"*\"]", "2025-05-01 12:31:39", NULL, "2025-05-01 12:31:03", "2025-05-01 12:31:39"),
	(142, "App\\Models\\User", "9ecdcd76-5233-4a00-83db-78ca66b6cba7", "aarshad44624462@gmail.com", "e0794317589e275d9d2b33789fc4e7a016ae17485aa71ed3ad4897e16c6a6654", "[\"*\"]", NULL, NULL, "2025-05-01 20:45:25", "2025-05-01 20:45:25"),
	(143, "App\\Models\\User", "9ecdcd76-5233-4a00-83db-78ca66b6cba7", "aarshad44624462@gmail.com", "d53561e2830d93a7745e195527345851f437ad707a3ee7b9a5deab5d0904171e", "[\"*\"]", "2025-05-01 20:53:42", NULL, "2025-05-01 20:45:45", "2025-05-01 20:53:42"),
	(144, "App\\Models\\User", "9ecdcd76-5233-4a00-83db-78ca66b6cba7", "aarshad44624462@gmail.com", "e0d55b3c84e3241d1265270211ca1b9782039474a55e19ba97bf02bce9fb684a", "[\"*\"]", "2025-05-01 22:17:09", NULL, "2025-05-01 22:15:38", "2025-05-01 22:17:09"),
	(145, "App\\Models\\User", "9eccf3f4-82a6-47c9-957f-fcddebb89d8f", "sheikhabdulahad810@gmail.com", "1a36cd4309a403bce83616fbc227e26c9decaac077c503fe33e590bcad55a46c", "[\"*\"]", "2025-05-13 09:22:20", NULL, "2025-05-13 09:20:50", "2025-05-13 09:22:20"),
	(146, "App\\Models\\User", "9f08fa60-e695-4605-b18e-5e2bd0feb681", "shubhjat0803@gmail.com", "a8de6513585b3b2f9db8abee394c7dbe91b33fbe5773a79d09b99563d5316b67", "[\"*\"]", NULL, NULL, "2025-05-31 06:44:52", "2025-05-31 06:44:52"),
	(147, "App\\Models\\User", "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", "ummerabbasi@gmail.com", "df580cd0d226062bbe84080b9bdb931555c48128baf67705e0b8ea5556e6255b", "[\"*\"]", "2025-06-05 02:36:08", NULL, "2025-06-05 02:36:04", "2025-06-05 02:36:08"),
	(148, "App\\Models\\User", "9f164dd6-90e3-4d1f-8949-5834f9819a02", "asdffggh@gmail.com", "c999c59a542453bfb22a0adce511dc9393c1bddd9660dfb478a73f154b5b91cf", "[\"*\"]", NULL, NULL, "2025-06-06 21:44:00", "2025-06-06 21:44:00"),
	(149, "App\\Models\\User", "9f164dfa-0194-49a7-8234-a3945b93cda3", "kkjvcc@gmail.com", "311a4ea5bcd0715b14e96d07dd2cdb1acde4265155d1a4401cec1073a19f623c", "[\"*\"]", NULL, NULL, "2025-06-06 21:44:23", "2025-06-06 21:44:23"),
	(150, "App\\Models\\User", "9f59a56b-a3d3-44d2-a375-96008274f231", "sammiabbasi0056@mailinator.com", "63e690f99f999e9ea0e78948f7f987fe489e12055c997431bebe77cad42d0bee", "[\"*\"]", NULL, NULL, "2025-07-10 09:09:22", "2025-07-10 09:09:22"),
	(151, "App\\Models\\User", "9f59a64c-0da7-4270-8cc5-5c616ac7ca38", "sammiabbasi0057@mailinator.com", "ead2a53156dbaab26203d681e7ddd6209f764fa8b84df7ad71f32411f2710105", "[\"*\"]", NULL, NULL, "2025-07-10 09:11:49", "2025-07-10 09:11:49"),
	(152, "App\\Models\\User", "9f59a67c-14b6-44fb-a55e-54ec20569c08", "sammiabbasi0058@mailinator.com", "466e9eaef0e2470eb6572a5c92eb59a6f318ef9bb98a72fc426c6ce80e29ae75", "[\"*\"]", NULL, NULL, "2025-07-10 09:12:20", "2025-07-10 09:12:20"),
	(153, "App\\Models\\User", "9f578c05-c61a-4898-8722-924d64eafc01", "sammiabbasi1@outlook.com", "c1c2452d2a3100cd33823d4d5c37af960b76bcd93210bd9ef23208230560207f", "[\"*\"]", "2025-07-10 10:06:15", NULL, "2025-07-10 09:30:50", "2025-07-10 10:06:15"),
	(154, "App\\Models\\User", "9f71a66d-9839-49ee-bfd4-56aa56d4d1d4", "hothal5@hotmail.com", "96daa781c006d4ba5089aa19db2b9858d14abdd95b30b4ef2a9a2c05fa7988f9", "[\"*\"]", NULL, NULL, "2025-07-22 07:32:03", "2025-07-22 07:32:03"),
	(155, "App\\Models\\User", "9f578c05-c61a-4898-8722-924d64eafc01", "sammiabbasi1@outlook.com", "b27033b73ddf788d7fb3bb7ab438272a25e442402d1d71ec75108db6f7801b99", "[\"*\"]", NULL, NULL, "2025-07-22 08:50:24", "2025-07-22 08:50:24");

/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table rates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rates`;

CREATE TABLE `rates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_item` int(11) NOT NULL DEFAULT 0,
  `payment_name` varchar(191) DEFAULT NULL,
  `payment_unit` double DEFAULT NULL,
  `payment_price` double DEFAULT NULL,
  `payment_paid` double DEFAULT NULL,
  `item` varchar(191) DEFAULT NULL,
  `item_2` varchar(191) DEFAULT NULL,
  `unit` double DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `driver_id` char(36) NOT NULL,
  `interval` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rates_driver_id_foreign` (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;

INSERT INTO `rates` (`id`, `created_at`, `updated_at`, `payment_item`, `payment_name`, `payment_unit`, `payment_price`, `payment_paid`, `item`, `item_2`, `unit`, `rate`, `price`, `driver_id`, `interval`) VALUES
	(1, "2025-01-27 08:06:30", "2025-01-27 08:06:30", 1, "Item/Rent", 1, 130, NULL, NULL, NULL, NULL, NULL, NULL, "9a9fe4bc-d3be-495f-a5ac-7b9e7c5ee884", NULL),
	(2, "2025-01-27 08:37:27", "2025-01-27 08:37:45", 1, "rent", 4, 520, NULL, NULL, NULL, NULL, NULL, NULL, "9e0f8460-da9c-4f82-87f6-0774288826ac", NULL),
	(3, "2025-01-27 09:29:52", "2025-01-27 09:29:52", 1, "RTX", 22, 120, NULL, NULL, NULL, NULL, NULL, NULL, "9e0f82bc-12c7-4169-a136-e1f0512ddfb3", NULL),
	(4, "2025-01-27 09:51:23", "2025-01-27 09:51:23", 0, NULL, NULL, NULL, NULL, "Rent", NULL, 12, 200, 2400, "9e0f82bc-12c7-4169-a136-e1f0512ddfb3", NULL),
	(5, "2025-01-27 09:52:02", "2025-01-27 09:52:02", 0, NULL, NULL, NULL, NULL, "Insurance", NULL, 3, 390, 1170, "9e0f82bc-12c7-4169-a136-e1f0512ddfb3", NULL),
	(6, "2025-01-27 09:52:38", "2025-01-27 09:52:38", 0, NULL, NULL, NULL, NULL, "Road tax", NULL, 3, 52, 156, "9e0f82bc-12c7-4169-a136-e1f0512ddfb3", NULL),
	(7, "2025-01-28 03:43:29", "2025-01-28 03:43:29", 1, "Insurance", 22, 234, NULL, NULL, NULL, NULL, NULL, NULL, "9e0f82bc-12c7-4169-a136-e1f0512ddfb3", NULL),
	(8, "2025-01-29 08:40:39", "2025-01-29 08:41:14", 1, "road tax", 10, 670, NULL, NULL, NULL, NULL, NULL, NULL, "9e0f82bc-12c7-4169-a136-e1f0512ddfb3", NULL),
	(9, "2025-02-23 04:29:04", "2025-02-23 04:29:04", 0, NULL, NULL, NULL, NULL, "rent", NULL, 12, 200, 2400, "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", NULL),
	(10, "2025-02-23 04:29:33", "2025-02-23 04:29:33", 0, NULL, NULL, NULL, NULL, "insurance", NULL, 1, 300, 300, "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", NULL),
	(11, "2025-02-23 04:30:10", "2025-02-23 04:30:10", 0, NULL, NULL, NULL, NULL, "Road Tax", NULL, 12, 20, 240, "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", NULL),
	(12, "2025-04-30 11:23:40", "2025-04-30 11:23:49", 1, "testers", 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, "9ecae69c-217c-4355-8242-01a2c018dcac", NULL),
	(13, "2025-05-07 08:19:16", "2025-05-07 08:19:16", 0, NULL, NULL, NULL, NULL, "Item1", NULL, 5, 23, 115, "9ecdcd76-5233-4a00-83db-78ca66b6cba7", NULL);

/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table regions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'region',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_code` varchar(191) DEFAULT NULL,
  `currency_symbol` varchar(191) DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timezone` varchar(191) DEFAULT NULL,
  `coordinates` polygon DEFAULT NULL,
  `parent_id` char(36) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;

INSERT INTO `regions` (`id`, `name`, `type`, `is_active`, `created_at`, `updated_at`, `currency_code`, `currency_symbol`, `country`, `state`, `city`, `area`, `timezone`, `coordinates`, `parent_id`, `image`) VALUES
	("a05ac4eb-f3c0-4bfd-9a27-43760e463205", "Jaipur", "city", 1, "2025-11-14 10:45:12", "2025-11-14 10:45:12", NULL, NULL, "India", "Rajasthan", "Jaipur Division", "Jaipur", "Asia/Kolkata", ST_GeomFromGeoJSON('{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[75.465545649296,26.995475248994],[75.696258539921,26.687918190465],[76.190643305546,26.683010128846],[76.102752680546,27.021169183028],[75.953063959843,27.093325450669],[75.512237543827,27.082321563161],[75.465545649296,26.995475248994]]]}}'), NULL, NULL),
	("a05ac570-b1f0-4406-a583-2a12ed97c1de", "Jaipur Region", "region", 1, "2025-11-14 10:46:39", "2025-11-14 10:46:39", NULL, NULL, "India", "Rajasthan", "Jaipur Division", "Jaipur", "Australia/ACT", ST_GeomFromGeoJSON('{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[75.563049311406,26.983360365303],[75.550689692265,26.808222194995],[75.670166010624,26.683132840452],[75.950317377812,26.646315684304],[76.071166987187,26.776349746219],[76.128845209843,26.985807923217],[76.024475092656,27.099560514546],[75.848693842656,27.116674570866],[75.703124994999,27.093447717476],[75.563049311406,26.983360365303]]]}}'), "a05ac4eb-f3c0-4bfd-9a27-43760e463205", NULL),
	("a05ac5fa-d138-4531-b145-5770c5754580", "Vaishali Nagar", "region", 1, "2025-11-14 10:48:10", "2025-11-14 10:48:10", NULL, NULL, "India", "Rajasthan", "Jaipur Division", "Jaipur", "Asia/Kolkata", ST_GeomFromGeoJSON('{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[75.730303133641,26.921153279687],[75.739401186619,26.920081865045],[75.744722689305,26.923143022743],[75.755022371922,26.921306338091],[75.752447451268,26.917785942272],[75.752962435399,26.903703260855],[75.751932467137,26.900029228966],[75.733049715672,26.89574270736],[75.729101504002,26.904315587881],[75.730303133641,26.921153279687]]]}}'), "a05ac4eb-f3c0-4bfd-9a27-43760e463205", NULL),
	("a05ac655-d2e8-4eca-9ed0-7d40dd49da38", "Sanganer Airport", "airport", 1, "2025-11-14 10:49:10", "2025-11-14 10:49:10", NULL, NULL, "India", "Rajasthan", "Jaipur Division", "Jaipur", "Australia/ACT", ST_GeomFromGeoJSON('{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[75.80275252716,26.829796696676],[75.809222015304,26.829710531634],[75.809222015304,26.827585106514],[75.802988561553,26.826981938067],[75.80275252716,26.829796696676]]]}}'), "a05ac4eb-f3c0-4bfd-9a27-43760e463205", NULL);

/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table rejected_requests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rejected_requests`;

CREATE TABLE `rejected_requests` (
  `id` char(36) NOT NULL,
  `driver_id` char(36) NOT NULL,
  `trip_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rejected_requests_driver_id_foreign` (`driver_id`),
  KEY `rejected_requests_trip_id_foreign` (`trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table rentals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rentals`;

CREATE TABLE `rentals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `price_per_day` decimal(8,2) NOT NULL,
  `max_days` int(11) NOT NULL DEFAULT 10,
  `min_days` int(11) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table report_incidents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `report_incidents`;

CREATE TABLE `report_incidents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `driver_license_issuing_country` varchar(191) DEFAULT NULL,
  `driver_license_number` varchar(191) DEFAULT NULL,
  `date_of_birth` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address_line_1` varchar(191) DEFAULT NULL,
  `address_line_2` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `postcode` varchar(191) DEFAULT NULL,
  `registration_number` varchar(191) DEFAULT NULL,
  `make` varchar(191) DEFAULT NULL,
  `model` varchar(191) DEFAULT NULL,
  `color_of_vehicle` varchar(191) DEFAULT NULL,
  `number_of_passengers` varchar(191) DEFAULT NULL,
  `insurer` varchar(191) DEFAULT NULL,
  `type_of_cover` varchar(191) DEFAULT NULL,
  `policy_number` varchar(191) DEFAULT NULL,
  `owner` varchar(191) DEFAULT NULL,
  `tp_vehicle_damage_description` text DEFAULT NULL,
  `tp_party_damage_description` text DEFAULT NULL,
  `damage_type` date DEFAULT NULL,
  `accident_date` date DEFAULT NULL,
  `accident_time` time DEFAULT NULL,
  `accident_location` text DEFAULT NULL,
  `accident_impact_point` varchar(191) DEFAULT NULL,
  `accident_description` text DEFAULT NULL,
  `driver_vehicle_image` varchar(191) DEFAULT NULL,
  `tp_vehicle_image` varchar(191) DEFAULT NULL,
  `location_vehicle_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `report_incidents` WRITE;
/*!40000 ALTER TABLE `report_incidents` DISABLE KEYS */;

INSERT INTO `report_incidents` (`id`, `reference_no`, `status`, `title`, `first_name`, `last_name`, `driver_license_issuing_country`, `driver_license_number`, `date_of_birth`, `phone_number`, `email`, `address_line_1`, `address_line_2`, `city`, `country`, `postcode`, `registration_number`, `make`, `model`, `color_of_vehicle`, `number_of_passengers`, `insurer`, `type_of_cover`, `policy_number`, `owner`, `tp_vehicle_damage_description`, `tp_party_damage_description`, `damage_type`, `accident_date`, `accident_time`, `accident_location`, `accident_impact_point`, `accident_description`, `driver_vehicle_image`, `tp_vehicle_image`, `location_vehicle_image`, `created_at`, `updated_at`, `user_id`) VALUES
	(1, "123ByjkO3p", NULL, NULL, "Alina", "Ahmad", NULL, "7576563582", "2025-01-31", "62872673563", "test@gmail.com", "Karachi", "Pakistan", "Karachi", NULL, "4400", "36564", "iyeutye", "xjkhjch", "yellow", "7", NULL, NULL, "7878", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "2025-01-27 09:19:37", "2025-01-27 09:19:37", NULL),
	(2, "123CewlGFX", "claim-form", "1", "Alina", "Ahmad", NULL, "7576563582", "2025-01-31", "62872673563", "test@gmail.com", "Karachi", "Pakistan", "Karachi", NULL, "4400", "36564", "iyeutye", "xjkhjch", "yellow", "7", NULL, NULL, "7878", "no", "yjthgfdfgrj,jhjyjtfdfsdsdzxzxggdhfghfgftwtywtyt", "kjkdhjghfdytrtfxcxdcx", 0000-00-00, "2025-01-10", "20:24:00", "Pakistan", "uiyut", "bdkhuyeyutdyfdgdtyfdgvdgjshkns dvc", NULL, NULL, NULL, "2025-01-27 09:20:14", "2025-01-27 09:31:13", NULL),
	(3, "123JSKww76", "notification", "2", "Fatima", "Ahmad", "Pakistan", "989t78", "2025-01-02", "897489786", "fatima@gmail.com", "Islamabad", NULL, NULL, NULL, NULL, "4555555555553", "35", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000-00-00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "2025-01-27 09:32:25", "2025-01-28 01:54:25", NULL),
	(4, "123WRsJdbL", "notification", NULL, "UMMER", "ABBASI", "United Kingdom", "iiiiii", "0333-02-21", "07447574861", "info@animotor.co.uk", "Office 7 albion house", "6 ALBION CLOSE", NULL, NULL, NULL, "mf66pkk", "toyota", "auris", "balck", "7", NULL, NULL, "iiiiid9w49349", "ggg", "left driver side", "front", 0000-00-00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "2025-02-23 05:08:55", "2025-02-23 05:10:01", NULL),
	(5, "123DCqk93g", NULL, "Mr", "UMMER", "ABBASI", "United Kingdom", "iiiiii", "0333-02-21", "07447574861", "info@animotor.co.uk", "Office 7 albion house", "6 ALBION CLOSE", NULL, NULL, NULL, "mf66pkk", "toyota", "auris", "balck", "7", NULL, NULL, "iiiiid9w49349", "ggg", "left driver side", "front", NULL, "2015-12-22", "00:53:00", "Iusto eaque ea sint ", "Et quia dolore non e", "Sunt optio accusam", NULL, NULL, NULL, "2025-02-23 05:15:57", "2025-04-30 11:42:37", NULL),
	(6, "123FivgxXZ", NULL, "Eos quia et qui vel ", "Kieran", "Gilbert", "Guadeloupe", "337", "1973-11-09", "+1 (248) 443-5459", "hiduvi@mailinator.com", "Sydnee", "Odom", "picedyho@mailinator.com", "Mexico", "Facere earum ut aut ", "Kareem", "Moran", "jesy@mailinator.com", "+1 (572) 122-9008", "82", NULL, "Full Comprehensive", "rudazeladu@mailinator.com", "Malachi", "Recusandae Libero e", "At a sed adipisicing", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "2025-04-30 11:42:50", "2025-04-30 11:42:58", NULL);

/*!40000 ALTER TABLE `report_incidents` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` char(36) NOT NULL,
  `user_type` varchar(191) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
	(2, "9a9ede47-d4e9-4205-b546-c6437d4914f5", "App\\Models\\User"),
	(3, "9a9fe4bc-d3be-495f-a5ac-7b9e7c5ee884", "App\\Models\\User"),
	(3, "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "App\\Models\\User"),
	(5, "9aa010c7-1d25-4b64-af6c-2bc946c8fe3a", "App\\Models\\User"),
	(3, "9aa07df9-ec4c-4c3e-94ef-3a596ccdc169", "App\\Models\\User"),
	(3, "9aa133d5-4cd3-4eaa-9959-1365ad5245e2", "App\\Models\\User"),
	(3, "9aa5b0d5-e61d-4cd3-8fb1-23d002bfcc74", "App\\Models\\User"),
	(3, "9aaa65f6-9982-448a-908a-ffa7c1fa1f8d", "App\\Models\\User"),
	(3, "9ac174db-8220-4839-a554-0f1ab2f69345", "App\\Models\\User"),
	(5, "9ac4730f-ed26-4d09-82c9-9b784b3c4172", "App\\Models\\User"),
	(3, "9b6d5d6b-abec-4140-aa57-ece19b55e426", "App\\Models\\User"),
	(3, "9b6d5e1d-86a6-4cc1-b547-687315b2d417", "App\\Models\\User"),
	(5, "9bc20c6b-cd0e-42f5-88b4-ad4e150ba908", "App\\Models\\User"),
	(6, "9bc3b936-4415-4ee3-b404-e35c3240483a", "App\\Models\\User"),
	(6, "9bc3e33b-51aa-4590-8807-50562264b37d", "App\\Models\\User"),
	(4, "9bfaee4a-f1d2-48ab-af45-e88b52654afc", "App\\Models\\User"),
	(3, "9d986313-3b25-4f24-b98d-8fca1b37d2a4", "App\\Models\\User"),
	(3, "9ded1186-f80f-477e-b406-14c9c3bd8110", "App\\Models\\User"),
	(3, "9ded11c0-dbef-47dc-83aa-3a29e48b98a4", "App\\Models\\User"),
	(4, "9e0df127-1fc2-4981-b740-0f412476386c", "App\\Models\\User"),
	(4, "9e0f4dc5-1d60-4d55-ba6c-99634d449497", "App\\Models\\User"),
	(5, "9e0f4f96-febd-43c6-9f8d-7cef59e8eafb", "App\\Models\\User"),
	(4, "9e0f6bef-8289-4133-968e-f9ca90123e49", "App\\Models\\User"),
	(4, "9e0f701e-6e7e-421d-9a95-832ff133d086", "App\\Models\\User"),
	(4, "9e0f72ef-f2ec-45c2-8ccf-76ed78227bab", "App\\Models\\User"),
	(4, "9e0f73c1-ce29-49d0-ade9-edb9f58af19b", "App\\Models\\User"),
	(5, "9e0f7cb9-46e5-4880-af78-0420e490ef36", "App\\Models\\User"),
	(5, "9e0f7e10-8cf5-4b8b-a384-f9a867f8f7c2", "App\\Models\\User"),
	(5, "9e0f8107-e8fe-4c84-8d52-c5f1aaf87082", "App\\Models\\User"),
	(4, "9e0f81c5-33b7-4df8-a7eb-10721009d413", "App\\Models\\User"),
	(4, "9e0f8243-411a-44fc-8407-50387c8b9eb1", "App\\Models\\User"),
	(4, "9e0f82bc-12c7-4169-a136-e1f0512ddfb3", "App\\Models\\User"),
	(4, "9e0f83f3-8fce-4d6a-b7ec-5ae426a9dc57", "App\\Models\\User"),
	(4, "9e0f8460-da9c-4f82-87f6-0774288826ac", "App\\Models\\User"),
	(5, "9e0fbebb-acb7-457a-b0d6-1032773ced55", "App\\Models\\User"),
	(3, "9e0fc574-e315-460f-871c-983dd3194753", "App\\Models\\User"),
	(5, "9e111e71-4023-4ef2-9678-9f91ee485227", "App\\Models\\User"),
	(3, "9e114cd0-1d37-48a0-aac7-48a8a565fec6", "App\\Models\\User"),
	(3, "9e114cf9-132f-45fe-ba71-4f2c3ae00924", "App\\Models\\User"),
	(4, "9e117378-c314-48d1-b8fa-df689d31c1c9", "App\\Models\\User"),
	(4, "9e1394f8-5e71-4ffb-a52b-6deaace4fe3f", "App\\Models\\User"),
	(4, "9e13985e-5bd4-4f78-aade-ebb9ec7ee076", "App\\Models\\User"),
	(4, "9e139989-c2fc-4fe5-8d39-62b775c11337", "App\\Models\\User"),
	(3, "9e218aee-ba71-4c10-b2b9-892fd3fdd14a", "App\\Models\\User"),
	(3, "9e237310-5880-4189-8854-05c25d592c69", "App\\Models\\User"),
	(4, "9e45a5bc-7a98-4c4f-90c3-de2031af38f7", "App\\Models\\User"),
	(5, "9e7dfd04-293c-4199-9203-566658c6b5c8", "App\\Models\\User"),
	(3, "9e7e133b-9681-4539-955a-d73c6cdb3b9e", "App\\Models\\User"),
	(4, "9e7e33b6-17aa-4cde-97c8-80c5831e4c2d", "App\\Models\\User"),
	(4, "9ebcd05e-bd77-4329-8363-79ef4f8f9971", "App\\Models\\User"),
	(4, "9ebe384d-c831-49da-b1e8-457f8c5f648f", "App\\Models\\User"),
	(4, "9ebfd9b2-28fe-47a8-9547-f8c565897a63", "App\\Models\\User"),
	(2, "9ecadbc5-69ca-4b8d-9006-93449ccece32", "App\\Models\\User"),
	(4, "9ecae69c-217c-4355-8242-01a2c018dcac", "App\\Models\\User"),
	(5, "9ecb0932-eaa7-4ff9-b681-114d0c971659", "App\\Models\\User"),
	(3, "9ecb38a6-4a5d-46bd-bd04-91c31e853101", "App\\Models\\User"),
	(3, "9ecb5fa4-370e-41b9-8910-5c39a6f1655e", "App\\Models\\User"),
	(3, "9ecc6fc1-724f-42da-8236-cc32907da10f", "App\\Models\\User"),
	(3, "9eccf095-03fe-4988-8933-ae1ae45ca21b", "App\\Models\\User"),
	(3, "9eccf3f4-82a6-47c9-957f-fcddebb89d8f", "App\\Models\\User"),
	(3, "9ecdcd76-5233-4a00-83db-78ca66b6cba7", "App\\Models\\User"),
	(2, "9ed10ffd-0ece-45ff-8114-cc21a14e73e7", "App\\Models\\User"),
	(3, "9f08fa60-e695-4605-b18e-5e2bd0feb681", "App\\Models\\User"),
	(5, "9f12a98b-d50a-487a-bf8a-9c5299824701", "App\\Models\\User"),
	(3, "9f164dd6-90e3-4d1f-8949-5834f9819a02", "App\\Models\\User"),
	(3, "9f164dfa-0194-49a7-8234-a3945b93cda3", "App\\Models\\User"),
	(3, "9f3d8b14-c4e9-443e-a5d7-53156ca687ee", "App\\Models\\User"),
	(3, "9f578c05-c61a-4898-8722-924d64eafc01", "App\\Models\\User"),
	(3, "9f59a56b-a3d3-44d2-a375-96008274f231", "App\\Models\\User"),
	(3, "9f59a64c-0da7-4270-8cc5-5c616ac7ca38", "App\\Models\\User"),
	(3, "9f59a67c-14b6-44fb-a55e-54ec20569c08", "App\\Models\\User"),
	(3, "9f71a66d-9839-49ee-bfd4-56aa56d4d1d4", "App\\Models\\User"),
	(5, "9f801992-3e60-4246-8843-99c13954d13e", "App\\Models\\User"),
	(5, "9f835cd1-48ad-450a-be1f-7c6bd007783c", "App\\Models\\User"),
	(5, "9f917864-a2ff-42ad-a7a5-a02a872b4339", "App\\Models\\User"),
	(5, "9fa007a5-1d69-4296-b4a3-c8dd868665f9", "App\\Models\\User"),
	(5, "9fa247ae-e0b4-4aec-8bcf-4506b5ba7a8d", "App\\Models\\User"),
	(4, "9fa26382-07c4-45fb-a0ae-c1f6828e920a", "App\\Models\\User"),
	(4, "9fa2658a-8370-4713-9393-c5bffb3b03dc", "App\\Models\\User"),
	(3, "9fa3962f-fbf6-444a-aa2f-4d547063f795", "App\\Models\\User"),
	(5, "9fcbb02a-5f62-46b1-9b1f-4994bed60b4d", "App\\Models\\User"),
	(5, "9fcbb06c-fd9d-4618-a7cd-3b2fc9cfdb24", "App\\Models\\User"),
	(5, "9fcbb09d-b008-431a-ac92-cac4192f6438", "App\\Models\\User"),
	(4, "9fcc1812-76ba-4936-b18a-a918e169a314", "App\\Models\\User"),
	(4, "9fcc1a70-cc5d-4fbc-928d-4b3a5d631f03", "App\\Models\\User"),
	(4, "9fcc211b-d571-4c22-be75-a31c644b278d", "App\\Models\\User"),
	(3, "9ff05613-0172-4e60-a253-2044c14bdbfc", "App\\Models\\User"),
	(5, "9ff65dee-abfa-4975-a807-24806b0e60f9", "App\\Models\\User"),
	(5, "9ff65e68-1dfc-40e2-9030-bb829e9dd900", "App\\Models\\User"),
	(5, "9ff65f46-a1f1-4b51-9c37-0ef9cde871f9", "App\\Models\\User"),
	(5, "9ff660d6-9de9-41da-9ba0-34d737736ef9", "App\\Models\\User"),
	(5, "9ff6618d-e944-44cb-9fbf-6fd5c8fcc6c7", "App\\Models\\User"),
	(5, "9ff661c3-45ab-445a-8e1f-43b71746b81b", "App\\Models\\User"),
	(5, "9ff6688d-10e1-48d8-8808-56fdf67761c5", "App\\Models\\User"),
	(5, "a001f4d6-d253-4a60-b208-a298a127ecde", "App\\Models\\User"),
	(3, "a0029813-b37a-4204-a536-2022d7522d22", "App\\Models\\User"),
	(3, "a0082058-eb08-448c-b2a9-106278d53fd8", "App\\Models\\User"),
	(3, "a00bd0fb-98c5-432d-8c25-1006acf59505", "App\\Models\\User"),
	(3, "a00bd18c-db69-4439-9b16-f009595772a4", "App\\Models\\User"),
	(3, "a00bd282-6e2f-4a0b-a2ab-db2abbaf1c1a", "App\\Models\\User"),
	(3, "a00bd361-99d9-4e17-81fc-4fc0a723be02", "App\\Models\\User"),
	(3, "a00bd43d-c7ef-4ee9-a9bc-704b6cfa004a", "App\\Models\\User"),
	(3, "a060bbeb-f441-457a-a10f-120153ab65d5", "App\\Models\\User"),
	(2, "a060e33d-b592-4617-a50b-0b31f5db915f", "App\\Models\\User"),
	(5, "a0610766-1430-4e89-8252-9af6e05a6306", "App\\Models\\User"),
	(5, "a062a004-ca55-493b-8e3f-6c1d80f90ea9", "App\\Models\\User"),
	(4, "a062a91c-321d-4cf4-860e-1da19ec2d4f6", "App\\Models\\User"),
	(4, "a062a91c-5455-452d-966c-ea322f62715a", "App\\Models\\User"),
	(3, "a064adef-5ca2-4338-86b5-3f2a46bb3420", "App\\Models\\User"),
	(3, "a064b4f8-84d4-40e5-871e-99867a07d59a", "App\\Models\\User"),
	(3, "a06aa969-e638-436d-8e6a-21bc4178aa99", "App\\Models\\User");

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, "superadmin", "Superadmin", "Superadmin", "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(2, "admin", "Admin", "Admin", "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(3, "rider", "Rider", "Rider", "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(4, "driver", "Driver", "Driver", "2023-11-16 12:00:47", "2023-11-16 12:00:47"),
	(5, "owner", "Owner", "Owner", "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	(6, "manager", "Manager", "Manager", "2023-11-16 12:00:48", "2023-11-16 12:00:48");

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` char(36) NOT NULL,
  `region_id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `wait_time_limit` int(11) NOT NULL,
  `min_fare` int(11) NOT NULL DEFAULT 0,
  `min_distance` int(11) NOT NULL DEFAULT 0,
  `tax` decimal(8,2) NOT NULL DEFAULT 7.50,
  `price` decimal(8,2) NOT NULL,
  `distance_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `time_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `wait_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `cancellation_fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `payment_methods` varchar(191) NOT NULL DEFAULT 'cash,wallet',
  `discount` int(11) NOT NULL DEFAULT 0,
  `commission_type` varchar(191) NOT NULL DEFAULT 'percentage',
  `commission` decimal(8,2) NOT NULL DEFAULT 10.00,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `types` varchar(191) NOT NULL DEFAULT 'instant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_region_id_foreign` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`id`, `region_id`, `name`, `image`, `capacity`, `wait_time_limit`, `min_fare`, `min_distance`, `tax`, `price`, `distance_price`, `time_price`, `wait_price`, `cancellation_fee`, `payment_methods`, `discount`, `commission_type`, `commission`, `is_active`, `types`, `created_at`, `updated_at`) VALUES
	("9a9ede4a-4f04-4ae4-8310-6a92327117a9", "9a9ede4a-4ce5-42b4-8dc4-f6d4802e3d74", "Lite", "https://animotor.co.uk/icon/lite.png", 4, 5, 1, 0, 7.5, 20, 5, 5, 2, 0, "cash,wallet", 5, "flat", 5, 1, "instant", "2023-11-16 12:00:49", "2025-04-30 11:59:41"),
	("9a9ede4a-4ff2-4598-9a0a-db6c6d90b532", "9a9ede4a-4ce5-42b4-8dc4-f6d4802e3d74", "Premium", "https://animotor.co.uk/icon/premium.png", 4, 5, 1, 0, 7.5, 30, 6, 6, 3, 0, "cash,wallet", 5, "percent", 5, 1, "instant", "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9e11232a-2b41-4b09-9f02-d515c335c844", "99e9434a-e748-40e6-9f7a-dcd03bfc7e01", "Lite", "http://127.0.0.1/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/1737894430_Screenshot 2024-12-29 163703.png", 2147483647, 3, 2222222, 5, 7.5, 999999, 999999, 999999, 999999, 999999, "dddddddddd", 3333, "percentage", 999999, 1, "instant", "2025-01-28 01:53:35", "2025-01-28 01:55:17");

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) NOT NULL,
  `value` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
	(1, "8c14dbc69185452a9be0a07aa47e9d7c", "s:286:\"[\r\n    {\r\n        \"title\": \"Manage booking\",\r\n        \"url\": \"/manage/booking\",\r\n        \"icon\": \"fa-regular fa-calendar mx-2\",\r\n        \"img\" : \"/assets/img/icons/calender.png\"\r\n    },\r\n    {\r\n        \"title\": \"EUR\"\r\n    },\r\n    {\r\n        \"img\": \"/assets/img/icons/lang.png\"\r\n    }\r\n]\";"),
	(2, "661bc3d146838c43de00cdee971d0d65", "eyJpdiI6IlpUbW5TVHFZZDk3VDM1WTd0Mi9VVmc9PSIsInZhbHVlIjoidzk3dHJWcS9qQU8yN0Rtc0doeWF0Y2UxMXl1dGJRdEtEOCsvam05VmRXZzF6bUl2b0RLSjRqemE0U0RvRFB6M0Y2K1N5VTAxeDEvalZyUHhqMVcyemc9PSIsIm1hYyI6ImE1NDIzM2ZlMzEzZTg1MmY2MWRjNjMyNTA3YmNiODRlY2ExMTViNjI4ODlkNDljMDE2NGIxNjY4N2NmMzY5MmQiLCJ0YWciOiIifQ=="),
	(3, "10f43558fbb68b7f4238d560e293a3a3", "s:35:\"frontpage.components.banner_default\";"),
	(4, "34b45a491e6850e42e0331d55d3e39d7", "s:10:\"ANI MOTORS\";"),
	(5, "d421128bb504eb2c75a693c13c5e3c6e", "s:64:\"Great deals at great prices, from the biggest car hire companies\";"),
	(6, "59210dfe67d8c3b8a26f988af13821e1", "s:87:\"https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ani_bg_2.png\";"),
	(7, "db355d24907f83b6b70b0176699263e9", "s:10:\"[\"stripe\"]\";"),
	(8, "c055327f0a98fadb9bdb5e5d81f13398", "s:5:\"theme\";"),
	(9, "ace33c720296c017423dd376cd6f6ff6", "s:3236:\"<footer class=\"footer__section bg_section pt-120\">\r\n    <div class=\"container\">\r\n        <div class=\"footer__wrapper\">\r\n            <div class=\"footer__top pb-120\">\r\n                <div class=\"row gy-5 gx-5\">\r\n                    \r\n                    <div class=\"col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp\" data-wow-duration=\"1.5s\">\r\n                        <div class=\"footer__widget\">\r\n                            <div class=\"widget__head mb__20\">\r\n                                <h4 class=\"fz-24 pratext\"><a href=\"/contact_us\" class=\"link fz-18 pratext\" style=\"background-color: ; font-family: sans-serif; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); display: inline !important;\"><font color=\"#ffffff\">Contact us</font></a><br></h4></div><div class=\"widget__link\"><a href=\"#\" class=\"link fz-18 pratext\"></a><a href=\"/about\" style=\"font-family: sans-serif; font-size: var(--bs-body-font-size); text-align: var(--bs-body-text-align);\"><font color=\"#ffffff\" style=\"\"><span style=\"font-size: 18px;\">About Us</span></font></a><br></div><div class=\"widget__link\"><a href=\"#\" class=\"link fz-18 pratext\"><font color=\"#ffffff\"><br></font></a></div><div class=\"widget__link\"><a href=\"#\" class=\"link fz-18 pratext\"><font color=\"#ffffff\"><br></font></a>\r\n                                <a href=\"#\" class=\"link fz-18 pratext\"><font color=\"#ffffff\">Visit Us :&nbsp;</font></a><div class=\"widget__link\"><span style=\"background-color: rgb(247, 247, 247);\">Office 13, Sheepbridge Business Centre&nbsp;</span></div><div class=\"widget__link\"><span style=\"background-color: rgb(247, 247, 247);\">655 Sheffield Road</span></div><div class=\"widget__link\"><span style=\"background-color: rgb(247, 247, 247);\">Chesterfield&nbsp;</span></div><div class=\"widget__link\"><span style=\"background-color: rgb(247, 247, 247);\">S41 9ED</span><br><br></div><a href=\"#\" class=\"link fz-18 pratext\"><font color=\"#ffffff\"><u>S41 9LT</u></font></a></div><div class=\"widget__link\"><a href=\"#\" class=\"link fz-18 pratext\"><font color=\"#ffffff\"><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\"><br></span></font></a></div><div class=\"widget__link\"><a href=\"#\" class=\"link fz-18 pratext\"></a><a href=\"#\" class=\"link fz-18 pratext\" style=\"background-color: ; font-family: sans-serif; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); display: inline !important;\"><font color=\"#ffffff\"><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\"><br></span></font></a></div><div class=\"widget__link\"><a href=\"#\" class=\"link fz-18 pratext\"></a><a href=\"#\" class=\"link fz-18 pratext\" style=\"background-color: ; font-family: sans-serif; font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); display: inline !important;\"><font color=\"#ffffff\"><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Phone number :&nbsp;</span></font><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\"><font color=\"#ffffff\">01753 424350</font></span></a><br></div></div></div></div></div><div class=\"footer__bottom d-flex\">\r\n\r\n            </div>\r\n        </div>\r\n    </div>\r\n</footer>\";"),
	(10, "7331e86c3ff65003837cc2d819881a96", "s:10:\"ANI Motors\";"),
	(11, "42c58c737a4d4f750c947dfdefc6cd71", "s:10:\"ANI Motors\";"),
	(12, "d55dbf42921b84a00b3ba3527e73d580", "s:21:\"support@animotors.com\";"),
	(13, "437229abc91cb8a5ef8416b4eea0c456", "s:7:\"900w000\";"),
	(14, "3c8917c3c3d0b45b9b329d6bf534a23d", "s:10:\"ANI Motors\";"),
	(15, "93d71840407936124df3350b22db4a97", "s:1:\"#\";"),
	(16, "01f79ca75b965e3ec21c35215ca6f616", "s:36:\"9a9ede48-adc9-490f-99fe-d81ee32235ba\";"),
	(17, "19c910a1ce35c774ee59e135ca69d14c", "s:93:\"https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/animotors_logo.png\";"),
	(18, "205e32401aeaf414f2655ea1d95ef029", "s:105:\"https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/animotors-removebg-preview.png\";"),
	(19, "81bb2267dda27f63cd584141ac1b4bf4", "s:93:\"https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/animotors_logo.png\";"),
	(20, "7e245c53e48cb1af10aeccf6d4fee959", "s:93:\"https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/animotors_logo.png\";"),
	(21, "36f84cf3a7367ca37d4fa72b24c8e1ba", "s:105:\"https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/animotors-removebg-preview.png\";"),
	(22, "f4a6701e5f28b460b510e9ab2effe0ef", "s:3:\"+44\";"),
	(23, "94e1b8b7baf75d403efe1817a7f94ceb", "s:2:\"¥\";"),
	(24, "18d1a35e5e4d4848c41c831ef58c0d86", "s:14:\"United Kingdom\";"),
	(25, "6f418e9ed7a75b233020959b068ffc46", "s:2:\"10\";"),
	(26, "d70ab3373cf20d755f11d3d602c2b17a", "s:2:\"10\";"),
	(27, "2cb42551e1d6b6bd55e2982276b2c10e", "s:8:\"firebase\";"),
	(28, "d6403c346c01f7e4a04329e94be28470", "s:1:\"#\";"),
	(29, "d953f6b941d07791ec0e1770fc02c82e", "s:28:\"https://animotor.co.uk/terms\";"),
	(30, "9c48d9ea3a9cbf9890608d691de6c7ea", "s:30:\"https://animotor.co.uk/privacy\";"),
	(31, "c97a3ac58e15d54f0619dc2ef3882d27", "s:28:\"https://animotor.co.uk/about\";"),
	(32, "0ba7e8b713d20d305f2ce7976719f98c", "s:37:\"https://animotor.co.uk/password/reset\";"),
	(33, "9c4f55707a3d84a7fd8adb1d753b7b19", "s:37:\"https://animotors.sospremier.com/faqs\";"),
	(34, "e82b0275dafd1ea0169ffb6bf81f4346", "s:112:\"http://127.0.0.1/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/1737898699_Screenshot 2024-12-29 134954.png\";"),
	(35, "1dbac47619eeb95b28901da74fafc996", "s:33:\"https://animotor.co.uk/contact_us\";"),
	(36, "0f3578a28357482b850e869d7c6e7dec", "s:2:\"no\";"),
	(37, "b03b7d6c7ecf805b1d749e5d5fa5db86", "s:3:\"yes\";"),
	(38, "226fc86cab2153d1528834b1a2399d8e", "s:3:\"yes\";"),
	(39, "434dc74fbf05f3da630ba1fd5c8951b1", "s:3:\"yes\";"),
	(40, "f75a520c63bec024d35c965aac60b74c", "s:9:\"nav_fixed\";"),
	(41, "0334d02ddaff1482f0e2d51b0424c12f", "s:3:\"yes\";"),
	(42, "f2db16eb94c7584e6070e03b8e810413", "s:3:\"yes\";"),
	(43, "f35f94768fa68402a60f5e1f22d19eae", "s:2:\"no\";"),
	(44, "802ee3fc43b29d938915d5d747ab3005", "s:2:\"no\";"),
	(45, "8f5e7c6a65baa504f5cb7c4b447b3818", "s:2:\"no\";"),
	(46, "cda1b25fe0c7b1cdc2f996db47ca8d0a", "s:2:\"no\";"),
	(47, "b0a5e13b43d459a7be662fa4c37dfdf9", "s:4:\"3600\";"),
	(48, "2c803104288ec0320a43c008dd7d833a", "s:4:\"3600\";"),
	(49, "94c3d4eca2b70988925967ba7a326926", "s:1:\"2\";"),
	(50, "8d35a6c17a4548f8b00188bb369f6e7c", "s:2:\"20\";"),
	(51, "6d29081325014d836043615296f41312", "s:1:\"4\";"),
	(52, "46bec8707770749080656873a03a23d8", "s:2:\"£\";"),
	(53, "60028dd22cb3705ccbbf3a232a92d92a", "s:3:\"GBP\";");

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table soft_credentials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soft_credentials`;

CREATE TABLE `soft_credentials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) DEFAULT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `soft_credentials` WRITE;
/*!40000 ALTER TABLE `soft_credentials` DISABLE KEYS */;

INSERT INTO `soft_credentials` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, "surd_core", "1", NULL, NULL),
	(2, "surd_core_val", NULL, NULL, NULL);

/*!40000 ALTER TABLE `soft_credentials` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table taxi_licenses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `taxi_licenses`;

CREATE TABLE `taxi_licenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `taxi_license_number` varchar(191) DEFAULT NULL,
  `taxi_issuing_authority` varchar(191) DEFAULT NULL,
  `issuing_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `license_type` varchar(191) DEFAULT NULL,
  `operator_name` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table theme_components
# ------------------------------------------------------------

DROP TABLE IF EXISTS `theme_components`;

CREATE TABLE `theme_components` (
  `id` char(36) NOT NULL,
  `title` varchar(191) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `theme_components` WRITE;
/*!40000 ALTER TABLE `theme_components` DISABLE KEYS */;

INSERT INTO `theme_components` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
	("9a9ede4a-62ed-45fe-8695-38706b112d61", "Content", "<!--<title>content</title>-->\n<section class=\"section privacy-section\">\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-lg-12\">\n<div class=\"terms-policy\">\n<p data-aos=\"fade-down\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n<p data-aos=\"fade-down\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. </p>\n<p data-aos=\"fade-down\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n<ul data-aos=\"fade-down\">\n<li><span><i class=\"fa-solid fa-circle-check\"></i></span>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et </li>\n<li><span><i class=\"fa-solid fa-circle-check\"></i></span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, </li>\n<li><span><i class=\"fa-solid fa-circle-check\"></i></span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>\n<li><span><i class=\"fa-solid fa-circle-check\"></i></span>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et </li>\n<li><span><i class=\"fa-solid fa-circle-check\"></i></span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, </li>\n<li><span><i class=\"fa-solid fa-circle-check\"></i></span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>\n</ul>\n<p data-aos=\"fade-down\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. </p>\n<p class=\"mb-0\" data-aos=\"fade-down\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n</div>\n</div>\n</div>\n</div>\n</section>\n", "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-63d3-49ea-9631-034fc57b8a32", "Blank", "", "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-6481-4057-915e-c6dd563e749a", "Shortcode", "is_shortcode", "2023-11-16 12:00:49", "2023-11-16 12:00:49");

/*!40000 ALTER TABLE `theme_components` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table transaction_records
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transaction_records`;

CREATE TABLE `transaction_records` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL COMMENT 'debit & credit',
  `amount` decimal(12,2) NOT NULL,
  `detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `method` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_records_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `transaction_records` WRITE;
/*!40000 ALTER TABLE `transaction_records` DISABLE KEYS */;

INSERT INTO `transaction_records` (`id`, `user_id`, `type`, `amount`, `detail`, `method`, `description`, `created_at`, `updated_at`) VALUES
	("a060f183-89de-442e-9037-2839460daebc", "a060e5c3-f1cc-4d9f-95ae-03e809b65ecf", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-17 12:24:52", "2025-11-17 12:24:52"),
	("a060f309-36f4-4086-9047-13ccfb9e2dce", "a060e33d-b592-4617-a50b-0b31f5db915f", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-17 12:29:07", "2025-11-17 12:29:07"),
	("a062bdb8-3a8f-4bf5-bd5d-8924809072d7", "a060e33d-b592-4617-a50b-0b31f5db915f", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-18 09:51:42", "2025-11-18 09:51:42"),
	("a062c089-f820-4bfd-821f-4dfaef4f19cf", "a060e33d-b592-4617-a50b-0b31f5db915f", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-18 09:59:35", "2025-11-18 09:59:35"),
	("a064b54f-6a8b-4423-969a-a25354d6c08c", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:19:50", "2025-11-19 09:19:50"),
	("a064b95c-2b95-4b2c-a557-fe50d58a2f23", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:31:09", "2025-11-19 09:31:09"),
	("a064ba4a-6983-4a75-81cd-8cf5adfaa9c9", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:33:46", "2025-11-19 09:33:46"),
	("a064bce0-3949-4a5d-99e7-d58934767788", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:40:59", "2025-11-19 09:40:59"),
	("a064bd5c-cea7-4ee2-8242-ad3e8335e53d", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:42:21", "2025-11-19 09:42:21"),
	("a064be3e-bee1-498a-8bb8-f197f1496bd2", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:44:49", "2025-11-19 09:44:49"),
	("a064becd-8ed4-4b02-bd49-f7f5897d7719", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:46:23", "2025-11-19 09:46:23"),
	("a064bf39-5e4a-461c-9700-0c38a1b69355", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:47:33", "2025-11-19 09:47:33"),
	("a064c1a5-6336-483e-9d33-a9cb1a432a52", "a064b4f8-84d4-40e5-871e-99867a07d59a", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-19 09:54:20", "2025-11-19 09:54:20"),
	("a06aab0b-36b4-431c-969c-8c4d245cac13", "a06aa969-e638-436d-8e6a-21bc4178aa99", "debit", 1260, NULL, "Stripe", "Booking payment", "2025-11-22 08:26:06", "2025-11-22 08:26:06");

/*!40000 ALTER TABLE `transaction_records` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payable_type` varchar(191) NOT NULL,
  `payable_id` char(36) NOT NULL,
  `wallet_id` bigint(20) unsigned NOT NULL,
  `type` enum('deposit','withdraw') NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  KEY `transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  KEY `payable_type_payable_id_ind` (`payable_type`,`payable_id`),
  KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  KEY `transactions_type_index` (`type`),
  KEY `transactions_wallet_id_foreign` (`wallet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table transfers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transfers`;

CREATE TABLE `transfers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_type` varchar(191) NOT NULL,
  `from_id` char(36) NOT NULL,
  `to_type` varchar(191) NOT NULL,
  `to_id` char(36) NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') DEFAULT NULL,
  `deposit_id` bigint(20) unsigned NOT NULL,
  `withdraw_id` bigint(20) unsigned NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT 0,
  `fee` decimal(64,0) NOT NULL DEFAULT 0,
  `uuid` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transfers_uuid_unique` (`uuid`),
  KEY `transfers_from_type_from_id_index` (`from_type`,`from_id`),
  KEY `transfers_to_type_to_id_index` (`to_type`,`to_id`),
  KEY `transfers_deposit_id_foreign` (`deposit_id`),
  KEY `transfers_withdraw_id_foreign` (`withdraw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table trip_requests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trip_requests`;

CREATE TABLE `trip_requests` (
  `id` char(36) NOT NULL,
  `region_id` char(36) NOT NULL,
  `service_id` char(36) NOT NULL,
  `driver_id` char(36) DEFAULT NULL,
  `customer_id` char(36) NOT NULL,
  `car_id` char(36) DEFAULT NULL,
  `is_scheduled` tinyint(1) NOT NULL DEFAULT 0,
  `fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `reference` varchar(191) DEFAULT NULL,
  `ride_type` varchar(191) DEFAULT NULL,
  `scheduled` tinyint(1) NOT NULL DEFAULT 0,
  `origin` varchar(191) DEFAULT NULL,
  `destination` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `payment_status` varchar(191) NOT NULL DEFAULT 'unpaid',
  `payment_method` varchar(191) DEFAULT NULL,
  `origin_lat` decimal(10,7) DEFAULT NULL,
  `origin_lng` decimal(10,7) DEFAULT NULL,
  `destination_lat` decimal(10,7) DEFAULT NULL,
  `destination_lng` decimal(10,7) DEFAULT NULL,
  `started_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `current_lat` decimal(10,7) DEFAULT NULL,
  `current_lng` decimal(10,7) DEFAULT NULL,
  `distance` bigint(20) DEFAULT NULL,
  `distance_text` varchar(191) DEFAULT NULL,
  `duration` bigint(20) DEFAULT NULL,
  `duration_text` varchar(191) DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `cancelled` tinyint(1) NOT NULL DEFAULT 0,
  `cancellation_reason` varchar(191) DEFAULT NULL,
  `cancelled_by` varchar(191) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `driver_rating` int(11) NOT NULL DEFAULT 0,
  `rating_comment` varchar(191) NOT NULL,
  `driver_rating_comment` varchar(191) NOT NULL,
  `driver_feedback` tinyint(1) NOT NULL DEFAULT 0,
  `rider_feedback` tinyint(1) NOT NULL DEFAULT 0,
  `base_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `time_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `distance_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(12,2) NOT NULL DEFAULT 0.00,
  `grand_total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `driver_earn` decimal(12,2) NOT NULL DEFAULT 0.00,
  `commission` decimal(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_driver_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trip_requests_customer_id_foreign` (`customer_id`),
  KEY `trip_requests_driver_id_foreign` (`driver_id`),
  KEY `trip_requests_region_id_foreign` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `company_id` char(36) DEFAULT NULL,
  `region_id` char(36) DEFAULT NULL,
  `service_id` char(36) DEFAULT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `referral` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `country_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_otp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_otp_expires_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'unapproved',
  `address` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `comment` varchar(191) DEFAULT NULL,
  `monify_account` text DEFAULT NULL,
  `last_notification` varchar(191) DEFAULT NULL,
  `push_token` varchar(191) DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `map_lat` decimal(10,7) DEFAULT NULL,
  `map_lng` decimal(10,7) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_location_update` datetime DEFAULT NULL,
  `services` text DEFAULT NULL,
  `ride_status` varchar(191) NOT NULL DEFAULT 'available',
  `work_phone` varchar(191) DEFAULT NULL,
  `hire_type` varchar(191) DEFAULT NULL,
  `address_2` varchar(191) DEFAULT NULL,
  `postcode` varchar(191) DEFAULT NULL,
  `contact_name` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `email_address` varchar(191) DEFAULT NULL,
  `relationship` varchar(191) DEFAULT NULL,
  `driver_license_front` varchar(191) DEFAULT NULL,
  `driver_license_back` varchar(191) DEFAULT NULL,
  `proof_of_address` varchar(191) DEFAULT NULL,
  `pass` varchar(191) DEFAULT NULL,
  `onboarding_step` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `onboarding_status` tinyint(255) DEFAULT NULL,
  `license_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `company_id`, `region_id`, `service_id`, `first_name`, `last_name`, `avatar`, `email`, `phone`, `referral`, `gender`, `country_code`, `country`, `email_verified_at`, `email_otp`, `email_otp_expires_at`, `password`, `status`, `address`, `city`, `comment`, `monify_account`, `last_notification`, `push_token`, `is_online`, `map_lat`, `map_lng`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `last_location_update`, `services`, `ride_status`, `work_phone`, `hire_type`, `address_2`, `postcode`, `contact_name`, `phone_number`, `email_address`, `relationship`, `driver_license_front`, `driver_license_back`, `proof_of_address`, `pass`, `onboarding_step`, `onboarding_status`, `license_number`) VALUES
	("a060e33d-b592-4617-a50b-0b31f5db915f", NULL, NULL, NULL, "Test", "User", NULL, "admin@taxi.com", "+913072930729", NULL, NULL, NULL, "Afghanistan", "2025-11-18 09:51:04", NULL, NULL, "$2y$10$CiwKWZ7Jpu00fBCgAe3v3OgPxQwJXDZK5rWvf9NBVbckVfIcc8yiy", "unapproved", "397, Near Mamta School, Hasanpura A, Jaipur - 302006, RJ, India", "Jaipur", NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-17 11:44:57", "2025-11-18 09:58:06", NULL, NULL, NULL, "available", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	("a060e5c3-f1cc-4d9f-95ae-03e809b65ecf", NULL, NULL, NULL, "Test", "User", NULL, "jiyip30728@delaeb.com", "98287977776", NULL, NULL, NULL, NULL, "2025-11-17 12:22:30", NULL, NULL, "$2y$10$5fYuuPwSRyQ1D/Y.WkU5j.TCz82zEp0/ud3Q39CTnfYodgp7nydpC", "unapproved", NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-17 11:52:01", "2025-11-17 12:22:30", NULL, NULL, NULL, "available", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	("a0610766-1430-4e89-8252-9af6e05a6306", "a0610765-fe77-4c0a-aa10-026196d3dfe7", NULL, NULL, "Test", NULL, NULL, "arun@gmail.com", "+91-8441872796", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "$2y$10$sG19WtOjrk2d80o/kjDcL.QOI1r27MBtVlHyhfCsT1G9qTmv2E/6y", "unapproved", NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-17 13:26:04", "2025-11-17 13:26:04", NULL, NULL, NULL, "available", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	("a062a004-ca55-493b-8e3f-6c1d80f90ea9", "a062a004-a90e-4cd3-a1a2-8fd25f84acd9", NULL, NULL, "Test", NULL, NULL, "admin@gmail.com", "234324333", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "$2y$10$XV4XWchBH3KWlNxY6R9nDOtSBobKwx8yThayNz/lLjWNLVw5l7L86", "unapproved", NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-18 08:28:39", "2025-11-18 08:56:34", NULL, NULL, NULL, "available", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "7", 0, NULL),
	("a062a91c-321d-4cf4-860e-1da19ec2d4f6", "a062a004-a90e-4cd3-a1a2-8fd25f84acd9", NULL, NULL, "asdfad", "", NULL, "chauf1@gmail.com", "+916544556644", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "$2y$10$u9Q0jpkwHWlumlZ14/N/WeMu.QR/bKygftJgsSYkazTJPRxwxcLvC", "pending", NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-18 08:54:04", "2025-11-18 08:54:04", NULL, NULL, NULL, "available", NULL, "employee", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "HMFPK1782P"),
	("a062a91c-5455-452d-966c-ea322f62715a", "a062a004-a90e-4cd3-a1a2-8fd25f84acd9", NULL, NULL, "asdfasdf", "", NULL, "chauf2@gmail.com", "+916544556655", NULL, NULL, NULL, NULL, NULL, NULL, NULL, "$2y$10$IDwzn74sZ7iBomicHCmip.ttNQXkZJQCipI6XiVeugD0CjXww1Owm", "pending", NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-18 08:54:04", "2025-11-18 08:54:04", NULL, NULL, NULL, "available", NULL, "employee", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, "HFMPKK343P"),
	("a064adef-5ca2-4338-86b5-3f2a46bb3420", NULL, NULL, NULL, "Test", "User", NULL, "nosacil444@chaineor.com", "242343243", NULL, NULL, NULL, "Afghanistan", NULL, "455043", "2025-11-19 09:09:13", "$2y$10$s8RLk26f81dsiyakaAme4Ohiz84SE1zBOXDV0W/w6txS1RanWji3W", "unapproved", "397, Near Mamta School, Hasanpura A, Jaipur - 302006, RJ, India", "sdf", NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-19 08:59:13", "2025-11-19 08:59:13", NULL, NULL, NULL, "available", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	("a064b4f8-84d4-40e5-871e-99867a07d59a", NULL, NULL, NULL, "asdfasd", "asdfsf", NULL, "asdfs@sfddfs.wef", "sdfasd", NULL, NULL, NULL, "Albania", "2025-11-19 09:19:07", NULL, NULL, "$2y$10$mOt9ZhaSHymduR9SCY72SelbzGasEhL4Zsn9m..PeAKG4LZtXWIFe", "unapproved", "asdfads", "qsafsad", NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-19 09:18:53", "2025-11-19 09:47:06", NULL, NULL, NULL, "available", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	("a06aa969-e638-436d-8e6a-21bc4178aa99", NULL, NULL, NULL, "asdf", "asdfadsf", NULL, "temp@gmail.com", "23454356", NULL, NULL, NULL, "Antarctica", "2025-11-22 08:25:20", NULL, NULL, "$2y$10$c.PjtUaFqRFK4aW2.UqlguC/v9P3yweIw/gdwJBVzPKPOjKygjcfW", "unapproved", "asdf", "asdf", NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, "2025-11-22 08:21:32", "2025-11-22 08:25:20", NULL, NULL, NULL, "available", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table vehicle_defects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_defects`;

CREATE TABLE `vehicle_defects` (
  `id` char(36) NOT NULL,
  `car_id` char(36) NOT NULL,
  `booking_id` char(36) DEFAULT NULL,
  `company_id` char(36) DEFAULT NULL,
  `user_id` char(36) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location_of_vehicle` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `location_of_defect` longtext DEFAULT NULL,
  `impact` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `actions_taken` text DEFAULT NULL,
  `recommendations` text DEFAULT NULL,
  `witnesses` text DEFAULT NULL,
  `reporter_name` text DEFAULT NULL,
  `reporter_phone` text DEFAULT NULL,
  `reporter_email` text DEFAULT NULL,
  `severity` varchar(191) DEFAULT NULL COMMENT 'low, high, medium',
  `status` varchar(191) NOT NULL DEFAULT 'open' COMMENT 'open, closed, assigned',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_defects_car_id_foreign` (`car_id`),
  KEY `vehicle_defects_booking_id_foreign` (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table vehicle_inspections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_inspections`;

CREATE TABLE `vehicle_inspections` (
  `id` char(36) NOT NULL,
  `car_id` char(36) NOT NULL,
  `booking_id` char(36) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `inspections` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `vehicle_inspections_car_id_foreign` (`car_id`),
  KEY `vehicle_inspections_booking_id_foreign` (`booking_id`),
  KEY `vehicle_inspections_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table vehicle_makes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_makes`;

CREATE TABLE `vehicle_makes` (
  `id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `make_for` varchar(191) NOT NULL DEFAULT 'taxi',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `vehicle_makes` WRITE;
/*!40000 ALTER TABLE `vehicle_makes` DISABLE KEYS */;

INSERT INTO `vehicle_makes` (`id`, `name`, `make_for`, `is_active`, `created_at`, `updated_at`) VALUES
	("9a9ede49-8ab7-49eb-880a-5c183c068b81", "Acura", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8db0-4391-b5e4-a4d82ec4e20c", "Alfa Romeo", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8e8a-4d0b-805a-e4438bcd4182", "Aston Martin", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8f0d-4930-b4ee-a6303d418928", "Audi", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-93d5-4348-84c7-bf7a85935e7d", "BMW", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9bb5-4972-b42b-d4db1d9b9565", "Bentley", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9c82-4633-856a-c6e4be8d2257", "Buick", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9fcf-4e77-9c71-410267fc4bff", "Cadillac", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a291-443f-b864-317bae53eff5", "Chevrolet", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-adc7-4268-98c1-a19017b29658", "Chrysler", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b065-4614-b84d-a143e69dc99b", "Dodge", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b699-4be5-84b0-0d3c7b425259", "FIAT", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b79f-4b01-8aaf-484a749be755", "Ferrari", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b810-4924-9950-87bb9bec6091", "Fisker", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Ford", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "GMC", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c786-4b17-88c9-f7347b3e6343", "HUMMER", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Honda", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Hyundai", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d10f-4458-bca7-5ed3ea246393", "INFINITI", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d732-498e-a64a-6ab6ee0c0119", "Isuzu", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d88b-41f0-879d-1559119677f8", "Jaguar", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Jeep", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dce7-4e56-9cda-336fd20e4683", "Kia", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "Land Rover", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e2a9-4760-953b-f168193da46f", "Lexus", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Lincoln", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "MINI", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f2c7-4dd2-a040-6d46b7b713a9", "Maserati", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Mazda", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "Mercedes-Benz", "taxi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Mercury", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Mitsubishi", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0320-49c2-bd55-6629303248af", "Nissan", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0a43-41bd-9f5b-fc41fc5e81c7", "Oldsmobile", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0b85-43c9-8b3d-f65da026ad84", "Plymouth", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Pontiac", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "Porsche", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "Ram", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1523-4194-ad26-92f484e8503e", "Rolls-Royce", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-15a0-4421-adcf-43dc129bf0d9", "Saab", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1670-489c-93d8-22b9f99cef13", "Saturn", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "Scion", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Subaru", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1c05-4284-8fdc-409701c77a67", "Suzuki", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1ebf-4571-8435-89c8bf5d1b2b", "Tesla", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Toyota", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Volkswagen", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2994-417f-a0b0-e9b3b898f724", "Volvo", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2c47-4ebe-8c3b-6adc8eef39ad", "smart", "taxi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Aprilia", "motor_bike", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-3030-472b-a7e1-5b0ac99e17ae", "Bajaj", "motor_bike", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49");

/*!40000 ALTER TABLE `vehicle_makes` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table vehicle_mileages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_mileages`;

CREATE TABLE `vehicle_mileages` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `mileage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `vehicle_mileages_car_id_foreign` (`car_id`),
  KEY `vehicle_mileages_booking_id_foreign` (`booking_id`),
  KEY `vehicle_mileages_id_index` (`id`),
  CONSTRAINT `vehicle_mileages_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vehicle_mileages_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;





# Dump of table vehicle_models
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_models`;

CREATE TABLE `vehicle_models` (
  `id` char(36) NOT NULL,
  `make_id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_models_make_id_foreign` (`make_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `vehicle_models` WRITE;
/*!40000 ALTER TABLE `vehicle_models` DISABLE KEYS */;

INSERT INTO `vehicle_models` (`id`, `make_id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
	("9a9ede49-8b61-40c7-8a24-84aa5cb087d0", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "CL", 1, "2023-11-16 12:00:48", "2025-07-18 10:33:38"),
	("9a9ede49-8b99-4c5f-89a3-129f3a91a7c4", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "ILX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8bc8-46b0-906e-68ec85985807", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "Integra", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8bf5-4d09-9558-6ba22700e75e", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "Legend", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8c21-4638-9d97-d611ed6d6ac8", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "MDX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8c50-48e4-b14d-249a259a24a0", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "NSX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8c7d-4a78-b9eb-67a67a443b5b", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "RDX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8ca8-407e-b0dc-e070a492f20a", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "RL", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8cd5-4bb9-8965-7293bc6ad48f", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "RLX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8d01-4f6d-b6cc-18ce016e621c", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "RSX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8d2e-4a39-a0c6-0bd873971771", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "TL", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8d58-4906-a8f7-236591169028", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "TLX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8d84-4642-934a-101995403ad8", "9a9ede49-8ab7-49eb-880a-5c183c068b81", "TSX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8e05-4892-af91-b39828064390", "9a9ede49-8db0-4391-b5e4-a4d82ec4e20c", "4C", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8e32-4028-810b-bf4f41a34518", "9a9ede49-8db0-4391-b5e4-a4d82ec4e20c", "Giulia", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8e5f-431a-b0be-075f84cd6c1a", "9a9ede49-8db0-4391-b5e4-a4d82ec4e20c", "Stelvio", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8ede-425a-80ae-17c73a61d3fa", "9a9ede49-8e8a-4d0b-805a-e4438bcd4182", "V8 Vantage", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8f66-4b83-8099-932b00f14dde", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "A3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8f93-4175-9fb5-ef7787c9a02a", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "A4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8fbf-4b5d-a749-77eb1a43c1e9", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "A5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-8fea-4f19-8040-35b280f50773", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "A6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9017-464d-b1c3-bf28f3efc2ce", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "A7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9043-4117-81a6-fa0841a34225", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "A8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-906e-404c-88e4-0568120d560d", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "Allroad", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9098-4183-93eb-0d806617118f", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "F250", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-90c3-44fe-a771-fedb60986db3", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "Q3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-90ef-47ba-9d3f-7ad7e1b30ec2", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "Q5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-911b-49e8-860c-6ff910f75065", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "Q7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9145-461a-819b-e23e20d2299b", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "Q8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9172-4256-ae97-5f33be21fe51", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "R8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-919d-4af8-bee4-7eab6ade0f84", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "RS 3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-91c8-4dc3-9e7c-72989dea6ac0", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "RS 5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-91f6-4a01-957e-09a238098aa0", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "RS 7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9223-4ca0-95dd-374a4022b6c6", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "RS5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-924e-4df1-89fb-e34cb9fc3ec6", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "S3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9279-4e96-ac0c-9387cd87d8df", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "S4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-92a5-4ad3-9919-b20bde6ed331", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "S5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-92cf-4687-84f7-f848734be3e7", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "S6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-92fa-4a04-bd91-95057c4daf6c", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "S7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9326-41fb-abe4-800dbe2c0f00", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "S8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9351-46f9-8365-7c5cee41a108", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "SQ5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-937f-4ca5-b37e-36673382cdc5", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "TT", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-93aa-445b-ae43-9cde42ef76f5", "9a9ede49-8f0d-4930-b4ee-a6303d418928", "TTS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-942b-4aa6-9b23-8b5c8d266a3e", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "1 Series", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9457-4df7-b833-a0adf4b822a6", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "2 Series", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9482-4940-b323-cb9f42212ace", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "230i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-94ae-41df-8c6e-1c72129fafa6", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "3 Series", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-94d9-45ce-8e6e-172baa224f5c", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "330i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9504-4cd1-98ee-c9ae543ff734", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "4 Series", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9530-44b2-8d9b-b48867c6fbd8", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "440i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-955d-41f3-a414-5c2f6ca17e7d", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "5 Series", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9587-421f-8687-86657f841e13", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "530e", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-95b3-42d8-86f1-b48580bad617", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "530i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-95df-4bd8-93dd-f5718bcba991", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "540i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-960a-4e42-9df7-48fc397bd1a1", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "6 Series", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9635-447c-a7e6-5ec54cd8c0d6", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "640xi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9661-4a4d-957e-db26ff8231bd", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "7-Series", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-968e-4145-ac6a-1b2d66ef6dad", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "740e", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-96b9-4c2c-bd19-6e0e030c3474", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "740i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-96e9-45ba-a69f-3c4bde86b174", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "750XI", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9714-433e-bd6d-4a9d5abf509c", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M2", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9743-4754-8f8c-900474f43168", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M240i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9772-4b34-83a4-20b9f80833d3", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-97a0-4176-a72c-0adc14b6d7aa", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M340XI", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-97cc-47d9-a05a-f6856619e927", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M340i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-97fa-40d4-83f1-11383d798d6c", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9826-49d8-9ca3-4d7cd06e20b9", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9850-4d29-a8dd-41125468e01b", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M550i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-987e-4ed7-b066-2ec85ae15d32", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-98a9-47f3-abcd-53f98653a120", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M760i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-98d7-430f-a6cc-6e12406e9807", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "M850i", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9902-4368-b18b-7ac14e480cdc", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X1", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9948-43ce-984e-d688a4154fbf", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X2", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9974-40c2-a82a-46cd3c2ed520", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-99a4-4fd8-a3b9-61cde0a9e899", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-99ce-452a-b6fa-0c94b0fb03c9", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-99ff-4f63-b599-d0d9900d3c91", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X5 M", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9a2e-4055-9d27-e1a73cdb557b", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X5 eDrive", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9a61-46dd-8a42-d466609852ac", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9a90-45cb-b4b6-12bde1ccfc13", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X6 M", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9ac4-4d81-8d7b-16d6b287652a", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "X7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9af5-4ac3-bcba-ce87eda9fdb0", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "Z3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9b25-43c8-a07d-026c54eb5bfb", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "Z4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9b54-4629-9529-6df6ec61130c", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "i3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9b84-42fd-bc9e-c7d5f7d9afa3", "9a9ede49-93d5-4348-84c7-bf7a85935e7d", "i8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9c20-43cf-a74f-907dbce10ab1", "9a9ede49-9bb5-4972-b42b-d4db1d9b9565", "Continental GT", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9c52-437a-88a9-813357f715c1", "9a9ede49-9bb5-4972-b42b-d4db1d9b9565", "Continental GTC", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9cd9-4d15-8440-47b7cf6deba1", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Cascada", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9d07-4982-b5e4-701f5cc7ddac", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Century", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9d3a-4731-a601-951cdc84472c", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Enclave", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9d65-4bd7-b9dc-430006fc3b44", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Encore", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9d98-48e5-9db2-99461c42ec20", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Envision", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9dc3-425b-a408-0b8ea4756100", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "LaCrosse", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9df2-4489-8618-ba43ead7cae8", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "LeSabre", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9e1d-47b1-b541-de6a8c81c9c7", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Lucerne", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9e4b-4d3c-8b8d-bd554ca22510", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Park Avenue", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9e77-466c-8f3c-f566cbd0084d", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Rainier", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9ea6-4525-8f3a-7399075012ff", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Regal", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9ed1-4f02-9001-84576742653e", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Regal Sportback", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9efb-459d-9906-b4918d68e319", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Regal Tourx", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9f2a-45bc-b738-03c266141ee2", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Rendezvous", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9f55-4236-bf90-c600248b0df9", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Skylark", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9f81-4121-9ebb-51f9caef0dd1", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Terraza", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-9fa5-4b4a-88e6-8c5e91225fbb", "9a9ede49-9c82-4633-856a-c6e4be8d2257", "Verano", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a01c-4652-baa2-92b1225edb1d", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "ATS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a04a-41e1-9034-e3398da0961c", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "ATS-V", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a06e-4ea7-8317-821f3f7e3ecf", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "Brougham", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a098-4241-9730-3302302b7153", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "CT6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a0bf-446d-97cd-296a329d188d", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "CTS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a0e3-432f-a7c3-4924d0031312", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "CTS-V", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a10d-4598-b4d6-53ef00825579", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "DTS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a132-44c7-9981-6e8c3cdd3c55", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "Deville", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a15e-4b92-be64-b30c2d41a14a", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "ELR", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a189-45db-8ceb-0ca9bde6159f", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "Eldorado", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a1b1-4273-a1ff-5f77633540d0", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "Escalade", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a1d8-4244-b9e7-f7348a7330fd", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "SRX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a1fb-43d7-8cc6-c3c4efb0bffe", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "STS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a221-4805-9174-d4952f162e69", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "XT4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a245-40d3-9b58-ed0a3c6199a8", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "XT5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a269-4003-afbf-0efdcd642852", "9a9ede49-9fcf-4e77-9c71-410267fc4bff", "XTS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a2e2-4ca7-91e2-d193a828d157", "9a9ede49-a291-443f-b864-317bae53eff5", "3500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a308-4f10-9cf9-d4fa3ec29dce", "9a9ede49-a291-443f-b864-317bae53eff5", "4500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a32c-42e0-af85-f973dc0b7c28", "9a9ede49-a291-443f-b864-317bae53eff5", "4500 HD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a34f-4d21-98ed-be4b61733ac6", "9a9ede49-a291-443f-b864-317bae53eff5", "4500xd", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a374-4bcb-ac69-31cf50f59bfa", "9a9ede49-a291-443f-b864-317bae53eff5", "5500XD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a397-4cd8-8428-4cb158f36404", "9a9ede49-a291-443f-b864-317bae53eff5", "5500hd", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a3c0-4044-998c-8675eb1d3c80", "9a9ede49-a291-443f-b864-317bae53eff5", "Astro", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a3e6-4c9b-8211-2f9f74150e99", "9a9ede49-a291-443f-b864-317bae53eff5", "Avalanche", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a410-43d0-b0fb-a9b521047d14", "9a9ede49-a291-443f-b864-317bae53eff5", "Aveo", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a437-4f4a-b540-64e132154fbb", "9a9ede49-a291-443f-b864-317bae53eff5", "Black Diamond Avalanche", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a478-4322-a110-ee244ce068db", "9a9ede49-a291-443f-b864-317bae53eff5", "Blazer", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a49d-4f97-9bd5-90f5dd5a6dbe", "9a9ede49-a291-443f-b864-317bae53eff5", "Bolt EV", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a4c2-4466-844b-3b27aeb4c7a8", "9a9ede49-a291-443f-b864-317bae53eff5", "C/K 10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a4e8-410c-ab65-a2fb0512f777", "9a9ede49-a291-443f-b864-317bae53eff5", "C/K 1500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a50c-45c7-b8c8-ad8bfc5f8ce6", "9a9ede49-a291-443f-b864-317bae53eff5", "C/K 2500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a530-4972-a35d-efad1cd2456e", "9a9ede49-a291-443f-b864-317bae53eff5", "Camaro", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a559-4f9e-91f1-1fc5a3c0df2e", "9a9ede49-a291-443f-b864-317bae53eff5", "Captiva Sport", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a581-49a4-9dce-6db0b76c1a98", "9a9ede49-a291-443f-b864-317bae53eff5", "Cavalier", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a5a9-49ad-848f-678fc6337661", "9a9ede49-a291-443f-b864-317bae53eff5", "Celebrity", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a5d0-494f-a234-06b86f705de4", "9a9ede49-a291-443f-b864-317bae53eff5", "Chevy Van", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a5f4-4463-8f8c-28c82251c8e6", "9a9ede49-a291-443f-b864-317bae53eff5", "City Express", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a645-4f68-b032-b3227fde5c8a", "9a9ede49-a291-443f-b864-317bae53eff5", "Classic", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a673-440d-ae54-0fc72dc8c0f6", "9a9ede49-a291-443f-b864-317bae53eff5", "Cobalt", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a69c-4d99-bced-e7ee40f24585", "9a9ede49-a291-443f-b864-317bae53eff5", "Colorado", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a6c1-4a04-9b30-d5067f7b2b15", "9a9ede49-a291-443f-b864-317bae53eff5", "Corvette", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a6ed-4e37-9d3a-532a1a720868", "9a9ede49-a291-443f-b864-317bae53eff5", "Corvette Stingray", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a711-4e4c-b8c4-4c3839f0c3c9", "9a9ede49-a291-443f-b864-317bae53eff5", "Cruze", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a73d-480b-968b-ed027e888b71", "9a9ede49-a291-443f-b864-317bae53eff5", "Cruze Limited", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a765-4a7d-85d9-f5fbbad3368f", "9a9ede49-a291-443f-b864-317bae53eff5", "Equinox", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a789-4c2e-9e31-17e0bf1ab893", "9a9ede49-a291-443f-b864-317bae53eff5", "Express", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a7b5-49fc-ac37-055e411f9754", "9a9ede49-a291-443f-b864-317bae53eff5", "Express 2500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a7d9-46e4-a631-03e142b7355b", "9a9ede49-a291-443f-b864-317bae53eff5", "Express 3500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a802-4a49-a860-a919864e5464", "9a9ede49-a291-443f-b864-317bae53eff5", "Express 4500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a826-4a43-8821-62ac1da560b3", "9a9ede49-a291-443f-b864-317bae53eff5", "Express Cargo", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a84a-439f-83a3-10cb492c6e55", "9a9ede49-a291-443f-b864-317bae53eff5", "Gm515 - Silverado", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a86d-46bb-b98e-2132d618e2fe", "9a9ede49-a291-443f-b864-317bae53eff5", "HHR", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a891-480f-b6f0-388a9bbdb45b", "9a9ede49-a291-443f-b864-317bae53eff5", "Impala", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a8b5-4320-ae8f-db929147c65c", "9a9ede49-a291-443f-b864-317bae53eff5", "Impala Limited", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a8dd-46ef-8532-92c1d66c0b8c", "9a9ede49-a291-443f-b864-317bae53eff5", "Lumina", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a900-491e-a559-5ca1842b4a83", "9a9ede49-a291-443f-b864-317bae53eff5", "Malibu", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a926-46c6-b237-d5168912746e", "9a9ede49-a291-443f-b864-317bae53eff5", "Malibu Classic", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a94c-4e12-b663-8af93f98f841", "9a9ede49-a291-443f-b864-317bae53eff5", "Malibu Limited", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a96f-481f-974e-b2b153e74060", "9a9ede49-a291-443f-b864-317bae53eff5", "Malibu Maxx", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a993-4166-b63e-d0f2be3adf1e", "9a9ede49-a291-443f-b864-317bae53eff5", "Monte Carlo", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a9ba-4dcf-83a2-67ad4c1ccab4", "9a9ede49-a291-443f-b864-317bae53eff5", "Prizm", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-a9de-4253-a4c3-30c72fa0eaaf", "9a9ede49-a291-443f-b864-317bae53eff5", "S-10", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aa08-486f-a34c-6ba162826286", "9a9ede49-a291-443f-b864-317bae53eff5", "S10 Pickup", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aa2c-4a20-80b4-07b4315fd247", "9a9ede49-a291-443f-b864-317bae53eff5", "SS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aa59-465f-8f93-bd9ff554440f", "9a9ede49-a291-443f-b864-317bae53eff5", "SSR", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aa7d-43c0-99af-10ab27be06a3", "9a9ede49-a291-443f-b864-317bae53eff5", "Silverado", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aaa3-45d0-9d03-a19a759136ec", "9a9ede49-a291-443f-b864-317bae53eff5", "Silverado 1500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aada-41ab-b7b4-7bb846e7b0b8", "9a9ede49-a291-443f-b864-317bae53eff5", "Silverado 2500HD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ab00-403d-b833-a5dbe884ec05", "9a9ede49-a291-443f-b864-317bae53eff5", "Silverado 3500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ab28-4b4f-b178-3a1e8d3e2f7d", "9a9ede49-a291-443f-b864-317bae53eff5", "Silverado 3500HD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ab4d-4440-b7ed-4248d89af0b5", "9a9ede49-a291-443f-b864-317bae53eff5", "Silverado HD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ab71-4d89-8e27-6732263374b7", "9a9ede49-a291-443f-b864-317bae53eff5", "Silverado LD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ab98-4433-8204-2e468cb1985b", "9a9ede49-a291-443f-b864-317bae53eff5", "Silverado Legacy", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-abbb-410b-becc-f051790e4c24", "9a9ede49-a291-443f-b864-317bae53eff5", "Sonic", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-abe3-40e3-b046-8a5a16aa1ecf", "9a9ede49-a291-443f-b864-317bae53eff5", "Spark", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ac07-42e8-b576-9346b9518778", "9a9ede49-a291-443f-b864-317bae53eff5", "Spark EV", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ac2e-4a19-a7aa-bef941dcb875", "9a9ede49-a291-443f-b864-317bae53eff5", "Suburban", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ac53-4aad-838b-3e77778374c3", "9a9ede49-a291-443f-b864-317bae53eff5", "TRAVERSE", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ac76-4422-b54b-4ca536975a4a", "9a9ede49-a291-443f-b864-317bae53eff5", "Tahoe", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ac99-45d5-98f2-1d7ba911faa5", "9a9ede49-a291-443f-b864-317bae53eff5", "Tracker", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-acc1-424b-85d3-85c3c7c39515", "9a9ede49-a291-443f-b864-317bae53eff5", "TrailBlazer", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ace5-4aca-b173-1c4a8aec0f32", "9a9ede49-a291-443f-b864-317bae53eff5", "TrailBlazer EXT", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ad0b-48a0-9812-b4614b98c0ad", "9a9ede49-a291-443f-b864-317bae53eff5", "Traverse", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ad31-438e-94b2-23e3b7536cc1", "9a9ede49-a291-443f-b864-317bae53eff5", "Trax", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ad54-4024-9500-0690245c2f3f", "9a9ede49-a291-443f-b864-317bae53eff5", "Uplander", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ad78-4dd2-bca8-cd80499d324f", "9a9ede49-a291-443f-b864-317bae53eff5", "Venture", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ad9f-44a6-a7e8-13f2031dc40f", "9a9ede49-a291-443f-b864-317bae53eff5", "Volt", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ae43-4d40-ab42-43d9676b3a8a", "9a9ede49-adc7-4268-98c1-a19017b29658", "200", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ae76-4ff0-9f56-33d854593220", "9a9ede49-adc7-4268-98c1-a19017b29658", "300", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aea1-44f3-a68c-d7a6b611e988", "9a9ede49-adc7-4268-98c1-a19017b29658", "300M", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aec5-4bc2-9242-dd340b81d9ec", "9a9ede49-adc7-4268-98c1-a19017b29658", "Aspen", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-aeed-44f3-91ef-f01dd90b15a8", "9a9ede49-adc7-4268-98c1-a19017b29658", "Concorde", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-af19-40d3-9eb3-ca6f75de76bc", "9a9ede49-adc7-4268-98c1-a19017b29658", "Crossfire", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-af42-417e-b9e1-cfe93486061a", "9a9ede49-adc7-4268-98c1-a19017b29658", "LHS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-af70-418c-8eac-c4f985651701", "9a9ede49-adc7-4268-98c1-a19017b29658", "PT Cruiser", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-af97-4399-919b-1bc8ec8aa433", "9a9ede49-adc7-4268-98c1-a19017b29658", "Pacifica", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-afbc-40ee-912e-d40a19a98eb8", "9a9ede49-adc7-4268-98c1-a19017b29658", "Sebring", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-afe9-4acb-b0e6-d90c1850786c", "9a9ede49-adc7-4268-98c1-a19017b29658", "Town & Country", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b00d-4818-8af8-1089fe5b6380", "9a9ede49-adc7-4268-98c1-a19017b29658", "Town and Country", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b039-4def-9806-3a83e299711e", "9a9ede49-adc7-4268-98c1-a19017b29658", "Voyager", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b0bc-40f2-a045-e0c32633a523", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Avenger", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b24d-4402-8051-6d94669ea6a6", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Caliber", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b285-4f8e-80cc-ab83a8a2a3da", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Caravan", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b2af-4e90-ad45-e38648066bb8", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Caravan/Grand Caravan", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b420-48d9-aff6-2d71de2d3d64", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Challenger", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b44f-4ab2-a76c-9e4d1856f325", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Charger", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b47b-49fa-975a-c2261dcb561a", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Dakota", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b4a4-4f9f-8fe6-b19322a1ef5a", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Dart", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b4c5-465f-b12e-2dcb44adfe8c", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Durango", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b4f3-4cdf-8850-b7c6fe1d9eb9", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Grand Caravan", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b518-4023-a6af-da7995872a64", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Intrepid", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b53f-45c3-8fc0-cb6ce3b00c57", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Journey", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b568-4226-a6b9-17812b3e8c79", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Magnum", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b58c-4b0f-9391-e5b70f1cf532", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Neon", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b5b6-4816-9421-dfe4b11db712", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Nitro", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b5dc-4032-b4b3-36a5c1da61b2", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Ram 1500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b601-43f7-82d6-b71159e1818a", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Ram 2500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b629-458e-83ff-3d952604b243", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Ram 3500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b64d-4b7b-8d58-d758725f3236", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Stratus", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b670-4761-9eda-d49e68c24f8f", "9a9ede49-b065-4614-b84d-a143e69dc99b", "Viper", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b6ea-466a-8762-195515d99663", "9a9ede49-b699-4be5-84b0-0d3c7b425259", "124 Spider", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b70f-4fbc-9dc9-b49e69b4487b", "9a9ede49-b699-4be5-84b0-0d3c7b425259", "500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b735-457f-a12f-60aa52b64ec6", "9a9ede49-b699-4be5-84b0-0d3c7b425259", "500L", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b75b-4cb6-8bc9-dbddbeb37a59", "9a9ede49-b699-4be5-84b0-0d3c7b425259", "500X", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b77c-4e07-b949-afea32026189", "9a9ede49-b699-4be5-84b0-0d3c7b425259", "500e", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b7e4-4711-bd7d-258b4d3edc6a", "9a9ede49-b79f-4b01-8aaf-484a749be755", "California", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b858-45de-9223-c27082d89b45", "9a9ede49-b810-4924-9950-87bb9bec6091", "Karma", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b8cf-4bc8-bf83-242496298f0d", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "C-Max", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b8f8-4bbc-86e8-84237f95f247", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "C-Max Energi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b91b-449f-88ba-c8ce2247c25d", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Club Wagon", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b946-49a7-a3a4-6b9d23792498", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Contour", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b968-4a3f-82ab-38e37867cc6d", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Crown Victoria", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b98f-46f9-875d-be70ce9f666a", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "E-350", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b9b9-4d9c-b24c-ccce43a6e14f", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "E-350SD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-b9da-4f06-ba09-1133298cb9b7", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "E-Series Van", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ba06-48ad-a9df-d55e23d0cd56", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "E-Series Wagon", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ba2a-4538-bab7-33bbf17131ad", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "EcoSport", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ba4e-40f7-919c-d9930be1218a", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Econoline", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ba7c-4d43-8641-3219031b85bf", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Econoline Cargo", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ba9d-4ca2-a843-1d8d6790c6fc", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Econoline Wagon", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bac2-4f30-ad4b-64c7323335ca", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Edge", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-baea-423b-917c-2b738efcc9b1", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Escape", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bb0d-49cb-a00c-3d85476a175c", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Escort", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bb39-436a-b5bc-6993c798c7c1", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Excursion", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bb60-43fb-a349-b72bcf441ca2", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Expedition", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bb86-4bee-8a8d-82d3110ce93a", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Expedition MAX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bbb0-490f-9b73-609d7fedc9c2", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Explorer", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bbd2-426d-89f6-efa8292beb93", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Explorer Sport", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bbfe-4c2b-8794-6610c4e42294", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Explorer Sport Trac", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bc21-432d-b766-3e56e4ccec8b", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F-150", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bc4a-4ce9-a42d-226b082808e9", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F-250", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bc71-4614-b265-846a7136be50", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F-250 SD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bc92-4db0-8d98-74164c311c32", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F-350", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bcb8-43c0-a9ad-e69bf1fabf1b", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F-350 SD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bcdf-4ffc-8a8d-21a6fe465993", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F-450", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bd03-4715-969f-b6a62f3e94c1", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F-450 SD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bd2e-4899-aa8c-fbc31cad4707", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F-550", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bd51-427e-9297-8acb890390ef", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "F650", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bd79-4a3f-878b-e7e79c31c18e", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Fiesta", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bda1-41c4-ab04-e3738c98ecb5", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Five Hundred", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bdc3-4b81-af16-6894ce25b8b8", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Flex", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bdef-47c8-8182-2bede92e8c2b", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Focus", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-be15-4e53-ae8d-fe5d47dbd11f", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Focus RS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-be3b-4057-881e-51dfc748adb5", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Focus ST", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-be62-42bb-a523-b188cff1c0c2", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Freestar", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-be85-44c0-ad37-c468ad15871b", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Freestyle", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-beab-4e83-8c57-fef306b25989", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Fusion", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bed5-4809-b6af-7557b8763f6a", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Fusion Energi", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-befb-4749-bfc6-b325a3992d9a", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Mustang", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bf27-4953-8681-9634ed4c5b45", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Mustang SVT Cobra", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bf4b-40c1-8c43-a1de2b74176e", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Ranger", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bf71-4653-8b59-2d91e3511799", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Shelby GT350", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bf9d-4a3b-843a-ad65e84f455f", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Shelby GT500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bfc0-44d5-8436-588358fa2433", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Taurus", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-bff1-411c-a029-c0249eb56afe", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Thunderbird", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c015-4e4b-9ce7-c76eb675b86a", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Transit Connect", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c03b-44d4-8cc6-c977cdb31294", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Transit Van", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c064-40c1-872e-972dd8486d6c", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Transit Wagon", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c08b-4fa9-8e9c-a4eb0a24d9f7", "9a9ede49-b88a-4526-b78e-0fc27303ae4a", "Windstar", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c10b-42a9-a97b-ec9a372d65c9", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Acadia", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c134-4fb5-8f04-3004af0b5737", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Acadia Limited", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c15b-41a2-8403-c5e292b9f1f2", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Canyon", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c184-42ae-b384-4f801104aaa4", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Envoy", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c1ac-4a39-8377-f651489a8b86", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Envoy XL", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c1d6-4116-8ce3-bd446e7edb61", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Envoy XUV", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c1fb-4417-be56-36747032ac8f", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Jimmy", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c21e-4eb5-b19a-9ea151659849", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Safari", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c248-4a7f-bef4-37662e8b6eb3", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Savana", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c26c-4f6c-a904-cb1179cb230a", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Savana 2500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c292-4525-914e-c3fb84d9b356", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Savana Cargo", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c2bf-4e15-ad67-37810395abb6", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Savana VAN", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c2e5-4866-a4b0-c20e546a4dcd", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c311-4057-8f41-71822c8761cc", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra 1500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c335-4ad4-a5c4-8b51705d463f", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra 2500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c35a-471e-8fbb-d126fbb45818", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra 2500HD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c382-4386-b2f9-6f854af42cff", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra 3500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c3a7-4044-a2f4-a7e2ae4463f0", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra 3500HD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c3d2-4b51-aef5-76b90136d3bb", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra C/K 1500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c3f8-4083-b546-6e7deb46457b", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra C/K 2500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c41c-417c-91b7-0180013efd95", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sierra Limited", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c448-43b6-8d4a-ce158ecc76ac", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Sonoma", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c46c-4971-9155-df03176d495e", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Suburban", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c49c-4d20-9206-7e483cd16e74", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Terrain", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c6d8-46fb-8911-dfcd26f346ad", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Yukon", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c71d-4bc4-a8e4-39fedd079533", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Yukon Denali", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c751-43a3-8db8-b044315a6b2e", "9a9ede49-c0b9-4ad4-8ca1-2ee11e4fa0d8", "Yukon XL", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c7e8-4cd4-9912-056250870714", "9a9ede49-c786-4b17-88c9-f7347b3e6343", "H1", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c816-4069-9eda-58eeb1a24b1b", "9a9ede49-c786-4b17-88c9-f7347b3e6343", "H2", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c846-4180-ac9b-d7c915f95005", "9a9ede49-c786-4b17-88c9-f7347b3e6343", "H2 SUT", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c874-4fee-a850-03be12e9eae7", "9a9ede49-c786-4b17-88c9-f7347b3e6343", "H3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c900-4617-a488-849e20816306", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Accord", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c936-48a6-a5b9-3bde41e30dce", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Accord Crosstour", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c962-43b2-bff5-f8498d999b34", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "CBR1000RR", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c98e-4a10-94bb-4663fe122dc3", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "CR-V", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c9ba-4bcc-a2f7-aeb12f462e19", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "CR-Z", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-c9e7-4bc0-a19e-5753328919d1", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Civic", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ca15-4120-9127-e530a7290fdc", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Clarity", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ca40-4ea0-926a-37a3853ca83f", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Crosstour", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ca6d-4536-8c27-40e9fbd89611", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Element", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ca9a-4826-903c-f635558127bf", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Fit", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-caca-4d31-877e-d9c5acef1ac5", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Goldwing", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-caf8-428f-aa03-57c685280c8a", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "HR-V", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cb26-4cd1-9598-d9f4e0230172", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Insight", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cb51-4660-a77a-5017d4e63af1", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Odyssey", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cb76-4ce6-9072-4862dfb622d1", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Passport", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cba2-4d36-8620-ee2896118b03", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Passport UV", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cbc4-4fd1-b1fa-c9c7151590d3", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Pilot", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cbe8-4951-aa62-8c67810fbc06", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Prelude", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cc0b-4c9d-b2c7-f123998f8270", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "Ridgeline", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cc2e-4dba-9770-e9d8cc6ee1e9", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "S2000", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cc53-4e20-9c18-d695a598030f", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "VT750C2B", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cc7c-4939-a2c9-9ebce6fc78a1", "9a9ede49-c8a1-4f3f-84a4-811c4d417499", "VT750CA", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ccfb-4060-bd66-3b4876ea44b5", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Accent", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cd25-4298-af09-2cfbc8d793c2", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Azera", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cd55-4c7f-a888-683666771eb6", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Elantra", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cd7d-4131-a3bc-cfae8ebc2ffb", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Elantra GT", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cda0-474d-a5e1-038f501219d0", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Elantra Touring", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cdc5-441a-8adc-58415b302e71", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Entourage", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cde9-4208-a397-491abf6119e0", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Equus", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ce0d-46fb-b87c-084b94047c51", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Genesis", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cef6-4b11-96f5-023b7a12e23c", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Ioniq", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cf26-4d06-bf70-3deda80829ea", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Ioniq Electric ", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cf53-4dae-b584-796e672e1757", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Kona", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cf7e-45fa-baa6-949339a1783e", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Santa", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cfaa-4e9d-8d32-4ab8b85bea08", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Santa FE XL", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-cfd6-419d-960a-a6d266651edc", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Santa Fe", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d004-4143-8023-132ea04b6eeb", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Santa Fe Sport", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d031-4125-93e0-d6bc53237c0c", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Sonata", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d05e-40d3-9fd5-33207f44d279", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Tiburon", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d089-446a-bb0b-04da6b5d254e", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Tucson", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d0b6-4c0f-9a73-e1795a0ea2b5", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Veloster", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d0e1-4599-9274-1803453cd79e", "9a9ede49-cca0-4ff4-be64-782c2617d5a1", "Veracruz", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d171-48b6-bbe1-22101dabc2f8", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "EX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d1a3-48db-94a6-90d7bc5702bc", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "EX35", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d1d1-43b1-888b-93700225d5ef", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "FX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d1ff-449b-bc62-369f5ebfa624", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "FX35", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d22b-46ac-8b19-41bd198166d6", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "G", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d258-4db0-9495-bc3a45c35368", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "G Convertible", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d284-4643-afd0-8a9675db1415", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "G Sedan", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d2b2-444a-be4f-1d8e5123cac9", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "G20", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d2df-4e69-9217-27cc54e869a0", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "G35", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d30e-476b-a69d-652960a59af0", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "G37", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d33c-45df-a29e-2b2deb5a9fda", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "G37 Convertible", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d368-4c9c-8304-30eb48c350d3", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "G37 Sedan", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d399-4dee-80e2-8438c9c3dafe", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "I30", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d3c7-4509-8af0-de845f43d148", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "I35", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d409-444f-b427-5fa04e11411c", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "J30", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d431-4509-bd11-9dde93fb263c", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "JX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d456-4623-8c50-86d6ced6dd3b", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "M", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d479-44a5-a676-6407f45105a4", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "M35", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d4a4-4384-bfeb-06f3555da548", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "M37", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d4c9-4f65-804b-afeec80d67d7", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "M45", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d4ef-4dfe-b91d-013fde880e0f", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "M56", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d515-46ce-a4d8-70adc329bfa4", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "Q40", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d539-4494-8847-5f4367231ad7", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "Q45", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d55d-44af-b68a-4953232e89d5", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "Q50", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d584-425a-b4ed-c9c77ed40b33", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "Q60", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d5ac-47e9-b2e3-6c76c01e71b1", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "Q70", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d5d3-44de-87d8-496246e34d0e", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "Q70L", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d5f8-46b4-94c8-12d0ec7650a8", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "QX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d61e-47aa-811a-e720eca106a7", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "QX30", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d640-412d-8133-b9e9c7dd2096", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "QX4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d665-414e-8837-ddea25c3d708", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "QX50", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d68b-4cc1-8260-e03b593192cb", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "QX56", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d6b1-4b1e-80b1-f3c81a374a5b", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "QX60", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d6d6-4872-9c1b-ab13978cc841", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "QX70", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d6fd-45cb-b97e-175560ccbe91", "9a9ede49-d10f-4458-bca7-5ed3ea246393", "QX80", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d79f-4b7e-bdc7-6e8ff79bd591", "9a9ede49-d732-498e-a64a-6ab6ee0c0119", "Ascender", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d7d1-457a-9b9a-424e930611f9", "9a9ede49-d732-498e-a64a-6ab6ee0c0119", "Axiom", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d7ff-4a98-851c-b5b924851880", "9a9ede49-d732-498e-a64a-6ab6ee0c0119", "NPR/ NPR-HD/ NPR-XD", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d82c-47f7-b9af-b9d877ad225c", "9a9ede49-d732-498e-a64a-6ab6ee0c0119", "Rodeo", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d85c-4e41-814d-0fc7db93fff8", "9a9ede49-d732-498e-a64a-6ab6ee0c0119", "Trooper", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d8e8-450e-8bcc-c4a9ba0e6392", "9a9ede49-d88b-41f0-879d-1559119677f8", "E-Pace", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d918-43ce-91d5-0c92f8fab3f0", "9a9ede49-d88b-41f0-879d-1559119677f8", "F-Pace", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d946-4b8a-bd4f-21e8bb241d0f", "9a9ede49-d88b-41f0-879d-1559119677f8", "F-Type", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d976-4a52-b92c-bf94d8cc704d", "9a9ede49-d88b-41f0-879d-1559119677f8", "S-Type", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d9a2-465a-b6d0-def1b2006229", "9a9ede49-d88b-41f0-879d-1559119677f8", "X-Type", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-d9d1-4db5-b869-c0cb4d7850b3", "9a9ede49-d88b-41f0-879d-1559119677f8", "XE", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-da01-422f-8edf-4453730765b1", "9a9ede49-d88b-41f0-879d-1559119677f8", "XF", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-da2f-43b5-ac41-b6d85e87b7f8", "9a9ede49-d88b-41f0-879d-1559119677f8", "XJ", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-da5b-49ac-97b7-cc01ababc530", "9a9ede49-d88b-41f0-879d-1559119677f8", "XK", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-daec-4e60-b407-e706eeece95a", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Cherokee", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-db1c-4b72-b0ab-c0d7b8b786b4", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Commander", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-db4a-4315-b819-20aaee8423ac", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Compass", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-db78-4090-afdf-379f14451f58", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Gladiator", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dba5-497e-918f-62a3f98cc734", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Grand Cherokee", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dbd4-42ec-8fbd-8901d10c9d76", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Grand Cherokee SRT", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dc01-4be6-8f7c-cc5cfadebed2", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Liberty", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dc2e-4adb-b045-e8b96f4a0157", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Patriot", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dc5c-4ba5-90f5-1ec598b546a5", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Renegade", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dc8a-4191-9b9a-0837cbe84f87", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Wrangler", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dcb8-48fa-badc-91bd5ddd52f5", "9a9ede49-da8a-45c9-ac2f-54fd02d6761e", "Wrangler JK", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dd46-4114-87fd-5596b18b9a38", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Amanti", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dd78-4541-871d-df3311e8959f", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Borrego", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dda7-412f-ac24-65aad720a54b", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Cadenza", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ddd4-42cc-808e-c5cd81813c4e", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Forte", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-de03-4a3a-9be8-5cde4084d340", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "K900", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-de28-42a1-86d3-1c53ce385f2a", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Niro", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-de50-45df-8365-2b63315a4a1a", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Optima", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-de78-4161-86dc-cfae933c159f", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Optima/Plug-In", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dea4-4ccf-b79d-0c68dc1fea4c", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Rio", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ded5-40b7-b228-ffeac22d1110", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Rondo", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-df02-4412-a19f-bc89af302204", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "SUV", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-df35-44bb-add8-d254f217d5bb", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Sedona", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-df64-42a9-8eeb-9569bdb60082", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Sorento", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-df95-44fe-8cd3-b17d521ed65e", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Soul", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dfc2-4307-9cd7-72896b0452e2", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Soul EV", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-dff3-4a63-a2b7-38ba86a49d87", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Spectra", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e020-43bc-816b-44fcd0477fd9", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Sportage", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e04d-4fe2-96e9-9859c25e37a4", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Stinger", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e07c-4db5-9aa3-f153fc1b2da2", "9a9ede49-dce7-4e56-9cda-336fd20e4683", "Telluride", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e10c-4a06-9c42-30f536234ad5", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "Discovery", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e13a-48dc-a8c6-58fb6e444b82", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "Discovery Sport", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e166-4fb3-b931-d0967b4a2c4d", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "LR2", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e193-4647-8cb7-a034d8e079e7", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "LR3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e1bf-4c9a-8481-6cf930015f1b", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "LR4", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e1ec-4861-933b-31dfda082f80", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "Range Rover", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e21a-467d-ac7e-c2c2c7a148f3", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "Range Rover Evoque", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e249-4494-ad90-97d187aa4630", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "Range Rover Sport", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e27b-4888-b9fc-0ba2039bca1f", "9a9ede49-e0aa-4655-a6d5-f7e7bbaf6379", "Range Rover Velar", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e303-4af2-90e1-c06d0001ad7f", "9a9ede49-e2a9-4760-953b-f168193da46f", "CT 200h", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e337-48f8-8ccb-3936947610a0", "9a9ede49-e2a9-4760-953b-f168193da46f", "ES", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e366-4633-9f85-ebf49aacdcb5", "9a9ede49-e2a9-4760-953b-f168193da46f", "ES 300", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e393-41a1-a555-c10421f25d1d", "9a9ede49-e2a9-4760-953b-f168193da46f", "ES 300h", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e3c1-40cf-b224-438686bb03c3", "9a9ede49-e2a9-4760-953b-f168193da46f", "ES 330", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e3ef-4e83-8e5d-fc2be3f0a620", "9a9ede49-e2a9-4760-953b-f168193da46f", "ES 350", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e41b-47c5-8fc0-f6be77dfd704", "9a9ede49-e2a9-4760-953b-f168193da46f", "GS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e446-4a32-b2d3-30dd8d644526", "9a9ede49-e2a9-4760-953b-f168193da46f", "GS 200t", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e46d-4e45-9179-c0c5808835c5", "9a9ede49-e2a9-4760-953b-f168193da46f", "GS 300", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e499-4f93-992d-040bcc2e528b", "9a9ede49-e2a9-4760-953b-f168193da46f", "GS 350", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e4c7-496f-900d-ab031436622c", "9a9ede49-e2a9-4760-953b-f168193da46f", "GS 430", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e4f7-4cf3-b251-57fc6233dc40", "9a9ede49-e2a9-4760-953b-f168193da46f", "GS 450h", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e524-4ea0-82c3-40c0d3526409", "9a9ede49-e2a9-4760-953b-f168193da46f", "GX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e552-48be-a439-726f3a70893e", "9a9ede49-e2a9-4760-953b-f168193da46f", "GX 460", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e580-46d6-8ad7-012b045f2faf", "9a9ede49-e2a9-4760-953b-f168193da46f", "GX 470", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e5b0-4b16-ad1f-27c969301752", "9a9ede49-e2a9-4760-953b-f168193da46f", "GX, LX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e5fa-4312-ae50-28d9dfa05258", "9a9ede49-e2a9-4760-953b-f168193da46f", "HS 250h", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e627-4e28-aa4e-32c624a51342", "9a9ede49-e2a9-4760-953b-f168193da46f", "IS 200t", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e651-41fa-9133-a665252cfdbd", "9a9ede49-e2a9-4760-953b-f168193da46f", "IS 250", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e680-4932-bf47-a6aa02d8c932", "9a9ede49-e2a9-4760-953b-f168193da46f", "IS 250 C", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e6ae-4b3a-b74f-785d570c5c2c", "9a9ede49-e2a9-4760-953b-f168193da46f", "IS 300", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e6d9-4c7c-af22-b20d1671f669", "9a9ede49-e2a9-4760-953b-f168193da46f", "IS 350", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e707-4cf3-bb6b-26a18a703453", "9a9ede49-e2a9-4760-953b-f168193da46f", "IS 350 C", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e731-4e3f-9fae-012434b04966", "9a9ede49-e2a9-4760-953b-f168193da46f", "LC 500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e75e-4f69-a91c-b2e8031423e8", "9a9ede49-e2a9-4760-953b-f168193da46f", "LS 400", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e78a-437f-abfe-0aef26eedf39", "9a9ede49-e2a9-4760-953b-f168193da46f", "LS 430", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e7b7-48be-8f98-4fe45bad7059", "9a9ede49-e2a9-4760-953b-f168193da46f", "LS 460", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e7df-4cff-9576-ccae7b562847", "9a9ede49-e2a9-4760-953b-f168193da46f", "LS 500", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e80d-4db9-ae67-dc1bee4be1d7", "9a9ede49-e2a9-4760-953b-f168193da46f", "LX 470", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e837-4cab-adc9-7e6800dadef9", "9a9ede49-e2a9-4760-953b-f168193da46f", "LX 570", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e863-4f66-9d20-29c86d0c211f", "9a9ede49-e2a9-4760-953b-f168193da46f", "NX 200t", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e893-4fbd-a7cf-392a60a1e9c3", "9a9ede49-e2a9-4760-953b-f168193da46f", "NX 300", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e8bd-4f93-9e03-91688a3994fb", "9a9ede49-e2a9-4760-953b-f168193da46f", "NX 300h", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e8e5-40cd-be5b-f3c002470c5f", "9a9ede49-e2a9-4760-953b-f168193da46f", "RC 200t", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e90e-48bd-a094-7f8cf4368611", "9a9ede49-e2a9-4760-953b-f168193da46f", "RC 300", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e93e-4ec6-b672-87f039b406b0", "9a9ede49-e2a9-4760-953b-f168193da46f", "RC 350", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e966-44c2-ad5e-506e6422feec", "9a9ede49-e2a9-4760-953b-f168193da46f", "RC F", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-e98c-40de-b62e-03a6c3530c95", "9a9ede49-e2a9-4760-953b-f168193da46f", "RCF", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-eab1-45aa-aa5c-49f291884ab5", "9a9ede49-e2a9-4760-953b-f168193da46f", "RX 300", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-eaf5-4f90-b6a2-877678c8c7f0", "9a9ede49-e2a9-4760-953b-f168193da46f", "RX 330", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-eb22-446a-8280-2e952216ac03", "9a9ede49-e2a9-4760-953b-f168193da46f", "RX 350", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-eb51-4de3-900d-2d2f1fe3ae9b", "9a9ede49-e2a9-4760-953b-f168193da46f", "RX 350L", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-eb7c-45cc-aff0-132b2d8e3dac", "9a9ede49-e2a9-4760-953b-f168193da46f", "RX 400h", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ebab-45b5-9624-46f5735d4a1a", "9a9ede49-e2a9-4760-953b-f168193da46f", "RX 450h", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ebd7-42c7-8f5c-68ccc477033a", "9a9ede49-e2a9-4760-953b-f168193da46f", "SC 400", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ec04-4c13-a01c-f8a09f4fa387", "9a9ede49-e2a9-4760-953b-f168193da46f", "SC 430", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ec34-4eb1-8a0d-e93bf01889ea", "9a9ede49-e2a9-4760-953b-f168193da46f", "UX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ecd2-4961-a1e2-56c7c1dfe0f1", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Aviator", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ed02-41f0-b161-debd47766a8d", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Blackwood", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ed37-47b4-a3c9-6dc0cfda79c2", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Continental", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ed6b-40b2-9b84-6c103f1a3add", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "LS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ed9b-47b8-b8f6-ce09c205a124", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "MKC", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-edcc-4f23-a495-3c432b79e148", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "MKS", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-edfb-4b47-a143-0be4189919fe", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "MKT", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ee2e-49c0-a448-a2b36b333e26", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "MKX", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ee5e-46f0-93ea-09b57c2ff4a4", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "MKZ", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ee93-4824-8add-4e398c7b3069", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Mark LT", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-eec7-4f9f-b192-284c56d9ccf8", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Mark VIII", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-eef9-4f2d-87fb-4d6b821bee88", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Nautilus", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ef2a-4f06-81f7-ed86fe40a9e4", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Navigator", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ef5c-482c-ace6-68a3a00ee1f6", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Town Car", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-ef8a-4164-933e-e3f4f8911f58", "9a9ede49-ec64-4ada-a2e2-18ba89d02af4", "Zephyr", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f020-41e6-8158-1cc4c4254c65", "9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "Clubman", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f04d-48d7-a95a-765643e3ec2b", "9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "Convertible", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f07d-4d20-ac44-80b4924afcde", "9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "Cooper", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f0aa-4b74-b6ee-357a2df3224e", "9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "Countryman", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f0d9-4cd3-b468-b36bfe997645", "9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "Countryman Plug-in", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f231-4b0c-af79-02a259a93f7d", "9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "Hardtop 2 Door", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f265-4c0e-a872-372c95179847", "9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "Hardtop 4 Door", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f295-470a-a10e-775eba398b29", "9a9ede49-efbd-42ee-aebf-f56f276e2bbf", "Roadster", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f328-4321-81a4-2b75cb5109c5", "9a9ede49-f2c7-4dd2-a040-6d46b7b713a9", "Ghibli", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f354-4781-b595-ec6dc1e3c656", "9a9ede49-f2c7-4dd2-a040-6d46b7b713a9", "GranTurismo", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f384-40b5-8195-1edbd90a8c06", "9a9ede49-f2c7-4dd2-a040-6d46b7b713a9", "GranTurismo Convertible", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f3af-4b7e-a4c8-8871509b3af7", "9a9ede49-f2c7-4dd2-a040-6d46b7b713a9", "Levante", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f3dc-4e8a-9ae3-045b8a29029c", "9a9ede49-f2c7-4dd2-a040-6d46b7b713a9", "Quattroporte", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f45f-42ca-beda-33e9ede73798", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "B-Series Truck", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f48c-44ca-93f3-1040ca4581eb", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "CX-3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f4b9-48fa-a0cd-98d68ff882fb", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "CX-5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f4e4-46c1-96e4-466bf4276c27", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "CX-7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f511-4001-86b5-bd422a0c3ee9", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "CX-9", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f53c-47f3-9ec4-f3a2b7385e19", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "MPV", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f569-48e7-9f95-198a997c2b90", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "MX-5 Miata", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f595-4ab8-9d01-478fd5fc53d6", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Mazda3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f5c1-42ea-ba6c-fb5ac4c256bb", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Mazda5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f5f0-4584-a1b0-43d8b596bf89", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Mazda6", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f62d-468c-9145-e58b7ff61878", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Mazdaspeed 3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f65d-4be9-88d4-9a33ca11c87e", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Mazdaspeed3", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f68a-4320-9911-5e43f6cb8256", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Millenia", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f6b8-4284-abf2-97342f5018dc", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Mx-5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f6e4-4794-a66f-b893a3018228", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Protege", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f713-4a67-b749-cc81984a8aa8", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Protege5", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f73c-4115-81cb-75d358eaa947", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "RX-7", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f76c-46ec-a79e-4b9b9778e371", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "RX-8", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f796-45f5-a6cd-1a245342c1cb", "9a9ede49-f409-41aa-8dcd-1bb56811ad69", "Tribute", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f828-4b6f-bd83-21b38bed31fe", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "420-Class", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f857-4a23-9c89-924046735007", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "560", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f887-4867-9533-64478969ee5b", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "A-Class", 1, "2023-11-16 12:00:48", "2023-11-16 12:00:48"),
	("9a9ede49-f8b5-4308-9c3b-a1c8161b0349", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "AMG GT", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-f8df-4c9b-a8fb-52c0b2cee3a1", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "C-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-f90e-4cd5-b84b-7b9add1e64b7", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "CL-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-f93b-479d-a435-0f4db6bfa678", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "CLA-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-f96a-4934-8008-12877f33eba4", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "CLK-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-f994-4fe0-af2e-fde1e51071cf", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "CLS", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-f9c1-42fe-a8d2-be79a9157fc0", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "CLS-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-f9eb-4e55-a460-5fe3aaef0b62", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "E-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fa1a-4596-ae8f-3fd636cb5068", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "G-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fa49-4668-bca9-c3e295b73892", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GL-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fa78-43c4-9bcd-e1de3a59c9ce", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GLA-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-faa6-41c9-92fe-c54101cebd1a", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GLC", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fad4-45a6-8497-cdabbb428631", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GLC-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fb03-4ebb-a623-42115f454085", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GLE", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fb30-4185-adaf-ee9c8a25701e", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GLE 350", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fb5f-43d8-b3bc-437e164a7562", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GLE-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fb8b-406d-8ed5-e3f5b17c6161", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GLK-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fbbb-44db-80e1-1881021a8930", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "GLS-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fbe7-4c59-8f28-b5f34052479e", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "M-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fc15-4760-b350-05588362dd34", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "Metris", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fc3f-46df-91ab-d45ac06b9e78", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "S-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fc6c-4fa4-ae5f-3c8e24eb21e5", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "SL-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fc99-4182-b7d8-52ea9391e422", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "SLC - Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fcc5-47d6-af52-72bc2e9ef1a7", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "SLC-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fcf3-46c3-99e1-05f9345d17b3", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "SLK-Class", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fd1e-48c0-8aec-f71d048e2065", "9a9ede49-f7c5-404d-a691-4d9f5df28a8b", "Sprinter", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fdaf-4cc6-a242-bd1729e25ffc", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Cougar", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fddc-4bc6-9a49-f90aa72ea03b", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Grand Marquis", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fe0c-433c-adc9-3c3620c410c1", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Marauder", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fe39-45a0-8574-95b2048adc4a", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Mariner", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fe67-4bd6-86aa-5dcb16953202", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Milan", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fe97-4704-bf96-373bc83b38dd", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Montego", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fec5-4091-af1d-5f6843c09343", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Monterey", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-fef1-4521-8847-efc5521280c5", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Mountaineer", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-ff20-42e9-b82c-030cf32137a8", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Mystique", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-ff4d-43ee-85c8-6bbb5eb0fc8c", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Sable", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede49-ff7b-4019-8fd2-9a9320269a45", "9a9ede49-fd4f-4786-8d67-1d79336a1b18", "Villager", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-000d-4f6f-bd56-3576280b64b3", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Diamante", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0039-4827-8759-d6e0e42defec", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Eclipse", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-006d-4024-bc11-6cec240a42ea", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Eclipse Cross", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0098-4f78-ac00-143e18efb8fc", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Eclipse Spyder", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-00ca-4c80-bcfa-bf10135f618a", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Endeavor", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-00f5-4665-88c6-1f3d68a615ce", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Galant", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0123-4d5a-828e-16172f3cbbb9", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Lancer", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0151-4c69-afa4-2f62a91a74bd", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Lancer Evolution", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-017e-4b0d-b88d-5a9a27d367e0", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Lancer Sportback", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-01ab-41e4-a935-1e3df8d5281b", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Mirage", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-01d7-43a6-bc0e-8ca0ef9be6f2", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Mirage G4", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0206-498a-96db-0662417f6098", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Montero", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0235-4494-8535-63b242211976", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Montero Sport", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0264-4ee1-9e8f-ec92ce4dcba3", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Outlander", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-028f-46cc-b736-cec51071bb2d", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Outlander - PHEV", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-02c0-4326-ac10-3f86b0218976", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Outlander Sport", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-02ed-48f0-93fe-627a09af21f4", "9a9ede49-ffad-4b94-b27b-767332ff2e4a", "Raider", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-037a-45cc-a1f0-170cee6fa4a4", "9a9ede4a-0320-49c2-bd55-6629303248af", "200SX", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-03a8-41a5-860f-39e66ff0f343", "9a9ede4a-0320-49c2-bd55-6629303248af", "350Z", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-03d6-488c-9000-6bfbaa330698", "9a9ede4a-0320-49c2-bd55-6629303248af", "370Z", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0402-4199-b8f6-cdb7fff57d5c", "9a9ede4a-0320-49c2-bd55-6629303248af", "Altima", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-042f-40c0-bf65-cc8b61b74404", "9a9ede4a-0320-49c2-bd55-6629303248af", "Armada", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-045c-4b8b-8e9f-ddc11ebdca1f", "9a9ede4a-0320-49c2-bd55-6629303248af", "Cube", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0487-4b7b-8744-04a8417e98db", "9a9ede4a-0320-49c2-bd55-6629303248af", "Frontier", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-04b8-4745-bca4-de992bfe9a25", "9a9ede4a-0320-49c2-bd55-6629303248af", "GT-R", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-04e2-4168-a37b-47af6961c336", "9a9ede4a-0320-49c2-bd55-6629303248af", "Juke", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0515-4a9f-9de8-a4b3303f323d", "9a9ede4a-0320-49c2-bd55-6629303248af", "Kicks", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-053f-4e71-9a33-f3524a87b211", "9a9ede4a-0320-49c2-bd55-6629303248af", "Leaf", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-056d-451d-8a1b-324d9396f947", "9a9ede4a-0320-49c2-bd55-6629303248af", "Maxima", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0599-4468-8827-2ec17f89ed25", "9a9ede4a-0320-49c2-bd55-6629303248af", "Murano", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-05cb-4088-a42f-31be8e15bfcb", "9a9ede4a-0320-49c2-bd55-6629303248af", "Murano CrossCabriolet", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-05f7-4798-8a02-81bc2984b28e", "9a9ede4a-0320-49c2-bd55-6629303248af", "NV", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0628-40a1-bbb6-8496495dd53f", "9a9ede4a-0320-49c2-bd55-6629303248af", "NV Cargo", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0655-4891-94d5-c4c13a46fd02", "9a9ede4a-0320-49c2-bd55-6629303248af", "NV Passenger", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0682-42cb-8968-13ca14a4ad72", "9a9ede4a-0320-49c2-bd55-6629303248af", "NV200", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-06b1-4e4b-abf0-3975434545ba", "9a9ede4a-0320-49c2-bd55-6629303248af", "NV3500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-06db-4c0c-b1d9-bf1f2a3be249", "9a9ede4a-0320-49c2-bd55-6629303248af", "Pathfinder", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-070a-4d4e-93e0-878ca88ac42e", "9a9ede4a-0320-49c2-bd55-6629303248af", "Pickup", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0734-46f0-9498-c70d8f21b91f", "9a9ede4a-0320-49c2-bd55-6629303248af", "Quest", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0762-41c6-b3dc-461ce6cbd41f", "9a9ede4a-0320-49c2-bd55-6629303248af", "Rogue", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-078a-4443-80cc-5bf3315c1ed0", "9a9ede4a-0320-49c2-bd55-6629303248af", "Rogue Select", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-08ec-446b-a33a-bd61fa8aa6cb", "9a9ede4a-0320-49c2-bd55-6629303248af", "Rogue Sport", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0915-40b3-b91f-429b6336dd46", "9a9ede4a-0320-49c2-bd55-6629303248af", "Rogue Sports", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0938-46b1-b75f-ee1709ea9ae1", "9a9ede4a-0320-49c2-bd55-6629303248af", "Sentra", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0962-49e9-8834-ffd5eda7270b", "9a9ede4a-0320-49c2-bd55-6629303248af", "Titan", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0988-4fd7-a198-f11f48625a46", "9a9ede4a-0320-49c2-bd55-6629303248af", "Titan XD", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-09ae-440f-a6b0-39df8e707e69", "9a9ede4a-0320-49c2-bd55-6629303248af", "Truck", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-09d1-4050-9fd1-945b6750fa3d", "9a9ede4a-0320-49c2-bd55-6629303248af", "Versa", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-09f2-4a3a-a8a2-32d45ce16600", "9a9ede4a-0320-49c2-bd55-6629303248af", "Versa Note", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0a1c-463a-a05d-e810101f376b", "9a9ede4a-0320-49c2-bd55-6629303248af", "Xterra", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0a95-4750-9021-2a05c93d02ea", "9a9ede4a-0a43-41bd-9f5b-fc41fc5e81c7", "88", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0ab8-4fff-92ee-1962db4992a6", "9a9ede4a-0a43-41bd-9f5b-fc41fc5e81c7", "Achieva", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0ae1-4538-9bd2-a316db77c570", "9a9ede4a-0a43-41bd-9f5b-fc41fc5e81c7", "Alero", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0b04-4535-bfde-2073186f3484", "9a9ede4a-0a43-41bd-9f5b-fc41fc5e81c7", "Bravada", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0b26-4f5f-9e01-9af89f0ab109", "9a9ede4a-0a43-41bd-9f5b-fc41fc5e81c7", "Intrigue", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0b54-40db-acd6-0e4a24f756ab", "9a9ede4a-0a43-41bd-9f5b-fc41fc5e81c7", "Silhouette", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0bd8-4e3d-a4d0-13995f583aef", "9a9ede4a-0b85-43c9-8b3d-f65da026ad84", "Grand Voyager", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0c02-4047-85e3-90cd71eadaca", "9a9ede4a-0b85-43c9-8b3d-f65da026ad84", "Neon", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0c2e-4bda-a3bc-a782a6d6e9ba", "9a9ede4a-0b85-43c9-8b3d-f65da026ad84", "Voyager", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0c9f-4aa0-aac9-2c4790326716", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Aztek", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0cc5-4197-9913-a916a201da20", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Bonneville", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0ced-4096-a503-592b7aa86543", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Firebird", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0d11-4f9a-8867-7cba986dfdc3", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "G5", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0d38-48e7-9890-af086bf6fa1f", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "G6", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0d60-4d8b-8d50-672301c731f5", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "G8", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0d80-4ffb-b53a-da4bb86c3ea7", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Grand Am", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0dac-40a3-968f-ccd8e8f50dee", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Grand Prix", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0dd0-46de-aa6b-0acb5069e9a2", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Montana", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0df6-466b-8f23-8afdaf94b141", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Montana SV6", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0e22-4078-9424-c81d674ef16f", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Solstice", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0e45-4392-a2d1-d17d179622a7", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Sunfire", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0e70-4cbd-8192-0a57b5ad5061", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Torrent", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0e97-4935-a606-1543405494f0", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Trans Sport", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0ebc-449c-a273-b23728822c05", "9a9ede4a-0c52-4c7e-846a-a7ae3bbaefc3", "Vibe", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0f3d-47fa-a266-5fbf02af1d73", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "718", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0f65-4f4d-b1d0-4c7c94bf97e5", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "718 Boxster", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0f8b-456f-b0c0-31353e476449", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "718 Cayman", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0fb6-4b10-b8a0-c229d653c6c1", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "911", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-0fd9-4c91-8cd3-1c18c5e2d808", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "944", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1009-4e3c-ae83-6769006f4528", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "Boxster", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-102b-48b5-b833-07b2e194da4a", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "Cayenne", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1051-457f-bc20-85f3e3c01f15", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "Cayman", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-107c-4fbd-8747-9b7406ca91c3", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "Cayman S", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-109f-4c98-8da8-3e2e2cbaca7b", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "Macan", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-10cb-45c0-97fe-af1adc466336", "9a9ede4a-0eeb-4446-bdf7-5ce5da9136e1", "Panamera", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1140-46ac-9b44-91f3b9e1aaa1", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "1500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1167-465d-a86e-f2b380686cc0", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "2500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1313-4d2d-81d8-63ef97418421", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "2500 P", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1364-45ef-92e9-3e7fe462d66c", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "3500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1393-4866-9dd0-4bfbb1bc5c06", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "4500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-13b8-4729-8225-21905c4efffc", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "5500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-13e0-4a61-b28d-36cc110f3809", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "C/V Tradesman", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1408-4288-a432-009d944f9253", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "CV Tradesman", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-142a-40f5-8858-5af41867da7a", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "Dakota", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1458-400f-a19d-f82f0d067d4c", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "Laramie", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-147f-44ec-a72a-7ceeb2b55904", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "ProMaster 1500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-14a7-4c23-b829-dfc54c3a0b53", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "ProMaster 2500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-14cf-47d9-990b-90bd5cc11d0a", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "Promaster Cargo Van", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-14f2-4609-97f0-a654b90a19d4", "9a9ede4a-10f0-4e6d-9144-4a71d45a1b82", "Promaster City", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1578-475b-93e6-6f4eede3d3ad", "9a9ede4a-1523-4194-ad26-92f484e8503e", "Phantom", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-15f0-457a-a9bd-8d29d91a4103", "9a9ede4a-15a0-4421-adcf-43dc129bf0d9", "3-Sep", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1618-4561-8c97-2aba53f1434a", "9a9ede4a-15a0-4421-adcf-43dc129bf0d9", "5-Sep", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-164b-4d2f-899c-961d76e85a1a", "9a9ede4a-15a0-4421-adcf-43dc129bf0d9", "9-7X", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-16bb-4846-835a-af41481989fe", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "Aura", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-16df-4a91-ae72-f037e779fd02", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "ION", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-170c-421b-9e73-e0a5f918826c", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "L-Series", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1733-43b5-b3a8-d739f4ae4388", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "L300", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1757-45a3-8353-100571a3960f", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "Outlook", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1783-4df5-b3d7-6d59c4e31971", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "S-Series", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-17a5-4f6d-ac71-5b69230fd1b9", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "SL", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-17d4-40cd-9d07-ed69685bae3f", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "Sky", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-17fd-4c44-975d-f324ced92161", "9a9ede4a-1670-489c-93d8-22b9f99cef13", "VUE", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1871-4ac5-ae94-7adb014617df", "9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "FR-S", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-189f-4f5d-b610-63879d90e17e", "9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "iA", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-18c4-4137-908c-df416ec72c5b", "9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "iM", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-18e8-429c-a822-3f77ed59e334", "9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "iQ", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1913-44c7-bf4d-6650be261f27", "9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "tC", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1935-478a-adf0-69863df6ae99", "9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "xA", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1960-4f5a-905b-dc6b1dcba949", "9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "xB", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-198b-4cc8-8a62-3ba48d9406d4", "9a9ede4a-1824-4cd2-8bde-c4aad27f819e", "xD", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-19fe-4755-b424-30467065d546", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Ascent", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1a30-483c-9a2c-41f407aa231e", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "B9 Tribeca", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1a55-4e34-8804-1b77d564b0b7", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "BRZ", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1a7a-491a-bc12-dfb6cc94a401", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Crosstrek", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1aa4-4239-a7b7-ba33637fcf86", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Forester", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1ac6-46fd-884e-dba2dbcf5177", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Impreza", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1af1-4daf-9b18-485ea5c2b8c8", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Impreza WRX", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1b16-40cc-bd5b-0780b2d2d5a3", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Legacy", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1b3e-45d5-8f22-34afe8ae417a", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Legacy Wagon", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1b6b-4dd7-9fa3-8f675714e312", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Outback", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1b8c-4389-a8fd-6f37493ce0f5", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "Tribeca", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1bbc-4a51-9d06-4fdbe66e0547", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "WRX", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1be0-4dd5-bf22-c68789885978", "9a9ede4a-19af-4ac3-9ab0-b01a4184cd17", "XV Crosstrek", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1c49-4524-8b6c-e18fcaf9dcf0", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "Forenza", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1c6e-48f1-8046-07e9c821218e", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "GSX-R1000", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1c93-404d-8636-dcaa0e08db65", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "GSX600F", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1cb5-4bb7-b48d-b608613414bf", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "Grand Vitara", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1e05-419c-ab41-058260a850cc", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "Kizashi", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1e2c-4a45-9e35-7a30aeeba420", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "Reno", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1e4e-4e03-aa61-9a0bc41d8936", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "SX4", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1e73-448b-98d0-a01e1a1c70c9", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "Sidekick", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1e98-4bc9-9fe0-bec91e814cff", "9a9ede4a-1c05-4284-8fdc-409701c77a67", "XL7", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1f03-4560-bd34-5601cc7a8f63", "9a9ede4a-1ebf-4571-8435-89c8bf5d1b2b", "Model 3", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1f2c-4bf9-aade-46c7e892a2a0", "9a9ede4a-1ebf-4571-8435-89c8bf5d1b2b", "Model S", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1f53-41b2-ab26-af0cafa1805d", "9a9ede4a-1ebf-4571-8435-89c8bf5d1b2b", "Model X", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1fbe-4bf8-b35f-73b593526120", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "4-Runner", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-1fe0-4a3b-999e-68c69016915b", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "4Runner", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2007-404c-928d-80b73c43b0fe", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "86", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2029-4042-a0b5-eea07630096c", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Avalon", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-204c-4bbe-a272-ab061d82eeba", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "C-HR", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2071-4eda-8c70-eeaa53681c32", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Camry", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2092-465d-9d27-8e6f03bb85f0", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Camry Solara", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-20b6-4e66-8dae-6a262a5abaa3", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Celica", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-20dc-4a71-8926-cd78b8762f17", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Corolla", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-20fd-47dc-9279-ccf65df538b7", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Corolla iM", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2123-4485-9d07-be142ded75c2", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "ECHO", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2148-47b7-8309-0b2736dc3936", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "FJ Cruiser", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-216d-4651-af4d-f6040d86ef1c", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Highlander", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2198-4b2c-accd-d78c64ccccd1", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Land Cruiser", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-21bb-41e9-b66c-94f652ee9c50", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "MR2 Spyder", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-21e0-4d90-877f-022e6b201698", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Matrix", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-220b-4068-a0d6-9e6769257aee", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Pickup", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-222c-4067-b16d-199a83e795d2", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Prius", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2251-42f6-a5be-528df09fe28c", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Prius Plug-in", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2275-4d2b-a7df-76fb7c9721ce", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Prius Prime", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2297-44e2-8475-3089ccc89c8a", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Prius V", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-22bf-432a-a1a7-2a013d215813", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Prius c", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-22e3-44ff-8afd-a343350f616f", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "RAV4", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2306-405b-9f24-59125b597219", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Sequoia", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-232e-44cf-b6c6-35def65a70fa", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Sienna", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2350-483d-aa37-fa03e761b14d", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Supra", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2374-4425-8704-d742a5e06e16", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "T100", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-239b-473d-bb77-c8b7461bce2d", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Tacoma", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-23bc-49b4-836e-3aaeda9ade63", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Tundra", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-23e0-459e-845d-5ab6e145301a", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Venza", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2407-4e2c-83df-c127b24d9e21", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Yaris", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2428-4cb7-be67-955c0f1b2087", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Yaris iA", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2450-45bb-856b-74739c65bb88", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "tC", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-24bd-472b-bbaf-dd2c9385fcb3", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Arteon", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-25ef-4ecb-9404-2640f2305d36", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Arteon 2.0T", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2615-4143-81a8-976bab9261bb", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Atlas", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-263e-41fc-8e57-2e4d70d5bb0d", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Beetle", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2664-4b7c-b129-55dd1ed8f00e", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Beetle Convertible", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2689-4b30-9034-b8da830e399a", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "CC", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-26b3-4395-bd65-474c2a20a6b0", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Eos", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-26d4-457f-8a50-08e2f63b0e57", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "GLI", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-26f7-43e5-aeaa-bde8ed3ab879", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "GTI", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2721-48a4-a9ea-7840b5aae482", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Golf", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-274b-45c6-8562-7ba051cba3f9", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Golf Alltrack", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2777-446e-85ff-c04a0abef8f3", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Golf GTI", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-279a-4a11-bca4-9cf6928f80de", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Golf R", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-27c3-4608-926e-6c111a237f17", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Golf SportWagen", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-27eb-447a-a42e-8e0c949b77c2", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Jetta", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2811-4270-9deb-4c1c0c8d2a0b", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Jetta SportWagen", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-283b-4f69-8caa-cdf1f5e3d3cc", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "New Beetle", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2861-4e1c-aa8a-a85ab7a0f475", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Passat", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-288a-4cb4-88cf-ede758d2f432", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "R32", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-28b2-4404-a7f4-b14ac5bf2e58", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Rabbit", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-28d5-4919-9701-b44d1a897948", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Routan", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-28fb-4419-9cfb-967b52fd7849", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Tiguan", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2922-43c5-bff3-96b2788b995f", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Tiguan Limited", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2943-4523-9963-ebc5803082af", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Touareg", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-296c-4800-9d5a-171ee453727e", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Touareg 2", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-29e8-4d11-9a23-2540be97ecae", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "940", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2a0b-42f2-8e4e-d587e95c6304", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "C30", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2a34-41e8-80a2-048b85f23c74", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "C70", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2a5a-4aa4-b54d-cc4c786e0991", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "S40", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2a81-4dbc-9adb-b7f133709478", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "S60", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2aa8-4495-b775-695debf5289b", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "S80", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2ac9-44fe-a57a-f2b26f00b6bb", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "S90", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2af1-4bcd-99c1-a09105d84522", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "V50", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2b1b-419b-9a58-a7fb4b24a20a", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "V60", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2b41-4036-bd82-dabcd0c4aeb4", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "V60 Cross Country", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2b6a-4ce6-baa8-d17047f37d5c", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "V70", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2b8b-4054-a0fa-b4fcb1e1d907", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "V90", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2bb0-4f22-b597-679092fdb9cd", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "V90 Cross Country", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2bd6-4fd1-b5c4-602b46a70b22", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "XC60", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2bf7-4bd1-bdf8-083a9f0c6563", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "XC70", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2c23-4216-b8fc-83c8deb39ab5", "9a9ede4a-2994-417f-a0b0-e9b3b898f724", "XC90", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2c91-4db6-b16a-f6adc1165a8a", "9a9ede4a-2c47-4ebe-8c3b-6adc8eef39ad", "Fortwo", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2d04-4c1a-acd1-8a991c232ec7", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Amico", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2d31-48cf-917a-57f7d32e2d57", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Area 51", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2d5e-4189-8120-a7c2b3988332", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Atlantic 125", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2d80-45fe-b4ea-2e8aabb56618", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Atlantic 250", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2da9-470b-b2b8-50513ed2fd2a", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Atlantic 500", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2dd2-4af8-904b-822fd727329f", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Caponord 1000", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2df3-4e81-a9b6-f70d6a7509d2", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Classic 125", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2e20-44c3-908f-fc66673b003c", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Classic 50", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2e41-4c12-a080-757cb11d9aa4", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Gulliver 50", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2e69-4183-abe4-4630770cdbde", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Habana 125", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2e92-4800-b744-f269d9a33dc9", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Habana 50", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2eb4-43ff-b23b-ec0cba089157", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Leonardo 125", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2edc-4f44-b379-6a173e920cb4", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Leonardo 150", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2f00-4907-840e-fa0a975cfda6", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Leonardo 250", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2f21-4cc3-a676-5cebb90ce09b", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Leonardo 300", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2f4d-4a01-ab19-26dc39953148", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Mcgulliver 50", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2f6d-48cb-8aa6-ba14a8256a24", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Moto 6.5", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2f95-4a76-be9f-ed118970eb0b", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "MX 125", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2fbe-4889-816c-ee6831ec23aa", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "MX Super Motard 50", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-2fe0-48e2-b2fe-1a083b060ecd", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Pegaso 650", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-300d-4355-91a1-a4a3c38c725e", "9a9ede4a-2cb5-4d0e-911c-1162ad41a020", "Rally 50", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-307b-44ce-a467-32097053a855", "9a9ede4a-3030-472b-a7e1-5b0ac99e17ae", "Classic SL 125", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-309f-498b-9a49-a115469d3753", "9a9ede4a-3030-472b-a7e1-5b0ac99e17ae", "Classic SL 150", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-30c7-4d63-8c62-b60c3a4ade7b", "9a9ede4a-3030-472b-a7e1-5b0ac99e17ae", "Sprint", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("9a9ede4a-30ef-4a50-b2ef-70e4354dd493", "9a9ede4a-3030-472b-a7e1-5b0ac99e17ae", "Sunny", 1, "2023-11-16 12:00:49", "2023-11-16 12:00:49"),
	("a00c0aaa-e946-44dc-a3ff-e9f9747b1ab9", "9a9ede4a-1f75-4f3c-8874-3820fb2d21e9", "Aygo X", 1, "2025-10-06 12:59:50", "2025-10-06 12:59:50"),
	("a00e3d9c-a46e-4bfb-b709-532f99387aa8", "9a9ede4a-2475-488a-bdc0-8e1287b518a9", "Golf", 1, "2025-10-07 15:13:56", "2025-10-07 15:13:56"),
	("a0146913-0a56-4afd-b2e6-d72ce224985f", "9a9ede49-8e8a-4d0b-805a-e4438bcd4182", "Range Rover", 1, "2025-10-10 16:50:26", "2025-10-10 16:50:26");

/*!40000 ALTER TABLE `vehicle_models` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table vehicle_returns
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_returns`;

CREATE TABLE `vehicle_returns` (
  `id` char(36) NOT NULL,
  `car_id` char(36) NOT NULL,
  `booking_id` char(36) NOT NULL,
  `return_date_time` datetime NOT NULL,
  `reason` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_returns_car_id_foreign` (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `vehicle_returns` WRITE;
/*!40000 ALTER TABLE `vehicle_returns` DISABLE KEYS */;

INSERT INTO `vehicle_returns` (`id`, `car_id`, `booking_id`, `return_date_time`, `reason`, `status`, `created_at`, `updated_at`) VALUES
	("9aa25823-77d7-467c-8c78-4419bdddab21", "9aa0262a-6ad3-4639-bb1d-412454d74031", "9aa03c2a-f200-4814-84d1-bc3304bb1001", "2023-11-17 16:29:00", "Tedt", "pending", "2023-11-18 05:29:00", "2023-11-18 05:29:00"),
	("9db2d2e9-1e9b-41b2-a5ff-9747969ecb42", "9aa0262a-6ad3-4639-bb1d-412454d74031", "9aa2387f-2c86-478c-9d2b-c9ed9407345e", "2024-12-11 11:41:00", "More than", "pending", "2024-12-12 04:41:22", "2024-12-12 04:41:22"),
	("9e4db67a-eaec-442f-a985-c2e360af5169", "9aa0262a-6ad3-4639-bb1d-412454d74031", "9d6e140b-0a3e-4b4d-99ea-f02d1a7cfbac", "1999-07-27 21:55:00", "Commodo reprehenderi", "pending", "2025-02-27 04:35:11", "2025-02-27 04:35:11"),
	("9f579a76-1065-4336-8ad4-c316a38f5ea4", "9f5772a6-bee6-49e7-b6a4-4c337e42a6e7", "9f578c05-ca19-4922-a54a-ca26305598a7", "2025-07-17 15:46:00", "Test return", "pending", "2025-07-09 08:47:03", "2025-07-09 08:47:03");

/*!40000 ALTER TABLE `vehicle_returns` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table vehicle_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_types`;

CREATE TABLE `vehicle_types` (
  `id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `vehicle_types` WRITE;
/*!40000 ALTER TABLE `vehicle_types` DISABLE KEYS */;

INSERT INTO `vehicle_types` (`id`, `name`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
	("9a9ede4a-4638-4d71-9a5f-e950b329179d", "Convertibles", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Car_convertiblesss.png", 1, "2023-11-16 12:00:49", "2025-10-06 16:38:05"),
	("9a9ede4a-4718-47f7-905c-ef5fe4d35ecc", "Coupes", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Car_1.png", 1, "2023-11-16 12:00:49", "2025-10-06 16:29:35"),
	("9a9ede4a-4829-40c8-aec7-0347499bcaf3", "Hatchback", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ChatGPT_Image_Oct_6__2025__10_48_53_PM.png", 1, "2023-11-16 12:00:49", "2025-10-06 23:20:58"),
	("9a9ede4a-492b-4fb9-9476-0fd14185b70c", "Sedan", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Car_sedan.png", 1, "2023-11-16 12:00:49", "2025-10-06 16:31:45"),
	("9a9ede4a-4a46-4815-a26e-c0aade29cfc9", "Wagon", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Car_wagon2.png", 1, "2023-11-16 12:00:49", "2025-10-06 23:17:06"),
	("9a9ede4a-4b09-4c85-a79c-38bfdecb5063", "Truck", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motorstruck.png", 1, "2023-11-16 12:00:49", "2025-10-06 16:45:25"),
	("a00c0904-5939-426f-a4ec-98cf9bb11116", "Mini", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Car_mini.png", 1, "2025-10-06 12:55:13", "2025-10-06 16:47:45"),
	("a00c4083-a387-4a63-a33d-2f4af838fdfe", "Economy", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Car_economy.png", 1, "2025-10-06 15:30:24", "2025-10-06 16:49:05"),
	("a00c449d-3e44-46ab-976e-2f0aca0e7447", "MPV", "https://animoter.skyoracare.com//storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motormpv.png", 1, "2025-10-06 15:41:52", "2025-10-06 16:52:38");

/*!40000 ALTER TABLE `vehicle_types` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table vehicles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vehicle_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `transmission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `specification` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `mot` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `road_tax` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `service` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `driver` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `finance` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `damage_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `repair` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;





# Dump of table verifybackup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `verifybackup`;

CREATE TABLE `verifybackup` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `verify_status` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





# Dump of table wallets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wallets`;

CREATE TABLE `wallets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `holder_type` varchar(191) NOT NULL,
  `holder_id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `uuid` char(36) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `balance` decimal(64,0) NOT NULL DEFAULT 0,
  `decimal_places` smallint(5) unsigned NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  UNIQUE KEY `wallets_uuid_unique` (`uuid`),
  KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  KEY `wallets_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;

INSERT INTO `wallets` (`id`, `holder_type`, `holder_id`, `name`, `slug`, `uuid`, `description`, `meta`, `balance`, `decimal_places`, `created_at`, `updated_at`) VALUES
	(1, "App\\Models\\User", "9a9fe4bc-d3be-495f-a5ac-7b9e7c5ee884", "Default Wallet", "default", "55010c4c-ce42-4865-8054-24a44b500ddc", NULL, "[]", 0, 2, "2023-11-17 02:13:04", "2023-11-17 02:13:04"),
	(2, "App\\Models\\User", "9a9fefd9-fe2b-45bb-abc2-04a45bb0cb90", "Default Wallet", "default", "56724dfb-2db8-4f84-9139-de54f1cfc51c", NULL, "[]", 0, 2, "2023-11-17 02:13:04", "2023-11-17 02:13:04"),
	(3, "App\\Models\\User", "9aa07df9-ec4c-4c3e-94ef-3a596ccdc169", "Default Wallet", "default", "118ff125-8ef0-4f7f-9a1f-9160442f6919", NULL, "[]", 0, 2, "2023-11-17 13:20:44", "2023-11-17 13:20:44"),
	(4, "App\\Models\\User", "9aa133d5-4cd3-4eaa-9959-1365ad5245e2", "Default Wallet", "default", "b7182a2d-8242-4272-9778-f4e326ab892c", NULL, "[]", 0, 2, "2023-11-18 00:06:09", "2023-11-18 00:06:09"),
	(5, "App\\Models\\User", "9aa5b0d5-e61d-4cd3-8fb1-23d002bfcc74", "Default Wallet", "default", "1c95c8b9-33e4-41a8-8846-fb9b0f5971a6", NULL, "[]", 0, 2, "2023-11-28 07:18:49", "2023-11-28 07:18:49"),
	(6, "App\\Models\\User", "9aaa65f6-9982-448a-908a-ffa7c1fa1f8d", "Default Wallet", "default", "38cb38f1-a7a7-4897-84b3-c5f7751ba382", NULL, "[]", 0, 2, "2023-11-28 07:18:49", "2023-11-28 07:18:49"),
	(7, "App\\Models\\User", "9ac174db-8220-4839-a554-0f1ab2f69345", "Default Wallet", "default", "e8d43ae4-52d3-421f-b32f-17db2c5109ac", NULL, "[]", 0, 2, "2023-12-05 04:13:28", "2023-12-05 04:13:28"),
	(8, "App\\Models\\User", "9b6d5d6b-abec-4140-aa57-ece19b55e426", "Default Wallet", "default", "06ba9185-4dbc-423e-80cb-8aac64ceff85", NULL, "[]", 0, 2, "2024-04-08 19:35:00", "2024-04-08 19:35:00"),
	(9, "App\\Models\\User", "9b6d5e1d-86a6-4cc1-b547-687315b2d417", "Default Wallet", "default", "9a01a1d2-95f9-4e4d-b870-4b2c08032a39", NULL, "[]", 0, 2, "2024-04-08 19:35:01", "2024-04-08 19:35:01"),
	(10, "App\\Models\\User", "9bfaee4a-f1d2-48ab-af45-e88b52654afc", "Default Wallet", "default", "660f7c5d-4acc-4d33-8afc-af74952b3b20", NULL, "[]", 0, 2, "2024-05-07 12:33:46", "2024-05-07 12:33:46"),
	(11, "App\\Models\\User", "9d986313-3b25-4f24-b98d-8fca1b37d2a4", "Default Wallet", "default", "b83a5d14-2457-4f4d-8633-d1760c2c8b74", NULL, "[]", 0, 2, "2025-01-28 01:55:31", "2025-01-28 01:55:31"),
	(12, "App\\Models\\User", "9ded1186-f80f-477e-b406-14c9c3bd8110", "Default Wallet", "default", "d48d6dff-d44b-41aa-b809-bdeeb500c097", NULL, "[]", 0, 2, "2025-01-28 02:01:25", "2025-01-28 02:01:25"),
	(13, "App\\Models\\User", "9ded11c0-dbef-47dc-83aa-3a29e48b98a4", "Default Wallet", "default", "fa4cd305-e7ae-418c-b7d2-a7bbaefa234b", NULL, "[]", 0, 2, "2025-01-28 02:01:25", "2025-01-28 02:01:25"),
	(14, "App\\Models\\User", "9e0fc574-e315-460f-871c-983dd3194753", "Default Wallet", "default", "6166f8bd-6255-4838-b5b4-0714a5ecefad", NULL, "[]", 0, 2, "2025-01-28 02:01:25", "2025-01-28 02:01:25"),
	(15, "App\\Models\\User", "9e237310-5880-4189-8854-05c25d592c69", "Default Wallet", "default", "af81d7fa-c505-472f-995b-fa29e2822066", NULL, "[]", 0, 2, "2025-02-23 05:21:38", "2025-02-23 05:21:38");

/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table workshops
# ------------------------------------------------------------

DROP TABLE IF EXISTS `workshops`;

CREATE TABLE `workshops` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `company_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `branches` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `contact_persons` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `document` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `billing_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `services_products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `commissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `workshops` WRITE;
/*!40000 ALTER TABLE `workshops` DISABLE KEYS */;

INSERT INTO `workshops` (`id`, `status`, `company_info`, `branches`, `contact_persons`, `document`, `billing_info`, `services_products`, `commissions`, `created_at`, `updated_at`, `user_id`) VALUES
	(1, "pending", "{\"company_name\":\"Demo workshop\",\"display_name\":\"Demo workshop\",\"company_number\":\"999999999\",\"city\":\"Islamabad\",\"street_name\":\"Islamabad, Pakistan\",\"post_code\":\"46000\",\"company_reg_no\":\"8888888888\",\"company_type\":\"type1\",\"number_of_employees\":\"5000\",\"company_website\":\"https:\\/\\/laravel.com\\/docs\\/11.x\",\"contact_email\":\"demo123@gmail.com\",\"primary_phone_no\":\"+999999999\",\"secondary_phone_no\":\"55555555555555555555555\",\"vat_registration_no\":\"******\",\"region\":\"Pakistan\"}", "{\"branch_name\":\"Slough\",\"house_name_number\":\"25\",\"street_name\":\"Albion\",\"city\":\"Albion west\",\"post_code\":\"33334\",\"contact_email\":\"demo555@gmail.com\",\"primary_phone_no\":\"+923333333333\",\"secondary_phone_no\":\"33333333333333333333\",\"contact_person\":\"1\",\"status\":\"active\",\"branch_image\":\"\"}", "{\"first_name\":\"Sam\",\"last_name\":\"Curran\",\"primary_phone_no\":\"+44444444444\",\"secondary_phone_no\":\"+44444444444\",\"email\":\"demo321@gmail.com\",\"branch\":\"Slough\"}", "{\"company_type\":\"\",\"document_type\":\"\",\"verification\":\"\",\"file\":\"\"}", "[]", "[]", "[]", "2025-01-27 09:02:04", "2025-01-28 05:50:13", NULL);

/*!40000 ALTER TABLE `workshops` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of views
# ------------------------------------------------------------

# Creating temporary tables to overcome VIEW dependency errors


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# Dump completed on 2025-11-26T18:52:50+05:30
