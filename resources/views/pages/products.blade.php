@extends("layouts.layout")

@section("content")
    <section class="main-banner" id="top">
        <div class="container">
            <div class="row">

                <div class="col-md-3 mr-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Category 1
                            </label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Category 2
                            </label>
                        </li>
                    </ul>
                    <ul class="list-group my-5">
                        <li class="list-group-item">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Brand 1
                            </label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Brand 2
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 d-flex justify-content-evenly">
                    <div class="card shadow-lg" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <p class="card-text fw-bold ">Category</p>
                            <p class="card-text fst-italic">Brand</p>
                            <h4 class="h4 text-bold text-end">45 $</h4>
                        </div>
                    </div>
                    <div class="card shadow-lg" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <p class="card-text fw-bold ">Category</p>
                            <p class="card-text fst-italic">Brand</p>
                            <h4 class="h4 text-bold text-end">45 $</h4>
                        </div>
                    </div>
                    <div class="card shadow-lg" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <p class="card-text fw-bold ">Category</p>
                            <p class="card-text fst-italic">Brand</p>
                            <h4 class="h4 text-bold text-end">45 $</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
