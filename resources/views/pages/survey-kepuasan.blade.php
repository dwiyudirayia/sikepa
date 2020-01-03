@extends('layouts.layout-single')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h2 class="title">Bagaimana Menurut Anda Aplikasi Pengajuan Sikepa?</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3">
                    <form method="POST" action="{{ route('satisfaction.survey.store') }}">
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <div class="form-input">
                                <input type="email" class="form-control" id="email" name="email" value="{{ Cookie::get('email') }}" required>
                                <label class="text-label">Email</label>
                            </div>
                            @if($errors->has('email'))
                                <p style="color:red;">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div id="survey-satisfaction">
                            <div class="emoticon sr-btm"><div></div></div>
                            <div class="list-radio">
                                <div class="radio-btn sr-btm">
                                    <input type="radio" required name="survey" value="5" id="s5">
                                    <label for="s5">Sangat Memuaskan</label>
                                </div>
                                <div class="radio-btn sr-btm">
                                    <input type="radio" required name="survey" value="4" id="s4">
                                    <label for="s4">Memuaskan</label>
                                </div>
                                <div class="radio-btn sr-btm">
                                    <input type="radio" required name="survey" value="3" id="s3">
                                    <label for="s3">Sesuai Standar</label>
                                </div>
                                <div class="radio-btn sr-btm">
                                    <input type="radio" required name="survey" value="2" id="s2">
                                    <label for="s2">Tidak Memuaskan</label>
                                </div>
                                <div class="radio-btn sr-btm">
                                    <input type="radio" required name="survey" value="1" id="s1">
                                    <label for="s1">Sangat Tidak Memuaskan</label>
                                </div>
                            </div>
                        </div>
                        <div class="caption-btn text-center sr-btm">
                            <button class="btn btn-lg btn-rounded btn-primary" type="submit">Vote Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
<script>
    $(document).ready(function(e) {
        $(".radio-btn input").each(function(){
            var x = $(this).val();
            $(this).click(function(){
                if(x == 1){
                    $(".emoticon div").css({
                        backgroundImage : "url(/assets/images/emoticon_pain.svg)"
                    });
                }
                if(x == 2){
                    $(".emoticon div").css({
                        backgroundImage : "url(/assets/images/emoticon_sad.svg)"
                    });
                }
                if(x == 3){
                    $(".emoticon div").css({
                        backgroundImage : "url(/assets/images/emoticon_smile_2.svg)"
                    });
                }
                if(x == 4){
                    $(".emoticon div").css({
                        backgroundImage : "url(/assets/images/emoticon_smile.svg)"
                    });
                }
                if(x == 5){
                    $(".emoticon div").css({
                        backgroundImage : "url(/assets/images/emoticon_happy.svg)"
                    });
                }
            });
        });
    })
</script>
@endsection
