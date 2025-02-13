<div>
    <!-- Delete Button -->
    <button class="btn btn-danger" wire:click="deleteUser({{ $user->id }})">Delete User</button>

    <!-- Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="cancelDeletion">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="cancelDeletion">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="confirmDeletion">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('livewire:load', function () {
        @this.on('deleteUser', () => {
            // Show modal when the Livewire event is triggered
            $('#deleteUserModal').modal('show');
        });

        @this.on('userDeleted', () => {
            // Hide modal when the user is deleted
            $('#deleteUserModal').modal('hide');
        });

        @this.on('confirmDelete', () => {
            // You may want to show the modal here if confirmDelete becomes true
            if (@this.confirmDelete) {
                $('#deleteUserModal').modal('show');
            }
        });
    });
</script>