<div>
    <form wire:submit="save">
        {{ $this->form }}

        <button type="submit" class=' bg-black text-white py-1 px-3 rounded-md'>
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
