CREATE TABLE `users` ( --구축
  `user_email` varchar(255) PRIMARY KEY,
  `user_password` varchar(255),
  `user_name` varchar(255),
  `user_phone` varchar(255),
  `user_address` varchar(255),
  `user_rank` int
);

CREATE TABLE `recipe` (
  `recipe_id` int PRIMARY KEY AUTO_INCREMENT,
  `recipe_seq` int,
  `collection_id` int,
  `recipe_img` varchar(255),
  `recipe_content` varchar(255),
  `recipe_time` timestamp
);

CREATE TABLE `collection` (
  `collection_id` int PRIMARY KEY AUTO_INCREMENT,
  `recipe_title` varchar(255),
  `recipe_date` datetime,
  `user_email` varchar(255)
);

CREATE TABLE `ingredient` ( --구축
  `ingredient_id` int PRIMARY KEY AUTO_INCREMENT,
  `ingredient_name` varchar(255),
  `ingredient_image` varchar(255),
  `ingredient_type` varchar(255)
);
insert into ingredient values('', '돼지고기', 'meat.svg', '고기류')
insert into ingredient values('', '대파', 'green_onion.svg', '채소류')
insert into ingredient values('', '상추', 'cabbage.svg', '채소류')
insert into ingredient values('', '당근', 'carrot.svg', '채소류')

CREATE TABLE `ringredient` (
  `ringredient_id` int PRIMARY KEY AUTO_INCREMENT,
  `ingredient_id` int,
  `collection_id` int,
  `ringredient_amount` varchar(255)
);

CREATE TABLE `fridge` ( --구축
  `fridge_id` int PRIMARY KEY AUTO_INCREMENT,
  `ingredient_id` int,
  `user_email` varchar(255),
  `fridge_x` int,
  `fridge_y` int
);

CREATE TABLE `mealkit` (
  `mealkit_id` int PRIMARY KEY AUTO_INCREMENT,
  `mealkit_name` varchar(255),
  `user_email` varchar(255),
  `mealkit_img` varchar(255)
);

CREATE TABLE `thumbsup` (
  `thumbsup_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_email` varchar(255),
  `collection_id` int
);

CREATE TABLE `history` (
  `history_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_email` varchar(255),
  `collection_id` int,
  `history_date` datetime
);

ALTER TABLE `recipe` ADD FOREIGN KEY (`collection_id`) REFERENCES `collection` (`collection_id`);

ALTER TABLE `collection` ADD FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

ALTER TABLE `ringredient` ADD FOREIGN KEY (`collection_id`) REFERENCES `collection` (`collection_id`);

ALTER TABLE `ringredient` ADD FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`ingredient_id`);

ALTER TABLE `fridge` ADD FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`ingredient_id`);

ALTER TABLE `fridge` ADD FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

ALTER TABLE `mealkit` ADD FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

ALTER TABLE `thumbsup` ADD FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

ALTER TABLE `thumbsup` ADD FOREIGN KEY (`collection_id`) REFERENCES `collection` (`collection_id`);

ALTER TABLE `history` ADD FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

ALTER TABLE `history` ADD FOREIGN KEY (`collection_id`) REFERENCES `collection` (`collection_id`);
