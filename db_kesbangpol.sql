/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80403 (8.4.3)
 Source Host           : localhost:3306
 Source Schema         : db_kesbangpol

 Target Server Type    : MySQL
 Target Server Version : 80403 (8.4.3)
 File Encoding         : 65001

 Date: 01/08/2025 21:27:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for m_filepersyaratan
-- ----------------------------
DROP TABLE IF EXISTS `m_filepersyaratan`;
CREATE TABLE `m_filepersyaratan`  (
  `id` int NOT NULL,
  `id_pendaftaran` int NULL DEFAULT NULL,
  `id_persyaratan` int NULL DEFAULT NULL,
  `nama_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ext` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `original_file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_filepersyaratan
-- ----------------------------

-- ----------------------------
-- Table structure for m_formpendaftaran
-- ----------------------------
DROP TABLE IF EXISTS `m_formpendaftaran`;
CREATE TABLE `m_formpendaftaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik` decimal(16, 0) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_formpendaftaran
-- ----------------------------
INSERT INTO `m_formpendaftaran` VALUES (3, 'DEA WAHSA SAPUTRI', 'jln. Padaidi, Bawalipu, Wotu', 7324041704870001, '2025-07-28 02:10:22', '2025-07-28 02:10:22');
INSERT INTO `m_formpendaftaran` VALUES (4, 'Sari Bulan', 'jln. Padaidi, Bawalipu, Wotu', 7324080108980003, '2025-07-28 13:03:41', '2025-07-28 13:03:41');
INSERT INTO `m_formpendaftaran` VALUES (8, 'Sari Bulan', 'jln. Padaidi, Bawalipu, Wotu', 7324061607920001, '2025-07-28 13:11:17', '2025-07-28 13:11:17');
INSERT INTO `m_formpendaftaran` VALUES (10, 'IRMAWATI TARRA', 'jln. Padaidi, Bawalipu, Wotu', 7324080108980003, '2025-07-28 13:24:29', '2025-07-28 13:24:29');
INSERT INTO `m_formpendaftaran` VALUES (11, 'Sari Bulan6666', 'jln. Padaidi, Bawalipu, Wotu', 7324041704870001, '2025-07-28 14:09:43', '2025-07-30 01:58:59');
INSERT INTO `m_formpendaftaran` VALUES (12, 'Sari Bulan3388kuyt', 'jln. Padaidi, Bawalipu, Wotu77jj', 732404170487, '2025-07-28 14:09:59', '2025-07-30 02:08:41');

-- ----------------------------
-- Table structure for m_persyaratans
-- ----------------------------
DROP TABLE IF EXISTS `m_persyaratans`;
CREATE TABLE `m_persyaratans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_persyaratan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_persyaratans
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2025_07_17_060846_create_m_persyaratans_table', 1);
INSERT INTO `migrations` VALUES (6, '2025_07_24_065704_create_m_formpendaftarans_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for tabel_persyaratan
-- ----------------------------
DROP TABLE IF EXISTS `tabel_persyaratan`;
CREATE TABLE `tabel_persyaratan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_persyaratan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tabel_persyaratan
-- ----------------------------
INSERT INTO `tabel_persyaratan` VALUES (2, 'Dea Wahsa Saputri', '2025-07-17 13:33:04', '2025-07-17 13:33:04');
INSERT INTO `tabel_persyaratan` VALUES (3, 'Sari Bulan', '2025-07-17 15:16:20', '2025-07-17 15:16:20');
INSERT INTO `tabel_persyaratan` VALUES (4, 'dea', '2025-07-17 15:19:38', '2025-07-17 15:19:38');
INSERT INTO `tabel_persyaratan` VALUES (6, 'sssssssssss', '2025-07-18 07:23:55', '2025-07-18 07:23:55');
INSERT INTO `tabel_persyaratan` VALUES (8, 'aaaaaaaaa', '2025-07-18 07:49:40', '2025-07-18 07:49:40');
INSERT INTO `tabel_persyaratan` VALUES (9, 'ttt', '2025-07-18 08:06:59', '2025-07-18 08:06:59');
INSERT INTO `tabel_persyaratan` VALUES (10, '11111111', '2025-07-18 08:07:27', '2025-07-18 08:07:27');
INSERT INTO `tabel_persyaratan` VALUES (11, 'yuuuuy', '2025-07-18 08:08:42', '2025-07-18 08:08:42');
INSERT INTO `tabel_persyaratan` VALUES (12, 'ww', '2025-07-20 13:32:44', '2025-07-20 13:32:44');
INSERT INTO `tabel_persyaratan` VALUES (13, 'ww', '2025-07-20 13:32:44', '2025-07-20 13:32:44');
INSERT INTO `tabel_persyaratan` VALUES (14, 'rrrr', '2025-07-20 13:43:20', '2025-07-20 13:43:20');
INSERT INTO `tabel_persyaratan` VALUES (15, 'rrrr', '2025-07-20 13:43:20', '2025-07-20 13:43:20');
INSERT INTO `tabel_persyaratan` VALUES (16, 'ssssart', '2025-07-20 13:43:50', '2025-07-20 13:43:50');
INSERT INTO `tabel_persyaratan` VALUES (17, 'ssssart', '2025-07-20 13:43:50', '2025-07-20 13:43:50');
INSERT INTO `tabel_persyaratan` VALUES (18, 'iiiiiiyyf', '2025-07-20 13:47:02', '2025-07-20 13:47:02');
INSERT INTO `tabel_persyaratan` VALUES (19, 'iiiiiiyyf', '2025-07-20 13:47:02', '2025-07-20 13:47:02');
INSERT INTO `tabel_persyaratan` VALUES (20, NULL, '2025-07-20 13:47:15', '2025-07-20 13:47:15');
INSERT INTO `tabel_persyaratan` VALUES (21, '1111111112', '2025-07-20 14:09:12', '2025-07-20 14:09:12');
INSERT INTO `tabel_persyaratan` VALUES (22, '1111111112', '2025-07-20 14:09:12', '2025-07-20 14:09:12');
INSERT INTO `tabel_persyaratan` VALUES (23, 'ri6', '2025-07-21 00:52:22', '2025-07-21 00:52:22');
INSERT INTO `tabel_persyaratan` VALUES (24, 'ri6', '2025-07-21 00:52:22', '2025-07-21 00:52:22');
INSERT INTO `tabel_persyaratan` VALUES (26, '555555t', '2025-07-21 01:22:23', '2025-07-21 01:22:23');
INSERT INTO `tabel_persyaratan` VALUES (27, 'wr', '2025-07-21 01:23:28', '2025-07-21 01:23:28');
INSERT INTO `tabel_persyaratan` VALUES (28, '5hh', '2025-07-21 02:28:15', '2025-07-21 02:28:15');
INSERT INTO `tabel_persyaratan` VALUES (29, 'eewq', '2025-07-21 02:28:31', '2025-07-21 02:28:31');
INSERT INTO `tabel_persyaratan` VALUES (30, 'uyrr', '2025-07-21 02:34:39', '2025-07-21 02:34:39');
INSERT INTO `tabel_persyaratan` VALUES (31, '0iuy', '2025-07-21 02:36:16', '2025-07-21 02:36:16');
INSERT INTO `tabel_persyaratan` VALUES (32, 'yfj', '2025-07-21 02:50:10', '2025-07-21 02:50:10');
INSERT INTO `tabel_persyaratan` VALUES (39, 'yth', '2025-07-21 06:41:57', '2025-07-21 06:41:57');
INSERT INTO `tabel_persyaratan` VALUES (42, 'ythhbtsiuuuu', '2025-07-21 06:43:15', '2025-07-22 00:23:30');
INSERT INTO `tabel_persyaratan` VALUES (49, 'ythhbtsiuuuu', '2025-07-22 00:23:30', '2025-07-22 00:23:30');
INSERT INTO `tabel_persyaratan` VALUES (50, '345', '2025-07-22 00:28:01', '2025-07-22 00:28:01');
INSERT INTO `tabel_persyaratan` VALUES (52, '67h', '2025-07-22 00:37:05', '2025-07-22 00:37:05');
INSERT INTO `tabel_persyaratan` VALUES (56, 'viuyyyy', '2025-07-22 00:39:08', '2025-07-22 00:39:08');
INSERT INTO `tabel_persyaratan` VALUES (57, '09000', '2025-07-22 00:39:16', '2025-07-22 00:39:16');
INSERT INTO `tabel_persyaratan` VALUES (62, 'frrsdeahhu', '2025-07-22 00:48:17', '2025-07-22 01:27:12');
INSERT INTO `tabel_persyaratan` VALUES (73, 'dbtikty', '2025-07-24 06:52:52', '2025-07-24 06:52:58');
INSERT INTO `tabel_persyaratan` VALUES (75, 'ntr65h5', '2025-07-28 01:15:46', '2025-07-28 01:15:50');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
