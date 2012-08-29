<?php
/*
  $Id: create_account.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Crear una Cuenta');
define('NAVBAR_TITLE_2', 'Proceso');
define('HEADING_TITLE', 'Datos de Mi Cuenta');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTA:</b></font></small> Si ya ha pasado por este proceso y tiene una cuenta, por favor <a href="%s"><u>entre</u></a> en ella.');

define('EMAIL_SUBJECT', 'Bienvenido a ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Estimado vnom,' . "\n\n");
define('EMAIL_GREET_MS', 'Estimado vnom,' . "\n\n");
define('EMAIL_GREET_NONE', 'Estimado vnom,' . "\n\n");

define('EMAIL_WELCOME', '
¡Enhorabuena! Ha sido creada su cuenta personal.

Ahora podrá comprar nuestros perfumes pulsando: "añadir a la cesta"

Los datos necesarios para acceder a su cuenta son los siguientes:

Usuario: vloggin
Contraseña: vpass'. "\n\n");

define('EMAIL_TEXT', '');
define('EMAIL_CONTACT', 'Si necesita ayuda, póngase en contacto con nosotros por correo electrónico a: <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'" target="_blank">'.STORE_OWNER_EMAIL_ADDRESS.'</a>.

  Felices compras,

  SAMY
  Equipo de Atención al Cliente
  <a href="http://www.'.strtolower(STORE_NAME).'/" target="_blank">www.'.strtolower(STORE_NAME).'</a>');
  
define('EMAIL_WELCOME', 'Le damos la bienvenida a <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Ahora puede disfrutar de los <b>servicios</b> que le ofrecemos. Algunos de estos servicios son:' . "\n\n" . '<li><b>Carrito Permanente</b> - Cualquier producto añadido a su carrito permanecera en el hasta que lo elimine, o hasta que realice la compra.' . "\n" . '<li><b>Libro de Direcciones</b> - Podemos enviar sus productos a otras direcciones aparte de la suya! Esto es perfecto para enviar regalos de cumpleaños directamente a la persona que cumple años.' . "\n" . '<li><b>Historia de Pedidos</b> - Vea la relacion de compras que ha realizado con nosotros.' . "\n" . '<li><b>Comentarios</b> - Comparta su opinion sobre los productos con otros clientes.' . "\n\n");
define('EMAIL_CONTACT', 'Para cualquier consulta sobre nuestros servicios, por favor escriba a: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Nota:</b> Esta direccion fue suministrada por uno de nuestros clientes. Si usted no se ha suscrito como socio, por favor comuniquelo a ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");

define('SPONSORSHIP_GODFATHER', 'Su patrocinador es : ');
define('SPONSORSHIP_GODFATHER_UNKNOWN', 'La clave y el correo electrónico introducido no coincide con ningún patrocinio.');

define('EMAIL_SUBJECT_NETA', 'Réductions '.STORE_NAME);
define('EMAIL_TEXT_NETA', 'Suite à votre inscription sur '.STORE_NAME.', profitez des coupons de réduction suivants (non cumulable) :

%s

Bonne visite,

SAMY
Equipe Service Client
<a href="http://www.'.strtolower(STORE_NAME).'/" target="_blank">www.'.strtolower(STORE_NAME).'</a>');
?>
