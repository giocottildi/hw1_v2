-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 25, 2024 alle 14:54
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `user_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `nome_lista` varchar(255) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `stato` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`user_id`, `id`, `nome_lista`, `titolo`, `stato`) VALUES
(4, 11, 'zio kyogre', 'Il mastino dei Baskerville', 'letti'),
(4, 12, ' zio kyogre', 'Uno studio in Rosso', 'letti'),
(4, 13, 'zio kyogre', 'Il segno dei quattro', 'letti'),
(4, 14, 'zio kyogre', 'Uno scandalo in Boemia', 'non_letti'),
(4, 15, 'zio kyogre', 'Il carbonchio azzurro', 'non_letti'),
(1, 16, 'plasmon', 'Il mastino dei Baskerville', 'letti'),
(1, 17, 'plasmon', 'Uno studio in Rosso', 'letti'),
(1, 18, 'plasmon', 'Il segno dei quattro', 'non_letti'),
(1, 19, 'plasmon', 'Uno scandalo in Boemia', 'non_letti'),
(1, 20, 'plasmon', 'Il carbonchio azzurro', 'non_ricordo'),
(1, 21, 'plasmon', 'pippo', 'non_ricordo'),
(2, 22, 'chicco', 'Il mastino dei baskerville', 'letti'),
(2, 23, 'chicco', 'Uno studio in rosso', 'letti'),
(2, 24, 'chicco', 'Il segno dei quattro', 'letti'),
(2, 25, 'chicco', 'Uno scandalo in Boemia', 'letti'),
(2, 26, 'chicco', 'Il carbonchio azzurro', 'letti'),
(2, 27, 'chicco', 'Pippo', 'letti'),
(2, 28, 'PIPPPO', 'Il mastino dei baskerville', 'letti'),
(2, 29, 'PIPPPO', 'Uno studio in rosso', 'letti'),
(2, 30, 'PIPPPO', 'Il segno dei quattro', 'letti'),
(2, 31, 'PIPPPO', 'Uno scandalo in Boemia', 'letti'),
(2, 32, 'PIPPPO', 'Il carbonchio azzurro', 'non_letti'),
(2, 33, 'PIPPPO', 'Pippo', 'non_ricordo'),
(2, 34, 'zio kyogre', 'Il mastino dei baskerville', 'letti'),
(2, 35, 'zio kyogre', 'Uno studio in rosso', 'letti'),
(2, 36, 'zio kyogre', 'Il segno dei quattro', 'letti'),
(2, 37, 'zio kyogre', 'Uno scandalo in Boemia', 'non_letti'),
(2, 38, 'zio kyogre', 'Il carbonchio azzurro', 'non_ricordo'),
(2, 39, 'zio kyogre', 'Pippo', 'non_ricordo'),
(2, 40, 'il papa', 'Il mastino dei baskerville', 'non_letti'),
(2, 41, 'il papa', 'Uno studio in rosso', 'non_letti'),
(2, 42, 'il papa', 'Il segno dei quattro', 'non_letti'),
(2, 43, 'il papa', 'Uno scandalo in Boemia', 'non_letti'),
(2, 44, 'il papa', 'Il carbonchio azzurro', 'non_letti'),
(2, 45, 'il papa', 'Pippo', 'non_letti'),
(1, 46, 'pikachu', 'Il mastino dei baskerville', 'letti'),
(1, 47, 'pikachu', 'Uno studio in rosso', 'letti'),
(1, 48, 'pikachu', 'Il segno dei quattro', 'letti'),
(1, 49, 'pikachu', 'Uno scandalo in Boemia', 'non_letti'),
(1, 50, 'pikachu', 'Il carbonchio azzurro', 'non_letti'),
(1, 51, 'pikachu', 'Pippo', 'non_letti'),
(1, 52, 'caparezza', 'Il mastino dei baskerville', 'non_letti'),
(1, 53, 'caparezza', 'Uno studio in rosso', 'non_letti'),
(1, 54, 'caparezza', 'Il segno dei quattro', 'non_ricordo'),
(1, 55, 'caparezza', 'Uno scandalo in Boemia', 'non_letti'),
(1, 56, 'caparezza', 'Il carbonchio azzurro', 'non_ricordo'),
(1, 57, 'caparezza', 'Pippo', 'letti');

-- --------------------------------------------------------

--
-- Struttura della tabella `ol_salvati`
--

CREATE TABLE `ol_salvati` (
  `id_user` int(11) DEFAULT NULL,
  `id_salvato` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `cover_id` varchar(255) DEFAULT NULL,
  `autore` varchar(255) NOT NULL,
  `anno_pubblicazione` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ol_salvati`
