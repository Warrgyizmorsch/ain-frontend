ALTER TABLE users 
ADD COLUMN total_seconds_today BIGINT DEFAULT 0,
ADD COLUMN last_activity_at TIMESTAMP NULL DEFAULT NULL;

ALTER TABLE `users` ADD `client_review` VARCHAR(255) NULL DEFAULT NULL AFTER `last_activity_at`;
ALTER TABLE `users` ADD `marks` VARCHAR(50) NULL DEFAULT NULL AFTER `client_review`;
ALTER TABLE `orders` ADD `writer_rating` INT(50) NULL DEFAULT NULL AFTER `team_assigned_at`;
CREATE TABLE `writer_feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT '0',
  `writer_id` int(11) DEFAULT '0',
  `feedback_type` varchar(50) NOT NULL,
  `points` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Manish 30-4-26 --
ALTER TABLE `orders` ADD `marks` VARCHAR(55) NULL DEFAULT NULL AFTER `writer_rating`; 
ALTER TABLE `writer_list` ADD `flag` TINYINT(4) NOT NULL AFTER `writer_name`;

--Manish 2-4-26
ALTER TABLE `leads` ADD `lead_source` VARCHAR(55) NULL DEFAULT NULL AFTER `message`;
ALTER TABLE leads ADD created_by INT(100) NULL DEFAULT NULL AFTER assign_type;

--Manish 4-3-26
ALTER TABLE `leads` CHANGE `lead_source` `lead_source` INT NULL DEFAULT NULL;
ALTER TABLE `orders` ADD `offer` VARCHAR(255) NULL DEFAULT NULL AFTER `marks`;

--Manish 5-5-26
ALTER TABLE `leads` ADD `lead_status` VARCHAR(55) NULL DEFAULT NULL AFTER `assign_type`;

--Manish 6-5-26
-- CREATE INDEX idx_orders_uid_orderdate ON orders(uid, order_date);


--Rahul 9-5-26
ALTER TABLE `blog` ADD `author_id` INT(11) NULL DEFAULT NULL AFTER `faq`;

--Rahul 13-5-26
ALTER TABLE `users` ADD `refer_id` INT(11) NULL DEFAULT NULL AFTER `	marks`;

--Rahul 15-5-26
ALTER TABLE `orders` ADD `f_delivery_date` DATE NULL DEFAULT NULL AFTER `offer`;

--Rahul 16-5-26
ALTER TABLE leads ADD COLUMN duplicate_lead TINYINT(1) DEFAULT 0;


