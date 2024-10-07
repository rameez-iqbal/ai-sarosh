<div class="row">
    <input type="hidden" name="library_type_id" value="{{ $library_type_id }}">
    <div class="col-md-6">
        <label for="">Type</label>
        <select name="type" id="type" class="form-control">
            <option value="conference">Conference</option>
            <option value="workshop">Workshop</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="" class="">Heading </label>
        <input type="text" class="form-control" name="heading" placeholder="Heading">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label for="" class="">Post Url </label>
        <input type="text" class="form-control" name="post_url" placeholder="Post Url">
    </div>
    <div class="col-md-6">
        <label for="">Recording URL</label>
        <input type="text" class="form-control" name="recording_url" placeholder="Recording URL">
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <label class="" for="Image">Banner Image</label>
        <input type="file" class="filepond" name="banner_images[]" id="image"
            accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
    </div>
    
    <div class="col-md-6">
        <label class="" for="Image">Gallery Image</label>
        <input type="file" class="filepond" name="gallery_images[]" id="gallery_images"
            accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <label for="">Description</label>
        <textarea class="editor-demo1" name="description"></textarea>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('webinar', ['type' => 'gallery']) }}"
        class="btn btn-outline-secondary">Back</a>
    <button type="submit" id="submitGalleryBtn" class="btn btn-outline-primary">Save</button>
</div>