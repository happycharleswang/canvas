<br>

<div class="form-group">
    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
        <label for="is_draft" class="ts-label">Draft?</label>
        <input {{ checked($is_draft) }} type="checkbox" name="is_draft">
        <label for="is_draft" class="ts-helper"></label>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $title }}" placeholder="Title">
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug" value="{{ $slug }}" placeholder="Post Slug">
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Subtitle</label>
      <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $subtitle }}" placeholder="Subtitle">
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Page Image</label>
      <div class="input-group">
        <input type="text" class="form-control" name="page_image" id="page_image" alt="Image thumbnail" value="{{ $page_image }}" placeholder="Example: /storage/placeholder.png" v-model="pageImage">
        <span class="input-group-btn" style="margin-bottom: 11px">
            <button style="margin-bottom: -5px" type="button" class="btn btn-primary waves-effect" @click="openFromPageImage()">Select Image</button>
        </span>
      </div>
    </div>
</div>

<div class="visible-sm space-10"></div>

<div>
    <img v-if="pageImage" class="img img-responsive" id="page-image-preview" style="margin-top: 3px; max-height:100px;" :src="pageImage">
    <span v-else class="text-muted small">No Image Selected</span>
</div>

<br>
<br>

<div class="form-group">
    <div class="fg-line">
      <textarea id="editor" name="content" placeholder="Content">{{ $content }}</textarea>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Publish Date / Time</label>
      <input class="form-control datetime-picker" name="published_at" id="published_at" type="text" value="{{ $published_at }}" placeholder="YYYY/MM/DD HH:MM:SS" data-mask="0000/00/00 00:00:00">
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Tags</label>
      <select name="tags[]" id="tags" class="selectpicker" multiple>
          @foreach ($allTags as $tag)
              <option @if (in_array($tag, $tags)) selected @endif value="{{ $tag }}">{{ $tag }}</option>
          @endforeach
      </select>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
      <label class="fg-label">Layout</label>
      <input type="text" class="form-control" name="layout" id="layout" value="{{ $layout }}" placeholder="Layout" disabled>
    </div>
</div>

<br>

<div class="form-group">
    <div class="fg-line">
        <label class="fg-label">Meta Description</label>
        <textarea class="form-control auto-size" name="meta_description" id="meta_description" style="resize: vertical" placeholder="Meta Description">{{ $meta_description }}</textarea>
    </div>
</div>

<br>
