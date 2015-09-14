
<li>
    <a href="#"><i class="{{$item['icon']}}"></i> {{$item['name']}}<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        @foreach($item['sub-items'] as $sub_item)
            <li>
                <a href="{{route($sub_item['route'])}}">{{$sub_item['action']}}</a>
            </li>
        @endforeach
        
    </ul>
    <!-- /.nav-second-level -->
</li>