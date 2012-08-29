<?php
/*
  $Id: faq.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'FAQ');
define('HEADING_TITLE', 'FAQ');

define('TEXT_INFORMATION', '
<b>• Posizionare un ordine</b><br />
Questo è il tuo primo acquisto su <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>?<br />
<br />
Vi diamo il benvenuto e vi invitiamo a seguire questi passaggi:<br />
1. Selezionare gli elementi che si desidera acquistare<br />
2. Aggiungi i prodotti al carrello cliccando "ADD"<br />
3. Dopo aver aggiunto tutti i tuoi articoli al carrello, dovete solo cliccare su<br />
4. "ORDINA". Se si desidera aggiungere altri elementi, cliccate su "Continua lo shopping<br />
5. Identificarsi. Per maggiore sicurezza, una password e la tua email sarà richiesto.<br />
6. Scegli il tuo indirizzo di fatturazione e indirizzo di spedizione<br />
<br />
La ringrazio molto chiaramente indicare il nome della vostra città e codice postale.<br />
Assicurati di scrivere il nome della città di consegna: abbreviazioni, errori di ortografia e di altre shell a volte può portare ad errori in questo argomento. Ricorda inoltre di includere le seguenti informazioni: codice di accesso, piano, edificio.<br />
<b>• Pagamento</b><br />
Con carta di credito è facile, veloce e sicuro!<br />
Il pagamento con carta di credito è una semplice, veloce e sicuro per acquistare online.<br />
• Si accettano <b>VISA</b>, <b>MASTER CARD</b>.<br />
Garantiamo la <b>massima sicurezza</b>.<br />
L\'operazione sarà condotta in modo sicuro attraverso il servizio di pagamento PayPal.<br />
Tutti i dati acquisiti bancari (numero di carta, il codice di sicurezza e data di scadenza della carta) con il pagamento tramite carta di credito vengono immediatamente criptati utilizzando SSL e memorizzati sul server di pagamento PayPal.<br />
• Nessuna dettagli del pagamento vengono memorizzati sul sito <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>, evitando ogni possibilità di frode da parte di hacking del sito <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>.<br />
<b>Condizioni di fornitura</b><br />
<a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> consegnare il vostro ordine all\'indirizzo di vostra scelta nel mondo (80 paesi).<br />
<b>• Costi e consegna a domicilio</b><br />
I costi di trasporto ammontano a <b>8,00 €</b> e questo indipendentemente dal numero di pacchetti inclusi nel vostro ordine.<br />
Il ritardo si osservano di solito tra il momento dell\'ordine, la raccolta e la ricezione di pacchi è da 8 a 12 giorni lavorativi esclusi i fine settimana e festivi.<br />
<b>• Annullare o modificare un ordine</b><br />
Prima di inviare un ordine, è possibile controllare il contenuto e l\'importo totale del tuo carrello. Una volta che l\'ordine viene preso in considerazione, non è possibile annullare o modificare l\'ordine entro un\'ora dopo il tuo ordine. Per fare questo, vi ringrazio di contattare il nostro servizio clienti a <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'" target="_blank">'.STORE_OWNER_EMAIL_ADDRESS.'</a>.<br />
Abbiamo imporre questa reattività per permettere di ricevere i vostri prodotti nel più breve tempo.<br />
<br />
<a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> è in grado di modificare i contenuti del tuo ordine e tutte le informazioni relative all\'indirizzo di consegna, una volta che il vostro ordine è stato confermato da lei per più di un\'ora.<br />
<b>Conferma ordine</b><br />
Dopo l\'ordine sul <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> si riceverà una e-mail che riassume i dati.<br />
<br />
Essa mostra il numero d\'ordine (il numero che è stato visualizzato sul sito quando l\'ordine è stato accettato), i dettagli dei prodotti ordinati ei corrispondenti prezzi. Se del caso, una buona promozione, l\'indirizzo di spedizione e di fatturazione e il metodo di spedizione scelto anche incluso.<br />
<b>• Segui il tuo ordine</b><br />
È possibile rintracciare il tuo ordine sul nostro sito web con il vostro numero d\'ordine nella vostra email di conferma della spedizione.<br />
<b>Codici promozionali</b><br />
Per qualificarsi per la promozione, è sufficiente <b>inserire il codice</b> di pagamento Step.Le offerte a volte coinvolgono un importo minimo di acquisto (escluse le spese di spedizione). Se questa promozione è stata presa in considerazione, l\'offerta promozionale verrà visualizzato nel tuo carrello<br />
<b>• Garanzia di sicurezza</b><br />
<a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> offre tutte le garanzie di sicurezza e riservatezza delle informazioni, nonché servizi bancari personali.<br />
<br />
<b>CRITTOGRAFIA</b><br />
Tutti i vostri dati bancari (numero di carta, data di scadenza e codice di sicurezza) vengono immediatamente criptati e protetti da un sistema sicuro.<br />
Nessuna informazione della carta di credito viene memorizzato su di voi sul sito <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>.<br />
<br />
<b>• E-mail di conferma della spedizione</b><br />
Dopo l\'elaborazione e la spedizione del tuo ordine riceverai una e-mail. Questo mostra il numero d\'ordine (il numero che è stato visualizzato sul sito quando l\'ordine è stato accettato), il numero di tracking, codice cliente, i dettagli dei prodotti ordinati ei corrispondenti prezzi.<br />
<b>• Rimborso</b><br />
La restituzione del prodotto sarà effettuata entro un termine massimo di 60 a 90 giorni dalla data di emissione osservato. <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> si riserva il diritto di rimborsare le transazioni con qualsiasi mezzo di rimborso di loro scelta.');
?>
