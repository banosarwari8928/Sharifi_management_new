<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit" class='bg-gradient-to-r from-black via-black/50 to-black/25 text-white py-1 px-3 m-3 rounded-md'>
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
