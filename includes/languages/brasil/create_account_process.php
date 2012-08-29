<?php

define('NAVBAR_TITLE_1', 'Criar uma Conta');
define('NAVBAR_TITLE_2', 'Processo');
define('TOP_BAR_TITLE', 'Criar una Conta');
define('HEADING_TITLE', 'Informação sobre a Minha Conta');
define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTA:</b></font></small> Se já tem uma conta conosco clique aqui para <a href="' . tep_href_link(FILENAME_LOGIN, 'origin=checkout_address', 'NONSSL') . '"><u>entrar</u></a>.');

define('EMAIL_SUBJECT', 'Bem Vindo a ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Prezado %s,' . "\n\n");
define('EMAIL_GREET_MS', 'Prezado %s,' . "\n\n");
define('EMAIL_GREET_NONE', 'Prezado %s,' . "\n\n");
define('EMAIL_WELCOME', 'Damos as boas vindas a <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', '<p align=\"justify\">Agora você pode desfrutar de todos os <b>serviços</b> que lhe oferecemos. Alguns destes serviços são:' . "\n\n" . '<li><p align=\"justify\"><b>Carrinho de Compras Permanente</b> - Qualquer produto colocado em seu carrinho permanecerá nele até que o elimine ou realize a compra.' . "\n" . '<li><p align=\"justify\"><b>Livro de Endereços</b> - Podemos enviar os produtos comprados por você para um outro endereço cadastrado previamente por você. É uma ótima oportunidade para você presentear alguêm especial em uma data especial. Você faz as compras em nossa loja e nós entregamos o produto embalado para presente em qualquer parte do Brasil.' . "\n" . '<li><p align=\"justify\"><b>Histórico dos Pedidos</b> - Você pode acompanhar o andamento dos pedidos realizados conosco, bastando para isso acessar a sua conta em nossa loja.' . "\n" . '<li><p align=\"justify\"><b>Comentários</b> - Você pode avaliar e fazer comentários sobre os nossos produtos. Todos os comentários serão exibidos em nossa loja.' . "\n\n");
define('EMAIL_CONTACT', '<p align=\"justify\">Qualquer dúvida sobre os nossos serviços por favor escreva para: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b><p align=\"justify\">Nota:</b> Este endereço de e-mail foi utilizado por um de nossos novos associados para se cadastrar em nosso site. Caso não seja você que tenha se cadastrado, por favor comunique-nos pelo e-mail ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
?>
