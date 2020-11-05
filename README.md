# SIMON-LIB

-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'users'
-- 
-- ---

DROP TABLE IF EXISTS `users`;
		
CREATE TABLE `users` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `email` MEDIUMTEXT NOT NULL,
  `psw` VARCHAR(255) NOT NULL,
  `created_at` INT NULL DEFAULT NULL,
  `updated_at` INT NOT NULL,
  `position_id` BIGINT NOT NULL,
  `session_token` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'position'
-- 
-- ---

DROP TABLE IF EXISTS `position`;
		
CREATE TABLE `position` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `position_name` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'content'
-- 
-- ---

DROP TABLE IF EXISTS `content`;
		
CREATE TABLE `content` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `title` VARCHAR(255) NOT NULL,
  `body` MEDIUMTEXT NOT NULL,
  `user_id` BIGINT NOT NULL,
  `user_id_btn` BIGINT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `users` ADD FOREIGN KEY (position_id) REFERENCES `position` (`id`);
ALTER TABLE `content` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `content` ADD FOREIGN KEY (user_id_btn) REFERENCES `users` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `position` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `content` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `users` (`id`,`email`,`psw`,`created_at`,`updated_at`,`position_id`,`session_token`) VALUES
-- ('','','','','','','');
-- INSERT INTO `position` (`id`,`position_name`) VALUES
-- ('','');
-- INSERT INTO `content` (`id`,`title`,`body`,`user_id`,`user_id_btn`) VALUES
-- ('','','','','');

INSERT INTO `position` (`id`,`position_name`) VALUES (NULL ,'Директор');
INSERT INTO `position` (`id`,`position_name`) VALUES (NULL,'Менеджер');
INSERT INTO `position` (`id`,`position_name`) VALUES (NULL,'Исполнитель');

INSERT INTO `users` (`id`,`email`,`psw`,`created_at`,`updated_at`,`position_id`,`session_token`) VALUES
(NULL ,'asd@asd','$2y$10$A0NLq/ceUwTtfTjTSrFp8O1oSBh2i8tc4BJK9I4uTvyq6oULWC3G.', 1604535685, 0,'1','');
-- psw 12345!