@extends('back.layouts.app')
@push('css')
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="pagetitle">
        <h1>
            {{ __('Kategoriler') }}
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Blank</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-3">
                        <table id="posts_table" class="display">
                            <thead>
                                <tr>
                                    <th>
                                        {{ __('ID') }}
                                    </th>
                                    <th>
                                        {{ __('Başlık') }}
                                    </th>
                                    <th>
                                        {{ __('Kategori') }}
                                    </th>
                                    <th>
                                        {{ __('Görsel') }}
                                    </th>
                                    <th>
                                        {{ __('İşlemler') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#posts_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.posts.index') }}', // Bu kısıma route tanımlamanız gerekiyor.
                order: [
                    [0, 'desc']
                ],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'img',
                        name: 'img',
                        render: function(data, type, row) {
                            return '<img src="/' + data + '" style="width:50px;height:50px;"/>';
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row) {
                            return `<button class="btn btn-danger delete" data-id="${data}">Sil</button>` +
                                `<a href="/admin/posts/edit/${data}" class="ms-1 btn btn-primary">Düzenle</a>`;
                        }
                    },
                    // Diğer kolonlar...
                ]
            });
        });
        $(document).on('click', '.delete', function() {
            let id = $(this).data('id');

            if (confirm('Bu kaydı silmek istediğinize emin misiniz?')) {
                // AJAX ile post isteği gönder
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.posts.destroy') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Sunucudan gelen yanıtı #response içine ekle
                        Swal.fire({
                            icon: "success",
                            title: "{{ __('Yazı silindi') }}",
                            text: response.message,
                        });
                        // Tabloyu yenile
                        $('#posts_table').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            // Sunucudan gelen hataları kullanıcıya göster
                            var errors = xhr.responseJSON.errors;
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    var errorMessages = errors[key];
                                    for (var i = 0; i < errorMessages.length; i++) {
                                        // Hata mesajını göster
                                        Swal.fire({
                                            icon: "error",
                                            title: "Hata",
                                            html: errorMessages[i],
                                        });
                                    }
                                }
                            }
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Hata",
                                html: "{{ __('Bir şeyler ters gitti') }}",
                            });
                        }
                    }
                });
            }
        });
    </script>
@endpush
