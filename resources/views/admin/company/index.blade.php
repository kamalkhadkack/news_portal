<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Company</h4>
                    <a href="{{route('company.create')}}" class="btn btn-primary">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>logo</th>
                                    <th>Company name</th>
                                    <th>Tel</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>img</td>
                                    <td>Radio Sajha Online</td>
                                    <td>9868602208</td>
                                    <td>9809522294</td>
                                    <td>kamalkhadkack@gmail,com</td>
                                    <td><a href="#" class="btn btn-primary">detsil</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
