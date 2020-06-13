-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2020 a las 17:00:21
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bookflix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `nombreAutor` text COLLATE utf8_spanish_ci NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `borradoParanoagregar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `nombreAutor`, `borradoLogico`, `borradoParanoagregar`) VALUES
(1, 'Jane Austen', 0, 0),
(2, 'Lore Pittacus', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCalificion` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idPerfil` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE `capitulo` (
  `idCapitulo` int(11) NOT NULL,
  `numeroCapitulo` int(11) NOT NULL,
  `nombreCapitulo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `pdf` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `pdfPrevisualizacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `idLibro` int(11) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `textoComentario` text COLLATE utf8_spanish_ci NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idLibro` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `idEditorial` int(11) NOT NULL,
  `nombreEditorial` text COLLATE utf8_spanish_ci NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `borradoParanoagregar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`idEditorial`, `nombreEditorial`, `borradoLogico`, `borradoParanoagregar`) VALUES
(1, 'Thomas Egerton', 0, 0),
(2, 'Editorial Alma', 0, 0),
(3, 'Alianza', 0, 0),
(4, 'Molino', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idPerfil` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `nombreGenero` text COLLATE utf8_spanish_ci NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `borradoParanoagregar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `nombreGenero`, `borradoLogico`, `borradoParanoagregar`) VALUES
(1, 'Accion', 0, 0),
(2, 'Clasicos', 0, 0),
(3, 'Romance', 0, 0),
(4, 'Infantil', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idHistorial` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idLibro` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leyendo`
--

CREATE TABLE `leyendo` (
  `idLeyendo` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idLibro` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL,
  `ISBN` int(20) NOT NULL,
  `nombreLibro` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcionLibro` text COLLATE utf8_spanish_ci NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `portadaLibro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaLanzamiento` date NOT NULL DEFAULT current_timestamp(),
  `idGenero` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `idEditorial` int(11) NOT NULL,
  `fechaDesde` date DEFAULT NULL,
  `fechaHasta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idLibro`, `ISBN`, `nombreLibro`, `descripcionLibro`, `borradoLogico`, `portadaLibro`, `fechaLanzamiento`, `idGenero`, `idAutor`, `idEditorial`, `fechaDesde`, `fechaHasta`) VALUES
