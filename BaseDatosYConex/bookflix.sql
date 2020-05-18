-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2020 a las 02:27:10
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
  `nombreAutor` text NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `borradoParanoagregar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE `capitulo` (
  `idCapitulo` int(11) NOT NULL,
  `numeroCapitulo` int(11) NOT NULL,
  `nombreCapitulo` text NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `pdf` text DEFAULT NULL,
  `pdfPrevisualizacion` text DEFAULT NULL,
  `idLibro` int(11) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `textoComentario` text NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idLibro` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `idEditorial` int(11) NOT NULL,
  `nombreEditorial` text NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `borradoParanoagregar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idPerfil` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `nombreGenero` text NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `borradoParanoagregar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `nombreGenero`, `borradoLogico`, `borradoParanoagregar`) VALUES
(1, 'Terror', 0, 0),
(2, 'Drama', 0, 0),
(3, 'Filosofia', 0, 0),
(4, 'Infantiles', 0, 0),
(5, 'Romance', 0, 0),
(6, 'Ciencia Ficcion', 0, 0),
(7, 'Psicologia', 0, 0),
(8, 'Cocina', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idHistorial` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idLibro` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leyendo`
--

CREATE TABLE `leyendo` (
  `idLeyendo` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `idLibro` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `ISBN` int(11) NOT NULL,
  `nombreLibro` text NOT NULL,
  `descripcionLibro` text NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `portadaLibro` text NOT NULL,
  `fechaLanzamiento` date NOT NULL DEFAULT current_timestamp(),
  `idGenero` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `idEditorial` int(11) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedadlibro`
--

CREATE TABLE `novedadlibro` (
  `idNovedadLibro` int(11) NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `fechaNovedad` date NOT NULL,
  `idLibro` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nombrePerfil` text NOT NULL,
  `borradoLogico` int(11) NOT NULL DEFAULT 0,
  `imagenPerfil` text NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio`
--

CREATE TABLE `sitio` (
  `idSitio` int(11) NOT NULL,
  `sitioActivo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sitio`
--

INSERT INTO `sitio` (`idSitio`, `sitioActivo`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripción`
--

CREATE TABLE `suscripción` (
  `idSuscripcion` int(11) NOT NULL,
  `fechaSuscripcion` date NOT NULL DEFAULT current_timestamp(),
  `montoSuscripcion` int(11) NOT NULL,
  `borradoLogica` int(11) NOT NULL DEFAULT 0,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombreUsuario` text NOT NULL,
  `emailUsuario` text NOT NULL,
  `password` text NOT NULL,
  `permisoUsuario` int(11) NOT NULL DEFAULT 1,
  `borradoLogico` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombreUsuario`, `emailUsuario`, `password`, `permisoUsuario`, `borradoLogico`) VALUES
(1, 'admin', 'admin.admin@gmail.com', 'contraseña', 3, 0),
(2, 'jimena', 'jimena.pardo@hotmail.com', 'lalalala232332', 3, 0),
(4, 'ernesto', 'ernestol@hotmail.com', 'jajajajja232323', 3, 0),
(5, 'agustin', 'agu_coyote@hotmail.com', 'jajaja123', 3, 0);

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
  ADD PRIMARY KEY (`ISBN`),
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
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `sitio`
--
ALTER TABLE `sitio`
  ADD PRIMARY KEY (`idSitio`);

--
-- Indices de la tabla `suscripción`
--
ALTER TABLE `suscripción`
  ADD PRIMARY KEY (`idSuscripcion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idFavoritos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `ISBN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123124;

--
-- AUTO_INCREMENT de la tabla `novedadcapitulo`
--
ALTER TABLE `novedadcapitulo`
  MODIFY `idNovedadCapitulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedadlibro`
--
ALTER TABLE `novedadlibro`
  MODIFY `idNovedadLibro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sitio`
--
ALTER TABLE `sitio`
  MODIFY `idSitio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `suscripción`
--
ALTER TABLE `suscripción`
  MODIFY `idSuscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`ISBN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD CONSTRAINT `capitulo_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`ISBN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`ISBN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`ISBN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`ISBN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `leyendo`
--
ALTER TABLE `leyendo`
  ADD CONSTRAINT `leyendo_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`ISBN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `leyendo_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`idEditorial`) REFERENCES `editorial` (`idEditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `novedadcapitulo`
--
ALTER TABLE `novedadcapitulo`
  ADD CONSTRAINT `novedadCapitulo_ibfk_1` FOREIGN KEY (`idCapitulo`) REFERENCES `capitulo` (`idCapitulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `novedadlibro`
--
ALTER TABLE `novedadlibro`
  ADD CONSTRAINT `novedadLibro_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`ISBN`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `suscripción`
--
ALTER TABLE `suscripción`
  ADD CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
