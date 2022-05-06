<?php
  use PHPMailer\PHPMailer\PHPMailer;

  require './vendor/phpmailer/phpmailer/src/Exception.php';
  require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require './vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require './vendor/autoload.php';

  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if(isset($_POST['url']) && $_POST['url'] == ''){

  if (isset($_POST['submit'])) {
    $errors = array();

    $namef      = $_POST['namef'];
    $names      = $_POST['names'];
    $email     = $_POST['email'];
    $message   = $_POST['message'];

    if (empty($namef) === true || empty($names) === true || empty($email) === true || empty($message) === true){
      $errors[] = 'Name, email and message are required!';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = 'That\'s not a valid email address.';
        }
        if (ctype_alpha($namef) == false && ctype_alpha($names) == false) {
            $errors[] = 'Name must only contain letters!';
        }        
    }

    if (empty($errors) === true) {
        //Send email
    try {
      $mail->isSMTP();
      $mail->Host = 'mail.archbluventuresltd.com';
      $mail->SMTPAuth = true;
      $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ));
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'info@archbluventuresltd.com';
      // Gmail Password
      $mail->Password = 'Archbluventures2022';
      $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom($email);
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('info@archbluventuresltd.com');

      $mail->isHTML(true);
      $mail->Subject = 'ArchBlu Ventures Website Form Submission';
      $mail->Body = "<h3>First Name : $namef <br>Second Name : $names <br>Email : $email <br>Message : $message</h3>";

      $mail->send();
      // $output = '<div class="alert alert-success">
      //             <h5>Thank you! for contacting us, Well get back to you soon!</h5></div>';

      //redirect user   
      header('Location: index.php?sent');
      exit();
      
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6KHNEPVC68"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6KHNEPVC68');
</script>

  <title>ArchBlu Ventures &mdash; Leading Copper Producer </title>
  <meta charset="UTF-8">
  <meta name="description" content="ArchBlu Ventures is the leading copper producer with offices domiciled in Zambia, Democratic Republic of Congo, Tanzania and Headquarters in Nairobi, Kenya."/>
  <meta name="keywords" content="Leading copper producer, ArchBlu, ArchBlu Ventures">
  <meta name="author" content="Arthur Nyundoo">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="geo.placename" content="San Diego" /><meta name="geo.position" content="32.9123982;-117.1154122" /><meta name="geo.region" content="US" />

<link rel="canonical" href="https://archbluventuresltd.com"/>
  <!-- Favicons -->
  <link href="./images/icon.png" rel="icon">
  <link href="./images/apple-touch-icon.png" rel="apple-touch-icon">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="place:location:latitude" content="32.9123982"/>
<meta property="place:location:longitude" content="-117.1154122"/>
<meta property="business:contact_data:street_address" content="Archblu Ventures Ltd P. O. Box 33789-00100 Nairobi, Kenya"/>
<meta property="business:contact_data:locality" content="Nairobi"/>
<meta property="business:contact_data:country_name" content="Kenya (US)"/>
<meta property="business:contact_data:postal_code" content="6341-00100"/>
<meta property="business:contact_data:website" content="https://archbluventuresltd.com/"/>
<meta property="business:contact_data:region" content="Nairobi"/>
<meta property="business:contact_data:email" content="info@archbluventuresltd.com"/>
<meta property="business:contact_data:phone_number" content="+254 777 816458"/>
<meta property="og:title" content="Arch Blu Ventures" />
<meta property="og:description" content="Archblu Ventures is the leading copper producer with offices domiciled in Zambia, Democratic Republic of Congo, Tanzania and Headquarters in Nairobi, Kenya." />
<meta property="og:url" content="https://archbluventuresltd.com/" />
<meta property="og:site_name" content="ArchBlu Ventures" />
<meta property="og:image" content="https://archbluventuresltd.com/assets/img/logo.png" />
<meta property="og:image:secure_url" content="https://archbluventuresltd.com/assets/img/logo.png" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="Archblu Ventures is the leading copper producer with offices domiciled in Zambia, Democratic Republic of Congo, Tanzania and Headquarters in Nairobi, Kenya." />
<meta name="twitter:title" content="ArchBlu Ventures" />
<meta name="twitter:site" content="@ArchBluVentures" />
<meta name="twitter:image" content="https://archbluventuresltd.com/assets/img/logo.png" />
<meta name="twitter:creator" content="@erickohaga" />

  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">


  <script
    nonce="a51318f3-15ec-48be-b608-17d7069699cf">(function (w, d) { !function (a, e, t, r) { a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = { deferred: [] }, a.zaraz.q = [], a.zaraz._f = function (e) { return function () { var t = Array.prototype.slice.call(arguments); a.zaraz.q.push({ m: e, a: t }) } }; for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e); a.addEventListener("DOMContentLoaded", (() => { var t = e.getElementsByTagName(r)[0], z = e.createElement(r), n = e.getElementsByTagName("title")[0]; for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.zarazData.q = []; a.zaraz.q.length;) { const e = a.zaraz.q.shift(); a.zarazData.q.push(e) } z.defer = !0, z.referrerPolicy = "origin", z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t) })) }(w, d, 0, "script"); })(window, document);</script>
    <style>/*<![CDATA[*/
#google_translate_element{padding: 0;position: absolute;right: 22px;top: 22px;}
/* .goog-te-banner-frame.skiptranslate,.goog-te-gadget-simple img,img.goog-te-gadget-icon,.goog-te-menu-value span{display:none!important} */
.goog-te-menu-frame{box-shadow:none!important}
/* .goog-te-gadget-simple{background-color:transparent!important;background:url("./images/trans.png") center / 12px no-repeat;-webkit-transition:all .2s ease;transition:all .2s ease;background-size: 20px 20px;display:inline-block;font-weight:400;line-height: 1.8;padding:0 6px;text-align:center;white-space:nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select: none;-moz-user-select:none;-ms-user-select:none;user-select:none;border-left:none!important;border-top:none!important;border-bottom:none!important;border-right:none!important;border-radius: 4px} */

 /*]]>*/</style>

