<form class="well form-horizontal" method="post">

              <fieldset>
                   <legend>Step 3: Payment Information</legend>



                   <div class="progress progress-striped active">
                      <div class="bar" style="width: 75%;"></div>
                  </div>

                  <h3>Today&rsquo;s Payment Information</h3>

                <div class="control-group">
                     <label class="control-label" for="name">Card Holder&rsquo;s Name</label>
                    <div class="controls">
                        <input type="text" class="input-medium inline" id="fname" placeholder="First Name" name="pay_fname">
                        <input type="text" class="input-medium inline" id="lname" placeholder="Last Name" name="pay_lname">
                      </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="card_type">Credit Card Type</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" id="visa" name="card_type"> Visa
                        </label>
                        <label class="radio inline">
                            <input type="radio" id="mastercard" name="card_type"> Mastercard
                        </label>
                        <label class="radio inline">
                            <input type="radio" id="discover" name="card_type"> Discover
                        </label>
                        <label class="radio inline">
                            <input type="radio" id="amex" name="card_type"> Amex
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="card_number">Card Number</label>
                    <div class="controls">
                        <input type="text" class="input-large" name="card_number" placeholder="4111-1111-1111-1111">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="cvv">CVV</label>
                    <div class="controls">
                        <input type="text" id="cvv" class="input-mini" name="cvv_number">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="exp">Expiration Date</label>
                    <div class="controls inline">
                        <label class="select">
                            Month
                            <select class="input-small" name="exp_month">
                                <option value="1">01 - Jan</option>
                                <option value="2">02 - Feb</option>
                                <option value="3">03 - Mar</option>
                                <option value="4">04 - Apr</option>
                                <option value="5">05 - May</option>
                                <option value="6">06 - Jun</option>
                                <option value="7">07 - Jul</option>
                                <option value="8">08 - Aug</option>
                                <option value="9">09 - Sep</option>
                                <option value="10">10 - Oct</option>
                                <option value="11">11 - Nov</option>
                                <option value="12">12 - Dec</option>
                            </select>
                        </label>
                        <label class="select">
                            Year
                            <select class="input-mini" name="exp_year">
                                <?php
                                    for($i=(date("Y")); $i<2022; $i++){
                                        echo <<<END
                                            <option value="$i">$i</option>
END;
                                    }
                            ?>
                            </select>
                        </label>
                    </div>
                </div>

                <h3>Recurring Payment Information</h3>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" id="recurring_same"> Same as above
                        </label>
                    </div>
                </div>

                <div id="recurring_payment_group">
                <div class="control-group">
                     <label class="control-label" for="name">Card Holder&rsquo;s Name</label>
                    <div class="controls">
                        <input type="text" class="input-medium inline" id="fname" placeholder="First Name">
                        <input type="text" class="input-medium inline" id="lname" placeholder="Last Name">
                      </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="card_type">Credit Card Type</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" id="visa"> Visa
                        </label>
                        <label class="radio inline">
                            <input type="radio" id="mastercard"> Mastercard
                        </label>
                        <label class="radio inline">
                            <input type="radio" id="discover"> Discover
                        </label>
                        <label class="radio inline">
                            <input type="radio" id="amex"> Amex
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="card_number">Card Number</label>
                    <div class="controls">
                        <input type="text" class="input-large">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="cvv">CVV</label>
                    <div class="controls">
                        <input type="text" id="cvv" class="input-mini">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="exp">Expiration Date</label>
                    <div class="controls inline">
                        <label class="select">
                            Month
                            <select class="input-small">
                                <option value="01">01 - Jan</option>
                                <option value="02">02 - Feb</option>
                                <option value="03">03 - Mar</option>
                                <option value="04">04 - Apr</option>
                                <option value="05">05 - May</option>
                                <option value="06">06 - Jun</option>
                                <option value="07">07 - Jul</option>
                                <option value="08">08 - Aug</option>
                                <option value="09">09 - Sep</option>
                                <option value="10">10 - Oct</option>
                                <option value="11">11 - Nov</option>
                                <option value="12">12 - Dec</option>
                            </select>
                        </label>
                        <label class="select">
                            Year
                            <select class="input-mini">
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </label>
                    </div>
                </div>
                </div><!-- #recurring_payment_group -->
           

                <div class="form-actions">
                    <button class="btn"><i class="icon-chevron-left"></i> Back</button>
                    <button class="btn btn-primary"><i class="icon-plus icon-white"></i> Add Another Friend or Family Member</button>
                    <button class="btn btn-success">Continue <i class="icon-shopping-cart icon-white"></i></button>
                    <p class="help-block">You will not be charged until you&rsquo;ve confirmed the total on the next page</p>
                </div>
            </fieldset>

             <input type="hidden" name="unique_id" id="unique_id" value="<?php echo $unique_id;?>">
             <input type="hidden" name="btnPayment" id="btnPayment" value="save">
             <input type="hidden" name="state" value="<?php echo $state;?>">
             <input type="hidden" name="city" value="<?php echo $city;?>">
             <input type="hidden" name="address" value="<?php echo $address;?>">
             <input type="hidden" name="zip" value="<?php echo $zip;?>">
             <input type="hidden" name="member_id" value="<?php echo $member_id;?>">
            <?php //include ("includes/_running_total.php"); ?>
        </form>