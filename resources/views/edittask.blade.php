<x-app-layout>
    <x-slot name="header">
 

        <form method="post" action="task-update">
            @csrf

            <div>
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" value="{{$task->title}}" name="title"  required  />
            </div>

            <div class="mt-4">
                <x-jet-label for="date" value="{{ __('Date') }}" />
                <x-jet-input id="date" class="block mt-1 w-full" type="date" name="date" value="{{$task->date}}"  required />
            </div>
            <div class="mt-4">
                <x-jet-label for="starttime" value="{{ __('StartTime') }}" />
                <x-jet-input id="start_time" class="block mt-1 w-full" type="time" name="start_time" value="{{$task->start_time}}" required />

            </div>
            <div class="mt-4">
                <x-jet-label for="endtime" value="{{ __('EndTime') }}" />
                <x-jet-input id="end_time" class="block mt-1 w-full" type="time" name="end_time" value="{{$task->end_time}}" required />

            </div>

            

    
            <div class="flex items-center justify-end mt-4">
               
            <input type="hidden" value="{{$task->id}}" name= "id" id="id">
                <x-jet-button class="ml-4">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </form>
        
    </x-slot>
</x-app-layout>