--

INSERT INTO `ol_salvati` (`id_user`, `id_salvato`, `title`, `cover_id`, `autore`, `anno_pubblicazione`) VALUES
(1, 334, 'The Lost World', '8231444', 'Arthur Conan Doyle', 1900),
(1, 340, 'On the Nature of the Universe', '566208', 'Titus Lucretius Carus', 1486),
(1, 342, 'The Adventures of Sherlock Holmes [12 stories]', '6717853', 'Arthur Conan Doyle', 1892),
(1, 344, 'The Watsons go to Birmingham--1963', '10323552', 'Christopher Paul Curtis, Reginald André Jackson, Eida de la Vega', 1963),
(1, 345, '[William Wheeler Hubbell, authorized to apply for patents.]', '10200621', 'United States. Congress. Senate. Committee on Patents', 1858),
(1, 346, 'Ὀδύσσεια', '9045853', 'Όμηρος (Homer)', 1488),
(1, 347, 'Moralia', '5788251', 'Plutarch', 1500),
(1, 348, 'As You Like It', '7338874', 'William Shakespeare', 1734);

-- --------------------------------------------------------

--
-- Struttura della tabella `quotes`
--

CREATE TABLE `quotes` (
  `id_quote` int(11) NOT NULL,
  `actual_quote` varchar(255) DEFAULT NULL,
  `quote_cit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `quotes`
--

INSERT INTO `quotes` (`id_quote`, `actual_quote`, `quote_cit`) VALUES
(2, 'Ciò che un uomo può inventare, un altro può scoprire.', '(da L`avventura degli omini danzanti)'),
(3, 'Da molto tempo il mio assioma è che le piccole cose sono di gran lunga le più importanti.', '(da Un caso di identità)'),
(4, 'È un errore enorme teorizzare a vuoto. Senza accorgersene, si comincia a deformare i fatti per adattarli alle teorie, anziché il viceversa.', '(da Uno scandalo in Boemia)'),
(5, 'È un errore confondere ciò che è strano con ciò che è misterioso. Spesso, il delitto più banale è il più incomprensibile proprio perché non presenta aspetti insoliti o particolari, da cui si possono trarre delle deduzioni.', '(da Uno studio in rosso)'),
(6, 'Eliminato l`impossibile, ciò che resta, per quanto improbabile sia, deve essere la verità.', '(da Il segno dei quattro)'),
(7, 'Il modo migliore per recitare una parte è quello di viverla.', '(da L`avventura del detective morente)'),
(8, 'Il mondo è pieno di cose ovvie che nessuno si prende mai la cura di osservare.', '(da Il mastino dei Baskerville)'),
(9, 'Il tocco supremo dell`artista – sapere quando fermarsi.', '(da L`avventura del costruttore di Norwood)'),
(10, 'La mia vita non è che un continuo sforzo per sfuggire alla banalità dell`esistenza.', '(da La lega dei capelli rossi)'),
(11, 'La prova principale della vera grandezza di un uomo è la sua percezione della propria piccolezza.', '(da Il segno dei quattro)'),
(12, 'Nella matassa incolore della vita scorre il filo rosso del delitto, e il nostro compito sta nel dipanarlo, nell`isolarlo, nell`esporne ogni pollice.', '(da Uno studio in rosso)'),
(13, 'Non faccio mai eccezioni. Un`eccezione contraddice la regola.', '(da Il segno dei quattro)'),
(14, 'Non posso vivere se non faccio lavorare il cervello. Quale altro scopo c`è nella vita?', '(da Il segno dei quattro)'),
(15, 'Non sono fra coloro che considerano la modestia una virtù. Per un uomo dotato di logica, tutte le cose andrebbero viste esattamente come sono, e sottovalutare se stessi significa allontanarsi dalla verità almeno quanto sopravvalutare le proprie doti.', '(da L`interprete greco)'),
(16, 'Nulla è più innaturale dell`ovvio.', '(da Un caso di identità)'),
(17, 'Quella dell`investigazione è, o dovrebbe essere, una scienza esatta e andrebbe quindi trattata in maniera fredda e distaccata.', '(da Il segno dei quattro)'),
(18, 'Sono proprio le soluzioni più semplici quelle che in genere vengono trascurate.', '(da Il segno dei quattro)'),
(19, 'Tutto ciò che non è noto appare straordinario.', '(da Il mastino dei Baskerville)'),
(20, 'Una deduzione giusta ne suggerisce invariabilmente altre.', '(da Silver Blaze)');

