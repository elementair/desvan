 <style type="text/css">
                
                .nav-tab-wrapper {
                    min-height: 35px;
                }
                
                .wpsf-tab {
                    display: none;
                }
                
                .wpsf-tab--active {
                    display: block;
                }
                
                    .wpsf-tab .postbox {
                        margin: 50px auto;
                        width: 80%;
                    }
                   
                    .wpsf-tab .postbox h3 {
                        padding: 8px 2%;
                        border: none;
                        margin-top: 25px;
                        background: #333333;
                        color: #ffffff;
                        -webkit-font-smoothing: antialiased;
                        -moz-font-smoothing: antialiased;
                        -o-font-smoothing: antialiased;
                        font-smoothing: antialiased;
                        font-size: 1.25em;
                        text-align: center;
                    }
                    
                    .wpsf-tab .postbox h3:first-child {
                        margin-top: 0;
                    }
                    
                    .js .wpsf-tab .postbox h3 {
                        cursor: default;
                    }
                    
                    .wpsf-tab .postbox table.form-table,
                    .wpsf-tab .wpsf-section-description {
                        margin: 0 2%;
                        width: 96%;
                    }
                    
                    .wpsf-tab .postbox table.form-table {
                        margin-bottom: 20px;
                    }
                    
                    .wpsf-tab .wpsf-section-description {
                        margin-top: 20px;
                        margin-bottom: 20px;
                        padding-bottom: 20px;
                        border-bottom: 1px solid #eeeeee;
                    }
                    .postbox .dashicons-email-alt {
                        margin-top: -2px;
                        margin-left: -23px;
                        
                    }
                    .botonenviosus{
                        text-align: center;
                    }
                
            </style>
<form name="wp_id_suscriptflech_envio_email" onsubmit="return false">
<div id="tab-tab_1" class="wpsf-tab wpsf-tab--tab_1 wpsf-tab--active">
<div class="postbox">
<h3><span class="dashicons dashicons-email-alt"></span> Envío de emails personalizados</h3>
<table class="form-table">
    <tbody>
        <?php if($data){ ?>
        <tr>
            <th>Escribir el email</th>
            <td><input type="checkbox" id="usuariosmanual" >
            </td>
        </tr>
        <?php }?>
    <tr>
        <th scope="row" id="tiauto"><?php if($data){ ?>Elige el email del usuario<?php }elseif(!$data){ ?>Escriba el email de usuario<?php }?></th>
        <th scope="row" id="timanu" style="display: none;">Escriba el email del usuario</th>
        <td> 
            
            <?php if($data){ ?>
            <select name="" id="userauto"  class="" stye="width:50%;">
                <option value="todos" selected="selected">Todos</option>
                <?php foreach ($data as $key => $datosemail) {?>
                    <option value="<?php echo $datosemail["email"]?>"><?php echo $datosemail["email"]?></option>
                 <?php }?>
  
               </select> 
            <input type="text" name="" id="usermanual" style="display: none;"  class="regular-text">
            <p class="description" id="textomanu" style="display: none;">Escriba el email de usuario para enviarle el email.</p>
            <?php }elseif(!$data){ ?>
                <input type="text" id="usermanualsinemail" name="suscriptflechusuariosemailenviar" placeholder="" class="regular-text">
            <?php }?>
            
        <p class="description" id="textoauto"><?php if($data){ ?>Elige un usuario o elige todos los usuarios.<?php }elseif(!$data){ ?>Escriba el email de usuario para enviarle el email.<?php }?></p>
        </td>
    </tr>
    
    
    <tr>
        <th scope="row">Escriba un título</th>
        <td><input type="text" id="tit" name="titulomensajesuscriptflechenviaremais"   placeholder="" class="regular-text">
        <p class="description">Escriba un título para el mensaje.</p>
        </td>
    </tr>
    
    
       <tr>
        <th scope="row">Escribe tu mensaje</th>
        <td> 
          <?php 
            $settings = array(  
                'textarea_name' => 'mensajesuscriptflecpersonalizado',
                'quicktags' => false,
                'media_buttons' => false,
                'teeny' => true,                
                'tinymce'=> array(
                'theme_advanced_disable' => 'fullscreen'
                )
            );
            wp_editor( '', 'description_suscriptflech', $settings );  
          ?>
        <p class="description">Podrás escribir el mensaje para tus usuarios.</p>
        </td>
    </tr>
    <tr>
        <th><img id="cargaadminpreolader" style="display:none" src="<?php echo plugins_url('suscriptflech/admin/assets/images/carga.gif'); ?>"></th>
        <td>
            <p class="description" id="terminado" style="display: none;font-size:15px;background-color:#8bea92;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;padding:5px;margin-top:3px;font-weight:bold;color:#276d2c;background-image:url(<?php echo plugins_url('suscriptflech/admin/includes/custom-widget/images/check.png'); ?>);background-repeat:no-repeat;background-position:left top;padding-top:2px;padding-right:5px;padding-bottom:5px;padding-left:25px;color:#fff;">Mensaje enviado correctamente</p>
            <p class="description" id="errorterminado" style="font-size:15px;background-color:#ffb7b9;margin-top:3px;display:none;font-weight:bold;color:#a50505;background-image:url(<?php echo plugins_url('suscriptflech/admin/includes/custom-widget/images/error.png'); ?>);background-repeat:no-repeat;background-position:left top;padding-top:2px;padding-right:5px;padding-bottom:5px;padding-left:25px;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;-o-border-radius:5px;-ms-border-radius:5px">No puedes dejar los campos vacíos</p>
            <p class="description" id="erroremailenvio" style="font-size:15px;background-color:#ffb7b9;margin-top:3px;display:none;font-weight:bold;color:#a50505;background-image:url(<?php echo plugins_url('suscriptflech/admin/includes/custom-widget/images/error.png'); ?>);background-repeat:no-repeat;background-position:left top;padding-top:2px;padding-right:5px;padding-bottom:5px;padding-left:25px;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;-o-border-radius:5px;-ms-border-radius:5px">Tienes que escribir un email valido</p>
        </td>
    </tr>
      <input type="hidden" name="ajax_fx_suscriptflech_emails_user" value="<?php echo wp_create_nonce('ajax_suscriptflech_emais_user_options_nonce'); ?>">
    </tbody>
</table>
</div>
</div>
    <p class="botonenviosus"><input type="submit" id="submit"  class="button-primary" value="<?php _e( 'Enviar Email' ); ?>" /></p>
 </form>
<script>
   jQuery('#submit').mousedown( function() {
    tinyMCE.triggerSave();
    var mensaje = document.wp_id_suscriptflech_envio_email.mensajesuscriptflecpersonalizado.value;
    var email = document.wp_id_suscriptflech_envio_email.suscriptflechusuariosemailenviar.value;
    var titulo = document.wp_id_suscriptflech_envio_email.titulomensajesuscriptflechenviaremais.value;
    var nonce = document.wp_id_suscriptflech_envio_email.ajax_fx_suscriptflech_emails_user.value;
    envioemailUsuariosSsuscripflech(mensaje,email,titulo,nonce);
    }); 
</script>
