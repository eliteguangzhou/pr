<?php
/*
  $Id: index.php,v 1.1 2003/06/11 17:38:00 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('TEXT_MAIN', 
' 
<br>
TR Digital &amp; Informática<br>
Endereço:  Rua Pimenta de Padua, 1747<br>
Bairro: Centro<br>
São Sebastião do Paraíso / MG<br>
CEP: 37.950-000<br>
Telefone: 0xx35 3558.7478<br>
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
');
define('TABLE_HEADING_NEW_PRODUCTS', 'Novos Produtos em %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Produto em alta');
define('TABLE_HEADING_DATE_EXPECTED', 'Data Esperada');





define('TEXT_MAIN', 'Esta é a configuração padrão do projecto osCommerce, os produtos são indicados para fins de demonstração, <b>quaisquer produtos adquiridos não serão entregues ou facturados ao cliente.</b> Qualquer informação visita a esses produtos deve ser tratada como ficcional.<br><br>
<table border="0" summary="" width="100%" cellspacing="5" cellpadding="2">
<tr>
<td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/1.gif') . '</td>
<td class="main" valign="top"><b>Mensagens de erro </b><br><br>Se houver algum erro ou mensagens de aviso mostrado acima, corrija-os antes de continuar. <br><br>Mensagens de erro são exibidas na parte superior da página com um <span class="messageStackError">fundo</span> de cor.<br><br> Diversos controles são realizados para assegurar uma instalação saudável de sua loja online - estas verificações podem ser desativadas editando os parâmetros apropriados no arquivo includes/application_top.php. </td>
</tr>
<tr>
<td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/2.gif') . '</td>
<td class="main" valign="top"><b>Conteúdo editorial da página </b><br><br>O texto mostrado aqui pode ser modificado no seguinte arquivo, em cada linguagem base:<br><br><span class="messageStackSuccess">[chemin du répertoire catalog]/includes/languages/' . $language . '/' . FILENAME_DEFAULT . '</span><br><br>Este arquivo pode ser editado manualmente, ou através da ferramenta de administração com os módulos <span class="messageStackSuccess">Languages-&gt;' . ucfirst($language) . '-&gt;Define</span> ou <span class="messageStackSuccess">Tools-&gt;File Manager.<br><br> O texto é o seguinte </span><br><br>define(\'TEXT_MAIN\', \'<span class="messageStackSuccess">Esta é a configuração padrão do projeto do osCommerce ...</span>\');<br><br>O texto destacado em verde podem ser modificados - é importante para definir () para definir a palavra-chave TEXT_MAIN. Para remover o texto de TEXT_MAIN completamente, o seguinte exemplo é usado onde somente dois caracteres de aspas simples (aspas) entrou:<br><br>define(\'TEXT_MAIN\', \'\');<br><br>Mais informações sobre o PHP define() pode ser lido <a href="http://www.php.net/manual/fr/function.define.php" target="_blank"><u>ici</u></a>.</td>
</tr>
<tr>
<td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/3.gif') . '</td>
<td class="main" valign="top"><b>Assegurar as Ferramentas Administrativas</b><br><br>É importante para garantir a Ferramenta de Administração, actualmente não existe qualquer implementação de segurança.</td></tr><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/4.gif') . '</td>
<td class="main" valign="top"><b>Documentação Online</b><br><br>A documentação online pode ser lido no site <a href="http://wiki.oscommerce.com" target="_blank"><u>osCommerce Wiki Documentation Effort</u></a>.
<br><br>O apoio da comunidade fórum está disponível no <a href="http://forums.oscommerce.com" target="_blank"><u>osCommerce Community Support Forums</u></a>.
<br><br>Fórum de apoio da comunidade francófona está disponível no <a href="http://www.oscommerce-fr.info/forum/index.php?showtopic=36121" target="_blank"><u>Forum osCommerce-fr</u></a>.
<br>Perguntas mais frequentes da comunidade francófona está disponível em <a href="http://www.oscommerce-fr.info/faq/" target="_blank"><u>FAQ osCommerce-fr</u></a>.
<br>O guia para sua instalação está disponível em francês <a href="http://www.oscommerce-fr.info/portail/index.php?option=com_content&amp;task=section&amp;id=3&amp;Itemid=157" target="_blank"><u>Guide d\'installation</u></a>.
</td>
</tr>
</table>
<br>Se você deseja baixar o software que suporta esta loja, ou se você quiser contribuir para o projecto osCommerce, visite o site francês <a href="http://www.oscommerce-fr.info" target="_blank"><u>osCommerce-fr</u></a> ou site da comunidade genéricos <a href="http://www.oscommerce.com" target="_blank"><u>osCommerce</u></a>. Esta loja está funcionando na versão osCommerce <font color=red><b>' . PROJECT_VERSION . '</b></font>.');
define('TABLE_HEADING_NEW_PRODUCTS', 'Novos Produtos para  %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Próximos Produtos');
define('TABLE_HEADING_DATE_EXPECTED', 'A data prevista');


if ( ($category_depth == 'products') || (isset($HTTP_GET_VARS['manufacturers_id'])) ) {
  define('HEADING_TITLE', 'Produtos');
  define('TABLE_HEADING_IMAGE', '');
  define('TABLE_HEADING_MODEL', 'Modelo');
  define('TABLE_HEADING_PRODUCTS', 'Nome do Produto');
  define('TABLE_HEADING_MANUFACTURER', 'Manufacturer');
  define('TABLE_HEADING_QUANTITY', 'Quantidade');
  define('TABLE_HEADING_PRICE', 'Preço');
  define('TABLE_HEADING_WEIGHT', 'Peso');
  define('TABLE_HEADING_BUY_NOW', 'Comprar agora');
  define('TEXT_NO_PRODUCTS', 'Não há nenhum produto a listar nesta categoria .');
  define('TEXT_NO_PRODUCTS2', 'Não há nenhum produto disponível deste fabricante');
  define('TEXT_NUMBER_OF_PRODUCTS', 'Número dos produtos: ');
  define('TEXT_SHOW', '<b>Mostrar:</b>');
  define('TEXT_BUY', 'Compra 1 \'');
  define('TEXT_NOW', '\' agora');
  define('TEXT_ALL_CATEGORIES', 'Todas as Categorias');
  define('TEXT_ALL_MANUFACTURERS', 'Todos os fabricantes ');
  define('TEXT_PRICE_FROM', 'à partir de');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', 'Descubra ...');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', 'Categorias');
}




define('NEW_INTRO','
Bem-vindo ao Reino dos segredos do perfume, a preços baixos!

Dê um passeio na fragrância marcas <span class="text_rose">o menos caro em França!</span>
Não compre sem comparar !<span class="text_rose"> Nós devolveremos a diferença!</span>

« <a class="text_rose" href="'.tep_href_link(FILENAME_ADVANTAGES).'">Descubra os nossos benefícios</a> »

- <span class="text_rose">20.000 perfumes e cosméticos</span>atualmente no site
- 500 marcas era -40%, -50%, -70%
- 3€, 8€, <span class="text_rose">Desconto de 15 €</span>  oferecidos
- <span class="text_rose">Frete 3€</span>  a partir de 2 produtos na cestar
- 1 dom <span class="text_rose">HUGO BOSS oferecidos</span>  a partir de 2 produtos na cesta
- Todos os produtos on-line estão em <span class="text_rose">estoque</span>
- <span class="text_rose"> Satisfeito ou reembolsado</span> 30 dias
- Pagamento <span class="text_rose">seguro</span>
- Atendimento ao Cliente: <span class="text_rose">0970 465 068</span> (6 dias / 7)');

?>