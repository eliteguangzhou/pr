<?php
define('SPONSORSHIP_INTRODUCTION_TEXT', 'Duas boas razões para se referir a seus amigos!

1. É fácil!
Para indicar seus amigos, basta digitar seu e-mail<sup>(1)</sup> nos campos abaixo. Um e-mail será enviado informando-os sobre o seu convite.

2. Trata-se do euro!
'.STORE_NAME.'oferece uma compensação excepcional diminuiu em três níveis que você pode ganhar o Euro<sup>(2)</sup> :

- %s nos primeiros %s ordens de suas referências diretas
- %s nos primeiros %s ordens de suas referências referências
- %s nos primeiros %s ordens de encaminhamentos de suas referências de suas referências

<img src="images/parrain_schema.gif" />

Você pode financiar até 100 referências e ganhe até 700 euros em vouchers suas referências diretas e muito mais com o seu afilhados afilhados etc.
Reinicie o espaço através do "patrocínio" em sua conta de multiplicar seus ganhos!
Registre-se rapidamente em '. STORE_NAME.' e patrocínio começa a ganhar euros!

<i><sup>(1)</sup> : E-mail que deve utilizar quando se registrar no '.STORE_NAME.'
<sup>(2)</sup> : Ganho será emitida através de códigos de desconto válido em um ano '.STORE_NAME.'
</i>');

define('SPONSORSHIP_TYPE_EMAILS', 'Digite os e-mails de amigos que pretende patrocinar :');
define('SPONSORSHIP_SUBMIT_BUTTON', 'Patrocinador');

define('ENTRY_QUOTA_GODCHILD', 'Você excedeu sua cota de referências (%s restante(s))');

define('ENTRY_EMAIL_ERROR', 'O seguinte e-mail não é válido: <br />- %s');
define('ENTRY_EMAIL_ERRORS', 'Os e-mails não são válidos: <br />- %s');

define('ENTRY_STORED_EMAIL_ERROR', 'O cliente seguinte e-mail já está '.STORE_NAME.' : <br />- %s');
define('ENTRY_STORED_EMAIL_ERRORS', 'A seguir, são e-mails já clientes '.STORE_NAME.' : <br />- %s');

define('ENTRY_SPONSORED_EMAIL_ERROR', 'O seguinte e-mail já está à espera de patrocínio: <br />- %s');
define('ENTRY_SPONSORED_EMAIL_ERRORS', 'Os e-mails a seguir já estão à espera de patrocínio: <br />- %s');
define('SPONSORSHIP_TITLE', 'Convide um amigo');


define('SPONSORSHIP_EMAIL_SUBJECT', '%s quer que você descubra'.STORE_NAME);

define('SPONSORSHIP_EMAIL_TEXT', 'Olá,

Seu amigo (a) %s queria apresentá-lo ao nosso site  <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> e estamos muito felizes.

Estamos muito satisfeitos de oferecer redução de% s por conta de um de seus comandos para obter um avanço sobre o seu máximo de compras. Aproveite esta com desconto válido para um mês, inserindo o seguinte código "jfjgy" momento da compra.

Para inserir o seu passeio no círculo de. Membros privilegiado de '.STORE_NAME.', Você apenas tem que aceitar o convite de %s, clicando no link abaixo:

<a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'/create_account.php?key=%s&email=%s">http://'.$_SERVER['SERVER_NAME'].'/create_account.php?key=%s&email=%s</a>

Até logo espero.
Toda a equipa '.STORE_NAME.'. ');

define('SPONSORSHIP_EMAIL_SENT', 'Parabéns !

eu amigo (s) ter sido advertido (s) por e-mail para o seu convite.

Desfrute de cupons em sua primeira compra, mas também para a compra de suas referências e seu pequeno-almoço referências! Esses cupons serão enviados por e-mail e também estará disponível neste link:

<a href="http://'.$_SERVER['SERVER_NAME'].'/sponsorship_discount.php">Meus cortes</a>

Você também pode visualizar a localização de suas referências, clicando no link abaixo:

<a href="http://'.$_SERVER['SERVER_NAME'].'/sponsorship_list.php">Meus afilhados</a>

Atenciosamente,
Qualquer equipa '.STORE_NAME);

define('EMAIL_ADDRESS_NUMBER', 'Endereço de e-mail');
?>