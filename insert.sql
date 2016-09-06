-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 15 Août 2016 à 19:32
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  larsendev
--

--
-- Vider la table avant d'insérer comments
--

TRUNCATE TABLE comments;
--
-- Contenu de la table comments
--

INSERT INTO comments (comment_ID, comment_post_ID, comment_author, comment_date, comment_status, comment_content) VALUES(1, 1, 'JC', '2016-07-28 00:00:00', 'published', 'de la balle !!');
INSERT INTO comments (comment_ID, comment_post_ID, comment_author, comment_date, comment_status, comment_content) VALUES(2, 1, 'clement', '2016-08-10 13:54:01', 'published', 'Bien d''accord !');
INSERT INTO comments (comment_ID, comment_post_ID, comment_author, comment_date, comment_status, comment_content) VALUES(3, 2, 'Mickael Jackson', '2016-08-10 13:57:07', 'published', 'Putain je suis deg je pourrai pas être la !');
INSERT INTO comments (comment_ID, comment_post_ID, comment_author, comment_date, comment_status, comment_content) VALUES(4, 2, 'Celine Dion', '2016-08-10 13:57:43', 'published', 'Ben moi oui ! :D');
INSERT INTO comments (comment_ID, comment_post_ID, comment_author, comment_date, comment_status, comment_content) VALUES(5, 1, 'Nouvo', '2016-08-10 13:58:50', 'published', 'Moi je veux rejoindre l''asso !!');
INSERT INTO comments (comment_ID, comment_post_ID, comment_author, comment_date, comment_status, comment_content) VALUES(6, 5, 'Boubou', '2016-08-10 16:36:27', 'published', 'C''est un tres bon collegue !');
INSERT INTO comments (comment_ID, comment_post_ID, comment_author, comment_date, comment_status, comment_content) VALUES(7, 5, 'Matthieu', '2016-08-10 16:36:54', 'published', 'Ouai mais alors en prof...................................');

--
-- Vider la table avant d'insérer posts
--

TRUNCATE TABLE posts;
--
-- Contenu de la table posts
--

INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(1, 'clément henry', '2016-07-28 11:01:03', 'Larsen recrute !', 'published', 'Pour affronter les futurs défis de l''asso, LARSEN recrute encore et toujours !');
INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(2, 'clément losser', '2016-07-28 15:50:38', 'Gros festoch en préparation !', 'published', 'Parmis les gros défis en préparation pour l''année Larsen souhaite organiser un gros festival !');
INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(3, 'Bastian Lizut', '2016-07-28 23:45:57', 'Chillpunk aux ovalies !', 'published', 'Qq photos du concert de chillpunk aux ovalies !');
INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(4, 'Mickael Jackson', '2016-07-29 10:12:45', 'Les jackson 5 en concert !', 'published', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non iaculis dui, id blandit mauris. Suspendisse tortor sapien, pulvinar vitae lacus sit amet, rutrum lobortis quam. Nulla ultrices viverra est sit amet vehicula. Praesent dictum diam tellus. Maecenas in turpis pharetra ipsum semper porttitor sed nec mauris. Aenean egestas pharetra felis. Vestibulum dignissim nisl vitae massa iaculis, a mattis odio imperdiet. Nulla pretium sollicitudin venenatis. Donec eget commodo nulla, nec aliquam nisi. Donec tempor viverra est sed finibus. Curabitur scelerisque sagittis interdum. Sed interdum felis neque, eget ullamcorper neque hendrerit ut. Phasellus velit sapien, suscipit eget tellus vel, lacinia finibus ex. In hac habitasse platea dictumst. Aenean tincidunt volutpat dolor, vitae dignissim risus facilisis non. Vestibulum metus nibh, pellentesque vitae efficitur vel, gravida non quam.\r\n\r\nNullam sit amet varius magna, et malesuada tellus. Etiam sollicitudin sagittis neque vitae maximus. Vivamus vitae congue lorem. In consectetur felis non felis fermentum porttitor. Cras bibendum scelerisque egestas. Nunc ac arcu purus. Phasellus non odio dui. Aliquam massa magna, finibus iaculis ipsum quis, rhoncus tempus risus. Quisque et porttitor lectus. Donec a vestibulum magna. Cras efficitur lectus volutpat nulla elementum, quis lobortis elit mollis. Integer lobortis congue libero ut vulputate. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ');
INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(5, 'Alaric', '2016-08-02 12:16:27', 'Trigano est un ouf', 'published', '<img class="thumbnail" src="img/marley.png">\r\n          <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus.</p>');
INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(6, 'Alaric', '1990-09-06 23:32:25', 'ca c''est un vieux post', 'published', 'post_content');

--
-- Vider la table avant d'insérer posts_relationships
--

TRUNCATE TABLE posts_relationships;
--
-- Contenu de la table posts_relationships
--

INSERT INTO posts_relationships (relationships_ID, post_ID, taxonomy_ID) VALUES(1, 1, 2);
INSERT INTO posts_relationships (relationships_ID, post_ID, taxonomy_ID) VALUES(2, 2, 1);
INSERT INTO posts_relationships (relationships_ID, post_ID, taxonomy_ID) VALUES(3, 3, 1);

--
-- Vider la table avant d'insérer taxonomy
--

TRUNCATE TABLE taxonomy;
--
-- Contenu de la table taxonomy
--

INSERT INTO taxonomy (taxonomy_ID, taxonomy_name) VALUES(1, 'evenements');
INSERT INTO taxonomy (taxonomy_ID, taxonomy_name) VALUES(2, 'Orga asso');
COMMIT;
