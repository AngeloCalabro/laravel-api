@extends('layouts.admin')

@section('content')
      {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div> --}}
    <h1>Create Project</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                      <div class="mb-3">
                        <label for="name_project" class="form-label">Titolo</label>
                        <input type="text" class="form-control @error('name_project') is-invalid @enderror" id="name_project" name="name_project">
                        @error('name_project')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <textarea rows="10" class="form-control" id="description" name="description"></textarea>
                      </div>
                      <div class="mb-3">
                        <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                        <label for="create_cover_image" class="form-label">Immagine</label>
                        <input type="file" name="cover_image" id="create_cover_image" class="form-control  @error('cover_image') is-invalid @enderror">
                        @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>


                      <div class="mb-3">
                        <label for="languages" class="form-label">Seleziona linguaggio</label><br>
                        @foreach ($languages as $language)
                            <input type="checkbox" name="languages[]" value="{{$language->id}}">
                            {{-- {{ $language->id == old('language_id') ? 'selected' : '' }}> --}}

                            <span class="text-capitalize">{{$language->name}}</span><br>
                        @endforeach
                        {{-- @error('languages')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                      </div>

                      <div class="mb-3">
                        <label for="category_id" class="form-label">Seleziona categoria</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                          <option value="">Select category</option>
                          @foreach ($categories as $category)
                              <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{$category->name}}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
        </script>
        <script type="text/javascript">
          bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

@endsection
