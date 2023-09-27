<div id="alert" class="alert alert-success rounded-0 d-none mb-0"
    @if (Session::has('notif.success')) style="display: block !important" @endif>
    <div class="container">
        @if (Session::has('notif.success'))
            {{ Session::get('notif.success') }}
        @endif
    </div>
</div>
