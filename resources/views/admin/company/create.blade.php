<x-app-layout>
    <div class="row">
        <div class="mb-2 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Company Create</h4>
                    <a href="{{ route('company.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-2 col-6">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-2 col-6">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-2 col-6">
                                <label for="phone">Phone<span class="text-danger">*</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control">
                            </div>
                            <div class="mb-2 col-6">
                                <label for="tel">Telehone<span class="text-danger">*</span></label>
                                <input type="tel" name="telephone" id="telephone" class="form-control">
                            </div>
                            <div class="mb-2 col-6">
                                <label for="facebook">Facebook</label>
                                <input type="tel" name="telephone" id="telephone" class="form-control">
                            </div>
                            <div class="mb-2 col-6">
                                <label for="instagram">Instagram</label>
                                <input type="tel" name="telephone" id="telephone" class="form-control">
                            </div>
                            <div class="mb-2 col-6">
                                <label for="logo">Logo<span class="text-danger">*</span></label>
                                <input type="file" name="logo" id="logo" class="form-control">
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
