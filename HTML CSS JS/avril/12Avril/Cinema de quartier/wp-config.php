<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cinema');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CW3XeEOHVD}>7vbl8n$Uk-@HSu5]e}we)}kZwPd:9dR+6[>;VdE/PXbn7}%5-uWY');
define('SECURE_AUTH_KEY',  '%Sr)fr#>EeAg=ajP4Iecu45Hjw>2lfW6*7b)pVPmF>./kMy [t4v~gYG!/r+v%;I');
define('LOGGED_IN_KEY',    '_irqiTe(BYD/O510MG1@>n<Ox7SPa<jlfR ;l1d&OwlRfXJy6eX#Zm4<WFKYqZ1l');
define('NONCE_KEY',        'x^aP]^lZ[-&Vmp/#J<U:[y:ARSlVzN]-u*U6qx(M.u7L9)%7arS-ET;:qVU0RQ!I');
define('AUTH_SALT',        'S}~A?H_,|rmDprw$T$s#W@5uUe{T.S;(^>ug{jg1CsFa}tTZA) UL<Lobc)PV8wk');
define('SECURE_AUTH_SALT', '$D? >oV~}%Ut,ym;#o`?s+!&6N-|q~Z)TQ=73X,gl`PPw4Hf_wu/TH~%c5)C6Kha');
define('LOGGED_IN_SALT',   '_%MWgo<27v]H=7/AsBz.%]]9yX5ceqGgLF{E^Q3%%&Tbe2%*ZZH.1v]4HI_$<=.^');
define('NONCE_SALT',       '^&R,m7i&WMPYL-X@E |1O730GF3hy,tEcxFQ{!O%[so[w{py<8i[zk#nD`G#B9fB');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');