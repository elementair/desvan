function envioemailUsuariosSsuscripflech(e,u,r,a){jQuery("#cargaadminpreolader").css({display:"block"}),jQuery.ajax({type:"POST",url:ajaxurl,data:{action:"emailenvio",email:u,mensaje:e,titulo:r,nonce:a},success:function(e){if(0==e.indexOf("res")){jQuery("#usuariosmanual").prop("checked",!1),jQuery("#userauto").show("slow"),jQuery("#userauto").attr("name","suscriptflechusuariosemailenviar"),jQuery("#textoauto").show("slow"),jQuery("#tiauto").show(),jQuery("#timanu").hide(),jQuery("#textomanu").hide("fast"),jQuery("#usermanual").hide("fast"),jQuery("#usermanual").attr("name",""),jQuery("#terminado").show("slow");var u="description_suscriptflech";tinymce.get(u).setContent(""),jQuery("#userauto").attr("value","todos"),jQuery("#tit").attr("value",""),jQuery("#usermanualsinemail").attr("value",""),setTimeout(function(){jQuery("#terminado").hide("fast")},4e3)}10==e&&(jQuery("#errorterminado").show("slow"),setTimeout(function(){jQuery("#errorterminado").hide("fast")},4e3)),20==e&&(jQuery("#erroremailenvio").show("slow"),setTimeout(function(){jQuery("#erroremailenvio").hide("fast")},4e3)),jQuery("#cargaadminpreolader").css({display:"none"})}})}jQuery(document).ready(function(){jQuery("#userauto").attr("name","suscriptflechusuariosemailenviar"),jQuery("#userauto").attr("value","todos"),jQuery("#usuariosmanual").prop("checked",!1),jQuery("#usermanualsinemail").attr("value",""),jQuery("#usuariosmanual").mousedown(function(){jQuery(this).is(":checked")?(jQuery("#timanu").hide(),jQuery("#tiauto").show(),jQuery("#textomanu").hide("fast"),jQuery("#textoauto").show("slow"),jQuery("#userauto").show("slow"),jQuery("#usermanual").hide("fast"),jQuery("#usermanual").attr("name",""),jQuery("#userauto").attr("name","suscriptflechusuariosemailenviar"),jQuery(this).trigger("change")):(jQuery("#tiauto").hide(),jQuery("#timanu").show(),jQuery("#textomanu").show("slow"),jQuery("#usermanual").show("slow"),jQuery("#userauto").hide("fast"),jQuery("#textoauto").hide("fast"),jQuery("#userauto").attr("name",""),jQuery("#usermanual").attr("name","suscriptflechusuariosemailenviar"),jQuery("#usermanual").attr("value",""),jQuery(this).trigger("change"))})});