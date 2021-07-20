<div>
    <div class="modal" tabindex="-1" id="deleteForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <x-icon-question-stop class="text-danger w-6 h-6" />
                    <div class="ms-3 fs-5">Delete</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-danger btn-sm"
                        wire:click="deleteItem()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="editForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <x-icon-pencil-square class="text-warning w-6 h-6" />
                    <div class="ms-3 fs-5">Update</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.users.users_form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary btn-sm" wire:click="editItem()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="createForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <x-icon-file-plus class="text-info w-6 h-6" />
                    <div class="ms-3 fs-5">Create</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.users.users_form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success btn-sm" wire:click="createItem()">Create</button>
                </div>
            </div>
        </div>
    </div>
</div>
