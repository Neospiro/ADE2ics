<?php
$sous_titre[0]="Le convertisseur d'agenda pour les étudiants";
$sous_titre[1]="L'ADE parfait, sans ADE !";
$sous_titre[2]="Pour ne jamais être en retard !";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <!-- saved from url=(0025)http://www.techsmith.com/ -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans|Kreon:400|Yanone+Kaffeesatz:200' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="ade2ics.ico" type="image/x-icon" />
		<meta property="og:title" content="ADE2ics" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://ade2ics.neospiro.fr/" />
		<meta property="og:image" content="http://ade2ics.neospiro.fr/ade2ics.png" />
		<meta property="og:site_name" content="ADE2ics" />
		<meta property="fb:admins" content="100000815402809" />
		<meta property="og:description"
          content="Convertissez l'ADE en Google Agenda !"/>
        <title>ADE2ics</title>
        <style>
			*{
					margin : 0;
					padding : 0;
					color : inherit;
					font-family : inherit;
					font-size : inherit;
					border : 0px solid black;
					list-style:none;
				}
			body{
					color:#555;
					font-family: 'Kreon', serif;
			}
			label{
					display : block;
					width : 100%;
					position:relative;
					margin-bottom : 2px;
					margin-left : 10px;
				}
			label input{
					position:absolute;
					right:0;
					width: 80%;
					border-bottom : 1px dashed #99E;
					color:#888;
				}
			input[type=submit]{
					margin : 15px;
					padding : 2px;
					border-bottom:1px solid #000;
				}
			input[type=submit]:active{
					border-bottom:0;
					border-top:1px solid #000;
				}
			#header{
					font-size : 1.2em;
					border : 3px solid #FDD;
					border-left : 0;
					width : 500px;
					margin : 50px 0;
					padding : 10px;
					border-radius : 0 10px 0 0;
				}
			#h1{
					font-size : 1.5em;
					color:#000;
				}
			#header p{
					color:#F55;
				}

			fieldset{
					border : 3px solid #DDF;
					padding:20px;
					padding-bottom:0;
					width : 600px;
					margin : 50px;
					border-radius : 10px 0;
				}
			fieldset p{
					margin : 20px 10px;
					margin-top: 0;
					text-indent:30px;
			}
			legend{
					/*font-style:italic;*/
					font-weight : bold;
				}
			form, ul{
					margin: 20px 0;
				}
			li{
					text-indent : 20px;
					margin-bottom:10px;
			}
			li:before{
					content:"· ";
			}
			#param{
				font-family: 'Yanone Kaffeesatz', sans-serif;
				margin : 10px;
				width : 50%;
				}
			#param input{
					width: 50%;
				}
			li a{
					color:#D55;
					text-decoration:none;
				}
			
			li a:hover{
					color:#B77;
					text-decoration:underline;
				}
			.l{
				text-indent:50px;
			}
			.ade2ics{
				font-family: 'Josefin Sans', cursive;
			}
			.block{
				display:block;
				margin:auto;
			}
			.fleft{
				float:left;
			}
			.fright{
				float:right;
				margin:3px;
			}
        </style>
    </head>
    <body>
	<div id="fb-root"></div>
	<script>//Facebook page
	(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=250941184952220";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));//end FB page</script>
	<script type="text/javascript">
	window.google_analytics_uacct = "UA-20769656-3";
	</script>
    <div id="header"><h1><span class="ade2ics">ADE2ics</span></h1><p><?=$sous_titre[array_rand($sous_titre)]?></p></div>
	<div id="console">
		<fieldset id="co">
			<legend>Console</legend>
		</fieldset>
	</div>
	<div id="infozone">
		<fieldset>
			<legend>Bienvenue</legend>
			<p>Vous êtes au bon endroit pour convertir l'ADE en ICS !</p>
			<ul>
				<li><a href="#urlzone">Convertir une url</a></li>
				<li><a href="#videozone">Visionner la vidéo</a></li>
				<li><a href="#disquszone">Commentaires</a></li>
				<li><a href="#faqzone">F.A.Q</a></li>
				<li><a href="http://neospiro.fr/">Actualités NeoSpiro</a></li>
				<!--li><a href="#" id="searcher">Consulter la liste des ADE</a></li-->
			</ul>
		</fieldset>
		<fieldset>
			<legend>Comment l'utiliser ?</legend>
			<p>Pour utiliser <span class="ade2ics">ADE2ics</span>, collez une URL d'ADE, et on vous donne une URL d'ICS !</p><p>Vous pouvez ensuite : <ul>
			<li>Importer cette Url dans Google Agenda ! (<a href="#videozone">Video demonstrative</a>) C'est cette methode qui permet de recevoir des alertes SMS</li>
			<li>Importer le calendrier sur votre iPhone, Android, sur certains telephones ou sur votre application de gestion d'agenda (Outlook, etc)</li>
			</ul></p>
			<p>Normalement, ce script fonctionne pour tous les ADE. Néanmoins si vous avez un problème, n'hésitez pas a lire les <a href="#disquszone">commentaires</a> (ou je laisse des astuces ou des solutions) ou a <a href="http://neospiro.fr/#contact">me contacter</a> en spécifiant bien l'adresse que vous essayez de copier.</p>
		</fieldset>
		<fieldset>
			<legend>Pour les geek : comment ça marche ?</legend>
			<p>Ce script est composé de plein de petits scripts. Il y a le script php principal, qui s'occupe de se connecter sur l'ADE, d'en tirer les informations utiles et d'écrire un fichier ICS (ICal). Ce script inclut un système de cache contre les crash de l'ADE ! Réalisé par Marc-Antoine, amélioré par Cyril</p>
			<p>Un second script, l'URLparser, scanne l'url de l'ADE pour obtenir l'url de l'<span class="ade2ics">ADE2ics</span>. Il fonctionne en ajax (renvoie du JSON). Réalisé par Cyril</p>
			<p>Un troisième script (Le name_getter) vérifie l'agenda et vous aide à choisir le bon. Il a un petit problème avec certains ADE. Quand vous copiez une url ici, elle peut générer plusieurs agenda ICal en fonction des paramètres par l'URLparser. Le troisième script s'occupe de scanner l'ADE pour savoir quelles classes sont concernées par l'agenda ICal. Réalisé par Cyril</p>
		</fieldset>
		<fieldset>
			<legend>A propos</legend>
			
			<div class="fright" style="opacity:0.75"><a href="http://marcantoine.me" class="block" style="text-align:center;"><img src="images/ma.png" style="width:100px" class="block"/><p style="text-indent:0">Marc-Antoine</p></a>
			<a href="http://neospiro.fr" class="block" style="text-align:center;"><img src="images/kurokineko.png" style="width:100px" class="block"/><pstyle="text-indent:0">Cyril</p></a></div>
			<p>Le concepteur initial de l'<span class="ade2ics">ADE2ics</span> est <a href="http://marcantoine.me">Marc-Antoine</a>. Fatigué de devoir régulièrement consulter l'ADE, de sauvegarder les images des emplois du temps, il créa un script qui ne fonctionnait que pour sa classe. Il m'offrit les sources pour Noël !</p>
			
			<p>C'est ainsi que je rendis ce script utilisable pour quelques université régionales. Maintenant, je publie une version officielle ( pseudo-nationale ). Vous pouvez visiter <a href="http://neospiro.fr/">NeoSpiro.fr</a> pour voir quelques unes de mes autres créations.</p>

			<p>Merci a <span style="color:#080">Baptiste Vert</span>, un geek pas comme les autres, qui a corrigé les quelques fautes grammaticales et orthographiques qui trainaient sur le site.</p>
			
			<p>Une suggestion, un problème, des remerciements, un bug ? Un lien : <a href="#disquszone">Commentaires</a>.
			</p>
			<p>Je tiens a remercier les quelques personnes qui ont pris le temps de lire jusqu'ici, et surtout ceux qui m'ont envoyés des messages. Aussi bien pour me remercier que pour pointer du doigt les problèmes que j'essaye de rêgler au plus vite, c'est toujours plaisant de recevoir du courrier :)</p>
			<!--p>ADE to ICS, ADE to ICal, convertir ADE, Importer ADE</p-->
		</fieldset>
	</div>	
	<div id="videozone">
		<fieldset>
			<legend>ADE2ics : Video promotionnelle</legend>
			<object width="100%" height="367"><param name="movie" value="http://www.youtube.com/v/Expfykw0YmU?version=3&amp;hl=fr_FR&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/Expfykw0YmU?version=3&amp;hl=fr_FR&amp;rel=0" type="application/x-shockwave-flash" width="100%" height="367" allowscriptaccess="always" allowfullscreen="true"></embed></object> 			
			<p><a href="#infozone">Retour</a></p>
		</fieldset>
	</div>	
	<div id="videozone2">
		<fieldset>
			<legend>Comment récuperer le paramêtre "resources"</legend>
			<object width="100%" height="360"><param name="movie" value="https://www.youtube.com/v/aYp-mreVdGI&hl=en_US&feature=player_embedded&version=3&rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed src="https://www.youtube.com/v/aYp-mreVdGI&hl=en_US&feature=player_embedded&version=3&rel=0" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="100%" height="360"></embed></object>
			<p><a href="#titrezone">Retour à l'édition des paramêtres</a></p>
			
		</fieldset>
	</div>
	<div id="faqzone">
		<fieldset>
			<legend>Les modifications ne s'oppères pas dans mon agenda, que dois je faire ?</legend>
			<p>Ce n'est peut être pas de la faute d'<span class="ade2ics">ADE2ics</span>. Les agendas sont mis en cache chez nous, mais le cache n'est appelé que si l'ADE ne réponds pas. Ce peut être du a une mise en cache chez Google (Il vérifie, je crois, toutes les 24h).</p>
			<p>Une astuce applicable au cas ou les modifications de l'agenda ne s’opère pas sur votre lecteur ics, consiste a modifier un peu l'url :</p>
			<p>Toutes ces url fonctionneront, afficheront le même agenda, mais seront considérés comme différentes par les outils
			<ul>
					<li>cours-emploidutemps-419-miseajour.ics</li>
					<li> OU cours-emploidutemps-419-nimportequoi.ics</li>
					<li> OU cours-emploidutemps-419-oumeme0548.ics</li></ul></p>
			<p>En fait, il suffit d'ajouter un tiret après votre numéro d'agenda, puis de mettre n'importe quelle chaîne de caractère, Ceci pour contrer la mise en cache de Google Agenda ou tout autre service.</p>
			<p>Merci à Islandil pour cette judiscieuse question</p>
			<p><a href="#infozone">Retour à l'accueil</a></p>
		</fieldset>
		<fieldset>
			<legend>Le titre de mon agenda, ou le texte dans l'URL ne me conviens pas</legend>
			<p>C'est le premier utilisateur de votre ADE arrivé sur ADE2ics qui définis le titre. Celui ci ne doit jamais avoir été utilisé.</P>
			<p>Si celui ci contiends des propos obsènes, etc, posez un <a href="#disquszone">commentaire</a>.</p>
			<p><a href="#infozone">Retour à l'accueil</a></p>
		</fieldset>
			<!--
		<fieldset>
			<legend></legend>
			<p></p>
			<p><a href="#infozone">Retour à l'accueil</a></p>
		</fieldset>
			-->
		<fieldset>
			<legend>Que dois je faire pour poser une question ?</legend>
			<p>Allez dans la partie <a href="#disquszone">commentaires</a>, je me ferai un plaisir de vous répondre</p>
			<p><a href="#infozone">Retour à l'accueil</a></p>
			
		</fieldset>
	</div>
	<div id="urlzone">
		<fieldset>
			<legend>Convertir son agenda</legend>
			<p>Pour convertir son agenda, allez sur la page "publique" de votre ADE, c'est a dire celle accessible juste en un lien, puis copiez l'url ici</p>
			<form action="#" id="f">
				<label>Url : <input type="text" id="urledit" name="url"/></label>
				<input type="submit" value="Obtenir le lien"/>
			</form>
			<p><a href="#infozone">Retour</a></p>
		</fieldset>
	</div>
	
	<div id="titrezone">
		<fieldset>
			<legend>Ajouter un Agenda</legend>
			<p>Votre agenda n'est pas encore sur notre base de donnée, veuillez donc spécifier un titre et verifier les champs suivants</p>
			<p>Attention, vous êtes le premier utilisateur de votre ADE a utiliser ADE2ics. Ce titre apparaitra dans l'URL pour tous les utilisateurs de votre ADE, sur ADE2ics.</p>
			<form action="#" id="t">
				<label>Titre (a-z) : <input type="text" id="titreedit" name="titre"/></label>
				<p id="paramon">Voir les paramêtres du lien</p>
				<div id="param"><p>Votre lien ne contiens pas toute les informations nécessaires. Veuillez les compléter ici, ou bien retourner sur l'<a href="#urlzone">URLparser</a></p>
					<label>Host<input type="text" id="hostedit" name="host"/></label>
					<label>Login<input type="text" id="loginedit" name="login"/></label>
					<label>Pass<input type="text" id="passedit" name="pass"/></label>
					<label>ProjectId<input type="text" id="projectedit" name="projectid"/></label>
					<label>displayConfName<input type="text" id="displayedit" name="displayConfName"/></label>
					<label>displayConfld <span title="Paramêtre non obligatoire" style="border-bottom:1px dotted #333;">?</span><input type="text" id="displayidedit" name="displayConfId"/></label>
					<label>Resources (<a href="#videozone2">Aide</a>) <input type="text" id="resourcesedit" name="resources"/></label>
				</div>
				<input type="submit" value="Enregistrer et obtenir le lien"/>
			</form>
		</fieldset>
	</div>
