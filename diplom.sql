-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3310
-- Время создания: Июн 22 2022 г., 06:01
-- Версия сервера: 5.5.62
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `dp_id` int(11) NOT NULL COMMENT 'ID',
  `dp_name` varchar(150) NOT NULL COMMENT 'Название департамента'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`dp_id`, `dp_name`) VALUES
(1, 'Руководство'),
(2, 'Инженеры'),
(3, 'Кладовщики');

-- --------------------------------------------------------

--
-- Структура таблицы `departments_rights`
--

CREATE TABLE `departments_rights` (
  `dr_id` int(11) NOT NULL COMMENT 'ID',
  `dr_dp_id` int(11) NOT NULL COMMENT 'ID отдела',
  `dr_rg_id` int(11) NOT NULL COMMENT 'ID права',
  `dr_dc_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `departments_rights`
--

INSERT INTO `departments_rights` (`dr_id`, `dr_dp_id`, `dr_rg_id`, `dr_dc_id`) VALUES
(3, 0, 6, 'пвапвапв'),
(4, 0, 6, 'пвапва'),
(5, 0, 1, 'павпвап'),
(6, 0, 2, 'павпвап'),
(7, 0, 3, 'павпвап'),
(8, 0, 4, 'павпвап'),
(9, 0, 5, 'павпвап'),
(10, 0, 6, 'павпвап'),
(11, 2, 1, 'фффф'),
(12, 2, 2, 'фффф'),
(13, 2, 3, 'фффф'),
(14, 2, 4, 'фффф'),
(15, 2, 5, 'фффф'),
(16, 2, 6, 'фффф');

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `dc_id` int(11) NOT NULL COMMENT 'ID',
  `dc_name` varchar(200) NOT NULL COMMENT 'Имя роли',
  `dc_format` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`dc_id`, `dc_name`, `dc_format`) VALUES
(1, 'Doc1', 'docx');

-- --------------------------------------------------------

--
-- Структура таблицы `logins`
--

CREATE TABLE `logins` (
  `lg_id` int(11) NOT NULL COMMENT 'ID',
  `lg_us_id` int(11) NOT NULL COMMENT 'ID пользователя',
  `lg_username` varchar(100) NOT NULL COMMENT 'Логин',
  `lg_password` varchar(100) NOT NULL COMMENT 'Пароль',
  `lg_activated` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Статус активации',
  `lg_activationcode` varchar(10) NOT NULL COMMENT 'Код активации'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `logins`
--

INSERT INTO `logins` (`lg_id`, `lg_us_id`, `lg_username`, `lg_password`, `lg_activated`, `lg_activationcode`) VALUES
(1, 1, 'root', 'a029d0df84eb5549c641e04a9ef389e5', 1, ''),
(2, 2, 'user123', 'a029d0df84eb5549c641e04a9ef389e5', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `otdels`
--

CREATE TABLE `otdels` (
  `ot_id` int(11) NOT NULL COMMENT 'ID',
  `ot_name` varchar(150) NOT NULL COMMENT 'Название отдела',
  `ot_dp_id` int(11) NOT NULL COMMENT 'ID департамента'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `otdels`
--

INSERT INTO `otdels` (`ot_id`, `ot_name`, `ot_dp_id`) VALUES
(1, 'Высшее руководство', 1),
(2, 'Маляры', 1),
(3, 'Штукатуры', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `otdels_rights`
--

CREATE TABLE `otdels_rights` (
  `or_id` int(11) NOT NULL COMMENT 'ID',
  `or_ot_id` int(11) NOT NULL COMMENT 'ID отдела',
  `ot_rg_id` int(11) NOT NULL COMMENT 'ID права',
  `ot_dc_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `otdels_rights`
--

INSERT INTO `otdels_rights` (`or_id`, `or_ot_id`, `ot_rg_id`, `ot_dc_id`) VALUES
(1, 2, 1, 'пвапва'),
(2, 2, 2, 'пвапва'),
(3, 2, 3, 'пвапва'),
(4, 2, 4, 'пвапва'),
(5, 2, 5, 'пвапва'),
(6, 2, 6, 'пвапва');

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `ps_id` int(11) NOT NULL COMMENT 'ID',
  `ps_name` varchar(150) NOT NULL COMMENT 'Должность'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`ps_id`, `ps_name`) VALUES
(1, 'Директор'),
(3, 'Водитель'),
(4, 'Наладчик'),
(5, 'Кладовщик'),
(6, 'Слесарь');

-- --------------------------------------------------------

--
-- Структура таблицы `positions_rights`
--

