<x-bootstrap title="{{$category->name}}">
    <x-nav />
    <x-sidebar title="Filters">

    </x-sidebar>
    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
        <!--Card 1-->
        @foreach($category->products as $product)
            <div class="max-h-20">
                <div class="flex flex-col justify-start">
                    <div class="flex flex-col object-cover justify-items-start mb-3 overflow-hidden">
                        <img class="object-cover mx-auto" src='{{asset('storage/'.$product->img_path)}}' width="150" height="50" >
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col gap-4">
                        <h1 class="capitalize text-4xl font-extrabold h-12 overflow-hidden">
                            <a href="/product/{{$product->id}}">{{$product->name}}</a>
                        </h1>
                        <h2 class="text-3xl">{{$product->price}}<span class="text-red-500"> EGP</span></h2>
                        <p class="text-lg text-gray-500	overflow-hidden h-14">{{$product->description}}</p>
                        @if(auth()->user()->cart and (auth()->user()->cart->products)->contains($product))
                            <div class="flex items-center gap-4 my-6 cursor-pointer ">
                                <form method="POST" action="/cart/remove/{{$product->id}}" class="w-full">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-gray-600 px-5 inline py-3 text-white rounded-lg w-3/5 text-center">Remove from cart</button>
                                </form>
                            </div>
                        @else
                            <div class="flex items-center gap-4 my-6 cursor-pointer ">
                                <form method="POST" action="/cart/add/{{$product->id}}" class="w-full">
                                    @csrf
                                    <input type="number" min="1" name="quantity" value="1" class="w-1/5 mr-5 text-l border border-gray-500 rounded-xl p-3 inline">
                                    <button class="bg-gray-600 px-5 inline py-3 text-white rounded-lg w-2/5 text-center">Add to cart</button>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-bootstrap>
