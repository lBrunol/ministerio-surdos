<style>
	.example{
		font-size:0.9em;
		color:#8D8D8D;
		margin-left:10px;
	}
	label{
		margin-right:10px;
	}
	.field{
		width:300px;
		padding-left:10px;
	}
	a{
		text-decoration: none;
		color: #AD00A0;
		font-style: normal;
	}
	form{
		width: 800px;
		background: #FFF;
		border-radius: 20px;
		padding: 10px;
		box-shadow: 3px 3px 2px #D8D8D8;
		margin-bottom: 50px;
		margin: auto;
	}
	#image-container{
		width: 800px;
		margin: auto;
	}
	#subtitle{
		font-style: italic;
		padding: 4px;
	}
	form img {
		margin-right: 5px;
	}
	h4{
		color: #ad00a0;
		margin-bottom: 25px;
		clear:both;
	}
	.msg {
	padding-top: 6px;
	padding-bottom: 6px;
	color: #fff;
	text-align: center;
	border-radius: 15px;
	}
	.msg.sucesso{
		background-color: rgba(6, 164, 3, 0.58);
	}
	.msg.sucesso p, .msg.erro p{
		margin: 0px;
	}
	.msg.erro{
		background-color: rgba(230, 5, 5, 0.41);
	}
	input[type="text"] {
		border-color: #D6D6D6 !important;
		width: 385px;
	}
	input#btwl {
		border: 1px solid #fff;
		border-radius: 5px;
		color: #fff;
		background-color: #808080;
		padding: 5px 15px;
		cursor: pointer;
		transition: all 1s;
	}
	input#btwl:hover {
		background-color: rgba(143, 0, 143, 0.74);
	}
	.example-pos{
		width:100px; float:left; margin:5px; text-align:center;
	}
	.example-pos .screen{
		width:100px; height:60px; position:relative; background:#FFF; outline:1px solid #AAA;
		overflow:hidden;
	}
	
	.example-pos .screen:before{
		width:100px; height:15px; content:""; background:#FEC; position:absolute; top: 0; left: 0;
	}
	.example-pos .screen:after{
		width:100px; height:5px; content:""; background:#999; position:absolute; top: 15px; left: 0;
	}
	
	.example-pos .screen .icon{
		position:absolute;
		width:9px;
		height:9px;
		transition:0.25s all;
		z-index:10;
		outline:1px solid #AAA;
		background:#FFF;
	}
	.example-pos .screen .icon:before{
		position:absolute;
		top:1px;
		left:1px;
		width:7px;
		height:7px;
		background:#24F;
		content:"";
	}
	.example-pos .screen.content .icon{
		position:relative;
		display:inline-block;
	}
	.example-pos .screen.content .contents{
		font-size: 11px;
		color: #999;
		position: absolute;
		top: 20px;
		left: 4px;
		width: 80px;
		height: 20px;
		text-align: left;
	}
	.example-pos .screen.content .contents:before{
		content:">>";
	}
	.example-pos .screen.content .contents:after{
		content:"<<";
	}
	
	.example-pos .screen.top .icon{ top:0; left:50%; margin-left:-4px}
	.example-pos .screen.right .icon{ top:30%; right:0}
	.example-pos .screen.bottom .icon{ bottom:0; left:50%; margin-left:-4px}
	.example-pos .screen.left .icon{ top:30%; left:0}
	
	.example-pos:hover .screen .icon{
		width:22px;
	}
	.example-pos:hover .screen.top .icon, .example-pos:hover .screen.bottom .icon{
		margin-left:-11px;
	}
	.example-pos .textfield{
		width:100px;
	}
	.config-item{
		margin-bottom:14px;
	}
</style>
<script type="text/javascript">
jQuery( document ).ready(function() {
	jQuery.getJSON("http://prod.weblibras.com.br/AutoService.svc/DomainStatusJson/"+window.location.host,function(a){
		if (a.status == "WLNA"){
			jQuery("form").prepend("<div class='msg erro'><p>Seu domínio ainda não foi aprovado ou você não possui cadastro no WebLibras. <a href='https://cadastro.weblibras.com.br'>Cadastre-se</a> ou entre em <a href='https://cadastro.weblibras.com.br/#contato'>contato</a> conosco.</p></div>");
		
		}
	});
	
	setInterval(function(){jQuery('.msg.sucesso').fadeOut();}, 6000);
});
</script>




