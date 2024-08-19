CREATE TABLE `provider` (
  `ID_provider` int(11) auto_increment not null primary key,
  `name` varchar(50) NOT NULL,
  `profissional_email` varchar(50) NOT NULL,
  `establishement_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `website_link` varchar(100),
  `create_datetime` datetime NOT NULL,
  `id_establishement` int(11) NOT NULL,
  foreign key (id_establishement) references establishement(id_establishement)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;