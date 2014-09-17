-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Tiempo de generación: 21-08-2012 a las 05:15:21
-- Versión del servidor: 5.0.95
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Estructura de tabla para la tabla `config`
--
CREATE TABLE IF NOT EXISTS `config` (  `id` int(11) NOT NULL auto_increment,  `nombre` varchar(120) NOT NULL,  `value` text NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `pastes`
--

CREATE TABLE IF NOT EXISTS `pastes` (  `id` int(11) NOT NULL auto_increment,  `paste` longtext NOT NULL,  `titulo` varchar(255) NOT NULL,  `slug` varchar(100) NOT NULL,  `password` varchar(255) NOT NULL,  `user` varchar(50) NOT NULL default 'Anónimo',  `fecha` int(20) NOT NULL,  `ip` varchar(50) NOT NULL,  UNIQUE KEY `id` (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `users`
--
CREATE TABLE IF NOT EXISTS `users` (  `id` int(11) NOT NULL auto_increment,  `username` varchar(120) NOT NULL,  `email` varchar(255) NOT NULL,  `password` varchar(100) NOT NULL,  `rango` int(11) NOT NULL default '1',  PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;