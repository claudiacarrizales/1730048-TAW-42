
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- Base de datos: `inventarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `description_category` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `description_category`, `date_added`) VALUES
(1, 'Lácteos', 'Lácteos ', '2020-06-07 23:38:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `date`, `note`, `reference`, `quantity`) VALUES
(3, 9, 2, '2020-06-08 05:49:38', 'adminagrego/compro', 'Falta de producto', 20),
(4, 10, 2, '2020-06-08 05:50:31', 'adminagrego/compro', 'Falta de producto', 20),
(5, 11, 2, '2020-06-08 05:52:06', 'adminagrego/compro', 'Falta de producto', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `code_product` varchar(20) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price_product` float NOT NULL,
  `stock` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `code_product`, `name_product`, `date_added`, `price_product`, `stock`, `id_category`) VALUES
(9, '123465', 'Leche', '2020-06-08 05:49:38', 15, 20, 1),
(10, '123465', 'Leche', '2020-06-08 05:50:31', 15, 20, 1),
(11, '123465', 'Leche', '2020-06-08 05:52:06', 15, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password`, `user_email`, `date_added`) VALUES
(2, 'claudia', 'claudia', 'admin', '$2y$10$PGBJUVT8xwGipSZdhEv81uplSj8AhA9.137oaD.mcAdmbxUPKQ41i', '1730048@upv.edu.mx', '2020-07-07 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
