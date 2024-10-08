{{-- <div class="row repeater" id="repeater-wrapper">
    <input type="hidden" name="id" value="{{ $id }}">
    <div class="col-md-5">  
        <label for="">Day</label>
        <select name="type" class="form-control">
            @foreach ($days as $day)
                <option value="{{$day}}">{{$day}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-5">
        <label for="" class="">Heading</label>
        <input type="text" class="form-control" name="heading" placeholder="Heading">
    </div>
    <div class="col-md-2 mt-4">
        <button class="btn btn-primary addBtn" type="button">Add</button>
        <button class="btn btn-danger deleteBtn" type="button">Delete</button>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="Image">Banner Image</label>
            <input type="file" class="filepond" id="image" name="image[]" accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
        </div>
    </div>
</div> --}}


    <!-- Container for all repeater rows -->
    <div id="repeater-container"></div>


<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('webinar', ['type' => 'gallery']) }}"
        class="btn btn-outline-secondary">Back</a>
    <button type="submit" id="submitGalleryBtn" class="btn btn-outline-primary">Save</button>
</div>