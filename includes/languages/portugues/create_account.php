<?php

define('NAVBAR_TITLE', 'Criar uma Conta');
define('TOP_BAR_TITLE', 'Criar uma Conta');
define('HEADING_TITLE', 'Informação sobre a Minha Conta');
define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTA:</b></font></small> Se já tem uma conta conosco por favor clique aqui para <a href="' . tep_href_link(FILENAME_LOGIN, 'origin=checkout_address&connection=' . $HTTP_GET_VARS['connection'], 'NONSSL') . '"><u>entrar</u></a>.');
define('FORM_REQUIRED_INFORMATION','Entre com os seus dados para cadastro');


define('EMAIL_SUBJECT', 'Bem-vindo ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Caro Sr. vnom,' . "\n\n");
define('EMAIL_GREET_MS', 'Prezada Sra. vnom,' . "\n\n");
define('EMAIL_GREET_NONE', 'Caro vnom' . "\n\n");

define('EMAIL_WELCOME', '
Parabéns!A sua conta pessoal foi criada com sucesso.

Agora você pode comprar os nossos perfumes, clicando em "adicionar ao carrinho"

As informações para acessar sua conta são os seguintes:

Usuário: vloggin
Senha: vpass'. "\n\n");

define('EMAIL_TEXT', '');
define('EMAIL_CONTACT', 'Se precisar de ajuda, por favor entre em contato conosco por e-mail  <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'" target="_blank">'.STORE_OWNER_EMAIL_ADDRESS.'</a> ou por telefone.

Boa visita,

SAMY

Atenção ao Cliente
  <a href="http://www.'.strtolower(STORE_NAME).'/" target="_blank">www.'.strtolower(STORE_NAME).'</a>');
  
define('EMAIL_WARNING', '<b><u>REMARQUE IMPORTANTE :</u></b>Você está recebendo este email porque segue a inclusão de um novo cliente na nossa loja online. Se você não registrado na '.STORE_NAME.' obrigado a informar o gerente da loja no endereço: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");

define('ENTRY_EMAIL_ADDRESS_SPONSORSHIP_ERROR', 'O endereço do patrocínio é diferente da que você entrou.');

define('SPONSORSHIP_GODFATHER', 'Seu patrocinador é a seguinte:');
define('SPONSORSHIP_GODFATHER_UNKNOWN', 'A chave eo e-mail informado não corresponde a nenhum patrocínio.');

define('EMAIL_SUBJECT_NETA', 'Réductions '.STORE_NAME);
define('EMAIL_TEXT_NETA', 'Suite à votre inscription sur '.STORE_NAME.', profitez des coupons de réduction suivants (non cumulable) :

%s

Bonne visite,

SAMY
Equipe Service Client
<a href="http://www.'.strtolower(STORE_NAME).'/" target="_blank">www.'.strtolower(STORE_NAME).'</a>');

?>