-- --------------------------------------------------------

--
-- Struttura della tabella `ricerche_spotify`
--

CREATE TABLE `ricerche_spotify` (
  `id_user` int(11) DEFAULT NULL,
  `id_ricerca` int(11) NOT NULL,
  `ricerca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ricerche_spotify`
--

INSERT INTO `ricerche_spotify` (`id_user`, `id_ricerca`, `ricerca`) VALUES
(3, 159, 'Sherlock');

-- --------------------------------------------------------

--
-- Struttura della tabella `titoli_libri`
--

CREATE TABLE `titoli_libri` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) DEFAULT NULL,
  `numero_uscita` varchar(255) DEFAULT NULL,
  `data_uscita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `titoli_libri`
--

INSERT INTO `titoli_libri` (`id`, `titolo`, `numero_uscita`, `data_uscita`) VALUES
(1, 'Il mastino dei baskerville', '1^Uscita', '2023-04-01'),
(2, 'Uno studio in rosso', '	\r\n2^Uscita', '2023-04-08'),
(3, 'Il segno dei quattro', '	\r\n3^Uscita', '2023-04-15'),
(4, 'Uno scandalo in Boemia', '	\r\n4^Uscita', '2023-04-21'),
(5, 'Il carbonchio azzurro', '	\r\n5^Uscita', '2023-04-28'),
(6, 'Pippo', '	\r\n\r\n6^Uscita', '2023-05-01');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `surname`) VALUES
(1, 'MarkPane_44', '$2y$10$pi/kmA6fXGGuq0uqRGoszOMQNWD9Kp88RvxO2OEJyorNDi9f5MeIy', 'markpane@gmail.com', 'Marco', 'Panettiere'),
(2, 'pippoimpasta', '$2y$10$sFXne5Lv7KOWagDzc5jdIewuMwb6JazuPuXqivQPKnfiaugTG62rK', 'pippoimpasta@gmail.com', 'Giuseppe', 'Impastato'),
(3, 'magikPaolo', '$2y$10$xKPRF./ReFoiCswNuWtSxufzVmCfz6WSL50TeSSgsPp/4uKfTqseW', 'magikpaolo@gmail.com', 'Paolo', 'Magikarp'),
(4, 'cl16', '$2y$10$SMTFx2vNDbDyfTXTNSpQCurWos3ejDTWc7nC0gYWQNpbtup8DO2m6', 'cl16@gmail.com', 'charles', 'leclerc');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `ol_salvati`
--
ALTER TABLE `ol_salvati`
  ADD PRIMARY KEY (`id_salvato`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id_quote`);

--
-- Indici per le tabelle `ricerche_spotify`
--
ALTER TABLE `ricerche_spotify`
  ADD PRIMARY KEY (`id_ricerca`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `titoli_libri`
--
ALTER TABLE `titoli_libri`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT per la tabella `ol_salvati`
--
ALTER TABLE `ol_salvati`
  MODIFY `id_salvato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT per la tabella `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id_quote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `ricerche_spotify`
--
ALTER TABLE `ricerche_spotify`
  MODIFY `id_ricerca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT per la tabella `titoli_libri`
--
ALTER TABLE `titoli_libri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `libri`
--
ALTER TABLE `libri`
  ADD CONSTRAINT `libri_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `ol_salvati`
--
ALTER TABLE `ol_salvati`
  ADD CONSTRAINT `ol_salvati_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `ricerche_spotify`
--
ALTER TABLE `ricerche_spotify`
  ADD CONSTRAINT `ricerche_spotify_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