<div id="disquszone">
		<fieldset>
			<legend>Donner son avis</legend>
			<p>ADE2ics vous a facilité la vie ? A quel point !? Dites le ici, partagez vos impressions !</p>
			<p><a href="#infozone">Retour à l'accueil</a></p>
			<div id="disqus_thread"></div>
			<p><a href="#infozone">Retour</a></p>
		</fieldset>
</div>
<script type="text/javascript">
    var disqus_shortname = 'ADE2ics';
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
	<div id="linkzone">
		<fieldset >
			<legend>Choisir son agenda</legend>
			<p>Voici la liste des agenda récupérés par votre adresse. Comme il peut y avoir plusieurs agenda par lien, nous récupérons les noms des agenda pour vous aider a choisir</p>
			<p>Si les noms s'affichent en rouge (Nom introuvable), c'est qu'ils ne fonctionnent pas. Cependant, il peut arriver qu'un miracle se produise, plus encore durant les périodes proches des nouvelles ères. Ainsi je vous conseil de verifier par vous même si le lien fonctionne.</p>
			<ul id="linklist">
				
			</ul>
			<p>Vous êtes content ? <a href="#disquszone">Dites le !</a> Mais récuperez d'abord l'URL...</p>
			<p><a href="#infozone">Retour</a></p>
		</fieldset>
	</div>
	<div id="wait">
		<fieldset>
			<!--legend>Message Box</legend-->
			<p id="messagebox"></p>
			<p><a href="#">Ok</a></p>
		</fieldset>
	</div>
	<fieldset style="position:absolute;top:0px;right:0px;width:210px;padding:5px;">
		<legend>Pour le café</legend>
		<div><div class="fb-like-box" data-href="https://www.facebook.com/pages/ADE2ics/285517608175902" data-width="200" data-show-faces="true" data-stream="true" data-header="true"></div>
		<!--iframe id="ads_content" src="ads.html" frameborder="0" width="120" height="600"></iframe></div-->
	</fieldset>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.js"></script>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-20769656-3']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<script type="text/javascript">
		eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(l(d){d.27([\'C\',\'1T\',\'1R\',\'1M\',\'1H\',\'1C\',\'1q\'],l(i,b){d.1f.1c[b]=l(a){7(a.19==0){a.8=G(a.H,b);a.m=t(a.m)}a.H.18[b]="r("+[g.q(g.z(5((a.u*(a.m[0]-a.8[0]))+a.8[0]),4),0),g.q(g.z(5((a.u*(a.m[1]-a.8[1]))+a.8[1]),4),0),g.q(g.z(5((a.u*(a.m[2]-a.8[2]))+a.8[2]),4),0)].12(",")+")"}});l t(a){y b;7(a&&a.10==P&&a.N==3)f a;7(b=/r\\(\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*\\)/.n(a))f[5(b[1]),5(b[2]),5(b[3])];7(b=/r\\(\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*\\)/.n(a))f[v(b[1])*2.w,v(b[2])*2.w,v(b[3])*2.w];7(b=/#([a-j-k-9]{2})([a-j-k-9]{2})([a-j-k-9]{2})/.n(a))f[5(b[1],16),5(b[2],16),5(b[3],16)];7(b=/#([a-j-k-9])([a-j-k-9])([a-j-k-9])/.n(a))f[5(b[1]+b[1],16),5(b[2]+b[2],16),5(b[3]+b[3],16)];f e[d.1w(a).O()]}l G(a,b){y c;Q{c=d.R(a,b);7(c!=\'\'&&c!=\'S\'||d.T(a,"U"))V;b="C"}W(a=a.X);f t(c)};y e={Y:[0,4,4],Z:[A,4,4],11:[K,K,13],14:[0,0,0],15:[0,0,4],17:[L,B,B],1a:[0,4,4],1b:[0,0,h],1d:[0,h,h],1e:[x,x,x],1g:[0,1h,0],1i:[1j,1k,E],1l:[h,0,h],1m:[1n,E,1o],1p:[4,D,0],1r:[1s,1t,1u],1v:[h,0,0],M:[1x,1y,1z],1A:[1B,0,p],1D:[4,0,4],1E:[4,1F,0],1G:[0,6,0],1I:[1J,0,1K],1L:[A,J,D],1N:[1O,1P,J],1Q:[I,4,4],1S:[F,1U,F],1V:[p,p,p],1W:[4,1X,1Y],1Z:[4,4,I],20:[0,4,0],21:[4,0,4],22:[6,0,0],23:[0,0,6],24:[6,6,0],25:[4,L,0],26:[4,o,28],29:[6,0,6],2a:[6,0,6],2b:[4,0,0],2c:[o,o,o],2d:[4,4,4],2e:[4,4,0]}})(2f);',62,140,'||||255|parseInt|128|if|start|||||||return|Math|139||fA|F0|function|end|exec|192|211|max|rgb||getRGB|pos|parseFloat|55|169|var|min|240|42|backgroundColor|140|107|144|getColor|elem|224|230|245|165|darksalmon|length|toLowerCase|Array|do|curCSS|transparent|nodeName|body|break|while|parentNode|aqua|azure|constructor|beige|join|220|black|blue||brown|style|state|cyan|darkblue|step|darkcyan|darkgrey|fx|darkgreen|100|darkkhaki|189|183|darkmagenta|darkolivegreen|85|47|darkorange|outlineColor|darkorchid|153|50|204|darkred|trim|233|150|122|darkviolet|148|color|fuchsia|gold|215|green|borderTopColor|indigo|75|130|khaki|borderRightColor|lightblue|173|216|lightcyan|borderLeftColor|lightgreen|borderBottomColor|238|lightgrey|lightpink|182|193|lightyellow|lime|magenta|maroon|navy|olive|orange|pink|each|203|purple|violet|red|silver|white|yellow|jQuery'.split('|'),0,{}));
		</script>
		<script type="text/javascript">
		 $(document).ready(function(){
			//Console
			var work=0;
			function addwork(txt){
				work++;
				$("#console").css({
						"display" : "block"
				});
				$("#co").append("<p>"+txt+"</p>");
			}
			function endwork(){
				work--;
				if(work==0){
				$("#console").css({
						"display" : "none"
				});	
				$("#co p").remove();
				}
			}
			
			//Titre
			$("#titreedit").keypress(function(e){
			var ch="azertyuiopmlkjhgfdsqwxcvbn";
				if (!e.charCode) k = String.fromCharCode(e.which);
					else k = String.fromCharCode(e.charCode);
				if (ch.indexOf(k) == -1 || $(this).val().length>15 ){
					$(this)
						.css({"background-color" : "#F00"})
						.animate({backgroundColor : "#FFFFFF"}, 300);
					e.preventDefault();
				} else {
						$(this)
						.css({"background-color" : "#0F0"})
						.animate({backgroundColor : "#FFFFFF"}, 300);
				}
			
			}).bind('contextmenu',function () {return false});
			
			//zones
			 activeWin="#infozone";
				function appair( truc , func){
					$("#ads_content").attr("src", $("#ads_content").attr("src"));
					$(truc)
						.css({
							"display":"block",
							"opacity":"0"
						}).stop().animate({
							"opacity":"1"
						},1000,func);
				}
				function disappair( truc, func ){
					$(truc)
						.stop()
						.animate({
							"opacity":"0"
						},500,function(){
							$(this).css({
								"display":"none",
							});
							if(arguments.lenth == 1){
								func();
							}
						});
				}
				
				function message(str, nextwin){
					$("#wait fieldset p a").attr("href", nextwin);
					$("#wait fieldset p:eq(0)").text(str);
					appair($("#wait"));
					activeWin="#wait";
					_gaq.push(['_trackPageview', '/'+activeWin]);
					
				}
				
				// Start
				$("body > div")
					.css({
						"display" : 'none'
					});
				appair($("#header"),function(){
					appair($(activeWin));
				});
				////
				$("a[href^=\"#\"]").click(function(){
					if($("body>div"+$(this).attr("href")).length==0)return false;
					disappair(
						$(""+activeWin),
						function(a){
							appair( $(""+$(a).attr("href")+""), function(){} );
							activeWin=$(a).attr("href");
						}($(this))
					);
					_gaq.push(['_trackPageview', '/'+activeWin]);
					return false;
				});
				
				function getnom(title, c){
				addwork("Analyse de l'emploi du temps n°"+c);
				$.ajax({
						  url: "ade2ics_getname.php",
						  type: "POST",
						  dataType: 'json',
						  async:false,
						  data: {loc : title , c : c},
						  cache: false,
						  success: function(nam){
						  endwork();
						  //alert(c+", "+title+" = "+nam.number+" + "+nam.noms);
						  //alert(nam.number+">0="+(nam.number>0))
							if(nam.number>0){
								$("#lnk"+ c +"").css("color", "green");
								$("#lnk"+ c +" .n").text(nam.noms + " ("+nam.number+" évenements)");
							}else{$("#lnk"+ c +"").css("color","#f00");}
							//getnom(title, c);
						  }
						});
				}
				
				
				$("#f").submit(function(){
					disappair(""+activeWin);
					addwork("Scan de l'URL");
					$.ajax({
					  url: "urlparser.php",
					  type: "post",
					  cache: false,
					  dataType: 'json',
					  data: {url : ""+$("#urledit").val()},
					  success: function(js){
					  endwork();
						$("#loginedit").val(js.login);
						$("#passedit").val(js.pass);
						$("#hostedit").val(js.url);
						$("#projectedit").val(js.projectId);
						$("#resourcesedit").val(js.resources);
						$("#displayedit").val(js.conf);
						$("#displayidedit").val(js.confid);
						$("#titreedit").val(js.title);
					  if(js.erreur==0){
							 appair("#linkzone");
							 activeWin="#linkzone";
							 _gaq.push(['_trackPageview', '/'+activeWin]);
							 for(z in js.url){
								$("#linklist").append('<li id="lnk'+ js.url[z].c +'" style="color:red;"><span class="n">Nom introuvable</span> : <br/><a href="'+ js.url[z].url +'" class="l">'+ js.url[z].url +'</a></li>');
								getnom(js.title, js.url[z].c);
							 }
							}
						else if(js.erreur==1){
							message(js.message, "#urlzone");
						}
						else{
							appair("#titrezone");
							activeWin="#titrezone";
							_gaq.push(['_trackPageview', '/'+activeWin]);
							if(js.erreur==3){
								$("#param").show(0); $("#paramon").hide();
							} else {$("#param").hide(0); $("#paramon").show();}
						}
					  }
					});
					return false;
				});
				
				$("#t").submit(function(){
					disappair(""+activeWin);
					url="http://"+$("#hostedit").val()+"/ade/custom/modules/plannings/direct_planning.jsp?resources="+$("#resourcesedit").val()+"&login="+$("#loginedit").val()+"&password="+$("#passedit").val()+"&projectId="+$("#projectedit").val()+"&displayConfName="+$("#displayedit").val();
					addwork("Scan de l'url");
					$.ajax({
					  url: "urlparser.php",
					  type: "post",
					  cache: false,
					  dataType: 'json',
					  data: {url : url, title : $("#titreedit").val()},
					  success: function(js){
					  endwork();
						$("#loginedit").val(js.login);
						$("#passedit").val(js.pass);
						$("#hostedit").val(js.url);
						$("#projectedit").val(js.projectId);
						$("#resourcesedit").val(js.resources);
						$("#displayedit").val(js.conf);
						$("#displayidedit").val(js.confid);
						$("#titreedit").val(js.title);
						if(js.erreur==0){
							 appair("#linkzone");
							 activeWin="#linkzone";
							 _gaq.push(['_trackPageview', '/'+activeWin]);
							 for(z in js.url){
								$("#linklist").append('<li id="lnk'+ js.url[z].c +'" style="color:red;"><span class="n">Nom introuvable</span> : <br/><a href="'+ js.url[z].url +'" class="l">'+ js.url[z].url +'</a></li>');
								getnom(js.title, js.url[z].c);
							 }
							}
						else if(js.erreur==1){
							message(js.message, "#urlzone");
						}
						else{
							appair("#titrezone");
							activeWin="#titrezone";
							_gaq.push(['_trackPageview', '/'+activeWin]);
							if(js.erreur==3){
								$("#param").show(0);$("#paramon").hide();
							} else {$("#param").hide(0); $("#paramon").show(); }
						}
					  }
					});
					return false;
				});
				
				
				$("#paramon").click(function(){
					$(this).hide;
					$("#param").slideDown();
				})
			});
		</script>
    </body>
</html>
