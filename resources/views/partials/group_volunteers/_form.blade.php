<form id="volunteer-form" method="POST" action="{{ $route }}" data-parsley-validate>
    <div class="section-wrapper">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="first_name">Contact First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name"
                   value="{{ $volunteer->first_name or '' }}"
                   required>
        </div>
        <div class="form-group">
            <label for="last_name">Contact Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name"
                   value="{{ $volunteer->last_name or '' }}"
                   required>
        </div>
        <div class="form-group">
            <label for="email">Contact Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $volunteer->email or '' }}"
                   required>
        </div>
        <div class="form-group">
            <label for="phone">Contact Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $volunteer->phone or '' }}"
                   required>
        </div>
        <div class="form-group">
            <label for="phone">Contact Alternate Phone</label>
            <input type="text" class="form-control" id="alt_phone" name="alt_phone"
                   value="{{ $volunteer->alt_phone or '' }}">
        </div>
        <div class="form-group">
            <label for="affiliation">Group Affiliation (If any, please let us know if you are connected
                with a church, community group or organization.</label>
            <input type="text" class="form-control" id="affiliation" name="affiliation"
                   value="{{ $volunteer->affiliation or '' }}">
        </div>
        <div class="form-group">
            <label for="origin">Where is your group from? (Albany?)</label>
            <input type="text" class="form-control" id="origin" name="origin"
                   value="{{ $volunteer->origin or '' }}">
        </div>
        <div class="form-group">
            <label for="address">What is your organizaion's address?</label>
            <input type="text" class="form-control" id="address" name="address"
                   value="{{ $volunteer->address or '' }}">
        </div>
        <div class="form-group">
            <h4>How many people will be volunteering?</h4>
            <div class="radio">
                <label><input type="radio" name="num_volunteers"
                              {{ (isset($volunteer) && $volunteer->num_volunteers == "<5") ? 'checked' : '' }} value="<5">
                    <5</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="num_volunteers"
                              {{ (isset($volunteer) && $volunteer->num_volunteers == "5-10") ? 'checked' : '' }} value="5-10">
                    5-10</label>
            </div>
            <div class="radio disabled">
                <label><input type="radio" name="num_volunteers"
                              {{ (isset($volunteer) && $volunteer->num_volunteers == "10-20") ? 'checked' : '' }} value="10-20">
                    10-20</label>
            </div>
            <div class="radio disabled">
                <label><input type="radio" name="num_volunteers"
                              {{ (isset($volunteer) && $volunteer->num_volunteers == "20-30") ? 'checked' : '' }} value="20-30">
                    20-30</label>
            </div>
            <div class="radio disabled">
                <label><input type="radio" name="num_volunteers"
                              {{ (isset($volunteer) && $volunteer->num_volunteers == "30-50") ? 'checked' : '' }} value="30-50">
                    30-50</label>
            </div>
        </div>
        <h4>What is the primary age of those in the group?</h4>
        <div class="radio">
            <label><input type="radio" name="age_group"
                          {{ (isset($volunteer) && $volunteer->age_group == "Under 13 years old") ? 'checked' : '' }} value="Under 13 years old">
                Under 13 years old</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="age_group"
                          {{ (isset($volunteer) && $volunteer->age_group == "13-17 years old") ? 'checked' : '' }} value="13-17 years old">
                13-17 years old</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="age_group"
                          {{ (isset($volunteer) && $volunteer->age_group == "18-25 years old") ? 'checked' : '' }} value="18-25 years old">
                18-25 years old</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="age_group"
                          {{ (isset($volunteer) && $volunteer->age_group == "26-50 years old") ? 'checked' : '' }} value="26-50 years old">
                26-50 years old</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="age_group"
                          {{ (isset($volunteer) && $volunteer->age_group == "50+ years old") ? 'checked' : '' }} value="50+ years old">
                50+ years old</label>
        </div>
    </div>
    <div class="section-wrapper">
        <h4>Preferred type of work</h4>
        <p>Please let us know the type of work you are able to assist with so that we can try to match
            your skills with opportunity.</p>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1"
                           name="debris_removal" {{ (isset($volunteer) && $volunteer->debris_removal) ? 'checked' : '' }}>
                    Manual Labor - Clean Up & Debris Removal
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1"
                           name="home_repair" {{ (isset($volunteer) && $volunteer->home_repair) ? 'checked' : '' }}>
                    Manual Labor - Home Repair
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1"
                           name="deliveries" {{ (isset($volunteer) && $volunteer->deliveries) ? 'checked' : '' }}>
                    Home Deliveries of Goods
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1"
                           name="administrative" {{ (isset($volunteer) && $volunteer->administrative) ? 'checked' : '' }}>
                    Secretarial Work (phone management, data entry, etc.)
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1"
                           name="sorting" {{ (isset($volunteer) && $volunteer->sorting) ? 'checked' : '' }}>
                    Sorting/Warehouse Management
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1"
                           name="communications" {{ (isset($volunteer) && $volunteer->communications) ? 'checked' : '' }}>
                    Communication - Social Media
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1"
                           name="counseling" {{ (isset($volunteer) && $volunteer->counseling) ? 'checked' : '' }}>
                    Counseling Services
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="other">Other</label>
            <input type="text" class="form-control" id="other" name="other" value="{{ $volunteer->other or '' }}">
        </div>
        <div class="form-group">
            <h4>Are there specific skills or resources you have available?</h4>
            <label for="resources_available">Construction experiences, large machinery, vehicles,
                etc.</label>
            <input type="text" class="form-control" id="resources_available" name="resources_available"
                   value="{{ $volunteer->resources_available or '' }}">
        </div>
    </div>
    <div class="section-wrapper">
        <div class="form-group">
            <h4>How often do you expect to be able to volunteer?</h4>
            <div class="radio">
                <label><input type="radio" name="time_commitment"
                              {{ (isset($volunteer) && $volunteer->time_commitment == "daily") ? 'checked' : '' }} value="daily">Daily</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="time_commitment"
                              {{ (isset($volunteer) && $volunteer->time_commitment == "3-4 times weekly") ? 'checked' : '' }} value="3-4 times weekly">3-4
                    times
                    weekly</label>
            </div>
            <div class="radio disabled">
                <label><input type="radio" name="time_commitment"
                              {{ (isset($volunteer) && $volunteer->time_commitment == "1-2 times weekly") ? 'checked' : '' }} value="1-2 times weekly">1-2
                    times
                    weekly</label>
            </div>
            <div class="radio disabled">
                <label><input type="radio" name="time_commitment"
                              {{ (isset($volunteer) && $volunteer->time_commitment == "One time opportunity") ? 'checked' : '' }} value="One time opportunity">One
                    time
                    opportunity</label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1"
                           name="speaks_spanish" {{ (isset($volunteer) && $volunteer->speaks_spanish) ? 'checked' : '' }}>
                    Please check here if you speak Spanish
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="additional_comments">Additional Comments</label>
            <textarea class="form-control" rows="3" name="additional_comments"
                      id="additional_comments">{{ $volunteer->additional_comments or '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_available">Date available to start</label>
            <input type="text" class="form-control datepicker" id="date_available" name="date_available"
                   value="{{ (isset($volunteer) && $volunteer->date_available) ? $volunteer->date_available->format('m/d/Y') : '' }}"
                   required>
        </div>
    </div>
    <div class="section-wrapper">
        <p>We, the undersigned, state that the above information is true. We give Albany Relief and
            volunteers of Albany Relief permission to contact us regarding volunteer opportunities. We
            also agree that we will not hold Albany Relief, its affiliating churches, organizations, or
            volunteers liable in any way for damage of property mentioned above. We understand these are
            all volunteers and release them from any and all responsibility.</p>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="agrees_to_terms"
                           {{ (isset($volunteer) && $volunteer->agrees_to_terms) ? 'checked' : '' }} data-parsley-required>
                    Please check here to confirm that you have read and agree to the terms above.
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="digital_signature">Digital signature</label>
            <input type="text" class="form-control" id="digital_signature" name="digital_signature"
                   value="{{ $volunteer->digital_signature or '' }}">
        </div>
    </div>
    <button id="needs_button" type="submit" class="btn btn-primary bt-lg"><i class="fa fa-check"></i>
        Submit
    </button>
</form>
