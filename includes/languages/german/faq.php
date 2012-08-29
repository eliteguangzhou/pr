<?php
/*
  $Id: track_order.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'FAQ');
define('HEADING_TITLE', 'FAQ');

define('TEXT_INFORMATION', '
<h3>Legen Sie eine Bestellung</h3>
Dies ist Ihr erster Kauf auf <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>?
<br /><br />
Wir begrüßen Sie und laden Sie diese Schritte durchführen:<br />
1. Wählen Sie die Artikel die Sie kaufen möchten<br />
2. Schreibe einen Artikel in den Warenkorb, indem Sie auf "ADD"<br />
3. Wenn Sie hinzugefügt haben alle Ihre Artikel in den Einkaufswagen, müssen Sie nur Klicken Sie auf<br />
4. "Bestellen". Wenn Sie einen weiteren Artikel hinzuzufügen, klicken auf "Weiter einkaufen<br />
5. Identifizieren Sie sich. Für zusätzliche Sicherheit wird ein Passwort und Ihre E-Mail erforderlich.<br />
6. Wählen Sie Ihre Rechnungsadresse und Lieferadresse
<br /><br />
Danke sehr deutlich die Namen Ihrer Stadt und Postleitzahl.
<br />
Achten Sie darauf, den Namen der Stadt Lieferung Zauber: Abkürzungen, Rechtschreibfehler und andere Shells kann manchmal zu Fehlern in diesem Thema führen. Denken Sie bitte auch die folgenden Angaben enthalten: Zugangscode, Boden, Gebäude.
<br />
<h3>Bezahlung</h3>
<b>Per Kreditkarte</b> ist einfach, schnell und sicher!
<br />
Zahlung per Kreditkarte ist eine <b>einfache, schnelle und sichere</b> online zu kaufen.
<br />
Wir akzeptieren <b>VISA, Master Card</b>.
<br />
Wir garantieren maximale Sicherheit.
<br />
Die Transaktion wird sicher durch den PayPal-Zahlung Service durchgeführt werden.
<br />
Alle erfassten Daten Bank (Kartennummer, Sicherheitscode und Ablaufdatum Ihrer Karte) mit Ihrer Zahlung per Kreditkarte werden umgehend mit SSL verschlüsselt und gespeichert auf dem Server von PayPal-Zahlung.
<br /><br />
Keine Zahlung Details sind auf der Website <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> gespeichert und vermeiden Sie jede Möglichkeit des Betrugs durch Hacken der Website <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>.
<b>Lieferzustand</b>
<br />
<a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> liefern Ihre Bestellung an die Adresse Ihrer Wahl in der Welt (80 Länder).
<br />
<h3>Kosten und Lieferung</h3>
Die Transportkosten beliefen sich auf 8,00 € und zwar unabhängig von der Anzahl der Pakete in Ihrer Bestellung enthalten.
<br />
Die Verzögerung in der Regel beobachtet zwischen dem Zeitpunkt der Bestellung, Kommissionierung und Empfangen Paket ist von 8 bis 12 Werktagen ohne Wochenenden und Feiertage.
<br />
<h3>Abbrechen eines Auftrags oder ändern</h3>
Bevor Sie eine Bestellung aufgeben, können Sie den Inhalt und die Gesamtmenge an Ihrem Warenkorb. Sobald die Bestellung berücksichtigt wird, kann man nicht ändern oder stornieren Ihre Bestellung innerhalb einer Stunde nach Ihrer Bestellung. Um dies zu tun, wir danken Ihnen, unseren Kundendienst unter <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'" target="_blank">'.STORE_OWNER_EMAIL_ADDRESS.'</a> kontaktieren.
<br />
Wir erheben diese Reaktivität, damit Sie Ihre Produkte in kürzester Zeit zu erhalten.
<br /><br />
<a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> ist nicht in der Lage, den Inhalt Ihrer Bestellung oder anderer Informationen an die Lieferadresse ändern, sobald Ihr Auftrag wird von Ihnen für bestätigt über eine Stunde.
<br />
<h3>Auftragsbestätigung</h3>
Nach der Bestellung auf <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> erhalten Sie eine E-Mail eine Zusammenfassung der Details.
<br /><br />
Es zeigt Ihre Bestellnummer (die Nummer, die auf der Website, wenn der Auftrag angenommen wurde gefunden wurde), bestellte Details der Produkte und ihre entsprechenden Preisen. Gegebenenfalls gute Promotion, ausgewählte Ihre Lieferadresse und Rechnungsadresse und die Versandart ebenfalls enthalten.
<br />
<h3>Verfolgen Sie Ihre Bestellung</h3>
Sie können Ihre Bestellung auf unserer Website mit Ihrer Bestellung per E-Mail-Bestätigung des Versands.
<br /><br />
<b>Promotion-Codes</b>
<br />
Um die Kriterien für die Förderung, geben Sie einfach den Code in Schritt Zahlung.Diese Angebote manchmal an denen mindestens Kaufbetrag (ohne Versandkosten).Wenn diese Aktion hat berücksichtigt, wird das Werbeangebot in Ihrem Warenkorb angezeigt
<br />
<h3>Sicherheitsgarantie</h3>
<a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> bietet alle Garantien für die Sicherheit und Vertraulichkeit Ihrer Daten sowie Privatkunden.
<br /><br />
<b>ENCRYPTION</b>
<br />Alle Ihre Bankdaten (Kartennummer, Gültigkeitsdatum und Sicherheitscode) werden sofort verschlüsselt und geschützt durch ein sicheres System.
<br />Keine Kreditkarte Informationen über Sie ist auf der Website <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> gespeichert.
<br />
<h3>E-Mail Bestätigung des Versands</h3>
Nach der Bearbeitung und Versand Ihrer Bestellung erhalten Sie eine E-Mail. Dies zeigt Ihre Bestellnummer (die Nummer, die auf der Website, wenn der Auftrag angenommen wurde gefunden wurde), die Tracking-Nummer, Kundennummer, bestellte Details der Produkte und ihre entsprechenden Preisen.
<br />
<h3>Kostenerstattung</h3>
Die Erstattung der Ware erfolgt innerhalb einer Frist von höchstens 60 bis 90 Tagen ab dem Datum der Ausstellung werden zur Kenntnis genommen. <a href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> behält sich das Recht auf Geschäfte mit allen Mitteln der Rückzahlung ihrer Wahl Vorauszahlung.
');
?>