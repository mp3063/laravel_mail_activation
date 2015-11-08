@if(Session::has('flash_message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-danger text-center">
                {{session('flash_message')}}
            </div>
        </div>
        {{Session::forget('flash_message')}}
    </div>


@elseif(Session::has('flash_message_important'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-danger alert-important text-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('flash_message_important')}}
            </div>
        </div>
    </div>
    {{Session::forget('flash_message_important')}}
@endif