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

 Date: 21/03/2025 14:06:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_despesas
-- ----------------------------
DROP TABLE IF EXISTS `tb_despesas`;
CREATE TABLE `tb_despesas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `despesa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `data_cadastro` datetime NULL DEFAULT NULL,
  `excluido` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_despesas
-- ----------------------------
INSERT INTO `tb_despesas` VALUES (8, 'UNIMED', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (9, 'NUBANK', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (10, 'VIVO', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (11, 'ESPAÇO LASER B 12X', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (12, 'GOOGLE', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (13, 'SPOTFY', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (14, 'C6', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (15, 'EMP 1500 7X248.07', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (16, 'ELEVADOR DIA 9 (10X)', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (19, 'TESTE', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (20, 'teste', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (21, 'teste', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (22, 'teste', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (23, 'teste', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (24, 'teste', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (25, 'TESTE', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (26, 'TESTE5', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (27, 'TESTE', NULL, 'S');
INSERT INTO `tb_despesas` VALUES (28, 'CR7 0 MIOR', NULL, NULL);
INSERT INTO `tb_despesas` VALUES (29, 'AÇAI', '2025-03-18 18:06:18', NULL);

-- ----------------------------
-- Table structure for tb_lancamentos
-- ----------------------------
DROP TABLE IF EXISTS `tb_lancamentos`;
CREATE TABLE `tb_lancamentos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `despesa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `data_lancamentos` date NULL DEFAULT NULL,
  `pago` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `excluido` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 115 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_lancamentos
-- ----------------------------
INSERT INTO `tb_lancamentos` VALUES (110, '200,00', 'CR7 0 MIOR', '2025-03-20', 'S', 'S');
INSERT INTO `tb_lancamentos` VALUES (111, '250,00', 'CR7 0 MIOR', '2025-03-20', 'S', NULL);
INSERT INTO `tb_lancamentos` VALUES (112, '23,90', 'AÇAI', '2025-03-20', 'S', NULL);
INSERT INTO `tb_lancamentos` VALUES (113, '19.9', 'SPOTFY', '2025-01-15', 'N', NULL);
INSERT INTO `tb_lancamentos` VALUES (114, '10,00', 'GOOGLE', '2025-03-01', 'N', NULL);

-- ----------------------------
-- Table structure for tb_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `saldo` float(255, 2) NULL DEFAULT NULL,
  `entrada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_usuarios
-- ----------------------------
INSERT INTO `tb_usuarios` VALUES (1, '820.796.680-72', '1981', 736.41, '0', NULL);
INSERT INTO `tb_usuarios` VALUES (2, '600.149.680-82', '2001', 736.41, NULL, NULL);
INSERT INTO `tb_usuarios` VALUES (3, '465.465.465-46', '$2y$10$tgcB3UrpM6mRbGvMNHwgLe6ptQeNxx1oNnyXOTo1kIioqgrCf1KHy', 736.41, NULL, 'teste');
INSERT INTO `tb_usuarios` VALUES (4, '600.149.680-37', '$2y$10$xMyT/E5vrLlSp9iHV6nbFelJA.rGqfAEF2cH7G9T9qAIzWxJGPQDq', 736.41, NULL, 'Eduardo');

SET FOREIGN_KEY_CHECKS = 1;
