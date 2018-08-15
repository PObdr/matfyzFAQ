<?php
//README: upravuj tady, dolů moc nehrab

$nadpis = "Matfyz FAQ";

$podnadpis = "To, na co jste se nás už nejednou ptali.";

$nazvy = array //usage: array("Nadpis sekce", "unikatni identifikatro (bude slouzit i jako predpona pro nedefinovana jmena linku; nesmi obsahovat podtrzitko)", "cesta k souboru s otazkami"); Proc to nefunguje? Bacha, za posledni sekci nesmi carka...
  (
  array("Obecné dotazy","obecne","obecne_dotazy.csv"),
  array("Fyzikální dotazy","fyzikalni","fyzikalni_dotazy.csv"),
  array("Informatické dotazy","informaticke","informaticke_dotazy.csv"),
  array("Matematické dotazy","matematicke","matematicke_dotazy.csv")
  );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta property="og:image" content="http://<?php echo $_SERVER[HTTP_HOST].strtok(strtok($_SERVER["REQUEST_URI"],'?'),'#');?>faq_icon.png" />
  <meta property="og:image:type" content="image/png" /> 
  <meta property="og:image:width" content="400" /> 
  <meta property="og:image:height" content="400" />
  <meta property="og:description" content="<?php echo $podnadpis;?>" />
  <title><?php echo $nadpis;?></title>
  <base target="_parent">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css" type="text/css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css" type="text/css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css" type="text/css">
  <link rel="stylesheet" href="assets/theme/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
  <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
  
<style>
.mbr-fonts-style{line-height: 1.5;}
</style>

<script>
    function gen_mail_to_link(lhs,rhs,subject,classes) {
        document.write("<a href=\"mailto");
        document.write(":" + lhs + "@");
        document.write(rhs + "?subject=" + subject + "\" class=\"" + classes +"\">" + lhs + "@" + rhs + "<\/a>");
    }
    
    function scroll_to_hash(){
        var hash = window.location.hash.substr(1).split("_").pop();
        if (hash)
        {
            location.href = "#";
            location.href = "#dotaz_"+ hash;
            document.getElementById("question_"+hash).classList.add("mbri-arrow-up");
            document.getElementById("question_"+hash).classList.remove("mbri-arrow-down");
            document.getElementById("btn_"+hash).classList.remove("collapsed");
            document.getElementById("btn_"+hash).setAttribute("aria-expanded", "true");
            document.getElementById(hash).classList.add("show");
        }       
    }
    
    function copyToClipboard(text) {
        window.prompt("Zkopíruj si odkaz a pošli ho tazateli!", window.location.protocol + "//" + window.location.hostname + "/" + text)
    }
    
</script>  
</head>


<body onload="scroll_to_hash();">


<section class="header11 cid-qv5BLEQHXO" id="header" data-rv-view="2085">

    <!-- Block parameters controls (Blue "Gear" panel) -->
    
    <!-- End block parameters -->

    
    <div class="container align-left">
        <div class="media-container-column mbr-white col-md-12">
            
            <h1 class="mbr-section-title py-3 mbr-fonts-style display-1"><?php echo $nadpis;?></h1>
            
            <h3 class="mbr-section-title py-3 mbr-fonts-style display-2"><?php echo $podnadpis;?></h3>
        </div>
    </div>

    
</section>

