-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Fev-2023 às 13:43
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pepsico_memoria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `texto`
--

CREATE TABLE `texto` (
  `idTexto` int(11) NOT NULL,
  `pack` int(11) NOT NULL,
  `carta` varchar(255) NOT NULL,
  `texto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `texto`
--

INSERT INTO `texto` (`idTexto`, `pack`, `carta`, `texto`) VALUES
(1, 1, '1-2', 'Buscar continuamente novas oportunidades de crescimento e eficiência nos custos, acelerando pep+'),
(2, 1, '2-2', 'Usar dados e empatia para entender e antecipar as necessidades  dos nossos consumidores finais'),
(3, 1, '3-2', 'Criar um espaço transparente e seguro para opiniões diferentes'),
(4, 1, '4-2', 'Manter o foco no que realmente importa e esclarecer o que não faremos'),
(5, 1, '5-2', 'Fazer sempre o correto para a PepsiCo, o planeta e as comunidades onde operamos'),
(6, 1, '6-2', 'Construir um ambiente de trabalho positivo e de apoio voltado para as pessoas'),
(7, 1, '7-2', 'Contratar e promover os melhores e estimular o desenvolvimento contínuo para todos(as)'),
(8, 2, '1-2', 'Assumir riscos calculados e estimular outros a fazer o mesmo'),
(9, 2, '2-2', 'Focar no consumidor final em cada decisão que tomamos'),
(10, 2, '3-2', 'Procurar feedback, ouvir ativamente e ser curioso'),
(11, 2, '4-2', 'Simplificar a forma como trabalhamos, eliminar a burocracias e remover obstáculos'),
(12, 2, '5-2', 'Se comportar de maneira transparente e autêntica'),
(13, 2, '6-2', 'Criar momentos de diversão e celebração'),
(14, 2, '7-2', 'Construir equipes diversas e ambientes inclusivos'),
(15, 3, '1-2', 'Pensar de ponta a ponta; fazer o que seja melhor para PepsiCo como um todo e não apenas para sua área'),
(16, 3, '2-2', 'Inovar constantemente para criar mais valor ao consumidor final'),
(17, 3, '3-2', 'Questionar decisões de forma respeitosa quando discordar'),
(18, 3, '4-2', 'Decidir, se comprometer e executar com rapidez e agilidade'),
(19, 3, '5-2', 'Confiar nos outros e empoderá-los para entregar resultados'),
(20, 3, '6-2', 'Reconhecer as contribuições de cada um, tanto grandes quanto pequenas'),
(21, 3, '7-2', 'Reconhecer pessoas com base nos comportamentos do The PepsiCo Way, desempenho e potencial');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `texto`
--
ALTER TABLE `texto`
  ADD PRIMARY KEY (`idTexto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `texto`
--
ALTER TABLE `texto`
  MODIFY `idTexto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
