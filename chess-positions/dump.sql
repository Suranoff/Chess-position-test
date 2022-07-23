CREATE TABLE `position` (
  `id` tinyint(4) NOT NULL,
  `fen_string` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `position` (`id`, `fen_string`) VALUES
(1, 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1'),
(2, 'rnbqkbnr/ppp1pppp/8/3p4/4P3/8/PPPP1PPP/RNBQKBNR w KQkq d6 0 2'),
(3, 'rnbqkbnr/ppp1pppp/8/3p4/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2'),
(4, 'rnbq1bnr/pppkpppp/8/3p4/4P3/5N2/PPPP1PPP/RNBQKB1R w - - 2 3'),
(5, '1k6/8/3K4/8/8/7B/6Q1/8 w KQkq - 0 1');
ALTER TABLE `position` ADD PRIMARY KEY (`id`);
ALTER TABLE `position` MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;