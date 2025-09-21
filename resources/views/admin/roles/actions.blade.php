<div class="flex  items-center space-x-2">
    <x-wire-button href="{{ route('admin.roles.edit', $role) }}" xs>
        <i class="fa-solid fa-pen-to-square"></i>
    </x-wire-button>

    <form class="delete-form" action="{{ route('admin.roles.destroy', $role) }}" method="POST" >
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" color="negative" xs>
            <i class="fa-solid fa-trash"></i>
        </x-wire-button>
    </form>
</div>