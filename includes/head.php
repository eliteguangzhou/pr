<?php
switch ($check_server) {
  case 'fr' : $ga_id = 'UA-16993181-1'; $beezup_track_id = 'af26510b-52a1-4df4-a289-1e7eacb65f6c';break;
  case 'de' : $ga_id = 'UA-21469951-1'; $beezup_track_id = '06a02909-299f-467e-8ed2-651d11b527e9';break;
  case 'es' : $ga_id = 'UA-21469950-1'; $beezup_track_id = '57263df7-6420-4ba3-b9c4-e8d09b10fe31';break;
  case 'it' : $ga_id = 'UA-21471714-1'; $beezup_track_id = '78a219a1-1539-46b1-a83f-8bcce5680ee5';break;
  case 'mx' : $ga_id = 'UA-19210098-1'; break;
}

//Google Analityc
if (isset($ga_id)) {
  ?>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php echo $ga_id;?>']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>

  <?php
}

if (isset($beezup_track_id)) {
  ?>
<!--   <script type="text/javascript" src="http://tracker.beezup.com/Get?StoreId=<?php echo $beezup_track_id;?>"> </script> -->
  <?php
}
?>