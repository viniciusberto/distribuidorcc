<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
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

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'distribuidorcc' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'distribuidorcc' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'D.distribuidor@9' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'distribuidorcc.mysql.uhserver.com' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4.h~^kMNq,E~hK$:NAxCvEV}98Sm*^ti!w*>)9w5q2.n5%6oc4Q4Fvrnp|O&c|RJ' );
define( 'SECURE_AUTH_KEY',  'NKc$+i-{Ttr9zD(>mb3J3mzbO.QV] r{g1;Kdp2I&LWb(#&ORh%QON-}!w_4?=o`' );
define( 'LOGGED_IN_KEY',    'PA4/Z H1RKw7&3RYSWwZSd.,rp7tE{@Q_7!}nt!PvAEgOmyVjks9E `HHd?gj>h_' );
define( 'NONCE_KEY',        '$)T3CG;3M2[8D`%&Lf8vPog0w}ga~|ffj{C&=?{BjXY~:DX5 SE=CG&KxUPmal&p' );
define( 'AUTH_SALT',        '~913{XPxG,4d{g$Xd*P$@Z2O!qGLD]NeI|8/]0{MRWQ#U [F:G3[2JFJp9W^.`7%' );
define( 'SECURE_AUTH_SALT', '4[)UEQU<1du05XD5q%/L#2pzdp^-5H_ zAv>6r;K)-6]bdczim#YPb&i 1],X@l6' );
define( 'LOGGED_IN_SALT',   '{c4<kRYAQC-md)W`CAQZyP( rLw{5Q|B9-DSbRwgbIu0,0~n,#LS9s^>L<pM]<r0' );
define( 'NONCE_SALT',       'SO&KjL3}-:Pl2/$8L+nQ8zJTml)Z6|y6}:c7>zeJ6;>tllvsL.UkFJA?:YWnEA[2' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
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