<?php
function vypisSekci($nadpis, $id, $cesta) {
    $csv = array_map('str_getcsv', file($cesta));
    array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
    });
    array_shift($csv); # remove column header
    
    echo '<section class="toggle1 cid-qv5Aju6kt2" id="dotaz_'.$id.'" data-rv-view="2091">
      <div class="container" role="tablist">
            <div class="media-container-row">
                <div class="col-12 col-md-12">
                    <div class="section-head text-center space30">
                       <h2 class="mbr-section-title pb-5 mbr-fonts-style display-2">'.$nadpis.'</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bootstrap-toggle-'.$id.'" class="toggle-panel accordionStyles tab-content"><br />';
    foreach($csv as $i => $trojice)
      {
        if (empty($trojice["link"]))
          {                                        
            $trojice["link"] =$id."-".($i+1);
          }
          echo '<div class="card">
                    <div class="card-header" role="tab" id="dotaz_'.$trojice["link"].'">
                        <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#'.$trojice["link"].'" id="btn_'.$trojice["link"].'" aria-expanded="false" aria-controls="'.$trojice["link"].'">
                            <h4 class="mbr-fonts-style display-6">
                                <span class="sign mbr-iconfont mbri-arrow-down inactive" id="question_'.$trojice["link"].'"></span>'.$trojice["Q"].
                            '</h4>
                        </a>
                    </div>
                    <div id="'.$trojice["link"].'" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="dotaz_'.$trojice["link"].'">
                        <div class="panel-body px-4 pt-4">
                            <p class="mbr-fonts-style panel-text display-7">'.$trojice["A"].
                        '</div>
                        <span class="pb-4 mbri-link-chain" style="float: right;padding-bottom:5px;" onclick="copyToClipboard(\'#'.$trojice["link"].'\')" title="odkaz"></span>
                    </div>
                </div>';
      }
   echo '</div>
                </div>
            </div>
        </div>
</section>';
}
  
foreach($nazvy as $nazev){vypisSekci($nazev[0], $nazev[1], $nazev[2]);}
?>


<section class="header11 cid-qv5BLEQHXO" id="disclaimer" data-rv-view="2085">
    <div class="container align-center">
        <div class="media-container-column mbr-white col-md-12">
            
            <h4 class="py-4 mbr-fonts-style" style="font-size: 1.5em;">Máš pocit, že tu není všechno? Zkus se zeptat spolužáků nebo nám napiš na e-mail <script>gen_mail_to_link('faq','matfyz.cz','[Matfyz FAQ]', 'text-white');</script>.</h4>
        </div>
    </div>
</section>

<section class="cid-qvLq468qgu" id="fakefooter" data-rv-view="2128" />
<br />
<br />
<br />
<section class="cid-qvLq468qgu" id="footer" data-rv-view="2128" style="position:absolute; bottom:0%; width:100%">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <h6 class="mbr-text mb-0 mbr-fonts-style display-7" style="font-weight:normal;">
                    &copy; Content copyright 2018<?=(date('Y')>2018?' - '.date('Y'):'')?>: <a href="http://pobdr.matfyz.cz" class="text-white">Pavel Obdržálek</a>, <a href="http://www.ms.mff.cuni.cz/~yaghoboa/" class="text-white">Anna Yaghobová</a>, Míra Štochel, Petr Houška, Petra Hoffmannová, Peter Korcsok<br />a spousta dotazovatelů z řad studentů…
                </h6>
                Pomohlo ti to? Kup nám třeba pivko! <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="9LKM2784ZRNQN">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
                Jo. A je to i na <a href="https://github.com/PObdr/matfyzFAQ" class="text-white">GitHubu</a>!
                <h6 class="mbr-text mb-0 mbr-fonts-style display-7" style="font-weight:normal;">
                    &copy; Theme copyright 2017: <a href="https://mobirise.com/bootstrap-template/" class="text-white">Free Bootstrap Templates</a>, heavily edited by <a href="http://pobdr.matfyz.cz" class="text-white">Pavel Obdržálek</a> - Byli jsme líní si to psát sami, tak jsme si to půjčili, no.
                </h6>
            </div>
        </div>
    </div>
</section>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/theme/js/script.js"></script>

  
</body>

</html>
<?php  //logování, které je ale pri vyuziti matfyz.cz a volby include docela nepouzitelne, ale aspon to da infotmace o casu a poctu vyuziti
if ($_REQUEST['stat']!="none")
{
  $stat=fopen("statistic.log","a");
  fwrite($stat,date("d.m.Y H:i:s")." | ".$_SERVER['REMOTE_ADDR']." | ".$_SERVER['HTTP_USER_AGENT']." | HTTP_REFERER=".$_SERVER['HTTP_REFERER']." | ".$_SERVER['QUERY_STRING']."\n");
  fclose($stat);
}
?>
Tuhle jedničku tady vyrábí include, tak jsem se to pokusil schovat. Ale může za to doména matfyz.cz: 