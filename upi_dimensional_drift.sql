/*
 Navicat Premium Data Transfer

 Source Server         : pweb&tbd
 Source Server Type    : MariaDB
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : upi_dimensional_drift

 Target Server Type    : MariaDB
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 11/06/2022 21:43:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for facilities
-- ----------------------------
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facilities
-- ----------------------------
INSERT INTO `facilities` VALUES (1, 'parking', '<i class=\"bx bxs-parking\"></i>');
INSERT INTO `facilities` VALUES (2, 'wifi', '<i class=\"bx bx-wifi\"></i>');
INSERT INTO `facilities` VALUES (3, 'Food', '<i class=\'bx bx-bowl-hot\'></i>');

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `path` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `room_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `body` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `image`(`image`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery
-- ----------------------------

-- ----------------------------
-- Table structure for room_details
-- ----------------------------
DROP TABLE IF EXISTS `room_details`;
CREATE TABLE `room_details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `facility_id`(`facility_id`) USING BTREE,
  INDEX `room_id`(`room_id`) USING BTREE,
  CONSTRAINT `room_details_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `room_details_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room_details
-- ----------------------------

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `body` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descriptions` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `panorama_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rooms
-- ----------------------------

-- ----------------------------
-- Table structure for user_log
-- ----------------------------
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `activity_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_log
-- ----------------------------

-- ----------------------------
-- Table structure for user_token
-- ----------------------------
DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exp` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `user_token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_token
-- ----------------------------
INSERT INTO `user_token` VALUES (1, '1e2847fb9f1a4748cd3c499fadb346ea6cd8a83940db90fe6fa20ec41e359d293b8f799117eeacbb161493d7dfb68fe6d1fcb2352e7295cef9bf11a88006ae9c', '2022-06-07 21:32:16', 1);
INSERT INTO `user_token` VALUES (2, '580668ce1d3c1eadcc6210599d9aa5c176191fdd26c5a997ed1b73f1ae4deee832f327383a5797be298f9d66ab00ab69aead3eb35bf9520c8dbc28043fdf5187', '2022-06-26 14:40:36', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'titam@mail.com', '123qwe123', 'titam', 'septian', 'user');
INSERT INTO `users` VALUES (2, 'andywarhol@mail.com', 'root123', 'Andy', 'warhool', 'user');
INSERT INTO `users` VALUES (3, 'rony@mail.com', 'root', 'Rony ', 'Wahyu', 'user');
INSERT INTO `users` VALUES (4, 'hm@mail.com', 'emyu', 'Harry', 'Maguire', 'user');

-- ----------------------------
-- Table structure for viewed_room
-- ----------------------------
DROP TABLE IF EXISTS `viewed_room`;
CREATE TABLE `viewed_room`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `room_id`(`room_id`) USING BTREE,
  CONSTRAINT `viewed_room_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of viewed_room
-- ----------------------------

-- ----------------------------
-- Procedure structure for getFacilitiesByRoomId
-- ----------------------------
DROP PROCEDURE IF EXISTS `getFacilitiesByRoomId`;
delimiter ;;
CREATE PROCEDURE `getFacilitiesByRoomId`(IN `room_id` int)
BEGIN
SELECT facilities.*, room_details.* FROM room_details JOIN facilities ON facilities.id = room_details.facility_id WHERE room_details.room_id = room_id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getRoomBySlug
-- ----------------------------
DROP PROCEDURE IF EXISTS `getRoomBySlug`;
delimiter ;;
CREATE PROCEDURE `getRoomBySlug`(IN `slug` varchar(50))
BEGIN
SELECT
rooms.*,
users.first_name AS author,
( SELECT count( room_id ) FROM viewed_room WHERE room_id = rooms.id ) AS viewed ,
( SELECT count( room_id ) FROM room_details WHERE room_id = rooms.id ) AS facilities
FROM
rooms
JOIN users ON rooms.user_id = users.id
WHERE rooms.slug = slug;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getRooms
-- ----------------------------
DROP PROCEDURE IF EXISTS `getRooms`;
delimiter ;;
CREATE PROCEDURE `getRooms`()
BEGIN
SELECT
rooms.*,
users.first_name AS author,
( SELECT count( room_id ) FROM viewed_room WHERE room_id = rooms.id ) AS viewed ,
( SELECT count( room_id ) FROM room_details WHERE room_id = rooms.id ) AS facilities
FROM
rooms
JOIN users ON rooms.user_id = users.id;

END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table gallery
-- ----------------------------
DROP TRIGGER IF EXISTS `add_gallery_log`;
delimiter ;;
CREATE TRIGGER `add_gallery_log` AFTER INSERT ON `gallery` FOR EACH ROW BEGIN
        INSERT INTO user_log (user_id, activity_text, created_at)
            VALUES ((SELECT gallery.user_id FROM gallery ORDER BY gallery.id DESC LIMIT 1) , "User Menambahkan Foto", now());
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table gallery
-- ----------------------------
DROP TRIGGER IF EXISTS `update_gallery_log`;
delimiter ;;
CREATE TRIGGER `update_gallery_log` AFTER UPDATE ON `gallery` FOR EACH ROW BEGIN
        INSERT INTO user_log (user_id, activity_text, created_at)
            VALUES (NEW.user_id ,"User Mengubah Data Foto", now());
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table rooms
-- ----------------------------
DROP TRIGGER IF EXISTS `add_rooms_log`;
delimiter ;;
CREATE TRIGGER `add_rooms_log` AFTER INSERT ON `rooms` FOR EACH ROW BEGIN
        INSERT INTO user_log (user_id, activity_text, created_at)
            VALUES ((SELECT rooms.user_id FROM rooms ORDER BY rooms.id DESC LIMIT 1) , "User Menambahkan Ruangan Baru", now());
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table rooms
-- ----------------------------
DROP TRIGGER IF EXISTS `update_room_log`;
delimiter ;;
CREATE TRIGGER `update_room_log` AFTER UPDATE ON `rooms` FOR EACH ROW BEGIN
        INSERT INTO user_log (user_id, activity_text, created_at)
            VALUES (NEW.user_id ,"User Mengubah Data Room", now());
    END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
