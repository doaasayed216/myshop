<x-admin-list />
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block w-3/4 sm:px-6 lg:px-8 ml-10 mt-10">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product name
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th scope="col" class="relative px-4 py-3">
                            <span class="sr-only">Edit</span>
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                    </thead>
{{--                    <tbody class="bg-white divide-y divide-gray-200">--}}
{{--                    @foreach( as $user)--}}
{{--                        <tr>--}}
{{--                            <td class="px-4 py-4 whitespace-nowrap">--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <div class="flex-shrink-0 h-10 w-10">--}}
{{--                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="ml-4">--}}
{{--                                        <div class="text-sm font-medium text-gray-900">--}}
{{--                                            <a href="">{{$user->name}}</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
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
{{--                            <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
{{--                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

{{--                    @endforeach--}}


{{--                    <!-- More people... -->--}}
{{--                    </tbody>--}}
                </table>
            </div>
        </div>
    </div>
</div>
