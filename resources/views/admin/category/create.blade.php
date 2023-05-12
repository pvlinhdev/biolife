<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true"
                            aria-labelledby="modalCenter">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Create Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.category.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Name</label>
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        placeholder="Enter Name" name="name" required="required"
                                                        value="{{ old('name') }}" />
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="descriptionWithTitle" class="form-label">Description</label>
                                                    <textarea type="text" id="descriptionWithTitle" class="form-control" placeholder="Decription ... " name="description"
                                                        required="required">{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>