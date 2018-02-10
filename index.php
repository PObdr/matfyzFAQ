<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Matfyz FAQ</title>
  <base target="_parent">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css" type="text/css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css" type="text/css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css" type="text/css">
  <link rel="stylesheet" href="assets/theme/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
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


<section class="header11 cid-qv5BLEQHXO" id="header11-56" data-rv-view="2085">

    <!-- Block parameters controls (Blue "Gear" panel) -->
    
    <!-- End block parameters -->

    
    <div class="container align-left">
        <div class="media-container-column mbr-white col-md-12">
            
            <h1 class="mbr-section-title py-3 mbr-fonts-style display-1">Matfyz FAQ</h1>
            
            <h3 class="mbr-section-title py-3 mbr-fonts-style display-2">To, na co jste se nás už nejednou ptali.</h3>
        </div>
    </div>

    
</section>


<section class="toggle1 cid-qv5Aju6kt2" id="dotaz_obecne" data-rv-view="2091">

    

    
        <div class="container" role="tablist">
            <div class="media-container-row">
                <div class="col-12 col-md-12">
                    <div class="section-head text-center space30">
                       <h2 class="mbr-section-title pb-5 mbr-fonts-style display-2">
                            Obecné dotazy</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bootstrap-toggle-obecne" class="toggle-panel accordionStyles tab-content">
                    <?php
    
    $file_obecne = "obecne_dotazy.csv";
    $csv_obecne = array_map('str_getcsv', file($file_obecne));
    array_walk($csv_obecne, function(&$a) use ($csv_obecne) {
      $a = array_combine($csv_obecne[0], $a);
    });
    array_shift($csv_obecne); # remove column header
    echo "<br />";
    foreach($csv_obecne as $i => $trojice_obecne)
      {
        if (empty($trojice_obecne["link"]))
          {                                        
            $trojice_obecne["link"] ="obecne-".($i+1);
          }
                  echo '<div class="card">
                            <div class="card-header" role="tab" id="dotaz_'.$trojice_obecne["link"].'">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#'.$trojice_obecne["link"].'" id="btn_'.$trojice_obecne["link"].'" aria-expanded="false" aria-controls="'.$trojice_obecne["link"].'">
                                    <h4 class="mbr-fonts-style display-6">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive" id="question_'.$trojice_obecne["link"].'"></span>'.$trojice_obecne["Q"].
                                    '</h4>
                                </a>
                            </div>
                            <div id="'.$trojice_obecne["link"].'" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="dotaz_'.$trojice_obecne["link"].'">
                                <div class="panel-body px-4 pt-4">
                                    <p class="mbr-fonts-style panel-text display-7">'.$trojice_obecne["A"].
                                '</div>
                                <span class="pb-4 mbri-link-chain" style="float: right;padding-bottom:5px;" onclick="copyToClipboard(\'#'.$trojice_obecne["link"].'\')" title="odkaz"></span>
                            </div>
                        </div>';
      }
    ?>                             
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="toggle1 cid-qv5Aju6kt2" id="dotaz_fyzika" data-rv-view="2091">

    

    
        <div class="container" role="tablist">
            <div class="media-container-row">
                <div class="col-12 col-md-12">
                    <div class="section-head text-center space30">
                       <h2 class="mbr-section-title pb-5 mbr-fonts-style display-2">
                            Fyzikální dotazy</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bootstrap-toggle-fyzikalni" class="toggle-panel accordionStyles tab-content">
                    <?php
    
    $file_fyzikalni = "fyzikalni_dotazy.csv";
    $csv_fyzikalni = array_map('str_getcsv', file($file_fyzikalni));
    array_walk($csv_fyzikalni, function(&$a) use ($csv_fyzikalni) {
      $a = array_combine($csv_fyzikalni[0], $a);
    });
    array_shift($csv_fyzikalni); # remove column header
    echo "<br />";
    foreach($csv_fyzikalni as $i => $trojice_fyzikalni)
      {
        if (empty($trojice_fyzikalni["link"]))
          {                                        
            $trojice_fyzikalni["link"] ="fyzikalni-".($i+1);
          }
                  echo '<div class="card">
                            <div class="card-header" role="tab" id="dotaz_'.$trojice_fyzikalni["link"].'">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#'.$trojice_fyzikalni["link"].'" id="btn_'.$trojice_fyzikalni["link"].'" aria-expanded="false" aria-controls="'.$trojice_fyzikalni["link"].'">
                                    <h4 class="mbr-fonts-style display-6">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive" id="question_'.$trojice_fyzikalni["link"].'"></span>'.$trojice_fyzikalni["Q"].
                                    '</h4>
                                </a>
                            </div>
                            <div id="'.$trojice_fyzikalni["link"].'" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="dotaz_'.$trojice_fyzikalni["link"].'">
                                <div class="panel-body px-4 pt-4">
                                    <p class="mbr-fonts-style panel-text display-7">'.$trojice_fyzikalni["A"].
                                '</div>
                                <span class="pb-4 mbri-link-chain" style="float: right;padding-bottom:5px;" onclick="copyToClipboard(\'#'.$trojice_fyzikalni["link"].'\')" title="odkaz"></span>
                            </div>
                        </div>';
      }
    ?>                  
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="toggle1 cid-qv5Aju6kt2" id="dotaz_informatika" data-rv-view="2091">

    

    
        <div class="container" role="tablist">
            <div class="media-container-row">
                <div class="col-12 col-md-12">
                    <div class="section-head text-center space30">
                       <h2 class="mbr-section-title pb-5 mbr-fonts-style display-2">
                            Informatické dotazy</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bootstrap-toggle-informaticke" class="toggle-panel accordionStyles tab-content">
                    <?php
    
    $file_informaticke = "informaticke_dotazy.csv";
    $csv_informaticke = array_map('str_getcsv', file($file_informaticke));
    array_walk($csv_informaticke, function(&$a) use ($csv_informaticke) {
      $a = array_combine($csv_informaticke[0], $a);
    });
    array_shift($csv_informaticke); # remove column header
    echo "<br />";
    foreach($csv_informaticke as $i => $trojice_informaticke)
      {
        if (empty($trojice_informaticke["link"]))
          {                                        
            $trojice_informaticke["link"] ="informaticke-".($i+1);
          }
                  echo '<div class="card">
                            <div class="card-header" role="tab" id="dotaz_'.$trojice_informaticke["link"].'">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#'.$trojice_informaticke["link"].'" id="btn_'.$trojice_informaticke["link"].'" aria-expanded="false" aria-controls="'.$trojice_informaticke["link"].'">
                                    <h4 class="mbr-fonts-style display-6">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive" id="question_'.$trojice_informaticke["link"].'"></span>'.$trojice_informaticke["Q"].
                                    '</h4>
                                </a>
                            </div>
                            <div id="'.$trojice_informaticke["link"].'" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="dotaz_'.$trojice_informaticke["link"].'">
                                <div class="panel-body px-4 pt-4">
                                    <p class="mbr-fonts-style panel-text display-7">'.$trojice_informaticke["A"].
                                '</div>
                                    <span class="pb-4 mbri-link-chain" style="float: right;padding-bottom:5px;" onclick="copyToClipboard(\'#'.$trojice_informaticke["link"].'\')" title="odkaz"></span> 
                            </div>
                        </div>';
      }
    ?>                  
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="toggle1 cid-qv5Aju6kt2" id="dotaz_matematika" data-rv-view="2091">

    

    
        <div class="container" role="tablist">
            <div class="media-container-row">
                <div class="col-12 col-md-12">
                    <div class="section-head text-center space30">
                       <h2 class="mbr-section-title pb-5 mbr-fonts-style display-2">
                            Matematické dotazy</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bootstrap-toggle-matematicke" class="toggle-panel accordionStyles tab-content">
                    <?php
    
    $file_matematicke = "matematicke_dotazy.csv";
    $csv_matematicke = array_map('str_getcsv', file($file_matematicke));
    array_walk($csv_matematicke, function(&$a) use ($csv_matematicke) {
      $a = array_combine($csv_matematicke[0], $a);
    });
    array_shift($csv_matematicke); # remove column header
    echo "<br />";
    foreach($csv_matematicke as $i => $trojice_matematicke)
      {
        if (empty($trojice_matematicke["link"]))
          {                                        
            $trojice_matematicke["link"] ="matematicke-".($i+1);
          }
                  echo '<div class="card">
                            <div class="card-header" role="tab" id="dotaz_'.$trojice_matematicke["link"].'">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#'.$trojice_matematicke["link"].'" id="btn_'.$trojice_matematicke["link"].'" aria-expanded="false" aria-controls="'.$trojice_matematicke["link"].'">
                                    <h4 class="mbr-fonts-style display-6">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive" id="question_'.$trojice_matematicke["link"].'"></span>'.$trojice_matematicke["Q"].
                                    '</h4>
                                </a>
                            </div>
                            <div id="'.$trojice_matematicke["link"].'" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="dotaz_'.$trojice_matematicke["link"].'">
                                <div class="panel-body px-4 pt-4">
                                    <p class="mbr-fonts-style panel-text display-7">'.$trojice_matematicke["A"].
                                '</div>
                                <span class="pb-4 mbri-link-chain" style="float: right;padding-bottom:5px;" onclick="copyToClipboard(\'#'.$trojice_matematicke["link"].'\')" title="odkaz"></span>
                            </div>
                        </div>';
      }
    ?>            
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
</section>


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
<section class="cid-qvLq468qgu" id="footer6-d9" data-rv-view="2128" style="position:absolute; bottom:0%; width:100%">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <h6 class="mbr-text mb-0 mbr-fonts-style display-7" style="font-weight:normal;">
                    &copy; Content copyright 2018<?=(date('Y')>2018?' - '.date('Y'):'')?>: <a href="http://pobdr.matfyz.cz" class="text-white">Pavel Obdržálek</a>, <a href="http://www.ms.mff.cuni.cz/~yaghoboa/" class="text-white">Anna Yaghobová</a>, Míra Štochel, <a href="http://petrroll.cz/" class="text-white">Petr Houška</a>, Petra Hoffmannová<br />a spousta dotazovatelů z řad studentů…
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
Tuhle jedničku tady vyrábí include, tak jsem se to pokusil schovat. Ale může za to doména matfyz.cz: 