<div class="columns-two">
    <div>
        <label class="form-label" for="{{ $category_id }}">Category
        </label>
        <select wire:model="gearCategory" id="{{ $category_id }}" class="form-select">
            @foreach ($gear_category as $g)
                <option value="{{ $g->id }}" >{{ $g->gear_category_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="form-label" for="{{ $gear_id }}">Gear
        </label>
        <select wire:model="selectedGear" name="{{ $gear_id }}" id="{{ $gear_id }}" class="form-select">
            <option value="" selected>Select Gear</option>
            @foreach ($gears as $s)
                <option value="{{ $s->id }}">{{ $s->gear_name }}</option>
            @endforeach
        </select>
    </div>
</div>
