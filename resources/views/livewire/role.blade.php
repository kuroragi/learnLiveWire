<div>
    <div class="card">
        <div class="card-body">
            <button wire:click='resetField' id="addButton" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal"
                data-target="#roleModal"><i class="fas fa-plus"></i> Tambah Role</button>
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <table id="roleTable" class="table table-striped table-bordered">
                <thead>
                    <th>No.</th>
                    <th>Role Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <button wire:click='editRole({{ $role->id }})' id="editButton"
                                    class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                    data-target="#roleModal"><i class="fas fa-edit"></i> Edit</button>
                                <button wire:click='deleteRole' id="deleteButton"
                                    class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>No.</th>
                    <th>Role Name</th>
                    <th>Action</th>
                </tfoot>
            </table>
        </div>
    </div>
    <div wire:ignore.self id="roleModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Role</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent='saveRole'>
                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input wire:model='name' type="text" name="name" id="name" class="form-control">
                            @error('name')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-100"><i class="fas fa-floppy-disk"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        Livewire.on('closeModal', () => {
            $("#roleModal").modal('hide');
        })
    </script>
@endpush
