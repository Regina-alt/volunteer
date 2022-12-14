-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2022 г., 11:02
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `volunteer`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id_events` int NOT NULL,
  `nazvanie` varchar(200) NOT NULL,
  `task` varchar(500) NOT NULL,
  `adres_events` varchar(500) NOT NULL,
  `data_start` datetime NOT NULL,
  `data_finish` datetime NOT NULL,
  `fk_organiz` int NOT NULL,
  `chas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id_events`, `nazvanie`, `task`, `adres_events`, `data_start`, `data_finish`, `fk_organiz`, `chas`) VALUES
(1, 'Социальный отряд при Калининградском добровольческом центре', 'Волонтеры социального отряда помогают людям, которые в этом наиболее нуждаются - те, у кого нет родственников, кто остался совсем один. Мы помогаем с доставкой продуктов питания и по хозяйству', 'г. Калининград', '2022-10-10 05:00:00', '2022-10-11 06:00:00', 1, 5),
(2, 'Программа длительного сопровождения семей военнослужащих «МЫВМЕСТЕ.ОПЕКА»', 'Приглашаем организации, трудовые коллективы, инициативные группы стать Опекуном для семей военнослужащих, нуждающихся в постоянной поддержке.', 'Россия', '2022-10-10 05:00:00', '2022-12-31 08:00:00', 2, 8),
(3, 'Благоустройство ОКН', 'Региональное отделение Всероссийского общественного движения «Волонтёры культуры» Псковской области, организует работы по благоустройству территории объекта культурного достояния - музея искусств', 'Псковская обл', '2022-10-05 19:17:41', '2022-10-19 19:17:41', 1, 7),
(4, 'Отбор на участие в Special Olympics World Games Berlin 2023', 'Открыт набор в волонтеры на Special Olympics World Games Berlin 2023 в рамках Программы мобильности. Кандидаты, успешно прошедшие отбор по программе будут обеспечены проживанием', 'г. Калининград', '2022-10-21 09:09:11', '2022-10-31 09:09:11', 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `organizator`
--

CREATE TABLE `organizator` (
  `id_organiz` int NOT NULL,
  `nazvanie_org` varchar(200) NOT NULL,
  `adres` varchar(200) NOT NULL,
  `opisanie` varchar(500) NOT NULL,
  `fk_user` int NOT NULL,
  `tel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `organizator`
--

INSERT INTO `organizator` (`id_organiz`, `nazvanie_org`, `adres`, `opisanie`, `fk_user`, `tel`) VALUES
(1, 'Калининградский добровольческий центр', 'г. Калининград, ул. Мореходная, 21', 'Учреждение реализует проект «личная книжка волонтера», реализует различные меры поощрения, одной из которых является организация акции «ДоброПоезд» (экскурсионно-образовательной поездки для волонтеров), центр также осуществляет консультирование по вопросам подготовки документов на почетное звание «Доброволец Калининградской области».', 2, '+79111111111'),
(2, 'КМРК', 'г. Калининград, ул. Мореходная, 9', 'Калининградский морской рыбопромышленный колледж осуществляет обучение по 13 программам подготовки специалистов среднего звена', 17, ' +79111111111'),
(3, 'Автономная некоммерческая организация центр \"Добровольцы серебяного возраста\" Калининградской области', 'г. Калининград, ул. Краснооктябрьская, 15', 'Социально-ориентированная некоммерческая организация для НКО, гос и частных учреждений, работающих в сфере развития социальной активности, адаптации и реабилитации людей страшего возраста и с ОВЗ.', 23, '+79115678980'),
(4, 'Калининградская региональная общественная организация помощи бездомных животным \"Право на жизнь\"', 'г. Калининград, ул. Генерала Раевского, 4', 'Калининградская региональная общественная организация помощи бездомным животным \"Право на Жизнь\" создана объенинением большого количества волонтеров с немалым опытом и стажем работы в сфере БЖ, а также людьми. не равнодушными к братьям нашим меньшим и активно участвующими в решении их проблем', 24, '+79117897891');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','volonter','organizator','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `role`) VALUES
(1, 'migacheva288@gmail.com', '123qwe', 'volonter'),
(2, 'organizator@gmail.com', '456rty', 'organizator'),
(3, 'example@gmail.com', '123456', 'volonter'),
(16, 'margarita@email.ru', '123', 'volonter'),
(17, 'kmrk@gmail.com', 'kmrksuper', 'organizator'),
(18, 'admin@gmail.com', 'masterkey', 'admin'),
(19, 'leraalekseenko@gmail.com', 'lera2003', 'volonter'),
(20, 'volkov@yandex.ru', 'volkov', 'volonter'),
(21, 'ivanov2003@gmail.com', '456radim', 'volonter'),
(22, 'ktbrzv@gmail.com', '12345', 'volonter'),
(23, 'serdorb@dobr.ru', '789qwe', 'organizator'),
(24, 'pets@gmail.com', 'petscute', 'organizator'),
(31, '123@gmail.com', '123', 'volonter');

