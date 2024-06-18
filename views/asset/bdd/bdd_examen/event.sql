-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 juin 2024 à 12:20
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `event`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie_name`) VALUES
(12, 'Authentique'),
(13, 'Découverte'),
(9, 'Escapade'),
(6, 'Evasion'),
(11, 'gastronomie'),
(14, 'Loisir'),
(15, 'Luxe');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_evenement` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `prix` double NOT NULL,
  `resume` text NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date_event` date NOT NULL,
  `nbr_place` int(11) NOT NULL,
  `events_actif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id_evenement`, `titre`, `prix`, `resume`, `categorie_id`, `image`, `date_event`, `nbr_place`, `events_actif`) VALUES
(1, 'Comme Un Pro', 50, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque et quas repudiandae sint in exercitationem, quaerat cum ipsa qui quia, dolorum ullam vero voluptatibus ducimus beatae eos perferendis, deleniti quos quibusdam tempore. Tempore, maxime. Saepe quibusdam velit fugit, nostrum praesentium animi quaerat, doloremque illum, cupiditate consequuntur laboriosam quisquam enim ipsum.', 12, 'event_tennis.jpg', '2024-05-29', 75, 0),
(7, 'Visite vue d\'en haut', 150, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque et quas repudiandae sint in exercitationem, quaerat cum ipsa qui quia, dolorum ullam vero voluptatibus ducimus beatae eos perferendis, deleniti quos quibusdam tempore. Tempore, maxime. Saepe quibusdam velit fugit, nostrum praesentium animi quaerat, doloremque illum, cupiditate consequuntur laboriosam quisquam enim ipsum.', 9, 'event_mer_vue_aerienne.jpg', '2023-12-27', 45, 1),
(13, 'spectacle des lumières', 16, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi qui neque, ab aspernatur, voluptates nesciunt exercitationem vero magnam repellat architecto explicabo minima soluta, ut enim.', 6, 'event_bateau.jpg', '2024-03-20', 45, 1),
(14, 'Sensation garantie', 10, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi qui neque, ab aspernatur, voluptates nesciunt exercitationem vero magnam repellat architecto explicabo minima soluta, ut enim.', 15, 'event_jaune.jpg', '2023-12-27', 15, 1),
(17, 'Seul sur ma barque', 90, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 12, 'event_barque.jpg', '2024-05-07', 15, 1),
(19, 'Skyline Champagne Tour', 85, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 15, 'event_helico.jpg', '2024-05-14', 12, 1),
(26, 'The french miami', 78, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 9, 'event_miami.jpg', '2024-06-20', 35, 0),
(27, 'Un jour, une vie', 130, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 15, 'event_yatch.jpg', '2024-06-25', 48, 1),
(28, 'Salon de l&#039;automobile', 50, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 9, 'event_collection_voiture.jpg', '2024-06-26', 100, 1),
(29, 'Les Élites du Cigare', 140, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 15, 'event_cigare.jpg', '2024-06-30', 45, 1),
(30, 'Mon beau citronnier', 86, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 12, 'event_agrume.jpg', '2024-06-28', 140, 1),
(31, 'Une douce nuit à bord', 95, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 9, 'event_catamaran.jpg', '2024-06-29', 40, 1),
(32, 'Pink flamingo', 78, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.', 12, 'event_flamant.jpg', '2024-06-12', 60, 1);

-- --------------------------------------------------------

--
-- Structure de la table `event_date`
--

CREATE TABLE `event_date` (
  `id_event_date` int(11) NOT NULL,
  `list_date` date NOT NULL,
  `evenement_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `list_date`
--

