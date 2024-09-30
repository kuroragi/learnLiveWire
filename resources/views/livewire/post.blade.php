<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>

    <div class="card-body">
        <button class="btn btn-sm btn-outline-primary mb-3" data-toggle="modal" data-target="#postModal"
            wire:click='ResetField'><i class="fa fa-plus">Tambah
                Post </i></button>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>image(s)</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->content_title }}</td>
                        <td class="text-wrap w-25">{!! substr($post->content, 0, 50) !!}</td>
                        <td><img src="/storage/{{ $post->header_image }}" width="100" height="100"
                                style="object-fit:contain;" alt=""></td>
                        <td>
                            <button wire:click='EditPost({{ $post->id }})' class="btn btn-outline-warning btn-sm"
                                title="Edit" data-toggle="modal" data-target="#postModal">Edit <i
                                    class="fa fa-edit"></i></button>
                            <button class="btn btn-outline-info btn-sm" title="Detail">Detail <i
                                    class="fa fa-search"></i></button>
                            <button wire:click='DeletePost({{ $post->id }})' class="btn btn-outline-danger btn-sm"
                                title="Detail">Hapus <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach

                {{-- <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>5.5</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 6
                    </td>
                    <td>Win 98+</td>
                    <td>6</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 7</td>
                    <td>Win XP SP2+</td>
                    <td>7</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>AOL browser (AOL desktop)</td>
                    <td>Win XP</td>
                    <td>6</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.7</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.5</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Firefox 2.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Firefox 3.0</td>
                    <td>Win 2k+ / OSX.3+</td>
                    <td>1.9</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Camino 1.0</td>
                    <td>OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Camino 1.5</td>
                    <td>OSX.3+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Netscape 7.2</td>
                    <td>Win 95+ / Mac OS 8.6-9.2</td>
                    <td>1.7</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Netscape Browser 8</td>
                    <td>Win 98SE+</td>
                    <td>1.7</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Netscape Navigator 9</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.0</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.1</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1.1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.2</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1.2</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.3</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1.3</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.4</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1.4</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.5</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1.5</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.6</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>1.6</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.7</td>
                    <td>Win 98+ / OSX.1+</td>
                    <td>1.7</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.8</td>
                    <td>Win 98+ / OSX.1+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Seamonkey 1.1</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Gecko</td>
                    <td>Epiphany 2.20</td>
                    <td>Gnome</td>
                    <td>1.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Webkit</td>
                    <td>Safari 1.2</td>
                    <td>OSX.3</td>
                    <td>125.5</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Webkit</td>
                    <td>Safari 1.3</td>
                    <td>OSX.3</td>
                    <td>312.8</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Webkit</td>
                    <td>Safari 2.0</td>
                    <td>OSX.4+</td>
                    <td>419.3</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Webkit</td>
                    <td>Safari 3.0</td>
                    <td>OSX.4+</td>
                    <td>522.1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Webkit</td>
                    <td>OmniWeb 5.5</td>
                    <td>OSX.4+</td>
                    <td>420</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Webkit</td>
                    <td>iPod Touch / iPhone</td>
                    <td>iPod</td>
                    <td>420.1</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Webkit</td>
                    <td>S60</td>
                    <td>S60</td>
                    <td>413</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Opera 7.0</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Opera 7.5</td>
                    <td>Win 95+ / OSX.2+</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Opera 8.0</td>
                    <td>Win 95+ / OSX.2+</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Opera 8.5</td>
                    <td>Win 95+ / OSX.2+</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Opera 9.0</td>
                    <td>Win 95+ / OSX.3+</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Opera 9.2</td>
                    <td>Win 88+ / OSX.3+</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Opera 9.5</td>
                    <td>Win 88+ / OSX.3+</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Opera for Wii</td>
                    <td>Wii</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Nokia N800</td>
                    <td>N800</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Presto</td>
                    <td>Nintendo DS browser</td>
                    <td>Nintendo DS</td>
                    <td>8.5</td>
                    <td>C/A<sup>1</sup></td>
                </tr>
                <tr>
                    <td>KHTML</td>
                    <td>Konqureror 3.1</td>
                    <td>KDE 3.1</td>
                    <td>3.1</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>KHTML</td>
                    <td>Konqureror 3.3</td>
                    <td>KDE 3.3</td>
                    <td>3.3</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>KHTML</td>
                    <td>Konqureror 3.5</td>
                    <td>KDE 3.5</td>
                    <td>3.5</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Tasman</td>
                    <td>Internet Explorer 4.5</td>
                    <td>Mac OS 8-9</td>
                    <td>-</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Tasman</td>
                    <td>Internet Explorer 5.1</td>
                    <td>Mac OS 7.6-9</td>
                    <td>1</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>Tasman</td>
                    <td>Internet Explorer 5.2</td>
                    <td>Mac OS 8-X</td>
                    <td>1</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>Misc</td>
                    <td>NetFront 3.1</td>
                    <td>Embedded devices</td>
                    <td>-</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>Misc</td>
                    <td>NetFront 3.4</td>
                    <td>Embedded devices</td>
                    <td>-</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Misc</td>
                    <td>Dillo 0.8</td>
                    <td>Embedded devices</td>
                    <td>-</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Misc</td>
                    <td>Links</td>
                    <td>Text only</td>
                    <td>-</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Misc</td>
                    <td>Lynx</td>
                    <td>Text only</td>
                    <td>-</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Misc</td>
                    <td>IE Mobile</td>
                    <td>Windows Mobile 6</td>
                    <td>-</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>Misc</td>
                    <td>PSP browser</td>
                    <td>PSP</td>
                    <td>-</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                </tr> --}}
            </tbody>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image(s)</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div wire:ignore.self class="modal fade" id="postModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Extra Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='savePost'>
                        <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-cancel="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <div class="mb-3">
                                <label for="content_title" class="form-label">Title</label>
                                <input wire:model='content_title' type="text" name="content_title" id="content_title"
                                    class="form-control">
                                @error('content_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3" wire:ignore>
                                <label for="content" class="form-label">Content</label>
                                <input wire:model.lazy='content' type="hidden" name="content" id="content">
                                <trix-editor input="content" id="trixEditor"></trix-editor>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="header_image" class="form-label">Header Image</label>
                                <div class="mb-2">
                                    @if ($header_image instanceof \Livewire\TemporaryUploadedFile)
                                        <img src="{{ $header_image->temporaryUrl() }}" width="250" height="250"
                                            style="object-fit:contain;" alt="">
                                    @elseif($header_image)
                                        <img src="/storage/{{ $header_image }}" width="250" height="250"
                                            style="object-fit:contain;" alt="">
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input wire:model='header_image' type="file" name="header_image"
                                        id="header_image" class="custom-file-input">
                                    <label for="" class="custom-file-label">Browse</label>
                                </div>
                                <!-- Progress Bar -->
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100"><i class="fa fa-floppy-disk"></i>
                                Simpan</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Extra Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit='UpdatePost'>
                        <div class="mb-3">
                            <label for="add_content_title" class="form-label">Title</label>
                            <input wire:model='postId' type="hidden" name="postId" id="edit_postId">
                            <input wire:model='content_title' type="text" name="content_title"
                                id="edit_content_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit_content" class="form-label">Content</label>
                            <input wire:model='content' type="hidden" name="content" id="edit_content">
                            <trix-editor input="edit_content"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="edit_header_image" class="form-label">Header Image</label>
                            <input wire:model='header_image' type="text" name="header_image"
                                id="edit_header_image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success w-100"><i class="fa fa-floppy-disk"></i>
                            Simpan</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@push('scripts')
    <script>
        Livewire.on('closeModal', () => {
            $("#postModal").modal('hide');
        });

        Livewire.on('editModal', () => {
            setTimeout(() => {
                let trixEditor = $('#trixEditor');
                let content = $('#content');

                trixEditor.html(content.val());
            }, 10);

        });

        Livewire.on('resetField', () => {
            $("#trixEditor").html("");
        })

        // Mendengarkan event `trix-change` untuk sinkronisasi data Trix dengan Livewire
        document.addEventListener('trix-change', function(e) {
            @this.set('content', e.target.value);
        });

        document.addEventListener('trix-attachment-add', function(event) {

            if (event.attachment.file) {
                uploadImage(event.attachment);
            }
        });

        document.addEventListener('trix-attachment-remove', function(event) {
            removeImage(event.attachment);
        })

        function uploadImage(attachment) {

            if (attachment.file) {
                var formData = new FormData();
                formData.append('attachment', attachment.file);

                $.ajax({
                    url: '/attachments', // Endpoint for handling file upload
                    type: 'POST',
                    data: formData, // Mengirim FormData dengan file
                    contentType: false, // Ini penting agar FormData dapat mengelola tipe file
                    processData: false, // Mencegah jQuery mengubah data menjadi string
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token untuk keamanan
                    },
                    success: function(response) {

                        if (response.url) {
                            // Set the uploaded file's URL to Trix editor
                            attachment.setAttributes({
                                url: response.url,
                                href: response.url
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Upload error:', error); // Menangani error upload
                    }
                });
            }
        }

        function removeImage(attachment) {
            if (attachment.getAttribute('url')) {
                let fileUrl = attachment.getAttribute('url');

                $.ajax({
                    type: "POST",
                    url: "/attachments/delete",
                    data: {
                        file_url: fileUrl
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token untuk keamanan
                    },
                    success: function(response) {
                        console.log(response);

                        console.log('Data removed Successfully');

                    },
                    error: function(xhr, status, error) {
                        console.error('Remove error:', error); // Menangani error upload
                    }
                });
            }
        }
    </script>
@endpush
