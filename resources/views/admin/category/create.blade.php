<x-app-layout>
    <div class="row">
        <div class="mb-2 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Category Create</h4>
                    <a href="{{ route('category.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-2 col-6">
                                <label for="nepali_title">Nepali Title<span class="text-danger">*</span></label>
                                <input type="text"name="nepali_title" id="nepali_title"
                                    class="form-control"value="{{ old('nepali_title') }}">
                                @error('nepali_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-2 col-6">
                                <label for="eng_title">English Titla<span class="text-danger">*</span></label>
                                <input type="text" name="eng_title" id="eng title"
                                    class="form-control"value="{{ old('eng_title') }}">
                                @error('eng_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <button type="submit" class="btn btn-success">Save record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
