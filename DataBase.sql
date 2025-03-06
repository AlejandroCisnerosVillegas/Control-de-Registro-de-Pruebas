-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 23:08:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `general`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_08_admin`
--

CREATE TABLE `project_08_admin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_08_admin`
--

INSERT INTO `project_08_admin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'Alejandro', 'admin', 123456789, 'contacto@alejandrovillegas.net', '827ccb0eea8a706c4c34a16891f84e7b', '2021-04-19 18:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_08_patients`
--

CREATE TABLE `project_08_patients` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(12) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `GovtIssuedId` varchar(150) DEFAULT NULL,
  `GovtIssuedIdNo` varchar(150) DEFAULT NULL,
  `FullAddress` varchar(255) DEFAULT NULL,
  `State` varchar(200) DEFAULT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_08_patients`
--

INSERT INTO `project_08_patients` (`id`, `FullName`, `MobileNumber`, `DateOfBirth`, `GovtIssuedId`, `GovtIssuedIdNo`, `FullAddress`, `State`, `RegistrationDate`) VALUES
(1, 'Sofia Hernandez Lopez', 5551234567, '1990-03-15', 'Credencial de Elector', 'A1B2C3D4E5', 'Av. Insurgentes Sur 1234', 'Ciudad de México', '2024-11-23 20:29:14'),
(2, 'Juan Carlos Ramirez Mejia', 5569876543, '1985-06-22', 'Licencia de Conducir', 'F6G7H8I9J0', 'Calle 16 de Septiembre 567', 'Ciudad de México', '2024-11-23 20:30:43'),
(3, 'Mariana Cruz Gomez', 5587654321, '1995-12-10', 'Cartilla Militar', 'K1L2M3N4O5', 'Paseo de la Reforma 876', 'Ciudad de México', '2024-11-23 20:32:44'),
(4, 'Luis Antonio Perez Sanchez', 5534567890, '1988-09-01', 'Credencial de Elector', 'P6Q7R8S9T0', 'Calzada de Tlalpan 432', 'Ciudad de México', '2024-11-23 20:34:13'),
(5, 'Andrea Morales Rojas', 5512345678, '1992-02-14', 'Licencia de Conducir', 'U1V2W3X4Y5', 'Avenida Universidad 987', 'Ciudad de México', '2024-11-23 20:36:55'),
(6, 'Jose Ignacio Ortega Ramirez', 5565432189, '1980-08-05', 'Cartilla Militar', 'Z1A2B3C4D5', 'Callejón del Sol 54', 'Ciudad de México', '2024-11-23 20:38:17'),
(7, 'Daniela Estrada Fernandez', 5589012345, '1997-11-30', 'Credencial de Elector', 'E6F7G8H9I0', 'Prolongación División del Norte 143', 'Ciudad de México', '2024-11-23 20:39:18'),
(8, 'Carlos Eduardo Mendoza Lara', 5578123456, '1991-04-10', 'Licencia de Conducir', 'J1K2L3M4N5', 'Av. Toluca 321', 'Ciudad de México', '2024-11-23 20:40:21'),
(9, 'Fernanda Reyes Ortega', 5541237654, '1986-03-08', 'Credencial de Elector', 'O6P7Q8R9S0', 'Av. Juárez 999', 'Ciudad de México', '2024-11-23 20:41:36'),
(10, 'Miguel Angel Vargas Diaz', 5598765432, '1993-07-25', 'Licencia de Conducir', 'T1U2V3W4X5', 'Calle Morelos 786', 'Ciudad de México', '2024-11-23 20:42:57'),
(11, 'Laura Gabriela Pineda Velazquez', 5519876543, '1983-09-12', 'Credencial de Elector', 'Y6Z7A8B9C0', 'Col. Lomas de Chapultepec 334', 'Monterrey, Nuevo León', '2024-11-23 20:44:11'),
(12, 'Roberto Santiago Herrera', 5523456789, '1978-12-01', 'Cartilla Militar', 'D1E2F3G4H5', 'Av. Constitución 512', 'Monterrey, Nuevo León', '2024-11-23 20:45:10'),
(13, 'Ana Paula Solis Jimenez', 5565412378, '1999-01-29', 'Licencia de Conducir', 'I6J7K8L9M0', 'Blvd. Valle Alto 678', 'Monterrey, Nuevo León', '2024-11-23 20:46:37'),
(14, 'Diego Martin Garcia Fuentes', 5538765412, '1994-10-17', 'Credencial de Elector', 'N1O2P3Q4R5', 'Carretera Nacional Km 5', 'Monterrey, Nuevo León', '2024-11-23 20:47:53'),
(15, 'Paola Andrea Villanueva', 5557865432, '1989-05-15', 'Licencia de Conducir', 'S6T7U8V9W0', 'Av. Fundidora 254', 'Monterrey, Nuevo León', '2024-11-23 20:48:50'),
(16, 'Ricardo Alonso Gonzalez Ruiz', 5591234567, '1990-08-20', 'Credencial de Elector', 'X1Y2Z3A4B5', 'Calle Hidalgo 458', 'Guadalajara, Jalisco', '2024-11-23 20:50:10'),
(17, 'Gabriela Sofia Martinez Aguilar', 5528765431, '1987-04-09', 'Licencia de Conducir', 'C6D7E8F9G0', 'Avenida Chapultepec 312', 'Guadalajara, Jalisco', '2024-11-23 20:51:14'),
(18, 'Francisco Javier Lopez Paredes', 5576543218, '1981-11-11', 'Cartilla Militar', 'H1I2J3K4L5', 'Calle Pedro Moreno 112', 'Guadalajara, Jalisco', '2024-11-23 20:52:14'),
(19, 'Maria Fernanda Torres Perez', 5532147658, '1998-02-22', 'Credencial de Elector', 'M6N7O8P9Q0', 'Blvd. de las Américas 654', 'Guadalajara, Jalisco', '2024-11-23 20:53:13'),
(20, 'Alejandro Ramirez Dominguez', 5589412365, '1992-06-18', 'Licencia de Conducir', 'R1S2T3U4V5', 'Av. Vallarta 789', 'Guadalajara, Jalisco', '2024-11-23 20:54:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_08_phlebotomist`
--

