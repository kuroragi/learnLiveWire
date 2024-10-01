<div>
    <!-- Table Start -->
    <div class="card">
        <div class="card-header">
            <h3>Data Pengguna</h3>
        </div>

        <div class="card-body">
            <div wire:click='addUser' class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal"
                data-target="#userModal">
                <i class="fa fa-plus"> Tambah User</i>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td></td>
                            <td>
                                <button wire:click='editUser({{ $user->id }})' class="btn btn-outline-warning btn-sm"
                                    data-toggle="modal" data-target="#userModal">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button wire:click='deleteUser({{ $user->id }})'
                                    class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Table End-->

    <!-- Modal Start -->
    <div wire:ignore.self class="modal fade" id="userModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $modalTitle }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='saveUser'>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input wire:model='name' type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model='email' type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input wire:model='password' type="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <button id="modal-submit" class="btn btn-success w-100">
                                <i id="icon-submit" class="fa fa-floppy-disk"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        Livewire.on('closeModal', () => {
            $("#userModal").modal("hide");
        })
    </script>
@endpush
