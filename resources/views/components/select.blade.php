@props(['disabled' => false, 'options' => [], 'value' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    @foreach ($options as $key => $label)
        @php
            $isSelected = fn($key, $value) => $value === $key;
        @endphp

        <option value="{{ $key }}" @if ($isSelected($key, $value)) selected @endif>
            {{ $label }}
        </option>
    @endforeach
</select>
