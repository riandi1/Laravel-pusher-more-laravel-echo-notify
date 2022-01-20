<div>
    <!-- Teams Dropdown -->
   
    <div class="ml-3 relative">
        <x-jet-dropdown align="right" width="60">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button wire:click="resetNotificationCount()" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                        Notificaciones

                        @if (auth()->user()->notification)
                        <span class=" ml-2 inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{auth()->user()->notification}}</span>
                        @else
                        <span class="ml-2 inline-block w-2 h-2 mr-2 bg-red-600 rounded-full"></span>
                        @endif

                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <div class="w-60">
                    <!-- Team Management -->
                   <!-- Team Switcher -->
                   <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Mensajes') }}
                </div>
                   <ul class="divide-y-2">
                    @foreach ($notification as $item)
                    <li wire:click="read('{{$item->id}}')" class="{{!$item->read_at ? 'bg-gray-200' : ''}}">
                        <x-jet-dropdown-link class="block px-4 py-2 text-xs text-gray-700" href="{{$item->data['url']}}">
                            {{$item->data['message']}}
    
                            <span class="text-xs font-bold">{{$item->created_at->diffForHumans()}}</span>
                        </x-jet-dropdown-link>
                    </li>
                    @endforeach
                </ul>

                    {{-- <div class="border-t border-gray-100"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div> --}}

                </div>
            </x-slot>
        </x-jet-dropdown>
    </div>

</div>