CREATE TABLE `list_date` (
  `id_list_date` int(11) NOT NULL,
  `dates` date NOT NULL,
  `horaires` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL DEFAULT current_timestamp(),
  `place_reserve` int(11) NOT NULL,
  `reservation_actif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `user_id`, `event_id`, `date_reservation`, `place_reserve`, `reservation_actif`) VALUES
(113, 54, 28, '2024-06-14 13:12:43', 1, 1),
(114, 54, 31, '2024-06-14 14:22:25', 2, 1),
(115, 55, 27, '2024-06-14 18:04:59', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_utilisateur` int(11) NOT NULL,
  `img_profil` varchar(250) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` enum('admin','client') NOT NULL DEFAULT 'admin',
  `users_actif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_utilisateur`, `img_profil`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `role`, `users_actif`) VALUES
(48, 'user_lea660fe56dc1053.jpg', 'DAVIDSON', 'Léa', 'lea1', 'lea@mail.com', '$2y$10$sdkc2GHl1MUkVvch9FUav.qNqpp/upA/c9HNrf5dOPpNvBTQrr//y', 'admin', 1),
(49, 'user_ben660fe5e650519.jpg', 'AFLECK', 'Ben', 'ben1', 'ben@mail.com', '$2y$10$hXsGLFQisZLBsTLDij4mkuS3tGkYz6x7ZrFYA2lF7NOOFi5p23R0C', 'admin', 1),
(50, 'user_klara660fe6481faf1.jpg', 'MARTINS', 'Klara', 'klara1', 'klara@mail.com', '$2y$10$PYq8sSySagMVLCxX3Z2m6OarBhTBH2kpIoaA3wgZRqap/9PqmczpS', 'client', 1),
(51, 'user_emma660fe6b78b97e.jpg', 'LOPEZ', 'Emma', 'emma1', 'emma@mail.com', '$2y$10$i9/XFJobqxRoexTyr/o3zOsJEZ8W3LNjU/cVK/TOewyogADT5.E4.', 'admin', 1),
(52, 'user_paula665d75aff3f2a.JPG', 'HARDY', 'Paula', 'paula1', 'paula@mail.com', '$2y$10$X7I82njDliXp6RX/SP.MBujRYbb1t2umGDyLqgnvWv0Iaei5yWMKK', 'admin', 1),
(53, 'user_kim665e2f63c992b.jpg', 'ZAHO', 'Kim', 'kim1', 'kim@mail.com', '$2y$10$EamOc9OF8iRtkJr6wJeXZeYO4BMDsdpT/HS0LqLxe730nsH5X4MkW', 'admin', 1),
(54, 'user_nil665e2fe846851.jpg', 'SULIMAN', 'Nil', 'nil1', 'nil@mail.com', '$2y$10$gZ6T0gU4dteDAs9yu68eOuF2q3.6c8FYP/UmXk.vizSPyEWD5gWky', 'admin', 1),
(55, 'user_tom665e305a78a8c.jpg', 'GERRY', 'Tom', 'tom', 'tom@mail.com', '$2y$10$SSo4yKt5uclhi.p9dtmqrubliv.XW7UApQ2zIiruLNuQ.mXKWZgZK', 'admin', 1),
(56, 'user_shy665e32b766d6e.jpg', 'NELSON', 'shy', 'shy1', 'shy@mail.com', '$2y$10$I/NEJLESzVRP3.SRBfbrm./YmTN6WCDQsfXQVEjRFmx0aPpgJPb36', 'admin', 1),
(57, 'user_elsa665e34bc64cb4.jpg', 'MENDES', 'Elsa', 'elsa1', 'elsa@mail.com', '$2y$10$bU/Z.YYVbeHfM9nynlmdyuGqzbrjmcJnFdgovGdSdR6oI8AUYyEDa', 'admin', 1),
(58, 'user_tyler665e35b9da520.jpg', 'RODNEY', 'Tyler', 'tyler1', 'tyler@mail.com', '$2y$10$8itzYNF.8VdZAxXfj3aNLeOTPdf3IevJU9Bx8d8N8wP43vm4G3FUu', 'admin', 1),
(59, 'user_john665e370bba8b3.jpg', 'TRAVOLTA', 'John', 'john1', 'john@mail.com', '$2y$10$1bz.4QtwhElmhGQZJpYmg.msa3kDqw6Zh0rc00HY7/kjhyIwaFStG', 'admin', 1),
(60, 'user_tina665e37ebce70d.jpg', 'LY', 'Tina', 'tina1', 'tina@mail.com', '$2y$10$ksHr2soNZTDTGvIe6Dv7FenFaKVO7ueg7.xclMQHzJKsnGUnmcoIK', 'admin', 1),
(61, 'user_alain665ed0790c48e.jpg', 'DUCASSE', 'Alain', 'alin1', 'alain@mail.com', '$2y$10$If/ie9t.r2cwvomQhQeilutq0MEZ0rB6TmETi5juCA8orHQXG15rK', 'admin', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `categorie_name` (`categorie_name`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `event_date`
--
ALTER TABLE `event_date`
  ADD PRIMARY KEY (`id_event_date`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `event_date`
--
ALTER TABLE `event_date`
  MODIFY `id_event_date` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id_evenement`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_utilisateur`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
