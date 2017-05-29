	<script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
	<script>
		var options = {<?php
				$options = Array();
				
				array_push($options, "mode: WebLibrasMode.Wordpress");
				
				$iconPos = get_option('iconpos',1);
				$positions = Array(
					"WebLibrasIconPosition.Top",
					"WebLibrasIconPosition.Right",
					"WebLibrasIconPosition.Bottom",
					"WebLibrasIconPosition.Left",
					"WebLibrasIconPosition.Content"
				);
				
				array_push($options, 'position: '.$positions[intval( $iconPos )]);
				
				if($iconPos == 4){
					array_push($options, 'iconRoot: "'.get_option('iconpos-element').'"');
				}
				
				$compatibility = get_option('compatibility');
				if(isset($compatibility) && $compatibility > 0){
					array_push($options, 'compatibilityMode: true');
				}
				
				$translateEl = get_option('translate-element',"body");
				if($translateEl != "body"){
					array_push($options, 'translatedElement: "'.$translateEl.'"');
				}
				
				$notTranslated = get_option('no_wlauto');
				if(isset($notTranslated) && strlen(trim( $notTranslated )) > 0){
					array_push($options, 'avoid: "'.$notTranslated.'"');
				}
				
				echo implode(", ",$options);
		?>};
		var wl = new WebLibras(options);
	</script>