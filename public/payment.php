<?php include("../public/header.php");?>
<div class="container-fluid">
    <div class="row">
		<div class="col-xs-1 arrow" id="prev" style="display: flexbox;"><a href="TaskTest.php"><span class="glyphicon glyphicon-menu-left"></span></a></div>
        <div class="col-xs-10" style="text-align: center">
            <br />
            <h2>Payment Way Select</h2>
			<br/>
			<hr/>
			<h4>We would not charge any fee when the task was builded</h4>
			<hr/>
			<h4> The fee would be charged after you meet your personal tour guilde</h4>
			<hr/>
			
			<!-- Task6 -->
			
			<div class="row">
				
				<div class="col-xs-12 col-md-4">
            	<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><img class="pull-right" src="http://i76.imgup.net/accepted_c22e0.png">Payment Details</h3>
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form">
                    <div class="row">
						<div class="col-xs-12">
                        <div class="form-group">
							<label for="cardNumber">CARD NUMBER</label>
							<div class="input-group">
							<input type="text" class="form-control" name="cardNumber" placeholder="Valid Card Number" required autofocus data-stripe="number" />
								<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                             </div>
                        </div>                            
						</div>
					</div>
                    <div class="row">
						<div class="col-xs-7 col-md-7">
                        <div class="form-group">
                        <label for="expMonth">EXPIRATION DATE</label>
						<div class="col-xs-6 col-lg-6 pl-ziro">
						<input type="text" class="form-control" name="expMonth" placeholder="MM" required data-stripe="exp_month" /></div>
						<div class="col-xs-6 col-lg-6 pl-ziro">
						<input type="text" class="form-control" name="expYear" placeholder="YY" required data-stripe="exp_year" />
						</div>
                        </div>
                     </div>
                     <div class="col-xs-5 col-md-5 pull-right">
						 <div class="form-group">
                         <label for="cvCode">CV CODE</label>
					     <input type="password" class="form-control" name="cvCode" placeholder="CV" required data-stripe="cvc" />
                          </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">COUPON CODE</label>
                                    <input type="text" class="form-control" name="couponCode" />
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg btn-block" type="submit">Submit Payment Info</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
             
        
    </div>
			
			<!-- End -->
			
		</div>
		<div class="col-xs-1 arrow" id="next" ></div>
    </div>
</div>