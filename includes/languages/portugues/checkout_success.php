<?php

define('NAVBAR_TITLE_1', 'Pedido');
define('NAVBAR_TITLE_2', 'Realizado com Exito');
define('TOP_BAR_TITLE', 'Pedido Completo!');
define('HEADING_TITLE', 'Seu Pedido foi Processado!');
define('TEXT_SUCCESS', 'Seu pedido foi realizado com exito! Seus produtos chegarão a seu destino de 2 a 7 dias úteis após a confirmação do pagamento.<br><br>Você poderá acompanhar o histórico de seus pedidos na <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'NONSSL') . '">\'página de sua conta\'</a> clicando no link <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'NONSSL') . '">\'Histórico\'</a>.<br><br>Qualquer dúvida ou pergunta que tiver sobre o seu pedido poderá ser enviada por E-mail para <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">' . STORE_OWNER_EMAIL_ADDRESS . '</a>.<br><br><font size="3">Muito obrigado por adquirir os nossos produtos. Volte Sempre!</font>');


define('HEADING_TITLE', '<p><b>Parabéns !</b></p>
  <p>
 Seu pedido foi enviado com sucesso. </ P>
  <p> Se o seu pedido não contém nenhuma anomalia, o seu produto será entregue no prazo de 12 dias. </ p>

  <p>
  Uma confirmação do pedido foi enviado para sua caixa de e-mail. Se você não recebeu nada em 10 minutos você pode acessar sua confirmação de pedido com este link:<br />
  <a href="http://'.$_SERVER['SERVER_NAME'].'/account_history_info.php?order_id=%s">http://'.$_SERVER['SERVER_NAME'].'/account_history_info.php?order_id=%s</a>
  </p>
<br />');

define('HEADING_TITLE2', '<br />
  <p><b>
 Sabe também desfrutar de um desconto de %s valor digitando seu e-mail no campo abaixo :</b><br />
  <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
  <table cellpadding="0" cellspacing="5" style="width:220px;">
  <tr><td>Adresse email 1 : <input type="text" name="email[]" value="%s" /></td></tr>
  <tr><td>Adresse email 2 : <input type="text" name="email[]" value="%s" /></td></tr>
  <tr><td>Adresse email 3 : <input type="text" name="email[]" value="%s" /></td></tr>
  <tr><td align="center">'.tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE).'</td></tr>
  </table>
  </form>
  </p>');

define('TEXT_NOTIFY_PRODUCTS', 'Favor informar-me de atualizações para os produtos que eu optar abaixo:');
define('TEXT_SEE_ORDERS', 'Você pode ver o histórico do seu pedido a partir da página <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'Minha conta \'</a> e clicando em <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'Histórico\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Por favor, faça perguntas diretamente ao <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">Proprietário de loja</a>.');

define('TABLE_HEADING_COMMENTS', 'Escreva um comentário para a encomenda;');

define('TABLE_HEADING_DOWNLOAD_DATE', 'data de validade : ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' downloads restantes');
define('HEADING_DOWNLOAD', 'Baixe o seu produto aqui:');
define('FOOTER_DOWNLOAD', 'Você também pode baixar o seu produto antes de \'%s\'');

define('BAD_FRIEND_EMAIL', 'Email inválido');

define('MAIL_SENT', 'Um email foi enviado a seus contatos com o código de desconto!');

define('FRIEND_DISCOUNT_EMAIL_SUBJECT', '%s oferece um desconto'.STORE_NAME);

define('FRIEND_DISCOUNT_EMAIL_TEXT', 'Olá

Seu amigo (e) %s está esperando para oferecer desconto de %s a ser definido contra um dos seus pedidos <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>. Aproveite esta com desconto, válido por 48 horas após digitar o código "%s", quando ordena.

Se você ainda não é parte no círculo privilegiado dos membros '.STORE_NAME.' agora você pode se registrar clicando no link abaixo:

<a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'/create_account.php">http://'.$_SERVER['SERVER_NAME'].'/create_account.php</a>

Até logo.
Equipe '.STORE_NAME.'.
Tél : 0970 465 068');
define('ERROR_DISCOUNT_ALREADY_GIVEN', 'Você já enviou um cupom para que o amigo antes');


?>