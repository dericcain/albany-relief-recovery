<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="add-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New User</h4>
            </div>
            <div class="modal-body">
                <form id="new-user-form" method="POST" action="{{ route('users.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                               placeholder="Confim password">
                    </div>
                    <div class="form-group">
                        <label for="group">Group</label>
                        <select class="form-control" id="group" name="group">
                            @foreach($groups as $group)
                                @if($group->name == 'user')
                                    <option value="{{ $group->id }}" selected>{{ $group->name }}</option>
                                @else
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>
            </form>
        </div>
    </div>
</div>