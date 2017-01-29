<div class="row">
    <div class="col-sm-12">
        <h1>Urgent Needs Form</h1>
    </div>
    <div class="col-sm-12">
        <form class="form" id="urgent-needs-form" method="POST" action="{{ $route }}">
            {{ csrf_field() }}
            <div class="section-wrapper">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"
                           value="{{ $need->first_name or '' }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"
                           value="{{ $need->last_name or '' }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                           value="{{ $need->phone or '' }}">
                </div>
                <div class="form-group">
                    <label for="alt_phone">Alt. phone</label>
                    <input type="text" class="form-control" id="alt_phone" name="alt_phone" placeholder="Alt phone"
                           value="{{ $need->alt_phone or '' }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                           value="{{ $need->address or '' }}">
                </div>
                <div class="form-group">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip"
                           value="{{ $need->zip or '' }}">
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" rows="3" name="comments"
                              id="comments">{{ $need->comments or '' }}</textarea>
                </div>
            </div>
            <button id="needs_button" type="submit" class="btn btn-primary bt-lg"><i class="fa fa-check"></i>
                Submit
            </button>
        </form>
    </div>
</div>