(2, 2147483647, 'Sentido y Sensibilidad', 'Jane Austen es una de las autoras más representativas del romanticismo literario inglés. Su fina ironía y su querencia por el detalle hacen especialmente disfrutables sus obras. En esta ocasión, las desventuras de las hermanas Elinor, Marianne y Margaret Dashwood se convierten, gracias a la mirada perspicaz y cínica de Austen, en un retrato perfecto, tan sentido como sensible, de la vida en la campiña inglesa y del rol de la mujer en la sociedad británica de comienzos del siglo XIX.', 0, 'bookImages/978841743055920.jpg', '2020-06-13', 2, 1, 2, '2020-06-14', '0000-00-00'),
(3, 978849181, 'Persuasión', 'Precursora destacada de la novela moderna, Jane Austen (1775-1817) se distingue por el penetrante e irónico retrato que, en su condición de mujer y escritora, realiza de la sociedad en que le tocó vivir, sus convenciones, sus mecanismos y sus consecuencias, con una sutilísima inteligencia que a menudo suele hacerlo pasar inadvertido. La protagonista de \"Persuasión\" es Anne Elliot, hija mediana de un vanidoso Sir con un título de nobleza menor. Fueron precisamente sus ínfulas de grandeza las que llevaron años atrás a la joven a rechazar, pese a sus sentimientos, el matrimonio con un por entonces joven militar de incierto futuro. Pero las guerras hacen mudar las fortunas, y las hazañas de aquel oficial lo han convertido, cuando vuelven a encontrarse, en un acaudalado capitán de la Armada de Su Majestad. Dolido aún por aquel antiguo desaire, el capitán Wentworth será ahora, cuando dé a conocer su voluntad de casarse, quien haga gala de su indiferencia hacia Anne.', 0, 'bookImages/978849181906621.jpg', '2020-06-13', 3, 1, 3, '2020-06-13', '0000-00-00'),
(5, 97884272, 'RETORNO A CERO. GENERACION UNO 3', 'EL DESTINO DE LA HUMANIDAD ESTÁ EN JUEGO.Después de la batalla en Suiza, las lealtades de los Seis Fugitivos están divididas y acaban repartidos en dos facciones.Taylor, Kopano y Nigel regresan con Nueve a la Academia, donde las cosas han cambiado. El resentimiento hacia la Guardia Humana sigue creciendo y las Naciones Unidas decretan el implante de inhibidores de poderes en todos los humanos con legados. A nuestros héroes les queda una única salida: rebelarse.Por su parte, Isabela, Caleb y Ran deciden dar caza a los miembros de la Fundación que siguen en libertad. Para ello, unen fuerzas con sus antiguos enemigos, Einar y Cinco. Pero, cuando una nueva amenaza aparece en su camino, el grupo se ve penosamente superado.ENFRENTADA A SU FIN, LA GUARDIA TIENE SOLO UNA OPCIÓN PARA SOBREVIVIR: MANTENERSE UNIDA.', 0, 'bookImages/978842721888822.jpg', '2020-06-13', 4, 2, 4, '2020-06-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedadcapitulo`
--

CREATE TABLE `novedadcapitulo` (
  `borradoLogico` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `idCapitulo` int(11) NOT NULL,
  `idNovedadCapitulo` int(11) NOT NULL,
  `fechaNovedad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedadgeneral`
--

CREATE TABLE `novedadgeneral` (
  `idGeneral` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `fechaNovedad` date NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedadlibro`
--

CREATE TABLE `novedadlibro` (
  `idNovedadLibro` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `fechaNovedad` date NOT NULL,
  `idLibro` int(20) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `novedadlibro`
--

INSERT INTO `novedadlibro` (`idNovedadLibro`, `borradoLogico`, `fechaNovedad`, `idLibro`, `descripcion`) VALUES
(1, 0, '2020-06-13', 2, 'La Editorial Alianza y la Editorial Alma invitan  a toda la comunidad universitaria y sociedad en general a la presentación del libro “Propuestas Innovadoras para la enseñanza de las ciencias en la educación primaria”. El material de este libro fue compilado por las docentes de la Facultad de Ingeniería Cristina Iturralde y Adriana Bertelle y elaborado junto a profesionales que se desempeñan en escuelas olavarrienses y en el Grupo Operativo en Didáctica de las Ciencias Experimentales (GODCE). El libro contiene actividades para implementar en el aula y reflexiones teóricas que apuntan a contribuir a la educación. Cada propuesta presenta contenido didáctico y científico.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nombrePerfil` text COLLATE utf8_spanish_ci NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `imagenPerfil` text COLLATE utf8_spanish_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAutor` int(11) DEFAULT NULL,
  `idGenero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `idSuscripcion` int(11) NOT NULL,
  `fechaSuscripcion` date NOT NULL DEFAULT current_timestamp(),
  `montoSuscripcion` int(11) NOT NULL,
  `borradoLogica` int(11) NOT NULL DEFAULT 0,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `idTarjeta` int(20) NOT NULL,
  `numero` int(50) NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombreUsuario` text COLLATE utf8_spanish_ci NOT NULL,
  `emailUsuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `permisoUsuario` int(11) NOT NULL DEFAULT 1,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numeroTarjeta` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombreUsuario`, `emailUsuario`, `password`, `permisoUsuario`, `borradoLogico`, `apellido`, `numeroTarjeta`) VALUES
(1, 'Administrador', 'admin@gmail.com', '1234', 3, 0, 'Admi', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCalificion`),
  ADD KEY `idPerfil` (`idPerfil`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`idCapitulo`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idLibro` (`idLibro`),
  ADD KEY `idPerfil` (`idPerfil`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavoritos`),
  ADD KEY `idPerfil` (`idPerfil`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idHistorial`),
  ADD KEY `idLibro` (`idLibro`),
  ADD KEY `idPerfil` (`idPerfil`);

--
-- Indices de la tabla `leyendo`
--
ALTER TABLE `leyendo`
  ADD PRIMARY KEY (`idLeyendo`),
  ADD KEY `idLibro` (`idLibro`),
  ADD KEY `idPerfil` (`idPerfil`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `idGenero` (`idGenero`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idEditorial` (`idEditorial`);

--
-- Indices de la tabla `novedadcapitulo`
--
ALTER TABLE `novedadcapitulo`
  ADD PRIMARY KEY (`idNovedadCapitulo`),
  ADD KEY `idCapitulo` (`idCapitulo`);

--
-- Indices de la tabla `novedadgeneral`
--
ALTER TABLE `novedadgeneral`
  ADD PRIMARY KEY (`idGeneral`);

--
-- Indices de la tabla `novedadlibro`
--
ALTER TABLE `novedadlibro`
  ADD PRIMARY KEY (`idNovedadLibro`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`idSuscripcion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`idTarjeta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numeroTarjeta` (`numeroTarjeta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCalificion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  MODIFY `idCapitulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idFavoritos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idHistorial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `leyendo`
--
ALTER TABLE `leyendo`
  MODIFY `idLeyendo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `novedadlibro`
--
ALTER TABLE `novedadlibro`
  MODIFY `idNovedadLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `idSuscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `idTarjeta` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD CONSTRAINT `capitulo_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `favoritos_ibfk_3` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `leyendo`
--
ALTER TABLE `leyendo`
  ADD CONSTRAINT `leyendo_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `leyendo_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`idEditorial`) REFERENCES `editorial` (`idEditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `novedadcapitulo`
--
ALTER TABLE `novedadcapitulo`
  ADD CONSTRAINT `novedadcapitulo_ibfk_1` FOREIGN KEY (`idCapitulo`) REFERENCES `capitulo` (`idCapitulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `novedadlibro`
--
ALTER TABLE `novedadlibro`
  ADD CONSTRAINT `novedadlibro_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `perfil_ibfk_3` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `perfil_ibfk_4` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`numeroTarjeta`) REFERENCES `tarjeta` (`idTarjeta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
