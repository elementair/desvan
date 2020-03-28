<?php
extract($args, EXTR_SKIP);
$widget_string = $before_widget;
extract($args, EXTR_SKIP);
$title = apply_filters('widget_title', $instance['title']);

$modal = get_options_page('modal_popup');
$tiempoModal = get_options_page('tiempo_modal');
$colorTituloModel = get_options_page('color_texto_widget');
$colorCueropoModal = get_options_page('color_cuerpo_modal');
$bordeModal = get_options_page('border_modal');
$efectoModal = get_options_page('efecto_modal');
$duracionEfecto = get_options_page('speed_efecto_modal');
$recaptcha = get_options_page('recaptcha');
$claveSitio = get_options_page('clave_sitio');
$colorRecaptcha = get_options_page('color_recaptcha');
$themeRecaptcha = get_options_page('theme_recaptcha');
$redimensionarRecaptcha = get_options_page('size_recaptcha');
if(empty($redimensionarRecaptcha)){$redimensionarRecaptcha = '77';};
if(empty($themeRecaptcha)){$themeRecaptcha = 'normal';};
if(empty($colorRecaptcha)){$colorRecaptcha = 'light';};
if(empty($claveSitio)){$claveSitio = '1234';};
if(empty($recaptcha)){$recaptcha = 'no';};
if(empty($duracionEfecto)){$modal = '450';};
if(empty($bordeModal)){$bordeModal='4px';}
if($colorCueropoModal == '#'){$colorTituloModel = '#ebebeb';};
if($colorTituloModel == '#'){$colorTituloModel = '#000000';};
if(empty($modal)){$modal = 'no';};
if(empty($tiempoModal)){$tiempoModal = '3000';};
if($modal == 'si'){
?>
<style>
#rc-imageselect {transform:scale(0.<?php echo $redimensionarRecaptcha;?>);-webkit-transform:scale(0.<?php echo $redimensionarRecaptcha;?>);transform-origin:0 0;-webkit-transform-origin:0 0;}
@media screen and (max-height: 575px){
#rc-imageselect, 
.g-recaptcha {transform:scale(0.<?php echo $redimensionarRecaptcha;?>);-webkit-transform:scale(0.<?php echo $redimensionarRecaptcha;?>);transform-origin:0 0;-webkit-transform-origin:0 0;}}
</style>
<div class="modalsuscriptflech" style=" display:none;padding:10px;width:500px;min-height:100px;-moz-border-radius:<?php echo $bordeModal;?>;-webkit-border-radius:<?php echo $bordeModal;?>;border-radius:<?php echo $bordeModal;?>;background-color:<?php echo $colorCueropoModal;?>;box-shadow: 0 2px 5px #666666;">
<script>
    jQuery(document).ready(function(){
    setTimeout(function() {       
    jQuery('.modalsuscriptflech').bPopup({
        speed: <?php echo $duracionEfecto;?>,
        transition: '<?php echo $efectoModal;?>'
    });
    jQuery('.widget-suscriptflech-class').remove(); 
    }, <?php echo $tiempoModal;?>);
});
</script>
<?php }?>
<span style="color:<?php echo $colorTituloModel;?> !important">
<?php
echo $before_title . $title . $after_title;
if($modal == "si"):
    $texto6 = get_options_page('mensaje_captcha');
if(empty($texto6)):
?>
<p style="font-size: 14px;">Suscríbete en nuestro voletín de notícias y recibirás todas nuestras novedades</p>  
<?php 
else:
    echo '<p style="font-size: 14px;">' .$texto6 . '<p>';
