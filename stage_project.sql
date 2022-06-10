-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2022 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stage_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `editors`
--

CREATE TABLE `editors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editors`
--

INSERT INTO `editors` (`id`, `name`) VALUES
(3, 'Czech Games Edition'),
(4, 'Repos Production'),
(5, 'Dolphin Hat Games'),
(6, 'La Boîte de Jeu'),
(7, 'Partizan Press'),
(8, '(Web published)');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `id_api` int(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `nb_players` varchar(10) DEFAULT NULL,
  `playingtime` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `id_api`, `img`, `title`, `description`, `nb_players`, `playingtime`, `id_editor`) VALUES
(5, 312484, 'https://cf.geekdo-images.com/6GqH14TJJhza86BX5HCLEQ__thumb/img/J8SVmGOJXZGxNjkT3xYNQU7Haxg=/fit-in/200x150/filters:strip_icc()/pic5674958.jpg', 'Lost Ruins of Arnak', 'On an uninhabited island in uncharted seas, explorers have found traces of a great civilization. Now you will lead an expedition to explore the island, find lost artifacts, and face fearsome guardians, all in a quest to learn the island\'s secrets.&#10;&#10;Lost Ruins of Arnak combines deck-building and worker placement in a game of exploration, resource management, and discovery. In addition to traditional deck-builder effects, cards can also be used to place workers, and new worker actions become available as players explore the island. Some of these actions require resources instead of workers, so building a solid resource base will be essential. You are limited to only one action per turn, so make your choice carefully... what action will benefit you most now? And what can you afford to do later... assuming someone else doesn\'t take the action first!?&#10;&#10;Decks are small, and randomness in the game is heavily mitigated by the wealth of tactical decisions offered on the game board. With a variety of worker actions, artifacts, and equipment cards, the set-up for each game will be unique, encouraging players to explore new strategies to meet the challenge.&#10;&#10;Discover the Lost Ruins of Arnak!&#10;&#10;&mdash;description from the publisher&#10;&#10;', '1 - 4', 120, 3),
(6, 147151, 'https://cf.geekdo-images.com/hHFs0_KRoW_FJ0cMIVgZcw__thumb/img/1MmGQvJVNw8TA7eWAJ8oIK-ZENc=/fit-in/200x150/filters:strip_icc()/pic4991925.jpg', 'Concept', 'In Concept, your goal is to guess words through the association of icons. A team of two players &ndash; neighbors at the table &ndash; choose a word or phrase that the other players need to guess. Acting together, this team places pieces judiciously on the available icons on the game board.&#10;&#10;To get others to guess &quot;milk&quot;, for example, the team might place the question mark icon (which signifies the main concept) on the liquid icon, then cubes of this color on the icons for &quot;food/drink&quot; and &quot;white&quot;. For a more complicated concept, such as &quot;Leonardo DiCaprio&quot;, the team can use the main concept and its matching cubes to clue players into the hidden phrase being an actor or director, while then using sub-concept icons and their matching cubes to gives clues to particular movies in which DiCaprio starred, such as Titanic or Inception.&#10;&#10;The first player to discover the word or phrase receives 2 victory points, the team receives points as well, and the player who ends up with the most points wins.&#10;&#10;', '4 - 12', 40, 4),
(8, 253664, 'https://cf.geekdo-images.com/Huss90M3Dw69vZKsl6COaw__thumb/img/FT3OeUFrnFGZXukJbHNX9bcvQvY=/fit-in/200x150/filters:strip_icc()/pic5197313.png', 'Taco Cat Goat Cheese Pizza', 'Taco Cat Goat Cheese Pizza is filled to the brim with hand-slapping mayhem! As in Snap and Dobble, each player places a card from their hand face up into a community pile while saying taco/cat/goat/cheese/pizza in player sequence. When the card matches the mantra &mdash; boom! &mdash; everyone slaps their hand on the deck, with the last one to slap picking up the cards. Whoever rids themselves of cards first wins!&#10;&#10;For extra fun, special action cards &ndash; the gorilla, narwhal, and groundhog &mdash; force players to make certain gestures before racing to slap the deck!&#10;&#10;', '2 - 8', 30, 5),
(9, 68448, 'https://cf.geekdo-images.com/RvFVTEpnbb4NM7k0IF8V7A__thumb/img/ZlG_SRFChObHenw79fAve56_mnk=/fit-in/200x150/filters:strip_icc()/pic860217.jpg', '7 Wonders', 'You are the leader of one of the 7 great cities of the Ancient World. Gather resources, develop commercial routes, and affirm your military supremacy. Build your city and erect an architectural wonder which will transcend future times.&#10;&#10;7 Wonders lasts three ages. In each age, players receive seven cards from a particular deck, choose one of those cards, then pass the remainder to an adjacent player. Players reveal their cards simultaneously, paying resources if needed or collecting resources or interacting with other players in various ways. (Players have individual boards with special powers on which to organize their cards, and the boards are double-sided). Each player then chooses another card from the deck they were passed, and the process repeats until players have six cards in play from that age. After three ages, the game ends.&#10;&#10;In essence, 7 Wonders is a card development game. Some cards have immediate effects, while others provide bonuses or upgrades later in the game. Some cards provide discounts on future purchases. Some provide military strength to overpower your neighbors and others give nothing but victory points. Each card is played immediately after being drafted, so you\'ll know which cards your neighbor is receiving and how her choices might affect what you\'ve already built up. Cards are passed left-right-left over the three ages, so you need to keep an eye on the neighbors in both directions.&#10;&#10;Though the box of earlier editions is listed as being for 3&ndash;7 players, there is an official 2-player variant included in the instructions.&#10;&#10;', '2 - 7', 30, 4),
(10, 173346, 'https://cf.geekdo-images.com/zdagMskTF7wJBPjX74XsRw__thumb/img/gV1-ckZSIC-dCxxpq1Y7GmPITzQ=/fit-in/200x150/filters:strip_icc()/pic2576399.jpg', '7 Wonders Duel', 'In many ways 7 Wonders Duel resembles its parent game 7 Wonders as over three ages players acquire cards that provide resources or advance their military or scientific development in order to develop a civilization and complete wonders.&#10;&#10;What\'s different about 7 Wonders Duel is that, as the title suggests, the game is solely for two players, with the players not drafting cards simultaneously from hands of cards, but from a display of face-down and face-up cards arranged at the start of a round. A player can take a card only if it\'s not covered by any others, so timing comes into play as well as bonus moves that allow you to take a second card immediately. As in the original game, each card that you acquire can be built, discarded for coins, or used to construct a wonder.&#10;&#10;Each player starts with four wonder cards, and the construction of a wonder provides its owner with a special ability. Only seven wonders can be built, though, so one player will end up short.&#10;&#10;Players can purchase resources at any time from the bank, or they can gain cards during the game that provide them with resources for future building; as you acquire resources, the cost for those particular resources increases for your opponent, representing your dominance in this area.&#10;&#10;A player can win 7 Wonders Duel in one of three ways: each time you acquire a military card, you advance the military marker toward your opponent\'s capital, giving you a bonus at certain positions; if you reach the opponent\'s capital, you win the game immediately; similarly, if you acquire any six of seven different scientific symbols, you achieve scientific dominance and win immediately; if none of these situations occurs, then the player with the most points at the end of the game wins.&#10;&#10;', '2 - 2', 30, 4),
(11, 341254, 'https://cf.geekdo-images.com/U4aoXbKATU7YbA8bAT73FQ__thumb/img/g0aac2-OQvMbEPXv1vIvSumPmkA=/fit-in/200x150/filters:strip_icc()/pic6253876.png', 'Lost Ruins of Arnak: Expedition Leaders', 'Return to the mysterious island of Arnak in Lost Ruins of Arnak: Expedition Leaders!&#10;&#10;Give your expedition an edge by choosing one of six unique leaders, each equipped with different abilities, skills, and starting decks that offer different strategies and styles of play for you to explore.&#10;&#10;In addition to the leader abilities, which bring a new element of asymmetry to the game, this expansion contains alternative research tracks that offer even more variety and a bigger challenge, new item and artifact cards to create new combos and synergies, along with more guardians &amp; assistants to meet and sites to explore.&#10;&#10;', '1 - 4', 120, 3),
(12, 256918, 'https://cf.geekdo-images.com/ABZviyGtdvSexTS3l1Q6cA__thumb/img/DnW03G2_pqOgoA76-YWQB87x_GA=/fit-in/200x150/filters:strip_icc()/pic4244549.png', 'Cerberus', 'Your final adventure has taken you where you should never have gone &mdash; to the underworld! You must escape and find a barque that can float you safely back. But Cerberus, the infernal watchdog, is on your heels with the intent to guard you forever.&#10;&#10;In the semi-cooperative game Cerberus, you must help each other traverse the game board without being caught by Cerberus so that you can board the barque. Each card in your hand offers you the choice between a small effect for you or a powerful effect for the group! However, there aren\'t enough seats on the barque for everyone, so sooner or later, some must be sacrificed. Will you help your group reach the exit, or will you play powerful bonus cards to lay traps for your opponents? Those caught by Cerberus get to seek revenge and victory by preventing all the adventurers from escaping...&#10;&#10;Each game is different thanks to ten different board layouts and your ability to adjust Cerberus\' strength as you please.&#10;&#10;', '3 - 7', 45, 6),
(14, 330123, 'https://cf.geekdo-images.com/O4k4xRyk_hlOoYhCNV2EEw__thumb/img/Ef9HGf5CdddDho1eGIa5ik3nPwQ=/fit-in/200x150/filters:strip_icc()/pic5972304.jpg', 'The \'Nam: The Way it Was', 'By using simple to understand mechanics, such as playing cards and \'dice shifting\', it is possible to simulate any of the troops who did the fightin` and a-dyin` a long way away from home or amongst their own cities and villages.&#10;&#10;The rules attempt to embrace all the combatants who played a part in the war on both sides, from the Viet Cong guerrilla to the contributions made by Australia, South Korea and others (see \'Falling Dominoes\' supplement).&#10;&#10;The aim is the use of 28mm-sized figures, but 15 - 20mm miniatures may also be used with no real changes needing to be made.&#10;&#10;The game is focused upon platoon level actions, although it should be possible to scale up or down as required (company to rifle squad).&#10;&#10;&mdash;description from the publisher&#10;&#10;', '2 - 99', 0, 7),
(15, 347600, 'https://cf.geekdo-images.com/sp9kKYF5tCiAyEZhCEFvaw__thumb/img/oh6DrJm7ELFBFSGDb8gYI8rhio4=/fit-in/200x150/filters:strip_icc()/pic6573259.jpg', '1212 Las Navas de Tolosa', '1212: Navas de Tolosa is a small tactical wargame for 2 players that allows you to revive this famous medieval battle of the Reconquista where two very different ways of understanding war face each other: the Christian one represented by the kingdoms of Castile, Aragon and Navarre, and the Muslim one represented by the Almohad Empire. Through action points, players move their troops across the battlefield and fight fiercely to death, but only if they learn to play their cards wisely they will be able to claim victory.&#10;Each player plays one card face down. The two cards are revealed simultaneously. The player with the highest number wins the initiative. Starting with the player who has won the initiative, players take turns playing their cards as action points.&#10;Victory conditions: the Black Guard troop is eliminated (Christian); 8 or fewer troops on the battlefield and no Cristian in the Muslim zone (Muslim); double or more troops than the rival (Both players).&#10;&#10;', '2 - 2', 45, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'Admin', '$2y$10$S56Pla6DdPv83jEFdGUIluYsswy.o0mdbq3iHWIrAjKA7yClt9YI6');

-- --------------------------------------------------------

--
-- Table structure for table `usersgames`
--

CREATE TABLE `usersgames` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `is_wishlist` bit(1) DEFAULT b'0',
  `is_own` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersgames`
--

INSERT INTO `usersgames` (`id`, `user_id`, `game_id`, `is_wishlist`, `is_own`) VALUES
(12, 1, 5, b'1', b'0'),
(13, 1, 6, b'1', b'0'),
(14, 1, 8, b'1', b'0'),
(15, 1, 9, b'0', b'1'),
(16, 1, 10, b'0', b'1'),
(17, 1, 11, b'0', b'1'),
(18, 1, 12, b'0', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `editors`
--
ALTER TABLE `editors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_editor` (`id_editor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersgames`
--
ALTER TABLE `usersgames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `editors`
--
ALTER TABLE `editors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usersgames`
--
ALTER TABLE `usersgames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`id_editor`) REFERENCES `editors` (`id`);

--
-- Constraints for table `usersgames`
--
ALTER TABLE `usersgames`
  ADD CONSTRAINT `usersgames_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `usersgames_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
