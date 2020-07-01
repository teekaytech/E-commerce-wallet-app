@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" id="message-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    {{ Session::forget('success') }}
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" id="message-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    {{ Session::forget('error') }}
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block" id="message-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    {{ Session::forget('warning') }}
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block" id="message-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    {{ Session::forget('info') }}
@endif


@if ($errors->any())
    <div class="alert alert-danger" id="message-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Errors:</strong>
        @foreach($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
        @endforeach
    </div>
@endif
