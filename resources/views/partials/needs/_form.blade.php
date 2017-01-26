<div class="row">
    <div class="col-sm-12">
        <form class="form" method="POST" action="{{ route('needs.store') }}">
            {{ csrf_field() }}
            <div class="section-wrapper">
                <h3>General Info</h3>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Age">
                </div>

                <div class="form-group">
                    <label for="main_number">Main Number</label>
                    <input type="text" class="form-control" id="main_number" name="main_number"
                           placeholder="Main Number">
                </div>

                <div class="form-group">
                    <label for="alt_number">Alternate Number</label>
                    <input type="text" class="form-control" id="alt_number" name="alt_number"
                           placeholder="Alternate Number">
                </div>

                <div class="form-group">
                    <label for="other_names">Other people in the home</label>
                    <textarea class="form-control" rows="3" name="other_names" id="other_names"></textarea>
                </div>
            </div>

            <div class="section-wrapper">
                <h3>Home Info</h3>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="is_primary_home" id="is_primary_home">
                            Check here if this is your primary home
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="owner_renter" id="owner_renter1" value="owner" checked>
                            I am a home owner
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="owner_renter" id="owner_renter2" value="renter">
                            I am a renter
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="has_power" id="has_power">
                            Check here if you have power
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="is_staying_home" id="is_staying_home">
                            Check here if you are currently living at home?
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                </div>

                <div class="form-group">
                    <label for="number_of_stories">Number of stories</label>
                    <input type="text" class="form-control" id="number_of_stories" name="number_of_stories"
                           placeholder="Number of stories">
                </div>

                <div class="form-group">
                    <label for="sq_ft">Sq. Ft.</label>
                    <input type="text" class="form-control" id="sq_ft" name="sq_ft" placeholder="Sq. Ft.">
                </div>

                <div class="form-group">
                    <label for="insurance_agency">Insurance agency</label>
                    <input type="text" class="form-control" id="insurance_agency" name="insurance_agency"
                           placeholder="Insurance agency">
                </div>

                <div class="form-group">
                    <label for="home_damage">What is the condition of your home?</label>
                    <select class="form-control" name="home_damage" id="home_damage">
                        <option value="" selected></option>
                        <option value="'destroyed'">Completely Destroyed</option>
                        <option value="'unlivable">Unlivable</option>
                        <option value="damaged">Damaged</option>
                    </select>
                </div>
            </div>

            <div class="section-wrapper">
                <h3>Needs</h3>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="needs_medical" id="needs_medical">
                            Check here if you need medical attention
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="home_damage">What are some of your needs?</label>
                    @foreach($physicalNeeds as $item)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{ $item->id }}" name="physical_needs[]">
                                {{ ucfirst($item->name) }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="physical_needs_other">What other needs do you have?</label>
                    <textarea class="form-control" id="physical_needs_other" name="physical_needs_other"></textarea>
                </div>
            </div>

            <div class="section-wrapper">
                <h3>Baby Needs</h3>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="has_baby" id="has_baby">
                            Check here if you have a baby
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="needs_formula" id="needs_formula">
                            Check here if you need formula
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="formula_type">Formula type</label>
                    <input type="text" class="form-control" id="formula_type" name="formula_type"
                           placeholder="Formula type">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="needs_milk" id="needs_milk">
                            Check here if you need milk
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="diaper_size">Diaper size</label>
                    <input type="text" class="form-control" id="diaper_size" name="diaper_size"
                           placeholder="Diaper size">
                </div>

                <div class="form-group">
                    <label for="over_counter_meds">Please list any over counter meds you may need</label>
                    <textarea class="form-control" rows="3" name="over_counter_meds" id="over_counter_meds"></textarea>
                </div>

                <div class="form-group">
                    <label for="clothing_needs">Please list any clothing needs you have (size & gender)</label>
                    <textarea class="form-control" rows="3" name="clothing_needs" id="clothing_needs"></textarea>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="true" name="needs_transportation" id="needs_transportation">
                        Please check here if you need transportation
                    </label>
                </div>
            </div>

            <div class="section-wrapper">
                <h3>Work Detail Info</h3>
                <div class="form-group">
                    <label for="home_damage">What are some of your needs?</label>
                    @foreach($workDetails as $item)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{ $item->id }}" name="work_details[]">
                                {{ ucfirst($item->name) }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="other_needs">Other work detail needs</label>
                    <input type="text" class="form-control" id="other_needs" name="other_needs"
                           placeholder="Other work detail needs">
                </div>
            </div>

            <div class="section-wrapper">

                <div class="form-group">
                    <label for="physical_health_scale">On a scale of 1 to 10, how is your physical state? (1 = Bad, 10 =
                        Excellent)</label>
                    <div class="radio">
                        @for($i = 1; $i < 11; $i++)
                            <label class="radio-inline">
                                <input type="radio" name="physical_health_scale" value="{{ $i }}">
                                {{ $i }}
                            </label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="mental_health_scale">On a scale of 1 to 10, how is your mental state? (1 = Bad, 10 =
                        Excellent)</label>
                    <div class="radio">
                        @for($i = 1; $i < 11; $i++)
                            <label class="radio-inline">
                                <input type="radio" name="mental_health_scale" value="{{ $i }}">
                                {{ $i }}
                            </label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="what_to_pray">How can we pray for you?</label>
                    <input type="text" class="form-control" id="what_to_pray" name="what_to_pray"
                           placeholder="How can we pray for you?">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="attends_local_church" id="attends_local_church">
                            Check here if you attend a local church
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="church_attended">What church do you attend?</label>
                    <input type="text" class="form-control" id="church_attended" name="church_attended"
                           placeholder="What church do you attend?">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="applied_for_disaster_assistance"
                                   id="applied_for_disaster_assistance">
                            Check here if you have applied for disaster assistance
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="applied_for_fema_food_stamps"
                                   id="applied_for_fema_food_stamps">
                            Check here if you have applied for FEMA food stamps
                        </label>
                    </div>
                </div>

            </div>

            <div class="section-wrapper">
                <h3>Agreement</h3>
                <p>We, the undersigned state that the above information is true. We give Albany Relief and volunteers of
                    Albany Relief permission to enter our property for assessment and repairs upon prior scheduling. We
                    also agree that we will not hold Albany Relief, its affiliating churches, organizations, or
                    volunteers liable in any way for damage of property mentioned above. We understand these are all
                    volunteers and release them from any and all responsibility. We understand this form does not
                    guarantee assistance.</p>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="agrees_to_terms" id="agrees_to_terms">
                            I have read and agree to the above statement
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="digital_signature">Please enter your name here as a digital signature</label>
                    <input type="text" class="form-control" id="digital_signature" name="digital_signature"
                           placeholder="Please enter your name here as a digital signature">
                </div>
            </div>

            <div class="section-wrapper">
                <h3>Group Volunteer Info</h3>
                <div class="form-group">
                    <label for="volunteers_that_visited">What volunteers visited this house?</label>
                    <textarea class="form-control" rows="3" name="volunteers_that_visited"
                              id="volunteers_that_visited"></textarea>
                </div>

                <div class="form-group">
                    <label for="resources_provided">What resources were provided today?</label>
                    <textarea class="form-control" rows="3" name="resources_provided"
                              id="resources_provided"></textarea>
                </div>

                <div class="form-group">
                    <label for="additional_notes">Please list any other additional notes about this home or
                        individual</label>
                    <textarea class="form-control" rows="3" name="additional_notes" id="additional_notes"></textarea>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="wants_to_help_long_term"
                                   id="wants_to_help_long_term">
                            Check here if you and/or your team are interested in helping this home on an ongoing basis
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="needs_to_be_provided">What help would you and/or your team be able to provide?</label>
                    <textarea class="form-control" rows="3" name="needs_to_be_provided"
                              id="needs_to_be_provided"></textarea>
                </div>
            </div>

            <div class="section-wrapper">
                <h3>Team Leader Info</h3>
                <div class="form-group">
                    <label for="member_name">What is your name?</label>
                    <input type="text" class="form-control" id="member_name" name="member_name"
                           placeholder="What is your name?">
                </div>

                <div class="form-group">
                    <label for="member_email">What is your email?</label>
                    <input type="text" class="form-control" id="member_email" name="member_email"
                           placeholder="What is your email?">
                </div>

                <div class="form-group">
                    <label for="owner_phone">What is your phone number?</label>
                    <input type="text" class="form-control" id="owner_phone" name="owner_phone"
                           placeholder="What is your phone number?">
                </div>

                <div class="form-group">
                    <label for="owner_facebook">What is your Facebook username?</label>
                    <input type="text" class="form-control" id="owner_facebook" name="owner_facebook"
                           placeholder="What is your Facebook username?">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="is_associated_with_church"
                                   id="is_associated_with_church">
                            Check here if you are associated with a church
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="church_association">What church are you a member of?</label>
                    <input type="text" class="form-control" id="church_association" name="church_association"
                           placeholder="What church are you a member of?">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="can_contact" id="can_contact">
                            Check here if you want to be contacted about ongoing needs for this family
                        </label>
                    </div>
                </div>
            </div>
            <button id="needs_button" type="submit" class="btn btn-primary bt-lg disabled"><i class="fa fa-check"></i>
                Submit
            </button>
        </form>
    </div>
