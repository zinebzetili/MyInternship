CREATE TABLE `interview` (
  `ID_interview` int(11) auto_increment not null primary key,
  `start_date` date NOT NULL ,
  `end_date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `location` varchar(100),
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
