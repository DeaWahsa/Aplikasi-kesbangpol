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

 Date: 27/08/2025 20:27:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_formpendaftaran
-- ----------------------------
DROP TABLE IF EXISTS `m_formpendaftaran`;
CREATE TABLE `m_formpendaftaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor_registrasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_kelompok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_surat_permohonan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_surat_permohonan` date NULL DEFAULT NULL,
  `hal_surat_permohonan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `no_surat_dinas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_surat_dinas` date NULL DEFAULT NULL,
  `hal_surat_dinas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bidang_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `program_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_kantor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_pendirian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `waktu_pendirian` date NULL DEFAULT NULL,
  `asas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tujuan_kelompok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_pendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik_pendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `agama_pendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jk_pendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tl_pendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgll_pendiri` date NULL DEFAULT NULL,
  `status_kawin_pendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_pendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hp_pendiri` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_pendiri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_pembina` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_penasehat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ketua_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik_ketua_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `agama_ketua_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jk_ketua_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tl_ketua_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgll_ketua_pengurus` date NULL DEFAULT NULL,
  `status_kawin_ketua_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_ketua_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hp_ketua_pengurus` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_ketua_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `agama_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jk_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tl_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgll_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kawin_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hp_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_sekretaris_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `agama_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jk_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tl_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgll_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kawin_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hp_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_bendahara_pengurus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `masa_kepengurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keputusan_kelompok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sumber_keuangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logo_kelompok` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_desa` bigint NULL DEFAULT NULL,
  `id_kecamatan` bigint NULL DEFAULT NULL,
  `status` int NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_formpendaftaran
-- ----------------------------
INSERT INTO `m_formpendaftaran` VALUES (26, NULL, 'sxfnxb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-08-26 06:52:22', '2025-08-26 06:52:22');
INSERT INTO `m_formpendaftaran` VALUES (27, 'REG202508260027', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-08-26 07:01:06', '2025-08-26 07:01:06');
INSERT INTO `m_formpendaftaran` VALUES (28, 'REG202508260028', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-08-26 07:04:09', '2025-08-26 07:04:09');
INSERT INTO `m_formpendaftaran` VALUES (29, 'REG202508260029', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-08-26 07:06:21', '2025-08-26 07:24:30');
INSERT INTO `m_formpendaftaran` VALUES (30, 'REG202508260026', 'erbesvddsv', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-08-26 07:13:07', '2025-08-26 07:29:08');
INSERT INTO `m_formpendaftaran` VALUES (31, 'REG202508260031', 'yrkkuryy', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-08-26 07:42:30', '2025-08-26 07:42:30');
INSERT INTO `m_formpendaftaran` VALUES (32, 'REG202508260032', 'wb5ysrybhe', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-08-26 07:44:15', '2025-08-26 07:44:15');
INSERT INTO `m_formpendaftaran` VALUES (33, 'REG202508270033', 'kelompok tani bawalipu', '90/VII/Bawalipu', '2025-08-22', 'surat permohonan', '90/VII/Pertanian', '2025-06-27', 'surat keterangan', 'aefeas', 'ytjytf', 'ghnmhvbn', 'gtvtvg', '2025-08-04', 'tvrythttf', 'iujjutkk', 'hyhytjyuk', '123345678', '4', '1', 'ygjuyyu', '2025-08-22', '1', 'sfhfgtykyukhjb', '54789086656', 'dvdhfyjy', 'dfhyjukuylu', 'sdfdfefe', 'dgfgfd', '1234567890', '3', '1', 'thyyth', '2025-02-24', '1', 'egtrjnjygn', '576886786786', 'hkfgjhhkj', 'fdhjulk', '4667890244', '6', '1', 'esgfdfbfgn', '2025-06-18', '1', 'dsgfjhillj', '123345679', 'dsvdrvdfv', 'ftbgfbrd', '125490', '3', '1', 'sdgfdgvfd', '2025-08-06', '2', 'fdvgdbgc', '23534635645634', 'xzgfngfcngfn', '1', 'dsvfvfvsdv', 'fdhtymnj', 'xyjdhtjyk', '1756281926_dufan.jpg', NULL, NULL, 0, '2025-08-27 08:05:26', '2025-08-27 08:05:26');
INSERT INTO `m_formpendaftaran` VALUES (34, 'REG202508270034', 'kelompok seni lampenai', '458/II/Lampenai', '2025-06-10', 'surat permohonan', '764/VI/Kesenian', '2025-08-12', 'surat keterangan', 'efsd', 'dsf', 'dsvsd', 'sdvfdv', '2025-06-23', 'sdvdf', 'dsvfdv', 'fgjyg', '12152678', '6', '1', 'sdgth', '2025-02-04', '2', 'dsgrgtr', '1325479', 'dsgh', 'asfdfh', 'dfhgfj', 'sgdg', '13477', '3', '1', 'dagfs', '2025-07-09', '1', 'dsvfv', '9089785', 'kgkgku', 'kugkg', '74637778', '1', '2', 'uhkghk', '2025-08-05', '2', 'hkugfy', '09896', 'hkjk', 'kgg', '079654', '3', '1', 'thmf', '2025-08-14', '1', 'lyuutd', '5768769', 'sagvfd', '2', 'fdhgkhm', 'fjhlij', 'zsfedgrdg', '1756295442_STRUCTURED-CABLING-rev.jpg', 7325071020, 7325071, 0, '2025-08-27 11:50:42', '2025-08-27 11:50:42');

SET FOREIGN_KEY_CHECKS = 1;