<div class="wrap">
    <div id="image-container"><img src="<?php echo plugins_url('images/logo.png', __FILE__)?>" /></div>
	
    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<?php	
		if(isset($_POST["Submit"])){
			update_option('iconpos', $_POST["iconpos"]);
			update_option('iconpos-element', $_POST["iconpos-element"]);
			
			$translateEl = trim( $_POST["translate-element"]);
			
			if($translateEl == "element"){
				$translateEl = $_POST["translate-element-selector"];
				if(strlen($translateEl < 0)){
					$translateEl = "body";
				}
			}
			update_option('compatibility', $_POST["compatibility"]);
			update_option('translate-element', $translateEl);
			update_option('no_wlauto',$_POST["notTranslated"]);

	?>
			<div class="msg sucesso"><p>Configurações salvas com sucesso</p></div>
	<?php
		}
		
		
		
	$iconPos = get_option('iconpos',1);
	$iconPosEl = $iconPos == 4 ? get_option('iconpos-element') : "";
	$compatibility = get_option('compatibility');
	$translateEl = get_option('translate-element',"body");
	$notTranslated = get_option('no_wlauto');

	?>
	
	
		<h4>Posição do ícone</h4>
		
		<div>
			<label class="example-pos">
				<div class="screen top">
					<div class="icon"></div>
				</div>
				<div>Em cima</div>
				<input type="radio" name="iconpos" value="0" <?=$iconPos == 0 ? "checked":"" ?>/>
			</label>
			<label class="example-pos">
				<div class="screen right">
					<div class="icon"></div>
				</div>
				<div>Na direita</div>
				<input type="radio" name="iconpos" value="1" <?=$iconPos == 1 ? "checked":"" ?>/>
			</label>
			<label class="example-pos">
				<div class="screen bottom">
					<div class="icon"></div>
				</div>
				<div>Em baixo</div>
				<input type="radio" name="iconpos" value="2" <?=$iconPos == 2 ? "checked":"" ?>/>
			</label>
			<label class="example-pos">
				<div class="screen left">
					<div class="icon"></div>
				</div>
				<div>Na esquerda</div>
				<input type="radio" name="iconpos" value="3" <?=$iconPos == 3 ? "checked":"" ?>/>
			</label>
			<label class="example-pos" for="optionelement">
				<div class="screen content">
					<div class="contents">
						<div class="icon"></div>
					</div>
				</div>
				<div>no elemento:</div>
				<input type="text" name="iconpos-element" placeholder="#elemento" class="textfield" value="<?=$iconPosEl?>" />
				<input type="radio" name="iconpos" value="4" id="optionelement" <?=$iconPos == 4 ? "checked":"" ?>/>
			</label>
		</div>
		
		
		<h4>Configurações Avançadas</h4>
		
		<div class="config-item">
			<label>
				<strong>Modo de compatibilidade: </strong> <input type="checkbox" value="1" name="compatibility" <?=$compatibility == 1 ? "checked":""?> />
			</label>
			<div class="example">Utilize esta opção quando o weblibras não estiver traduzindo algum conteúdo da página</div>
		</div>
		
		<div class="config-item">
			<label>
				<strong>Traduzir: </strong>
				<label>
					<input type="radio" value="body" name="translate-element" <?=$translateEl == "body" ? "checked" : "" ?> />
					Toda a página
				</label>
				<label>
					<input type="radio" value="element" name="translate-element" <?=$translateEl != "body" ? "checked" : "" ?> />
					Apenas o elemento:
					<input type="text" name="translate-element-selector" placeholder="#elemento" class="textfield" value="<?=$translateEl != "body" ? $translateEl : "" ?>"/>
				</label>
			</label>
		</div>
		
		<div class="config-item">
			<label><strong>Não traduzir:</strong> <input type="text" value="<?=$notTranslated?>" name="notTranslated" /></label>
				<div class="example">Ids ou classes de um ou mais elementos HTML que não serão traduzidos.</div>
				<div class="example">Obs.: Separar elementos por vírgula. Exemplo: #elemento1, .elemento2, #elemento3</div>
			<hr />
			
		</div>

        <p class="submit">
			<input type="submit" id="btwl" name="Submit" value="atualizar" />
        </p>
    </form>
</div>