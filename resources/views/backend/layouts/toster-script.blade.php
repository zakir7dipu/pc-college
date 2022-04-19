@if(Session::has('message'))
    <div class="d-none" id="sessionHasMessage">
        <input type="hidden" class="sessionMessageType" name="type" value="{{ Session::get('alert-type', 'info') }}">
        <input type="hidden" class="sessionMessage" name="message" value="{{ Session::get('message') }}">
    </div>

@elseif(count($errors) > 0)
    <div class="d-none" id="sessionHasError">
        @foreach($errors->all() as $key => $error)
            <input type="hidden" class="sessionMessage" name="{{"message".$key}}" value="{{ $error }}">
        @endforeach
    </div>
@endif
<script src="{{ asset('notification_assets/js/toastr-implementation.js') }}"></script>
