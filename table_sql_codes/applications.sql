CREATE TABLE `applications` (
  `ID_application` int(11) auto_increment not null primary key,
  `description` varchar(500) NOT NULL,
  `website_link` varchar(100),
  `start_date` date NOT NULL ,
  `end_date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(100),
  `create_datetime` datetime NOT NULL,
  `ID_provider` int(11) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
