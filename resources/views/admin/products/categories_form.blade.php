<div class="row mb-2">
    <label class="col-4">Name</label>
    <div class="col-8">
        <input type="text" wire:model.defer="item.name" class="form-control form-control-sm @error('item.name') is-invalid @enderror" />
    @error('item.name')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

</div>
<div class="row mb-2">
    <label class="col-4">Slug</label>
    <div class="col-8">
        <input type="text" type="text" wire:model.defer="item.slug" class="form-control form-control-sm @error('item.slug') is-invalid @enderror" />
    @error('item.slug')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

</div>
<div class="row mb-2">
    <label class="col-4">Parent</label>
    <div class="col-8">
        <select class="form-select form-select-sm @error('item.parent_id') is-invalid @enderror" wire:model.defer="item.parent_id">
        <option value="">-- Select --</option>
        <option value="0">{{ __('Main Category') }}</option>
        @foreach ($categories as $cat)
            @if ($cat->parent_id == 0)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @foreach ($categories as $sub)
                    @if ($sub->parent_id == $cat->id)
                        <option value="{{ $sub->id }}">- {{ $sub->name }}</option>
                    @endif
                @endforeach
            @endif
        @endforeach
    </select>
    @error('item.parent_id')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

</div>
<div class="row mb-3">
    <label for="is_active" class="col-4">Is Active</label>
    <div class="col-8">
        <div class="form-check">
            <input class="form-check-input" wire:model.defer="item.is_active" id="is_active" type="checkbox">
        </div>
    </div>
</div>
