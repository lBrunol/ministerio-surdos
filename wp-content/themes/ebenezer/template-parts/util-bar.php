<?php require get_template_directory() . '/template-parts/breadcrumbs.php'; ?>                    
<div class="util-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-5">
                <?php $bread = ebenezer_get_breadcrumbs();
                if( $bread ) : ?>
                    <nav class="container-bread">
                        <?php ebenezer_render_breadcrumbs( $bread ); ?>
                    </nav>
                <?php endif; ?>
            </div>
            <div class="col-md-5 _text-right">
                <nav class="accessibility-nav">
                    <ul class="accessibility-list">
                        <li class="accessibility-list-item"><button class="accessibility-list-button js-font-default" type="button" aria-hidden="true" title="Redefinir tamanho padrão"><span class="sr-text">Redefinir tamanho padrão</span>A</button></li>
                        <li class="accessibility-list-item"><button class="accessibility-list-button js-font-increase" type="button" aria-hidden="true" title="Aumentar tamanho da fonte"><span class="sr-text">Aumentar tamanho da fonte</span>A+</button></li>
                        <li class="accessibility-list-item"><button class="accessibility-list-button js-font-decrease" type="button" aria-hidden="true" title="Diminuir tamanho da fonte"><span class="sr-text">Diminuir tamanho da fonte</span>A-</button></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>