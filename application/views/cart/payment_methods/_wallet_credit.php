<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($cart_payment_method->payment_option == "wallet_credit"): ?>
	<div class="row">
		<div class="col-12">
			<?php $this->load->view('product/_messages'); ?>
		</div>
	</div>
	<div id="payment-button-container" class="paypal-button-cnt">
		<p class="p-complete-payment"><?php echo trans("msg_complete_payment"); ?></p>
		<button href="" type="button" id="btn_wallet_credit_checkout" class="btn btn-lg custom-stripe-button">
		<?php echo trans("pay_now") ?>
		</button>
	</div>
	
	<script>
	$(document).ready(function(){		
		// $total_money = '<?php echo substr($total_amount,0,-2) ?>'.'<?php echo substr($total_amount,-2) ?>';
		$('#btn_wallet_credit_checkout').click(function(){
			var data = {
				'payment_id': 'wallet_<?php echo $this->auth_user->id; ?>',
				'useremail': '<?php echo $this->auth_user->email; ?>',
				'wallet_balance': '<?php echo get_user_wallet_balance($this->auth_user); ?>',
				'currency': '<?php echo $currency; ?>',
		        'payment_amount': '<?php echo $total_amount; ?>',
		        'payment_status': 'success',
		        'mds_payment_type': '<?php echo $mds_payment_type; ?>'
			};

			data[csfr_token_name] = $.cookie(csfr_cookie_name);
			$.ajax({
                type: "POST",
                url: base_url + "cart_controller/wallet_payment_post",
                data: data,
                dataType : "json",
                success: function (response) {
                    var obj = JSON.parse(JSON.stringify(response));
                    // if (obj.status == 1) {
                    //     window.location.href = obj.redirect;
                    // } else {
                    //     location.reload();
                    // }
					window.location.href = obj.redirect;
                }
            });
		});
	});
	</script>

<?php endif; ?>