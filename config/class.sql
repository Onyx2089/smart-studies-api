
CREATE TABLE `class` (
  `ID` int(11) AUTO_INCREMENT PRIMARY KEY,
  `NAME` varchar(100) NOT NULL,
  `TIME` datetime NOT NULL,
  `DURATION` int(11) NOT NULL,
  `CURSUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
