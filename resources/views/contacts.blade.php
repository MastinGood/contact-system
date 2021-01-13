@extends('layouts.master')
@section('content')
<div class="w-11/12 mx-auto">
 <div class="container mx-auto">
 <h1 class="font-semibold text-2xl text-gray-800 mt-10">All Contacts</h1>
<div class="flex flex-wrap">
  <div class="flex-1">
      @if ($message = Session::get('success'))
  <div class="w-1/3 px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg mt-3" role="alert">
    <p class="font-bold">{{ $message }}</p> 
  </div>
  @endif
  </div>
  <div class="flex-1 items-end">
   
    <label class="inline-block mr-2">Search: </label>
    <input type="text" name="search" id="search_contact" autocomplete="email" class="inline-block md:w-7/12 w-full right-0 bg-gray-100 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-3 block  appearance-none" placeholder="Search contacts...">
   
  </div>
</div>
 <div class="flex flex-col mt-10">
  <div class="-my-2 overflow-x-hidden sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg overflow-hidden" id="table-contact">
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
              <td class="px-6 py-4  text-right text-sm font-medium">
                <div class="inline-block">
                  <form action="{{route('contact.destroy', ['contact' => $contact->id])}}" method="POST" class="block">
                  {{method_field('DELETE')}}
                  @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete ?');" class="text-indigo-600 hover:text-indigo-900 mx-4 focus:outline-none">Delete</a>
                </form>
                </div>
                <a href="{{route('contact.edit', ['contact' => $contact->id])}}" class="text-indigo-600 hover:text-indigo-900 mx-8">Edit</a>
              </td>
            </tr>

            @endforeach
            @endif
            <!-- More items... -->
          </tbody>

        </table>

      </div>
      {{ $contacts->links() }}
    </div>
  </div>
</div>
 </div>
</div>

<script>
  $(document).ready(function() {
    let contact = {
        _token: '<?php echo csrf_token(); ?>',
        search: ''
    }
    $('#search_contact').keyup(function() {
        contact.search = $(this).val();
        
        $.ajax({
            type:'POST',
            url:'{{route('search')}}',
            data: contact,
            success:function(response) {
                $('#table-contact').html(response)
            }
        });
    });
});
</script>
</script>
@endsection
