-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 09 2019 г., 17:13
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: laba
--

-- --------------------------------------------------------

--
-- Структура таблицы roles
--

CREATE TABLE roles (
  id int(11) NOT NULL,
  title varchar(255) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Дамп данных таблицы roles
--

INSERT INTO roles (id, title) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы users
--

CREATE TABLE users (
  id int(11) NOT NULL,
  first_name varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  last_name varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  password varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  email varchar(1023) COLLATE utf8_unicode_520_ci NOT NULL,
  role_id int(255) NOT NULL,
  image_path blob NOT NULL,
  image_name blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Дамп данных таблицы users
--

INSERT INTO users (id, first_name, last_name, password, email, role_id, image_path, image_name) VALUES
(3, 'admin', 'admin', 'qwe123', 'admin@gmail.com', 1, 0x696d672f, 0x706963312e6a7067),
(4, 'Chudna', 'VAleriya', 'kokoko', 'chudan@gmail.com', 2, 0x696d672f, 0x706963322e6a7067);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы roles
--
ALTER TABLE roles
  ADD PRIMARY KEY (id);

--
-- Индексы таблицы users
--
ALTER TABLE users
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы roles
--
ALTER TABLE roles
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы users
--
ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;