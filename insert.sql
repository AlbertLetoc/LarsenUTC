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



--
-- Vider la table avant d'insérer posts
--

TRUNCATE TABLE posts;
--
-- Contenu de la table posts
--

INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(1, 'henrycle', '2016-07-28 11:01:03', 'Larsen recrute !', 'published', 'Pour affronter les futurs défis de l''asso, LARSEN recrute encore et toujours !');
INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(7, 'jpointel', '2016-09-22 08:32:25', '[RENTREE][FA201][18h30]', 'published', '
YOOOOOWWWW !\n\n

Bonjour à vous, UTCéens, Zicos ou non !\n\n

N''oubliez pas de nous rejoindre ce soir (jeudi 22 septembre) à 18h30 pour la présentation de notre assos.\n\n

Amateur de la guitare, batterie, harpe électrique, viole de gambe (#sisi #onena), on t''invite à notre amphi de rentrée, qui a pour but de parler de l''asso, présenter son fonctionnement et nouveautés : ses projets pour le semestre à venir (parce qu''on en a tout pleiiiiiiiin).\n\n

Si t''es musicien, ou simplement curieux, que tu veux t''investir dans l''asso, ou devenir membre pour faire de la musique, viens nous rejoindre :\n\n

AMPHI DE RENTREE LARSEN\n
FA 201\n
22/09/16 - 18h30\n

Des bisous, mes petites cailles !\n\n

L''équipe LARSEN, qui vous a tant aimé, qui vous aime et qui vous aimera encore !\n\n

PS: on ne fait pas que des groupes de ROCK! Y a plein de styles en musique (perso, notre président chante du MOZART, mais ça reste entre nous).\n\n
');

INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(8, 'jpointel', '2016-09-20 12:03:25', '[Amphi de présentation LARSEN]', 'published', '
 Salut salut!\n\n

Pour ceux qui n''auraient pas vu/reçu le mail : nous avons décalé l''amphi de présentation Larsen Décibels Piano ut! Il aura lieu :\n\n

JEUDI 22/09 à 18H30 en FA201\n\n

On refera une présentation de Larsen, et on parlera de tous nos projets pour ce semestre, le fonctionnement de l''asso et de la salle de répète, la mise en place de cours, les postes à pourvoir à Larsen, bref TOUT ce que vous avez besoin de savoir ;) \n\n

Venez nombreux!\n\n
');

INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(9, 'jpointel', '2016-09-16 15:21:25', '[Mailing list]', 'published', '
Salut! \n\n

Si tu as loupé notre stand Larsen à la JDA ou que tu as oublié de remplir ton adresse mail, voici le lien! \n
On pourra ainsi vous envoyer les informations importantes à tous! Et donner ton adresse mail ne t''engage en rien, mais tu auras la date et l''heure pour venir à l''amphi de présentation déjà! ;)\n\n

Au plaisir! \n\n

https://docs.google.com/forms/d/1hrbsQyKZMvai7IU5esxTT2tNdwPD_htOZLfuYjCQwxk/viewform?edit_requested=true\n\n

Bisous sur vous!
');

INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(10, 'jpointel', '2016-09-14 23:59:25', '#JDA', 'published', '
LARSEN FÊTE SES 30 ANS! \n
Viens nous voir à notre stand Larsen, en haut de la MDE, à côté du studio Décibels! On t''attend tout chaud!!!\n
Ah et pour ton info :\n\n

Fondée le 26 novembre 1986, cela fera cet automne trente ans qu''elle rythme la vie des étudiants utcéens. Pour l''occasion Larsen souhaite marquer le coup!\n\n

Larsen c''est quoi? C''est une asso de passionnés de musique, quasi tous musiciens, qui s''occupe de les rassembler dans leur passion, en formant des groupes et en leur donnant les moyens de répéter dans de bonnes conditions, en faisant leur promotion et leur permettant de jouer sur les plus belles scenes étudiantes et extérieures de la région (IF, ziquodrome, ovalies, Tigre etc...). \n\n

Larsen peut aussi mettre en place un "groupe supervisé" pour des débutants qui souhaiteraient être encadrés par un ancien dans leurs répets!\n\n

De nombreux groupes issus de Larsen ont pu jouer l''année dernière lors d''évênements UTCéens tels que la soirée Gigot bitume, le WEI, les Vieilles Pipettes, la SDF, le Gala, les Jams dans les bars, l''UTCéenne, les Ovalies à Beauvais, le tremplin CROUS, et les perms au PIC!! (et bien d''autres encore! ) \n\n
Autant d''endroits où tu pourras nous faire réver par ton talent musical cette année en venant t''inscrire à Larsen! \n\n
');

INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(11, 'jpointel', '2016-09-13 13:11:25', '#Estuparking', 'published', '
Yo les beaux, grands et forts Utcéens(éennes)!\n\n

Ce soir c''est l''Estu Parking, et cela rime avec : un max de musique! Alors pour ton plus grand plaisir, ce soir, Larsen participera à l''estu de 18h30 à 21h30! \n
Puis Alexis doche de 19h50 à 20h30 et les Sombreheros de 20h30 à 21h30!!! \n\n
Alors venez nombreux, les amplis se préchauffent eux, et ça va être génial! \n
');


INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(12, 'jpointel', '2016-09-13 11:04:25', 'Toi, oui toi...', 'published', '
Toi, oui toi...\n
qui a toujours révé de chanter et de partager pour le plaisir des autres,\n
qui a toujours révé de jouer de tes doigts ces solos enivrant,\n
qui a toujours révé de faire vibrer le coeur d''une foule au rythme de la musique,\n\n

LARSEN est pour toi!!! #viensonestbien\n\n

Tu pourras profiter de supers occasions de jouer sur les nombreuses scènes accessibles ici et ailleurs en Picardie ;)\n
Alors rendez-vous à la JDA, jeudi matin, au stand Larsen!\n\n
');

INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(13, 'jpointel', '2016-09-05 21:16:25', '#toifuturHendrix #oufuturBobMarley', 'published', '
 Oye cher nouvö! (et toi aussi ancien, on t''aime quand même!)\n
Ce beau semestre d''automne qui s''annonce chargé #unmaxdeCS...non pardon qui s''annonce comme une PURE soirée, va surtout voir renaitre TON asso favorite (ça le deviendra en tout cas, crois moi ;)) :.......LARSEN!\n\n

Larsen c''est quoi te demandes-tu, comblé d''admiration? C''est une asso qui regroupe une bonne partie des musiciens de l''UTC, qui organise des évènements musicaux et concerts et qui met à ta disposition une salle de répet et son matos! Alors si tu es CHAUD PATATE, que tu veux faire swinguer ton école, que tu veux partager ton talent musical, viens! #onestbien\n
Mais Larsen c''est aussi un bureau d''étudiants qui gèrent l''asso, des resp com, matos, ects..qui n''attend que toi si tu veux venir préter main forte!!!! Et te donner une expérience associative! ;)\n\n

Mais c''est pas tout! Larsen est aussi en étroite relation avec l''asso Décibels, pour encourager les groupes à s''enregistrer! Voici par exemple des enregistrements des groupes Utcéens:\n
https://soundcloud.com/d-cibels-utc/manouchette-song\n\n

https://soundcloud.com/d-cibels-utc/too-close-cover\n\n
(Merci à eux pour les liens!)\n
Alors gros poutou sur ton front et on t''attend impatiemment à la Journée des Assos, notamment, le 15/09!\n\n

Ah et j''oubliais, cette année Larsen a 30 ans, et ça...ça se fête... \n\n
');

INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(14, 'baheuxvi', '2016-06-06 23:59:25', 'CE SOIR ! FA108!', 'published', '
Salut vous tous !\n\n

Ce message pour vous prévenir que ce soir 19h, en FA108, on se retrouve pour parler de l''avenir de LARSEN.\n\n

SACHEZ QUE LARSEN CHERCHE DE NOUVEAUX MEMBRES! \n\n

Tu en as marre d''attendre que quelqu''un t''ouvres la salle du PIC ? Tu aimerais qu''il y ait plus de concerts, plus de jams ?\n\n

Tu as des projets au sein l''UTC qui pourraient intéresser LARSEN ?\n\n

Tu en as marre que l''on te prévienne d''une réu importante, environ 10 heures avant la réu en question ?\n\n

Deviens membre du bureau ! C''est le moment que tu fasses changer les choses !\n\n

Oui ! Larsen a besoin de monde, et en particulier de musiciens ! Larsen, ce nest pas un bureau, Larsen c''est l''ensemble des gens qui répètent dans les salles du PIC et le studio, Larsen, c''est nous, mais c''est surtout VOUS ! IMPLIQUEZ-VOUS. \n\n

Qu''est ce qu''on y gagne ?\n\n

- du relationnel\n
- des compétences en gestion (si, si, jvous jure !)\n
- des compétences aussi en termes d''instrus et de sonos de groupes).\n

A ce soir ?\n\n

Le bureau LARSEN.\n
');


INSERT INTO posts (post_ID, post_author, post_date, post_title, post_status, post_content) VALUES(15, 'baheuxvi', '2016-06-06 23:59:25', 'CE SOIR ! FA108!', 'published', '
[Concerts-Demain GRAND CAFE]\n\n

Ca va rocker au GRAND CAFE demain à partir de 22h.\n\n

Parce que vos amis (concurrents... #Vieilles Pipettes) vont vous faire bouger demain soir!\n\n

Je vous conseille d''aller les voir, ça va être LOURD!\n\n

22h - Dopamine\n\n

22h45 - Band it "Les mains en l''air! Attention à ta trogne ...\n
Fais pas l''beau, fais pas l''fier! Maintenant tu vas danser charogne ..."\n\n

23h30- For Now - ""On nous dit souvent qu''on fait trop de bruit : n''est-ce pas ça le but du rock&roll ?"\n\n

Ca va être FAAAAAT (j''ai LA13 mercredi soir).\n\n

Alors viens lâcher prise, c''est la fin des médians, c''est le Mardi 26/04/16, à partir de 22h, au GRAND CAFE.\n\n

Des bisous. LARSEN qui vous aime.\n
');

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

insert into events (nom, date_event, lieu, description) values ("Utcéenne", "2016-09-30", "Parc Astérix", "");
insert into events (nom, date_event, lieu, description) values ("Journée Des Associations", "2016-09-15", "Maison Des Etudiants", " LARSEN FÊTE SES 30 ANS!
Viens nous voir à notre stand Larsen, en haut de la MDE, à côté du studio Décibels! On t'attend tout chaud!!!\n
Ah et pour ton info :\n\n

Fondée le 26 novembre 1986, cela fera cet automne trente ans qu'elle rythme la vie des étudiants utcéens. Pour l'occasion Larsen souhaite marquer le coup!\n\n

Larsen c'est quoi? C'est une asso de passionnés de musique, quasi tous musiciens, qui s'occupe de les rassembler dans leur passion, en formant des groupes et en leur donnant les moyens de répéter dans de bonnes conditions, en faisant leur promotion et leur permettant de jouer sur les plus belles scenes étudiantes et extérieures de la région (IF, ziquodrome, ovalies, Tigre etc...).\n\n

Larsen peut aussi mettre en place un ""groupe supervisé"" pour des débutants qui souhaiteraient être encadrés par un ancien dans leurs répets!\n\n

De nombreux groupes issus de Larsen ont pu jouer l'année dernière lors d'évênements UTCéens tels que la soirée Gigot bitume, le WEI, les Vieilles Pipettes, la SDF, le Gala, les Jams dans les bars, l'UTCéenne, les Ovalies à Beauvais, le tremplin CROUS, et les perms au PIC!! (et bien d'autres encore! )\n\n
Autant d'endroits où tu pourras nous faire réver par ton talent musical cette année en venant t'inscrire à Larsen! ");
insert into events (nom, date_event, lieu, description) values ("Amphi de présentation", "2016-09-22", "FA201", " Salut salut! \n\n

Pour ceux qui n'auraient pas vu/reçu le mail : nous avons décalé l'amphi de présentation Larsen Décibels Piano ut! Il aura lieu :\n\n

JEUDI 22/09 à 18H30 en FA201\n\n

On refera une présentation de Larsen, et on parlera de tous nos projets pour ce semestre, le fonctionnement de l'asso et de la salle de répète, la mise en place de cours, les postes à pourvoir à Larsen, bref TOUT ce que vous avez besoin de savoir ;) \n\n

Venez nombreux!");


insert into events (nom, date_event, lieu, description) values ("Soirée Esperanto", "2016-10-19", "Clap café", "");
insert into events (nom, date_event, lieu, description) values ("Estu Parking", "2016-09-13", "Parking BF", "Yo les beaux, grands et forts Utcéens(éennes)! Ce soir c'est l'Estu Parking, et cela rime avec : un max de musique! Alors pour ton plus grand plaisir, ce soir, Larsen participera à l'estu de 18h30 à 21h30! Puis Alexis doche de 19h50 à 20h30 et les Sombreheros de 20h30 à 21h30!!! Alors venez nombreux, les amplis se préchauffent eux, et ça va être génial! ");

insert into events (nom, date_event, lieu, description) values ("Concert N3rdistan", "2016-11-10", "Salle St-Gobain, Thourotte", "");
insert into events (nom, date_event, lieu, description) values ("NEM", "2016-10-14", "Ziquodrome", " POW POW POW, devine quels artistes fantastiques vont jouer ce Vendredi 14 octobre à la NEM????\n
Des zicos tout beaux tout frais ! ;)\n
Alors une petite présentation s'impose!\n
-19h30 : Akindé! Un artiste beatboxer et chanteur à part entière et de plus seul sur scène! (ils en a des b...belles notes à vous faire découvrir ;) )\n\n

-20h15 : Bro Colis!!\n\n

-20h45 : ChillPunk!!\n\n

-21h20 : Zipper!!\n\n

Regarde leur ptite présentation sur Larsen Mutin, ils sont tous CHAUDS comme la braise por vous faire passer une soirée de folie!");