<script>/*<![CDATA[*/
(function(){var gtConstEvalStartTime = new Date();
var c="Translate",g=this||self;function h(a,b){a=a.split(".");var d=g;a[0]in d||"undefined"==typeof d.execScript||d.execScript("var "+a[0]);for(var e;a.length&&(e=a.shift());)a.length||void 0===b?d[e]&&d[e]!==Object.prototype[e]?d=d[e]:d=d[e]={}:d[e]=b}
function k(a,b){function d(){}d.prototype=b.prototype;a.ka=b.prototype;a.prototype=new d;a.prototype.constructor=a;a.ja=function(e,f,v){for(var w=Array(arguments.length-2),n=2;n<arguments.length;n++)w[n-2]=arguments[n];return b.prototype[f].apply(e,w)}}function l(a){return a};function m(){return"[msg_undefined]"}var p={};
(function(){if(void 0==window.CLOSURE_DEFINES||window.CLOSURE_DEFINES["te.msg.EMBED_MESSAGES"]){p={Y:function(){return MSG_TRANSLATE},m:function(){return MSG_CANCEL},s:function(){return MSG_CLOSE},K:function(){return MSGFUNC_PAGE_TRANSLATED_TO},Z:function(){return MSGFUNC_TRANSLATED_TO},B:function(){return MSG_GENERAL_ERROR},D:function(){return MSG_LANGUAGE_UNSUPPORTED},F:function(){return MSG_LEARN_MORE},L:function(){return MSGFUNC_POWERED_BY},ba:function(){return MSG_TRANSLATE_PRODUCT_NAME},da:function(){return MSG_TRANSLATION_IN_PROGRESS},
aa:function(){return MSGFUNC_TRANSLATE_PAGE_TO},ia:function(){return MSGFUNC_VIEW_PAGE_IN},M:function(){return MSG_RESTORE},U:function(){return MSG_SSL_INFO_LOCAL_FILE},V:function(){return MSG_SSL_INFO_SECURE_PAGE},T:function(){return MSG_SSL_INFO_INTRANET_PAGE},N:function(){return MSG_SELECT_LANGUAGE},fa:function(){return MSGFUNC_TURN_OFF_TRANSLATION},ea:function(){return MSGFUNC_TURN_OFF_FOR},l:function(){return MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER},I:function(){return MSG_ORIGINAL_TEXT},J:function(){return MSG_ORIGINAL_TEXT_NO_COLON},
A:function(){return MSG_FILL_SUGGESTION},W:function(){return MSG_SUBMIT_SUGGESTION},S:function(){return MSG_SHOW_TRANSLATE_ALL},R:function(){return MSG_SHOW_RESTORE_ALL},O:function(){return MSG_SHOW_CANCEL_ALL},ca:function(){return MSG_TRANSLATE_TO_MY_LANGUAGE},$:function(){return MSGFUNC_TRANSLATE_EVERYTHING_TO},P:function(){return MSG_SHOW_ORIGINAL_LANGUAGES},H:function(){return MSG_OPTIONS},ga:function(){return MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE},G:function(){return MSG_MANAGE_TRANSLATION_FOR_THIS_SITE},
j:function(){return MSG_ALT_SUGGESTION},h:function(){return MSG_ALT_ACTIVITY_HELPER_TEXT},i:function(){return MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT},ha:function(){return MSG_USE_ALTERNATIVES},v:function(){return MSG_DRAG_TIP},o:function(){return MSG_CLICK_FOR_ALT},u:function(){return MSG_DRAG_INSTUCTIONS},X:function(){return MSG_SUGGESTION_SUBMITTED},C:function(){return MSG_LANGUAGE_TRANSLATE_WIDGET}};for(var a in p)if(p[a]!==Object.prototype[p[a]])try{p[a]=p[a].call(null)}catch(b){p[a]=m}}else a=
function(b){return function(){return b}},p={Y:a(0),m:a(1),s:a(2),K:a(3),Z:a(4),B:a(5),D:a(45),F:a(6),L:a(7),ba:a(8),da:a(9),aa:a(10),ia:a(11),M:a(12),U:a(13),V:a(14),T:a(15),N:a(16),fa:a(17),ea:a(18),l:a(19),I:a(20),A:a(21),W:a(22),S:a(23),R:a(24),O:a(25),ca:a(26),$:a(27),P:a(28),H:a(29),ga:a(30),j:a(32),h:a(33),ha:a(34),v:a(35),o:a(36),u:a(37),X:a(38),G:a(39),i:a(40),J:a(41),C:a(46)}})();var q={},MSG_TRANSLATE=c;q[0]=MSG_TRANSLATE;var MSG_CANCEL="Cancel";q[1]=MSG_CANCEL;var MSG_CLOSE="Close";q[2]=MSG_CLOSE;function MSGFUNC_PAGE_TRANSLATED_TO(a){return"Google has automatically translated this page to: "+a}q[3]=MSGFUNC_PAGE_TRANSLATED_TO;function MSGFUNC_TRANSLATED_TO(a){return"Translated to: "+a}q[4]=MSGFUNC_TRANSLATED_TO;var MSG_GENERAL_ERROR="Error: The server could not complete your request. Try again later.";q[5]=MSG_GENERAL_ERROR;var MSG_LEARN_MORE="Learn more";q[6]=MSG_LEARN_MORE;
function MSGFUNC_POWERED_BY(a){return"Powered by "+a}q[7]=MSGFUNC_POWERED_BY;var MSG_TRANSLATE_PRODUCT_NAME=c;q[8]=MSG_TRANSLATE_PRODUCT_NAME;var MSG_TRANSLATION_IN_PROGRESS="Translation in progress";q[9]=MSG_TRANSLATION_IN_PROGRESS;function MSGFUNC_TRANSLATE_PAGE_TO(a){return"Translate this page to: "+(a+" using Google Translate?")}q[10]=MSGFUNC_TRANSLATE_PAGE_TO;function MSGFUNC_VIEW_PAGE_IN(a){return"View this page in: "+a}q[11]=MSGFUNC_VIEW_PAGE_IN;var MSG_RESTORE="Show original";q[12]=MSG_RESTORE;
var MSG_SSL_INFO_LOCAL_FILE="The content of this local file will be sent to Google for translation using a secure connection.";q[13]=MSG_SSL_INFO_LOCAL_FILE;var MSG_SSL_INFO_SECURE_PAGE="The content of this secure page will be sent to Google for translation using a secure connection.";q[14]=MSG_SSL_INFO_SECURE_PAGE;var MSG_SSL_INFO_INTRANET_PAGE="The content of this intranet page will be sent to Google for translation using a secure connection.";q[15]=MSG_SSL_INFO_INTRANET_PAGE;
var MSG_SELECT_LANGUAGE="Select Language";q[16]=MSG_SELECT_LANGUAGE;function MSGFUNC_TURN_OFF_TRANSLATION(a){return"Turn off "+(a+" translation")}q[17]=MSGFUNC_TURN_OFF_TRANSLATION;function MSGFUNC_TURN_OFF_FOR(a){return"Turn off for: "+a}q[18]=MSGFUNC_TURN_OFF_FOR;var MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER="Always hide";q[19]=MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER;var MSG_ORIGINAL_TEXT="Original text:";q[20]=MSG_ORIGINAL_TEXT;var MSG_FILL_SUGGESTION="Contribute a better translation";q[21]=MSG_FILL_SUGGESTION;
var MSG_SUBMIT_SUGGESTION="Contribute";q[22]=MSG_SUBMIT_SUGGESTION;var MSG_SHOW_TRANSLATE_ALL="Translate all";q[23]=MSG_SHOW_TRANSLATE_ALL;var MSG_SHOW_RESTORE_ALL="Restore all";q[24]=MSG_SHOW_RESTORE_ALL;var MSG_SHOW_CANCEL_ALL="Cancel all";q[25]=MSG_SHOW_CANCEL_ALL;var MSG_TRANSLATE_TO_MY_LANGUAGE="Translate sections to my language";q[26]=MSG_TRANSLATE_TO_MY_LANGUAGE;function MSGFUNC_TRANSLATE_EVERYTHING_TO(a){return"Translate everything to "+a}q[27]=MSGFUNC_TRANSLATE_EVERYTHING_TO;
var MSG_SHOW_ORIGINAL_LANGUAGES="Show original languages";q[28]=MSG_SHOW_ORIGINAL_LANGUAGES;var MSG_OPTIONS="Options";q[29]=MSG_OPTIONS;var MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE="Turn off translation for this site";q[30]=MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE;q[31]=null;var MSG_ALT_SUGGESTION="Show alternative translations";q[32]=MSG_ALT_SUGGESTION;var MSG_ALT_ACTIVITY_HELPER_TEXT="Click on words above to get alternative translations";q[33]=MSG_ALT_ACTIVITY_HELPER_TEXT;var MSG_USE_ALTERNATIVES="Use";
q[34]=MSG_USE_ALTERNATIVES;var MSG_DRAG_TIP="Drag with shift key to reorder";q[35]=MSG_DRAG_TIP;var MSG_CLICK_FOR_ALT="Click for alternative translations";q[36]=MSG_CLICK_FOR_ALT;var MSG_DRAG_INSTUCTIONS="Hold down the shift key, click, and drag the words above to reorder.";q[37]=MSG_DRAG_INSTUCTIONS;var MSG_SUGGESTION_SUBMITTED="Thank you for contributing your translation suggestion to Google Translate.";q[38]=MSG_SUGGESTION_SUBMITTED;var MSG_MANAGE_TRANSLATION_FOR_THIS_SITE="Manage translation for this site";
q[39]=MSG_MANAGE_TRANSLATION_FOR_THIS_SITE;var MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT="Click a word for alternative translations, or double-click to edit directly";q[40]=MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT;var MSG_ORIGINAL_TEXT_NO_COLON="Original text";q[41]=MSG_ORIGINAL_TEXT_NO_COLON;q[42]=c;q[43]=c;q[44]="Your correction has been submitted.";var MSG_LANGUAGE_UNSUPPORTED="Error: The language of the webpage is not supported.";q[45]=MSG_LANGUAGE_UNSUPPORTED;
var MSG_LANGUAGE_TRANSLATE_WIDGET="Language Translate Widget";q[46]=MSG_LANGUAGE_TRANSLATE_WIDGET;function r(a){if(Error.captureStackTrace)Error.captureStackTrace(this,r);else{var b=Error().stack;b&&(this.stack=b)}a&&(this.message=String(a))}k(r,Error);r.prototype.name="CustomError";function t(a,b){a=a.split("%s");for(var d="",e=a.length-1,f=0;f<e;f++)d+=a[f]+(f<b.length?b[f]:"%s");r.call(this,d+a[e])}k(t,r);t.prototype.name="AssertionError";function u(a,b){throw new t("Failure"+(a?": "+a:""),Array.prototype.slice.call(arguments,1));};var x;function y(a,b){this.g=b===z?a:""}y.prototype.toString=function(){return this.g+""};var z={};function _exportMessages(){h("google.translate.m",q)}function A(a){var b=document.getElementsByTagName("head")[0];b||(b=document.body.parentNode.appendChild(document.createElement("head")));b.appendChild(a)}
function _loadJs(a){var b=document;var d="SCRIPT";"application/xhtml+xml"===b.contentType&&(d=d.toLowerCase());d=b.createElement(d);d.type="text/javascript";d.charset="UTF-8";if(void 0===x){b=null;var e=g.trustedTypes;if(e&&e.createPolicy){try{b=e.createPolicy("goog#html",{createHTML:l,createScript:l,createScriptURL:l})}catch(v){g.console&&g.console.error(v.message)}x=b}else x=b}a=(b=x)?b.createScriptURL(a):a;a=new y(a,z);a instanceof y&&a.constructor===y?a=a.g:(b=typeof a,u("expected object of type TrustedResourceUrl, got '"+
a+"' of type "+("object"!=b?b:a?Array.isArray(a)?"array":b:"null")),a="type_error:TrustedResourceUrl");d.src=a;var f;a=(d.ownerDocument&&d.ownerDocument.defaultView||window).document;(f=(a=null===(f=a.querySelector)||void 0===f?void 0:f.call(a,"script[nonce]"))?a.nonce||a.getAttribute("nonce")||"":"")&&d.setAttribute("nonce",f);A(d)}function _loadCss(a){var b=document.createElement("link");b.type="text/css";b.rel="stylesheet";b.charset="UTF-8";b.href=a;A(b)}
function _isNS(a){a=a.split(".");for(var b=window,d=0;d<a.length;++d)if(!(b=b[a[d]]))return!1;return!0}function _setupNS(a){a=a.split(".");for(var b=window,d=0;d<a.length;++d)b.hasOwnProperty?b.hasOwnProperty(a[d])?b=b[a[d]]:b=b[a[d]]={}:b=b[a[d]]||(b[a[d]]={});return b}h("_exportMessages",_exportMessages);h("_loadJs",_loadJs);h("_loadCss",_loadCss);h("_isNS",_isNS);h("_setupNS",_setupNS);
window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en-GB';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='450465.1037093230';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main_en-GB.js');})();})();
function googleTranslateElementInit(){new google.translate.TranslateElement({pageLanguage:'vi',includedLanguages:'en,en-GB,id,en-US,vi,ru,ko,ja,it,hi,bn,fr,es,de,ar,tr,zh-CN,sw,',layout:google.translate.TranslateElement.InlineLayout.SIMPLE},'google_translate_element')}$(".hover").mouseleave(function (){$(this).removeClass("hover")});
/*]]>*/
</script>
  
  </head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap" id="home-section">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center position-relative">
          <div class="site-logo">
            <!-- <img src="./images/logo.png" style="width: 9%;" alt="ArchBlu logo"> -->
            <a href="index.php" class=""><span class=""><img src="./images/logo.png" style="width: 72px;" alt="ArchBlu logo"></a>
          </div>
          <div class="col-12">
            <nav class="site-navigation text-center " role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#investors-section" class="nav-link">What we do</a></li>
                <li><a href="#about-section" class="nav-link">Who we are</a></li>
                <li><a href="#press-section" class="nav-link">Products</a></li>
                <li><a href="#blog-section" class="nav-link">Sustainability</a></li>
                <li><a href="#testimonials-section" class="nav-link">Gallery</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="toggle-button align-items-center d-flex">
            <!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Get Quote</a> -->
            <a href="#" class="site-menu-toggle p-5 js-menu-toggle text-black d-inline-block d-lg-none d-flex"><span
                class="icon-menu h3 m-0"></span></a>
          </div>
        </div>
      </div>
      
      <div id='google_translate_element'/>
    </header>
    <div class="owl-carousel slide-one-item">
      <div class="site-section-cover overlay img-bg-section"
        style="background-image:url(images/xhero_1.jpg)">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-7">
              <h1>welcome to Archblu Ventures</h1>
              <p>World’s leading copper & allied mineral traders.</p>
              <p><a href="#contact-section" class="btn btn-outline-primary border-w-2 btn-md">Get in touch</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="site-section-cover overlay img-bg-section"
        style="background-image:url(images/xhero_2.jpg)">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-7">
              <h1>welcome to Archblu Ventures</h1>
              <p>World’s leading copper & allied mineral traders.</p>
              <p><a href="#contact-section" class="btn btn-outline-primary border-w-2 btn-md">Get in touch</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section block__73694" id="investors-section">
      <div class="container-fluid">
        <div class="row d-flex no-gutters align-items-stretch">
          <div class="col-6 col-lg-3 block__73422"
            style="background-image:url(images/xhero_2.jpg)">
          </div>
          <div class="col-6 col-lg-3 block__73422"
            style="background-image:url(images/xhero_1.jpg)">
          </div>
          <div class="col-lg-6 p-lg-5 mt-4 mt-lg-0">
            <h2 class="mb-3 text-black">25 Long Years Of Manufacturing & Trade Excellence With Quality At It’s Best!
            </h2>
            <p class="lead">Archblu Ventures is the leading copper producer with offices domiciled in Zambia, Democratic
              Republic of Congo, Tanzania and Headquarters in Nairobi, Kenya. Our underground mines and open pit mines
              complemented with metallurgical plants produces the highest-grade copper seams in the world.</p>
            <p class="lead">Our Products</p>
            <div class="row mt-3">
              <div class="col-lg-6">
                <ul class="ul-check primary list-unstyled">
                  <li>Cobalt Concetrate</li>
                  <li>Copper Concetrate</li>
                  <li>Tantalite/Coltan</li>
                  <li>Electro Copper Cathodes</li>
                  <li>Copper Wire</li>
                  <br />
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-primary" id="about-section">
      <div class="container">
        <div class="row justify-content-center mb-4 block-img-video-1-wrap">
          <div class="col-md-12 mb-5">
            <figure class="block-img-video-1" data-aos="fade">
              <a href="https://vimeo.com/45830194" class="popup-vimeo">
                <span class="icon"><span class="icon-play"></span></span>
                <script data-pagespeed-no-defer>//<![CDATA[
                  (function () {
                    for (var g = "function" == typeof Object.defineProperties ? Object.defineProperty : function (b, c, a) { if (a.get || a.set) throw new TypeError("ES3 does not support getters and setters."); b != Array.prototype && b != Object.prototype && (b[c] = a.value) }, h = "undefined" != typeof window && window === this ? this : "undefined" != typeof global && null != global ? global : this, k = ["String", "prototype", "repeat"], l = 0; l < k.length - 1; l++) { var m = k[l]; m in h || (h[m] = {}); h = h[m] }
                    var n = k[k.length - 1], p = h[n], q = p ? p : function (b) { var c; if (null == this) throw new TypeError("The 'this' value for String.prototype.repeat must not be null or undefined"); c = this + ""; if (0 > b || 1342177279 < b) throw new RangeError("Invalid count value"); b |= 0; for (var a = ""; b;)if (b & 1 && (a += c), b >>>= 1) c += c; return a }; q != p && null != q && g(h, n, { configurable: !0, writable: !0, value: q }); var t = this;
                    function u(b, c) { var a = b.split("."), d = t; a[0] in d || !d.execScript || d.execScript("var " + a[0]); for (var e; a.length && (e = a.shift());)a.length || void 0 === c ? d[e] ? d = d[e] : d = d[e] = {} : d[e] = c }; function v(b) { var c = b.length; if (0 < c) { for (var a = Array(c), d = 0; d < c; d++)a[d] = b[d]; return a } return [] }; function w(b) { var c = window; if (c.addEventListener) c.addEventListener("load", b, !1); else if (c.attachEvent) c.attachEvent("onload", b); else { var a = c.onload; c.onload = function () { b.call(this); a && a.call(this) } } }; var x; function y(b, c, a, d, e) { this.h = b; this.j = c; this.l = a; this.f = e; this.g = { height: window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight, width: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth }; this.i = d; this.b = {}; this.a = []; this.c = {} }
                    function z(b, c) {
                      var a, d, e = c.getAttribute("data-pagespeed-url-hash"); if (a = e && !(e in b.c)) if (0 >= c.offsetWidth && 0 >= c.offsetHeight) a = !1; else { d = c.getBoundingClientRect(); var f = document.body; a = d.top + ("pageYOffset" in window ? window.pageYOffset : (document.documentElement || f.parentNode || f).scrollTop); d = d.left + ("pageXOffset" in window ? window.pageXOffset : (document.documentElement || f.parentNode || f).scrollLeft); f = a.toString() + "," + d; b.b.hasOwnProperty(f) ? a = !1 : (b.b[f] = !0, a = a <= b.g.height && d <= b.g.width) } a && (b.a.push(e),
                        b.c[e] = !0)
                    } y.prototype.checkImageForCriticality = function (b) { b.getBoundingClientRect && z(this, b) }; u("pagespeed.CriticalImages.checkImageForCriticality", function (b) { x.checkImageForCriticality(b) }); u("pagespeed.CriticalImages.checkCriticalImages", function () { A(x) });
                    function A(b) {
                      b.b = {}; for (var c = ["IMG", "INPUT"], a = [], d = 0; d < c.length; ++d)a = a.concat(v(document.getElementsByTagName(c[d]))); if (a.length && a[0].getBoundingClientRect) {
                        for (d = 0; c = a[d]; ++d)z(b, c); a = "oh=" + b.l; b.f && (a += "&n=" + b.f); if (c = !!b.a.length) for (a += "&ci=" + encodeURIComponent(b.a[0]), d = 1; d < b.a.length; ++d) { var e = "," + encodeURIComponent(b.a[d]); 131072 >= a.length + e.length && (a += e) } b.i && (e = "&rd=" + encodeURIComponent(JSON.stringify(B())), 131072 >= a.length + e.length && (a += e), c = !0); C = a; if (c) {
                          d = b.h; b = b.j; var f; if (window.XMLHttpRequest) f =
                            new XMLHttpRequest; else if (window.ActiveXObject) try { f = new ActiveXObject("Msxml2.XMLHTTP") } catch (r) { try { f = new ActiveXObject("Microsoft.XMLHTTP") } catch (D) { } } f && (f.open("POST", d + (-1 == d.indexOf("?") ? "?" : "&") + "url=" + encodeURIComponent(b)), f.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), f.send(a))
                        }
                      }
                    }
                    function B() { var b = {}, c; c = document.getElementsByTagName("IMG"); if (!c.length) return {}; var a = c[0]; if (!("naturalWidth" in a && "naturalHeight" in a)) return {}; for (var d = 0; a = c[d]; ++d) { var e = a.getAttribute("data-pagespeed-url-hash"); e && (!(e in b) && 0 < a.width && 0 < a.height && 0 < a.naturalWidth && 0 < a.naturalHeight || e in b && a.width >= b[e].o && a.height >= b[e].m) && (b[e] = { rw: a.width, rh: a.height, ow: a.naturalWidth, oh: a.naturalHeight }) } return b } var C = ""; u("pagespeed.CriticalImages.getBeaconData", function () { return C });
                    u("pagespeed.CriticalImages.Run", function (b, c, a, d, e, f) { var r = new y(b, c, a, e, f); x = r; d && w(function () { window.setTimeout(function () { A(r) }, 0) }) });
                  })();

                  pagespeed.CriticalImages.Run('/mod_pagespeed_beacon', 'https://preview..com/theme/miners/', '-ilGEe-FWC', true, false, 'n9iKxNK46FI');
