CREATE TABLE `category` (
  `ID_category` int(11) auto_increment not null primary key,
  `title` varchar(20) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
