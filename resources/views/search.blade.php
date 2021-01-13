<table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Company
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Phone
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          	@if(count($contacts)> 0)
            @foreach($contacts as $contact)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                     {{$contact->name}}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$contact->company}}</div>
               
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <p class="text-base text-gray-800">{{$contact->email}}</p>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$contact->phone}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <form action="{{route('contact.destroy', ['contact' => $contact->id])}}" method="POST">
                  {{method_field('DELETE')}}
                  @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete ?');" class="text-indigo-600 hover:text-indigo-900 mr-10 focus:outline-none">Delete</a>
                </form>
                <a href="{{route('contact.edit', ['contact' => $contact->id])}}" class="text-indigo-600 hover:text-indigo-900 mx-8">Edit</a>
              </td>
            </tr>

            @endforeach
            @endif
            <!-- More items... -->
          </tbody>

        </table>