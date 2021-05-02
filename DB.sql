--구축
CREATE TABLE `users` (
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
--구축
CREATE TABLE `collection` (
  `collection_id` int PRIMARY KEY AUTO_INCREMENT,
  `collection_title` varchar(255),
  `collection_intro` varchar(255),
  `collection_time` int,
  `collection_serving` int,
  `collection_hastag` varchar(255),
  `collection_date` datetime,
  `user_email` varchar(255)
);
--구축
CREATE TABLE `ingredient` (
  `ingredient_id` int PRIMARY KEY AUTO_INCREMENT,
  `ingredient_name` varchar(255),
  `ingredient_image` varchar(255),
  `ingredient_type` varchar(255)
);

insert into ingredient values
('', '대파', 'green_onion.svg', '채소류'),
('', '당근', 'carrot.svg', '채소류'),
('', '숙주', 'Bean_sprouts.svg', '채소류'),
('', '도라지', 'Bellflower.svg', '채소류'),
('', '고사리', 'Bracken.svg', '채소류'),
('', '브로콜리', 'Broccoli.svg', '채소류'),
('', '양배추', 'Cabbage.svg', '채소류'),
('', '고추', 'Chili.svg', '채소류'),
('', '오이', 'Cucumber.svg', '채소류'),
('', '더덕', 'Deodeok.svg', '채소류'),
('', '가지', 'Eggplant.svg', '채소류'),
('', '마늘', 'Garlic.svg', '채소류'),
('', '생강', 'Ginger.svg', '채소류'),
('', '부추', 'Leek.svg', '채소류'),
('', '연근', 'Lotus_root.svg', '채소류'),
('', '버섯', 'Mushroom.svg', '채소류'),
('', '양파', 'Onion.svg', '채소류'),
('', '감자', 'Potato.svg', '채소류'),
('', '무', 'Radish.svg', '채소류'),
('', '무깻잎', 'Sesame.svg', '채소류'),
('', '순무', 'Turnip.svg', '채소류')

insert into ingredient values
('', '돼지고기', 'meat.svg', '고기류'),
('', '소안심', 'Beef_tenderloin.svg', '고기류'),
('', '닭다리', 'Chicken_leg.svg', '고기류'),
('', '닭날개', 'Chicken_wing.svg', '고기류'),
('', '앞다리살', 'Forelimb.svg', '고기류'),
('', '양고기', 'Lamb.svg', '고기류'),
('', '삼겹살', 'Pork_belly.svg', '고기류'),
('', '돼지갈비', 'Pork_ribs.svg', '고기류'),
('', '돼지안심', 'Pork_tenderloin.svg', '고기류'),
('', '소시지', 'Sausage.svg', '고기류'),
('', '소등심', 'Sirloin.svg', '고기류'),
('', '티본스테이크', 'Tbon_stake.svg', '고기류'),
('', '토마호크', 'Tomahawk.svg', '고기류'),
('', '부채살', 'Top_blade.svg', '고기류')

insert into ingredient values
('', '우뭇가사리', 'Agar.svg', '해조류'),
('', '톳', 'Hijki.svg', '해조류'),
('', '다시마', 'Kelp.svg', '해조류'),
('', '메생이', 'Maesaengyi.svg', '해조류'),
('', '미역', 'Sea_mustard.svg', '해조류'),
('', '김', 'Seaweed.svg', '해조류')

insert into ingredient values
('', '사과', 'Apple.svg', '과일류'),
('', '아보카도', 'Avocado.svg', '과일류'),
('', '바나나', 'Banana.svg', '과일류'),
('', '블루베리', 'Blueberry.svg', '과일류'),
('', '참외', 'Korean_melon.svg', '과일류'),
('', '레몬', 'Lemon.svg', '과일류'),
('', '망고', 'Mango.svg', '과일류'),
('', '오렌지', 'Orange.svg', '과일류'),
('', '복숭아', 'Peach.svg', '과일류'),
('', '배', 'Pear.svg', '과일류'),
('', '딸기', 'Strawberry.svg', '과일류')

insert into ingredient values
('', '버터', 'Butter.svg', '유제품'),
('', '까망베르', 'Camembert.svg', '유제품'),
('', '체다치즈', 'Cheddar_Cheese.svg', '유제품'),
('', '에멘탈 치즈', 'Emmental.svg', '유제품'),
('', '고르곤졸라', 'Gorgonzola.svg', '유제품'),
('', '우유', 'Milk.svg', '유제품'),
('', '모짜렐라', 'Mozzarella.svg', '유제품'),
('', '생크림', 'Whipping_cream.svg', '유제품'),
('', '요구르트', 'Yogurt.svg', '유제품')

insert into ingredient values
('', '땅콩', 'Peanut.svg', '견과류'),
('', '호두', 'Walnut.svg', '견과류'),
('', '아몬드', 'Almond.svg', '견과류'),
('', '잣', 'Pine_nuts.svg', '견과류'),
('', '피스타치오', 'Pistachio.svg', '견과류'),
('', '해바라기', 'Sunflower_seeds.svg', '견과류') 

CREATE TABLE `ringredient` (
  `ringredient_id` int PRIMARY KEY AUTO_INCREMENT,
  `ingredient_id` int,
  `collection_id` int,
  `ringredient_amount` varchar(255)
);
--구축
CREATE TABLE `fridge` (
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
