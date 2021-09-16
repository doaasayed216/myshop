<x-admin-list />
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block w-3/4 sm:px-6 lg:px-8 ml-10 mt-10">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>

                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>

                        <th scope="col" class="relative px-4 py-3">
                            <span class="sr-only">Edit</span>
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($categories as $category)
                        @if(!$category->parent_id)
                        <tr>
                            <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$category->name}}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                @foreach($category->children as $child)
                                <div class="text-sm text-gray-900">{{$child->name}}</div>
                                @endforeach
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/admin/{{$category->id}}/sub-category" class="text-indigo-600 mr-5 hover:text-indigo-900">Add Subcategory</a>
                                <a href="#" class="text-indigo-600 mr-5 hover:text-indigo-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-indigo-900">Delete</a>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                    {{--                            <td class="px-4 py-4 whitespace-nowrap">--}}
                    {{--                                <div class="text-sm text-gray-900">{{$user->email}}</div>--}}
                    {{--                            </td>--}}
                    {{--                            <td class="px-4 py-4 whitespace-nowrap">--}}
                    {{--                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">--}}
                    {{--                  Active--}}
                    {{--                </span>--}}
                    {{--                            </td>--}}
                    {{--                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">--}}
                    {{--                                {{$user->isAdmin ? 'Admin' : 'Member'}}--}}
                    {{--                            </td>--}}
                    {{--


                    {{--                    <!-- More people... -->--}}
                    {{--                    </tbody>--}}
                </table>
            </div>
        </div>
        <div class="mt-40">
            {{$categories->links()}}
        </div>
    </div>
</div>
