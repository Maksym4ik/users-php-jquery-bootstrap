<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title main-form-modal" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal-form">
                    <label for="first">First Name</label>
                    <input required name="first" type="text">
                    <label for="first">Second Name</label>
                    <input required name="second" type="text">
                    <div class="custom-control custom-switch">
                        <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Not Active / Active</label>
                    </div>
                    <select name="role">
                        <option value="null">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <span class="info-ok-button"></span>
                <button type="button" class="close-btn btn btn-secondary">Close</button>
                <input type="button" class="form-accept-btn btn btn-primary" value="Accept">
            </div>


        </div>
    </div>
</div>