CREATE TABLE `project_08_phlebotomist` (
  `id` int(11) NOT NULL,
  `EmpID` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(12) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_08_phlebotomist`
--

INSERT INTO `project_08_phlebotomist` (`id`, `EmpID`, `FullName`, `MobileNumber`, `RegDate`) VALUES
(1, 'F0001', 'Jose Luis Martinez Ramos', 5551234567, '2024-11-23 20:59:40'),
(2, 'F0002', 'Maria Fernanda Lopez Gomez', 5559876543, '2024-11-23 20:59:53'),
(3, 'F0003', 'Alejandro Ramirez Dominguez', 5565432187, '2024-11-23 21:00:05'),
(4, 'F0004', 'Sofia Hernandez Castro', 5543218765, '2024-11-23 21:00:20'),
(5, 'F0005', 'Juan Carlos Pineda Mejia', 5587654321, '2024-11-23 21:00:32'),
(6, 'F0006', 'Laura Gabriela Torres Aguilar', 5532146587, '2024-11-23 21:00:45'),
(7, 'F0007', 'Diego Armando Ruiz Velasquez', 5578129432, '2024-11-23 21:00:58'),
(8, 'F0008', 'Ana Paula Mendoza Herrera', 5598765431, '2024-11-23 21:01:12'),
(9, 'F0009', 'Ricardo Antonio Sanchez Flores', 5523456789, '2024-11-23 21:01:25'),
(10, 'F0010', 'Carolina Isabel Gomez Ortiz', 5549873216, '2024-11-23 21:01:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_08_reporttracking`
--

CREATE TABLE `project_08_reporttracking` (
  `id` int(11) NOT NULL,
  `OrderNumber` bigint(40) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `Status` varchar(120) DEFAULT NULL,
  `PostingTime` timestamp NULL DEFAULT current_timestamp(),
  `RemarkBy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_08_reporttracking`
--

INSERT INTO `project_08_reporttracking` (`id`, `OrderNumber`, `Remark`, `Status`, `PostingTime`, `RemarkBy`) VALUES
(1, 663704073, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:16:36', 2),
(2, 435076894, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:16:52', 2),
(3, 150685056, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:17:06', 2),
(4, 156433517, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:17:28', 2),
(5, 498329466, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:17:46', 2),
(6, 794989425, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:17:56', 2),
(7, 207628698, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:18:18', 2),
(8, 231348437, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:18:31', 2),
(9, 852618398, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:18:49', 2),
(10, 177286561, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:19:23', 2),
(11, 978774667, 'El paciente llegó puntualmente, cumpliendo con el requisito de 8 horas de ayuno. Se verificó su documentación y confirmó que no había consumido medicamentos que pudieran alterar los resultados. Se le brindaron instrucciones claras para dirigirse a la sala', 'En proceso', '2024-11-23 21:19:36', 2),
(12, 663704073, 'La toma de muestra se realizó siguiendo todos los protocolos de higiene y seguridad. El paciente manifestó un ligero nerviosismo que fue atendido con comunicación calmada y asegurándole que el proceso sería rápido. No hubo complicaciones durante la extrac', 'Toma de muestra', '2024-11-23 21:21:28', 2),
(13, 435076894, 'La toma de muestra se realizó siguiendo todos los protocolos de higiene y seguridad. El paciente manifestó un ligero nerviosismo que fue atendido con comunicación calmada y asegurándole que el proceso sería rápido. No hubo complicaciones durante la extrac', 'Toma de muestra', '2024-11-23 21:21:49', 2),
(14, 150685056, 'La toma de muestra se realizó siguiendo todos los protocolos de higiene y seguridad. El paciente manifestó un ligero nerviosismo que fue atendido con comunicación calmada y asegurándole que el proceso sería rápido. No hubo complicaciones durante la extrac', 'Toma de muestra', '2024-11-23 21:21:59', 2),
(15, 156433517, 'La toma de muestra se realizó siguiendo todos los protocolos de higiene y seguridad. El paciente manifestó un ligero nerviosismo que fue atendido con comunicación calmada y asegurándole que el proceso sería rápido. No hubo complicaciones durante la extrac', 'Toma de muestra', '2024-11-23 21:22:19', 2),
(16, 498329466, 'La toma de muestra se realizó siguiendo todos los protocolos de higiene y seguridad. El paciente manifestó un ligero nerviosismo que fue atendido con comunicación calmada y asegurándole que el proceso sería rápido. No hubo complicaciones durante la extrac', 'Toma de muestra', '2024-11-23 21:22:37', 2),
(17, 794989425, 'La toma de muestra se realizó siguiendo todos los protocolos de higiene y seguridad. El paciente manifestó un ligero nerviosismo que fue atendido con comunicación calmada y asegurándole que el proceso sería rápido. No hubo complicaciones durante la extrac', 'Toma de muestra', '2024-11-23 21:22:52', 2),
(18, 663704073, 'La toma de muestra se realizó siguiendo todos los protocolos de higiene y seguridad. El paciente manifestó un ligero nerviosismo que fue atendido con comunicación calmada y asegurándole que el proceso sería rápido. No hubo complicaciones durante la extrac', 'En laboratorio', '2024-11-23 21:23:10', 2),
(19, 435076894, 'La muestra fue recibida y procesada en el equipo de análisis hematológico. Los resultados iniciales muestran niveles normales de hemoglobina, glóbulos rojos y blancos. Sin embargo, se detectó una leve elevación en los niveles de triglicéridos, lo cual pod', 'En laboratorio', '2024-11-23 21:24:57', 2),
(20, 150685056, 'La muestra fue recibida y procesada en el equipo de análisis hematológico. Los resultados iniciales muestran niveles normales de hemoglobina, glóbulos rojos y blancos. Sin embargo, se detectó una leve elevación en los niveles de triglicéridos, lo cual pod', 'En laboratorio', '2024-11-23 21:25:15', 2),
(21, 663704073, 'El informe final fue entregado al paciente. Se explicó que, aunque la mayoría de los resultados están dentro del rango normal, se observó un incremento leve en triglicéridos. Se recomendó al paciente adoptar una dieta baja en grasas saturadas y realizarse', 'Informe final', '2024-11-23 21:26:26', 2),
(22, 435076894, 'El informe final fue entregado al paciente. Se explicó que, aunque la mayoría de los resultados están dentro del rango normal, se observó un incremento leve en triglicéridos. Se recomendó al paciente adoptar una dieta baja en grasas saturadas y realizarse', 'Informe final', '2024-11-23 21:26:44', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_08_testrecord`
--

CREATE TABLE `project_08_testrecord` (
  `id` int(11) NOT NULL,
  `OrderNumber` bigint(14) DEFAULT NULL,
  `PatientMobileNumber` bigint(14) DEFAULT NULL,
  `TestType` varchar(100) DEFAULT NULL,
  `TestTimeSlot` varchar(120) DEFAULT NULL,
  `ReportStatus` varchar(100) DEFAULT NULL,
  `FinalReport` varchar(150) DEFAULT NULL,
  `ReportUploadTime` varchar(200) DEFAULT NULL,
  `RegistrationDate` timestamp NULL DEFAULT current_timestamp(),
  `AssignedtoEmpId` varchar(150) DEFAULT NULL,
  `AssigntoName` varchar(180) DEFAULT NULL,
  `AssignedTime` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_08_testrecord`
--

INSERT INTO `project_08_testrecord` (`id`, `OrderNumber`, `PatientMobileNumber`, `TestType`, `TestTimeSlot`, `ReportStatus`, `FinalReport`, `ReportUploadTime`, `RegistrationDate`, `AssignedtoEmpId`, `AssigntoName`, `AssignedTime`) VALUES
(1, 751159749, 5551234567, 'antigenos', '2024-11-25T10:30', NULL, NULL, NULL, '2024-11-23 20:29:14', NULL, NULL, NULL),
(2, 636423987, 5569876543, 'PCR', '2024-11-25T11:00', NULL, NULL, NULL, '2024-11-23 20:30:43', NULL, NULL, NULL),
(3, 828885380, 5587654321, 'molecular', '2024-11-25T11:30', NULL, NULL, NULL, '2024-11-23 20:32:45', NULL, NULL, NULL),
(4, 877566924, 5534567890, 'antigenos', '2024-11-25T12:00', NULL, NULL, NULL, '2024-11-23 20:34:13', NULL, NULL, NULL),
(5, 875938530, 5512345678, 'PCR', '2024-11-25T12:30', NULL, NULL, NULL, '2024-11-23 20:36:56', NULL, NULL, NULL),
(6, 947188782, 5565432189, 'molecular', '2024-11-25T13:00', 'Asignado', NULL, NULL, '2024-11-23 20:38:17', 'F0006', 'Laura Gabriela Torres Aguilar', '24-11-2024 02:38:58 AM'),
(7, 435451023, 5589012345, 'PCR', '2024-11-25T13:30', 'Asignado', NULL, NULL, '2024-11-23 20:39:18', 'F0004', 'Sofia Hernandez Castro', '24-11-2024 02:38:19 AM'),
(8, 355451516, 5578123456, 'antigenos', '2024-11-25T14:00', 'Asignado', NULL, NULL, '2024-11-23 20:40:21', 'F0003', 'Alejandro Ramirez Dominguez', '24-11-2024 02:38:08 AM'),
(9, 593214753, 5541237654, 'molecular', '2024-11-25T14:30', 'Asignado', NULL, NULL, '2024-11-23 20:41:36', 'F0002', 'Maria Fernanda Lopez Gomez', '24-11-2024 02:37:59 AM'),
(10, 978774667, 5598765432, 'antigenos', '2024-11-25T15:00', 'En proceso', NULL, NULL, '2024-11-23 20:42:58', 'F0001', 'Jose Luis Martinez Ramos', '24-11-2024 02:37:47 AM'),
(11, 177286561, 5519876543, 'PCR', '2024-11-26T10:00', 'En proceso', NULL, NULL, '2024-11-23 20:44:11', 'F0010', 'Carolina Isabel Gomez Ortiz', '24-11-2024 02:37:16 AM'),
(12, 852618398, 5523456789, 'molecular', '2024-11-26T10:30', 'En proceso', NULL, NULL, '2024-11-23 20:45:10', 'F0009', 'Ricardo Antonio Sanchez Flores', '24-11-2024 02:36:59 AM'),
(13, 231348437, 5565412378, 'antigenos', '2024-11-26T11:00', 'En proceso', NULL, NULL, '2024-11-23 20:46:37', 'F0008', 'Ana Paula Mendoza Herrera', '24-11-2024 02:36:39 AM'),
(14, 207628698, 5538765412, 'PCR', '2024-11-26T11:30', 'En proceso', NULL, NULL, '2024-11-23 20:47:53', 'F0007', 'Diego Armando Ruiz Velasquez', '24-11-2024 02:36:20 AM'),
(15, 794989425, 5557865432, 'molecular', '2024-11-26T12:00', 'Toma de muestra', NULL, NULL, '2024-11-23 20:48:50', 'F0006', 'Laura Gabriela Torres Aguilar', '24-11-2024 02:36:00 AM'),
(16, 498329466, 5591234567, 'antigenos', '2024-11-26T12:30', 'Toma de muestra', NULL, NULL, '2024-11-23 20:50:10', 'F0005', 'Juan Carlos Pineda Mejia', '24-11-2024 02:35:22 AM'),
(17, 156433517, 5528765431, 'PCR', '2024-11-26T13:00', 'Toma de muestra', NULL, NULL, '2024-11-23 20:51:14', 'F0004', 'Sofia Hernandez Castro', '24-11-2024 02:35:02 AM'),
(18, 150685056, 5576543218, 'molecular', '2024-11-26T13:30', 'En laboratorio', NULL, NULL, '2024-11-23 20:52:14', 'F0003', 'Alejandro Ramirez Dominguez', '24-11-2024 02:34:49 AM'),
(19, 435076894, 5532147658, 'antigenos', '2024-11-26T14:00', 'Informe final', '8f06f5eb627544e1ba37b63e23d2a34f1732397204.pdf', '24-11-2024 02:56:44 AM', '2024-11-23 20:53:13', 'F0002', 'Maria Fernanda Lopez Gomez', '24-11-2024 02:34:35 AM'),
(20, 663704073, 5589412365, 'PCR', '2024-11-26T14:30', 'Informe final', '8f06f5eb627544e1ba37b63e23d2a34f1732397186.pdf', '24-11-2024 02:56:26 AM', '2024-11-23 20:54:19', 'F0001', 'Jose Luis Martinez Ramos', '24-11-2024 02:33:25 AM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `project_08_admin`
--
ALTER TABLE `project_08_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `project_08_patients`
--
ALTER TABLE `project_08_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_08_phlebotomist`
--
ALTER TABLE `project_08_phlebotomist`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_08_reporttracking`
--
ALTER TABLE `project_08_reporttracking`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_08_testrecord`
--
ALTER TABLE `project_08_testrecord`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `project_08_admin`
--
ALTER TABLE `project_08_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `project_08_patients`
--
ALTER TABLE `project_08_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `project_08_phlebotomist`
--
ALTER TABLE `project_08_phlebotomist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `project_08_reporttracking`
--
ALTER TABLE `project_08_reporttracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `project_08_testrecord`
--
ALTER TABLE `project_08_testrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
