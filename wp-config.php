<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'gwpr');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'leV:c9+5I{gpO=NO>FI,ovpI7f3`,MUh%p}CK1B?NyKCR33%+R^wUCV+6-f%,7(n');
define('SECURE_AUTH_KEY',  'XbJ{~b+]?Sj-)Tkdx&czHR$j;;v=-|/HAxucpGFT{uhSB`{&.q.cjm] }O{(GhO!');
define('LOGGED_IN_KEY',    'uU7vfEj#7xTyYu-2H{?^;9l.y/f O1?TyVz4}L@-96j2q}ocBIW#$bCP4Nd-p/y#');
define('NONCE_KEY',        '3bemsE-E/#=6$[7k>l{GdXi|Lo{xp+WfkDUtY9~.<rV>.BJ]Vwp[&@FqTz|3*5E8');
define('AUTH_SALT',        'UvjjAx- &F<)HGjm=UGOaFF%N57Ul:_0V2lb!Uo-uCQ6R{+IV@tjS|.Lu/YY03zi');
define('SECURE_AUTH_SALT', 'K[B1|d1iJ-]H_=VzHf7jkI~{h&>?W6.+DS5hcPz.@9N9JKBd~,tYWf+8Zn&cOc>1');
define('LOGGED_IN_SALT',   's/(U7Y9]b$10|Y$QmT)cB@bf9?hbP,{F+3Ty{oOqP,)Fn3+^gKF[;wk -kS~>3vQ');
define('NONCE_SALT',       'G7d4((vGD{y3CqTS,,lbxiLubA0F-z [[p-n%?4-9w(M3ugC}t7:<YjB]++Y|;UW');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
