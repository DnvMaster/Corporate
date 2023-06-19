@if($menu)
    <div class="menu classic">
        <ul id="nav" class="menu">
            @include(env('MASTER').'.customMenuItems',['items'=>$menu->roots()])
        </ul>
    </div>
@endif
