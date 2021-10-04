<x-bootstrap title="{{$product->name}}">
    <x-nav />
    <div>
        <div>
            <img src="{{asset('storage/' . $product->img_path)}}">
            <p>{{$product->name}}</p>
            <p>{{$product->description}}</p>
            <p>{{$product->price}}</p>
        </div>

        <div>
            <h1>Reviews</h1>
            <form method="post" action="/add/review">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <textarea name="body" rows="5" class="border border-gray-300"></textarea>
                <button>Add review</button>
            </form>
            @foreach($product->reviews as $review)
                <p>{{$review->user->name}}</p>
                <p>{{$review->body}}</p>
            @endforeach
        </div>
    </div>
</x-bootstrap>
