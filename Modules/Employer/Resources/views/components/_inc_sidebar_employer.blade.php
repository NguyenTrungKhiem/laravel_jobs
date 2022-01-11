<aside class="col-lg-3 column border-right">
    <div class="widget">
        <div class="tree_widget-sec">
            <ul>
                {{-- tạo vòng lặp lấy lựa chọn từ config/employer.php gán giá trị cho biến $item--}}
                @foreach(config('employer.sidebar') as $item)
                    <li><a href="{{isset($item['route']) && $item['route'] ? route($item['route']) : ''}}" title="{{$item['title']}}"><i class="{{$item['icon']}}"></i>{{$item['title']}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>
