@php
$template = $field->formFieldTemplate;
$fieldName = \Illuminate\Support\Str::snake($template->name);
$isRequired = $field->is_required ? 'required' : '';
$isReadonly = $field->is_readonly ? 'readonly' : '';
$value = $warga->$fieldName ?? ''; // Mengambil nilai dari model
$attributes = array_merge($template->attributes ?? [], $field->custom_attributes ?? []);
@endphp

<tr>
  <td>
    <label for="{{ $fieldName }}">
      {{ $template->label }}
      @if($field->is_required) <span class="required">*</span> @endif
    </label>
  </td>
  <td>:</td>
  <td>
    @if($template->type === 'text' || $template->type === 'number' || $template->type === 'date' || $template->type === 'tel')
    <input type="{{ $template->type }}"
      id="{{ $fieldName }}"
      name="{{ $fieldName }}"
      value="{{ old($fieldName, $value) }}"
      {{ $isRequired }}
      {{ $isReadonly }}
      placeholder="{{ $attributes['placeholder'] ?? '' }}"
      @if($template->type === 'number')
    min="{{ $attributes['min'] ?? '' }}"
    max="{{ $attributes['max'] ?? '' }}"
    @endif

    @elseif($template->type === 'textarea')
    <textarea id="{{ $fieldName }}"
      name="{{ $fieldName }}"
      {{ $isRequired }}
      {{ $isReadonly }}
      rows="{{ $attributes['rows'] ?? 3 }}"
      placeholder="{{ $attributes['placeholder'] ?? '' }}">{{ old($fieldName, $value) }}</textarea>

    @elseif($template->type === 'select')
    <select id="{{ $fieldName }}"
      name="{{ $fieldName }}"
      {{ $isRequired }}>
      <option value="">-- Pilih --</option>
      @foreach($attributes['options'] as $option)
      <option value="{{ $option }}" {{ old($fieldName) == $option ? 'selected' : '' }}>
        {{ $option }}
      </option>
      @endforeach
    </select>

    @elseif($template->type === 'file')
    <input type="file"
      id="{{ $fieldName }}"
      name="{{ $fieldName }}"
      {{ $isRequired }}
      accept="{{ $attributes['accept'] ?? '' }}">
    @if($warga->file_kk)
    <div>
      <strong>File Kartu Keluarga yang sudah di-upload:</strong>
      <a href="{{ asset('storage/' . $warga->file_kk) }}" target="_blank">{{ basename($warga->file_kk) }}</a>
    </div>
    @endif
    @if(isset($attributes['max_size']))
    <div class="file-info">Mohon upload file dengan format PDF (maksimal 2MB)</div>
    @endif

    @elseif($template->type === 'repeater')
    <div id="repeater-{{ $fieldName }}">
      <div class="repeater-group">
        @foreach(old($fieldName, [['']]) as $index => $row)
        <div class="repeater-row row mb-2 g-2">
          @foreach($attributes['fields'] as $subField)
          @php
          $subFieldName = $fieldName.'['.$index.']['.$subField['name'].']';
          $subLabel = $subField['label'];
          @endphp
          <div class="col">
            @if($subField['type'] === 'text' || $subField['type'] === 'number')
            <input type="{{ $subField['type'] }}"
              name="{{ $subFieldName }}"
              class="form-control"
              placeholder="{{ $subField['placeholder'] ?? $subLabel }}"
              value="{{ old($subFieldName, $row[$subField['name']] ?? '') }}">
            @elseif($subField['type'] === 'select')
            <select name="{{ $subFieldName }}" class="form-select">
              <option value="">-- Pilih --</option>
              @foreach($subField['options'] as $option)
              <option value="{{ $option }}" {{ old($subFieldName) == $option ? 'selected' : '' }}>
                {{ $option }}
              </option>
              @endforeach
            </select>
            @endif
          </div>
          @endforeach
          @if($index > 0)
          <div class="col-auto">
            <button type="button" class="btn btn-danger remove-row">×</button>
          </div>
          @endif
        </div>
        @endforeach
      </div>
      <button type="button" class="btn btn-secondary add-row" data-repeater="repeater-{{ $fieldName }}">+ Tambah</button>
    </div>
    @endif

    @error($fieldName)
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </td>
</tr>