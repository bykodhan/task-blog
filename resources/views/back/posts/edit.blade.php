@extends('back.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>
            "{{ $post->title }}" {{ __('Yazısını Düzenle') }}
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
        <div class="card">
            <div class="card-body p-3">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <form id="posts_update_form">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Başlık') }}*</label>
                                <input name="title" type="text" class="form-control" required value="{{ $post->title }}" autofocus>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Kategori') }}*</label>
                                <input name="category" placeholder="{{ __('Kategori adı') }}" type="text"
                                    class="form-control" required value="{{ $post->category }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Varolan Görsel') }}</label>
                                <img src="{{ asset($post->img) }}" alt="{{ $post->title }}"
                                    class="img-fluid" style="max-height: 100px;" id="img">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Öne Çıkarılan Görsel') }}*</label>
                                <input name="img" type="file" class="form-control" 
                                    placeholder="{{ __('Öne Çıkarılan Görsel') }}" accept="image/*">
                            </div>
                        </div>
                        <div class="col-sm  -12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('İçerik') }}*</label>
                                <textarea name="content" class="form-control" rows="5" required placeholder="{{ __('İçerik') }}">{!! $post->content !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success ">
                        <i class="bi bi-pencil"></i>
                        {{ __('Kaydet') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Form gönderme işlemi
            $("#posts_update_form").submit(function(event) {
                event.preventDefault(); // Sayfa yeniden yüklenmesini engelle

                // Form içindeki "required" alanları doğrula
                if (this.checkValidity()) {
                    // Form verilerini al
                    var formData = new FormData(this);

                    // AJAX ile post isteği gönder
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.posts.update') }}",
                        data: formData,
                        processData: false, // jQuery'nin data'yı sorgu dizesine dönüştürmesini engelle
                        contentType: false, // 'Content-Type' başlığını ayarlama
                        success: function(response) {
                            // Sunucudan gelen yanıtı #response içine ekle
                            Swal.fire({
                                icon: "success",
                                title: "{{ __('Yazı güncellendi') }}",
                                text: response.message,
                            });
                            document.querySelector("#img").src = response.img;
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
                } else {
                    // Form geçerli değilse hata mesajı göster
                    alert("Lütfen gerekli alanları doldurun.");
                }
            });
        });
    </script>
@endpush
