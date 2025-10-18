@if($menu)
    <div class="menu classic">
        <ul id="nav" class="menu">
            @include(env('CORP').'.navMenuItems',['items'=>$menu->roots()])
        </ul>
    </div>
@endif