endif;
endif;
?>
</span>
<form name="wp_id_suscriptflech" onsubmit="return false">
    <div>
        <p class="form_fx">
            <span class="fx_input">
                <?php              
                $border_input = get_options_page('border_input');
                $color_fondo = get_options_page('color_fondo');
                $color_texto_input = get_options_page('color_input_texto');
                $tamano_input = get_options_page('tamano_input');
                if($color_fondo == '#'){$color_fondo = '';};
                if($color_texto_input == '#'){$color_texto_input = '';};
                if(empty($tamano_input)){$tamano_input = '100%';};
                
                ?>
                <input style="<?php if(!empty($color_texto_input)):?>color:<?php echo $color_texto_input; ?>;<?php endif;?><?php if(!empty($color_fondo)):?>background-color: <?php echo $color_fondo; ?>;<?php endif;?><?php if(!empty($border_input)):?>webkit-border-radius: <?php echo $border_input;?>;-moz-border-radius: <?php echo $border_input;?>;border-radius: <?php echo $border_input;?>;<?php endif;?>width:<?php echo $tamano_input;?>" name="wp_email_sucriptflech" id="wp_email_sucriptflech" type="email"  class="regular-text form-control" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="E-mail" autocomplete="off">
                 <img id="carga" style="display:none" src="<?php echo plugins_url('suscriptflech/public/assets/images/cargando.png'); ?>">
                <input type="hidden" name="ajax_fx_suscriptflech" value="<?php echo wp_create_nonce('ajax_suscriptflech_options_nonce'); ?>">
               
            </span> 
            <span id="humano" style="color:<?php echo $colorTituloModel;?>;">
            <?php if($recaptcha == "no"):?>
                <input type="checkbox" id="checkbox" name="checkbox"> Sí, soy humano* 
            <?php elseif($recaptcha == "si"):?>
                <div class="g-recaptcha" data-size="<?php echo $themeRecaptcha;?>" data-theme="<?php echo $colorRecaptcha;?>" data-sitekey="<?php echo $claveSitio;?>" style="transform:scale(0.<?php echo $redimensionarRecaptcha;?>);-webkit-transform:scale(0.<?php echo $redimensionarRecaptcha;?>);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
            <?php endif; ?>
            </span>
            <?php 
                $color_boton = get_options_page('color_boton');
                $border_boton = get_options_page('border_boton');
                $color_texto = get_options_page('color_texto');
                $tamano_boton = get_options_page('tamano_boton');
                if(empty($border_boton)){$border_boton = '4px';}
                if($color_boton == '#' or empty($color_boton)){$color_boton = '#428bca';}
                if($color_texto == '#' or empty($color_texto)){$color_texto = '#ffffff';}
                if(empty($tamano_boton)){$tamano_boton = '100%';};
            ?>
            
<input class="boton_suscriptflech" style="width:<?php echo $tamano_boton;?>;background-color: <?php echo $color_boton; ?>;color: <?php echo $color_texto;?>;-webkit-border-radius: <?php echo $border_boton;?>;-moz-border-radius: <?php echo $border_boton;?>;border-radius: <?php echo $border_boton;?>;margin-left:0px;margin-right:0px;" name="botonsuscripcion" type="submit" value="Enviar" onclick="<?php if($recaptcha == "no"):?>suscripcion(wp_email_sucriptflech.value,ajax_fx_suscriptflech.value);<?php elseif($recaptcha == "si"):?>suscripcionRecaptcha(wp_email_sucriptflech.value, ajax_fx_suscriptflech.value, grecaptcha.getResponse());<?php endif;?>" /> </p>  
    </div>
    <div class="exito1" id="exito1">
        
        <?php
        $texto1 = get_options_page('ok_email');
        if(empty($texto1)):?>
        Se ha enviado un mensaje de confirmación; por favor, haga clic en el enlace de confirmación para verificar su suscripción.
        <?php else:
            echo $texto1;
        endif;?>
    </div>
    <div class="aviso1" id="aviso1">
         <?php
        $texto2 = get_options_page('existe_email');
        if(empty($texto2)):?>
            El email ya esta en uso
          <?php else:
            echo $texto2;
        endif;?>
    </div>
    <div class="aviso2" id="aviso2">
         <?php
        $texto3 = get_options_page('fallo_email');
        if(empty($texto3)):?>
            Tienes que escribir un email
          <?php else:
            echo $texto3;
        endif;?>
    </div>
    <div class="aviso3" id="aviso3">
        <?php 
         $texto4 = get_options_page('clic_captcha');
         if(empty($texto4)):?>
            Tienes que cliquear el captcha
         <?php else:
            echo $texto4;
        endif;?>
    </div>
    <div class="aviso4" id="aviso4">
         <?php 
         $texto5 = get_options_page('incorrecto_captcha');
         if(empty($texto5)):?>
            El captcha no es correcto
        <?php else:
            echo $texto5;
        endif;?>
    </div>

</form>
    <?php if($modal == 'si'){?>
</div>
    <?php }?>