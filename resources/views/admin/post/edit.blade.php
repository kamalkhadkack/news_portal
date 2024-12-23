<x-app-layout>
    <div class="row">
        <div class="mb-2 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Company edit</h4>
                    <a href="{{ route('company.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.update', $company->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-2 col-6">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"value="{{$company->name}}">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-2 col-6">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" class="form-control"value="{{$company->email}}">
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-2 col-6">
                                <label for="phone">Phone<span class="text-danger">*</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control"value="{{$company->phone}}">
                                @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-2 col-6">
                                <label for="tel">Telehone<span class="text-danger">*</span></label>
                                <input type="tel" name="tel" id="telephone" class="form-control" value="{{$company->tel}}">
                                @error('tel')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-2 col-6">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" value="{{$company->facebook}}">
                            </div>
                            <div class="mb-2 col-6">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" id="instagram" class="form-control" value="{{$company->instagram}}">
                            </div>
                            <div class="mb-2 col-6">
                                <label for="logo">Logo<span class="text-danger">*</span></label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                <img src="{{asset($company->logo)}}" width="120" alt="">
                                @error('logo')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <button type="submit" class="btn btn-success">Update record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
