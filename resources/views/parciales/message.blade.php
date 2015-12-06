@if(Session::has('msg-success') || Session::has('msg-info') || Session::has('msg-warning'))
    <div class="col-md-12" id="message" style="position: absolute; text-align: center; z-index:2000">
        @if(Session::has('msg-success'))
            <div class="alert success-new msg-container">
                {{ Session::get('msg-success') }}
            </div>
        @elseif(Session::has('msg-info'))
            <div class="alert info-new msg-container">
                {{ Session::get('msg-info') }}
            </div>
        @elseif(Session::has('msg-warning'))
            <div class="alert warning-new msg-container">
                {{ Session::get('msg-warning') }}
            </div>
        @endif
    </div>

    <script>
        setTimeout(ocultar_msg, 2000);

        function ocultar_msg(){
            $("#message").fadeOut(4000);
        }
    </script>
@endif