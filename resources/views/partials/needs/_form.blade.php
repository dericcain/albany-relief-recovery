<div class="row">
    <div class="col-sm-12">
        <h1>Needs Assessment Form</h1>
    </div>
    <div class="col-sm-12">
        <form class="form" id="needs-form" method="POST" action="{{ route('needs.store') }}">
            {{ csrf_field() }}
            <div class="section-wrapper">
                <h3>General Info</h3>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="speaks_spanish" id="speaks_spanish">
                            Se habla español?
                        </label>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <h3>Damaged Home Info</h3>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zip" value="31701">
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="insurance_agency">Who do you have home insurance with?</label>
                    <input type="text" class="form-control" id="insurance_agency" name="insurance_agency"
                           placeholder="Insurance agency">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="has_applied_for_assistance"
                                   id="has_applied_for_assistance">
                            Check here if you have applied for FEMA/GEMA assistance
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="is_staying_home" id="is_staying_home">
                            Check here if you are currently living at home?
                        </label>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <h3>Needs</h3>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="has_power" id="has_power">
                            Check here if you have power
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="home_damage">Please place a check next to the things that you need</label>
                    @foreach($physicalNeeds as $item)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{ $item->id }}" name="physical_needs[]">
                                {{ ucfirst($item->name) }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="section-wrapper">
                <h3>Personal Assessment</h3>
                <div class="form-group">
                    <label for="prayer_needs">How can we pray for you?</label>
                    <input type="text" class="form-control" id="prayer_needs" name="prayer_needs"
                           placeholder="How can we pray for you?">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="attends_local_church"
                                   id="attends_local_church">
                            Check here if you attend a local church
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="church_attended">What church do you attend?</label>
                    <input type="text" class="form-control" id="church_attended" name="church_attended"
                           placeholder="What church do you attend?">
                </div>
            </div>
            <div class="section-wrapper">
                <h3>Agreement</h3>
                <p>We, the undersigned state that the above information is true. We give Albany Relief and
                    volunteers of
                    Albany Relief permission to enter our property for assessment and repairs upon prior scheduling.
                    We
                    also agree that we will not hold Albany Relief, its affiliating churches, organizations, or
                    volunteers liable in any way for damage of property mentioned above. We understand these are all
                    volunteers and release them from any and all responsibility. We understand this form does not
                    guarantee assistance.</p>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="agrees_to_terms" id="agrees_to_terms">
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
                <h3>Additional Comments</h3>
                <div class="form-group">
                    <label for="additional_notes">Is there anything else that you would like to add?</label>
                    <textarea class="form-control" rows="3" name="additional_notes" id="additional_notes"></textarea>
                </div>
            </div>
            <button id="needs_button" type="submit" class="btn btn-primary bt-lg"><i class="fa fa-check"></i>
                Submit
            </button>
        </form>
    </div>
</div>