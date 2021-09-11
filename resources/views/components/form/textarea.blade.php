@props(['name', 'placeholder'])
<div>
    <x-form.error :name="$name"/>
    <textarea
        class="block border border-grey-light w-full p-3 rounded mb-4"
        name="{{$name}}"
        value="{{old($name)}}"
        placeholder="{{$placeholder}}"
        required rows="5" cols="5"/>
</textarea>
</div>