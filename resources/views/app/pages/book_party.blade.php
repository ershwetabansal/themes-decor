@extends('layouts.app')

@section('content')
    <div class="content-container">
        <h2 class="title  text-center">
            {{ $page->title }}
        </h2>

        <div class="content col-md-8 col-md-offset-2">
            <div class="hero text-center">
                                {!! $page->content !!}
            </div>
            <div class="text-center">
                @include('partials.errors')
            </div>
            <form class="form-horizontal" action="{{ url('/party/store') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="input1" class="col-sm-5 control-label">Full name</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="input1" placeholder=""
                               name="name" value="{{ old('name') }}"
                               required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="input7" class="col-sm-5 control-label">E-mail</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="input7" placeholder=""
                               name="email" value="{{ old('email') }}"
                                />
                    </div>
                </div>
                <div class="form-group">
                    <label for="book_party_type" class="col-sm-5 control-label">What is the occasion?</label>
                    <div class="col-sm-7">
                        <div class="select-wrapper">
                            <select name="type" id="book_party_type" class="form-control" required>
                                <option value="" selected disabled>--</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}"
                                    >{{ $service->name }}</option>
                                @endforeach
                                <option value="open_other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group hidden" id="book_party_type_other">
                    <label for="input4" class="col-sm-5 control-label"></label>
                    <div class="col-sm-7">
                        <input id="input4" type="text" name="other" value="" class="form-control" placeholder="" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="input2" class="col-sm-5 control-label">Mobile / Phone number</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="input2" placeholder=""
                               name="phone" value="{{ old('phone') }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="input3" class="col-sm-5 control-label">Address</label>
                    <div class="col-sm-7">
                    <textarea type="text" class="form-control" id="input3" placeholder=""
                              name="address" value="{{ old('address') }}" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input5" class="col-sm-5 control-label">Date</label>
                    <div class="col-sm-7">
                        <input id="input5" type="date" name="date" value="{{ old('date')}}" class="form-control" placeholder="" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block">Book my party</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
@endsection

@push('body_scripts')
<script>
    (function () {
        var otherType = $('#book_party_type_other');
        $('#book_party_type').on('change', function () {
            if ($(this).val() == 'open_other') {
                otherType.removeClass('hidden');
                otherType.find('input').eq(0).focus();
            } else {
                otherType.addClass('hidden');
            }
        });
    })();
</script>
@endpush
