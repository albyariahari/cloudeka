-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_cloud_ui
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `benefit_translations`
--

DROP TABLE IF EXISTS `benefit_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `benefit_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefit_id` bigint(20) unsigned NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `benefit_translations_benefit_id_lang_unique` (`benefit_id`,`lang`),
  KEY `benefit_translations_lang_index` (`lang`),
  CONSTRAINT `benefit_translations_benefit_id_foreign` FOREIGN KEY (`benefit_id`) REFERENCES `benefits` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benefit_translations`
--

LOCK TABLES `benefit_translations` WRITE;
/*!40000 ALTER TABLE `benefit_translations` DISABLE KEYS */;
INSERT INTO `benefit_translations` VALUES (1,'Hussle-free and flexible options Cloud',1,'<p>Offers a virtual machine with managed service solution to automatically size the storage and is equipped with a flexible resource pool that can help you to create, delete, and edit the virtual machine as required.</p>','imgs/products/feature-products/011-operation.svg','en','2021-05-10 22:42:00','2021-05-10 22:42:00'),(2,'Cloud Bebas rumit dan sesuai dengan kebutuhan',1,'<p>Virtual Machine akan terkelola dan mengatur ukuran penyimpanan secara otomatis serta Resource Pool yang fleksibel dapat membantu Anda untuk membuat, menghapus, dan mengedit Virtual Machine sesuai dengan kebutuhan.</p>','imgs/products/feature-products/011-operation.svg','id','2021-05-10 22:42:00','2021-06-04 10:52:47'),(3,'Simple Deployment',2,'<p>Comes with a fixed package for the virtual machines so there is no need to configure vCPU or vRAM anymore.</p>','benefit/7k7CKXAbU4w8eAeiwXfPp8bF1vXBFppxx23A7K0N.svg','en','2021-05-19 07:57:16','2021-05-19 07:57:16'),(4,'Deployment sederhana',2,'<p>Dilengkapi dengan paket fixed untuk Virtual Machine sehingga tidak perlu lagi mengonfigurasi vCPU atau vRAM.</p>','benefit/7k7CKXAbU4w8eAeiwXfPp8bF1vXBFppxx23A7K0N.svg','id','2021-05-19 07:57:16','2021-06-04 11:01:23'),(5,'No More Bandwidth Metering',3,'<p>Free shared Internet up to 1 Gbps IIX and 200 Mbps IX or you can choose Lintasarta Internet Dedicated or Lintasarta Metro Ethernet for faster and more stable connections.</p>','benefit/tZub2MZYpLBsLZhzzQ4sSlns0C06Ek4klvtWVd6w.svg','en','2021-05-19 07:57:16','2021-05-19 07:57:16'),(6,'Tanpa pengukuran bandwidth',3,'<p>Gratis jaringan Internet yang dapat digunakan antar sesama pengguna dengan bandwidth hingga 1 Gbps IIX dan 200 Mbps IX atau terdapat pilihan jaringan Lintasarta Internet Dedicated atau Lintasarta Metro Ethernet untuk menjaga koneksi lebih stabil.</p>','benefit/tZub2MZYpLBsLZhzzQ4sSlns0C06Ek4klvtWVd6w.svg','id','2021-05-19 07:57:16','2021-06-04 11:01:23'),(7,'Cloud At No Cost',4,'<p>No additional cost is imposed for egress/ingress and port hourly, unless for the bandwidth from Internet Dedicated or Metro Ethernet.</p>','benefit/BLgwm2NYwwZZxkR0txpqZF4rJtb7oZQ0exDzZ03r.svg','en','2021-05-19 07:57:16','2021-05-19 07:57:16'),(8,'Hemat biaya',4,'<p>Tidak ada biaya tambahan untuk egress/ingress dan port kecuali bandwidth dari jaringan Internet Dedicated atau Metro Ethernet.</p>','benefit/BLgwm2NYwwZZxkR0txpqZF4rJtb7oZQ0exDzZ03r.svg','id','2021-05-19 07:57:16','2021-06-04 11:01:23'),(9,'Backup All You Want',5,'<p>Protect and backup all data in the virtual machine from Cloud Premium or Cloud Lite by Lintasarta Cloudeka, or from your own private Cloud and server.</p>','benefit/K1t568kmO3qPqjUDTRpxKsfr5Dhm28cd1ByUnAnd.svg','en','2021-05-21 07:55:59','2021-05-21 07:55:59'),(10,'Backup seluruh data',5,'<p>Lindungi dan backup seluruh data yang ada pada Virtual Machine baik di Deka Prime (PX1) atau Deka Flexi (FX2) milik Lintasarta Cloudeka, maupun di private Cloud atau server fisik milik Anda.<br />\r\n&nbsp;</p>','benefit/K1t568kmO3qPqjUDTRpxKsfr5Dhm28cd1ByUnAnd.svg','id','2021-05-21 07:55:59','2021-06-04 12:19:57'),(11,'Disaster On Cloud',6,'<p>Part of the Disaster Recovery Plan that will manage the last copy of data from a virtual machine in your cluster or Lintasarta Cloudeka. With this service, all problems can be resolved quickly and return to normal and immediately restore the virtual system.</p>','benefit/TUwH0a2qqBTMwIUp4W1XQ3P4GckgBTQSFg3e2qUe.svg','en','2021-05-21 07:55:59','2021-05-21 07:55:59'),(12,'Disaster on Cloud',6,'<p>Bagian dari Disaster Recovery Plan yang mengelola salinan data terakhir dari Virtual Machine di cluster milik Anda atau Lintasarta Cloudeka. Dengan layanan ini, seluruh permasalahan dapat diatasi dengan cepat dan kembali normal serta segera memulihkan sistem virtual.<br />\r\n&nbsp;</p>','benefit/TUwH0a2qqBTMwIUp4W1XQ3P4GckgBTQSFg3e2qUe.svg','id','2021-05-21 07:55:59','2021-06-04 12:19:57'),(13,'Comprehensive management',7,'<p>Available in two options that will suit your needs. Fully managed by Lintasarta&rsquo;s professional teams for backup, restore, and failover. Self-managed for more flexibility in managing retention times, restore, and other needs.</p>','benefit/iBJG9QPmpAfjUKdOglVNmH7vudzm8xu8AmxI83uW.svg','en','2021-05-21 07:55:59','2021-05-21 07:57:07'),(14,'Pengelolaan andal',7,'<p>Dua pilihan yang sesuai dengan kebutuhan Anda, yaitu Fully Managed oleh tim profesional Lintasarta untuk backup, restore, dan failover, atau Self-managed untuk lebih fleksibel dalam mengatur waktu retention, restore, dan kebutuhan lainnya.&nbsp;</p>','benefit/iBJG9QPmpAfjUKdOglVNmH7vudzm8xu8AmxI83uW.svg','id','2021-05-21 07:55:59','2021-06-04 12:19:57'),(15,'No More Bandwidth Metering',8,'<p>Free shared Internet up to 1 Gbps IIX and 200 Mbps IX or you can choose Lintasarta Internet Dedicated or Lintasarta Metro Ethernet for faster and more stable connections.</p>','benefit/lQ4JxscARbzKVI8Ru3QmRFz8Zo3A0RXBolNjIdyo.svg','en','2021-05-21 08:02:10','2021-05-21 08:03:25'),(16,'Tanpa pengukuran bandwidth',8,'<p>Gratis jaringan Internet yang dapat digunakan antar sesama pengguna dengan bandwidth hingga 1 Gbps IIX dan 200 Mbps IX atau terdapat pilihan jaringan Lintasarta Internet Dedicated atau Lintasarta Metro Ethernet untuk menjaga koneksi lebih stabil.</p>','benefit/lQ4JxscARbzKVI8Ru3QmRFz8Zo3A0RXBolNjIdyo.svg','id','2021-05-21 08:02:10','2021-06-04 10:52:47'),(17,'Cloud At No Cost',9,'<p>No additional cost is imposed for egress/ingress and port hourly, unless for the bandwidth from Internet Dedicated or Metro Ethernet.</p>','benefit/weaSNa8A3o3zC7brW1HbC0LW6tUcg09sGVypNptT.svg','en','2021-05-21 08:02:10','2021-05-21 08:03:25'),(18,'Bebas biaya tambahan',9,'<p>Tidak ada biaya tambahan untuk egress/ingress dan port kecuali bandwidth dari jaringan Internet Dedicated atau Metro Ethernet.</p>','benefit/weaSNa8A3o3zC7brW1HbC0LW6tUcg09sGVypNptT.svg','id','2021-05-21 08:02:10','2021-06-04 10:52:47'),(19,'The Best Choice For Your Needs',10,'<p>You can choose a device partner based on your company&rsquo;s needs. Specifically for baremetal devices, you will have the opportunity to choose two different partners.</p>','benefit/B16NaBNGAb4xIfdYoCc0emh0VCQLPbOBfPdhZzQQ.svg','en','2021-05-21 10:26:54','2021-05-21 10:26:54'),(20,'Pilihan terbaik sesuai kebutuhan',10,'<p>Anda dapat memilih partner perangkat sesuai kebutuhan perusahaan. Khusus perangkat baremetal, Anda memiliki kesempatan untuk memilih dua partner berbeda.&nbsp;<br />\r\n&nbsp;</p>','benefit/B16NaBNGAb4xIfdYoCc0emh0VCQLPbOBfPdhZzQQ.svg','id','2021-05-21 10:26:54','2021-06-04 12:32:48'),(21,'Integrated With Lintasarta Services',11,'<p>Deka Priority can be integrated with other Lintasarta Services such as network, security, etc., or with other service providers.</p>','benefit/VA6EJg9JUKIsHnkTc4FdS4CzuNNqCe5rpi9ekaw5.svg','en','2021-05-21 10:26:54','2021-06-05 05:48:38'),(22,'Terintegrasi dengan Layanan Lintasarta',11,'<p>Deka Priority dapat diintegrasikan dengan Layanan Lintasarta lain seperti jaringan, keamanan, dan lain-lain, atau dengan penyedia jasa lain.<br />\r\n&nbsp;</p>','benefit/VA6EJg9JUKIsHnkTc4FdS4CzuNNqCe5rpi9ekaw5.svg','id','2021-05-21 10:26:54','2021-06-04 12:32:49'),(23,'Simple And Fully Managed',12,'<p>Lintasarta Cloudeka&rsquo;s professional technician team will manage all levels from hardware to the Cloud platform. You can also choose Lintasarta Enterprise on Advance Professional Services (Lintasarta IT Outsourcing) for other IT infrastructure management.</p>','benefit/YpBLyWo1lVYq8CJF0Ahtdmmnhfwc4voPb86ryeRW.svg','en','2021-05-21 10:26:54','2021-05-21 10:26:54'),(24,'Mudah dan terkelola sepenuhnya',12,'<p>Tim teknisi profesional Lintasarta Cloudeka akan mengelola seluruh tingkatan dari perangkat keras hingga ke platform Cloud. Anda juga dapat memilih layanan Lintasarta Enterprise on Advance Professional Services (Lintasarta IT Outsourcing) untuk pengelolaan infrastruktur IT lainnya.<br />\r\n&nbsp;</p>','benefit/YpBLyWo1lVYq8CJF0Ahtdmmnhfwc4voPb86ryeRW.svg','id','2021-05-21 10:26:54','2021-06-04 12:32:49'),(25,'Fast And Flexible Performance',13,'<p>Deka Priority has various deployment options such as at the customer site, at the Lintasarta Data Center, or integrated into Lintasarta Cloudeka&#39;s Deka Prime (PX1) / Deka (FX2) (Public Cloud) via a private network or Metro Ethernet.</p>','benefit/Qp5owKYFLAxz5D1CgFPibj3sO4ctQS8Gp0FF9W53.svg','en','2021-05-21 10:26:54','2021-06-05 05:48:38'),(26,'Cepat dan berkinerja fleksibe',13,'<p>Deka Priority memiliki berbagai opsi deployment seperti di lokasi pelanggan, di Lintasarta Data Center, atau diintegrasikan ke Deka Prime (PX1)/Deka Flexi (FX2) (Public Cloud) milik Lintasarta Cloudeka melalui jaringan privat atau Metro Ethernet.</p>','benefit/Qp5owKYFLAxz5D1CgFPibj3sO4ctQS8Gp0FF9W53.svg','id','2021-05-21 10:26:54','2021-06-04 12:32:49'),(27,'Easily manage and control data',14,'<p>You can configure by using a dedicated webportal, manage replication between multisite, and provide users access to buckets.</p>','benefit/UhORy2jOMVaajHV2kFuhOGWDfY5KT3VeDcci8RYn.svg','en','2021-05-21 10:51:04','2021-05-21 10:51:04'),(28,'Mudah mengelola dan mengontrol data',14,'<p>Anda dapat melakukan konfigurasi melalui webportal yang didedikasikan ke satu pelanggan dan dapat mengelola kebutuhan replikasi antar lokasi serta memberikan akses pengguna ke bucket.&nbsp;<br />\r\n&nbsp;</p>','benefit/UhORy2jOMVaajHV2kFuhOGWDfY5KT3VeDcci8RYn.svg','id','2021-05-21 10:51:04','2021-06-04 12:52:55'),(29,'High-Performance Cloud Storage',15,'<p>Equipped with SSD storage on the backend for optimal performance.</p>','benefit/3crhNjuWDzTGZaHklYZrWr23yEQIXDzZzhMqvduX.svg','en','2021-05-21 10:51:04','2021-05-21 10:51:04'),(30,'Bekinerja tinggi penyimpanan Cloud',15,'<p>Dilengkapi dengan SSD Storage pada backend untuk performa yang lebih optimal.&nbsp;<br />\r\n&nbsp;</p>','benefit/3crhNjuWDzTGZaHklYZrWr23yEQIXDzZzhMqvduX.svg','id','2021-05-21 10:51:04','2021-06-04 12:52:55'),(31,'Cost-effective',16,'<p>No additional cost is imposed for egress/ingress and port hourly, and free shared Internet up to 1 Gbps IIX and 200 Mbps IX.</p>','benefit/4DwX9wVcU5uYIEyl8LO0B304wXhnH0IZ1QOPnf7y.svg','en','2021-05-21 10:51:04','2021-05-21 10:51:04'),(32,'Terjangkau dan sesuai kebutuhan',16,'<p>Tidak ada biaya tambahan untuk egress/ingress dan port, serta gratis jaringan Internet yang dapat digunakan antar sesama pengguna dengan bandwidth hingga 1 Gbps IIX dan 200 Mbps IX</p>','benefit/4DwX9wVcU5uYIEyl8LO0B304wXhnH0IZ1QOPnf7y.svg','id','2021-05-21 10:51:04','2021-06-04 12:52:55'),(33,'Simple Deployment',17,'<p>Deka Harbor offers convenience in deploying applications, which is as simple as login and deploy. This solution also supports Continuous Integration (CI) and Continuous Delivery (CD) processes, so that the Deka Harbor service can perform testing, debugging, and updating application versions easily and quickly.</p>','benefit/gbUood6YcVlIKzTAbBSPLZ2MEG567UUtYZ3eU9XZ.svg','en','2021-05-21 10:57:11','2021-06-05 05:57:50'),(34,'Deployment sederhana',17,'<p>Deka Harbor menawarkan kemudahan dalam men-deploy aplikasi, yaitu sesederhana login dan deploy. Solusi ini juga mendukung proses Continuous Integration (CI) dan Continuous Delivery (CD), sehingga layanan Deka Harbor dapat melakukan pengujian, debugging, dan update versi aplikasi secara mudah dan cepat.<br />\r\n&nbsp;</p>','benefit/gbUood6YcVlIKzTAbBSPLZ2MEG567UUtYZ3eU9XZ.svg','id','2021-05-21 10:57:11','2021-06-04 13:19:14'),(35,'Flexibel Configuration',18,'<p>The autoscaling service process can be implemented via a horizontal pod auto-scaler. Also, the auto-recovery system will start working once a problematic pod is found.</p>','benefit/spcH3tzNI2gcpWNbpOfCcbVOzD1fltTMqPklB8ll.svg','en','2021-05-21 10:57:11','2021-05-21 10:57:11'),(36,'Konfigurasi fleksibel',18,'<p>Proses layanan autoscalling dapat diimplementasikan melalui horizontal pod autoscaller. Selain itu, sistem pemulihan akan secara otomatis berfungsi jika ditemukan pod yang bermasalah.<br />\r\n&nbsp;</p>','benefit/spcH3tzNI2gcpWNbpOfCcbVOzD1fltTMqPklB8ll.svg','id','2021-05-21 10:57:11','2021-06-04 13:19:14'),(37,'Optimal Management',19,'<p>The platform and infrastructure will be fully managed by Lintasarta Cloudeka professional technicians team who hold international certifications.</p>','benefit/D100nXAYk8IGKczMFMeX7IbjM8niXp7sAsAGuxeQ.svg','en','2021-05-21 10:57:11','2021-05-21 10:57:11'),(38,'Pengelolaan optimal',19,'<p>Platform dan infrastruktur akan dikelola sepenuhnya oleh tim teknisi profesional Lintasarta Cloudeka yang telah bersertifikasi internasional.<br />\r\n&nbsp;</p>','benefit/D100nXAYk8IGKczMFMeX7IbjM8niXp7sAsAGuxeQ.svg','id','2021-05-21 10:57:11','2021-06-04 13:19:14'),(39,'No More Bandwidth Metering',20,'<p>Free shared Internet up to 1 Gbps IIX and 200 Mbps IX or you can choose Lintasarta Internet Dedicated or Lintasarta Metro Ethernet for faster and more stable connections.</p>','benefit/U2we5jgYruFNhGFDvZgKiscE9qXyBNzwC4TPOfwo.svg','en','2021-05-21 10:57:11','2021-05-21 10:57:11'),(40,'Tanpa pengukuran bandwidth',20,'<p>Gratis jaringan Internet yang dapat digunakan antar sesama pengguna dengan bandwidth hingga 1 Gbps IIX dan 200 Mbps IX atau terdapat pilihan jaringan Lintasarta Internet Dedicated atau Lintasarta Metro Ethernet untuk menjaga koneksi lebih stabil.</p>','benefit/U2we5jgYruFNhGFDvZgKiscE9qXyBNzwC4TPOfwo.svg','id','2021-05-21 10:57:11','2021-06-04 13:19:14'),(41,'The Best Choice For Your Needs',21,'<p>Track, detect and monitor all mentions about your brands on digital platforms, conduct competitor analysis, and learn about market trends that suit your business area and field.</p>','benefit/ZN6WnET3NmCp3L19b89xjvYZiBFV1BLDdAYxsaGG.svg','en','2021-05-21 11:05:46','2021-05-21 11:05:46'),(42,'Dari pemasaran brand hingga pengelolaan reputasi',21,'<p>Lacak, deteksi, dan pantau semua hal yang menyebut &nbsp;merek Anda di platform digital, lakukan analisis pesaing, dan pelajari tren pasar yang sesuai dengan area dan bidang bisnis Anda.<br />\r\n&nbsp;</p>','benefit/ZN6WnET3NmCp3L19b89xjvYZiBFV1BLDdAYxsaGG.svg','id','2021-05-21 11:05:46','2021-06-04 13:27:11'),(43,'A Must-Have Data Analysis',22,'<p>Offers a complete analysis ranging from social media and online media analysis, competitor analysis, trend analysis, spatial analysis, sentiment analysis, and influence analysis.</p>','benefit/Go0gzHTDOQ9a5rElhvkDEuLm5vl0Rw54YxO8Ko3G.svg','en','2021-05-21 11:05:46','2021-05-21 11:05:46'),(44,'Analisis data semua yang dibutuhkan',22,'<p>Menawarkan paket analisis lengkap mulai dari analisis media sosial dan media online, analisis pesaing, analisis tren, analisis spasial, analisis sentimen, dan analisis influence.<br />\r\n&nbsp;</p>','benefit/Go0gzHTDOQ9a5rElhvkDEuLm5vl0Rw54YxO8Ko3G.svg','id','2021-05-21 11:05:46','2021-06-04 13:27:11'),(45,'Security And Compliance',23,'<p>Deployed in PCI DSS-certified Cloud which will be annually audited. PCI DSS is a reference to high-quality Service Level Agreement (SLA) and security of crucial customer data that is securely stored on a Cloud server.</p>','benefit/BmenQIqz3MnZsU1a7zbtm86UXdygFJ5bxEkvcl0U.svg','en','2021-05-21 11:05:46','2021-05-21 11:05:46'),(46,'Keamanan dan kepatuhan',23,'<p>Diterapkan dalam Cloud bersertifikat PCI DSS yang akan diaudit setiap tahun. PCI DSS adalah referensi Service Level Agreement (SLA) berkualitas tinggi dan keamanan data pelanggan yang disimpan dengan aman di server Cloud.</p>','benefit/BmenQIqz3MnZsU1a7zbtm86UXdygFJ5bxEkvcl0U.svg','id','2021-05-21 11:05:46','2021-06-04 13:27:11'),(47,'Meticulous Monitoring',24,'<p>Lintasarta IVA is supported by the National Institute of Standards &amp; Technology (NIST) that can recognize 10.000 different people. Its distributed architecture enables the efficient processing of the live video. Furthermore, it can run in inexpensive GPUs, unlike the other software.</p>','benefit/mEalKv7Gu1EdYujdjC3GYhmAeoe6KwRsQY5IRcrP.svg','en','2021-05-21 11:15:17','2021-06-05 06:02:43'),(48,'Pemantauan yang akurat',24,'<p>Lintasarta IVA didukung oleh National Institute of Standards &amp; Technology (NIST) yang dapat mengenali 10.000 orang berbeda. Arsitekturnya yang terdistribusi memungkinkan pemrosesan video langsung yang efisien. Selain itu, ia dapat berjalan di GPU yang murah, tidak seperti perangkat lunak lainnya.</p>','benefit/mEalKv7Gu1EdYujdjC3GYhmAeoe6KwRsQY5IRcrP.svg','id','2021-05-21 11:15:17','2021-06-05 06:04:39'),(49,'Capture All Moments',25,'<p>Lintasarta IVA has all your needs covered from e-Tilang/e-TLE, Tax Violation, Public Area Security, Resource Management, Visitor Management, Retail, Public Transportation, and Traffic Design Reengineering.</p>','benefit/2Rmoloy0oRDhoUPrutXMCuAm26Uuw9X7LGbWNbY2.svg','en','2021-05-21 11:15:17','2021-06-05 06:02:43'),(50,'Pantau segala situasi',25,'<p>Penuhi kebutuhan Anda dengan Lintasarta IVA, mulai dari e-Tilang/e-TLE, Pelanggaran Pajak, Keamanan Area Publik, Manajemen Sumber Daya, Manajemen Pengunjung, Ritel, Transportasi Umum, dan Rekayasa Ulang Desain Lalu Lintas.<br />\r\n&nbsp;</p>','benefit/2Rmoloy0oRDhoUPrutXMCuAm26Uuw9X7LGbWNbY2.svg','id','2021-05-21 11:15:17','2021-06-04 13:33:46'),(51,'Flexible',26,'<p>Lintasarta IVA can be hosted on-premises or in the Cloud, and its compact size makes it the best solution for embedded or edge deployments. Half-in cloud type allows detection to be handled near the camera location.</p>','benefit/qegVCmpQFHONt909ZYv9yGB8XSjJ8RtqpgVbtBLg.svg','en','2021-05-21 11:15:17','2021-05-21 11:15:17'),(52,'Fleksibel',26,'<p>Lintasarta IVA dapat dihosting di lokasi (on-premise) atau di Cloud, dan ukurannya yang kecil menjadikannya solusi terbaik untuk dipasang di mana saja. Jenis Cloud half-in memungkinkan pendeteksian ditangani dari dekat lokasi kamera.<br />\r\n&nbsp;</p>','benefit/qegVCmpQFHONt909ZYv9yGB8XSjJ8RtqpgVbtBLg.svg','id','2021-05-21 11:15:17','2021-06-04 13:33:46'),(53,'Security And Compliance',27,'<p>Deployed in PCI DSS-certified Cloud which will be annually audited. PCI DSS is a reference to high-quality Service Level Agreement (SLA) and security of crucial customer data that is securely stored on a Cloud server.</p>','benefit/iYVeiHBWvnfAaFLBwIIffHgngQLQTa0P2xcOJKWV.svg','en','2021-05-21 11:15:17','2021-05-21 11:15:17'),(54,'Keamanan dan kepatuhan',27,'<p>Diterapkan dalam Cloud bersertifikat PCI DSS yang akan diaudit setiap tahun. PCI DSS adalah referensi Service Level Agreement (SLA) berkualitas tinggi dan keamanan data pelanggan yang disimpan dengan aman di server Cloud.</p>','benefit/iYVeiHBWvnfAaFLBwIIffHgngQLQTa0P2xcOJKWV.svg','id','2021-05-21 11:15:17','2021-06-04 13:33:46'),(55,'Threat Prevention',28,'<p>Protects your network by providing multiple layers of prevention, confronting threats at each phase of the attack. In addition to traditional intrusion-prevention capabilities, we provide the unique ability to detect and block threats on any and all ports.</p>','benefit/tL1va6RL7baBRHDwZfUcPhxlkBC0VuGXCA8HgyrK.svg','en','2021-05-21 11:25:24','2021-05-21 11:25:24'),(56,'Pencegah ancaman',28,'<p>Melindungi jaringan Anda dengan menyediakan beberapa lapis keamanan untuk menghadapi ancaman di setiap fase serangan siber. Selain kemampuan pencegahan serangan tradisional, Lintasarta menyediakan kemampuan unik untuk mendeteksi dan memblokir ancaman di setiap jenis dan semua port.</p>','benefit/tL1va6RL7baBRHDwZfUcPhxlkBC0VuGXCA8HgyrK.svg','id','2021-05-21 11:25:24','2021-06-05 02:55:08'),(57,'URL Filtering',29,'<p>URL filtering limits access by comparing web traffic against a database to prevent employees from accessing harmful sites, such as phishing pages.</p>','benefit/4CSj3djqAnTXHbx8BbylScy0zPtgnl17NQ1Kd4MZ.svg','en','2021-05-21 11:25:24','2021-05-21 11:25:24'),(58,'Pemfilteran URL',29,'<p>Pemfilteran URL membatasi akses dengan membandingkan lalu lintas web dan database untuk mencegah karyawan yang akan mengakses situs berbahaya, seperti halaman phishing.<br />\r\n&nbsp;</p>','benefit/4CSj3djqAnTXHbx8BbylScy0zPtgnl17NQ1Kd4MZ.svg','id','2021-05-21 11:25:24','2021-06-05 02:55:08'),(59,'Application Identification',30,'<p>Application Identification enables you to see the applications on your network and learn how they work, their behavioral characteristics, and their relative risk.</p>','benefit/CQdiXHvQVyFLUQCOZFXzxhbBFvhSXQjwHct3u7Ox.svg','en','2021-05-21 11:25:24','2021-05-21 11:25:24'),(60,'Identifikasi aplikasi',30,'<p>Fitur ini membantu untuk melihat aplikasi di jaringan Anda dan mempelajari cara kerja, karakteristik perilaku, dan risiko relatifnya.<br />\r\n&nbsp;</p>','benefit/CQdiXHvQVyFLUQCOZFXzxhbBFvhSXQjwHct3u7Ox.svg','id','2021-05-21 11:25:24','2021-06-05 02:55:08'),(61,'WildFire',31,'<p>A Cloud-based service that provides malware sandboxing and fully integrates with the vendor&rsquo;s on-premises or Cloud-deployed NGFW line. The NGFW detects anomalies and then sends data to the Cloud service for analysis.</p>','benefit/PiqVYsxSBAQFtbUIcBLLH4j8vbstXsVW3BjoaWvH.svg','en','2021-05-21 11:25:24','2021-05-21 11:25:24'),(62,'WildFire',31,'<p>Layanan berbasis Cloud yang menyediakan sandboxing malware dan sepenuhnya terintegrasi dengan jalur NGFW di lokasi atau yang di-deploy di Cloud milik Anda. NGFW mendeteksi anomali dan kemudian mengirimkan data ke layanan Cloud untuk dianalisis.<br />\r\n&nbsp;</p>','benefit/PiqVYsxSBAQFtbUIcBLLH4j8vbstXsVW3BjoaWvH.svg','id','2021-05-21 11:25:24','2021-06-05 02:55:08'),(63,'Economics Revolution',32,'<p>By paying monthly, you will be free from capital cost to buy the NGFW hardware and software or license and support every year.</p>','benefit/po5hPzLQEtxXS0AjnT6jCPDATQ8zQTHEp7VBfFJV.svg','en','2021-05-21 11:25:24','2021-05-21 11:25:24'),(64,'Economics Revolution',32,'<p>Dengan membayar bulanan, Anda akan terbebas dari biaya modal untuk membeli hardware dan software NGFW atau lisensi dan support setiap tahun.<br />\r\n&nbsp;</p>','benefit/po5hPzLQEtxXS0AjnT6jCPDATQ8zQTHEp7VBfFJV.svg','id','2021-05-21 11:25:24','2021-06-05 02:55:08'),(65,'Monthly Report Analysis',33,'<p>The report will show you the source and target of the attack, severity level from each kind of the attack, most visited applications, and any other analytical report to support you from not getting hacked.</p>','benefit/yGndKQwasfKawsJkElJuq56TMaKOJbdsOByjVz9e.svg','en','2021-05-21 11:25:24','2021-05-21 11:25:24'),(66,'Analisis laporan bulanan',33,'<p>Laporan bulanan akan menunjukkan sumber dan target serangan, tingkat keparahan dari setiap jenis serangan, aplikasi yang paling sering dikunjungi, dan laporan analisis lainnya untuk mendukung Anda agar tidak diretas.<br />\r\n&nbsp;</p>','benefit/yGndKQwasfKawsJkElJuq56TMaKOJbdsOByjVz9e.svg','id','2021-05-21 11:25:24','2021-06-05 02:55:08'),(67,'Reliable Management',34,'<p>With application traffic management, you can have the ability to perform statically and dynamically load balancing to eliminate points of failure. The application proxy will provide an awareness protocol in controlling critical application traffic.</p>','benefit/o2Im2LJtWeNmUElStvijpQdvdtKKHJuCDwWcY9s0.svg','en','2021-05-21 11:32:57','2021-05-21 11:32:57'),(68,'Pengelolaan andal',34,'<p>Dengan pengelolaan lalu lintas aplikasi, Anda dapat memiliki kemampuan untuk melakukan pembagian beban kerja yang seimbang secara statis dan dinamis untuk menghilangkan titik kegagalan. Proxy aplikasi akan memberikan protokol pemberitahuan dalam mengontrol lalu lintas aplikasi kritikal.</p>','benefit/o2Im2LJtWeNmUElStvijpQdvdtKKHJuCDwWcY9s0.svg','id','2021-05-21 11:32:57','2021-06-05 03:01:36'),(69,'Optimal Delivery',35,'<p>Application delivery optimization can significantly improve page load times and user experience by using the HTTP / 2 protocol, caching, compression, F5 TCP Express &trade;, and F5 OneConnect &trade;.</p>','benefit/xE0kbUvFj1v5t4lm6CY4QDRuQDK614jWVtCQ478z.svg','en','2021-05-21 11:32:57','2021-05-21 11:32:57'),(70,'Pengiriman optimal',35,'<p>Optimisasi pengiriman aplikasi dapat secara signifikan meningkatkan waktu pemuatan halaman dan pengalaman pengguna dengan menggunakan protokol HTTP/2, caching, kompresi, F5 TCP Express&trade;, dan F5 OneConnect&trade;.<br />\r\n&nbsp;</p>','benefit/xE0kbUvFj1v5t4lm6CY4QDRuQDK614jWVtCQ478z.svg','id','2021-05-21 11:32:57','2021-06-05 03:01:36'),(71,'Fast And Reliable',36,'<p>Optimizing web-based applications with HTTP / 2 to ensure that customers and application users will always have access to the applications they need at any time.</p>','benefit/mmlcHunNyeAgrviDdQvTzc4Wg1orO6YKQjJhd3Yg.svg','en','2021-05-21 11:32:57','2021-05-21 11:32:57'),(72,'Cepat dan andal',36,'<p>Mengoptimalkan aplikasi berbasis web dengan HTTP/2 untuk memastikan bahwa pelanggan dan pengguna aplikasi akan selalu memiliki akses ke aplikasi yang mereka butuhkan kapan pun.<br />\r\n&nbsp;</p>','benefit/mmlcHunNyeAgrviDdQvTzc4Wg1orO6YKQjJhd3Yg.svg','id','2021-05-21 11:32:57','2021-06-05 03:01:36'),(73,'Programmable Infrastructure',37,'<p>Perform application control, from connection and data traffic to do configuration and management, with the F5 iRules LX, which is the next evolution of network programmability using the Node.js language on the BIG-IP platform.</p>','benefit/GII2HaZroQ2SpYKNEm72EhuhIQi0svMtIQK7ujaa.svg','en','2021-05-21 11:32:57','2021-05-21 11:32:57'),(74,'Infrastruktur yang dapat diprogram',37,'<p>Melakukan kontrol aplikasi, mulai dari koneksi dan lalu lintas data hingga konfigurasi dan manajemen, dengan F5 iRules LX, yang merupakan evolusi berikutnya untuk programabilitas jaringan menggunakan bahasa Node.js pada platform BIG-IP.<br />\r\n&nbsp;</p>','benefit/GII2HaZroQ2SpYKNEm72EhuhIQi0svMtIQK7ujaa.svg','id','2021-05-21 11:32:57','2021-06-05 03:01:36'),(75,'Easy Implementation',38,'<p>Facilitates the implementation and management process, and provides complete visibility into the application.</p>','benefit/KnVKbTlOeat2Vyja8rpyxffI5lBkEBtVSXJUPqRB.svg','en','2021-05-21 11:32:57','2021-05-21 11:32:57'),(76,'Implementasi mudah',38,'<p>Memudahkan dalam proses implementasi dan pengelolaan, serta menyediakan visibilitas yang lengkap ke dalam aplikasi.<br />\r\n&nbsp;</p>','benefit/KnVKbTlOeat2Vyja8rpyxffI5lBkEBtVSXJUPqRB.svg','id','2021-05-21 11:32:58','2021-06-05 03:01:36'),(77,'Monthly Report Analysis',39,'<p>You can view metrics for the application, virtual server, member pool, URL, specific country, and additional detailed statistics about application traffic traveling through the system.</p>','benefit/0nJe7Yghz59Ki4OBiwtqwAvb3tQUkV0FLzo18Ncq.svg','en','2021-05-21 11:32:58','2021-05-21 11:32:58'),(78,'Analisis laporan bulanan',39,'<p>Anda dapat melihat metrik untuk aplikasi, virtual server, pool member, URL, negara tertentu, dan statistik terperinci tambahan tentang lalu lintas aplikasi yang berjalan melalui sistem.</p>','benefit/0nJe7Yghz59Ki4OBiwtqwAvb3tQUkV0FLzo18Ncq.svg','id','2021-05-21 11:32:58','2021-06-05 03:01:36'),(79,'Proactive Bot Protection',40,'<p>Proactively protects applications against bots and various other attack tools. Prevents L7 DDoS attacks, web scraping, and brute-force attacks. Assist in identifying and reducing attacks before causing any damages to the application.</p>','benefit/4y3D4dC8mK9kLfYgCWId3A6RpIY1xkiiswq6zHjR.svg','en','2021-05-21 11:38:25','2021-05-21 11:38:25'),(80,'Perlindungan Bot Proaktif',40,'<p>Secara proaktif melindungi aplikasi terhadap serangan bot dan berbagai alat serangan lainnya. Mencegah serangan DDoS L7, web scraping, dan serangan brute-force. Membantu dalam melakukan identifikasi dan mengurangi serangan sebelum menyebabkan kerusakan pada aplikasi.<br />\r\n&nbsp;</p>','benefit/4y3D4dC8mK9kLfYgCWId3A6RpIY1xkiiswq6zHjR.svg','id','2021-05-21 11:38:25','2021-06-05 06:14:45'),(81,'DataSafe',41,'<p>Protects sensitive information by encrypting data from the time it is in the browser. DataSafe can encrypt data at the application layer to protect against malware and keylogger attacks.</p>','benefit/A6SqCPuIY0a7U0bJOEtbYKJ8Y272yx4Bg8JL62Q3.svg','en','2021-05-21 11:38:25','2021-06-05 06:11:36'),(82,'DataSafe',41,'<p>Melindungi pencurian informasi sensitif dengan melakukan enkripsi data sejak masih di browser. DataSafe dapat melakukan enkripsi data di layer aplikasi untuk melindungi serangan malware dan keylogger.<br />\r\n&nbsp;</p>','benefit/A6SqCPuIY0a7U0bJOEtbYKJ8Y272yx4Bg8JL62Q3.svg','id','2021-05-21 11:38:25','2021-06-05 03:16:00'),(83,'Behavioral DoS',42,'<p>Behavioral DoS can provide automatic protection against DDoS attacks by analyzing data traffic behavior using Machine Learning and data analysis.</p>','benefit/rYCvRNPC2I0kiB5CcuHykuBePV6yErNFAQ6Ncrv7.svg','en','2021-05-21 11:38:25','2021-06-05 06:16:14'),(84,'Behavioral DoS',42,'<p>Behavioral DoS dapat memberikan perlindungan secara otomatis terhadap serangan DDoS dengan menganalisis perilaku lalu lintas data dengan menggunakan Machine Learning dan analisis data.&nbsp;<br />\r\n&nbsp;</p>','benefit/rYCvRNPC2I0kiB5CcuHykuBePV6yErNFAQ6Ncrv7.svg','id','2021-05-21 11:38:25','2021-06-05 06:14:45'),(85,'Maximum Application Protection',43,'<p>Simplify security systems with security policy templates that have been provided, and offer thousands of attack signatures to prevent various types of attacks that exist.</p>','benefit/pUDBVVP8gwRjbPkrGvGtoJmfpBoIqxaOJ2ENvpSE.svg','en','2021-05-21 11:38:25','2021-06-05 06:11:36'),(86,'Perlindungan Aplikasi Maksimal',43,'<p>Menyederhanakan keamanan dengan template kebijakan keamanan yang telah disediakan, dan menyediakan ribuan attack signatures untuk mencegah berbagai jenis serangan yang ada.<br />\r\n&nbsp;</p>','benefit/pUDBVVP8gwRjbPkrGvGtoJmfpBoIqxaOJ2ENvpSE.svg','id','2021-05-21 11:38:25','2021-06-05 06:14:45'),(87,'Multiple Security Applications',44,'<p>Get a comprehensive level of security against attacks at layer 7, cover threats not detected by traditional WAF, and ensure application compliance with existing application standards.</p>','benefit/Xwj013FKoyAjPMmmQimdMUthel1I5yzaEBKrYmhR.svg','en','2021-05-21 11:38:25','2021-05-21 11:38:25'),(88,'Keamanan Ganda Aplikasi',44,'<p>Mendapatkan tingkat keamanan yang komprehensif terhadap serangan di layer 7, menutup ancaman yang tidak terdeteksi oleh WAF tradisional, dan memastikan kesesuaian aplikasi dengan standar aplikasi yang ada.<br />\r\n&nbsp;</p>','benefit/Xwj013FKoyAjPMmmQimdMUthel1I5yzaEBKrYmhR.svg','id','2021-05-21 11:38:25','2021-06-05 06:14:45'),(89,'Monthly Report Analysis',45,'<p>You can view metrics for the application, virtual server, member pool, URL, specific country, and additional detailed statistics about application traffic traveling through the system.</p>','benefit/NVrJaKjdtW31gdohz8cGwRYyvPcBVGbkEH6zQ7tm.svg','en','2021-05-21 11:38:25','2021-05-21 11:38:25'),(90,'Analisis Laporan Bulanan',45,'<p>Anda dapat melihat metrik untuk aplikasi, virtual server, pool member, URL, negara tertentu, dan statistik terperinci tambahan tentang lalu lintas aplikasi yang berjalan melalui sistem.</p>','benefit/NVrJaKjdtW31gdohz8cGwRYyvPcBVGbkEH6zQ7tm.svg','id','2021-05-21 11:38:25','2021-06-05 06:14:45');
/*!40000 ALTER TABLE `benefit_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `benefits`
--

DROP TABLE IF EXISTS `benefits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `benefits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `benefits_product_id_foreign` (`product_id`),
  CONSTRAINT `benefits_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benefits`
--

LOCK TABLES `benefits` WRITE;
/*!40000 ALTER TABLE `benefits` DISABLE KEYS */;
INSERT INTO `benefits` VALUES (1,1,'2021-05-10 22:42:00','2021-05-10 22:42:00'),(2,2,'2021-05-19 07:57:16','2021-05-19 07:57:16'),(3,2,'2021-05-19 07:57:16','2021-05-19 07:57:16'),(4,2,'2021-05-19 07:57:16','2021-05-19 07:57:16'),(5,3,'2021-05-21 07:55:59','2021-05-21 07:55:59'),(6,3,'2021-05-21 07:55:59','2021-05-21 07:55:59'),(7,3,'2021-05-21 07:55:59','2021-05-21 07:55:59'),(8,1,'2021-05-21 08:02:10','2021-05-21 08:02:10'),(9,1,'2021-05-21 08:02:10','2021-05-21 08:02:10'),(10,4,'2021-05-21 10:26:54','2021-05-21 10:26:54'),(11,4,'2021-05-21 10:26:54','2021-05-21 10:26:54'),(12,4,'2021-05-21 10:26:54','2021-05-21 10:26:54'),(13,4,'2021-05-21 10:26:54','2021-05-21 10:26:54'),(14,7,'2021-05-21 10:51:04','2021-05-21 10:51:04'),(15,7,'2021-05-21 10:51:04','2021-05-21 10:51:04'),(16,7,'2021-05-21 10:51:04','2021-05-21 10:51:04'),(17,8,'2021-05-21 10:57:11','2021-05-21 10:57:11'),(18,8,'2021-05-21 10:57:11','2021-05-21 10:57:11'),(19,8,'2021-05-21 10:57:11','2021-05-21 10:57:11'),(20,8,'2021-05-21 10:57:11','2021-05-21 10:57:11'),(21,9,'2021-05-21 11:05:46','2021-05-21 11:05:46'),(22,9,'2021-05-21 11:05:46','2021-05-21 11:05:46'),(23,9,'2021-05-21 11:05:46','2021-05-21 11:05:46'),(24,10,'2021-05-21 11:15:17','2021-05-21 11:15:17'),(25,10,'2021-05-21 11:15:17','2021-05-21 11:15:17'),(26,10,'2021-05-21 11:15:17','2021-05-21 11:15:17'),(27,10,'2021-05-21 11:15:17','2021-05-21 11:15:17'),(28,11,'2021-05-21 11:25:24','2021-05-21 11:25:24'),(29,11,'2021-05-21 11:25:24','2021-05-21 11:25:24'),(30,11,'2021-05-21 11:25:24','2021-05-21 11:25:24'),(31,11,'2021-05-21 11:25:24','2021-05-21 11:25:24'),(32,11,'2021-05-21 11:25:24','2021-05-21 11:25:24'),(33,11,'2021-05-21 11:25:24','2021-05-21 11:25:24'),(34,12,'2021-05-21 11:32:57','2021-05-21 11:32:57'),(35,12,'2021-05-21 11:32:57','2021-05-21 11:32:57'),(36,12,'2021-05-21 11:32:57','2021-05-21 11:32:57'),(37,12,'2021-05-21 11:32:57','2021-05-21 11:32:57'),(38,12,'2021-05-21 11:32:57','2021-05-21 11:32:57'),(39,12,'2021-05-21 11:32:58','2021-05-21 11:32:58'),(40,13,'2021-05-21 11:38:25','2021-05-21 11:38:25'),(41,13,'2021-05-21 11:38:25','2021-05-21 11:38:25'),(42,13,'2021-05-21 11:38:25','2021-05-21 11:38:25'),(43,13,'2021-05-21 11:38:25','2021-05-21 11:38:25'),(44,13,'2021-05-21 11:38:25','2021-05-21 11:38:25'),(45,13,'2021-05-21 11:38:25','2021-05-21 11:38:25');
/*!40000 ALTER TABLE `benefits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calculator_components`
--

DROP TABLE IF EXISTS `calculator_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calculator_components` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_group` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calculator_components`
--

LOCK TABLES `calculator_components` WRITE;
/*!40000 ALTER TABLE `calculator_components` DISABLE KEYS */;
INSERT INTO `calculator_components` VALUES (1,0,'vCPU','vcpu','vCPU','integer','0','Each vCPU speed is 2 GHz','{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 08:16:41','2021-05-31 11:02:30'),(2,0,'vRAM','vram','GB','integer','0',NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 08:16:59','2021-05-31 11:02:37'),(3,0,'Storage Type','storage-type',NULL,'list-with-child','storage',NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 08:34:23','2021-05-31 11:02:43'),(4,3,'SSD Standard','ssd-standard','GB','integer','list-storage-type','include root disk (estimate 20 GB)','{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 08:46:31','2021-05-31 11:00:52'),(5,3,'SSD Premium','ssd-premium','GB','integer','list-storage-type','include root disk (estimate 20 GB)','{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 08:46:58','2021-05-31 11:01:01'),(6,3,'SSD Priority','ssd-priority','GB','integer','list-storage-type','include root disk (estimate 20 GB)','{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 08:48:47','2021-05-31 11:01:08'),(7,0,'Server Name','server-name',NULL,'server_name','0',NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 08:51:33','2021-05-31 11:02:49'),(8,0,'Quantity','quantity',NULL,'integer','0',NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 08:51:52','2021-05-31 11:02:55'),(9,0,'Public IP','public-ip',NULL,'boolean',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:28:24','2021-05-31 11:03:01'),(10,0,'OS Type','os-type',NULL,'list-full',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:28:53','2021-05-31 11:03:07'),(11,10,'CentOS 6.10','centos-610',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:29:50','2021-05-31 10:56:05'),(12,10,'Ubuntu 14.04','ubuntu-1404',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:30:07','2021-05-31 10:56:13'),(13,10,'Win Server 2008 Std.','win-server-2008-std',NULL,'list-item',NULL,NULL,'{\"1-year\": \"360000\", \"3-year\": \"360000\", \"5-year\": \"360000\", \"monthly\": \"360000\", \"pay-as-you-use\": \"360000\"}','2021-05-26 11:30:22','2021-05-31 10:59:15'),(15,10,'RHEL 6.10','rhel-610',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:30:41','2021-05-31 10:56:33'),(16,10,'Custom','custom',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:30:54','2021-05-31 10:56:40'),(17,0,'Monitoring Service','monitoring-service',NULL,'list-full',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:31:17','2021-05-31 11:03:12'),(18,0,'Monitoring Service','monitoring-service',NULL,'list-full',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:31:18','2021-05-31 11:03:18'),(19,17,'None','none',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:31:45','2021-05-31 11:01:44'),(20,17,'Basic','basic',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:32:00','2021-05-31 11:01:51'),(21,17,'Basic','basic',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:32:00','2021-05-31 11:01:59'),(22,17,'Extra','extra',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:32:21','2021-05-31 11:02:08'),(23,17,'Professional','professional',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:32:30','2021-05-31 11:02:15'),(24,17,'Enterprise','enterprise',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:32:41','2021-05-31 11:02:23'),(25,0,'Next Gen Firewall','next-gen-firewall',NULL,'list-full',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:32:58','2021-05-31 11:03:26'),(26,25,'None','none',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-26 11:33:11','2021-05-31 11:01:22'),(27,25,'Specialist','specialist',NULL,'list-item',NULL,NULL,'{\"1-year\": \"750000\", \"3-year\": \"750000\", \"5-year\": \"750000\", \"monthly\": \"750000\", \"pay-as-you-use\": \"750000\"}','2021-05-26 11:33:23','2021-05-31 11:29:21'),(28,25,'Elite','elite',NULL,'list-item',NULL,NULL,'{\"1-year\": \"1250000\", \"3-year\": \"1250000\", \"5-year\": \"1250000\", \"monthly\": \"1250000\", \"pay-as-you-use\": \"1250000\"}','2021-05-26 11:33:36','2021-05-31 11:29:36'),(29,0,'Custom Component','custom-component','GB','integer',NULL,'include root disk (estimate 20 GB)','{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-30 21:22:32','2021-05-31 11:03:32'),(30,10,'Windows Server DC','windows-server-dc',NULL,'list-item',NULL,NULL,'{\"1-year\": \"540000\", \"3-year\": \"540000\", \"5-year\": \"540000\", \"monthly\": \"540000\", \"pay-as-you-use\": \"540000\"}','2021-05-31 10:58:47','2021-05-31 10:58:47'),(31,0,'Commitment Type','commitment-type',NULL,'commitment-type',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-31 11:36:45','2021-05-31 11:36:45'),(32,31,'Pay as You Use','pay-as-you-use',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-31 11:37:10','2021-05-31 11:37:10'),(33,31,'Monthly','monthly',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-31 11:37:28','2021-05-31 11:37:28'),(34,31,'1 Year','1-year',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-31 11:37:50','2021-05-31 11:37:50'),(35,31,'3 Year','3-year',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-31 11:38:08','2021-05-31 11:38:08'),(36,31,'5 Year','5-year',NULL,'list-item',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-31 11:38:26','2021-05-31 11:38:26'),(37,0,'Active DR','active-dr',NULL,'boolean',NULL,NULL,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','2021-05-31 12:03:50','2021-05-31 12:03:50'),(38,0,'VMInstance','vminstance',NULL,'server_quantity',NULL,NULL,'{\"1-year\": 0, \"3-year\": 0, \"5-year\": 0, \"monthly\": 0, \"pay-as-you-use\": 0}','2021-06-01 15:53:06','2021-06-01 15:53:06'),(39,0,'Backup Storage','backup-storage','GB','integer',NULL,NULL,'{\"1-year\": 0, \"3-year\": 0, \"5-year\": 0, \"monthly\": 0, \"pay-as-you-use\": 0}','2021-06-01 15:53:41','2021-06-01 15:53:41');
/*!40000 ALTER TABLE `calculator_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calculator_has_cal_components`
--

DROP TABLE IF EXISTS `calculator_has_cal_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calculator_has_cal_components` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `calculator_id` bigint(20) unsigned NOT NULL,
  `calculator_component_id` bigint(20) unsigned NOT NULL,
  `price` json DEFAULT NULL,
  `other_rules` json DEFAULT NULL,
  `pricing_impact_rules` json DEFAULT NULL,
  `rule_min_value` int(11) DEFAULT NULL,
  `rule_max_value` int(11) DEFAULT NULL,
  `rule_must_be_even` tinyint(4) NOT NULL,
  `rule_editable` tinyint(4) DEFAULT NULL,
  `visible` tinyint(4) DEFAULT 1,
  `display_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calculator_has_cal_components_calculator_id_foreign` (`calculator_id`),
  KEY `calculator_has_cal_components_calculator_component_id_foreign` (`calculator_component_id`),
  CONSTRAINT `calculator_has_cal_components_calculator_component_id_foreign` FOREIGN KEY (`calculator_component_id`) REFERENCES `calculator_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `calculator_has_cal_components_calculator_id_foreign` FOREIGN KEY (`calculator_id`) REFERENCES `calculators` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calculator_has_cal_components`
--

LOCK TABLES `calculator_has_cal_components` WRITE;
/*!40000 ALTER TABLE `calculator_has_cal_components` DISABLE KEYS */;
INSERT INTO `calculator_has_cal_components` VALUES (132,2,7,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,0,1,NULL),(133,2,1,'{\"1-year\": \"285000\", \"3-year\": \"285000\", \"5-year\": \"285000\", \"monthly\": \"285000\", \"pay-as-you-use\": \"285000\"}','null','null',1,32,0,1,1,NULL),(134,2,2,'{\"1-year\": \"150000\", \"3-year\": \"150000\", \"5-year\": \"150000\", \"monthly\": \"150000\", \"pay-as-you-use\": \"150000\"}','null','null',1,128,0,1,1,NULL),(135,2,3,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,0,1,NULL),(136,2,4,'{\"1-year\": \"2650\", \"3-year\": \"2650\", \"5-year\": \"2650\", \"monthly\": \"2650\", \"pay-as-you-use\": \"2650\"}','null','null',20,10000,0,1,1,NULL),(137,2,5,'{\"1-year\": \"3750\", \"3-year\": \"3750\", \"5-year\": \"3750\", \"monthly\": \"3750\", \"pay-as-you-use\": \"3750\"}','null','null',20,10000,0,1,1,NULL),(138,2,6,'{\"1-year\": \"4500\", \"3-year\": \"4500\", \"5-year\": \"4500\", \"monthly\": \"4500\", \"pay-as-you-use\": \"4500\"}','null','null',20,10000,0,0,1,NULL),(139,2,9,'{\"1-year\": \"60000\", \"3-year\": \"60000\", \"5-year\": \"60000\", \"monthly\": \"60000\", \"pay-as-you-use\": \"60000\"}','null','null',NULL,NULL,0,1,1,NULL),(140,2,10,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,1,1,NULL),(141,2,17,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,1,1,NULL),(142,2,25,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','[{\"slug\": \"public-ip\", \"value\": \"true\"}]','null',NULL,NULL,0,1,1,NULL),(143,2,8,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',1,50,0,1,1,NULL),(192,5,7,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,1,1,NULL),(193,5,31,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,1,1,NULL),(194,5,1,'{\"1-year\": \"105000\", \"3-year\": \"96000\", \"5-year\": \"90000\", \"monthly\": \"130000\", \"pay-as-you-use\": \"130000\"}','null','null',1,32,0,0,1,NULL),(195,5,2,'{\"1-year\": \"71000\", \"3-year\": \"65000\", \"5-year\": \"61000\", \"monthly\": \"88000\", \"pay-as-you-use\": \"88000\"}','null','null',1,128,0,0,1,NULL),(196,5,3,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,1,1,NULL),(197,5,4,'{\"1-year\": \"2050\", \"3-year\": \"1789\", \"5-year\": \"1524\", \"monthly\": \"2650\", \"pay-as-you-use\": \"2650\"}','null','null',20,10000,0,1,1,NULL),(198,5,5,'{\"1-year\": \"2906\", \"3-year\": \"2531\", \"5-year\": \"2156\", \"monthly\": \"3750\", \"pay-as-you-use\": \"3750\"}','null','null',20,10000,0,1,1,NULL),(199,5,6,'{\"1-year\": \"3488\", \"3-year\": \"3038\", \"5-year\": \"2588\", \"monthly\": \"4500\", \"pay-as-you-use\": \"4500\"}','null','null',20,10000,0,1,1,NULL),(200,5,9,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,1,1,NULL),(201,5,10,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',NULL,NULL,0,1,1,NULL),(202,5,37,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','[{\"slug\": \"quantity\", \"value\": \"true\", \"action\": [{\"operation\": \"addition\", \"operation_value\": \"250000\"}]}, {\"slug\": \"storage-type\", \"value\": \"true\", \"action\": [{\"operation\": \"multiplication\", \"operation_value\": \"2\"}]}]',NULL,NULL,0,1,1,NULL),(203,5,8,'{\"1-year\": \"0\", \"3-year\": \"0\", \"5-year\": \"0\", \"monthly\": \"0\", \"pay-as-you-use\": \"0\"}','null','null',1,50,0,1,1,NULL),(204,7,38,'{\"1-year\": 0, \"3-year\": 0, \"5-year\": 0, \"monthly\": 0, \"pay-as-you-use\": 0}','null','null',1,100,0,1,1,NULL),(205,7,39,'{\"1-year\": 5000, \"3-year\": 5000, \"5-year\": 5000, \"monthly\": 5000, \"pay-as-you-use\": 5000}','null','null',100,15000,0,1,1,NULL);
/*!40000 ALTER TABLE `calculator_has_cal_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calculators`
--

DROP TABLE IF EXISTS `calculators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calculators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `package_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calculators_product_id_foreign` (`product_id`),
  KEY `calculators_package_id_foreign` (`package_id`),
  CONSTRAINT `calculators_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `calculators_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calculators`
--

LOCK TABLES `calculators` WRITE;
/*!40000 ALTER TABLE `calculators` DISABLE KEYS */;
INSERT INTO `calculators` VALUES (2,1,NULL,'2021-05-26 08:57:07','2021-05-26 08:57:07'),(5,2,1,'2021-05-31 11:46:51','2021-05-31 11:47:11'),(7,3,NULL,'2021-06-01 15:54:53','2021-06-01 15:54:53');
/*!40000 ALTER TABLE `calculators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Askrindo','imgs/logos/askrindo.png','2021-05-10 22:16:56','2021-05-10 22:16:56'),(2,'Ditjen Aptika','uploads/clients/ZCv7XokktdGQ4pPxxEn4794txvX5x3IMMVVVexOl.png','2021-05-10 22:16:56','2021-06-04 10:32:17'),(3,'BKKBN','imgs/logos/bkkbn.png','2021-05-10 22:16:56','2021-05-10 22:16:56'),(4,'PDAM Bandarmasih','uploads/clients/qNuB9H9y28PUtJfxBRUfO9Clmrwgl9BZwtt8LTdf.jpg','2021-05-10 22:16:56','2021-06-05 09:26:29'),(5,'Kemkoninfo','imgs/logos/kemkoninfo.png','2021-05-10 22:16:56','2021-05-10 22:16:56'),(6,'Pertamina','imgs/logos/pertamina.png','2021-05-10 22:16:56','2021-05-10 22:16:56'),(7,'KSO Sucofindo','imgs/logos/sucofindo.png','2021-05-10 22:16:56','2021-06-04 11:21:07'),(8,'PGN','imgs/solutions/pgn.png','2021-05-10 22:16:56','2021-05-10 22:16:56'),(9,'CRIF','imgs/solutions/crif.png',NULL,NULL),(10,'Yakult','imgs/solutions/yakult.png',NULL,NULL),(11,'OJK','imgs/solutions/ojk.png',NULL,NULL),(12,'Diskominfo Pemkab Pinrang','imgs/solutions/diskominfo-pinang.png',NULL,'2021-06-05 02:34:22'),(13,'Diskominfo Pemkab Langkat','imgs/solutions/langkat.png',NULL,'2021-06-05 02:33:45'),(14,'Pemerintah Provinsi Kalimantan Utara','imgs/solutions/kementrian-kalimanan-utara.png',NULL,'2021-06-05 02:35:10'),(15,'BAKTI','uploads/clients/kPO7cg7rp3s3wfMgwcxxAfLvM7sLTo0spblT4yjK.png','2021-06-04 07:25:38','2021-06-04 07:25:38'),(16,'Microsoft','uploads/clients/2ygN8TwMkX7zyKra97XH7n2a7Fmd6D0XC0qtmxbP.png','2021-06-04 12:25:54','2021-06-04 12:25:54'),(17,'PHSS','uploads/clients/V2ocRxNA1Oo5gXy6rZmXixOvylTOyx4tuL0hz23V.png','2021-06-04 12:34:02','2021-06-04 12:34:02'),(18,'Saka','uploads/clients/wng33yjNGsfrMdY6pIuyTiU0he2KSAMlO4BGikDI.png','2021-06-04 12:35:54','2021-06-04 12:35:54'),(19,'Jakarta Smart City','uploads/clients/IaUeT712I7BC1yXz65hoLX0y9bujYLxOcrCD1m6D.png','2021-06-05 02:42:09','2021-06-05 02:42:09'),(20,'Diskominfo Pemkab Mimika','uploads/clients/hdIcCbX4MqTEtD5nUPtxKctIXR5n2AxHfQjN3XV6.png','2021-06-05 02:44:42','2021-06-05 02:44:42'),(21,'Indosat','uploads/clients/iXMDe2aAJ7O6nIBb9lGG7vrhAthnq3Vq1YxYQb7G.png','2021-06-05 03:04:57','2021-06-05 03:04:57'),(22,'Komisi Pemilihan Umum','uploads/clients/NMLakLOYAauJUgHwT4PRn8OC90is73ScWqNgoLbb.png','2021-06-05 03:08:16','2021-06-05 03:08:16'),(23,'Pelindo IV','uploads/clients/zXCtlVUKj5OG4Y9Vj9C2l4mJCLRFzLKgbiBznUpR.png','2021-06-05 03:09:04','2021-06-05 03:09:04'),(24,'Johns Hopkins University','uploads/clients/ci91fUeVA4MiEiKj8w1Y1PH4cwXwBEA9ASYZHncz.png','2021-06-05 03:09:31','2021-06-05 03:09:31');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_settings`
--

DROP TABLE IF EXISTS `content_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentable_id` bigint(20) unsigned NOT NULL,
  `field_title` tinyint(4) NOT NULL DEFAULT '0',
  `field_title_label` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT 'Title',
  `field_subtitle` tinyint(4) NOT NULL DEFAULT '0',
  `field_subtitle_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Subtitle',
  `field_excerpt` tinyint(4) NOT NULL DEFAULT '0',
  `field_excerpt_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Excerpt',
  `field_description` tinyint(4) NOT NULL DEFAULT '0',
  `field_description_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_image_1` tinyint(4) NOT NULL DEFAULT '0',
  `field_image_1_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Image 1',
  `field_image_2` tinyint(4) NOT NULL DEFAULT '0',
  `field_image_2_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Image 2',
  `field_vide_1` tinyint(4) NOT NULL DEFAULT '0',
  `field_vide_1_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Video',
  `field_sliders` tinyint(4) NOT NULL DEFAULT '0',
  `field_sliders_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Sliders',
  `field_cta` tinyint(4) NOT NULL DEFAULT '0',
  `field_cta_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Button',
  `other_field` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_settings_contentable_type_contentable_id_index` (`contentable_type`,`contentable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_settings`
--

LOCK TABLES `content_settings` WRITE;
/*!40000 ALTER TABLE `content_settings` DISABLE KEYS */;
INSERT INTO `content_settings` VALUES (1,'module',1,1,'Title',1,'Subtitle',1,'Excerpt',1,'Description',1,'Logo',1,'Super Graphic',0,'Video',0,'Sliders',0,'Button',NULL,NULL,NULL),(2,'module',2,1,'Title',0,'Subtitle',0,'Excerpt',1,'Description',1,'Cover',0,'Super Graphic',0,'Video',0,'Sliders',0,'Button',NULL,NULL,NULL),(3,'module',3,1,'Title',0,'Subtitle',0,'Excerpt',1,'Description',1,'Logo',0,'Super Graphic',0,'Video',0,'Sliders',0,'Button',NULL,NULL,NULL),(4,'module',4,1,'Title',0,'Subtitle',1,'Tahun',1,'Description',1,'Images',0,'Super Graphic',0,'Video',0,'Sliders',0,'Button',NULL,NULL,NULL),(5,'module',5,1,'State',0,'Subtitle',1,'Address',0,'Description',0,'Images',0,'Super Graphic',0,'Video',0,'Sliders',0,'Button',NULL,NULL,NULL),(6,'module',6,1,'Title',0,'Subtitle',0,'Excerpt',0,'Description',0,'Images',0,'Super Graphic',0,'Video',0,'Sliders',0,'Button',NULL,NULL,NULL),(7,'module',7,1,'Title',0,'Subtitle',0,'Excerpt',0,'Description',0,'Images',0,'Super Graphic',0,'Video',0,'Sliders',0,'Button',NULL,NULL,NULL);
/*!40000 ALTER TABLE `content_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentation_translations`
--

DROP TABLE IF EXISTS `documentation_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentation_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `documentation_id` bigint(20) unsigned NOT NULL,
  `lang` char(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documentation_translations_documentation_id` (`documentation_id`),
  CONSTRAINT `documentation_translations_documentation_id` FOREIGN KEY (`documentation_id`) REFERENCES `documentations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentation_translations`
--

LOCK TABLES `documentation_translations` WRITE;
/*!40000 ALTER TABLE `documentation_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentation_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentations`
--

DROP TABLE IF EXISTS `documentations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` bigint(20) unsigned DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documentations_parent_id` (`parent_id`),
  KEY `documentations_product_category_id` (`product_category_id`),
  CONSTRAINT `documentations_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `documentations` (`id`),
  CONSTRAINT `documentations_product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentations`
--

LOCK TABLES `documentations` WRITE;
/*!40000 ALTER TABLE `documentations` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dynamic_content_translations`
--

DROP TABLE IF EXISTS `dynamic_content_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dynamic_content_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dynamic_content_id` bigint(20) unsigned NOT NULL,
  `author_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_1` text COLLATE utf8mb4_unicode_ci,
  `image_2` text COLLATE utf8mb4_unicode_ci,
  `video_1` text COLLATE utf8mb4_unicode_ci,
  `sliders` text COLLATE utf8mb4_unicode_ci,
  `cta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dynamic_content_translations_dynamic_content_id_lang_unique` (`dynamic_content_id`,`lang`),
  KEY `dynamic_content_translations_lang_index` (`lang`),
  CONSTRAINT `dynamic_content_translations_dynamic_content_id_foreign` FOREIGN KEY (`dynamic_content_id`) REFERENCES `dynamic_contents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dynamic_content_translations`
--

LOCK TABLES `dynamic_content_translations` WRITE;
/*!40000 ALTER TABLE `dynamic_content_translations` DISABLE KEYS */;
INSERT INTO `dynamic_content_translations` VALUES (1,1,1,'SAKA, Success Stories','SAKA','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>','uploads/pbNHOHUOhZyz7uODsTNiOjSdxOKrqscOnB0ahb7g.png','imgs/pertamina.png',NULL,NULL,NULL,NULL,'id',NULL,'2021-06-05 06:45:29'),(2,1,1,'SAKA, Success Stories','SAKA','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>','uploads/pbNHOHUOhZyz7uODsTNiOjSdxOKrqscOnB0ahb7g.png','imgs/pertamina.png',NULL,NULL,NULL,NULL,'en',NULL,'2021-06-05 06:45:01'),(3,2,1,'PHSS, Success Stories','Kemkominfo','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>','uploads/bTyceklrkwRG06aIbksV332XvMmLexbQwJMpCUta.png','imgs/pertamina.png',NULL,NULL,NULL,NULL,'en',NULL,'2021-06-05 06:45:52'),(4,2,1,'PHSS, Success Stories','Kemkominfo','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>','imgs/logos/kemkoninfo.png','imgs/pertamina.png',NULL,NULL,NULL,NULL,'id',NULL,'2021-06-05 06:45:52'),(5,3,1,'Sucofindo, Success Stories','Sucofindo','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>','uploads/QO2en0fuTeDuGNzUzRI3PmZYkFcWuYQtf5FjmUaO.png','imgs/pertamina.png',NULL,NULL,NULL,NULL,'en',NULL,'2021-06-05 06:46:58'),(6,3,1,'Sucofindo, Success Stories','Sucofindo','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>','uploads/QO2en0fuTeDuGNzUzRI3PmZYkFcWuYQtf5FjmUaO.png','imgs/pertamina.png',NULL,NULL,NULL,NULL,'id',NULL,'2021-06-05 06:46:58'),(7,4,1,'2020',NULL,NULL,'<h3>Launched GPU as a Service</h3>','uploads/NpFiPhzcxluXFHvrmkvPn8KAOjYYHuNBrBrdfonz.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-05-11 21:53:29','2021-06-05 09:13:36'),(8,4,1,'2020',NULL,NULL,'<h3>Peluncuran layanan GPU as a Service</h3>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-11 21:53:29','2021-06-05 03:42:41'),(9,5,1,'2019',NULL,NULL,'<div class=\"my-auto px-4\">\r\n<p>The first Indonesia&#39;s Cloud Provider to receive the PCI DSS Certification (Data Center Services)</p>\r\n\r\n<p>Launched several services such as Container as a Service, Intelligent Video Analytics, Security Operation Center, and DDoS</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>','uploads/Fbe6zmb41a9zbcuioe1WN1aqqKEzcrfSI3vF1km3.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-05-11 21:54:08','2021-06-05 09:18:03'),(10,5,1,'2019',NULL,NULL,'<div class=\"my-auto px-4\">\r\n<p>Cloud Provider Indonesia Pertama yang berhasil menerima PCI DSS Certified&nbsp;(Data Center Services)</p>\r\n\r\n<p>Peluncuran layanan Container as a Service, Intelligent Video Analytics, Security Operation Center, &nbsp;dan DDoS</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-11 21:54:08','2021-06-05 09:15:32'),(11,6,1,'ISO 27001',NULL,NULL,'<p>Information Security Management System.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-05-11 21:57:25','2021-06-05 06:23:52'),(12,6,1,'ISO 27001',NULL,NULL,'<p>Information Security Management System.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-11 21:57:25','2021-06-05 06:24:04'),(13,7,1,'ISO 14001',NULL,NULL,'<p>Environment Management System.</p>','uploads/CTmKINQ0J2bqsoO3gRaqdU11CSGtGOJJxmRijarI.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-05-11 22:01:09','2021-06-05 06:23:58'),(14,7,1,'ISO 14001',NULL,NULL,'<p>Environment Management System.</p>','C:\\Users\\Cyber-art\\AppData\\Local\\Temp\\php6346.tmp',NULL,NULL,NULL,NULL,NULL,'id','2021-05-11 22:01:09','2021-06-05 06:24:12'),(15,8,1,'2019 - the 12th Annual Datacloud Global Awards',NULL,'2019','<p>Shortlisted into Top 4 in the 12th Annual Datacloud Global Awards 2019 for Data Center for Smart City Award and Excellence in Regional Data Center Award (Asia-Pasific) categories</p>','uploads/qsBMLzOUGsffktmkoCXSmjfAmUfhcmPs2MRC2JOC.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-05-11 00:00:00','2021-06-07 08:56:37'),(16,8,1,'2019',NULL,'2019','<p>- Shortlisted into Top 4 in the 12th Annual Datacloud Global Awards 2019 for Data Center for Smart City Award and Excellence in Regional Data Center Award (Asia-Pasific) categories<br />\r\n- Best IT &amp; Data Tech Governance for Data Center and Cloud services in the 2019 Data Technology Governance, AI and Analytics Summit &amp; Awards<br />\r\n- Best Practices Award for Indonesia&#39;s Cloud Infrastructure Services Provider of the Year from Frost &amp; Sullivan&nbsp;</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-11 22:25:35','2021-06-05 06:28:54'),(17,9,1,'2018 - Best Improved Data Technology',NULL,'2018','<p>Best Improved Data Technology Governance &amp; AI (Data Center &amp; Cloud) from Data Technology Governance, AI &amp; Analytics Award.</p>','uploads/q3W68Y50UQgxTjL1KUIFNQXnyB2azkIZpp50A27T.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-05-11 00:00:00','2021-06-07 08:58:02'),(18,9,1,'2018',NULL,'2018','<p>- Best Improved Data Technology Governance &amp; AI (Data Center &amp; Cloud) from Data Technology Governance, AI &amp; Analytics Award.<br />\r\n- TOP IT &amp; Telco 2018 for TOP Data Communication 2018, TOP Data Center 2018, and TOP Cloud 2018 category.<br />\r\n- Asia Pacific Best Practices Awards for Data Center Service Provider of The Year from Frost &amp; Sullivan.</p>','C:\\Users\\Cyber-art\\AppData\\Local\\Temp\\phpC906.tmp',NULL,NULL,NULL,NULL,NULL,'id','2021-05-11 22:26:42','2021-06-05 06:29:58'),(19,10,1,'2017 - The Best Cloud Service Provider',NULL,'2017','<p>The Best Cloud Service Provider from Top IT &amp; Telco Award</p>','uploads/xF19xp2kmjrc4Gr4TRA0f7D5h9KDw38OGRSjppya.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-05-11 00:00:00','2021-06-07 08:58:23'),(20,10,1,'2017',NULL,'2017','<p>- The Best Cloud Service Provider from Top IT &amp; Telco Award<br />\r\n- Telco Data Center &amp; Cloud Service Provider of the Year from Frost &amp; Sullivan Indonesia Excellence Award.<br />\r\n- Finalist of DataCloud Asia Awards for Data Center Technical Breakthrough.<br />\r\n- Service Quality Golden Award 2017 for Data Center Corporate Customers Category.<br />\r\n- Telco Cloud Service Provider of the Year from Frost &amp; Sullivan Indonesia Excellence Award.<br />\r\n- Asia Pacific Best Practices Awards for Data Center Service Provider of The Year from Frost &amp; Sullivan.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-11 22:45:27','2021-06-05 06:31:14'),(21,11,1,'Banda Aceh',NULL,'Jl. Prof. Dr. Moch. Hasan,<br>\r\n                    Simpang Surabaya,<br>\r\n                    Banda Aceh<br>\r\n                    T: +62651 651 1677<br>\r\n                    F: +62651 755 1676<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-05-23 01:54:29','2021-05-23 01:59:08'),(22,11,1,'Banda Aceh',NULL,'Jl. Prof. Dr. Moch. Hasan,\r\n                    Simpang Surabaya,\r\n                    Banda Aceh\r\n                    T: +62651 651 1677\r\n                    F: +62651 755 1676',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-23 01:54:29','2021-05-23 01:58:12'),(23,12,1,'Bandung',NULL,'Jl. Ciung Wanara No.6,<br>\r\n                    Bandung 40132<br>\r\n                    T: +6222 251 5606<br>\r\n                    F: +6222 250 3686<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-05-23 01:59:39','2021-05-23 01:59:39'),(24,12,1,'Bandung',NULL,'Jl. Ciung Wanara No.6,<br>\r\n                    Bandung 40132<br>\r\n                    T: +6222 251 5606<br>\r\n                    F: +6222 250 3686<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-23 01:59:39','2021-05-23 01:59:39'),(25,13,1,'Tegal',NULL,'Jl. Gatot Subroto No.17 A RT 03/02, Debong Kulon,<br>\r\n                    Tegal 52133<br>\r\n                    T: +62815 770 7233<br>\r\n                    F: +62283 352 798<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-05-23 02:00:11','2021-05-23 02:00:11'),(26,13,1,'Tegal',NULL,'Jl. Gatot Subroto No.17 A RT 03/02, Debong Kulon,<br>\r\n                    Tegal 52133<br>\r\n                    T: +62815 770 7233<br>\r\n                    F: +62283 352 798<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-23 02:00:11','2021-05-23 02:00:11'),(27,14,1,'Surabaya',NULL,'Raya Darmo Square Kav. R-9,<br>\r\n                    Jl. Raya Darmo 54 - 56,<br>\r\n                    Surabaya 60264<br>\r\n                    T: +6231 567 9456<br>\r\n                    F: +6231 567 9455<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-05-23 02:00:39','2021-05-23 02:00:39'),(28,14,1,'Surabaya',NULL,'Raya Darmo Square Kav. R-9,<br>\r\n                    Jl. Raya Darmo 54 - 56,<br>\r\n                    Surabaya 60264<br>\r\n                    T: +6231 567 9456<br>\r\n                    F: +6231 567 9455<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-23 02:00:39','2021-05-23 02:00:39'),(29,15,1,'Denpasar',NULL,'Pertokoan Teuku Umar, Blok B/12, Jl. Teuku Umar No 8, Denpasar<br>\r\n                    T: +62361 229 190<br>\r\n                    F: +62361 242 82<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-05-23 02:01:11','2021-05-23 02:01:11'),(30,15,1,'Denpasar',NULL,'Pertokoan Teuku Umar, Blok B/12, Jl. Teuku Umar No 8, Denpasar<br>\r\n                    T: +62361 229 190<br>\r\n                    F: +62361 242 82<br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-23 02:01:11','2021-05-23 02:01:11'),(31,16,1,'Makassar',NULL,'Jl. Pendidikan F1 No.2,<br>\r\n                    Makassar<br>\r\n                    T: +62411 861 555<br>\r\n                    F: +62411 861 554',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-05-23 02:01:53','2021-05-23 02:01:53'),(32,16,1,'Makassar',NULL,'Jl. Pendidikan F1 No.2,<br>\r\n                    Makassar<br>\r\n                    T: +62411 861 555<br>\r\n                    F: +62411 861 554',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-23 02:01:53','2021-05-23 02:01:53'),(33,17,1,'Malang',NULL,'Jl. Soekarno Hatta A 5a,<br>\r\n                    Malang<br>\r\n                    T: +62341 404 367<br>\r\n                    F: +62341 404 367',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-05-23 02:02:21','2021-05-23 02:02:21'),(34,17,1,'Malang',NULL,'Jl. Soekarno Hatta A 5a,<br>\r\n                    Malang<br>\r\n                    T: +62341 404 367<br>\r\n                    F: +62341 404 367',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-05-23 02:02:21','2021-05-23 02:02:21'),(35,18,1,'2018',NULL,NULL,'<h3>Launched New Tier 3 Facility Certified Data Center</h3>','uploads/6QY6tAqsRB1LoqlXrVOiuWOakaJS3iUlQCEQRd4s.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-02 00:03:53','2021-06-05 09:16:54'),(36,18,1,'2018',NULL,NULL,'<h3>- Peluncuran New Tier 3 Facility Certified Data Center</h3>','uploads/6QY6tAqsRB1LoqlXrVOiuWOakaJS3iUlQCEQRd4s.jpg',NULL,NULL,NULL,NULL,NULL,'id','2021-06-02 00:03:53','2021-06-05 03:44:27'),(37,19,1,'2015',NULL,NULL,'<h3>Received ISO 20000 certification &ndash; IT service Management</h3>','uploads/vGzIPfHFVe7Ee0qDRAXuQddRFuCkK8TnwBl3yLwK.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-02 00:05:13','2021-06-05 09:15:44'),(38,19,1,'2015',NULL,NULL,'<h3>Bersertifikasi ISO 20000 &ndash; IT service Management</h3>','uploads/vGzIPfHFVe7Ee0qDRAXuQddRFuCkK8TnwBl3yLwK.jpg',NULL,NULL,NULL,NULL,NULL,'id','2021-06-02 00:05:13','2021-06-05 03:44:50'),(39,20,1,'2011',NULL,NULL,'<h3>Launched Lintasarta Cloud services</h3>','uploads/zb30HFewnK2VXylBgXhm9PjwwL4Yhh6bTrUfJNTl.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-02 00:06:02','2021-06-05 09:15:58'),(40,20,1,'2011',NULL,NULL,'<h3>Peluncuruan layanan Cloud</h3>','uploads/zb30HFewnK2VXylBgXhm9PjwwL4Yhh6bTrUfJNTl.jpg',NULL,NULL,NULL,NULL,NULL,'id','2021-06-02 00:06:02','2021-06-05 03:45:19'),(41,21,1,'2008',NULL,NULL,'<p>The first telecommunications company to receive the ISO 27001-2005 security certification</p>\r\n\r\n<p>Launched Lintasarta Data Center services</p>','uploads/J13WxCNsKTpuzyrlPAOYaZeDTpdYGyUf0wuPnTI1.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-02 00:07:19','2021-06-05 09:16:20'),(42,21,1,'2008',NULL,NULL,'<p>- Perusahaan telekomunikasi pertama yang menerima sertifikasi keamanan ISO 27001-2005&nbsp;<br />\r\n- Peluncuran layanan Data Center</p>','uploads/J13WxCNsKTpuzyrlPAOYaZeDTpdYGyUf0wuPnTI1.jpg',NULL,NULL,NULL,NULL,NULL,'id','2021-06-02 00:07:19','2021-06-05 03:45:54'),(45,23,1,'ISO 20000-1',NULL,NULL,'<p>Information Technology Service Management System.</p>','uploads/NQRxt0KNAdn60DrtCwkGnjYfGXhUZQcCxb1ws2my.png',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 03:57:10','2021-06-05 08:59:22'),(46,23,1,'ISO 20000-1',NULL,NULL,'<p>Information Technology Service Management System.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 03:57:10','2021-06-05 06:24:17'),(47,24,1,'ISO 9001',NULL,NULL,'<p>Quality Management System.</p>','uploads/1UVvZNvflJDfwLyRdn2Tpxt9Hwdgfp2MLnkiVaHd.png',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 03:57:34','2021-06-05 09:02:23'),(48,24,1,'ISO 9001',NULL,NULL,'<p>Quality Management System.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 03:57:34','2021-06-05 06:24:24'),(49,25,1,'ISO 45001',NULL,NULL,'<p>Occupational Health and Safety Management System.</p>','uploads/2tkUBZzFi2bykIZd6N30o06ZbqV4NcQl4nPSlv1u.png',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 03:57:59','2021-06-05 09:07:30'),(50,25,1,'ISO 45001',NULL,NULL,'<p>Occupational Health and Safety Management System.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 03:57:59','2021-06-05 06:24:36'),(51,26,1,'SMK3 PP 50/2012',NULL,NULL,'<p>Occupational Safety &amp; Health Management System.</p>','uploads/QzvfXrtfflvVje5vGLqX1um2nI12cBe6KqDBl7bq.png',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 03:58:25','2021-06-05 09:08:26'),(52,26,1,'SMK3 PP 50/2012',NULL,NULL,'<p>Occupational Safety &amp; Health Management System.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 03:58:25','2021-06-05 06:24:30'),(53,27,1,'Cisco Partner',NULL,NULL,'<p>Capabilities with agile cloud and managed services that are part of the world.</p>','uploads/ZVDeAtVvc7csBny3m45aRxPxnZeDSy39AyAb5PyP.png',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 03:58:53','2021-06-05 09:20:17'),(54,27,1,'Cisco Partner',NULL,NULL,'<p>Capabilities with agile cloud and managed services that are part of the world</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 03:58:53','2021-06-05 03:58:53'),(55,28,1,'PCI DSS',NULL,NULL,'<p>Service Provider Compliance with Payment Card Industry Data Security Standard.</p>','uploads/FaSTiWaC8tHX0uD5hfNYzvWObjzKRH1jJh4y5zHV.png',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 03:59:24','2021-06-05 09:10:22'),(56,28,1,'PCI DSS',NULL,NULL,'<p>Service Provider Compliance with Payment Card Industry Data Security Standard.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 03:59:24','2021-06-05 06:24:48'),(57,29,1,'Uptime Institute Certified',NULL,NULL,'<p>Tier 3 Design &amp; Facility Data Center.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 03:59:44','2021-06-05 06:25:28'),(58,29,1,'Uptime Institute Certified',NULL,NULL,'<p>Tier 3 Design &amp; Facility Data Center.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 03:59:44','2021-06-05 06:25:41'),(59,30,1,'Logrhythm Security Services Authorized',NULL,NULL,'<p>Certified to Managed Security Operation Center, 24x7.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 04:00:09','2021-06-05 06:26:18'),(60,30,1,'Logrhythm Security Services Authorized',NULL,NULL,'<p>Certified to Managed Security Operation Center, 24x7.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 04:00:09','2021-06-05 06:26:46'),(61,31,1,'KFC, Success Stories','KFC','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>','uploads/TMTHUbacKDKFUoBpxLbFc5wovrbpmhGSGxWFxhtp.png',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 06:48:35','2021-06-05 06:48:35'),(62,31,1,'KFC, Success Stories','KFC','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>','uploads/TMTHUbacKDKFUoBpxLbFc5wovrbpmhGSGxWFxhtp.png',NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 06:48:35','2021-06-05 06:48:35'),(63,32,1,'Kalbe Farma, Success Stories','Kalbe Farma','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>','uploads/fnEmXUCGfc8suS4R1cJaZO62R3hjYIHDLpYyiuwl.png',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 06:50:34','2021-06-05 06:50:34'),(64,32,1,'Kalbe Farma, Success Stories','Kalbe Farma','Labore Et Dolore, Magna Aliqua','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>','uploads/fnEmXUCGfc8suS4R1cJaZO62R3hjYIHDLpYyiuwl.png',NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 06:50:34','2021-06-05 06:50:34'),(65,33,1,'2019 - Best IT & Data Tech',NULL,'2019','<p>Best IT &amp; Data Tech Governance for Data Center and Cloud services in the 2019 Data Technology Governance, AI and Analytics Summit &amp; Awards<br />\r\n&nbsp;</p>','uploads/2VUU6L5gYeeJxnN9qA1jYrNlalHeygeapvPxJMOG.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 10:11:59'),(66,33,1,'2019 - Best IT & Data Tech',NULL,'2019','<p>Best IT &amp; Data Tech Governance for Data Center and Cloud services in the 2019 Data Technology Governance, AI and Analytics Summit &amp; Awards<br />\r\n&nbsp;</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:45:20','2021-06-05 08:45:20'),(67,34,1,'2019 - Best Practices Award for Indonesia\'s Cloud',NULL,'2019','<p>Best Practices Award for Indonesia&#39;s Cloud Infrastructure Services Provider of the Year from Frost &amp; Sullivan&nbsp;</p>','uploads/sXolIhEjyDF6Uf4Pb01w0bjgNtYlkAH1SPPDfCjY.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 08:59:40'),(68,34,1,'2019 - Best Practices Award for Indonesia\'s Cloud',NULL,'2019','<p>Best Practices Award for Indonesia&#39;s Cloud Infrastructure Services Provider of the Year from Frost &amp; Sullivan&nbsp;</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:46:31','2021-06-05 08:46:31'),(69,35,1,'2018  - TOP IT & Telco 2018',NULL,'2018','<p>TOP IT &amp; Telco 2018 for TOP Data Communication 2018, TOP Data Center 2018, and TOP Cloud 2018 category.</p>','uploads/VDtPgNRlKrnYirSFR0PlzfCD76oHULUxwnhMGxbW.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 09:01:35'),(70,35,1,'2018  - TOP IT & Telco 2018',NULL,'2018','<p>TOP IT &amp; Telco 2018 for TOP Data Communication 2018, TOP Data Center 2018, and TOP Cloud 2018 category.<br />\r\n- Asia Pacific Best Practices Awards for Data Center Service Provider of The Year from Frost &amp; Sullivan.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:50:59','2021-06-05 08:50:59'),(71,36,1,'2018 - Asia Pacific Best Practices Awards',NULL,'2018','<p>Asia Pacific Best Practices Awards for Data Center Service Provider of The Year from Frost &amp; Sullivan.</p>','uploads/2nZh851kkgK6tcbSMNhKj7jXKUopyNDo57Z3j7jl.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 09:01:47'),(72,36,1,'2018 - Asia Pacific Best Practices Awards',NULL,'2018','<p>Asia Pacific Best Practices Awards for Data Center Service Provider of The Year from Frost &amp; Sullivan.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:51:41','2021-06-05 08:51:41'),(73,37,1,'2017 - Frost & Sulivan Indonesia Exellence Award',NULL,'2017','<p>Telco Data Center &amp; Cloud Service Provider of the Year from Frost &amp; Sullivan Indonesia Excellence Award.<br />\r\n&nbsp;</p>','uploads/KCNjAwXxxKnLeaWvQ5EyVjulAPpOHMFKnASV0BtW.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 09:02:04'),(74,37,1,'2017 - Frost & Sulivan Indonesia Exellence Award',NULL,'2017','<p>Telco Data Center &amp; Cloud Service Provider of the Year from Frost &amp; Sullivan Indonesia Excellence Award.<br />\r\n&nbsp;</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:54:09','2021-06-05 08:54:09'),(75,38,1,'2017 - DataCloud Asia Awards',NULL,'2017','<p>Finalist of DataCloud Asia Awards for Data Center Technical Breakthrough.<br />\r\n&nbsp;</p>','uploads/RWCQ4La92ZmxPlvzutv7crzS8ul3mHCMeUhyc3ku.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 09:02:29'),(76,38,1,'2017 - DataCloud Asia Awards',NULL,'2017','<p>Finalist of DataCloud Asia Awards for Data Center Technical Breakthrough.<br />\r\n&nbsp;</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:55:08','2021-06-05 08:55:08'),(77,39,1,'2017 - Service Quality Golden Award 2017',NULL,'2017','<p>Service Quality Golden Award 2017 for Data Center Corporate Customers Category.<br />\r\n&nbsp;</p>','uploads/b27NoCvvuDWUR3aRcLTFCfDmkfX1WDn1oapaPXnY.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 09:02:40'),(78,39,1,'2017 - Service Quality Golden Award 2017',NULL,'2017','<p>Service Quality Golden Award 2017 for Data Center Corporate Customers Category.<br />\r\n&nbsp;</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:55:38','2021-06-05 08:55:38'),(79,40,1,'2017 - Frost & Sullivan Indonesia Excellence Award',NULL,'2017','<p>Telco Cloud Service Provider of the Year from Frost &amp; Sullivan Indonesia Excellence Award.<br />\r\n&nbsp;</p>','uploads/et97hZFhKEJvG0fa4XAkg8YaDp434KCzysgoaLJq.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 09:03:59'),(80,40,1,'2017 - Frost & Sullivan Indonesia Excellence Award',NULL,'2017','<p>Telco Cloud Service Provider of the Year from Frost &amp; Sullivan Indonesia Excellence Award.<br />\r\n&nbsp;</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:56:21','2021-06-05 08:56:21'),(81,41,1,'2017 - Asia Pacific Best Practices Awards',NULL,'2017','<p>Asia Pacific Best Practices Awards for Data Center Service Provider of The Year from Frost &amp; Sullivan.</p>','uploads/LD0PtvkVZEpBrUl4bVsuT064vtdfgODD9G5cspCr.jpg',NULL,NULL,NULL,NULL,NULL,'en','2021-06-05 00:00:00','2021-06-07 09:04:13'),(82,41,1,'2017 - Asia Pacific Best Practices Awards',NULL,'2017','<p>Asia Pacific Best Practices Awards for Data Center Service Provider of The Year from Frost &amp; Sullivan.</p>',NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-05 08:57:25','2021-06-05 08:57:25'),(83,42,1,'Blog Lintasarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-06-06 18:44:04','2021-06-06 18:44:04'),(84,42,1,'Blog Lintasarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-06 18:44:04','2021-06-06 18:44:04'),(85,43,1,'Need 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en','2021-06-07 05:07:48','2021-06-07 05:07:48'),(86,43,1,'Need 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id','2021-06-07 05:07:48','2021-06-07 05:07:48');
/*!40000 ALTER TABLE `dynamic_content_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dynamic_contents`
--

DROP TABLE IF EXISTS `dynamic_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dynamic_contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `contentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentable_id` bigint(20) unsigned NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dynamic_contents_contentable_type_contentable_id_index` (`contentable_type`,`contentable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dynamic_contents`
--

LOCK TABLES `dynamic_contents` WRITE;
/*!40000 ALTER TABLE `dynamic_contents` DISABLE KEYS */;
INSERT INTO `dynamic_contents` VALUES (1,1,'module',1,1,NULL,'2021-05-10 08:35:50'),(2,1,'module',1,2,NULL,NULL),(3,1,'module',1,3,NULL,NULL),(4,1,'module',2,1,'2021-05-11 21:53:29','2021-05-11 21:53:29'),(5,1,'module',2,2,'2021-05-11 21:54:08','2021-05-11 21:54:08'),(6,1,'module',3,1,'2021-05-11 21:57:25','2021-05-11 21:57:25'),(7,1,'module',3,2,'2021-05-11 22:01:09','2021-05-11 22:01:09'),(8,1,'module',4,1,'2021-05-11 22:25:34','2021-05-11 22:25:34'),(9,1,'module',4,2,'2021-05-11 22:26:42','2021-05-11 22:26:42'),(10,1,'module',4,3,'2021-05-11 22:45:27','2021-05-11 22:45:27'),(11,1,'module',5,1,'2021-05-23 01:54:29','2021-05-23 01:54:29'),(12,1,'module',5,2,'2021-05-23 01:59:39','2021-05-23 01:59:39'),(13,1,'module',5,3,'2021-05-23 02:00:11','2021-05-23 02:00:11'),(14,1,'module',5,4,'2021-05-23 02:00:39','2021-05-23 02:00:39'),(15,1,'module',5,5,'2021-05-23 02:01:11','2021-05-23 02:01:11'),(16,1,'module',5,6,'2021-05-23 02:01:53','2021-05-23 02:01:53'),(17,1,'module',5,7,'2021-05-23 02:02:21','2021-05-23 02:02:21'),(18,1,'module',2,3,'2021-06-02 00:03:53','2021-06-02 00:03:53'),(19,1,'module',2,4,'2021-06-02 00:05:13','2021-06-02 00:05:13'),(20,1,'module',2,5,'2021-06-02 00:06:02','2021-06-02 00:06:02'),(21,1,'module',2,6,'2021-06-02 00:07:19','2021-06-02 00:07:19'),(23,1,'module',3,3,'2021-06-05 03:57:10','2021-06-05 03:57:10'),(24,1,'module',3,4,'2021-06-05 03:57:34','2021-06-05 03:57:34'),(25,1,'module',3,5,'2021-06-05 03:57:59','2021-06-05 03:57:59'),(26,1,'module',3,6,'2021-06-05 03:58:25','2021-06-05 03:58:25'),(27,1,'module',3,7,'2021-06-05 03:58:53','2021-06-05 03:58:53'),(28,1,'module',3,8,'2021-06-05 03:59:24','2021-06-05 03:59:24'),(29,1,'module',3,9,'2021-06-05 03:59:44','2021-06-05 03:59:44'),(30,1,'module',3,10,'2021-06-05 04:00:09','2021-06-05 04:00:09'),(31,1,'module',1,2,'2021-06-05 06:48:35','2021-06-05 06:48:35'),(32,1,'module',1,3,'2021-06-05 06:50:34','2021-06-05 06:50:34'),(33,1,'module',4,4,'2021-06-05 08:45:20','2021-06-05 08:45:20'),(34,1,'module',4,5,'2021-06-05 08:46:31','2021-06-05 08:46:31'),(35,1,'module',4,6,'2021-06-05 08:50:59','2021-06-05 08:50:59'),(36,1,'module',4,7,'2021-06-05 08:51:41','2021-06-05 08:51:41'),(37,1,'module',4,8,'2021-06-05 08:54:09','2021-06-05 08:54:09'),(38,1,'module',4,9,'2021-06-05 08:55:08','2021-06-05 08:55:08'),(39,1,'module',4,10,'2021-06-05 08:55:38','2021-06-05 08:55:38'),(40,1,'module',4,11,'2021-06-05 08:56:21','2021-06-05 08:56:21'),(41,1,'module',4,12,'2021-06-05 08:57:25','2021-06-05 08:57:25'),(42,1,'module',7,1,NULL,'2021-06-06 18:44:04'),(43,1,'module',6,1,NULL,'2021-06-07 05:07:48');
/*!40000 ALTER TABLE `dynamic_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_categories`
--

DROP TABLE IF EXISTS `faq_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_categories`
--

LOCK TABLES `faq_categories` WRITE;
/*!40000 ALTER TABLE `faq_categories` DISABLE KEYS */;
INSERT INTO `faq_categories` VALUES (1,'Products','products','2021-06-04 13:00:42','2021-06-04 13:00:42');
/*!40000 ALTER TABLE `faq_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_item_translations`
--

DROP TABLE IF EXISTS `faq_item_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_item_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `faq_item_id` bigint(20) unsigned NOT NULL,
  `lang` char(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_item_translations_faq_id` (`faq_item_id`),
  CONSTRAINT `faq_item_translations_faq_id` FOREIGN KEY (`faq_item_id`) REFERENCES `faq_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_item_translations`
--

LOCK TABLES `faq_item_translations` WRITE;
/*!40000 ALTER TABLE `faq_item_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_item_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_items`
--

DROP TABLE IF EXISTS `faq_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `faq_id` bigint(20) unsigned NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `author_id` bigint(20) unsigned NOT NULL,
  `update_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_items_faq_id` (`faq_id`),
  KEY `faq_items_author_id` (`author_id`),
  KEY `faq_items_update_id` (`update_id`),
  CONSTRAINT `faq_items_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `faq_items_faq_id` FOREIGN KEY (`faq_id`) REFERENCES `faqs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faq_items_update_id` FOREIGN KEY (`update_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_items`
--

LOCK TABLES `faq_items` WRITE;
/*!40000 ALTER TABLE `faq_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_translations`
--

DROP TABLE IF EXISTS `faq_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `faq_id` bigint(20) unsigned NOT NULL,
  `lang` char(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_translations_faq_id` (`faq_id`),
  CONSTRAINT `faq_translations_faq_id` FOREIGN KEY (`faq_id`) REFERENCES `faqs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_translations`
--

LOCK TABLES `faq_translations` WRITE;
/*!40000 ALTER TABLE `faq_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `author_id` bigint(20) unsigned NOT NULL,
  `update_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqs_category_id` (`category_id`),
  KEY `faqs_category_author_id` (`author_id`),
  KEY `faqs_category_update_id` (`update_id`),
  CONSTRAINT `faqs_category_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `faqs_category_id` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faqs_category_update_id` FOREIGN KEY (`update_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `need_id` bigint(20) unsigned NOT NULL,
  `hear_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_need_id` (`need_id`),
  KEY `messages_hear_id` (`hear_id`),
  CONSTRAINT `messages_hear_id` FOREIGN KEY (`hear_id`) REFERENCES `dynamic_contents` (`id`),
  CONSTRAINT `messages_need_id` FOREIGN KEY (`need_id`) REFERENCES `dynamic_contents` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,43,42,'Varian Tedja','Labelideas','varian@labelideas.co','08970798809','Test Kirim Message 1','2021-06-07 06:14:47','2021-06-07 06:14:47');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_04_12_150413_create_permission_tables',1),(5,'2021_04_13_135807_create_product_categories_table',1),(6,'2021_04_13_143522_create_products_table',1),(7,'2021_04_14_144903_create_product_translations_table',1),(8,'2021_04_14_170002_create_partners_table',1),(9,'2021_04_15_125049_create_partner_has_products_table',1),(10,'2021_04_15_134017_create_clients_table',1),(11,'2021_04_15_134055_create_use_cases_table',1),(12,'2021_04_15_134117_create_use_case_translations_table',1),(13,'2021_04_15_135444_create_benefits_table',1),(14,'2021_04_15_135456_create_benefit_translations_table',1),(15,'2021_04_15_181730_create_product_has_use_cases_table',1),(16,'2021_04_18_134531_create_solutions_table',1),(17,'2021_04_18_135057_create_solution_translations_table',1),(18,'2021_04_20_154948_create_product_has_solutions_table',1),(19,'2021_04_20_155113_create_solution_has_use_cases_table',1),(20,'2021_04_20_181045_create_calculator_components_table',1),(21,'2021_04_21_142141_create_packages_table',1),(22,'2021_04_21_143650_create_package_items_table',1),(23,'2021_04_21_143911_create_package_item_has_cal_components_table',1),(24,'2021_04_21_144324_create_calculators_table',1),(25,'2021_04_21_155709_create_calculator_has_cal_components_table',1),(26,'2021_04_25_152056_create_pages_table',1),(27,'2021_04_25_153332_create_sections_table',1),(28,'2021_04_25_153904_create_section_translations_table',1),(29,'2021_04_25_154402_create_sliders_table',1),(30,'2021_04_25_161400_create_slider_items_table',1),(31,'2021_04_25_161635_create_slider_item_translations_table',1),(32,'2021_04_27_160028_create_modules_table',1),(33,'2021_04_27_160715_create_content_settings_table',1),(34,'2021_04_27_160731_create_dynamic_contents_table',1),(35,'2021_04_27_160746_create_dynamic_content_translations_table',1),(36,'2021_04_29_142434_create_messages_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'content',
  `create` tinyint(4) NOT NULL DEFAULT '0',
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `update` tinyint(4) NOT NULL DEFAULT '0',
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Success Stories','success-stories','success-stories/1/content',1,1,1,1,NULL,NULL),(2,'Milestone','milestone','milestone/2/content',1,1,1,1,NULL,NULL),(3,'Certifications','certifications','certifications/3/content',1,1,1,1,NULL,NULL),(4,'Awards','awards','awards/4/content',1,1,1,1,NULL,NULL),(5,'Representative Offices','representative-offices','representative-offices/5/content',1,1,1,1,NULL,NULL),(6,'Choose Your Need Contact Us','contact-us-choose','contact-us-choose/6/content',1,1,1,1,NULL,NULL),(7,'Where Hear Us Contact Us','contact-us-hear-us','contact-us-hear-us/7/content',1,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `normalized_items`
--

DROP TABLE IF EXISTS `normalized_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `normalized_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `author_id` bigint(20) unsigned NOT NULL,
  `update_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `normalized_items_author_id` (`author_id`),
  KEY `normalized_items_update_id` (`update_id`),
  CONSTRAINT `normalized_items_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `normalized_items_update_id` FOREIGN KEY (`update_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `normalized_items`
--

LOCK TABLES `normalized_items` WRITE;
/*!40000 ALTER TABLE `normalized_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `normalized_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_item_has_cal_components`
--

DROP TABLE IF EXISTS `package_item_has_cal_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_item_has_cal_components` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `package_item_id` bigint(20) unsigned NOT NULL,
  `calculator_component_id` bigint(20) unsigned NOT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `package_item_has_cal_components_package_item_id_foreign` (`package_item_id`),
  KEY `package_item_has_cal_components_calculator_component_id_foreign` (`calculator_component_id`),
  CONSTRAINT `package_item_has_cal_components_calculator_component_id_foreign` FOREIGN KEY (`calculator_component_id`) REFERENCES `calculator_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `package_item_has_cal_components_package_item_id_foreign` FOREIGN KEY (`package_item_id`) REFERENCES `package_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_item_has_cal_components`
--

LOCK TABLES `package_item_has_cal_components` WRITE;
/*!40000 ALTER TABLE `package_item_has_cal_components` DISABLE KEYS */;
INSERT INTO `package_item_has_cal_components` VALUES (1,1,1,1),(2,1,2,1),(3,2,1,2),(4,2,2,2),(5,3,1,4),(6,3,2,4),(7,4,1,8),(8,4,2,8),(9,5,1,16),(10,5,2,16),(11,6,1,32),(12,6,2,32);
/*!40000 ALTER TABLE `package_item_has_cal_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_items`
--

DROP TABLE IF EXISTS `package_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_items_package_id_foreign` (`package_id`),
  CONSTRAINT `package_items_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_items`
--

LOCK TABLES `package_items` WRITE;
/*!40000 ALTER TABLE `package_items` DISABLE KEYS */;
INSERT INTO `package_items` VALUES (1,'c1.small','c1small',1,'2021-05-31 11:31:51','2021-05-31 11:31:51'),(2,'c1.medium','c1medium',1,'2021-05-31 11:32:18','2021-05-31 11:32:18'),(3,'c1.large','c1large',1,'2021-05-31 11:32:50','2021-05-31 11:32:50'),(4,'c1.xlarge','c1xlarge',1,'2021-05-31 11:33:11','2021-05-31 11:33:11'),(5,'c1.xxlarge','c1xxlarge',1,'2021-05-31 11:33:38','2021-05-31 11:33:38'),(6,'c1.qlarge','c1qlarge',1,'2021-05-31 11:34:04','2021-05-31 11:34:04');
/*!40000 ALTER TABLE `package_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packages_product_id_foreign` (`product_id`),
  CONSTRAINT `packages_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'Lite Flavor',2,'2021-05-30 21:29:11','2021-05-31 11:31:24');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anchor` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Home','home',NULL,NULL,NULL,'2021-05-10 22:16:56','2021-05-10 22:16:56'),(2,'Why Us','why-us',NULL,NULL,NULL,'2021-05-10 22:16:56','2021-05-10 22:16:56'),(3,'Product','product',NULL,NULL,NULL,'2021-05-10 22:16:56','2021-05-10 22:16:56'),(4,'Solution','solution',NULL,NULL,NULL,'2021-05-10 22:16:56','2021-05-10 22:16:56'),(5,'Pricing Calculator','pricing-calculator',NULL,NULL,NULL,'2021-05-10 22:16:56','2021-05-10 22:16:56'),(6,'Documentation','documentation',NULL,NULL,NULL,'2021-05-10 22:16:56','2021-05-10 22:16:56'),(7,'FAQ','faq',NULL,NULL,NULL,'2021-05-10 22:16:56','2021-05-10 22:16:56'),(8,'Contact Us','contact-us',NULL,NULL,NULL,'2021-05-10 22:16:56','2021-05-10 22:16:56'),(9,'Product Detail','product-detail',NULL,NULL,NULL,NULL,NULL),(10,'Solution Detail','solution-detail',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_has_products`
--

DROP TABLE IF EXISTS `partner_has_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partner_has_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `partner_id` bigint(20) unsigned NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `partner_has_products_product_id_foreign` (`product_id`),
  KEY `partner_has_products_partner_id_foreign` (`partner_id`),
  CONSTRAINT `partner_has_products_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE,
  CONSTRAINT `partner_has_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_has_products`
--

LOCK TABLES `partner_has_products` WRITE;
/*!40000 ALTER TABLE `partner_has_products` DISABLE KEYS */;
INSERT INTO `partner_has_products` VALUES (119,3,8,1),(131,2,3,1),(132,1,4,1),(140,4,4,1),(141,4,3,2),(142,4,16,3),(143,4,15,4),(144,4,5,5),(145,4,6,6),(146,4,7,7),(149,7,7,1),(151,8,9,1),(152,9,10,1),(154,10,10,1),(155,11,13,1),(157,12,14,1),(161,13,14,1);
/*!40000 ALTER TABLE `partner_has_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (3,'RedHat OpenStack','uploads/partners/zNFtDK9Q4fTb1y69hjZznVCh7h3n9e4h2WOdQYZG.png','2021-05-10 22:16:56','2021-06-05 09:51:31'),(4,'VMware','uploads/partners/eRCp8aqddbpZtmTNaw13zriq3wgxBj90Mn6xa5wh.png','2021-05-10 22:16:56','2021-06-05 09:48:43'),(5,'Cisco','uploads/partners/xPQgnjt447qrVhq4QoxAhIpxP72XZdtJX9pO3NNc.png','2021-05-10 22:16:56','2021-06-05 10:00:10'),(6,'Nutanix','uploads/partners/6Xz63HXcHEzNGHc0hFSE9HVx8FoRkaC3aIPdJ2DQ.png','2021-05-10 22:16:56','2021-06-05 10:02:57'),(7,'NetApp','uploads/partners/fiy6fkVIzZAInGcu6kXbblitBFEam44K2deqFOsa.png','2021-05-10 22:16:56','2021-06-05 10:05:03'),(8,'Veeam','uploads/partners/PDCUkHLY3DDvlk5SC9d8ugF5nE5YPC2aggDcFRDr.png','2021-05-10 22:16:56','2021-06-05 09:53:46'),(9,'RedHat OpenShift','uploads/partners/J7OW5YB4AAuqghnNBtHznpkdg07DsACj6nYJoVJU.png','2021-05-10 22:16:56','2021-06-04 06:35:17'),(10,'Kazee','imgs/products/kazee.png',NULL,NULL),(11,'Jakarta Smart City','imgs/solutions/JSC.png',NULL,NULL),(12,'IVA_Analytics','uploads/partners/YA3GfIdVLGn4S9dHLNyDWXgEPDX3iT7EzENzrGRR.png','2021-06-03 07:43:50','2021-06-04 06:37:29'),(13,'Palo Alto Networks','uploads/partners/fXpQV7KfRRVmyEOTZw3mmVGynd2zXeTlZai9oket.png','2021-06-03 08:10:20','2021-06-04 06:38:07'),(14,'F5','uploads/partners/6BnGs3njyYO1qfoIJcRXhPjA0mMfEl9gjTBisp9C.png','2021-06-04 01:28:28','2021-06-04 06:38:37'),(15,'Inspur','uploads/partners/gU8StKcZVhmIF1cTnyLrdUkVhWNG0bPptnhHCQ89.png','2021-06-04 06:38:58','2021-06-05 09:57:50'),(16,'Microsoft','uploads/partners/0ESFnXwDFmRiPIlcP7Q159gi7jbEKWAL8a7fMiTE.png','2021-06-04 12:27:08','2021-06-04 12:27:08');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Create User','web','2021-05-10 22:16:55','2021-05-10 22:16:55'),(2,'Edit User','web','2021-05-10 22:16:55','2021-05-10 22:16:55'),(3,'Show User','web','2021-05-10 22:16:56','2021-05-10 22:16:56'),(4,'Delete User','web','2021-05-10 22:16:56','2021-05-10 22:16:56'),(5,'Create Role','web',NULL,NULL),(6,'Edit Role','web',NULL,NULL),(7,'Show Rule','web',NULL,NULL),(8,'Delete Rule','web',NULL,NULL),(9,'Create Product Category','web',NULL,NULL),(10,'Edit Product Category','web',NULL,NULL),(11,'Show Product Category','web',NULL,NULL),(12,'Delete Product Category','web',NULL,NULL),(13,'Create Product','web',NULL,NULL),(14,'Edit Product','web',NULL,NULL),(15,'Show Product','web',NULL,NULL),(16,'Delete Product','web',NULL,NULL),(17,'Create Solution','web',NULL,NULL),(18,'Edit Solution','web',NULL,NULL),(19,'Show Solution','web',NULL,NULL),(20,'Delete Solution','web',NULL,NULL),(21,'Create Calculator','web',NULL,NULL),(22,'Edit Calculator','web',NULL,NULL),(23,'Show Calculator','web',NULL,NULL),(24,'Delete Calculator','web',NULL,NULL),(25,'Create Calculator Component','web',NULL,NULL),(26,'Edit Calculator Component','web',NULL,NULL),(27,'Show Calculator Component','web',NULL,NULL),(28,'Delete Calculator Component','web',NULL,NULL),(29,'Create Package','web',NULL,NULL),(30,'Edit Package','web',NULL,NULL),(31,'Show Package','web',NULL,NULL),(32,'Delete Package','web',NULL,NULL),(33,'Edit Page','web',NULL,NULL),(34,'Create Dynamic Content','web',NULL,NULL),(35,'Edit Dynamic Content','web',NULL,NULL),(36,'Delete Dynamic Content','web','2021-05-10 22:16:56',NULL),(37,'Edit Setting','web',NULL,NULL),(38,'Create Slider','web',NULL,NULL),(39,'Edit Slider','web',NULL,NULL),(40,'Delete Slider','web',NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Infrastructure','infrastructure','2021-05-10 22:27:58','2021-05-10 22:59:49'),(2,'Platform','platform','2021-05-10 22:45:48','2021-05-10 22:45:48'),(3,'Software','software','2021-05-10 22:45:48','2021-05-10 22:45:48'),(4,'Security','security','2021-05-10 22:45:48','2021-05-10 22:45:48');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_has_solutions`
--

DROP TABLE IF EXISTS `product_has_solutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_has_solutions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `solution_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_has_solutions_product_id_foreign` (`product_id`),
  KEY `product_has_solutions_solution_id_foreign` (`solution_id`),
  CONSTRAINT `product_has_solutions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_has_solutions_solution_id_foreign` FOREIGN KEY (`solution_id`) REFERENCES `solutions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_has_solutions`
--

LOCK TABLES `product_has_solutions` WRITE;
/*!40000 ALTER TABLE `product_has_solutions` DISABLE KEYS */;
INSERT INTO `product_has_solutions` VALUES (30,2,5),(37,1,1),(38,2,1),(39,4,1),(40,3,1),(41,8,1),(42,10,1),(43,1,2),(44,2,2),(45,4,2),(46,3,2),(47,8,2),(48,1,3),(49,2,3),(50,4,3),(51,3,3),(52,7,3),(53,8,3),(54,9,3),(55,10,3),(56,1,4),(57,2,4),(58,4,4),(59,3,4),(60,2,6),(61,3,6),(62,10,6),(63,1,7),(64,2,7),(65,9,7),(66,2,8),(67,9,8),(68,1,9),(69,4,9),(70,3,9),(71,7,9),(72,8,9),(73,1,10),(74,2,10),(75,4,10),(76,3,10),(77,8,10);
/*!40000 ALTER TABLE `product_has_solutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_has_use_cases`
--

DROP TABLE IF EXISTS `product_has_use_cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_has_use_cases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `use_case_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_has_use_cases_product_id_foreign` (`product_id`),
  KEY `product_has_use_cases_use_case_id_foreign` (`use_case_id`),
  CONSTRAINT `product_has_use_cases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_has_use_cases_use_case_id_foreign` FOREIGN KEY (`use_case_id`) REFERENCES `use_cases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_has_use_cases`
--

LOCK TABLES `product_has_use_cases` WRITE;
/*!40000 ALTER TABLE `product_has_use_cases` DISABLE KEYS */;
INSERT INTO `product_has_use_cases` VALUES (154,3,15),(171,1,1),(172,1,14),(173,1,2),(174,1,4),(179,4,16),(180,4,17),(181,4,18),(182,4,19),(185,7,21),(188,8,21),(189,8,20),(190,9,22),(191,9,23),(192,9,24),(193,9,25),(196,10,26),(197,10,27),(198,11,1),(199,11,14),(200,11,22),(201,11,19),(214,13,28),(215,13,29),(216,13,30),(217,13,31);
/*!40000 ALTER TABLE `product_has_use_cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_translations`
--

DROP TABLE IF EXISTS `product_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_translations_product_id_lang_unique` (`product_id`,`lang`),
  KEY `product_translations_lang_index` (`lang`),
  CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_translations`
--

LOCK TABLES `product_translations` WRITE;
/*!40000 ALTER TABLE `product_translations` DISABLE KEYS */;
INSERT INTO `product_translations` VALUES (1,1,'Deka Prime (PX1)','deka-prime-px1','What is <br>Deka Prime (PX1)','Public Cloud service equipped with comprehensive features that will support your business.','imgs/products/banner-detail.jpg','imgs/solutions/svg/solutions/products/cloud-premium-2.svg','imgs/solutions/svg/solutions/products/cloud-premium-2.svg','<p>Deka Prime (PX1)&nbsp;is one of the Public Cloud services by Lintasarta Cloudeka that offers businesses an IT infrastructure with the virtual server device. This Cloud service can be accessed by using public Internet or private network.</p>\r\n\r\n<p>With the help of VMware technology, Deka Prime (PX1)&nbsp;by Lintasarta Cloudeka provides you with a free dedicated virtual router with NAT, access list, and static routing features. The comprehensive Cloud service offers upgrade options for IP VPN dedicated router and the Load Balancer feature. To complete the service, Cloud Premium can be integrated with a few more features such as Cloud Backup, Disaster Recovery, and Global Load Balancer.</p>','<p>Partners</p>','Deka Prime (PX1)','Cloud Premium','Cloud Premium','en','2021-05-10 22:42:00','2021-06-04 07:37:56'),(2,1,'Cloud Prime','cloud-prime','What is <br>Cloud Premium','Layanan Public Cloud didukung dengan fitur-fitur andal yang dapat menunjang bisnis Anda.','imgs/products/banner-detail.jpg','imgs/solutions/svg/solutions/products/cloud-premium-2.svg','imgs/solutions/svg/solutions/products/cloud-premium-2.svg','<p>Deka Prime (PX1) merupakan salah satu layanan Public Cloud dari Lintasarta Cloudeka yang membantu bisnis di Indonesia menyediakan infrastruktur IT dengan perangkat virtual server. Layanan Cloud ini dapat diakses melalui jaringan Internet maupun jaringan privat.</p>\r\n\r\n<p>Berbasis teknologi dari VMware, Deka Prime (PX1) milik Lintasarta Cloudeka akan menyediakan virtual router dedicated secara gratis dengan NAT, access list, dan fitur static routing. Tidak hanya itu, Lintasarta Deka Prime (PX1) menawarkan upgrade dedicated router untuk IP VPN dan fitur Load Balancer. Lintasarta Deka Prime (PX1) sudah dapat diintegrasikan dengan beberapa fitur tambahan seperti Cloud Backup, Disaster Recovery, dan Global Load Balancer.</p>','<p>Partners</p>','Dexa Prime (PX1)','Cloud Premium','Cloud Premium','id','2021-05-10 22:42:00','2021-06-05 05:32:07'),(3,2,'Deka Flexi (FX2)','deka-flexi-fx2','What is <br>Deka Flexi (FX2)','Public Cloud service with pay-per-use model and simple VM deployment.','product/sKuhDkUxqLouoV49yWJmu3pYJfRJxw5Yf4v0GiHk.jpg','imgs/solutions/svg/solutions/products/cloud-lite-2.svg','imgs/solutions/svg/solutions/products/cloud-lite-2.svg','<p>Deka Flexi (FX2) is one of the Public Cloud service options from the Lintasarta Cloudeka series. By implementing a simple deployment of virtual machine from RedHat OpenStack technology and pay-per-use mechanism, Cloud Lite offers flexibility that will allow companies to select services that suit their needs and business scale.</p>\r\n\r\n<p>Deka Flexi (FX2) service are renowned for its best price value in the Indonesian Cloud market and is able to increase efficiency, especially in the use of Capital Expenditure (capex) for various unnecessary IT investments.</p>','<p>description</p>','Deka Flexi (FX2)','Cloud Lite','Cloud Lite','en','2021-05-19 07:57:16','2021-06-01 06:23:28'),(4,2,'Cloud Lite','cloud-lite','What is <br>Cloud Lite','Layanan Public Cloud dengan skema pay-per-use dan deployment VM sederhana.','product/sKuhDkUxqLouoV49yWJmu3pYJfRJxw5Yf4v0GiHk.jpg','imgs/solutions/svg/solutions/products/cloud-lite-2.svg','imgs/solutions/svg/solutions/products/cloud-lite-2.svg','<p>Deka Flexi (FX2) merupakan salah satu pilihan layanan Public Cloud dari rangkaian Lintasarta Cloudeka. Dengan menerapkan Virtual Machine sederhana dan mekanisme pay-per-use serta didukung teknologi dari RedHat OpenStack, Cloud Lite menawarkan fleksibilitas sehingga perusahaan dapat memilih layanan yang sesuai dengan kebutuhan dan skala bisnis.</p>\r\n\r\n<p>Layanan Deka Flexi (FX2) dikenal memiliki harga terbaik di pasar Indonesia dan mampu meningkatkan efisiensi, terutama pada penggunaan Capital Expenditure (capex) perusahaan untuk berbagai investasi IT yang tidak perlu.&nbsp;</p>','<p>description</p>','Deka Flexi (FX2)','Cloud Lite','Cloud Lite','id','2021-05-19 07:57:16','2021-06-05 05:33:20'),(5,3,'Deka Vault','deka-vault','What is <br>Deka Vault','Cloud Backup and Disaster Recovery service to help you synchronize the main virtual server.','product/LRRschYjaIW7KrIQ5eGTI9qeAqG7js03aHEgwZC0.png','svgs/cloud-safe.svg','svgs/cloud-safe.svg','<p>Deka Vault from Lintasarta Cloudeka product series is a Cloud Backup and Disaster Recovery service to help you synchronize the main virtual server by using the Internet to a backup virtual server for data protection and avoid bad things from happening to your main server.</p>\r\n\r\n<p>Deka Vault is supported by technology from Veeam for all types of Cloud storage infrastructure that you have so that all data is protected.</p>','<p>Partners</p>','Deka Vault','Cloud Safe','Cloud Safe','en','2021-05-21 07:55:59','2021-06-01 06:24:17'),(6,3,'Cloud Safe','cloud-safe','What is <br>Cloud Safe','Layanan Cloud Backup dan Disaster Recovery untuk membantu Anda melakukan sinkronisasi terhadap virtual server utama.','product/LRRschYjaIW7KrIQ5eGTI9qeAqG7js03aHEgwZC0.png','svgs/cloud-safe.svg','svgs/cloud-safe.svg','<p>Cloud Safe from Lintasarta Cloudeka product series is a Cloud Backup and Disaster Recovery service to help you synchronize the main virtual server by using the Internet to a backup virtual server for data protection and avoid bad things from happening to your main server.</p>\r\n\r\n<p>Cloud Safe is supported by technology from Veeam for all types of Cloud storage infrastructure that you have so that all data is protected.</p>','<p>Partners</p>','Deka Vault','Cloud Safe','Cloud Safe','id','2021-05-21 07:55:59','2021-06-05 05:30:44'),(7,4,'Deka Priority','deka-priority','What is <br>Cloud Priority','Private Cloud service dedicated to only one customer.','product/JTDBBhXbecAsOfQvTZuV7ocrKqoz7OVYJwA04fWf.png','product/VspdWUYJYqxVEe1snnp2co5WYdJT2q0z7APPHNlc.svg','product/VspdWUYJYqxVEe1snnp2co5WYdJT2q0z7APPHNlc.svg','<p>Cloud Priority by Lintasarta Cloudeka is a Private Cloud Service dedicated for one customer only. The particular extensive solution is accessible through both the internet network and private networks to support various data production, Disaster Recovery, or any kind of enviroment needed.</p>\r\n\r\n<p>Supported by prestigious and well-known partners&rsquo; technologies, Cloud Priority from Lintasarta Cloudeka has reliable features that you can choose to support business operations.</p>','<p>Partner</p>','Deka Priority','Cloud Priority','Cloud Priority','en','2021-05-21 10:26:54','2021-06-04 12:42:20'),(8,4,'Cloud Priority','cloud-priority','What is <br>Cloud Priority','Layanan Private Cloud yang didedikasikan untuk hanya satu pelanggan.','product/JTDBBhXbecAsOfQvTZuV7ocrKqoz7OVYJwA04fWf.png','product/VspdWUYJYqxVEe1snnp2co5WYdJT2q0z7APPHNlc.svg','product/VspdWUYJYqxVEe1snnp2co5WYdJT2q0z7APPHNlc.svg','<p>Deka Priority milik Lintasarta Cloudeka merupakan layanan Private Cloud yang didedikasikan untuk hanya satu pelanggan. Solusi layanan ini dapat diakses melalui jaringan Internet maupun jaringan privat untuk mendukung seluruh jenis produksi data, Disaster Recovery, atau berbagai jenis kebutuhan lainnya.</p>\r\n\r\n<p>Berbasis dukungan dari partner-partner ternama, Deka Priority dari Lintasarta Cloudeka memiliki fitur-fitur andal yang dapat Anda pilih sesuai kebutuhan untuk mendukung kegiatan operasional perusahaan.</p>','<p>Partner</p>','Deka Priority','Cloud Priority','Cloud Priority','id','2021-05-21 10:26:54','2021-06-05 05:31:17'),(13,7,'Deka Box','deka-box','What is <br>Deka Box','Object Storage service for managing corporate applications and data.','product/JCftHv1tSVvneSJEUS9gt6cUWvcbkOHxNaCdLL97.png','product/Xz2f53tRlXhcssgAn3II7IBueDlrZuBFQ9hr4vXj.svg','product/Xz2f53tRlXhcssgAn3II7IBueDlrZuBFQ9hr4vXj.svg','<p>Deka Box from Lintasarta Cloudeka is an Object Storage service that can be used to manage corporate data storage from various locations with replication control capabilities. This reliable Cloud Computing solution is very suitable for companies that have many applications with a level of data complexity and require the storage of various types of data.</p>','<p>Cloud Box</p>','Cloud Box','Cloud Box','Cloud Box','en','2021-05-21 10:51:04','2021-06-05 05:54:20'),(14,7,'Cloud Box','cloud-box','What is <br>Cloud Box','Layanan Object Storage untuk mengelola penyimpan data perusahaan.','product/JCftHv1tSVvneSJEUS9gt6cUWvcbkOHxNaCdLL97.png','product/Xz2f53tRlXhcssgAn3II7IBueDlrZuBFQ9hr4vXj.svg','product/Xz2f53tRlXhcssgAn3II7IBueDlrZuBFQ9hr4vXj.svg','<p>Deka Box dari Lintasarta Cloudeka adalah layanan Object Storage yang dapat dimanfaatkan untuk mengelola penyimpan data perusahaan dari berbagai lokasi dengan kemampuan kendali replikasi. Solusi Cloud Computing andal ini sangat sesuai digunakan bagi perusahaan yang memiliki banyak aplikasi dengan tingkat kompleksitas data dan membutuhkan tempat penyimpanan berbagai jenis data.</p>','<p>Cloud Bucket</p>','Deka Box','Cloud Box','Cloud Box','id','2021-05-21 10:51:04','2021-06-05 05:52:44'),(15,8,'Deka Harbor','deka-harbor','What is <br>Deka Harbor','Container based Cloud Service to manage your company applications.','product/S0RpxD9RKyPO7TaHGA37vpWGHt0AkgLu0V09JHic.png','product/YxtYaTm2KUy60D6JC1iF9TO6L8OWnucUIMHGTTBy.svg','product/YxtYaTm2KUy60D6JC1iF9TO6L8OWnucUIMHGTTBy.svg','<p>Deka Harbor is a Managed Container as a Service solution from Lintasarta Cloudeka that can help application developers optimizing their actions to upload, set up, start, stop, and manage applications in the form of a secure and scalable container.</p>\r\n\r\n<p>This Cloud service model offers a complete framework for deploying and managing containerized applications. Deka Harbor by Lintasarta Cloudeka provides a logical packaging mechanism through which applications can be abstracted from their run environment. This combination allows container-based applications to be used easily and consistently, regardless of whether the target environment is a production environment or even a developer&#39;s personal laptop.</p>','<p>Deka Harbor</p>','Deka Harbor','Deka Harbor','Deka Harbor','en','2021-05-21 10:57:11','2021-06-05 05:57:15'),(16,8,'Cloud Deploy','cloud-deploy','What is <br>Cloud Deploy','Layanan Cloud berbasis Container untuk mengelola aplikasi perusahaan Anda.','product/S0RpxD9RKyPO7TaHGA37vpWGHt0AkgLu0V09JHic.png','product/YxtYaTm2KUy60D6JC1iF9TO6L8OWnucUIMHGTTBy.svg','product/YxtYaTm2KUy60D6JC1iF9TO6L8OWnucUIMHGTTBy.svg','<p>Deka Harbor adalah layanan Managed Container as a Service dari Lintasarta Cloudeka yang dapat membantu para pengembang aplikasi melancarkan aksinya untuk mengunggah, mengatur, memulai, menghentikan, dan mengelola aplikasi dalam bentuk container yang aman dan terukur.&nbsp;</p>\r\n\r\n<p>Model layanan Cloud ini menawarkan kerangka kerja yang lengkap untuk menggunakan dan mengelola aplikasi dalam bentuk container. Tidak hanya itu, Deka Harbor milik Lintasarta Cloudeka menyediakan mekanisme pengemasan logis di mana aplikasi dapat diabstraksi dari lingkungan mereka dijalankan. Kombinasi ini memungkinkan aplikasi berbasis container untuk digunakan dengan mudah dan konsiten, terlepas dari apakah lingkungan yang ditargetkan adalah lingkungan produksi (production environment) atau bahkan laptop pribadi pengembang.</p>','<p>Cloud Deploy</p>','Deka Harbor','Cloud Deploy','Cloud Deploy','id','2021-05-21 10:57:11','2021-06-05 05:32:42'),(17,9,'Deka Sense','deka-sense','What is <br>Deka Sense','Data Analytics service based on Social Intelligence technology to generate analytical reports for your company’s brand from digital media.','product/pYqz4jeSV8N7oxuXrw3ennMlKRhBm7eb2vjuoFNT.png','product/7Ph479rKeHB01IiIdNzJw6JymfxKbDtvos9iPDcc.svg','product/7Ph479rKeHB01IiIdNzJw6JymfxKbDtvos9iPDcc.svg','<p>Lintasarta Deke Sense is a social intelligence application that generates social insights by summarizing, analyzing, and monitoring public sentiments and trending issues from conversations happening in social media &amp; online media.&nbsp;</p>\r\n\r\n<p>With Lintasarta Deke Sense, you can monitor and listen to multiple channels from a single easy-to-use dashboard and respond in real-time. Lintasarta Deke Sense is a fully managed service from installation, transition, and maintenance conducted by Lintasarta Cloudeka professional technicians team who hold international certifications.&nbsp;</p>','<p>Deka Sense</p>','Deka Sense','Media Analytics','Media Analytics','en','2021-05-21 11:05:46','2021-06-05 06:01:10'),(18,9,'Media Analytics','media-analytics','What is <br>Media Analytics','Layanan Data Analytics berbasis teknologi Social Intelligence untuk menghasilkan laporan analisis brand perusahaan Anda dari digital media.','product/pYqz4jeSV8N7oxuXrw3ennMlKRhBm7eb2vjuoFNT.png','product/7Ph479rKeHB01IiIdNzJw6JymfxKbDtvos9iPDcc.svg','product/7Ph479rKeHB01IiIdNzJw6JymfxKbDtvos9iPDcc.svg','<p>Lintasarta Deka Sense adalah aplikasi social intelligence yang menghasilkan laporan sentimen publik, tren, dan isu yang terkumpul dari proses pemantauan dan penganalisisan dari percakapan yang terjadi di media sosial &amp; media online.</p>\r\n\r\n<p>Dengan Lintasarta Deka Sense, Anda dapat memantau dan mendengarkan dari berbagai saluran di satu dashboard yang mudah digunakan dan merespons secara real-time. Lintasarta Deska Sense merupakan layanan Cloud fully managed dari instalasi, perpindahan data, hingga pengelolaan yang dilaksanakan oleh tim teknisi profesional Lintasarta Cloudeka dengan sertifikasi internasional.</p>','<p>Media Analytics</p>','Deka Sense','Media Analytics','Media Analytics','id','2021-05-21 11:05:46','2021-06-05 05:30:59'),(19,10,'Intelligent Video Analytics','intelligent-video-analytics','What is <br>Intelligent Video Analytics','Ready-to-use software services based on Artificial Intelligence technology for monitoring via live-video to gather attributes, events or patterns of specific behaviour.','product/ZPrBAzLUI8LtDkNZwEJnqO8HOOSNw6Xs7lIj63zD.png','product/1fpk0sp08ymM53ytp1urnvEwd6Vp0VwfGuR7MHGe.svg','product/1fpk0sp08ymM53ytp1urnvEwd6Vp0VwfGuR7MHGe.svg','<p>Lintasarta Intelligent Video Analytics (IVA) is a ready-to-use software for live video that works in all environments to provide a new level of situational awareness for a more secured and smarter organization. With the support of Artificial Intelligence, Lintasarta IVA can generate insightful real-time reports of what is currently happening in the location where the devices are installed.</p>\r\n\r\n<p>Unlike any other camera surveillance, the analysis of video/image generated by Lintasarta IVA is carried out by the system so that it is consistent and accurate thanks to the comprehensive features such as Face Recognition, Demography Analytics, License Plate Recognition, and Vehicle Counting &amp; Classification. Moreover, the accuracy of interpretation has been tested by the National Institute of Standards &amp; Technology (NIST).</p>','<p>Intelligent Video Analytics</p>','Intelligent Video Analytics','Intelligent Video Analytics','Intelligent Video Analytics','en','2021-05-21 11:15:17','2021-05-21 11:15:17'),(20,10,'Intelligent Video Analytics','intelligent-video-analytics','What is <br>Intelligent Video Analytics','Layanan perangkat lunak siap pakai berbasis teknologi Artificial Intelligence untuk pemantuan melalui live-video untuk mengumpulkan data atribut, peristiwa, atau pola perilaku tertentu.','product/ZPrBAzLUI8LtDkNZwEJnqO8HOOSNw6Xs7lIj63zD.png','product/1fpk0sp08ymM53ytp1urnvEwd6Vp0VwfGuR7MHGe.svg','product/1fpk0sp08ymM53ytp1urnvEwd6Vp0VwfGuR7MHGe.svg','<p>Lintasarta Intelligent Video Analytics (IVA) adalah perangkat lunak siap pakai untuk pemantuan melalui live-video yang diinstal di semua lingkungan untuk memberikan tingkat keamanan yang lebih cerdas. Dengan dukungan Artificial Intelligence, Lintasarta IVA dapat menghasilkan laporan real-time tentang apa yang sedang terjadi di lokasi di mana perangkat dipasang.</p>\r\n\r\n<p>Berbeda dengan kamera pengawas lainnya, analisis video/gambar yang dihasilkan oleh Lintasarta IVA dilakukan oleh sistem agar konsisten dan akurat karena telah dilengkapi fitur Pengenalan Wajah, Analisis Demografi, Pengenalan Nomor Plat Kendaraan, dan Perhitungan Jumlah &amp; Klasifikasi Kendaraan. Selain itu, tingkat keakurasian interpretasi telah diuji oleh National Institute of Standards &amp; Technology (NIST).</p>','<p>Intelligent Video Analytics</p>','Intelligent Video Analytics','Intelligent Video Analytics','Intelligent Video Analytics','id','2021-05-21 11:15:17','2021-06-05 05:30:28'),(21,11,'Next Generation Firewall','next-generation-firewall','What is <br>Next Generation Firewall','Protects your IT infrastructure from malware.','product/wOhov3UyBpz0AjM5mjkLoLshRjQSBDuq1G72e40m.png','product/6kptZEuwBp2PKJ7ZH2rEfDpD6Ea7UvSfJ4DEs9yV.svg','product/6kptZEuwBp2PKJ7ZH2rEfDpD6Ea7UvSfJ4DEs9yV.svg','<p>Lintasarta NGFW On Cloud is a value-added service for Lintasarta Cloud and Lintasarta Colocation customers. With Lintasarta NGFW On Cloud, your servers within the Lintasarta Cloud and Lintasarta Colocation networks will be protected from modern viruses and malware that come from the Internet.</p>\r\n\r\n<p>Lintasarta NGFW On Cloud is the first and only Indonesian provider to offer such Cloud Security services. In collaboration with Palo Alto Networks, as a leading technology partner in the field, we ensure the security of your servers within Lintasarta Cloud and Lintasarta Colocation networks from cyber attacks.</p>','<p>Next Generation Firewall</p>','Next Generation Firewall','Next Generation Firewall','Next Generation Firewall','en','2021-05-21 11:25:24','2021-06-05 05:28:13'),(22,11,'Next Generation Firewall','next-generation-firewall','What is <br>Next Generation Firewall','Lindungi infrastruktur IT Anda dari Malware.','product/wOhov3UyBpz0AjM5mjkLoLshRjQSBDuq1G72e40m.png','product/6kptZEuwBp2PKJ7ZH2rEfDpD6Ea7UvSfJ4DEs9yV.svg','product/6kptZEuwBp2PKJ7ZH2rEfDpD6Ea7UvSfJ4DEs9yV.svg','<p>Lintasarta Next-Generation Firewall On Cloud adalah layanan value added bagi Anda yang menggunakan layanan Lintasarta Cloudeka dan Lintasarta Colocation. Dengan Lintasarta Next-Generation Firewall On Cloud, server Anda yang berada di dalam jaringan Lintasarta Cloud dan Lintasarta Colocation akan terlindungi dari virus modern dan malware yang datang dari Internet.</p>\r\n\r\n<p>Lintasarta Next-Generation Firewall On Cloud menjadikan Lintasarta sebagai provider dalam negeri pertama dan satu-satunya yang menawarkan layanan Cloud Security sejenis. Bekerja sama dengan Palo Alto Networks sebagai partner teknologi terdepan di bidangnya, kami memastikan keamanan server Anda yang berada di dalam jaringan Lintasarta Cloudeka dan Lintasarta Colocation dari serangan siber.</p>','<p>Next Generation Firewall</p>','Next Generation Firewall','Next Generation Firewall','Next Generation Firewall','id','2021-05-21 11:25:24','2021-06-05 05:29:49'),(23,12,'Load Balancer','load-balancer','What is <br>Load Balancer','Keep your web application available.','product/BY2jmKYJBCtOzdGVoKGvqbJojvIEfZZXoiYqdT3u.png','product/avcTYFOpfQp8TqbDWkX84548tULcAdcYTUCEQ6tj.svg','product/avcTYFOpfQp8TqbDWkX84548tULcAdcYTUCEQ6tj.svg','<p>Lintasarta Load Balancer is a web security feature that can only be used by Lintasarta Cloudeka and Lintasarta Colocation customers in managing data traffic and is able to split the work of a group of web servers evenly. This way, your web application will still be available in any situation.</p>','<p>Load Balancer</p>','Load Balancer','Load Balancer','Load Balancer','en','2021-05-21 11:32:57','2021-06-05 05:28:03'),(24,12,'Load Balancer','load-balancer','What is <br>Load Balancer','Memastikan web aplikasi Anda tetap tersedia dalam kondisi apapun.','product/BY2jmKYJBCtOzdGVoKGvqbJojvIEfZZXoiYqdT3u.png','product/avcTYFOpfQp8TqbDWkX84548tULcAdcYTUCEQ6tj.svg','product/avcTYFOpfQp8TqbDWkX84548tULcAdcYTUCEQ6tj.svg','<p>Lintasarta Load Balancer merupakan fitur keamanan web yang hanya dapat digunakan pelanggan Lintasarta Cloudeka dan Lintasarta Colocation dalam mengatur lalu lintas data dan mampu membagi pekerjaan sekelompok server web secara merata. Dengan demikian, aplikasi web Anda akan tetap tersedia dalam situasi apapun.</p>','<p>Load Balancer</p>','Load Balancer','Load Balancer','Load Balancer','id','2021-05-21 11:32:57','2021-06-05 05:30:02'),(25,13,'Web Application Firewall','web-application-firewall','What is Web Application <br>Firewall','Protect your web application from hacking.','product/jNgM3DiQ388pZwc9FhHYdhPEHYHjZTV2pizLx1nf.png','product/5ltlw18TF1hLGRWIvp4VUaDq1CuhA6QNbCikPRaT.svg','product/5ltlw18TF1hLGRWIvp4VUaDq1CuhA6QNbCikPRaT.svg','<p>Lintasarta Web Application Firewall (WAF) is a web security feature only for Lintasarta Cloudeka and Data Center customers. To complete your security system, Lintasarta WAF is able to filter the content of specific web applications while Lintasarta NGFW serves as a safety gate between servers. Lintasarta WAF helps you to maximize business through a web application (HTTP) by securing the traffic from cyber attacks.</p>','<p>Web Application Firewall</p>','Web Application Firewall','Web Application Firewall','Web Application Firewall','en','2021-05-21 11:38:24','2021-06-05 05:28:39'),(26,13,'Web Application Firewall','web-application-firewall','What is Web Application <br>Firewall','Lindungi aplikasi web Anda dari serangan siber.','product/jNgM3DiQ388pZwc9FhHYdhPEHYHjZTV2pizLx1nf.png','product/5ltlw18TF1hLGRWIvp4VUaDq1CuhA6QNbCikPRaT.svg','product/5ltlw18TF1hLGRWIvp4VUaDq1CuhA6QNbCikPRaT.svg','<p>Lintasarta Web Application Firewall (WAF) merupakan fitur keamanan web khusus untuk pelanggan Lintasarta Cloudeka dan Data Center. Untuk melengkapi sistem keamanan Anda, Lintasarta WAF mampu memfilter konten aplikasi web tertentu, sedangkan Lintasarta NGFW berfungsi sebagai gerbang pengaman antar server. Lintasarta WAF dapat membantu Anda memaksimalkan bisnis melalui aplikasi web (HTTP) dengan mengamankan trafik dari serangan cyber.</p>','<p>Web Application Firewall</p>','Web Application Firewall','Web Application Firewall','Web Application Firewall','id','2021-05-21 11:38:25','2021-06-05 05:29:29');
/*!40000 ALTER TABLE `product_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'2021-05-10 22:42:00','2021-05-10 22:47:56'),(2,1,'2021-05-19 07:57:16','2021-05-19 07:57:16'),(3,1,'2021-05-21 07:55:59','2021-05-21 07:55:59'),(4,1,'2021-05-21 10:26:54','2021-05-21 10:26:54'),(7,1,'2021-05-21 10:51:04','2021-05-21 10:51:04'),(8,2,'2021-05-21 10:57:11','2021-05-21 10:57:11'),(9,3,'2021-05-21 11:05:46','2021-05-21 11:05:46'),(10,3,'2021-05-21 11:15:17','2021-05-21 11:15:17'),(11,4,'2021-05-21 11:25:24','2021-05-21 11:25:24'),(12,4,'2021-05-21 11:32:57','2021-05-21 11:32:57'),(13,4,'2021-05-21 11:38:24','2021-05-21 11:38:24');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','web','2021-05-10 22:16:55','2021-05-10 22:16:55');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_translations`
--

DROP TABLE IF EXISTS `section_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_1` text COLLATE utf8mb4_unicode_ci,
  `image_2` text COLLATE utf8mb4_unicode_ci,
  `video_1` text COLLATE utf8mb4_unicode_ci,
  `sliders` text COLLATE utf8mb4_unicode_ci,
  `cta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `section_translations_section_id_lang_unique` (`section_id`,`lang`),
  KEY `section_translations_lang_index` (`lang`),
  CONSTRAINT `section_translations_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_translations`
--

LOCK TABLES `section_translations` WRITE;
/*!40000 ALTER TABLE `section_translations` DISABLE KEYS */;
INSERT INTO `section_translations` VALUES (1,1,'Lintasarta','Lintasarta','Lintasarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,'2021-05-06 19:22:05'),(2,1,'Lintasarta','Lintasarta','Lintasarta Cloud',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-05-06 19:21:46'),(7,3,'Why Choose <br>Lintasarta Cloud',NULL,'<p>The more a company&rsquo;s business develops, the more complex its IT infrastructure required eventually becomes. Lintasarta Cloud Services offers solutions for web/application hosting so that your data center can be securely, easily and affordably consolidated without having to build your own IT infrastructure. Learn more about the solutions offered by Lintasarta Cloud Services.<a class=\"txt-bold txt-dark\" href=\"{{ route(\'why-us\') }}\">More details..</a></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(8,3,'Why Choose <br>Lintasarta Cloudeka','Why Choose Lintasarta Cloudeka','<p>The more a company&rsquo;s business develops, the more complex its IT infrastructure required eventually becomes. Lintasarta Cloud Services offers solutions for web/application hosting so that your data center can be securely, easily and affordably consolidated without having to build your own IT infrastructure. Learn more about the solutions offered by Lintasarta Cloud Services.&nbsp;<a href=\"/why-us\">More details..</a></p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-06-01 06:18:27'),(9,4,'Discover Our<br>Cloud Products ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(10,4,'Discover Our<br>Cloud Products ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-05-06 20:50:29'),(11,5,'Explore Our<br>Cloud Solution ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(12,5,'Explore Our<br>Cloud Solution ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-05-06 20:52:59'),(13,6,'Empowering<br>Success Stories','We work together with brands and companies across the nation to make a world of difference.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(14,6,'Empowering<br>Success Stories','We work together with brands and companies across the nation to make a world of difference.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(15,7,'Our Clients',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(16,7,'Our Clients',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(17,8,'Our Partners',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(18,8,'Our Partners',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(19,9,'Mengapa kami','Mengapa kami','Mengapa kami',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,'2021-05-12 21:04:52'),(20,9,'Why us','Why us','Why us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(21,10,NULL,NULL,NULL,'imgs/why-us/why-us-banner.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(22,10,NULL,NULL,NULL,'imgs/why-us/why-us-banner.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(23,11,'Who <br>We Are',NULL,'<p class=\"dark-color\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet. Mauris vitae ultricies leo integer malesuada. Ac odio tempor orci dapibus ultrices in. Egestas diam in arcu cursus euismod. Dictum fusce ut placerat orci nulla. Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. Tempor id eu nisl nunc mi ipsum faucibus. Fusce id velit ut tortor pretium. Massa ultricies mi quis hendrerit dolor magna eget. </p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(24,11,'Who <br>We Are',NULL,'<p>Cloudeka is a cloud service provider company that has been established since 2010. Born by a well-known ICT company in the country, Lintasarta, provides cloud services for both large and small-medium enterprises. Known as a cloud provider from and for Indonesia which has a strong understanding of market needs, especially in Indonesia. Cloudeka continues to be dedicated to building and maintaining strong partnerships to enhance local businesses through the provision of end-to-end cloud services.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-06-01 06:19:20'),(25,12,'Why <br>Lintasarta Cloudeka?',NULL,'<p class=\"dark-color\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet. Mauris vitae ultricies leo integer malesuada. Ac odio tempor orci dapibus ultrices in. Egestas diam in arcu cursus euismod. Dictum fusce ut placerat orci nulla. Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. Tempor id eu nisl nunc mi ipsum faucibus. Fusce id velit ut tortor pretium. Massa ultricies mi quis hendrerit dolor magna eget. </p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(26,12,'Why <br>Lintasarta Cloudeka?',NULL,'<p><strong>Local Expertise</strong><br />\r\nOur expertise in being a cloud provider in Indonesia gives us a better understanding of the needs of the local market to provide the best solutions to scale up and help companies in Indonesia.</p>\r\n\r\n<p><strong>Communicative</strong><br />\r\nWe always maintain customer trust in Cloudeka. Transparent and honest communication is continuously carried out so that customers do not have to worry about hidden services or fees being billed suddenly.</p>\r\n\r\n<p><strong>For All Business Model</strong><br />\r\nCloudeka opens opportunities for large enterprises and small-medium enterprises to use cloud services to enhance their business.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-06-01 06:19:17'),(27,13,'Our <br>Milestone',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(28,13,'Our <br>Milestone',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(29,14,'CERTIFICATIONS ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(30,14,'Certifications',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-06-07 10:09:13'),(31,15,'Part of <br>Lintasarta',NULL,'<p>Lintasarta merupakan perusahaan Business-to-Business (B2B) yang bergerak di bidang Information and Communication Technology (ICT). Sejak tahun 1988, Lintasarta telah menyediakan jasa Komunikasi Data, Internet dan IT Services untuk berbagai sektor industri. Saat ini Lintasarta telah melayani lebih dari 2.400 pelanggan korporasi dengan lebih 45.000 jaringan yang meliputi layanan komunikasi data fiber optik, jaringan satelit, Managed Security &amp; Collaboration, Data Center dan DRC, Cloud computing, Managed Services, Telemedicine, SIMRS, e-KYC, Third Party Card Management, IT Operation &amp; Outsourcing, dan solusi total komunikasi data.</p>\r\n\r\n<p>Lintasarta memberikan layanan profesional mulai dari layanan pra-jual melalui business consultant, network engineer untuk assessment dan desain solusi pelanggan hingga layanan purna jual yang memadai seperti Customer Assistant Representative (CAR). Layanan professional kami didukung oleh lebih dari 1.000 staff berpengalaman di antaranya memiliki sertifikasi Internasional &nbsp;yang tersebar di lebih dari 44 kota di Indonesia.</p>\r\n\r\n<p>Lintasarta memberikan jaminan ketersediaan koneksi jaringan (SLA) sebesar 99%, 99,9% dan 99,99% sesuai kebutuhan para pelanggannya, dengan dukungan multimedia akses yaitu Fiber Optik, Broadband Wireless Access dan Satelit, serta multi backbone yang fully back up dan terkontrol melalui Network Monitoring System.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,'2021-06-05 04:10:45'),(32,15,'Part of <br>Lintasarta',NULL,'<p>Lintasarta is a Business-to-Business (B2B) company engaged in Information and Communication Technology (ICT). Since 1988, Lintasarta serves as Data Communication, Internet and IT Services for diversified industries. To this day, Lintasarta has been serving more than 2.400 corporate customers with greater than 45.000 networks including Fiber Optic Data Communication Service, Satellite Network, Managed Security &amp; Collaboration, Data Center dan DRC, Cloud computing, Managed Services, Telemedicine, SIMRS, e-KYC, Third-Party Card Management, IT Operation &amp; Outsourcing, and data communication total solutions.</p>\r\n\r\n<p>Lintasarta gives professional services start from pre-sales services through a business consultant, network engineers for assessment, and customer design solution to capable after- sales services such as Customer Assistant Representative (CAR). Our professional services are supported by more than 1.000 experienced staffs with international certifications spread in more than 44 cities of Indonesia.</p>\r\n\r\n<p>Lintasarta guarantees network connection availability (SLA) up to 99%, 99,9%, and 99,99% based on customer needs, with full support of multimedia accesses, namely Fiber Optic, Broadband Wireless Access and Satellite, and Multi-backbone that has been fully backed up and controlled by Network Monitoring System.</p>\r\n\r\n<p>&nbsp;</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-06-05 03:53:21'),(33,16,'Awards ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(34,16,'Awards ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(35,17,'Partners ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(36,17,'Partners',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-06-07 09:45:18'),(37,19,'Produk','Produk','Produk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,'2021-05-12 21:03:50'),(38,19,'Product','Product','Product',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(39,21,'Our Featured<br>Products',NULL,'<p class=\"dark-color\">Lintasarta Cloudeka service offers a series of anak negeri Cloud solutions developed with well-known partners for web/application hosting to consolidate your Data Center safely, easily, and cost-effectively without having to build your own IT infrastructure. Learn more or contact us directly for a free trial.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(40,21,'Our Featured<br>Products',NULL,'<p class=\"dark-color\">Lintasarta Cloudeka service offers a series of anak negeri Cloud solutions developed with well-known partners for web/application hosting to consolidate your Data Center safely, easily, and cost-effectively without having to build your own IT infrastructure. Learn more or contact us directly for a free trial.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(41,22,'Product Category',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(42,22,'Kategori Produk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(43,24,'Solusi','Solusi','Solusi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,'2021-05-12 21:03:50'),(44,24,'Solution','Solution','Solution',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(45,26,'Our Featured<br>Solution Products',NULL,'<p class=\"dark-color\">Lintasarta Cloudeka service offers a series of anak negeri Cloud solutions developed with well-known partners for web/application hosting to consolidate your Data Center safely, easily, and cost-effectively without having to build your own IT infrastructure. Learn more or contact us directly for a free trial.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(46,26,'Our Featured<br>Solution Products',NULL,'<p class=\"dark-color\">Lintasarta Cloudeka service offers a series of anak negeri Cloud solutions developed with well-known partners for web/application hosting to consolidate your Data Center safely, easily, and cost-effectively without having to build your own IT infrastructure. Learn more or contact us directly for a free trial.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(47,27,'Solution Segmentation',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(48,27,'Solution Segmentation',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(49,29,'Contact Us','Contact Us','Contact Us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,'2021-05-12 21:03:50'),(50,29,'Contact Us','Contact Us','Contact Us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-05-12 21:03:50'),(51,30,'Contact Us','Customer satisfaction is our priority. We therefore ensure all products and services to be ‘one stop solution’ to enhance your business performance.','<p class=\"light-color d-none d-lg-block\">Customer satisfaction is our priority. We therefore ensure all products and services to be ‘one stop solution’ to enhance your business performance.</p>','imgs/contact.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(52,30,'Contact Us','Customer satisfaction is our priority. We therefore ensure all products and services to be ‘one stop solution’ to enhance your business performance.','<p class=\"light-color d-none d-lg-block\">Customer satisfaction is our priority. We therefore ensure all products and services to be ‘one stop solution’ to enhance your business performance.</p>','imgs/contact.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(53,31,'Contact Us About Anything <br>Related With Our Company Or Services',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(54,31,'Contact Us About Anything <br>Related With Our Company Or Services',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(55,32,'Head Office',NULL,'<p><strong>Central Jakarta</strong><br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(56,32,'Head Office',NULL,'<p><strong>Central Jakarta</strong><br>\r\n                                Menara Thamrin 12th Floor<br>\r\n                                Jl. M.H. Thamrin Kav.3 Jakarta 10250</p>\r\n\r\n                                <p>T: +6221 230 2345 (Hunting)<br>\r\n                                F: +6221 230 3567</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-05-17 21:48:14'),(57,33,'Customer Support',NULL,'<p><strong>TB Simatupang</strong><br>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(58,33,'Customer Support',NULL,'<p><strong>TB Simatupang</strong><br>\r\n                                Jl. T.B. Simatupang (Kav. 10)<br>\r\n                                Jakarta Capital Region, 12430</p>\r\n                            <p>\r\n                                <a href=\"#\" class=\"rounded-badge ml-0\">\r\n                                    <i class=\"icon-cs\"></i> hotline <strong>14025</strong>\r\n                                </a>\r\n                            </p>\r\n                            <p>T: +6221 750 3456.<br>\r\n                                F: +6221 759 24000<br>\r\n                                Email: support@lintasarta.co.id</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-05-17 21:48:40'),(59,34,'Information Center',NULL,'<p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(60,34,'Information Center',NULL,'<p>\r\n                                <strong>For Products and Corporate Information</strong>\r\n                            </p>\r\n                            <p>\r\n                                <a href=\"#\" class=\"rounded-badge ml-0\">\r\n                                    <strong>T: +6221 230 2347</strong>\r\n                                </a>\r\n                            </p>\r\n                            <p>F: +6221 230 3567 <br>Email: info@lintasarta.co.id</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-05-17 21:49:11'),(61,35,'Representative Offices',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(62,35,'Representative Offices',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(63,36,'Connect With Us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(64,36,'Connect With Us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(65,37,'Technology partners',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(66,37,'Technology partners',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(67,38,'Uses Cases',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(68,38,'Use Cases',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,'2021-06-07 09:55:44'),(69,39,'<br>Features and Benefit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(70,39,'<br>Features and Benefit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(71,40,'See Our Solutions Industry Covered by ','Product',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(72,40,'See Our Solutions Industry Covered by ','Product',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(73,41,'Why Choose Us For <br>','Solutions?',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(74,41,'Why Choose Us For <br>','Solutions?',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(75,42,'Uses Cases',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(76,42,'Uses Cases',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL),(77,43,'Our Product<br>Solution',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'id',NULL,NULL),(78,43,'Our Product<br>Solution',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en',NULL,NULL);
/*!40000 ALTER TABLE `section_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('content','metadata','featured') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'content',
  `deleteable` tinyint(4) NOT NULL DEFAULT '0',
  `editable` tinyint(4) NOT NULL DEFAULT '0',
  `field_title` tinyint(4) NOT NULL DEFAULT '0',
  `field_subtitle` tinyint(4) NOT NULL DEFAULT '0',
  `field_description` tinyint(4) NOT NULL DEFAULT '0',
  `field_image_1` tinyint(4) NOT NULL DEFAULT '0',
  `field_image_2` tinyint(4) NOT NULL DEFAULT '0',
  `field_video_1` tinyint(4) NOT NULL DEFAULT '0',
  `field_sliders` tinyint(4) NOT NULL DEFAULT '0',
  `field_cta` tinyint(4) NOT NULL DEFAULT '0',
  `featured_module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_module_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_field` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_page_id_foreign` (`page_id`),
  CONSTRAINT `sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,1,'Metadata','metadata',0,1,1,1,1,0,0,0,0,0,NULL,NULL,NULL,1,NULL,NULL),(2,1,'Sliders','content',0,1,0,0,0,0,0,0,0,0,'slider','slider/1/item',NULL,2,NULL,NULL),(3,1,'Why Choose Lintasarta Cloud','content',0,1,1,1,1,0,0,0,0,0,NULL,NULL,NULL,3,NULL,NULL),(4,1,'Products','content',0,1,1,0,0,0,0,0,0,0,'Products','product',NULL,4,NULL,NULL),(5,1,'Solution','content',0,1,1,0,0,0,0,0,0,0,'Solutions','solution',NULL,5,NULL,NULL),(6,1,'Success Stories','featured',0,1,1,1,0,0,0,0,0,0,'Success Stories','success-stories/1/content',NULL,6,NULL,NULL),(7,1,'Clients','content',0,1,1,0,0,0,0,0,0,0,'Clients','client',NULL,7,NULL,NULL),(8,1,'Partners','content',0,1,1,0,0,0,0,0,0,0,'Partners','partner',NULL,8,NULL,NULL),(9,2,'Metadata','metadata',0,1,1,1,1,0,0,0,0,0,NULL,NULL,NULL,1,NULL,NULL),(10,2,'Banner','content',0,1,0,0,0,1,0,0,0,0,NULL,NULL,NULL,2,NULL,NULL),(11,2,'Who We Are','content',0,1,1,0,1,0,0,0,0,0,NULL,NULL,NULL,3,NULL,NULL),(12,2,'Why Lintasarta Cloudeka','content',0,1,1,0,1,0,0,0,0,0,NULL,NULL,NULL,4,NULL,NULL),(13,2,'Our Milestone','content',0,1,1,0,0,0,0,0,0,0,'Our Milestone','milestone/2/content',NULL,5,NULL,NULL),(14,2,'CERTIFICATIONS','content',0,1,1,0,0,0,0,0,0,0,'CERTIFICATIONS','certifications/3/content','',6,NULL,NULL),(15,2,'Part of Lintasarta','content',0,1,1,0,1,0,0,0,0,0,NULL,NULL,NULL,7,NULL,NULL),(16,2,'Awards','content',0,1,1,0,0,0,0,0,0,0,'Awards','awards/4/content',NULL,8,NULL,NULL),(17,2,'Partners','content',0,1,1,0,0,0,0,0,0,0,'Partners','partner',NULL,9,NULL,NULL),(19,3,'Metadata','metadata',0,1,1,1,1,0,0,0,0,0,NULL,NULL,NULL,1,NULL,NULL),(20,3,'Sliders','content',0,1,0,0,0,0,0,0,0,0,'slider','slider/2/item',NULL,2,NULL,NULL),(21,3,'Our Featured','content',0,1,1,0,1,0,0,0,0,0,NULL,NULL,NULL,3,NULL,NULL),(22,3,'Product Category','content',0,1,1,0,0,0,0,0,0,0,'Product Category','product/category',NULL,4,NULL,NULL),(23,3,'Product','content',0,1,0,0,0,0,0,0,0,0,'Product','product',NULL,5,NULL,NULL),(24,4,'Metadata','metadata',0,1,1,1,1,0,0,0,0,0,NULL,NULL,NULL,1,NULL,NULL),(25,4,'Sliders','content',0,1,0,0,0,0,0,0,0,0,'slider','slider/3/item',NULL,2,NULL,NULL),(26,4,'Our Featured','content',0,1,1,0,1,0,0,0,0,0,NULL,NULL,NULL,3,NULL,NULL),(27,4,'Solution Category','content',0,1,1,0,0,0,0,0,0,0,'Solution','solution',NULL,4,NULL,NULL),(28,4,'Product','content',0,1,0,0,0,0,0,0,0,0,'Product','product',NULL,5,NULL,NULL),(29,8,'Metadata','metadata',0,1,1,1,1,0,0,0,0,0,NULL,NULL,NULL,1,NULL,NULL),(30,8,'Banner','content',0,1,1,1,0,1,0,0,0,0,NULL,NULL,NULL,2,NULL,NULL),(31,8,'Form Contact Us','content',0,1,1,0,0,0,0,0,0,0,NULL,NULL,NULL,3,NULL,NULL),(32,8,'Head Office','content',0,1,1,0,1,0,0,0,0,0,NULL,NULL,NULL,4,NULL,NULL),(33,8,'Customer Support','content',0,1,1,0,1,0,0,0,0,0,NULL,NULL,NULL,5,NULL,NULL),(34,8,'Information Center','content',0,1,1,0,1,0,0,0,0,0,NULL,NULL,NULL,6,NULL,NULL),(35,8,'Representative Offices','featured',0,1,1,0,0,0,0,0,0,0,'Representative Offices','representative-offices/5/content',NULL,7,NULL,NULL),(36,8,'Connect With Us','content',0,1,1,0,0,0,0,0,0,0,NULL,NULL,NULL,8,NULL,NULL),(37,9,'Technology partners','content',0,1,1,0,0,0,0,0,0,0,NULL,NULL,NULL,1,NULL,NULL),(38,9,'Use cases','content',0,1,1,0,0,0,0,0,0,0,NULL,NULL,NULL,2,NULL,NULL),(39,9,'Benefit','content',0,1,1,0,0,0,0,0,0,0,NULL,NULL,NULL,3,NULL,NULL),(40,9,'Solution','content',0,1,1,1,0,0,0,0,0,0,'Solution','solution',NULL,4,NULL,NULL),(41,10,'Why Choose Us','content',0,1,1,1,0,0,0,0,0,0,NULL,NULL,NULL,1,NULL,NULL),(42,10,'Use cases','content',0,1,1,0,0,0,0,0,0,0,NULL,NULL,NULL,2,NULL,NULL),(43,10,'product','content',0,1,1,0,0,0,0,0,0,0,'Product','product',NULL,3,NULL,NULL);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('company_address','<p>Central Jakarta<br />\r\nMenara Thamrin 12th Floor<br />\r\nJl. M.H. Thamrin Kav.3 Jakarta 10250<br />\r\nT: 14052<br />\r\nF: +6221 230 3567<br />\r\ninfo@lintasarta.co.id</p>','2018-08-06 06:00:20','2021-05-23 01:49:22'),('company_address2','','1999-12-30 20:00:00',NULL),('company_agency_email','agency@apol.co.id','2017-08-02 06:51:49',NULL),('company_barges_email','tug_barge@apol.co.id','2017-08-02 06:51:49',NULL),('company_bbm','','1999-12-30 20:00:00',NULL),('company_chartering_email','chartering@apol.co.id','2017-08-02 06:51:49',NULL),('company_city','','1999-12-30 20:00:00',NULL),('company_city2','','1999-12-30 20:00:00',NULL),('company_contact_person_name','','1999-12-30 20:00:00',NULL),('company_contact_person_name_2','','1999-12-30 20:00:00',NULL),('company_contact_person_phone','','1999-12-30 20:00:00',NULL),('company_contact_person_phone_2','','1999-12-30 20:00:00',NULL),('company_corporate_secretary_email','','2017-08-02 06:51:49',NULL),('company_email','marketing@mylovebedcover.com','2018-02-05 07:50:05',NULL),('company_email2','','1999-12-30 20:00:00',NULL),('company_fax','','2017-09-11 10:15:12',NULL),('company_fax2','','1999-12-30 20:00:00',NULL),('company_floating_crane_email','floatingcrane@apol.co.id','2017-08-02 06:51:49',NULL),('company_line','','1999-12-30 20:00:00',NULL),('company_name','Lintasarta Cloudeka','2017-08-23 11:54:28','2021-06-04 07:50:28'),('company_parent_website','','1999-12-30 20:00:00',NULL),('company_phone','(+62-22) 5421788','2017-09-11 10:15:12',NULL),('company_phone2','','1999-12-30 20:00:00',NULL),('company_recruitment_email','','1999-12-30 20:00:00',NULL),('company_simple_description','','1999-12-30 20:00:00',NULL),('company_socmed_facebook','https://www.facebook.com/Lintasarta-Cloudeka-105635701638299/',NULL,'2021-06-04 07:57:20'),('company_socmed_instagram','https://www.instagram.com/lintasarta.cloudeka/',NULL,'2021-06-04 07:57:20'),('company_socmed_twitter','https://twitter.com/LACloudeka',NULL,'2021-06-04 07:57:20'),('company_website','','1999-12-30 20:00:00',NULL),('company_whatsapp','','1999-12-30 20:00:00',NULL),('setting__contact_us_default_send_to','hello.ranggareng@gmail.com',NULL,NULL),('setting__cs1','+6281345643460',NULL,NULL),('setting__cs2','',NULL,NULL),('setting__cs3','',NULL,NULL),('setting__cs4','',NULL,NULL),('setting__limit_page','25','1999-12-30 20:00:00',NULL),('setting__map_latitude','-6.185766460995968','1999-12-30 20:00:00','2021-05-23 01:49:56'),('setting__map_longitude','106.82219838135723','1999-12-30 20:00:00','2021-05-23 01:49:56'),('setting__popup_info_image','b356f827739c95e57e3797b11ae042fe.png',NULL,NULL),('setting__popup_info_status','1',NULL,NULL),('setting__popup_info_target_url','http://www.tokopedia.com',NULL,NULL),('setting__seo_default_description','Your Indonesian Cloud Partner',NULL,'2021-06-04 07:57:20'),('setting__seo_default_keyword','Lintasarta, Cloud, Cloud Indonesia',NULL,'2021-06-04 07:57:20'),('setting__seo_default_title','Lintasarta Cloudeka',NULL,'2021-06-04 07:57:20'),('setting__social_media_facebook_link','http://www.facebook.com/','1999-12-30 20:00:00',NULL),('setting__social_media_instagram_link','http://www.instagram.com/','1999-12-30 20:00:00',NULL),('setting__social_media_linkedin_link','https://www.linkedin.com/showcase/lintasartacloudeka/','1999-12-30 20:00:00','2021-06-04 07:57:20'),('setting__social_media_twitter_link','http://www.twitter.com/','1999-12-30 20:00:00',NULL),('setting__social_media_youtube_link','https://www.youtube.com/user/aplikanusaLintasarta','1999-12-30 20:00:00','2021-06-04 07:57:20'),('setting__success_story_display','false',NULL,'2021-06-07 10:12:44'),('setting__system__url_source','','1999-12-30 20:00:00',NULL),('setting__system_language','ID','1999-12-30 20:00:00',NULL),('setting__system_language2','','1999-12-30 20:00:00',NULL),('setting__system_main_website_url','','1999-12-30 20:00:00',NULL),('setting__webshop_enabled_tax','0','1999-12-30 20:00:00',NULL),('setting__webshop_tax_value','0','1999-12-30 20:00:00',NULL),('setting__website_enabled_dual_language','0','2017-08-21 15:51:39',NULL),('setting_count_1','327','1999-12-30 20:00:00',NULL),('setting_count_2','4','1999-12-30 20:00:00',NULL),('setting_count_3','47','1999-12-30 20:00:00',NULL),('setting_count_name_1','SEAFARERS','1999-12-30 20:00:00',NULL),('setting_count_name_2','DECADES','1999-12-30 20:00:00',NULL),('setting_count_name_3','SHIPS','1999-12-30 20:00:00',NULL),('setting_price_decimal_precision','2','1999-12-30 20:00:00',NULL),('system_cms_user','multi','1999-12-30 20:00:00',NULL),('system_company_name','Arpeni','1999-12-30 20:00:00',NULL),('system_copyright','@Lintasarta 2021','2017-08-21 16:00:20','2021-06-06 17:49:32'),('system_mac','cms_arpeni','1999-12-30 20:00:00',NULL),('system_memory_quota','0','1999-12-30 20:00:00',NULL),('system_product_name','Arpeni CMS','1999-12-30 20:00:00',NULL),('system_vendor_name','Label Ideas & Co.','1999-12-30 20:00:00',NULL),('system_version','1.0.0','1999-12-30 20:00:00',NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_item_translations`
--

DROP TABLE IF EXISTS `slider_item_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider_item_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slider_item_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cta` text COLLATE utf8mb4_unicode_ci,
  `cta_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slider_item_translations_slider_item_id_lang_unique` (`slider_item_id`,`lang`),
  KEY `slider_item_translations_lang_index` (`lang`),
  CONSTRAINT `slider_item_translations_slider_item_id_foreign` FOREIGN KEY (`slider_item_id`) REFERENCES `slider_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_item_translations`
--

LOCK TABLES `slider_item_translations` WRITE;
/*!40000 ALTER TABLE `slider_item_translations` DISABLE KEYS */;
INSERT INTO `slider_item_translations` VALUES (1,1,'Welcome to Your Indonesian Cloud Partner','Welcome to Your Indonesian Cloud Partner','<p>Welcome to Your <strong>Indonesian Cloud Partner</strong></p>',NULL,NULL,1,'en','2021-05-09 22:13:39','2021-06-04 08:36:05'),(2,1,'Welcome to Your Indonesian Cloud Partner','Welcome to Your Indonesian Cloud Partner','<p>Welcome to Your Indonesian Cloud Partner</p>',NULL,NULL,1,'id','2021-05-09 22:13:39','2021-05-09 22:13:39'),(3,2,'Products',NULL,NULL,NULL,NULL,1,'en','2021-05-12 21:15:16','2021-06-06 18:27:45'),(4,2,'Products',NULL,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',NULL,NULL,1,'id','2021-05-12 21:15:16','2021-05-12 21:15:16'),(5,3,'Solutions',NULL,NULL,NULL,NULL,1,'en','2021-05-17 19:57:56','2021-06-06 18:27:28'),(6,3,'Solutions',NULL,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',NULL,NULL,1,'id','2021-05-17 19:57:56','2021-05-17 19:57:56'),(8,5,'Soar into The Clouds Your Indonesian Cloud Partner',NULL,'<p>Soar into The Clouds</p>\r\n\r\n<p><strong>Your Indonesian Cloud Partner</strong></p>',NULL,NULL,1,'en','2021-06-04 08:29:49','2021-06-04 08:29:49'),(9,5,'Soar into The Clouds Your Indonesian Cloud Partner',NULL,'<p>Soar into The Clouds</p>\r\n\r\n<p><strong>Your Indonesian Cloud Partner</strong></p>',NULL,NULL,1,'id','2021-06-04 08:29:49','2021-06-04 08:29:49');
/*!40000 ALTER TABLE `slider_item_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_items`
--

DROP TABLE IF EXISTS `slider_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slider_id` bigint(20) unsigned NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  `author_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slider_items_slider_id_foreign` (`slider_id`),
  CONSTRAINT `slider_items_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_items`
--

LOCK TABLES `slider_items` WRITE;
/*!40000 ALTER TABLE `slider_items` DISABLE KEYS */;
INSERT INTO `slider_items` VALUES (1,1,'uploads/M00OFMDt7eUk0T0uDjwLHOs1bzqwNdqwNmssvrCr.png',NULL,1,1,'2021-05-09 22:13:39','2021-06-04 08:33:06'),(2,2,'uploads/c3hEAJXZhPyFInyO8Ug08IIc2uJWWQjMadjBaXmE.jpg',NULL,1,1,'2021-05-12 21:15:16','2021-05-12 21:15:16'),(3,3,'uploads/w9xopvEs6IF6KfCCY4ry3jEnFFc5hARbR2bHtCFp.jpg','uploads/shCF56gw62mPQvY3X0VmilrSemS51gN8ONKjCpNL.mkv',1,1,'2021-05-17 19:57:56','2021-05-27 09:06:16'),(5,1,'uploads/dXD5SODL3uhAbjBowR0jlnlotaaJhspI08GrOiZk.png',NULL,1,1,'2021-06-04 08:29:49','2021-06-04 08:29:49');
/*!40000 ALTER TABLE `slider_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_title` tinyint(4) NOT NULL,
  `field_subtitle` tinyint(4) NOT NULL,
  `field_description` tinyint(4) NOT NULL,
  `field_cta` tinyint(4) NOT NULL,
  `author_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'Home','home',1,0,1,1,1,NULL,NULL),(2,'Product','product',1,0,1,1,1,NULL,NULL),(3,'Solution','solution',1,0,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solution_has_use_cases`
--

DROP TABLE IF EXISTS `solution_has_use_cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solution_has_use_cases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `solution_id` bigint(20) unsigned NOT NULL,
  `use_case_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `solution_has_use_cases_solution_id_foreign` (`solution_id`),
  KEY `solution_has_use_cases_use_case_id_foreign` (`use_case_id`),
  CONSTRAINT `solution_has_use_cases_solution_id_foreign` FOREIGN KEY (`solution_id`) REFERENCES `solutions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `solution_has_use_cases_use_case_id_foreign` FOREIGN KEY (`use_case_id`) REFERENCES `use_cases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution_has_use_cases`
--

LOCK TABLES `solution_has_use_cases` WRITE;
/*!40000 ALTER TABLE `solution_has_use_cases` DISABLE KEYS */;
INSERT INTO `solution_has_use_cases` VALUES (5,1,1),(6,2,1);
/*!40000 ALTER TABLE `solution_has_use_cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solution_translations`
--

DROP TABLE IF EXISTS `solution_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solution_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `solution_id` bigint(20) unsigned NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_1` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_2` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `solution_translations_solution_id_lang_unique` (`solution_id`,`lang`),
  KEY `solution_translations_lang_index` (`lang`),
  CONSTRAINT `solution_translations_solution_id_foreign` FOREIGN KEY (`solution_id`) REFERENCES `solutions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution_translations`
--

LOCK TABLES `solution_translations` WRITE;
/*!40000 ALTER TABLE `solution_translations` DISABLE KEYS */;
INSERT INTO `solution_translations` VALUES (1,1,'Banking','banking','Why Choose Us For<br>Banking Solutions?','imgs/solutions/solution-detail.jpg','imgs/solutions/svg/solutions/banking.svg','imgs/solutions/svg/solutions/banking-blue.svg','Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta’s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','en','2021-05-12 20:08:17','2021-05-19 08:12:03'),(2,1,'Banking','banking','Why Choose Us For<br>Banking Solutions?','imgs/solutions/solution-detail.jpg','imgs/solutions/svg/solutions/banking.svg','imgs/solutions/svg/solutions/banking-blue.svg','Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta’s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta’s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','id','2021-05-12 20:08:17','2021-05-12 20:08:17'),(3,2,'Finance Non-Bank','finance-non-bank','Why Choose Us For<br>Finance Non-Bank Solutions?','imgs/solutions/solution-detail.jpg','imgs/solutions/svg/solutions/banking.svg','imgs/solutions/svg/solutions/banking-blue.svg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','en','2021-05-12 20:09:35','2021-05-12 20:09:35'),(4,2,'Finance Non-Bank','finance-non-bank','Why Choose Us For<br>Finance Non-Bank Solutions?','imgs/solutions/solution-detail.jpg','imgs/solutions/svg/solutions/banking.svg','imgs/solutions/svg/solutions/banking-blue.svg','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','id','2021-05-12 20:09:35','2021-05-12 20:09:35'),(5,3,'Government','government','Why Choose Us For <br>Government Solutions?','solution/FvB2FSazNfQThttP9jDxu99ggtRBKPS8qy3HruXZ.jpg','solution/LpvenvHDMM7wCGkJ6EOiY4Vkj4Et1IoDTMfW3AfE.svg','solution/vLLORVVcqGt4GlJzxrlOVFSJK45Eka9LEWfSKrfD.svg','Public Cloud service equipped with comprehensive features.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','en','2021-05-21 08:38:35','2021-05-21 09:21:53'),(6,3,'Government','government','Why Choose Us For <br>Government Solutions?','solution/FvB2FSazNfQThttP9jDxu99ggtRBKPS8qy3HruXZ.jpg','solution/LpvenvHDMM7wCGkJ6EOiY4Vkj4Et1IoDTMfW3AfE.svg','solution/vLLORVVcqGt4GlJzxrlOVFSJK45Eka9LEWfSKrfD.svg','Public Cloud service equipped with comprehensive features.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','id','2021-05-21 08:38:35','2021-05-21 08:38:35'),(7,4,'Resources','resources','Why Choose Us For <br>Banking Solutions?','solution/xrPmBcuTYJxZkCJ55CDSAu4pixIWwLqf6s5DxUtR.jpg','solution/5dP7MsTzNkXantwWxWP3SVYYOO7W27QpmoBaJLec.svg','solution/X0DFJiQsiH3cu9U4FiiCoZ0bnnYLxBimWbwFAEKN.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','en','2021-05-21 08:48:51','2021-05-21 09:23:10'),(8,4,'Resources','resources','Why Choose Us For <br>Banking Solutions?','solution/xrPmBcuTYJxZkCJ55CDSAu4pixIWwLqf6s5DxUtR.jpg','solution/5dP7MsTzNkXantwWxWP3SVYYOO7W27QpmoBaJLec.svg','solution/X0DFJiQsiH3cu9U4FiiCoZ0bnnYLxBimWbwFAEKN.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','id','2021-05-21 08:48:51','2021-05-21 08:48:51'),(9,5,'Plantation','plantation','Why Choose Us For <br>Plantation Solutions?','solution/pSugufPV06zgQivfqaujmfge7DumHVRNSN7h1U6n.jpg','solution/eANexliyFvikDhHfzVjvrGGMWeTAdVGn2ee8nWwV.svg','solution/DJP5jfTylHAzmqeku3sVwy4SDHFYiQoiQ96Ue9Z8.svg','Public Cloud service equipped with comprehensive features.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','en','2021-05-21 08:58:44','2021-05-21 09:25:23'),(10,5,'Plantation','plantation','Why Choose Us For <br>Plantation Solutions?','solution/pSugufPV06zgQivfqaujmfge7DumHVRNSN7h1U6n.jpg','solution/eANexliyFvikDhHfzVjvrGGMWeTAdVGn2ee8nWwV.svg','solution/DJP5jfTylHAzmqeku3sVwy4SDHFYiQoiQ96Ue9Z8.svg','Public Cloud service equipped with comprehensive features.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','id','2021-05-21 08:58:44','2021-05-21 08:58:44'),(11,6,'Manfacture','manfacture','Why Choose Us For <br>Manufacture Solutions?','solution/ezEGEi6ZyWr1hZ5tAFVB7qIp5gbv6D7Oi3mgHbOW.jpg','solution/Pzyuvsayas6DQyjdhVDc5Ejvx699yaOd7HwORrfV.svg','solution/rLeYLRwtZjI0ZrgmynwHmTYUPlWpy4qZIKwZisSo.svg','Public Cloud service equipped with comprehensive features.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','en','2021-05-21 09:01:56','2021-05-21 09:28:44'),(12,6,'Manfacture','manfacture','Why Choose Us For <br>Manufacture Solutions?','solution/ezEGEi6ZyWr1hZ5tAFVB7qIp5gbv6D7Oi3mgHbOW.jpg','solution/Pzyuvsayas6DQyjdhVDc5Ejvx699yaOd7HwORrfV.svg','solution/rLeYLRwtZjI0ZrgmynwHmTYUPlWpy4qZIKwZisSo.svg','Public Cloud service equipped with comprehensive features.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','id','2021-05-21 09:01:56','2021-05-21 09:01:56'),(13,7,'Higher Education','higher-education','Why Choose Us For <br>Higher Education <br>Solutions?','solution/7kC9aG95kg91OWpveqo9OBbum8UVs7k5vgN9uiaS.jpg','solution/oHJERHSJ7Y4wH4N5XFce4bfQyvTuxzMjsNLwV5My.svg','solution/EaDmgxe8KAHwwg6iWW3IaxhnTZ4tospGZKJwQUkA.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','en','2021-05-21 09:03:20','2021-05-21 09:32:15'),(14,7,'Higher Education','higher-education','Why Choose Us For <br>Higher Education <br>Solutions?','solution/7kC9aG95kg91OWpveqo9OBbum8UVs7k5vgN9uiaS.jpg','solution/oHJERHSJ7Y4wH4N5XFce4bfQyvTuxzMjsNLwV5My.svg','solution/EaDmgxe8KAHwwg6iWW3IaxhnTZ4tospGZKJwQUkA.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','id','2021-05-21 09:03:20','2021-05-21 09:03:20'),(15,8,'Hospital','hospital','Why Choose Us For <br>Hospital Solutions?','solution/ihiF5yqcuXxLayE1bZriGf41htwKJU5QWwlJBzxC.jpg','solution/ZWVP2iUGF2tVZgTuzZHl0CHSb5Qf8Pz4aUC4G2PA.svg','solution/QG1oLepczaUT1HsXAIdDnL7hNAdmvO7mXw3FoWkT.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','en','2021-05-21 09:05:51','2021-05-21 09:34:29'),(16,8,'Hospital','hospital','Why Choose Us For <br>Hospital Solutions?','solution/ihiF5yqcuXxLayE1bZriGf41htwKJU5QWwlJBzxC.jpg','solution/ZWVP2iUGF2tVZgTuzZHl0CHSb5Qf8Pz4aUC4G2PA.svg','solution/QG1oLepczaUT1HsXAIdDnL7hNAdmvO7mXw3FoWkT.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','id','2021-05-21 09:05:51','2021-05-21 09:05:51'),(17,9,'Telco','telco','Why choose us for <br>Telco Solutions?','solution/qpTUmkMNn9YCYy2CPGf3YSunS0g8e5GX5s43sQDe.jpg','solution/Ops50Gxf37NGxbLcXbifTxi5hewhPqBDDl0eTGQY.svg','solution/U3MsO0LDk00p5lNJPPLcqFlZQtq1a060ws8cPHNa.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','en','2021-05-21 09:07:47','2021-05-21 09:20:24'),(18,9,'Telco','telco','Why choose us for <br>Telco Solutions?','solution/qpTUmkMNn9YCYy2CPGf3YSunS0g8e5GX5s43sQDe.jpg','solution/Ops50Gxf37NGxbLcXbifTxi5hewhPqBDDl0eTGQY.svg','solution/U3MsO0LDk00p5lNJPPLcqFlZQtq1a060ws8cPHNa.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','id','2021-05-21 09:07:47','2021-05-21 09:07:47'),(19,10,'Digital Company','digital-company','Why choose us for <br>Digital Company <br>Solutions?','solution/dSbMBdVSHHARC3qU7CrBGJL3HzP2rVZd0j5B7803.jpg','solution/DmnCdOdGAWYksaAPTsy8rtuwFAySLBhKkNuyKOrf.svg','solution/t3aSupf1rdJNUbWin9sln4VstYasKpgadCwYaCVz.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','en','2021-05-21 09:09:37','2021-05-21 09:35:42'),(20,10,'Digital Company','digital-company','Why choose us for <br>Digital Company <br>Solutions?','solution/dSbMBdVSHHARC3qU7CrBGJL3HzP2rVZd0j5B7803.jpg','solution/DmnCdOdGAWYksaAPTsy8rtuwFAySLBhKkNuyKOrf.svg','solution/t3aSupf1rdJNUbWin9sln4VstYasKpgadCwYaCVz.svg','Public Cloud service equipped with comprehensive features.','<p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta&rsquo;s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>','id','2021-05-21 09:09:37','2021-05-21 09:09:37');
/*!40000 ALTER TABLE `solution_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solutions`
--

DROP TABLE IF EXISTS `solutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solutions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solutions`
--

LOCK TABLES `solutions` WRITE;
/*!40000 ALTER TABLE `solutions` DISABLE KEYS */;
INSERT INTO `solutions` VALUES (1,'2021-05-12 20:08:17','2021-05-12 20:08:17'),(2,'2021-05-12 20:09:35','2021-05-12 20:09:35'),(3,'2021-05-21 08:38:35','2021-05-21 08:38:35'),(4,'2021-05-21 08:48:51','2021-05-21 08:48:51'),(5,'2021-05-21 08:58:44','2021-05-21 08:58:44'),(6,'2021-05-21 09:01:56','2021-05-21 09:01:56'),(7,'2021-05-21 09:03:20','2021-05-21 09:03:20'),(8,'2021-05-21 09:05:51','2021-05-21 09:05:51'),(9,'2021-05-21 09:07:47','2021-05-21 09:07:47'),(10,'2021-05-21 09:09:37','2021-05-21 09:09:37');
/*!40000 ALTER TABLE `solutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribers` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
INSERT INTO `subscribers` VALUES (2,'varian@labelideas.co','2021-06-07 04:34:30');
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `use_case_translations`
--

DROP TABLE IF EXISTS `use_case_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `use_case_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `use_case_id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `use_case_translations_use_case_id_lang_unique` (`use_case_id`,`lang`),
  KEY `use_case_translations_lang_index` (`lang`),
  CONSTRAINT `use_case_translations_use_case_id_foreign` FOREIGN KEY (`use_case_id`) REFERENCES `use_cases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `use_case_translations`
--

LOCK TABLES `use_case_translations` WRITE;
/*!40000 ALTER TABLE `use_case_translations` DISABLE KEYS */;
INSERT INTO `use_case_translations` VALUES (1,1,'<p>Askrindo uses Deka Prime (PX1)&nbsp;by Lintasarta Cloudeka to serve the needs of their customers. They have also successfully used the Resource Pool service, integrate to Cloud Backup, Disaster Recovery services, and is connected directly to the customer&#39;s location.</p>','en','2021-05-10 22:42:00','2021-06-05 09:30:35'),(2,1,'<p>Askrindo menggunakan Deka Prime (PX1) dari Lintasarta Cloudeka untuk memenuhi kebutuhan bisnis pelanggan. Selain itu, Askrindo juga telah berhasil menggunakan layanan Resource Pool serta terintegrasi dengan layan Cloud Backup, Disaster Recovery, dan terhubung langsung ke lokasi pelanggan.</p>','id','2021-05-10 22:42:00','2021-06-05 09:31:37'),(3,2,'<p>Dirjen APTIKA built a Disaster Recovery Center cluster on Cloud which is linked to Kominfo Data Center for web filtering.</p>','en','2021-05-21 08:26:04','2021-06-04 07:27:36'),(4,2,'<p>Dirjen APTIKA membangun Disaster Recovery Center cluster on Cloud yang terhubung secara langsung ke Data Center milik Kominfo untuk melakukan web filtering.<br />\r\n&nbsp;</p>','id','2021-05-21 08:26:04','2021-06-04 10:32:52'),(7,4,'<p>Lintasarta Cloudeka&#39;s Deka Prime (PX1) Service is used for the back-office application of PDAM Bandarmasih.</p>','en','2021-05-21 08:26:04','2021-06-05 09:29:04'),(8,4,'<p>Layanan Deka Prime (PX1) milik Lintasarta Cloudeka digunakan untuk keperluan aplikasi back-office PDAM Bandarmasih.</p>','id','2021-05-21 08:26:04','2021-06-05 09:29:21'),(27,14,'<p>BAKTI utilises the Deka Prime (PX1) service from Lintasarta Cloudeka which has successfully been implemented to monitor the VSAT connection all around Indonesia. The data storage is deployed in the Lintasarta Disaster Recovery Center at Jatiluhur that is directly connected to Lintasarta VSAT.</p>','en','2021-06-04 07:26:40','2021-06-05 09:32:12'),(28,14,'<p>BAKTI memanfaatkan Layanan Deka Prime (PX1) milik Lintasarta Cloudeka yang telah behasil mengawasi jaringan VSAT se-Indonesia. Penyimpanan data diimplementasikan di Lintasarta Disaster Recovery Center Jatiluhur yang langsung terhubung ke VSAT milik Lintasarta.</p>','id','2021-06-04 07:26:40','2021-06-04 10:29:30'),(29,15,'<p>KSO Sucofindo uses Deka Vault by duplicating the data in their on-premise Data Center to the Cloud Disaster Recovery Center. So that all data is stored safely in the event of a disaster and other catastrophes.</p>','en','2021-06-04 11:20:18','2021-06-04 11:20:43'),(30,15,'<p>KSO Sucofindo menggunakan Deka Vault dengan menggandakan data di Data Center on-premise mereka ke Cloud Disaster Recovery Center. Sehingga seluruh data tersimpan aman jika terjadi bencana dan hal buruk lainnya.</p>','id','2021-06-04 11:20:18','2021-06-04 11:20:18'),(31,16,'<p>PHSS built end-to-end (private) Cloud Priority clusters for Data Center and Disaster Recovery Center. Also, PHSS combines Baremetal and Virtual Machine at more than two different sites, including at their customers&#39; location.<br />\r\n&nbsp;</p>','en','2021-06-04 12:34:42','2021-06-04 12:34:42'),(32,16,'<p>PHSS membangun end-to-end (private) Cloud Priority cluster untuk Data Center dan Disaster Recovery Center. Tidak hanya itu, PHSS mengombinasikan Baremetal dan Virtual Machine untuk di lebih dari dua lokasi, termasuk di lokasi pelanggan mereka.<br />\r\n&nbsp;</p>','id','2021-06-04 12:34:42','2021-06-04 12:35:13'),(33,17,'<p>Lintasarta Cloudeka has successfully assisted SAKA in migrating and building an end-to-end (private) Cloud Priority cluster for the Data Center and Disaster Recovery Center.<br />\r\n&nbsp;</p>','en','2021-06-04 12:37:30','2021-06-04 12:38:44'),(34,17,'<p><br />\r\nLintasarta Cloudeka berhasil membantu SAKA dalam bermigrasi dan membangun end-to-end (private) Cloud Priority cluster untuk Data Center dan Disaster Recovery Center</p>','id','2021-06-04 12:37:30','2021-06-04 12:37:54'),(35,18,'<p>Not only they built an end-to-end (private) Cloud Priority cluster for Data Centers and Disaster Recovery Centers, CRIF also uses Managed Replication services and combines Baremetal and Virtual Machines with Lintasarta Cloudeka.<br />\r\n&nbsp;</p>','en','2021-06-04 12:39:09','2021-06-04 12:39:41'),(36,18,'<p>Selain membangun end-to-end (private) Deka Priority cluster untuk Data Center dan Disaster Recovery Center, CRIF juga menggunakan layanan Managed Replication dan mengombinasikan Baremetal dan Virtual Machine.<br />\r\n&nbsp;</p>','id','2021-06-04 12:39:09','2021-06-04 12:39:09'),(37,19,'<p>TBC</p>','en','2021-06-04 12:40:15','2021-06-04 12:40:15'),(38,19,'<p>TBC</p>','id','2021-06-04 12:40:15','2021-06-04 12:40:15'),(39,20,'<p>BKKBN has successfully used Deka Harbor by Lintasarta Cloudeka service for the deployment of a family information system web application and as an Indonesian family database.</p>','en','2021-06-04 12:59:34','2021-06-04 12:59:59'),(40,20,'<p>BKKBN telah menikmati layanan Deka Harbor milik Lintasarta Cloudeka untuk deployment aplikasi web sistem informasi keluarga dan sebagai database keluarga masyarakat Indonesia.</p>','id','2021-06-04 12:59:34','2021-06-04 12:59:34'),(41,21,'<p>Kominfo Pusbang uses Deka Harbor from Lintasarta Cloudeka for the development of a digital scholarship website that can be accessed by more than 1,000 users.<br />\r\n&nbsp;</p>','en','2021-06-04 13:06:45','2021-06-04 13:06:45'),(42,21,'<p><br />\r\nKominfo Pusbang menggunakan Deka Harbor dari Lintasarta Cloudeka untuk pengembangan website digital scholarship yang dapat diakses lebih dari 1.000 pengguna.</p>','id','2021-06-04 13:06:45','2021-06-04 13:08:01'),(43,22,'<p>Lorem Ipsum Lorem Ipsum Lorem Ipsum..</p>','en','2021-06-05 02:31:19','2021-06-05 02:31:19'),(44,22,'<p>Lorem Ipsum Lorem Ipsum Lorem Ipsum..</p>','id','2021-06-05 02:31:19','2021-06-05 02:31:19'),(45,23,'<p>Lorem Ipsum Lorem Ipsum..</p>','en','2021-06-05 02:35:48','2021-06-05 02:35:48'),(46,23,'<p>Lorem Ipsum Lorem Ipsum..</p>','id','2021-06-05 02:35:48','2021-06-05 02:35:48'),(47,24,'<p>Lorem Ipsum Lorem Ipsum..</p>','en','2021-06-05 02:36:21','2021-06-05 02:36:21'),(48,24,'<p>Lorem Ipsum Lorem Ipsum..</p>','id','2021-06-05 02:36:21','2021-06-05 02:36:21'),(49,25,'<p>Lorem Ipsum Lorem Ipsum</p>','en','2021-06-05 02:36:38','2021-06-05 02:36:38'),(50,25,'<p>Lorem Ipsum Lorem Ipsum</p>','id','2021-06-05 02:36:38','2021-06-05 02:36:38'),(51,26,'<p>Lorem Ipsum Lorem Ipsum..</p>','en','2021-06-05 02:42:50','2021-06-05 02:42:50'),(52,26,'<p>Lorem Ipsum Lorem Ipsum..</p>','id','2021-06-05 02:42:50','2021-06-05 02:42:50'),(53,27,'<p>Lorem Ipsum Lorem Ipsum</p>','en','2021-06-05 02:45:11','2021-06-05 02:45:11'),(54,27,'<p>Lorem Ipsum Lorem Ipsum</p>','id','2021-06-05 02:45:11','2021-06-05 02:45:11'),(55,28,'<p>Lorem Ipsum Lorem Ipsum</p>','en','2021-06-05 03:10:09','2021-06-05 03:10:09'),(56,28,'<p>Lorem Ipsum Lorem Ipsum</p>','id','2021-06-05 03:10:09','2021-06-05 03:10:09'),(57,29,'<p>Lorem Ipsum Lorem Ipsum</p>','en','2021-06-05 03:10:22','2021-06-05 03:10:22'),(58,29,'<p>Lorem Ipsum Lorem Ipsum</p>','id','2021-06-05 03:10:22','2021-06-05 03:10:22'),(59,30,'<p>Lorem Ipsum Lorem Ipsum</p>','en','2021-06-05 03:10:40','2021-06-05 03:10:40'),(60,30,'<p>Lorem Ipsum Lorem Ipsum</p>','id','2021-06-05 03:10:40','2021-06-05 03:10:40'),(61,31,'<p>Lorem Ipsum Lorem Ipsum</p>','en','2021-06-05 03:11:00','2021-06-05 03:11:00'),(62,31,'<p>Lorem Ipsum Lorem Ipsum</p>','id','2021-06-05 03:11:00','2021-06-05 03:11:00');
/*!40000 ALTER TABLE `use_case_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `use_cases`
--

DROP TABLE IF EXISTS `use_cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `use_cases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `use_cases_client_id_foreign` (`client_id`),
  CONSTRAINT `use_cases_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `use_cases`
--

LOCK TABLES `use_cases` WRITE;
/*!40000 ALTER TABLE `use_cases` DISABLE KEYS */;
INSERT INTO `use_cases` VALUES (1,1,1,'2021-05-10 22:42:00','2021-05-10 22:42:00'),(2,2,1,'2021-05-21 08:26:04','2021-05-21 08:26:04'),(4,4,1,'2021-05-21 08:26:04','2021-05-21 08:26:04'),(14,15,1,'2021-06-04 07:26:40','2021-06-04 07:26:40'),(15,7,1,'2021-06-04 11:20:18','2021-06-04 11:20:18'),(16,17,1,'2021-06-04 12:34:42','2021-06-04 12:34:42'),(17,18,1,'2021-06-04 12:37:30','2021-06-04 12:37:30'),(18,9,1,'2021-06-04 12:39:09','2021-06-04 12:39:09'),(19,10,1,'2021-06-04 12:40:15','2021-06-04 12:40:15'),(20,3,1,'2021-06-04 12:59:34','2021-06-04 12:59:34'),(21,5,1,'2021-06-04 13:06:45','2021-06-04 13:06:45'),(22,11,1,'2021-06-05 02:31:19','2021-06-05 02:31:19'),(23,14,1,'2021-06-05 02:35:48','2021-06-05 02:35:48'),(24,13,1,'2021-06-05 02:36:21','2021-06-05 02:36:21'),(25,12,1,'2021-06-05 02:36:38','2021-06-05 02:36:38'),(26,19,1,'2021-06-05 02:42:50','2021-06-05 02:42:50'),(27,20,1,'2021-06-05 02:45:11','2021-06-05 02:45:11'),(28,21,1,'2021-06-05 03:10:09','2021-06-05 03:10:09'),(29,22,1,'2021-06-05 03:10:22','2021-06-05 03:10:22'),(30,23,1,'2021-06-05 03:10:40','2021-06-05 03:10:40'),(31,24,1,'2021-06-05 03:11:00','2021-06-05 03:11:00');
/*!40000 ALTER TABLE `use_cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@cloud.id','2021-05-10 22:16:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','ogPuysQHAePqFwt1KW9qMXypBefmxImZi4JrxiAS5cvvwh48vK9mBeYIO6IE','2021-05-10 22:16:56','2021-05-10 22:16:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-07 23:48:24
