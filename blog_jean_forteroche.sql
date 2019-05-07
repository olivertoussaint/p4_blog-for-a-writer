-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 avr. 2019 à 09:39
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_jean_forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_post_title` varchar(255) NOT NULL,
  `blog_content` text NOT NULL,
  `blog_post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blog_post_title`, `blog_content`, `blog_post_date`) VALUES
(1, 'Test', 'Hello world !!!', '2019-03-22 07:04:06'),
(2, 'Test 1', 'Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus, si nupsissent, per aetatem ter iam nixus poterat suppetere liberorum, ad usque taedium pedibus pavimenta tergentes iactari volucriter gyris, dum exprimunt innumera simulacra, quae finxere fabulae theatrales.\r\n\r\nAlii nullo quaerente vultus severitate adsimulata patrimonia sua in inmensum extollunt, cultorum ut puta feracium multiplicantes annuos fructus, quae a primo ad ultimum solem se abunde iactitant possidere, ignorantes profecto maiores suos, per quos ita magnitudo Romana porrigitur, non divitiis eluxisse sed per bella saevissima, nec opibus nec victu nec indumentorum vilitate gregariis militibus discrepantes opposita cuncta superasse virtute.\r\n\r\nEx turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; aut pugnaciter aleis certant turpi sono fragosis naribus introrsum reducto spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel pluviis, per minutias aurigarum equorumque praecipua vel delicta scrutantes.', '2019-04-01 09:22:00'),
(3, 'Test 2', 'Et quoniam mirari posse quosdam peregrinos existimo haec lecturos forsitan, si contigerit, quamobrem cum oratio ad ea monstranda deflexerit quae Romae gererentur, nihil praeter seditiones narratur et tabernas et vilitates harum similis alias, summatim causas perstringam nusquam a veritate sponte propria digressurus.\r\n\r\nOmitto iuris dictionem in libera civitate contra leges senatusque consulta; caedes relinquo; libidines praetereo, quarum acerbissimum extat indicium et ad insignem memoriam turpitudinis et paene ad iustum odium imperii nostri, quod constat nobilissimas virgines se in puteos abiecisse et morte voluntaria necessariam turpitudinem depulisse. Nec haec idcirco omitto, quod non gravissima sint, sed quia nunc sine teste dico.', '2019-04-01 09:26:00'),
(4, 'Test 3', 'La beauté époustouflante des paysages, les énormes glaciers de la période glaciaire et l’abondance des espèces sauvages font de l’Alaska un endroit unique sur Terre. Cet État offre un large éventail d’activités pour satisfaire toutes les envies et tous les goûts. Quels que soient vos choix, votre voyage en Alaska sera un véritable plaisir !', '2019-04-01 09:35:17'),
(5, 'Test 4', 'Itaque verae amicitiae difficillime reperiuntur in iis qui in honoribus reque publica versantur; ubi enim istum invenias qui honorem amici anteponat suo? Quid? Haec ut omittam, quam graves, quam difficiles plerisque videntur calamitatum societates! Ad quas non est facile inventu qui descendant. Quamquam Ennius recte.', '2019-04-01 09:36:16');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post_blog` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `nbr_signalement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post_blog`, `id_member`, `comment`, `comment_date`, `nbr_signalement`) VALUES
(1, 1, 2, 'Hello world again !!!', '2019-03-22 08:00:00', 0),
(2, 4, 2, 'Magnifique présentation !!!', '2019-04-01 09:45:11', 0),
(3, 2, 2, 'Societates est istum verae Quamquam plerisque facile non est Ennius descendant in recte difficillime quas.', '2019-04-01 09:45:54', 0),
(4, 3, 2, 'Et habentes in lapidum congesta lapidum congesta quis propugnaculis multitudine si sterneretur sterneretur saxa habentes.', '2019-04-01 09:46:00', 0),
(5, 5, 1, 'Tractibus plurimis navigerum medelarum locis usus in tractibus calentes flumen ad aquae speciem pari natura.', '2019-04-01 09:48:28', 0),
(6, 5, 2, 'Replicando ex causas non alimenta per provinciis disponi quod metum difficilisque Theophilum profecturus disponi multitudini.', '2019-04-01 10:08:34', 0);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `email`, `password`, `admin`) VALUES
(1, 'Olivier33', 'okokok@gmail.com', '$2y$10$uMYqJy5vDV9btZmgQT0QUe8eUygp5Xn3OlpKeH2BZWGq1gvW/mh/q', 0),
(2, 'Olivier66', 'okokok@gmail.com', '$2y$10$bDWLmR0F/Gd.CxBL6qWLguvkvINyKITFBHJtBKBwsodUjcDXfl2u6', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
