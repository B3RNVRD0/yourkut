-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/06/2023 às 00:10
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
-- Banco de dados: `yourkut`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Futebol'),
(2, 'Submarino OceanGate'),
(3, 'Inteligência Artificial'),
(4, 'Viagens Espaciais'),
(5, 'Música Pop'),
(6, 'Tecnologia Blockchain'),
(7, 'Gastronomia Internacional'),
(8, 'Esportes Radicais'),
(9, 'Filmes de Ação'),
(10, 'Literatura Clássica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `postagem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentario`
--

INSERT INTO `comentario` (`id`, `texto`, `user_id`, `postagem_id`) VALUES
(33, 'Concordo', 11, 22),
(35, 'oppaa concordo', 12, 23),
(36, 'comentario', 12, 24),
(39, 'eu tb', 5, 23),
(42, 'Assunto merda', 5, 45),
(43, 'aasfasfasafs', 5, 42);

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_07_144839_create_livros_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagem`
--

CREATE TABLE `postagem` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `postagem`
--

INSERT INTO `postagem` (`id`, `titulo`, `conteudo`, `user_id`) VALUES
(1, 'Primeira postagem', 'Conteúdo da primeira postagem.', 1),
(2, 'Segunda postagem', 'Conteúdo da segunda postagem.', 2),
(20, 'As tendências tecnológicas que estão moldando o futuro', 'A tecnologia está avançando em um ritmo acelerado, e várias tendências estão moldando o futuro. Desde a inteligência artificial até a Internet das Coisas, estamos testemunhando inovações incríveis. Neste post, vamos explorar algumas das principais tendências tecnológicas e como elas estão impactando nossas vidas.', 9),
(22, 'Tendências de moda para a temporada de primavera', 'Com a chegada da primavera, novas tendências de moda estão surgindo. Estampas florais, tons pastel e peças leves são algumas das principais apostas para esta temporada. Neste post, vamos apresentar as tendências mais quentes e mostrar como incorporá-las ao seu guarda-roupa. Fique por dentro das últimas novidades da moda primavera!', 10),
(23, 'A importância do autoconhecimento para o seu crescimento pessoais', 'O autoconhecimento é uma jornada poderosa que nos permite entender quem somos, nossos pontos fortes, limitações e desejos. Neste post, vamos explorar a importância do autoconhecimento para o crescimento pessoal e como ele pode nos ajudar a tomar decisões mais alinhadas com nossos valores e objetivos.', 11),
(24, 'Nova postagem editada', 'conteudo da posatgen edit', 12),
(42, 'Neymar o melhor do mundo', 'Dentro do campo somente...', 5),
(43, 'Van Dijk o melhor zagueiro hoje', 'Em questao de tiradas de bola....', 5),
(45, 'Por que o ChatGPT pode ser usado para Literatura Clássica?', 'Entendo que seja um assunto delicado', 5),
(46, 'Neymar fora dos cmapos e AI', 'fsefsfwe', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagem_categoria`
--

CREATE TABLE `postagem_categoria` (
  `postagem_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `postagem_categoria`
--

INSERT INTO `postagem_categoria` (`postagem_id`, `categoria_id`) VALUES
(42, 1),
(45, 3),
(45, 10),
(46, 1),
(46, 3),
(45, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'João', 'joao@example.com', ''),
(2, 'Maria', 'maria@example.com', ''),
(5, 'joao', 'joao@gmail.com', '$2y$10$Qx/7h7WtBWnjRtj9XNO9dOBjyDv.mJLZ3IVvPARW7RTxaKYZtGWkq'),
(6, 'Jorge', 'jorge@gmail.com', '$2y$10$XvDVJJPv9.S/4ifRkrXb7u94eFgyXfYH68iMdUezp3/9cUea5OA66'),
(7, 'Messi', 'messi@gmail.com', '$2y$10$P5jP7ikAdSuqdlvdoFQtI.pjqjJlQf6HT4az4YkXHWrW2WkFCAeNm'),
(8, 'Bernardo', 'bernardo@hotmail.com', '$2y$10$lrMM3nEF5q8JFzdYJev76ObxVMo11KwkxOKzeNMM17cOdm2pDOMPi'),
(9, 'Bernardo', 'bernardo1@gmail.com', '$2y$10$iMZGf5AyiD7S2i.dFISrv.2Zck45rDCVLKtLSdJgwX1B0oEEUTIXu'),
(10, 'Andrei', 'andrei@gmail.com', '$2y$10$ytm54TlqFKH4XX0eYJzfNukJnRnTROJPbGGoujNKP98ddi/UoU5k.'),
(11, 'Josep', 'josep@hotmail.com', '$2y$10$woz2yHyXr9nxEKyDASrOEeFMwrIGULnaWTn2vdbWC0fczTLqW8byO'),
(12, 'Andrei', 'andrei1@gmail.com', '$2y$10$vH/yZmBfWGmmw2OuYr49Pu6V/pvcTqimXV7fGGoAb9lPV4vsgT/16'),
(13, 'Be', 'be@hotmail.com', '$2y$10$sDCEK1IqlLzMgjpbfSAdG.RvQdXZyqo2vIZufz/h4x61JdXMTn4yi'),
(14, 'Andrea', 'andrea@gmail.com', '$2y$10$2S9nFHRTrb8QrM..IJrJd.MuQR0HrYNm1e3pu1xKEnN9sp/I.owge');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_ibfk_2` (`postagem_id`),
  ADD KEY `fk_comentario_user` (`user_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_postagens_users` (`user_id`);

--
-- Índices de tabela `postagem_categoria`
--
ALTER TABLE `postagem_categoria`
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `postagem_categoria_ibfk_1` (`postagem_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`postagem_id`) REFERENCES `postagem` (`id`),
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_comentario_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `fk_postagens_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `postagem_categoria`
--
ALTER TABLE `postagem_categoria`
  ADD CONSTRAINT `postagem_categoria_ibfk_1` FOREIGN KEY (`postagem_id`) REFERENCES `postagem` (`id`),
  ADD CONSTRAINT `postagem_categoria_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