CREATE TABLE `positions_rights` (
  `pr_id` int(11) NOT NULL COMMENT 'ID',
  `pr_ps_id` int(11) NOT NULL COMMENT 'ID должности',
  `pr_rg_id` int(11) NOT NULL COMMENT 'ID права',
  `pr_dc_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `positions_rights`
--

INSERT INTO `positions_rights` (`pr_id`, `pr_ps_id`, `pr_rg_id`, `pr_dc_id`) VALUES
(1, 3, 1, 'ппппп'),
(2, 3, 2, 'ппппп'),
(3, 3, 3, 'ппппп'),
(4, 3, 4, 'ппппп'),
(5, 3, 5, 'ппппп'),
(6, 3, 6, 'ппппп'),
(7, 3, 1, 'тттт'),
(8, 3, 2, 'тттт'),
(9, 3, 3, 'тттт'),
(10, 3, 4, 'тттт'),
(11, 3, 5, 'тттт'),
(12, 3, 6, 'тттт'),
(13, 6, 1, 'Doc1'),
(14, 6, 2, 'Doc1'),
(15, 6, 3, 'Doc1'),
(16, 6, 4, 'Doc1'),
(17, 6, 5, 'Doc1'),
(18, 6, 6, 'Doc1'),
(19, 3, 1, 'Doc1'),
(20, 3, 2, 'Doc1'),
(21, 3, 3, 'Doc1'),
(22, 3, 4, 'Doc1'),
(23, 3, 5, 'Doc1'),
(24, 3, 6, 'Doc1'),
(25, 6, 1, 'Doc1'),
(26, 6, 2, 'Doc1'),
(27, 6, 3, 'Doc1'),
(28, 6, 4, 'Doc1'),
(29, 6, 5, 'Doc1'),
(30, 6, 6, 'Doc1'),
(31, 3, 1, 'Doc1'),
(32, 3, 2, 'Doc1'),
(33, 3, 3, 'Doc1'),
(34, 3, 4, 'Doc1'),
(35, 3, 5, 'Doc1'),
(36, 3, 6, 'Doc1');

-- --------------------------------------------------------

--
-- Структура таблицы `rights`
--

CREATE TABLE `rights` (
  `rg_id` int(11) NOT NULL COMMENT 'ID',
  `rg_name` varchar(150) NOT NULL COMMENT 'Имя права'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rights`
--

INSERT INTO `rights` (`rg_id`, `rg_name`) VALUES
(1, 'Добавить документ'),
(2, 'Добавить папку'),
(3, 'Создавать тикет'),
(4, 'Удалить'),
(5, 'Читать'),
(6, 'Редактировать');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `rl_id` int(11) NOT NULL COMMENT 'ID',
  `rl_name` varchar(30) NOT NULL COMMENT 'Имя роли'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`rl_id`, `rl_name`) VALUES
(1, 'Администратор'),
(2, 'Пользователь'),
(40, 'fs'),
(41, 'sssssss'),
(42, '2222');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `us_id` int(11) NOT NULL COMMENT 'ID',
  `us_surname` varchar(150) NOT NULL COMMENT 'Фамилия',
  `us_name` varchar(150) NOT NULL COMMENT 'Имя',
  `us_middlename` varchar(150) NOT NULL COMMENT 'Отчество',
  `us_mail` varchar(150) NOT NULL COMMENT 'Почта',
  `us_rl_id` int(11) NOT NULL COMMENT 'ID роли',
  `otdel_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`us_id`, `us_surname`, `us_name`, `us_middlename`, `us_mail`, `us_rl_id`, `otdel_id`, `position_id`) VALUES
(1, 'Петров', 'Петр', 'Петрович', 'dav@yandex.ru', 1, 1, 1),
(2, 'Иванов', 'Иван', 'Иванович', 'tre@gdf', 2, 1, 1),
(3, 'Сидоров', 'Сидр', 'Сидорович', 'sid@mail.ru', 0, NULL, NULL),
(4, 'Владимиров', 'Владимир', 'Владимиович', 'mail@mail.ru', 0, NULL, NULL),
(5, 'Михаилов', 'михаил', 'Михаилович', 'newmail@mail.ru', 0, NULL, NULL),
(6, 'Артемов', 'Артем', 'Артемович', 'art@mail.ru', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users_rights`
--

CREATE TABLE `users_rights` (
  `ur_id` int(11) NOT NULL COMMENT 'ID',
  `ur_us_id` int(11) NOT NULL COMMENT 'ID пользователя',
  `ur_rg_id` int(11) NOT NULL COMMENT 'ID права',
  `ur_dc_id` varchar(150) NOT NULL COMMENT 'ID документа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_rights`
--

INSERT INTO `users_rights` (`ur_id`, `ur_us_id`, `ur_rg_id`, `ur_dc_id`) VALUES
(1, 1, 1, 'yes'),
(2, 1, 2, 'yes'),
(3, 1, 3, 'yes'),
(4, 1, 4, 'yes'),
(5, 1, 5, 'yes'),
(6, 1, 6, 'yes');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dp_id`);

--
-- Индексы таблицы `departments_rights`
--
ALTER TABLE `departments_rights`
  ADD PRIMARY KEY (`dr_id`);

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`dc_id`),
  ADD UNIQUE KEY `rl_id` (`dc_id`);

--
-- Индексы таблицы `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`lg_id`);

--
-- Индексы таблицы `otdels`
--
ALTER TABLE `otdels`
  ADD PRIMARY KEY (`ot_id`);

--
-- Индексы таблицы `otdels_rights`
--
ALTER TABLE `otdels_rights`
  ADD PRIMARY KEY (`or_id`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`ps_id`);

--
-- Индексы таблицы `positions_rights`
--
ALTER TABLE `positions_rights`
  ADD PRIMARY KEY (`pr_id`);

--
-- Индексы таблицы `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`rg_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rl_id`),
  ADD UNIQUE KEY `rl_id` (`rl_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`);

--
-- Индексы таблицы `users_rights`
--
ALTER TABLE `users_rights`
  ADD PRIMARY KEY (`ur_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `departments_rights`
--
ALTER TABLE `departments_rights`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `dc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `logins`
--
ALTER TABLE `logins`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `otdels`
--
ALTER TABLE `otdels`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `otdels_rights`
--
ALTER TABLE `otdels_rights`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `positions_rights`
--
ALTER TABLE `positions_rights`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `rights`
--
ALTER TABLE `rights`
  MODIFY `rg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `rl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users_rights`
--
ALTER TABLE `users_rights`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
