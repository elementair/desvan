<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head>
 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
<title><?php bloginfo("name");?></title>
 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css' />
</head>
<?php 
$face = get_options_page('icono_facebook');
$twi  = get_options_page('icono_twetter');
$go   = get_options_page('icono_google');
$pi   = get_options_page('icono_pinterest');
$yot    = get_options_page('icono_youtube');
?>
<body style="margin: 0; padding:0;font-family: 'Roboto', sans-serif;">
<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#eaeced">
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
              <tr>
                   <td bgcolor="#eaeced" style="padding: 28px 10px 28px 0px">
                       <?php $logo = get_options_page('logo_email');
                                if(empty($logo)) :?>
                            <img src="<?php echo plugins_url( 'suscriptflech/admin/assets/images/logo.png' ) ?>" alt="logo" />
                            <?php else:?>  
                                <img src="<?php echo $logo; ?>" alt="logo" /> 
                            <?php endif;  ?>
                   </td>
               </tr>
              
               
               <tr>
                   <td bgcolor="#ffffff" style="text-align: center; padding: 20px 0px 20px 0px;font-weight: bold;color:#64666a">
                       <?php echo $data["titulo"]?>
                   </td>
               </tr>
               
               
               <tr>
                   <td bgcolor="#ffffff" style="color:#c1c1c1; text-align: center;font-size: 14px;padding: 0px 40px 0px 40px;">
                       <?php echo $data['mensaje'];?> 
                   </td>
               </tr>
               
                <tr>
                   <td bgcolor="#ffffff" style="padding: 30px 10px 30px 10px;text-align: center;">
                       <a href="<?php bloginfo("url");?>" style="text-transform: uppercase;background-color: #7bb84f;color:#fff;text-decoration: none;padding: 10px 20px 10px 20px">Visitar web</a>
                   </td>
               </tr>
                
                <tr>
                   <td bgcolor="#eaeced" style="padding: 30px 0px 30px 0px;text-align: center;">&nbsp;</td>
               </tr>
         
                 <?php if( !empty($face) or !empty($twi) or !empty($go) or !empty($pi) or !empty($yot) ):?> 
                 <tr>
                   <td bgcolor="#ffffff" style="font-weight: bold;color:#797c82;">
                       <table border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>   
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                     <tr>
                                         <td width="260" valign="top" style="padding: 24px 10px 10px 10px" >
                                             Redes Sociales:
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
                <tr>
                    <td bgcolor="#eaeced" style="padding: 15px 0px 15px 0px;text-align: center;font-size: 12px;color:#797c82;">
                        Copyright <?php echo date("Y"); ?> <a style="text-decoration: none;color: #797c82;" href="<?php bloginfo("url");?>"><?php bloginfo("name");?></a>
                    </td>
               </tr>    
            </table>
        </td>
    </tr>
</table>
</body>
</html>
