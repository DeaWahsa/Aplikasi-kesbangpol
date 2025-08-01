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

 Date: 22/07/2025 11:32:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tabel_persyaratan
-- ----------------------------
INSERT INTO `tabel_persyaratan` VALUES (2, 'Dea Wahsa Saputri', '2025-07-17 13:33:04', '2025-07-17 13:33:04');
INSERT INTO `tabel_persyaratan` VALUES (3, 'Sari Bulan', '2025-07-17 15:16:20', '2025-07-17 15:16:20');
INSERT INTO `tabel_persyaratan` VALUES (4, 'dea', '2025-07-17 15:19:38', '2025-07-17 15:19:38');
INSERT INTO `tabel_persyaratan` VALUES (5, 'gggg', '2025-07-18 07:08:21', '2025-07-18 07:08:21');
INSERT INTO `tabel_persyaratan` VALUES (6, 'sssssssssss', '2025-07-18 07:23:55', '2025-07-18 07:23:55');
INSERT INTO `tabel_persyaratan` VALUES (7, 'aaaaaaaaa', '2025-07-18 07:45:02', '2025-07-18 07:45:02');
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

SET FOREIGN_KEY_CHECKS = 1;
