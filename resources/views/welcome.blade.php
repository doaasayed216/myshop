<x-bootstrap title="Home">
    <x-nav/>
{{--    BkfYV92MAGfiTuRHmDS0EARdk1opVR2KxdaEO0sO--}}
    {{session('shipping')}}
    {{session('address')}}
    {{session('cash')}}
    <x-sidebar title="Categories">
        <ul class="max-h-full p-2 space-y-1 overflow-y-auto divide-y divide-blue-300">
            @foreach($categories as $category)
                @if(!$category->parent_id and count($category->children))
                    <x-dropdown name="{{$category->name}}" controls="{{$category->name . 'Collapse'}}" icon="{{lcfirst($category->name) . '.png'}}">
                        <ul class="collapse" id="{{$category->name . 'Collapse'}}">
                            @foreach($category->children as $child)
                                <x-dropdown-item name="{{$child->name}}" icon="{{lcfirst($child->name) . '.png'}}" href="/categories/{{$child->id}}"/>
                            @endforeach
                        </ul>
                    </x-dropdown>
                    @elseif(!$category->parent_id and !count($category->children))
                    <li><a href="/categories/{{$category->id}}" class="flex items-center px-4 py-2 text-gray-600 transition-transform transform rounded-md hover:translate-x-1 focus:ring focus:outline-none">
                            <span><img src="/images/{{lcfirst($category->name) . '.png'}}" width="20" height="20"></span>
                            <span class="ml-2 font-medium">{{$category->name}}</span></a></li>
                @endif

            @endforeach
        </ul>
    </x-sidebar>

    <main>
        <div>
            Best Sellers
        </div>

        <div>
            Last Viewed
        </div>

        <div>
            Discounts
        </div>
    </main>

</x-bootstrap>
