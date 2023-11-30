-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2023 às 05:11
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `venus`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `ano_publicacao` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `capa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autor`, `ano_publicacao`, `id_categoria`, `sinopse`, `capa`) VALUES
(1, 'A Fundação', 'Isaac Asimov', 1951, 1, NULL, NULL),
(2, 'Duna', 'Frank Herbert', 1965, 1, NULL, NULL),
(3, 'Neuromancer', 'William Gibson', 1984, 1, NULL, NULL),
(4, '2001: Uma Odisseia no Espaço', 'Arthur C. Clarke', 1968, 1, NULL, NULL),
(5, 'O Fim da Eternidade', 'Isaac Asimov', 1955, 1, NULL, NULL),
(6, 'O Guia do Mochileiro das Galáxias', 'Douglas Adams', 1979, 1, NULL, NULL),
(7, 'Snow Crash', 'Neal Stephenson', 1992, 1, NULL, NULL),
(8, 'Encontro com Rama', 'Arthur C. Clarke', 1973, 1, NULL, NULL),
(9, 'O Homem do Castelo Alto', 'Philip K. Dick', 1962, 1, NULL, NULL),
(10, 'O Fim da Infância', 'Arthur C. Clarke', 1953, 1, NULL, NULL),
(11, 'The Expanse: Leviathan Wakes', 'James S.A. Corey', 2011, 1, NULL, NULL),
(12, 'A Longa Viagem a um Pequeno Planeta Hostil', 'Becky Chambers', 2014, 1, NULL, NULL),
(13, 'A Cidade e a Cidade', 'China Miéville', 2009, 1, NULL, NULL),
(14, 'A Fênix Exultante', 'Jo Walton', 2019, 1, NULL, NULL),
(15, 'Persepolis Rising', 'James S.A. Corey', 2017, 1, NULL, NULL),
(16, 'O Problema dos Três Corpos', 'Cixin Liu', 2008, 1, NULL, NULL),
(17, 'Aniquilação', 'Jeff VanderMeer', 2014, 1, NULL, NULL),
(18, 'A Criança Estrela', 'Jo Walton', 2016, 1, NULL, NULL),
(19, 'Estação Onze', 'Emily St. John Mandel', 2014, 1, NULL, NULL),
(20, 'A Máquina do Tempo', 'H.G. Wells', 1895, 1, NULL, NULL),
(21, 'Orgulho e Preconceito', 'Jane Austen', 1813, 2, NULL, NULL),
(22, 'Cem Anos de Solidão', 'Gabriel García Márquez', 1967, 2, NULL, NULL),
(23, 'E o Vento Levou', 'Margaret Mitchell', 1936, 2, NULL, NULL),
(24, 'Amor nos Tempos do Cólera', 'Gabriel García Márquez', 1985, 2, NULL, NULL),
(25, 'Jane Eyre', 'Charlotte Brontë', 1847, 2, NULL, NULL),
(26, 'Orgulho e Preconceito', 'Jane Austen', 1813, 2, NULL, NULL),
(27, 'Cem Anos de Solidão', 'Gabriel García Márquez', 1967, 2, NULL, NULL),
(28, 'E o Vento Levou', 'Margaret Mitchell', 1936, 2, NULL, NULL),
(29, 'Amor nos Tempos do Cólera', 'Gabriel García Márquez', 1985, 2, NULL, NULL),
(30, 'Jane Eyre', 'Charlotte Brontë', 1847, 2, NULL, NULL),
(31, 'Me Chame Pelo Seu Nome', 'André Aciman', 2007, 2, NULL, NULL),
(32, 'Pequenas Grandes Mentiras', 'Liane Moriarty', 2014, 2, NULL, NULL),
(33, 'Com Quem Serás Feliz?', 'Tânia Carvalho', 2020, 2, NULL, NULL),
(34, 'Eleanor Oliphant Está Muito Bem', 'Gail Honeyman', 2017, 2, NULL, NULL),
(35, 'Um Maravilhoso Mundo Pequeno', 'Joyce Carol Oates', 2019, 2, NULL, NULL),
(36, 'A Amiga Genial', 'Elena Ferrante', 2011, 2, NULL, NULL),
(37, 'Para Todos os Garotos que Já Amei', 'Jenny Han', 2014, 2, NULL, NULL),
(38, 'Peça-me o que Quiser', 'Megan Maxwell', 2012, 2, NULL, NULL),
(39, 'A Cinco Passos de Você', 'Rachael Lippincott', 2018, 2, NULL, NULL),
(40, 'Meu Romeu', 'Leisa Rayven', 2015, 2, NULL, NULL),
(41, 'O Assassinato no Expresso do Oriente', 'Agatha Christie', 1934, 3, NULL, NULL),
(42, 'A Garota no Trem', 'Paula Hawkins', 2015, 3, NULL, NULL),
(43, 'O Silêncio dos Inocentes', 'Thomas Harris', 1988, 3, NULL, NULL),
(44, 'O Código Da Vinci', 'Dan Brown', 2003, 3, NULL, NULL),
(45, 'Garota Exemplar', 'Gillian Flynn', 2012, 3, NULL, NULL),
(46, 'O Caso dos Dez Negrinhos', 'Agatha Christie', 1939, 3, NULL, NULL),
(47, 'O Colecionador', 'John Fowles', 1963, 3, NULL, NULL),
(48, 'A Sombra do Vento', 'Carlos Ruiz Zafón', 2001, 3, NULL, NULL),
(49, 'O Homem que Buscava Sua Sombra', 'David Lagercrantz', 2015, 3, NULL, NULL),
(50, 'Mistborn: O Império Final', 'Brandon Sanderson', 2006, 3, NULL, NULL),
(51, 'A Mulher na Janela', 'A.J. Finn', 2018, 3, NULL, NULL),
(52, 'O Enigma do Quarto 622', 'Joël Dicker', 2020, 3, NULL, NULL),
(53, 'A Garota que Viveu Duas Vezes', 'David Lagercrantz', 2019, 3, NULL, NULL),
(54, 'O Silêncio da Cidade Branca', 'Eva García Sáenz de Urturi', 2016, 3, NULL, NULL),
(55, 'O Homem de Giz', 'C.J. Tudor', 2018, 3, NULL, NULL),
(56, 'A Paciente Silenciosa', 'Alex Michaelides', 2019, 3, NULL, NULL),
(57, 'A Última Casa da Rua', 'Lynn Shepherd', 2021, 3, NULL, NULL),
(58, 'A Garota do Lago', 'Charlie Donlea', 2020, 3, NULL, NULL),
(59, 'Um Estranho na Casa', 'Shari Lapena', 2017, 3, NULL, NULL),
(60, 'A Mulher no Escuro', 'Raphael Montes', 2019, 3, NULL, NULL),
(61, 'Sapiens: Uma Breve História da Humanidade', 'Yuval Noah Harari', 2014, 4, NULL, NULL),
(62, 'O Poder do Hábito', 'Charles Duhigg', 2012, 4, NULL, NULL),
(63, 'Thinking, Fast and Slow', 'Daniel Kahneman', 2011, 4, NULL, NULL),
(64, 'O Andar do Bêbado', 'Leonard Mlodinow', 2008, 4, NULL, NULL),
(65, 'Maus', 'Art Spiegelman', 1986, 4, NULL, NULL),
(66, 'Escravidão', 'Laurentino Gomes', 2019, 4, NULL, NULL),
(67, 'A Coragem de Ser Imperfeito', 'Brené Brown', 2010, 4, NULL, NULL),
(68, 'Freakonomics', 'Steven D. Levitt', 2005, 4, NULL, NULL),
(69, 'Só Garotos', 'Patti Smith', 2010, 4, NULL, NULL),
(70, 'O Ponto da Virada', 'Malcolm Gladwell', 2000, 4, NULL, NULL),
(71, '21 Lições Para o Século 21', 'Yuval Noah Harari', 2018, 4, NULL, NULL),
(72, 'Educated: A Memoir', 'Tara Westover', 2018, 4, NULL, NULL),
(73, 'Sapiens Graphic Novel', 'Yuval Noah Harari', 2020, 4, NULL, NULL),
(74, 'Como as Democracias Morrem', 'Steven Levitsky', 2018, 4, NULL, NULL),
(75, 'A Terra Inabitável', 'David Wallace-Wells', 2019, 4, NULL, NULL),
(76, 'A Terapia', 'Sebastian Fitzek', 2019, 4, NULL, NULL),
(77, '21 Respostas para o Século 21', 'Yuval Noah Harari', 2018, 4, NULL, NULL),
(78, 'Foda-se o Estilo!', 'Glória Kalil', 2020, 4, NULL, NULL),
(79, '21 Segredos para o Século 21', 'Yuval Noah Harari', 2018, 4, NULL, NULL),
(80, 'Breve História do Tempo', 'Stephen Hawking', 1988, 4, NULL, NULL),
(81, 'O Senhor dos Anéis: A Sociedade do Anel', 'J.R.R. Tolkien', 1954, 5, NULL, NULL),
(82, 'Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 1997, 5, NULL, NULL),
(83, 'As Crônicas de Nárnia: O Leão, a Feiticeira e o Guarda-Roupa', 'C.S. Lewis', 1950, 5, NULL, NULL),
(84, 'O Nome do Vento', 'Patrick Rothfuss', 2007, 5, NULL, NULL),
(85, 'Mistborn: O Império Final', 'Brandon Sanderson', 2006, 5, NULL, NULL),
(86, 'O Hobbit', 'J.R.R. Tolkien', 1937, 5, NULL, NULL),
(87, 'Harry Potter e o Prisioneiro de Azkaban', 'J.K. Rowling', 1999, 5, NULL, NULL),
(88, 'O Dragão Renascido', 'Robert Jordan', 1991, 5, NULL, NULL),
(89, 'A Roda do Tempo: O Olho do Mundo', 'Robert Jordan', 1990, 5, NULL, NULL),
(90, 'As Crônicas de Gelo e Fogo: A Guerra dos Tronos', 'George R.R. Martin', 1996, 5, NULL, NULL),
(91, 'The Priory of the Orange Tree', 'Samantha Shannon', 2019, 5, NULL, NULL),
(92, 'Circe', 'Madeline Miller', 2018, 5, NULL, NULL),
(93, 'O Espetacular Homem-Aranha: A Sombra da Noite', 'Jim Butcher', 2020, 5, NULL, NULL),
(94, 'A Guardiã de Histórias', 'Victoria Schwab', 2016, 5, NULL, NULL),
(95, 'Ninth House', 'Leigh Bardugo', 2019, 5, NULL, NULL),
(96, 'O Chamado do Cuco', 'Robert Galbraith (pseudônimo de J.K. Rowling)', 2013, 5, NULL, NULL),
(97, 'A Canção de Aquiles', 'Madeline Miller', 2011, 5, NULL, NULL),
(98, 'A Sangue Frio', 'George R.R. Martin', 2019, 5, NULL, NULL),
(99, 'O Último Desejo', 'Andrzej Sapkowski', 1993, 5, NULL, NULL),
(100, 'A Guerra dos Tronos: Edição Ilustrada', 'George R.R. Martin', 2020, 5, NULL, NULL),
(101, 'O Guardador de Águas', 'Manoel de Barros', 1989, 6, NULL, NULL),
(102, 'Cem Poemas Sem Nome', 'Alda Cravo Al-Saude', 2018, 6, NULL, NULL),
(103, 'Poesia Completa', 'Carlos Drummond de Andrade', 2015, 6, NULL, NULL),
(104, 'O Livro das Ignorãças', 'Manoel de Barros', 1993, 6, NULL, NULL),
(105, 'Antologia Poética', 'Vinicius de Moraes', 1954, 6, NULL, NULL),
(106, 'Toda Poesia', 'Paulo Leminski', 1986, 6, NULL, NULL),
(107, 'O Corvo', 'Edgar Allan Poe', 1845, 6, NULL, NULL),
(108, 'Eu Sei, Mas Não Devia', 'Dorothy Parker', 1925, 6, NULL, NULL),
(109, 'Poesia Reunida', 'Adélia Prado', 2013, 6, NULL, NULL),
(110, 'Antologia Poética', 'Manuel Bandeira', 1956, 6, NULL, NULL),
(111, 'Caminho Poético', 'Ana Silva', 2021, 6, NULL, NULL),
(112, 'Versos da Alma', 'Luiz Mendes', 2020, 6, NULL, NULL),
(113, 'Ressonância Poética', 'Mariana Costa', 2019, 6, NULL, NULL),
(114, 'Cantares do Horizonte', 'Gabriel Oliveira', 2022, 6, NULL, NULL),
(115, 'Sinfonia de Palavras', 'Isabel Santos', 2021, 6, NULL, NULL),
(116, 'Versos Efêmeros', 'Juliana Almeida', 2023, 6, NULL, NULL),
(117, 'Poemas do Amanhecer', 'Pedro Rocha', 2022, 6, NULL, NULL),
(118, 'Alma Poética', 'Carolina Lima', 2021, 6, NULL, NULL),
(119, 'Cantigas Contemporâneas', 'Lucas Oliveira', 2023, 6, NULL, NULL),
(120, 'Palavras em Harmonia', 'Mariana Costa', 2020, 6, NULL, NULL),
(121, 'A Menina da Montanha', 'Tara Westover', 2018, 7, NULL, NULL),
(122, 'O Diário de Anne Frank', 'Anne Frank', 1947, 7, NULL, NULL),
(123, 'Steve Jobs', 'Walter Isaacson', 2011, 7, NULL, NULL),
(124, 'Malala, a Menina Que Queria Ir Para a Escola', 'Malala Yousafzai', 2013, 7, NULL, NULL),
(125, 'Me Chame Pelo Seu Nome', 'André Aciman', 2007, 7, NULL, NULL),
(126, 'Uma Terra Prometida', 'Barack Obama', 2020, 7, NULL, NULL),
(127, 'A Coragem de Ser Imperfeito', 'Brené Brown', 2010, 7, NULL, NULL),
(128, 'O Diário de Frida Kahlo', 'Frida Kahlo', 1954, 7, NULL, NULL),
(129, 'Minha História', 'Michelle Obama', 2018, 7, NULL, NULL),
(130, 'A Vida Não é Útil', 'Ailton Krenak', 2019, 7, NULL, NULL),
(131, 'Sapiens: Despertar da Humanidade', 'Yuval Noah Harari', 2022, 7, NULL, NULL),
(132, 'Becoming: Minha História', 'Michelle Obama', 2018, 7, NULL, NULL),
(133, 'A Arte de Pedir', 'Amanda Palmer', 2014, 7, NULL, NULL),
(134, 'Elon Musk: Tesla, SpaceX e a Busca por um Futuro Fantástico', 'Ashlee Vance', 2015, 7, NULL, NULL),
(135, 'Educated: A Memoir', 'Tara Westover', 2018, 7, NULL, NULL),
(136, 'A Segunda Montanha', 'David Brooks', 2019, 7, NULL, NULL),
(137, 'Elon Musk: Como o Bilionário CEO da SpaceX e Tesla está Moldando Nosso Futuro', 'Ashlee Vance', 2015, 7, NULL, NULL),
(138, 'Michelle Obama: Minha História', 'Michelle Obama', 2018, 7, NULL, NULL),
(139, 'Sobre a Escrita', 'Stephen King', 2000, 7, NULL, NULL),
(140, 'A Arte de Pedir', 'Amanda Palmer', 2014, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Samara', 'samara180305@gmail.com', '$2y$10$9C0NzJPwFRNqQlUpuoMSLObMlVb42EUxziU5yZvcSHU5SqucZt5N.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
