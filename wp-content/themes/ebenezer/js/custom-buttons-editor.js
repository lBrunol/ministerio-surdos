/*
 * Função que adiciona novos botões ao editor do wordpress
 *
 * O parâmetro que seta o nome do botão também deve ser definido no functions.php
 */

(function () {
    // Imagem com legenda
    tinymce.PluginManager.add('video_youtube', function (editor, url) {        
        editor.addButton('video_youtube', {
            title: 'Adicionar vídeo incorporado do YouTube',
            icon: ' dashicons-before dashicons-video-alt3',
            onclick: function () {
                editor.windowManager.open({
                    title: 'Vídeo do YouTube',
                    body: [
                        {
                            type: 'textbox',
                            name: 'url',
                            label: 'Url',
                            value: ''
                        },
                        {
                            type: 'textbox',
                            name: 'width',
                            label: 'Largura',
                            value: ''
                        },
                        {
                            type: 'textbox',
                            name: 'height',
                            label: 'Altura',
                            value: ''
                        }
                    ],
                    onsubmit: function (e) {
                        var shortcode = '',
                            url = e.data.url,
                            width = e.data.width,
                            height = e.data.height;

                        if( !!url ) {
                            shortcode = '[video-youtube url="' + url + '"' + (width ? ' width="' + width + '"' : '') + (height ? ' height="' + height + '"' : '') + '][/video-youtube]';
                            editor.insertContent(shortcode);
                        }
                    }
                });            
            }
        });
    });
})();