-- --------------------------------------------------------

--
-- Структура таблицы `volonter`
--

CREATE TABLE `volonter` (
  `id_volonter` int NOT NULL,
  `fio` varchar(200) NOT NULL,
  `adres_zitel` varchar(200) NOT NULL,
  `date_birthday` date NOT NULL,
  `otrabot_chas` int NOT NULL,
  `kol_meropr` int NOT NULL,
  `fk_user` int NOT NULL,
  `img` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `volonter`
--

INSERT INTO `volonter` (`id_volonter`, `fio`, `adres_zitel`, `date_birthday`, `otrabot_chas`, `kol_meropr`, `fk_user`, `img`, `tel`) VALUES
(1, 'Мигачева Регина Михайловна', 'г. Калининград, ул. Чаадаева, 30', '2003-03-18', 5, 1, 1, 'woman.png', '+79118669091'),
(4, 'Мигачева Маргарита Михайловна', 'г. Калининград ул. Чаадаева, 30', '1997-12-13', 17, 2, 16, 'help.png', '+79114681954'),
(6, 'Карбовская Анна Вячеславовна', 'г. Калининград, ул. Первомайский переулок, 20', '2003-10-14', 0, 0, 3, 'photo-2.jpg', '+79097862270'),
(13, 'Алексеенко Валерия Сергеевна', 'г. Калининград, ул. Орудийная, 30Б', '2003-10-07', 0, 0, 19, 'photo-2.jpg', '+79097956514'),
(14, 'Волков Иван Николаевич', 'г. Калининград, ул. Гагарина, 17', '2003-08-09', 0, 0, 20, 'photo-1.jpg', '+79965229961'),
(15, 'Иванов Радим Алексеевич', 'г. Калининград, ул. Чаадаева, 21', '2003-04-20', 0, 0, 21, 'photo-1.jpg', '+79114860608'),
(16, 'Бразовская Екатерина Юрьевна', 'г. Калининград, ул. Рокоссовского, 14', '2003-09-09', 0, 0, 22, 'photo-2.jpg', '+79521189734'),
(25, 'Мигачева Регина Михайловна', 'г. Калининград ул. Чаадаева, 30', '2022-08-12', 8, 1, 31, 'woman.png', '+79114681954');

-- --------------------------------------------------------

--
-- Структура таблицы `zayavka`
--

CREATE TABLE `zayavka` (
  `id_zayavka` int NOT NULL,
  `fk_volonter` int NOT NULL,
  `fk_events` int NOT NULL,
  `status` enum('progress','accept') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `zayavka`
--

INSERT INTO `zayavka` (`id_zayavka`, `fk_volonter`, `fk_events`, `status`) VALUES
(1, 1, 1, 'accept'),
(2, 4, 3, 'accept'),
(12, 4, 2, 'progress'),
(17, 4, 4, 'accept'),
(20, 25, 2, 'accept');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_events`),
  ADD KEY `fk_organiz` (`fk_organiz`);

--
-- Индексы таблицы `organizator`
--
ALTER TABLE `organizator`
  ADD PRIMARY KEY (`id_organiz`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- Индексы таблицы `volonter`
--
ALTER TABLE `volonter`
  ADD PRIMARY KEY (`id_volonter`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Индексы таблицы `zayavka`
--
ALTER TABLE `zayavka`
  ADD PRIMARY KEY (`id_zayavka`),
  ADD KEY `fk_events` (`fk_events`),
  ADD KEY `fk_volonter` (`fk_volonter`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id_events` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `organizator`
--
ALTER TABLE `organizator`
  MODIFY `id_organiz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `volonter`
--
ALTER TABLE `volonter`
  MODIFY `id_volonter` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `zayavka`
--
ALTER TABLE `zayavka`
  MODIFY `id_zayavka` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`fk_organiz`) REFERENCES `organizator` (`id_organiz`);

--
-- Ограничения внешнего ключа таблицы `organizator`
--
ALTER TABLE `organizator`
  ADD CONSTRAINT `organizator_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `volonter`
--
ALTER TABLE `volonter`
  ADD CONSTRAINT `volonter_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `zayavka`
--
ALTER TABLE `zayavka`
  ADD CONSTRAINT `zayavka_ibfk_1` FOREIGN KEY (`fk_events`) REFERENCES `events` (`id_events`),
  ADD CONSTRAINT `zayavka_ibfk_2` FOREIGN KEY (`fk_volonter`) REFERENCES `volonter` (`id_volonter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
