<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head>
 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
<title><?php bloginfo("name");?></title>
 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 
</head>
<?php 
$face = get_options_page('icono_facebook');
$twi  = get_options_page('icono_twetter');
$go   = get_options_page('icono_google');
$pi   = get_options_page('icono_pinterest');
$yot    = get_options_page('icono_youtube');
?> 
 
 <body style="margin: 0; padding:0;">
     
     <table border="0"  cellpadding="0" cellspacing="0" width="100%">
         
         <tr bgcolor="#e1e1e1">
             <td>
                 <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                     <tr>
                         <td bgcolor="#53545e" style="padding: 10px 0px 10px 10px">
                              <?php $logo = get_options_page('logo_email');
                                if(empty($logo)) :?>
                            <img src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/logo.png' ) ?>" alt="logo" />
                            <?php else:?>  
                                <img src="<?php echo $logo; ?>" alt="logo" /> 
                            <?php endif;  ?>
                         </td>
                     </tr>
                     
                 </table>
             </td>
         </tr>
         
        <tr bgcolor="#f1f1f1">
            <td>
                <table  bgcolor="#ffffff" align="center"  border="0" cellpadding="0" cellspacing="0" width="600">
                    <tr>
                        <td style="text-align: center;padding: 20px 0px 0px 0px;font-family: Arial, Verdana, sans-serif;font-size: 14px;color: #53545e;font-weight: bold;">
                           <?php bloginfo("name");?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
         
         <tr bgcolor="#f1f1f1">
             <td>
                 <table bgcolor="#ffffff" align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                     <tr>
                         <td style="padding: 20px">
                            <table  bgcolor="#ffffff" style="border-bottom: 2px solid #eaeaea;" border="0" cellpadding="0" cellspacing="0" width="100%">                                                              
                               
                                <tr>
                                    <td style="color: #53545e;font-weight: bold;text-transform: uppercase;font-family: Arial, Verdana, sans-serif;padding: 15px 0px 15px 0px;">
                                       <?php echo $data['titulo'];?> 
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="text-align: justify;color: #bfc0c3;font-size: 13px;font-family: Arial, Verdana, sans-serif;">
                                        <?php echo $data['mensaje'];?> 
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td style="padding: 35px 0px 50px 0px">
                                    <a href="<?php bloginfo("url");?>" style="background-color: #53545e;padding: 10px 15px;color: #ffffff;text-decoration: none;font-family: Arial, Verdana, sans-serif;">Visitar web</a> 
                                    </td>
                                </tr>                         
                            </table>
                         </td>
                    
                     </tr>                       
        </table>
        </td>
      </tr>   
         <?php if( !empty($face) or !empty($twi) or !empty($go) or !empty($pi) or !empty($yot) ):?>  
        <tr bgcolor="#e1e1e1">
             <td>
                 <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                     <tr>
                         <td bgcolor="#f1f1f1">
                           <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="260" valign="top" style="color: #53545e;font-size: 20px;font-weight: bold;font-family: Arial, Verdana, sans-serif;padding: 22px 0px 10px 20px;" >
                                        Redes Sociles
                                    </td>
                                     <td width="260" valign="top" align="right" style="padding: 15px 20px 10px 0px;">
                                         <?php if(!empty($face)):?>
                                         <a href="<?php echo $face;?>"><img src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/facebook.jpg' ) ?>" alt="facebook" /></a> 
                                        <?php endif;?>
                                        <?php if(!empty($go)):?>
                                         <a href="<?php echo $go;?>"><img src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/google.jpg' ) ?>" alt="google" /></a> 
                                        <?php endif;?>
                                        <?php if(!empty($pi)):?>
                                             <a href="<?php echo $pi;?>"><img src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/pinterest.jpg' ) ?>" alt="pinterest" /></a>  
                                        <?php endif;?>
                                        <?php if(!empty($twi)):?>
                                             <a href="<?php echo $twi;?>"><img src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/twitter.jpg' ) ?>" alt="twitter" /></a> 
                                        <?php endif;?>
                                        <?php if(!empty($yot)):?>
                                             <a href="<?php echo $yot;?>"><img src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/youtube.jpg' ) ?>" alt="youtube" /></a> 
                                        <?php endif;?>
                                    </td>
                                </tr>
                            </table>
                         </td>
                     </tr>
                     
                 </table>
             </td>
         </tr>
        <?php endif;?>
     
         <tr bgcolor="#e1e1e1">
             <td style="padding: 0px 0px 40px 0px;">
                 <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                     <tr>
                         <td bgcolor="#53545e">
                             <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="260" valign="top" style="padding: 10px 0px 10px 20px;color: #93949d;font-family: Arial, Verdana, sans-serif;font-size: 12px;" >
                                        Copyright <?php echo date("Y"); ?> <?php bloginfo("name");?>
                                    </td>
                                     <td width="260" valign="top" align="right" style="padding: 10px 20px 10px 0px;color: #93949d;font-family: Arial, Verdana, sans-serif;font-size: 12px;" >
                                        Visitanos en <a style="color: #ffffff;text-decoration: none;" href="<?php bloginfo("url");?>"><?php bloginfo("name");?></a>
                                    </td>
                                </tr>
                            </table>
                         </td>
                     </tr>
                     
                 </table>
             </td>
         </tr>
     </table>
     
     
 </body>
 
</html>