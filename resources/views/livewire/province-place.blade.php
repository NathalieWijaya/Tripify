<div style="width: 100%">
    <div class="form-floating mb-3">
        <select wire:model="selectedProvince" class="form-control" name="province">
            <option value="" selected>Choose Province</option>
            @foreach($provinces as $prov)
            <option value="{{ $prov->id }}">{{ $prov->province_name }}</option>
            @endforeach
        </select>
        <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>
    </div>

    @if (!is_null($selectedProvince))
    <div class=" mb-3">
        <label for="place" class="col-md-4 col-form-label text-md-right">{{ __('Place') }}</label>
        <select wire:model="selectedPlace" class="form-control" multiple name="place[]">
            @foreach($places as $place)
            @php
            $selecteds = ""
            @endphp
            @if($place->id == $selectedPlace)
            @php
            $selecteds = "selected"
            @endphp
            @endif
            <option {{ $selecteds }} value="{{ $place->id }}">{{ $place->place_name }}</option>
            @endforeach
        </select>

    </div>
    @endif
</div>