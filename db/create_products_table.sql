-- db/create_products_table.sql
-- DDL para criar a tabela products e inserir alguns registros de exemplo

CREATE DATABASE IF NOT EXISTS `u836476048_pg005_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u836476048_pg005_db`;

CREATE TABLE IF NOT EXISTS `products` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `description` TEXT NULL,
  `price` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `image` VARCHAR(255) NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exemplos
INSERT INTO `products` (`name`, `description`, `price`, `image`) VALUES
('Caneca Programação', 'Caneca de cerâmica com estampa de código.', 29.90, 'img/caneca.jpg'),
('Camiseta Curso', 'Camiseta oficial do curso - 100% algodão.', 49.90, 'img/camiseta.jpg'),
('Adesivo Gremio', 'Adesivo do Grêmio para notebook e cadernos.', 5.00, 'img/adesivo.png');
