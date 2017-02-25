<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'ebenezer_dev');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'I`|)dZ@)|a`nJ0I|(Qz04.gs99a2r].j8d,`^WkI%[g@CRu+d9E/Kj}&U;<+GrOk');
define('SECURE_AUTH_KEY',  '@f?rsxpbTOE2%A3?-t0GK$b~I*bq^E!4yq/?4:`|R7Fdx!,qq.qQgAfJVDZ^N]r`');
define('LOGGED_IN_KEY',    '})[J_il]hUU[<7p]_5704F(|_DkYezUOM8<?[,gV$3h%8]x4_iP,qgcUS4Kx*y~X');
define('NONCE_KEY',        'S7:E7ZSG7uo_;/qX$*$`[SX5/05r<lkmVZ&9q}mbzze6WY$cgl$2q3T;51(wO/mu');
define('AUTH_SALT',        'G?TFf~W} Y K!vfU;})TI%@zp@`~fjLed|LPV.G?I@ :.vYdv{W[dpD5(|T0q8[b');
define('SECURE_AUTH_SALT', '>6*ye^0e|]EYU&f3Qa8 c [6j8fTTOcqZN[V1J6ONX}k[yp>1|8~dkb!UO+=pWP[');
define('LOGGED_IN_SALT',   '3Pefgx=7pfVkrGn!1_okL`G^Oj[j,}ozP#2zes4hDI^/<~JiCdL*=AL@_7a>91TJ');
define('NONCE_SALT',       'L.GECnvkc9! ~Tp/v4?t0E.QB1Bf^$,LW03#S>&(r,6Mfrf!)LN>jGWrq09hS=@h');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'ebe_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
