<form id="volunteer-form" method="POST" action="{{ $route }}" data-parsley-validate>
    <div class="section-wrapper">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name"
                   placeholder="First name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name"
                   placeholder="Last name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
        </div>
        <div class="form-group">
            <label for="affiliation">Group Affiliation (If any, please let us know if you are connected
                with a church, community group or organization.</label>
            <input type="text" class="form-control" id="affiliation" name="affiliation"
                   placeholder="Group Affiliation">
        </div>
    </div>
    <div class="section-wrapper">
        <h4>Preferred type of work</h4>
        <p>Please let us know the type of work you are able to assist with so that we can try to match
            your skills with opportunity.</p>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="debris_removal">
                    Manual Labor - Clean Up & Debris Removal
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="home_repair">
                    Manual Labor - Home Repair
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="deliveries">
                    Home Deliveries of Goods
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="administrative">
                    Secretarial Work (phone management, data entry, etc.)
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="sorting">
                    Sorting/Warehouse Management
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="communications">
                    Communication - Social Media
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="counseling">
                    Counseling Services
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="other">Other</label>
            <input type="text" class="form-control" id="other" name="other" placeholder="Other">
        </div>
        <div class="form-group">
            <h4>Are there specific skills or resources you have available?</h4>
            <label for="resources_available">Construction experiences, large machinery, vehicles,
                etc.</label>
            <input type="text" class="form-control" id="resources_available" name="resources_available"
                   placeholder="">
        </div>
    </div>
    <div class="section-wrapper">
        <div class="form-group">
            <h4>How often do you expect to be able to volunteer?</h4>
            <div class="radio">
                <label><input type="radio" name="time_commitment" value="daily">Daily</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="time_commitment" value="3-4 times weekly">3-4 times
                    weekly</label>
            </div>
            <div class="radio disabled">
                <label><input type="radio" name="time_commitment" value="1-2 times weekly">1-2 times
                    weekly</label>
            </div>
            <div class="radio disabled">
                <label><input type="radio" name="time_commitment" value="One time opportunity">One time
                    opportunity</label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="speaks_spanish">
                    Please check here if you speak Spanish
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="additional_comments">Additional Comments</label>
            <textarea class="form-control" rows="3" name="additional_comments"
                      id="additional_comments"></textarea>
        </div>
        <div class="form-group">
            <label for="date_available">Date available to start</label>
            <input type="text" class="form-control datepicker" id="date_available" name="date_available"
                   placeholder="Date available" required>
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
                    <input type="checkbox" value="1" name="agrees_to_terms" data-parsley-required>
                    Please check here to confirm that you have read and agree to the terms above.
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="digital_signature">Digital signature</label>
            <input type="text" class="form-control" id="digital_signature" name="digital_signature"
                   placeholder="Digital signature">
        </div>
    </div>
    <button id="needs_button" type="submit" class="btn btn-primary bt-lg"><i class="fa fa-check"></i>
        Submit
    </button>
</form>
