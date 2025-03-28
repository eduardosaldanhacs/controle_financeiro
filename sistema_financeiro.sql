/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80200 (8.2.0)
 Source Host           : localhost:3306
 Source Schema         : sistema_ju

 Target Server Type    : MySQL
 Target Server Version : 80200 (8.2.0)
 File Encoding         : 65001

 Date: 28/03/2025 16:24:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_despesas
-- ----------------------------
DROP TABLE IF EXISTS `tb_despesas`;
CREATE TABLE `tb_despesas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `despesa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `data_cadastro` date NULL DEFAULT NULL,
  `pago` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `excluido` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_usuario` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 126 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_despesas
-- ----------------------------
INSERT INTO `tb_despesas` VALUES (110, '200,00', 'CR7 0 MIOR', '2025-03-20', 'S', 'S', NULL);
INSERT INTO `tb_despesas` VALUES (111, '250,00', 'CR7 0 MIOR', '2025-03-20', 'S', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (112, '23,90', 'AÇAI', '2025-03-20', 'S', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (113, '19.9', 'SPOTFY', '2025-01-15', 'N', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (114, '10,00', 'GOOGLE', '2025-03-01', 'N', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (115, '30,00', 'Jogo do bicho', '2025-03-24', 'N', 'S', NULL);
INSERT INTO `tb_despesas` VALUES (116, '10,00', 'AÇAI', '2025-03-24', 'N', 'S', NULL);
INSERT INTO `tb_despesas` VALUES (117, '120,00', 'VIVO', '2025-03-24', 'N', 'S', NULL);
INSERT INTO `tb_despesas` VALUES (118, '100,00', 'VIVO', '2025-03-24', 'N', 'S', NULL);
INSERT INTO `tb_despesas` VALUES (119, '', 'TESTE123', '2025-03-26', NULL, 'S', NULL);
INSERT INTO `tb_despesas` VALUES (120, '', 'TESTE123', '2025-03-26', NULL, 'S', NULL);
INSERT INTO `tb_despesas` VALUES (121, '', 'TESTE123', '2025-03-26', NULL, 'S', NULL);
INSERT INTO `tb_despesas` VALUES (122, '1.000,00', 'SPOTFY', '2025-03-01', 'N', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (123, '10,00', 'GOOGLE', '2025-03-27', 'N', NULL, 5);
INSERT INTO `tb_despesas` VALUES (124, '12,00', 'SPOTFY', '2025-03-27', 'N', NULL, 5);
INSERT INTO `tb_despesas` VALUES (125, '100,00', 'SPOTFY', '2025-03-27', 'N', NULL, 5);

-- ----------------------------
-- Table structure for tb_receitas
-- ----------------------------
DROP TABLE IF EXISTS `tb_receitas`;
CREATE TABLE `tb_receitas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `receita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `data_cadastro` datetime NULL DEFAULT NULL,
  `pago` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `excluido` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_usuario` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 172 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_receitas
-- ----------------------------
INSERT INTO `tb_receitas` VALUES (125, '1.200,00', 'Salário', '2025-03-26 00:00:00', '', 'S', NULL);
INSERT INTO `tb_receitas` VALUES (126, '200,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (127, '120,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (128, '1.200,00', 'Salário', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (129, '100,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (130, '100,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (131, '100,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (132, '100,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (133, '100,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (134, '100,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (135, '200,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (136, '200,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (137, '120,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (138, '120,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (139, '1.000,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (140, '5.000,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (141, '1.000,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (142, '200,00', 'Salário', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (143, '150,00', 'Freelancer', '2025-03-27 00:00:00', '', NULL, NULL);
INSERT INTO `tb_receitas` VALUES (144, '100,00', 'Freelancer', '2025-03-27 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (145, '1.200,00', 'Freelancer', '2025-03-27 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (146, '1.000,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (147, '999,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (148, '100,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (149, '1.200,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (150, '1.000,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (151, '1.000,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (152, '120,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (153, '200,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (154, '50,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (155, '1.520,00', 'Salário', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (156, '1.500,00', 'Salário', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (157, '1.000,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (158, '50,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (159, '125,00', 'Salário', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (160, '1.000,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (161, '1.500,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (162, '100,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (163, '1.500,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (164, '150,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (165, '75,00', '', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (166, '50,50', '', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (167, '1.500,00', '', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (168, '10.000,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (169, '1.200,00', 'Freelancer', '2025-03-28 00:00:00', '', 'S', 5);
INSERT INTO `tb_receitas` VALUES (170, '120,00', 'Freelancer', '2025-03-28 00:00:00', '', NULL, 5);
INSERT INTO `tb_receitas` VALUES (171, '1.000,00', 'Salário', '2025-03-28 00:00:00', '', NULL, 5);

-- ----------------------------
-- Table structure for tb_tipos_despesas
-- ----------------------------
DROP TABLE IF EXISTS `tb_tipos_despesas`;
CREATE TABLE `tb_tipos_despesas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `despesa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `data_cadastro` datetime NULL DEFAULT NULL,
  `excluido` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_tipos_despesas
-- ----------------------------
INSERT INTO `tb_tipos_despesas` VALUES (8, 'UNIMED', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (9, 'NUBANK', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (10, 'VIVO', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (11, 'ESPAÇO LASER B 12X', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (12, 'GOOGLE', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (13, 'SPOTFY', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (14, 'C6', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (15, 'EMP 1500 7X248.07', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (16, 'ELEVADOR DIA 9 (10X)', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (19, 'TESTE', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (20, 'teste', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (21, 'teste', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (22, 'teste', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (23, 'teste', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (24, 'teste', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (25, 'TESTE', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (26, 'TESTE5', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (27, 'TESTE', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (28, 'CR7 0 MIOR', NULL, 'S');
INSERT INTO `tb_tipos_despesas` VALUES (29, 'AÇAI', '2025-03-18 18:06:18', NULL);
INSERT INTO `tb_tipos_despesas` VALUES (30, 'Jogo do bicho', '2025-03-24 14:18:29', NULL);

-- ----------------------------
-- Table structure for tb_tipos_receitas
-- ----------------------------
DROP TABLE IF EXISTS `tb_tipos_receitas`;
CREATE TABLE `tb_tipos_receitas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `receita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `data_cadastro` datetime NULL DEFAULT NULL,
  `excluido` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_tipos_receitas
-- ----------------------------
INSERT INTO `tb_tipos_receitas` VALUES (33, '', '2025-03-26 14:26:12', 'S');
INSERT INTO `tb_tipos_receitas` VALUES (34, '', '2025-03-26 14:29:18', 'S');
INSERT INTO `tb_tipos_receitas` VALUES (35, '', '2025-03-26 14:29:34', 'S');
INSERT INTO `tb_tipos_receitas` VALUES (36, 'TESTE', '2025-03-26 14:30:12', 'S');
INSERT INTO `tb_tipos_receitas` VALUES (37, 'Salário', '2025-03-26 14:36:40', NULL);
INSERT INTO `tb_tipos_receitas` VALUES (38, 'Freelancer', '2025-03-26 16:15:05', NULL);

-- ----------------------------
-- Table structure for tb_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `saldo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `entrada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_usuarios
-- ----------------------------
INSERT INTO `tb_usuarios` VALUES (5, '600.149.680-37', '$2y$10$h1YY.m9TP4lPtVcBx8SAEOgq.F4J9gPxUkAVj2Blwq4JCj4xRkb3e', '1120', NULL, 'Eduardo');

SET FOREIGN_KEY_CHECKS = 1;
