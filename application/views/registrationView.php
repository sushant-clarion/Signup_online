<form class="well form-horizontal" method="post" onsubmit="return validateRegistrationPage();">

              <fieldset>
                   <legend>Step 1: Primary Member Information</legend>

                   <div class="progress progress-striped active">
                      <div class="bar" style="width: 25%;"></div>
                  </div>

                <div class="control-group">
                     <label class="control-label" for="name">Member Name</label>
                    <div class="controls">
                        <input type="text" class="input-medium inline" id="fname" name="fname" placeholder="First Name">
                        <input type="text" class="input-medium inline" id="lname" name="lname" placeholder="Last Name">
                      </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="status">Club Membership Status</label>
                    <div class="controls">
                        <label class="radio">
                            <input type="radio" id="current_member" name="product_id" value="10-10" checked="checked">Current Member
                        </label>
                        <label class="radio">
                            <input type="radio" id="new_member" name="product_id" value="11-11">New Member
                        </label>
                        <label class="radio">
                            <input type="radio" id="former_member" name="product_id" value="12-12">Former Member
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="bday">Birthdate</label>
                    <div class="controls">
                        <select class="input-small inline" name="birth_month" id="bday_month">
                            <option value=""> - Month - </option>
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
                    
                        <select id="bday_day" class="input-small inline" name="birth_day">
                            <option value=""> - Day - </option>
                            <?php
                            for($i=1; $i<=31; $i++){
                                $n = str_pad($i, 2, "0", STR_PAD_LEFT);
                                echo <<<END
                                    <option value="$n">$n</option>
END;
                            }
                            ?>
                        </select>
                        <select id="bday_year" class="input-small inline" name="birth_year" id="birth_year">
                            <option value=""> - Year - </option>
                            <?php
                            for($i=(date("Y") - 1); $i>=1900; $i--){
                                echo <<<END
                                    <option value="$i">$i</option>
END;
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="gender">Gender</label>
                    <div class="controls">
                        <label class="radio">
                            <input type="radio" value="Female" name="gender" checked="checked">Female
                        </label>
                        <label class="radio">
                            <input type="radio" value="Male" name="gender">Male
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="address">Address</label>
                    <div class="controls input-margin">
                        <input type="text" class="input-xlarge" id="address1" name="address1" placeholder="Street Address">
                        
                        <input type="text" class="input-xlarge" id="address2" name="address2" placeholder="Apt, Suite">
                        
                        <input type="text" class="input-medium inline" id="city" name="city" placeholder="City">      
                        
                        <select id="state" name="state" class="input-small inline">                        
                        <option value="">State</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AS">American Samoa</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="GU">Guam</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="MP">Northern Mariana Islands</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="PR">Puerto Rico</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UM">U.S. Minor Outlying Islands</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VI">Virgin Islands of the U.S.</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option>
                        </select>
                        
                        <!--input type="text" class="input-mini inline" id="state" name="state" placeholder="State" -->
                        <input type="text" class="input-mini" id="zip" name="zip" placeholder="Zip">  
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="phone">Phone</label>
                    <div class="controls">
                        <input type="text" class="input-large" id="phone" name="phone" placeholder="856-555-5555">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="email" class="input-xlarge" id="email" name="email" placeholder="you@site.com">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="services">Additional Services</label>
                    <div class="controls">
                        <?php
                            $cnt = 1;
                            foreach($data[0] as $key=>$val){
                                $nameAndId = "addtional_service_$cnt";
                                $cnt++;
                                $value = $val['aMember_id'];
                                $label = $val['service_name']." @ $".$val['service_amount'].($val['period'] == 1 ? "/".$val['period_type'] : "/".$val['period']." ".$val['period_type']);
                                echo <<<END
                                    <label class="checkbox" for="tanning">
                                        <input type="checkbox" id="$nameAndId" name="$nameAndId" value="$value"> $label
                                    </label>
END;
                            }
                        ?>
                        <!--<label class="checkbox" for="tanning">
                            <input type="checkbox" id="tanning" name="addtional_service_1" value="7"> Tanning @ $19.99/month
                        </label>
                        <label class="checkbox" for="towel">
                            <input type="checkbox" id="towel" name="addtional_service_2" value="8"> Towel Service @ $10.00/month
                        </label> -->
                        <label class="checkbox" for="child_care"> 
                            <input type="checkbox" id="child_care" for="child_care" onclick="openChildServiceDiv(this,'child_care_group');">Child Care <small>(Ages: 4 months - 12 yrs)</small>
                        </label>
                    </div>
                </div>

                <div id="child_care_group" style="display:none;">
                    <?php
                        $cnt = 1;
                        foreach($data[1] as $key=>$val){
                            $value      = $val['aMember_id'];
                            $label      = $val['service_name']." ($".$val['service_amount'].($val['period'] == 1 ? "/".$val['period_type'] : "/".$val['period']." ".$val['period_type']).")";
                            $fnameId    = "child_".$cnt."_fname";
                            $lnameId    = "child_".$cnt."_lname";
                            $ageId      = "child_".$cnt."_age";
                            $cnt++;
                            echo <<<END
                               <div class="control-group">
                                    <label class="control-label" for="child_1">$label</label>
                                    <div class="controls input-margin">
                                        <input type="text" class="input-medium" placeholder="First Name" id="$fnameId" name="$fnameId">
                                        <input type="text" class="input-medium" placeholder="Last Name" id="$lnameId" name="$lnameId">
                                        <input type="text" class="input-mini" placeholder="Age" id="$ageId" name="$ageId">
                                    </div>
                                </div>
END;
                        }
                    ?>
                </div>
                <!-- /#chid_care_group -->

                <div class="form-actions">
                    <button class="btn btn-primary"><i class="icon-plus icon-white"></i> Add Friends &amp; Family Members</button>
                    <button class="btn btn-success">Checkout <i class="icon-shopping-cart icon-white"></i></button>
                </div>
            </fieldset>


            <?php //include ("includes/_running_total.php"); ?>
            <input type="hidden" name="btnRegistration" id="btnRegistration" value="save">
        </form>