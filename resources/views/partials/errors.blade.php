@if (isset($errors) && count($errors) > 0)
        <div class="alert text-danger" id="error-messages">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
@endif
@if (session('message'))
    <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span>{{ session('message') }}</span>
    </div>
@endif