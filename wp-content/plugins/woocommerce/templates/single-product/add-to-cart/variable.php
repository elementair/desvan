<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></td>
						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
								echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<?php echo '<h3>'.do_shortcode('[popup_anything id="3254"]').'</h3>'; ?>


		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
		<br>

		<div class="accordion" rel="">
			<div class="accordion-item">
				<a href="#" class="accordion-title plain" aria-expanded="false">
					<button class="toggle"><i class="icon-angle-down"></i></button>
					<span>Envios y devoluciones</span>
				</a>
				<div class="accordion-inner" style="display: none;">
				<p>
				<strong>Envíos</strong><br>
 

					Todos nuestros envíos son gratis. Los mandamos por fedex y tardan de 3-5 días hábiles.<br>
					
					Ten en cuenta:<br>
					
					Que si compras antes de las 12 pm salen el mismo día de lo contrario saldrá al siguiente día hábil.
					Una vez que enviemos el producto te mandamos el número de rastreo por correo.
					Tenemos envíos a toda la República Mexicana.<br>
					
 

					<strong>Cambios y devoluciones</strong><br>

					Si los modelos que compraste no te quedaron, recuerda que tienes el primer cambio o devolución gratis.<br>
					
					Considera lo siguiente:<br>
					
					Tienes 15 días a partir de que completaste tu compra para hacer un cambio o devolución.
					El calzado no deben presentar señales de mal uso o descuido intencional.<br>
					El proceso de cambio tarda entre 10 a 15 días.<br>
					Toma en cuenta que si pagas en Oxxo no podremos realizar devolución, únicamente cambios.<br>
					Si quieres saber más detalles sobre cómo funciona el proceso da clic <a href="#">aquí link</a>


				</p>
			</div>
		</div>
		<div class="accordion-item">
			<a href="#" class="accordion-title plain">
				<button class="toggle"><i class="icon-angle-down"></i></button>
				<span>¿Te los quieres probar? -visitanos en:</span>
			</a>
			<div class="accordion-inner" style="">
				<p>
					<ul>
						<li>LA GRAN PLAZA(Local D-16)</li>
						<li>GALERÍA DEL CALZADO(Local 45)</li>
						<li>PLAZA MÉXICO(Local D24 y D25)</li>
						<li>PUNTO SUR(LOCAL L104)</li>
						
					</ul>
					Necesitas mas detalles de nuestras sucursales, da clic <a href="#">aquí link</a>
				</p>
			</div>
		</div>
		<div class="accordion-item">
			<a href="#" class="accordion-title plain">
				<button class="toggle"><i class="icon-angle-down"></i></button>
				<span>Metodos de pago</span>
			</a><div class="accordion-inner" style="">
				<p>
				<ul>
						<li>PayPal</li>
						<li>MasterCard</li>
						<li>Visa</li>
						<li>Oxxo</li>
						
					</ul>
					Necesitas mas detalles sobre nuestros metodos de pago, da clic <a href="#">aquí link</a>
				</p>
			</div>
		</div>



	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
