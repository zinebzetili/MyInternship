Alter TABLE `users` add column (
  `edu_level` varchar(255) NOT NULL,
  `study_year` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `description` varchar(255),
  `university` varchar(255) ,
  `id_files` INT,
  FOREIGN KEY (`id_files`) REFERENCES `files`(`id_files`),
);