//]]></script><img src="images/xhero_1.jpg" alt="Image" class="img-fluid"
                  data-pagespeed-url-hash="522235998" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </a>
            </figure>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                <div class="block-counter-1">
                  <p>Numbers Speak For Themselves</p>
                </div>
              </div>
              <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                <div class="block-counter-1">
                  <span class="number"><span data-number="150">0</span></span>
                  <span class="caption">Products</span>
                </div>
              </div>
              <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                <div class="block-counter-1">
                  <span class="number"><span data-number="15">0</span></span>
                  <span class="caption">Year of Experience</span>
                </div>
              </div>
              <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                <div class="block-counter-1">
                  <span class="number"><span data-number="250">0</span></span>
                  <span class="caption">Completed</span>
                </div>
              </div>             
            </div>
          </div>
          <div class="col-lg-0">
            <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
              <div class="block-counter-1">
            <span class="caption">Since 1995, Our Team Has Succeeded In Understanding The Needs Of The Industry And Creating Reliable Products To Serve Them All.</span>
            <span class="caption">“Over the last 15 years, we have worked towards making our company the biggest and best in Copper Mining in Africa. We have strived to ensure that we have the latest technologies in mining world-over.”</span>

          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section" id="team-section">
      <!-- <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <div class="block-heading-1">
              <h2>Our Leadership</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
            <div class="block-team-member-1 text-center rounded">
              <figure>
                <img src="images/xperson_2.jpg" alt="Image" alt="Image"
                  class="img-fluid rounded-circle" data-pagespeed-url-hash="3098643685"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure>
              <h3 class="font-size-20 text-black">Mr. Bharath Singh Bhatia </h3>
              <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">CEO</span>
              <p class="px-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, repellat. At,
                soluta. Repellendus vero, consequuntur!</p>
              <div class="block-social-1">
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-facebook"></span></a>
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-twitter"></span></a>
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="block-team-member-1 text-center rounded">
              <figure>
                <img src="images/xperson_1.jpg.pagespeed.ic.ycc-Edwyd1.webp"
                  class="img-fluid rounded-circle" data-pagespeed-url-hash="3393143606"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure>
              <h3 class="font-size-20 text-black">Bob Carry</h3>
              <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Project Manager</span>
              <p class="px-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil quia veritatis, nam
                quam obcaecati fuga.</p>
              <div class="block-social-1">
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-facebook"></span></a>
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-twitter"></span></a>
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="block-team-member-1 text-center rounded">
              <figure>
                <img src="images/xperson_3.jpg.pagespeed.ic.cOJUXL1PUR.webp" alt="Image"
                  class="img-fluid rounded-circle" data-pagespeed-url-hash="3687643527"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure>
              <h3 class="font-size-20 text-black">Ricky Fisher</h3>
              <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Engineer</span>
              <p class="px-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quidem, laudantium,
                illum minus numquam voluptas?</p>
              <div class="block-social-1">
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-facebook"></span></a>
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-twitter"></span></a>
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span
                    class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
    <div class="site-section" id="press-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="block-heading-1">
              <span>Copper products</span>
              <h2>Products</h2>
            </div>
          </div>
          <div class="col-lg-8">
            <ul class="list-unstyled">
            <li class="mb-4">
                <h2 class="h4"><a href="https://en.wikipedia.org/wiki/Cobalt" target="_blank" class="text-black">Cobalt Concetrate</a></h2>
                <!-- <span class="d-block text-secondary">Apr 19, 2019</span> -->
                <p>1.Commodity: Cobalt Concentrate<br />
                    2.Purity: 32% +<br />
                    3.Quantity:200MT<br />
                    4.Price: $8500 per ton<br />
                    5.Location: Zambia.<br />
                    6.Condition: FOB</p>
              </li>
              <li class="mb-4">
                <h2 class="h4"><a href="https://en.wikipedia.org/wiki/Talk%3ACopper_concentrate" target="_blank" class="text-black">Copper Concetrate</a></h2>
                <!-- <span class="d-block text-secondary">Apr 19, 2019</span> -->
                <p>1. Commodity: Copper concentrate<br />
                    2. Purity: 38% +<br />
                    3. Quantity : 2000Mt<br />
                    4. Price: $1850 per ton<br />
                    5: Location: Zambia<br />
                    6: Condition: FOB </p>
              </li>
              <li class="mb-4">
                <h2 class="h4"><a href="https://en.wikipedia.org/wiki/Tantalite" target="_blank" class="text-black">Tantalite/Coltan</a></h2>
                <!-- <span class="d-block text-secondary">Apr 19, 2019</span> -->
                <p>1.Commodity: Coltan<br />
                    2.Purity: 32% +<br />
                    3.Price: $60per kg<br />
                    4.Location :Uganda<br />
                    5.Quantity : 60ton<br />
                    6.Condition : CIF/FOB</p>
              </li>
              <li class="mb-4">
                <h2 class="h4"><a href="https://en.wikipedia.org/wiki/Cathode" target="_blank" class="text-black">Electro Copper Cathodes</a></h2>
                <!-- <span class="d-block text-secondary">Apr 19, 2019</span> -->
                <p>1.Specification : Electro Copper Cathodes<br />
                  2.Type/Grade = Plates “A”<br />
                  3.Purity: 99.99%<br />
                  4.Weight of each sheet: 117kgs +/- 2%<br />
                  5.Net weight of each pallet: 2.5M/T +/-2%<br />
                  6.Analyzed as per Report of Analysis made by the Seller for each respective partial
                  shipment<<br />
                  7.Not oxidized fresh production<br />
                  8.Gross weight of each container: 22.2 M/T approx.<br />
                  9.Stuffed freely into 20 tons FCL (Full Container Load)<br /><br />
                  
                  Quantity : Electro Copper Cathodes = DRC 20,000 metric tons to be delivered in single lot consignment during the course of the year 2022.  </p>
              </li>
              <li class="mb-4">
                <h2 class="h4"><a href="https://simple.wikipedia.org/wiki/Copper_wire_and_cable" target="_blank" class="text-black">Copper Wire</a></h2>
                <!-- <span class="d-block text-secondary">Apr 19, 2019</span> -->
                <p>1.Specification: Copper Wire<br />
                  2.Type/Grade: Bales “A” Purity 99.99%<br />
                  3.Weight of each Bale: 100kgs +/- 2% Net weight of each bale</p>
              </li>              
            </ul>
          </div>
        </div>
      </div>
    </div>    
    <div class="site-section" id="blog-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="block-heading-1">
              <span>SUSTAINABILITY</span>
              <h2>SUSTAINABILITY</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div>
              <a href="single.html" class="mb-4 d-block"><img src="images/xhero_2.jpg"
                  alt="Image" class="img-fluid rounded" data-pagespeed-url-hash="816735919"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
              <h2><a href="single.html">Our people</a></h2>
              <!-- <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a
                  href="single.html" class="by">James Cooper</a></p> -->
              <p>Our people are fundamental to our success and growth and at the heart of everything we do. We foster an environment where we support and encourage different backgrounds, cultures and beliefs. We create a fair and inclusive working environment where everyone can develop and fulfil their potential.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div>
              <a href="single.html" class="mb-4 d-block"><img src="images/xhero_3.jpg"
                  alt="Image" class="img-fluid rounded" data-pagespeed-url-hash="1111235840"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
              <h2><a href="single.html">Community Development</a></h2>
              <!-- <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a
                  href="single.html" class="by">James Cooper</a></p> -->
              <p>KCC Community Development Programmes (CDPs) are an integral part of our community and engagement strategies to foster resilient socio-economic communities. </p>
                <p>We actively build respectful relationships with our neighbouring communities. We communicate openly with local community stakeholders to understand and address their concerns, and actively contribute to activities and programmes designed to improve the quality of life and sustainability of the livelihoods within our communities.</p>
                <p>Our company has contributed to the DRC economy since the beginning of its operations by investing heavily and supporting the National Development Strategy with a focus on health care, sustainable livelihoods, education and infrastructure.</p>
              </div>
          </div>
          <div class="col-lg-6">
            <div>
              <a href="single.html" class="mb-4 d-block"><img src="images/xhero_4.jpg"
                  alt="Image" class="img-fluid rounded" data-pagespeed-url-hash="1111235840"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
              <h2><a href="single.html">Education</a></h2>
              <!-- <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a
                  href="single.html" class="by">James Cooper</a></p> -->
              <p>We invest in improving education in the communities surrounding our operations through:<br />

                building new schools and academic institutions, and rehabilitating others<br />
                donating teaching materials and equipment <br />
                supporting teacher development programmes.</p>
                <p>We support vocational training for community members through courses that include boiler making, machine driving, auto mechanics, air conditioning and tailoring.</p>
                <p>Every year since 2016, KCC has supported summer camp activities for children, by providing learning materials and toys, daily meals, as well as school kits to facilitate the start of the school year. Thanks to this initiative, thousands of children have been given a safe place to learn and to grow.</p>
              </div>
          </div>
          <div class="col-lg-6">
            <div>
              <a href="single.html" class="mb-4 d-block"><img src="images/xhero_5.jpg"
                  alt="Image" class="img-fluid rounded" data-pagespeed-url-hash="1111235840"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
              <h2><a href="single.html">Health and safety</a></h2>
              <!-- <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a
                  href="single.html" class="by">James Cooper</a></p> -->
              <p>Health</p>
                <p>We collaborate with local health stakeholders to assess the health conditions of an area and implement strategies to address the major health risks and concerns faced by the community. We are active in the construction of new – and rehabilitation of existing – health facilities, training of local medical staff, health awareness initiatives in communities, periodic medicine donations and assistance with vaccination campaigns in urban and rural areas.</p>
                <p>We also have a state-of-the-art medical facility, Watu Wetu, which provides healthcare services to over 60,000 people in the region and is recognised as a leading provider of medical services.</p>
                <p>Safety</p>
                <p>In line with our company values, our priority in the workplace is to protect the health and wellbeing of all our people. </p>
                <p>We are committed to operating safely and believe all fatalities, occupational diseases and injuries at work are preventable.</p>
                <p>The KCC Health and Safety programme focuses on identifying and managing hazards in the workplace and is based on the Glencore SafeWork programme which aims to provide everyone with the knowledge and tools to perform every task safely; the key message is that every individual has the authority to stop unsafe work.</p>
                <p>Consequently, at KCC we believe that every employee and contractor has the time to do every job safely, and they are empowered by our Managing Director to stop any work they deem unsafe.</p>
              </div>
          </div>
          <div class="col-lg-6">
            <div>
              <a href="single.html" class="mb-4 d-block"><img src="images/xhero_6.jpg"
                  alt="Image" class="img-fluid rounded" data-pagespeed-url-hash="1111235840"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
              <h2><a href="single.html">Caring for our Environment</a></h2>
              <!-- <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a
                  href="single.html" class="by">James Cooper</a></p> -->
              <p>We recognise our role as a custodian of the environment and are committed to identifying opportunities to reduce our environmental footprint. We protect and conserve land, water, biodiversity and energy sources and have built our environmental policy from a foundation of compliance with the legal, regulatory and core requirements of the DRC, along with the world class practices used at other Glencore mining assets. The mine operates with hydropower and, through this, we reduce our carbon footprint.</p>
                <p>We have implemented a comprehensive environmental monitoring programme which covers surface water, groundwater, dust, air quality and noise. This monitoring, along with assessments of our flora and fauna habitats, is carried out on a regular basis and at various locations in and around KCC's operations.</p>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
      <div class="container">
        <div class="text-center mb-5">
          <div class="block-heading-1">
            <span>GALLERY</span>
            <h2>Gallery</h2>
          </div>
        </div>
        <div class="owl-carousel nonloop-block-13">
          <div>
            <div class="block-testimony-1 text-center">
              <!-- <blockquote class="mb-4">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente
                  voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores
                  cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
              </blockquote> -->
              <img src="images/xperson_1.jpg" alt="Image"
                  class="img-fluid mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              <!-- <figure>
                <img src="images/xperson_4.jpg.pagespeed.ic.X36VI035mo.webp" alt="Image"
                  class="img-fluid rounded-circle mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure> -->
              <h3 class="font-size-20 text-black">COBALT CONCERTRATE</h3>
            </div>
          </div>
          <div>
            <div class="block-testimony-1 text-center">
              <!-- <blockquote class="mb-4">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente
                  voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores
                  cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
              </blockquote> -->
              <img src="images/xperson_5.jpg" alt="Image"
                  class="img-fluid mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              <!-- <figure>
                <img src="images/xperson_4.jpg.pagespeed.ic.X36VI035mo.webp" alt="Image"
                  class="img-fluid rounded-circle mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure> -->
              <h3 class="font-size-20 text-black">COPPER CONCERTRATE</h3>
            </div>
          </div>
          <div>
            <div class="block-testimony-1 text-center">
              <!-- <blockquote class="mb-4">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente
                  voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores
                  cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
              </blockquote> -->
              <img src="images/xperson_2.jpg" alt="Image"
                  class="img-fluid mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              <!-- <figure>
                <img src="images/xperson_4.jpg.pagespeed.ic.X36VI035mo.webp" alt="Image"
                  class="img-fluid rounded-circle mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure> -->
              <h3 class="font-size-20 text-black">Tantalite</h3>
            </div>
          </div>
          <div>
            <div class="block-testimony-1 text-center">
              <!-- <blockquote class="mb-4">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente
                  voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores
                  cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
              </blockquote> -->
              <img src="images/xperson_4.jpg" alt="Image"
                  class="img-fluid mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              <!-- <figure>
                <img src="images/xperson_4.jpg.pagespeed.ic.X36VI035mo.webp" alt="Image"
                  class="img-fluid rounded-circle mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure> -->
              <h3 class="font-size-20 text-black">Electro Copper Cathodes</h3>
            </div>
          </div>
          <div>
            <div class="block-testimony-1 text-center">
              <!-- <blockquote class="mb-4">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente
                  voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores
                  cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
              </blockquote> -->
              <img src="images/xperson_5.jpg" alt="Image"
                  class="img-fluid mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              <!-- <figure>
                <img src="images/xperson_4.jpg.pagespeed.ic.X36VI035mo.webp" alt="Image"
                  class="img-fluid rounded-circle mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure> -->
              <h3 class="font-size-20 text-black">Electro Copper Cathodes</h3>
            </div>
          </div>
          <div>
            <div class="block-testimony-1 text-center">
              <!-- <blockquote class="mb-4">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente
                  voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores
                  cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
              </blockquote> -->
              <img src="images/tantalite.jpeg" alt="Image"
                  class="img-fluid mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              <!-- <figure>
                <img src="images/xperson_4.jpg.pagespeed.ic.X36VI035mo.webp" alt="Image"
                  class="img-fluid rounded-circle mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure> -->
              <h3 class="font-size-20 text-black">Tantalite</h3>
            </div>
          </div>
          <div>
            <div class="block-testimony-1 text-center">
              <!-- <blockquote class="mb-4">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente
                  voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores
                  cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
              </blockquote> -->
              <img src="images/coppermill.jpg" alt="Image"
                  class="img-fluid mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              <!-- <figure>
                <img src="images/xperson_4.jpg.pagespeed.ic.X36VI035mo.webp" alt="Image"
                  class="img-fluid rounded-circle mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure> -->
              <h3 class="font-size-20 text-black">Copper Wire</h3>
            </div>
          </div>
          <div>
            <div class="block-testimony-1 text-center">
              <!-- <blockquote class="mb-4">
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente
                  voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores
                  cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
              </blockquote> -->
              <img src="images/cobalt.jpg" alt="Image"
                  class="img-fluid mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              <!-- <figure>
                <img src="images/xperson_4.jpg.pagespeed.ic.X36VI035mo.webp" alt="Image"
                  class="img-fluid rounded-circle mx-auto" data-pagespeed-url-hash="3982143448"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </figure> -->
              <h3 class="font-size-20 text-black">Cobalt Concetrate</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="block-heading-1">
              <span>Get In Touch</span>
              <h2>Contact Us</h2>              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5">
          <?php  
                        $output;

                        if (isset($_GET['sent']) === true) {
                          echo '<div class="alert alert-success">
                                <h5>Thank you! for contacting us, Well get back to you soon!</h5></div>';
                        } else {

                          if(empty($errors) === false){
                            echo '<div class="alert alert-success"><ul>'; 
                            foreach($errors as $error) {
                                echo '<li>', $error, '</li>';
                            }
                            echo '</ul></div>';
                          }
                        
                     ?>
            <form action="#contact-section" method="POST" id="contactForm">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                <input type="text" name="namef" id="namef" <?php if (isset($_POST['namef']) === true) { echo 'value="', strip_tags($_POST['namef']) ,'"'; } ?> class="form-control" placeholder="Enter First Name"
                required>
                </div>
              <div class="col-md-6">
              <input type="text" name="names" id="names" <?php if (isset($_POST['names']) === true) { echo 'value="', strip_tags($_POST['names']) ,'"'; } ?> class="form-control" placeholder="Enter Second Name" required>
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                <input type="email" name="email" id="email" <?php if (isset($_POST['email']) === true) { echo 'value="', strip_tags($_POST['email']) ,'"'; } ?> class="form-control" placeholder="Enter E-Mail"
                                required>
                </div>
              </div>
              <style>
                .antispam { display:none;}
              </style>
              <div class="antispam">
                            <input type="text" name="url" id="email" class="form-control" />
                        </div>
              <div class="form-group row">
                <div class="col-md-12">
                <textarea name="message" id="message" rows="5" class="form-control"
                                placeholder="Write Your Message" required><?php if (isset($_POST['message']) === true) { echo strip_tags($_POST['message']); } ?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 ml-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message" id="sendBtn" name="submit">
                </div>
              </div>
            </form>
            <?php 
                        }
                        ?>
          </div>
          <div class="col-lg-4 ml-auto">
            <h2 class="text-black">NEED TO KNOW MORE? Call Us <a href="tel://+254777816458">+254 777 816458</a>
            </h2>
            <h2 class="text-black">INTERNATIONAL RELATIONS? Call Us <a href="tel://+254 721 764991">+254 721 764991</a>
            </h2>
            <h3>Archblu Ventures Ltd P. O. Box 33789-00100 Nairobi, Kenya</h3>
          </div>
        </div>
      </div>
    </div>
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8">
                <h2 class="footer-heading mb-4">About Us</h2>
                <<p>Our Mission<br />
                  We look into a future where Archblu Ventures will be at the helm of global copper industry; producing world class products leveraging mineral and human resources to enhance stakeholder value.</p>>
              </div>
              <!-- <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Press Releases</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div> -->
            </div>
          </div>
          <div class="col-md-4 ml-auto">
            <div class="mb-5">
              <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent"
                    placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                  </div>
                </div>
            </div>
            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a href="https://www.facebook.com/Nyundoodesigns" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>

                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
                with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://.com"
                  target="_blank">Nyun</a>

              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-black" id="exampleModalLabel">Get A Quote</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-5">
          <form action="#" method="post">
            <div class="form-group row">
              <div class="col-md-6 mb-4 mb-lg-0">
                <input type="text" class="form-control border" placeholder="First name">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control border" placeholder="First name">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <input type="text" class="form-control border" placeholder="Email address">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <textarea name="" id="" class="form-control border" placeholder="Write your message." cols="30"
                  rows="10"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6 ml-auto">
                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="./js/aos.js"></script>
  <script>eval(mod_pagespeed_Wxd9Gfiv42);</script>
  <script src="./js/owl.js"></script>
  <script>eval(mod_pagespeed_Wxd9Gfiv42);</script>
  <script>eval(mod_pagespeed_riPZtq6Ajk);</script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/popper.js"></script>
  <script>eval(mod_pagespeed_IINvS0M5eu);</script>
  <script>eval(mod_pagespeed_w6ewrw2Q95);</script>
  <script>eval(mod_pagespeed_ZpbZ_3LF7I);</script>
  <script>eval(mod_pagespeed_tXBiVFEMtz);</script>
  <script>eval(mod_pagespeed_2rzV9bHF2o);</script>
  <script src="./js/script.js"></script>
  <script>eval(mod_pagespeed_VorHSikDr4);</script>
  <script>eval(mod_pagespeed_KwReTUMd26);</script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
    integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
    data-cf-beacon='{"rayId":"701a287b9868cb73","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}'
    crossorigin="anonymous"></script>
</body>

</html>